<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use App\Category;
use App\Product;
use App\User;
use App\Post;

class ShowPostTest extends TestCase
{
    use DatabaseMigrations;
    const NUMBER_RECORD_CREATE = 25;
    /**
    * Override function setUp() for make post of product
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
        factory(Category::class, 'parent')->create();
        factory(User::class, 'admin', 1)->create();
        factory(Product::class, self::NUMBER_RECORD_CREATE)->create();
    }

    /**
    * Override function setUp() for post of product
    *
    * @return void
    */
    public function setUpNoData()
    {
        parent::setUp();
        factory(Category::class, 'parent')->create();
        factory(Product::class)->create();
        factory(User::class, 'admin', 1)->create();
        factory(Post::class, 0)->create();
    }

    /**
     * Receive status code 200 when get product success.
     *
     * @return void
     */
    public function testStatusCodeSuccess()
    {
        $this->setUp();
        $response = $this->json('GET','/api/products/1/posts');
        $response->assertStatus(Response::HTTP_OK);
    }
    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureShowPost()
    {
        return [
            'meta' => [
                'status',
                'code'
            ],
            'data' => [
                'current_page',
                'data' => [
                    [
                        'id',
                        'user_id',
                        'product_id',
                        'content',
                        'rate',
                        'type',
                        'created_at',
                        'updated_at',
                        'deleted_at',
                        'status',
                        'user' => [
                            'id',
                            'name',
                            'email',
                            'role',
                            'parent_id',
                            'created_at',
                            'updated_at',
                            'deleted_at',
                            'user_info' => [

                            ]
                        ],
                    ],
                ],
                'first_page_url',
                'from',
                'last_page',
                'last_page_url',
                'next_page_url',
                'path',
                'per_page',
                'prev_page_url',
                'to',
                'total'
            ]
        ];
    }

    /**
     * Test paginate
     *
     * @return void
     */
    public function testJsonPaginate()
    {
        $this->setUp();
        $dataTest = [
            'page' => 2
        ];
        $response = $this->json('GET', '/api/products/1/posts?page=' . $dataTest['page'] . '');
        $data = json_decode($response->getContent());
        $this->assertEquals($data->data->current_page, $dataTest['page']);
        $this->assertEquals($data->data->per_page, 5);
    }
    /**
     * Test structure of json when empty posts.
     *
     * @return void
     */
    public function testEmptyPosts()
    {
        $this->setUpNoData();
        $response = $this->json('GET', '/api/products/1/posts');   
        $response->assertJson([
            'data' => []
        ]);
    }
}
