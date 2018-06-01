<?php

namespace Tests\Browser\Pages\Backend\Post;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Post;

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
            $browser->visit('/admin/post')
                    ->click('table tr td a')
                    ->pause(1000);
            $this->assertDatabaseHas('posts',['status' => 1]);
        });
    }
}
