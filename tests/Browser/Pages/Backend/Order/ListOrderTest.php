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
    * Override function setUp() for make user login
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
        factory(User::class, self::NUMBER_RECORD_CREATE)->create();
        factory(Order::class, self::NUMBER_RECORD_CREATE)->create();
    }

    /**
    * Override function setUpOneRecord() for make user login
    *
    * @return void
    */
    public function setUpOneRecord()
    {
        parent::setUp();
        factory(User::class)->create([
            'name' => 'test name',
            'email' => 'testemail@gmail.com'
        ]);
        factory(Order::class)->create();
    }

    /**
     * A Dusk test show list orders.
     *
     * @return void
     */
    public function testShowListOrder()
    {
        $this->setUp();
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/order')
                    ->assertPathIs('/admin/order')
                    ->assertSee('Show list orders');
        $elements = $browser->elements('.table tbody tr');
        $this->assertCount(self::RECORD_LIMIT, $elements);
        });
    }

    /**
     * A Dusk test paginate last show list order.
     *
     * @return void
    */
    public function testPaginateLast()
    {
        $this->setUp();
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
        $this->setUpOneRecord();
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
        $this->setUpOneRecord();
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/order')
                        ->type('search', 'test fail')
                        ->click('.fa-search');
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(1, $elements);
        });
    }
}
