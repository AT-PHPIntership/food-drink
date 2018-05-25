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
    const NUMBER_SEARCH_RECORD = 1;
    const NAME_SEARCH = 'FOOD';
    const NAME_SEARCH_NAME = '   FOOD   ';
    const NUMBER_RECORD_AFTER_SEARCH = 3;

    /**
    * Override function setUp() for make user login
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
        factory('App\Category', 'parent', self::NUMBER_RECORD_PARENT)->create([
            'name' => self::NAME_SEARCH,
        ]);
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
    /**
     * Test show result of search with data input
     *
     * @return void
    */
    public function testSearchCategory()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category')
                ->type('category_name', 'Beer')
                ->click('.search-category')
                ->assertSee('List Category');
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(self::NUMBER_SEARCH_RECORD, $elements);
        });
    }
    /**
     * Test show result of search with data input
     *
     * @return void
    */
    public function testSearchName()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category')
                ->type('category_name', self::NAME_SEARCH)
                ->click('.search-category')
                ->assertSee('List Category');
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(self::NUMBER_RECORD_AFTER_SEARCH, $elements);
        });
    }
     /**
     * Test show result of search with data space
     *
     * @return void
    */
    public function testSearchSpace()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category')
                ->type('category_name', ' ')
                ->click('.search-category')
                ->assertSee('List Category');
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(self::RECORD_LIMIT, $elements);
        });
    }

     /**
     * Test show result of search with data space name
     *
     * @return void
    */
    public function testSpaceName()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/category')
                ->type('category_name', self::NAME_SEARCH_NAME)
                ->click('.search-category')
                ->assertSee('List Category');
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(self::NUMBER_RECORD_AFTER_SEARCH, $elements);
        });
    }
}
