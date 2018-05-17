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
                    ->assertSee('List Users');
        });
    }
}
