<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Category;
use App\Product;
use App\User;
use App\Order;

class ListOrderTest extends TestCase
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
        factory(Category::class, self::NUMBER_RECORD_CREATE)->create();
        factory(Product::class, self::NUMBER_RECORD_CREATE)->create();
        factory(User::class)->create();
        factory(Order::class, self::NUMBER_RECORD_CREATE)->create();
    }

    /**
     * Receive status code 200 when get product success.
     *
     * @return void
     */
    public function testStatusCodeSuccess()
    {
        $response = $this->json('GET','/api/orders');
        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureShowOrders()
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
                        'total',
                        'total',
                        'status',
                        'created_at',
                        'updated_at',
                        'status_order'
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
     * Test status code
     *
     * @return void
     */
    public function testGetOrders()
    {
        $this->jsonUser('GET', 'api/orders')
            ->assertStatus(200)
            ->assertJsonStructure($this->jsonStructureShowOrders());
    }

    /**
     * Test paginate
     *
     * @return void
     */
    public function testJsonPaginate()
    {
        $response = $this->json('GET', '/api/orders?limit=2');
        $data = json_decode($response->getContent());
        $this->assertEquals($data->data->current_page, 2);
        $this->assertEquals($data->data->per_page, 2);
    }
}
