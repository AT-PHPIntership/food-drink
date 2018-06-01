<?php

namespace Tests\Browser\Pages\Backend\Post;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Post;


class DeletePostTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test delete success.
     *
     * @return void
    */

    public function testDeleteSuccess()
    {
        $testContent = 'Post test delete';
        factory('App\Category', 'parent', 1)->create();
        factory('App\Product', 1)->create();
        factory('App\User', 1)->create();
        factory('App\Post', 2)->create([
            'content' => $testContent
        ]);
        $this->browse(function (Browser $browser) use ($testContent) {
            $browser->visit('/admin/post')
                    ->click('#post_1')
                    ->click('#post_2')
                    ->assertDontSee($testContent);
        });
    }
    /**
    * A Dusk test delete product not exist.
    *
    * @return void
    */
    public function testDeleteFail() {
        factory('App\Category', 'parent', 1)->create();
        factory('App\Product', 1)->create();
        factory('App\User', 1)->create();
        factory('App\Post', 2)->create();
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/post');
            DB::table('posts')->delete(1);
            $browser->click('#post_1')
                    ->assertSee('Can not find user with corresponding id.');
        });
    }
}
