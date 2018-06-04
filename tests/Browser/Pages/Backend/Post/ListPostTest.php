<?php

namespace Tests\Browser\Pages\Backend\Post;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ListPostTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * test if post list work.
     *
     * @return void
     */
    public function testListPost()
    {
        factory('App\Category', 'parent', 10)->create();
        factory('App\Product', 10)->create();
        factory('App\User', 10)->create();
        factory('App\Post',10)->create();
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/post')
                    ->assertSee('Show List Review');
        $elements = $browser->elements('.table tbody tr');
        $this->assertCount(11, $elements);
        });
    }
    /**
     * test if search post work.
     *
     * @return void
     */
    public function testSearchPost()
    {
        $testContent = 'hello';
        factory('App\Category', 'parent', 10)->create();
        factory('App\Product', 10)->create();
        factory('App\User', 10)->create();
        factory('App\Post', 10)->create([
            'content' => $testContent
        ]);
        $this->browse(function (Browser $browser) use ($testContent) {
            $browser->visit('/admin/post')
                    ->type('search', $testContent)
                    ->click('.fa-search')
                    ->assertSee($testContent);
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(11,$elements);
        });
    }
}
