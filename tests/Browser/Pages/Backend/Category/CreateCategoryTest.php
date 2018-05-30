<?php

namespace Tests\Browser\Pages\Backend\Category;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Category;

class CreateCategoryTest extends DuskTestCase
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
     * A Dusk test List category.
     *
     * @return void
     */
    public function testListCategory()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category')
                    ->assertSee('List Category');
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
            $browser->visit('admin/category/create')
                    ->press('submit')
                    ->assertSee($message);
        });
    }

    /**
     * Test Validation Create Category success.
     *
     * @return void
     */
    public function testCreateCategorySuccess()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/admin/category')
                    ->click('.box-header .create-category')
                    ->type('name', 'Beer')
                    ->select('parent_id', '1')
                    ->press('submit')
                    ->assertSee('Successfully Created Category!')
                    ->assertPathIs('/admin/category');
        });
        $this->assertDatabaseHas('categories', [
            'name' => 'Beer',
            'parent_id' => '1',
            ]);
    }

    /**
     * A Dusk test Route.
     *
     * @return void
     */
    public function testRoute()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category')
                    ->click('.box-header .create-category')
                    ->assertSee('Name Category', 'Name Parent');
        });
    }
}
