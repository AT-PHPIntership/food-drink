<?php

namespace Tests\Browser\Pages\Backend\Product;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Product;
use App\Category;


class ShowProductTest extends DuskTestCase
{
    use DatabaseMigrations;
    const NUMBER_RECORD_CREATE = 25;
    const RECORD_LIMIT = 11;
    const LAST_RECORD = 11;
    const NUMBER_RECORD_LAST = 6;

    /**
    * Override function setUp() for make product login
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
        factory(Category::class, 'parent', self::NUMBER_RECORD_CREATE)->create();
        factory(Category::class, self::NUMBER_RECORD_CREATE)->create();
        factory(Product::class, self::NUMBER_RECORD_CREATE)->create();
    }

    /**
     * A Dusk test Route show product.
     *
     * @return void
     */
    public function testRoute()
    {
        $product = Product::first();
        $this->browse(function (Browser $browser) use($product) {
            $browser->visit('/admin/product')
                    ->assertSee('Show list products', $product->name, $product->quantity);
        });
    }

    /**
     * A Dusk test Record show list products.
     *
     * @return void
    */
    public function testRecord()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/product');
            $elements = $browser->elements('.table tr');
            $this->assertCount(self::RECORD_LIMIT, $elements);
        });
    }

    /**
     * A Dusk test route show list user.
     *
     * @return void
    */
    public function testPaginate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/product?page=2');
            $elements = $browser->elements('.table tr');
            $this->assertCount(self::LAST_RECORD, $elements);
        });
    }

    /**
     * A Dusk test numberRecord show list user.
     *
     * @return void
    */
    public function testPaginateLast()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/product?page=3');
            $elements = $browser->elements('.table tr');
            $this->assertCount(self::NUMBER_RECORD_LAST, $elements);
        });
    }
}
