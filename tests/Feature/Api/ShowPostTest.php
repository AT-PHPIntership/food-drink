<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use Faker\Generator as Faker;
use App\Category;
use App\Product;
use App\User;
use App\Post;

class ShowPostTest extends TestCase
{
    use DatabaseMigrations;
    const NUMBER_RECORD_CREATE = 20;

    /**
    * Override function setUp() for make post of product
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
        factory(Category::class, 'parent')->create();
        factory(User::class, 'admin')->create();
        factory(Product::class)->create();
        factory(Post::class)->create([
            'id' => 1,
            'type' => Post::COMMENT,
        ]);
        factory(Post::class, 6)->create([
            'type' => Post::REVIEW,
        ]);
        factory(Post::class, self::NUMBER_RECORD_CREATE)->create();
    }

    /**
     * Receive status code 200 when get product success.
     *
     * @return void
     */
    public function testStatusCodeSuccess()
    {
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
        $response = $this->json('GET', '/api/products/1/posts?page=2');
        $data = json_decode($response->getContent());
        $this->assertEquals($data->data->current_page, 2);
        $this->assertEquals($data->data->per_page, 5);
    }

    /**
     * Test type comment
     *
     * @return void
     */
    public function testJsonComment()
    {
        $response = $this->json('GET', '/api/products/1/posts?type=' . POST::COMMENT . '');
        $data = json_decode($response->getContent());
        $this->assertEquals($data->data->data[0]->type, 1);
    }

    /**
     * Test type review
     *
     * @return void
     */
    public function testJsonReview()
    {
        $response = $this->json('GET', '/api/products/1/posts?type=' . POST::REVIEW . '');
        $data = json_decode($response->getContent());
        $this->assertEquals($data->data->data[1]->type, 2);
    }

    /**
     * Test select all post
     *
     * @return void
     */
    public function testJsonAllPost()
    {
        $response = $this->json('GET', '/api/products/1/posts');
        $data = json_decode($response->getContent());
        $this->assertEquals($data->data->total, 27);
    }

    /**
     * Test paginate review
     *
     * @return void
     */
    public function testJsonPaginateTypeReview()
    {
        $response = $this->json('GET', '/api/products/1/posts?type=' . POST::REVIEW . '&page=2');
        $data = json_decode($response->getContent());
        $this->assertEquals($data->data->prev_page_url, $data->data->path . '?type=' . POST::REVIEW . '&page=1');
        $this->assertEquals($data->data->per_page, 5);
    }
}
