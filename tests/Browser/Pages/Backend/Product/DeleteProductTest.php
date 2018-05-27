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
            $browser->click('tbody tr:nth-child(3) td:nth-child(8) .but-trash')
                    ->assertDialogOpened('Are you sure you want to delete?')
                    ->acceptDialog()
                    ->assertSee('Successfully Deleted Product!');
            $this->assertDatabaseMissing('products', ['id' => 2, 'deleted_at' =>  null]);
        });
    }

    /**
     * A Dusk test record.
     *
     * @return void
    */
    public function testRecord()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/product');
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(9, $elements);
            $browser->click('tbody tr:nth-child(6) td:nth-child(8) .but-trash')
                    ->assertDialogOpened('Are you sure you want to delete?')
                    ->acceptDialog()
                    ->assertSee('Successfully Deleted Product!');
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(8, $elements);
        });
    }

    /**
     * A Dusk test delete fail.
     *
     * @return void
    */
    public function testWithDeleteMethod() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/product');
            DB::table('products')->delete(2);
            $browser->click('tbody tr:nth-child(3) td:nth-child(8) .but-trash')
                    ->assertDialogOpened('Are you sure you want to delete?')
                    ->acceptDialog()
                    ->assertSee('Can not find user with corresponding id.');
        });
    }
}
