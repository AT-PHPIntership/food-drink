<?php

namespace Tests\Browser\Pages\Backend\Post;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Post;
use App\User;
use App\Product;
use App\Category;

class TestChangeStatus extends DuskTestCase
{
    use DatabaseMigrations;
    
    /**
     * test if change post status work.
     *
     * @return void
     */
    public function testChangePostStatus()
    {
        factory('App\Category', 'parent', 1)->create();
        factory('App\Product', 1)->create();
        factory('App\User', 1)->create();
        factory('App\Post', 1)->create([
            'status' => Post::DISABLE
        ]);
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('/admin/post')
                    ->click('table tr td a')
                    ->pause(1000);
            $this->assertDatabaseHas('posts', ['status' => Post::ENABLE]);
        });
    }
    public function testChangePostStatusFail()
    {
        factory('App\Category', 'parent', 1)->create();
        factory('App\Product', 1)->create();
        factory('App\User', 1)->create();
        factory('App\Post', 1)->create([
            'status' => Post::DISABLE
        ]);
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                    ->visit('/admin/post');
            DB::table('posts')->delete(1);
            $browser->click('table tr td a')
                    ->pause(1000)
                    ->assertSourceHas('images/posts/icons/exclamation.png');
        });
    }
}
