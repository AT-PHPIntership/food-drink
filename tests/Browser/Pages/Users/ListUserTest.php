<?php

namespace Tests\Browser\Pages\Users;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListUserTest extends DuskTestCase
{
    /**
     * A Dusk test Route show list user.
     *
     * @return void
    */
    public function testRoute()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/user')
                    ->assertPathIs('/admin/user')
                    ->pause(5000)
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
            $this->assertCount(config('databasetest.RECORD_LIMIT'), $elements);
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
            $this->assertCount(config('databasetest.LAST_RECORD'), $elements);
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
