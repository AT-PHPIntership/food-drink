<?php

namespace Tests\Browser\Pages\Backend\Product;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;

class DeleteProductTest extends DuskTestCase
{
    use DatabaseMigrations;
    const NUMBER_RECORD_CREATE = 25;

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
     * A Dusk test delete.
     *
     * @return void
    */
    public function testDeleteSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/product')
                    ->click('tbody tr:nth-child(6) td:nth-child(8) .but-trash')
                    ->assertDialogOpened('Are you sure you want to delete?')
                    ->acceptDialog()
                    ->assertSee('Successfully deleted the product!');
            $this->assertDatabaseMissing('products', ['id' => 5, 'deleted_at' => null]);
        });
    }
}
