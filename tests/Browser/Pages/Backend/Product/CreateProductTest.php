<?php

namespace Tests\Browser\Pages\Backend\Product;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Category;

class CreateProductTest extends DuskTestCase
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
    }

    /**
     * A Dusk test route.
     *
     * @return void
     */
    public function testCreateRoute()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/product/create')
                    ->assertSee('Create Form', 'Quantity');
        });
    }

    /**
     * Test Validation Create Product.
     *
     * @return void
     */
    public function testValidationCreateProduct()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/product/create')
                    ->type('name', '')
                    ->type('price', '2.05')
                    ->type('quantity', '')
                    ->select('category_id', '2')
                    ->type('preview', '')
                    ->type('description', 'aaa')
                    ->type('images[]', '')
                    ->press('submit')
                    ->assertSee('The name field is required.')
                    ->assertSee('The quantity field is required.')
                    ->assertSee('The preview field is required.')
                    ->assertSee('The images field is required.');
            });
    }

    /**
     * Test Validation Create Product success.
     *
     * @return void
     */
    public function testCreateProductSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/product/create')
                    ->type('name', 'test name')
                    ->type('price', '2.05')
                    ->type('quantity', '20')
                    ->select('category_id', '2')
                    ->type('preview', 'aaa')
                    ->type('description', 'aaa')
                    ->attach('images[]', 'public/images/products/default-product.jpg')
                    ->press('submit')
                    ->pause(1000)
                    ->assertSee('Successfully Created Product!');
            });
            $this->assertDatabaseHas('products', [
                'name' => 'test name',
                'price' => '2.05',
                'quantity' => '20',
                'category_id' => '2',
                'preview' => 'aaa',
                'description' => 'aaa',
                ]);
    }
}
