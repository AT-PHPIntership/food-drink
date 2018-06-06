<?php

namespace Tests\Browser\Pages\Backend\Category;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Category;

class UpdateCategoryTest extends DuskTestCase
{
    use DatabaseMigrations;
    const NUMBER_RECORD_PARENT = 2;
    const NUMBER_RECORD_CREATE = 20;
    const NUMBER_RECORD_UPDATE = 1;
    const NAME_UPDATE = 'Food';
    const PARENT_UPDATE = 1;
    const LEVEL_UPDATE = 2;

    /**
    * Override function setUp() for make user login
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
        factory('App\Category', 'parent', self::NUMBER_RECORD_PARENT)->create();
        factory('App\Category', self::NUMBER_RECORD_CREATE)->create();
        factory('App\Category', self::NUMBER_RECORD_UPDATE)->create([
            'name' =>  self::NAME_UPDATE,
            'parent_id' => self::PARENT_UPDATE,
            'level' => self::LEVEL_UPDATE,
        ]);

    }

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRouteEditCategory()
    {
        $category = Category::first();
        $this->browse(function (Browser $browser) use ($category) {
            $browser->visit('admin/category/'. $category->id.'/edit')
                    ->assertSee('Edit', $category->name);
        });
    }

    /**
    * Test Category Edit Success.
    *
    * @return void
    */
    public function testEditCategorySuccess()
    {
        $category = Category::find(23);
        $this->browse(function (Browser $browser) use ($category) {
            $browser->visit('/admin/category/'.$category->id.'/edit')
                    ->type('name', 'test name')
                    ->select('parent_id', '1')
                    ->press('submit')
                    ->assertPathIs('/admin/category')
                    ->assertSee('Successfully Edit Category!');
            $this->assertDatabaseHas('categories', [
                        'id' => 23,
                        'name' => 'test name',
                        'parent_id' => '1',
            ]);
        });
    }
}
