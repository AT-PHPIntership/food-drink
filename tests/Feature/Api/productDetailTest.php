<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Product;
use App\Category;
use Illuminate\Http\Response;

class productDetailTest extends TestCase
{
    use DatabaseMigrations;
    const NUMBER_RECORD_CREATE = 25;

    /**
    * Override function setUp() for make product login
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
        factory(Category::class, 'parent', self::NUMBER_RECORD_CREATE)->create();
        factory(Category::class, self::NUMBER_RECORD_CREATE)->create();
        factory(Product::class, self::NUMBER_RECORD_CREATE)->create();
    }

    /**
     * Receive status code 200 when get product success.
     *
     * @return void
     */
    public function testStatusCodeSuccess()
    {
        $response = $this->json('GET','/api/products/5');
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
            'data' => [
                        'id',   
                        'name',
                        'price',
                        'quantity',
                        'category_id',
                        'preview',
                        'description',
                        'avg_rate',
                        'sum_rate',
                        'total_rate',
                        'created_at',
                        'updated_at',
                        'deleted_at',
                        'images' => [
                            
                        ],
                        'category' => [
                            'id',
                            'name',
                            'parent_id',
                            'created_at',
                            'updated_at',
                            'deleted_at',
                            'level'
                        ]
            ]
        ];
    }

    /**
     * Test structure of json response.
     *
     * @return void
     */
    public function testJsonProductDetail()
    {
        $response = $this->json('GET', '/api/products/5');
        $response->assertJsonStructure($this->jsonStructureProductDetail());
    }
}
