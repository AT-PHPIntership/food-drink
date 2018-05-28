<?php

namespace Tests\Browser\Pages\Backend\Product;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Category;
use App\Image;
use App\Product;

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
        factory(Product::class, self::NUMBER_RECORD_CREATE)->create();
        factory(Image::class, self::NUMBER_RECORD_CREATE)->create();
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
            ['images', '', 'The images field is required.'],
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
                    ->assertSee('Successfully Created Product!')
                    ->assertPathIs('/admin/product');
            });
            $this->assertDatabaseHas('products', [
                'name' => 'test name',
                'price' => '2.05',
                'quantity' => '20',
                'category_id' => '2',
                'preview' => 'aaa',
                'description' => 'aaa',
                ]);
            $this->assertDatabaseHas('images', [
                'id' => '6',
                'product_id' => '6',
                ]);
    }
}
