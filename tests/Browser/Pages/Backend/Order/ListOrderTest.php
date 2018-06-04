<?php

namespace Tests\Browser\Pages\Backend\Order;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Order;
use App\User;

class ListOrderTest extends DuskTestCase
{
    use DatabaseMigrations;
    
    const NUMBER_RECORD_CREATE = 15;
    const RECORD_LIMIT = 11;
    const NUMBER_RECORD_LAST = 6;

    /**
     * A Dusk test show list order.
     *
     * @return void
     */
    public function testShowListOrder()
    {
        factory(User::class, self::NUMBER_RECORD_CREATE)->create();
        factory(Order::class, self::NUMBER_RECORD_CREATE)->create();
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/order')
                    ->assertPathIs('/admin/order')
                    ->assertSee('Show list orders');
        $elements = $browser->elements('.table tbody tr');
        $this->assertCount(self::RECORD_LIMIT, $elements);
        });
    }

    /**
     * A Dusk test numberRecord show list order.
     *
     * @return void
    */
    public function testPaginateLast()
    {
        factory(User::class, self::NUMBER_RECORD_CREATE)->create();
        factory(Order::class, self::NUMBER_RECORD_CREATE)->create();
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/order?page=2')
                    ->assertSee('Show list orders');
            $elements = $browser->elements('.table tr');
            $this->assertCount(self::NUMBER_RECORD_LAST, $elements);
        });
    }

    /**
     * Test show result of search with data input
     *
     * @return void
    */
    public function testSearchNameAndEmail()
    {
        factory(User::class, 1)->create([
            'name' => 'test name',
            'email' => 'testemail@gmail.com'
        ]);
        factory(Order::class, 1)->create();
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/order')
                    ->type('search', 'test name')
                    ->click('.fa-search');
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(2, $elements);
            $browser->visit('/admin/order')
                    ->type('search', 'testemail@gmail.com')
                    ->click('.fa-search');
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(2, $elements);
        });
    }

    /**
     * Test show result of search with data input, no record return
     *
     * @return void
     */
    public function testSearchNoRecordReturn()
    {
        factory(User::class, 1)->create([
            'name' => 'test name',
            'email' => 'testemail@gmail.com'
        ]);
        factory(Order::class, 1)->create();
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/order')
                        ->type('search', 'test fail')
                        ->click('.fa-search');
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(1, $elements);
        });
    }
}
