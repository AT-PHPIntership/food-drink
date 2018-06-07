<?php

namespace Tests\Browser\Pages\Backend\Order;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Order;
use App\User;
use App\OrderDetail;
use App\Product;
use App\Category;
use App\UserInfo;

class ShowDetailOrderTest extends DuskTestCase
{
    use DatabaseMigrations;
    
    const NUMBER_RECORD_CREATE = 15;

    /**
    * Override function setUp() for make user login
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
        factory('App\User', 'admin', 1)->create();
        factory(User::class, self::NUMBER_RECORD_CREATE)->create();
        factory(Order::class, self::NUMBER_RECORD_CREATE)->create();
        factory(Category::class, 'parent', self::NUMBER_RECORD_CREATE)->create();
        factory(Category::class, self::NUMBER_RECORD_CREATE)->create();
        factory(Product::class, self::NUMBER_RECORD_CREATE)->create();
        factory(UserInfo::class, self::NUMBER_RECORD_CREATE)->create();
        factory(OrderDetail::class, self::NUMBER_RECORD_CREATE)->create();
    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRouteOrderDetail()
    {
        $order = Order::with('user', 'orderdetails')->first();
        $this->browse(function (Browser $browser) use ($order) {
            $browser->loginAs(User::find(1))
                    ->visit('/admin/order/'.$order->id)
                    ->assertSee(
                        'Show detail Order',
                        'User Infomation',
                        'Name', 'Address',
                        'List Product',
                        'Name Product',
                        $order->user->name,
                        $order->orderDetails->first()->address,
                        $order->user->userInfo->phone,
                        $order->orderDetails->first()->name_product,
                        $order->orderDetails->first()->price
                    );
        });
    }

    /**
    * Test 404 Page Not found when click show detail order.
    *
    * @return void
    */
    public function test404PageForClickShow()
    {
        $order = Order::with('user', 'orderdetails')->first();
        $this->browse(function (Browser $browser) use ($order) {
            $browser->loginAs(User::find(1))
                    ->visit('/admin/order')
                    ->assertSee('List Orders');
            $order->delete();
            $browser->click('tbody tr:nth-child(2) td:nth-child(7) .fa-info');
            $browser->assertSee('Can not find user with corresponding id.');
        });
    }
}
