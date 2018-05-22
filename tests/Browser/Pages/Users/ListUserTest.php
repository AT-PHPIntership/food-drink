<?php

namespace Tests\Browser\Pages\Users;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListUserTest extends DuskTestCase
{
    use DatabaseMigrations;
    const NUMBER_RECORD_CREATE = 31;
    const RECORD_LIMIT = 11;
    const LAST_RECORD = 2;

    /**
    * Override function setUp() for make user login
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
        
        factory('App\User', self::NUMBER_RECORD_CREATE)->create();
        factory('App\UserInfo', self::NUMBER_RECORD_CREATE)->create();
    }
    /**
     * A Dusk test Route show list user.
     *
     * @return void
    */
    public function testRoute()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/user')
                    ->assertSee('List Users');
        });
    }
    /**
     * A Dusk test Record show list user.
     *
     * @return void
    */
    public function testRecord()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/user');
            $elements = $browser->elements('.table tr');
            $this->assertCount(self::RECORD_LIMIT, $elements);
        });
    }
    /**
     * A Dusk test numberRecord show list user.
     *
     * @return void
    */
    public function testPaginate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/user?page=4');
            $elements = $browser->elements('.table tr');
            $this->assertCount(self::LAST_RECORD, $elements);
        });
    }
    /**
     * A Dusk test The last user show list user.
     *
     * @return void
    */
    public function testLastUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/user?page=4')
                ->assertSee('31');
        });
    }
}
