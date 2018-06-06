<?php

namespace Tests\Browser\Pages\Users;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\UserInfo;

class DeleteUserTest extends DuskTestCase
{
    use DatabaseMigrations;
    const NUMBER_RECORD_CREATE_USER = 10;
    const NUMBER_RECORD_CREATE_USER_INFO = 10;
    const NUMBER_RECORD_ADMIN = 10;
    const LAST_RECORD_AFTER_DELETE = 2;

    /**
     * Override function setUp() for make user login
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        factory('App\User', self::NUMBER_RECORD_ADMIN)->create();
        factory('App\UserInfo', self::NUMBER_RECORD_CREATE_USER_INFO + 1)->create();
    }

    /**
     * test route list user .
     *
     * @return void
     */
    public function testRoute()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('/admin/user')
                    ->assertSee('List Users');
        });
    }

    /**
     * test delete a user.
     *
     * @return void
     */
    public function testDeleteUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('/admin/user')
                    ->click('td button.but-trash')
                    ->assertDialogOpened('Are you sure you want to delete?')
                    ->acceptDialog()
                    ->assertSee('Successfully deleted the user!');
        });
    }

    /**
     * A test number record after delete a user.
     *
     * @return void
     */
    public function testRecordAfterDelete()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('/admin/user')
                    ->click('td button.but-trash')
                    ->acceptDialog();
            $browser->visit('/admin/user?page=4')
                    ->assertSee(self::LAST_RECORD_AFTER_DELETE);
        });
    }
}
