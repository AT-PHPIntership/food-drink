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
    const NUMBER_RECORD_CREATE = 8;

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
     * A Dusk test delete success.
     *
     * @return void
    */
    public function testDeleteSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/product');
            $browser->click('tbody tr:nth-child(4) td:nth-child(8) .but-trash')
                    ->assertDialogOpened('Are you sure you want to delete?')
                    ->acceptDialog()
                    ->assertSee('Successfully Deleted Product!');
            $this->assertDatabaseMissing('products', ['id' => 3, 'deleted_at' =>  null]);
        });
    }

    /**
     * A Dusk test delete product not exist.
     *
     * @return void
    */
    public function testDeleteProductNotExist() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/product');
            DB::table('products')->delete(2);
            $browser->click('tbody tr:nth-child(3) td:nth-child(8) .but-trash')
                    ->assertDialogOpened('Are you sure you want to delete?')
                    ->acceptDialog()
                    ->assertSee('Can not find user with corresponding id.');
        });
    }

    /**
     * A Dusk test delete cancel.
     *
     * @return void
    */
    public function testDeleteCancelConfirm()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/product');
            $browser->click('tbody tr:nth-child(4) td:nth-child(8) .but-trash')
                    ->assertDialogOpened('Are you sure you want to delete?')
                    ->dismissDialog();
            $this->assertDatabaseHas('products', ['id' => 3, 'deleted_at' =>  null]);
        });
    }
}
