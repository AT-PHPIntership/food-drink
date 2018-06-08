<?php

namespace Tests\Browser\Pages\Backend\Home;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Order;

class Statistic extends DuskTestCase
{
    use DatabaseMigrations;
    const NUMBER_RECORD_CREATE = 30;

    /**
    * Override function set up database
    *
    * @return void
    */
    
    public function setUp()
    {
        parent::setUp();
        factory('App\User', 'admin', 1)->create();
        factory(User::class, self::NUMBER_RECORD_CREATE)->create();
        factory(Order::class, self::NUMBER_RECORD_CREATE)->create();
        $this->user = User::find(1);
    }

    /**
     * A Dusk test Route Home.
     *
     * @return void
     */
    public function testRouteHome()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('/admin')
                    ->assertSee('TOTAL PRODUCTS', 'TOTAL ORDERED', 'Latest Orders');
        });
    }

    /**
     * Test value show on page.
     *
     * @return void
     */
    public function testValueOnHomePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('/admin')
                    ->assertSee('TOTAL PRODUCTS', 'TOTAL ORDERED', 'Latest Orders');
            $elements = $browser->elements('.table tr');
            $this->assertCount(8, $elements);
        });
    }
}
