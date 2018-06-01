<?php

namespace Tests\Browser\Pages\Backend\Post;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
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
        factory('App\Post', 1)->create([
            'content' => $testContent
        ]);
        $this->browse(function (Browser $browser) use ($testContent) {
            $browser->visit('/admin/post')
                    ->click('.btn-danger')
                    ->assertDontSee($testContent);
        });
    }
}
