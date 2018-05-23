<?php

namespace Tests\Browser\Pages\Backend\Category;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListCategoryTest extends DuskTestCase
{
    use DatabaseMigrations;
    const NUMBER_RECORD_PARENT = 2;
    const NUMBER_RECORD_CREATE = 20;
    const RECORD_LIMIT = 11;
    const NUMBER_LAST_RECORD = 3;

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
    }
    /**
     * A Dusk test Route show list user.
     *
     * @return void
    */
    public function testRoute()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category')
                    ->assertSee('List Category');
        });
    }
    /**
     * A Dusk test Route show list user.
     *
     * @return void
    */
    public function testPaginate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category');
            $elements = $browser->elements('.table tr');
            $this->assertCount(self::RECORD_LIMIT, $elements);
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
            $browser->visit('/admin/category?page=3');
            $elements = $browser->elements('.table tr');
            $this->assertCount(self::NUMBER_LAST_RECORD, $elements);
        });
    }
}
