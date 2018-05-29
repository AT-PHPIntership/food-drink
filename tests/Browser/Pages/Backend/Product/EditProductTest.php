<?php

namespace Tests\Browser\Pages\Backend\Product;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Category;
use App\Product;

class EditProductTest extends DuskTestCase
{
    use DatabaseMigrations;
    const NUMBER_RECORD_CREATE = 5;

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
     * A Dusk test example.
     *
     * @return void
     */
    public function testRouteEditProduct()
    {
        $product = Product::first();
        $this->browse(function (Browser $browser) use ($product) {
            $browser->visit('admin/product/'. $product->id.'/edit')
                    ->assertSee('Edit Form', $product->name, $product->price, $product->category->name);
        });
    }

    /**
     * List case for Test validate for input Create Product
     *
     * @return array
     */
    public function listCaseValidation()
    {
        return [
            ['name', '', 'The name field is required.'],
            ['price', '', 'The price field is required.'],
            ['quantity', '', 'The quantity field is required.'],
            ['preview', '', 'The preview field is required.'],
            ['description', '', 'The description must be a string.'],
        ];
    }

    /**
     * Dusk test validate for input
     *
     * @param string $name name of field
     * @param string $content content
     * @param string $message message show when validate
     *
     * @dataProvider listCaseValidation
     *
     * @return void
     */
    public function testValidateForInput($name, $content, $message)
    {
        $this->browse(function (Browser $browser) use ($name, $content, $message) {
            $browser->visit('admin/product/create')
                    ->press('submit')
                    ->assertSee($message);
        });
    }

     /**
    * Test Product Edit Success.
    *
    * @return void
    */
    public function testEditProductSuccess()
    {
        $product = Product::first();
        $this->browse(function (Browser $browser) use ($product) {
            $browser->visit('/admin/product/'.$product->id.'/edit')
                    ->type('name', 'test name')
                    ->press('submit')
                    ->assertPathIs('/admin/product')
                    ->assertSee('Successfully Updated Product!');
            $this->assertDatabaseHas('products', [
                'id' => 1,
                'name' => 'test name'
            ]);
        });
    }
}
