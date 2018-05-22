<?php

namespace Tests\Browser\Pages\Backend\User;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\UserInfo;

class EditUserTest extends DuskTestCase
{
    use DatabaseMigrations;
    const NUMBER_RECORD_CREATE = 5;
    const NUMBER_RECORD_FIND = 5;

    public function setUp()
    {
        parent::setUp();
        factory(User::class, self::NUMBER_RECORD_CREATE)->create();
        factory(UserInfo::class, self::NUMBER_RECORD_CREATE)->create();
    }

    /**
     * Test Users Edit Success.
     *
     * @return void
     */
    public function testEditUser()
    {
        $user = User::find(self::NUMBER_RECORD_FIND);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('admin/user/'.$user->id.'/edit')
                    ->assertSee('Edit Form');
        });
    }

    

    /**
    * Test Users Edit Success.
    *
    * @return void
    */
    public function testEditUserSuccess()
    {
        $user = User::find(self::NUMBER_RECORD_FIND);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/admin/user/'.$user->id.'/edit')
                    ->resize(900,1000)
                    ->type('name', $user->name)
                    ->press('submit')
                    ->assertSee('Successfully Updated User')
                    ->assertPathIs('/admin/user');
        });
    }

    /**
     * Test Validation Update User.
     *
     * @return void
     */
    public function testValidationUpdateUser()
    {
    $user = User::find(self::NUMBER_RECORD_FIND);
    $this->browse(function (Browser $browser) use ($user) {
        $browser->visit('/admin/user/'.$user->id.'/edit')
                ->type('name', '')
                ->type('phone', '(873) 396-4030(873) 396-4030(873) 396-4030(873) 396-4030(873) 396-4030(873) 396-4030')
                ->type('address', '4361 Jayce Summit Apt. 286North Mariobury')
                ->press('submit')
                ->assertPathIs('/admin/user/'.$user->id.'/edit')
                ->assertSee('The name field is required.')
                ->assertSee('The phone may not be greater than 50 characters.');
    });
    }
 
}
