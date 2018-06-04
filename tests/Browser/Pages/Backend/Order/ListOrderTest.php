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
    const NUMBER_RECORD_SEARCH = 2;

    /**
    * Override function setUp() for make product login
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
        factory(User::class, self::NUMBER_RECORD_CREATE)->create();
        factory(User::class)->create([
            'name' => 'test name',
            'email' => 'testemail@gmail.com'
        ]);
        factory(Order::class, self::NUMBER_RECORD_CREATE)->create();
    }

    /**
     * A Dusk test show list order.
     *
     * @return void
     */
    public function testShowListOrder()
    {
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
    public function testSearchName()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/order')
                    ->type('search', 'test name')
                    ->click('.fa-search');
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(self::NUMBER_RECORD_SEARCH, $elements);
        });
    }
}
