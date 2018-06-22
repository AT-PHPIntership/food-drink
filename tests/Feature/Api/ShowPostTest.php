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
    * Override function setUp() for make product
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
        factory(Category::class, 'parent')->create();
        factory(Product::class)->create();
        factory(User::class, 'admin', 1)->create();
        factory(Product::class, self::NUMBER_RECORD_CREATE)->create();
    }

    /**
     * Receive status code 200 when get product success.
     *
     * @return void
     */
    public function testStatusCodeSuccess()
    {
        $this->setUp();
        $response = $this->json('GET','/api/products');
        $response->assertStatus(Response::HTTP_OK);
    }
    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureProductDetail()
    {
        return [
            'meta' => [
                'status',
                'code'
            ],
            "data" => [
                "current_page",
                "data" => [
                    [
                        "id",
                        "name",
                        "price",
                        "quantity",
                        "category_id",
                        "preview",
                        "description",
                        "avg_rate",
                        "sum_rate",
                        "total_rate",
                        "created_at",
                        "updated_at",
                        "deleted_at",
                        "category" => [
                            "id",
                            "name",
                            "parent_id",
                            "created_at",
                            "updated_at",
                            "deleted_at",
                            "level",
                        ],
                        "images", [
                            
                        ]
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
}
