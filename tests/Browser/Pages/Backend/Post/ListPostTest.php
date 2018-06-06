<?php

namespace Tests\Browser\Pages\Backend\Post;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Product;
use App\Category;
use App\Post;

class ListPostTest extends DuskTestCase
{
    use DatabaseMigrations;
    const NUMBER_RECORD_CREATE = 10;

    /**
    * Override function set up database
    *
    * @return void
    */
    
    public function setUp()
    {
        parent::setUp();
        factory('App\User', 'admin', 1)->create();
        factory(User::class, self::NUMBER_RECORD_CREATE)->create();
        factory(Category::class, 'parent', self::NUMBER_RECORD_CREATE)->create();
        factory(Product::class, self::NUMBER_RECORD_CREATE)->create();
        factory(Post::class, self::NUMBER_RECORD_CREATE)->create();
    }
    /**
     * test if post list work.
     *
     * @return void
     */
    public function testListPost()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/admin/post')
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
            $browser->loginAs(User::find(1))
                    ->visit('/admin/post')
                    ->type('search', $testContent)
                    ->click('.fa-search')
                    ->assertSee($testContent);
            $elements = $browser->elements('.table tbody tr');
            $this->assertCount(11,$elements);
        });
    }
}
