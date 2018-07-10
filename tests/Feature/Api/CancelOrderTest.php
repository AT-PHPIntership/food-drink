<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Order;

class CancelOrderTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Set up order
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        factory(User::class)->create();
        factory(Order::class)->create([
            'status' => 1,
        ]);
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureCancelOrder()
    {
        return [
            'meta' => [
                'status',
                'code'
            ],
            'data' => [
                'id',   
                'user_id',
                'total',
                'status',
                'created_at',
                'updated_at',
                'deleted_at',
                'status_order',
                'note' => [
                    'user_id',
                    'order_id',
                    'content',
                    'created_at',
                    'updated_at'
                ]
            ]
        ];
    }

         /**
     * Test structure of json response.
     *
     * @return void
     */
    public function testJsonStructure()
    {
        $response = $this->jsonUser('PUT', '/api/orders/1/cancel');
        $response->assertJsonStructure($this->jsonStructureCancelOrder());
        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * Test check some object compare database.
     *
     * @return void
     */
    public function testCompareDatabase()
    {
        $cancel = [
            'content' => 'test'
        ];
        $response = $this->jsonUser('PUT', 'api/orders/1/cancel', $cancel);
        $data = json_decode($response->getContent())->result;
        $arrayOrder = [
            'id' => $data->id,
            'user_id' => $data->user_id,
            'status' => 3,
        ];
        $this->assertDatabaseHas('orders', $arrayOrder);
        $arrayNote = [
            'order_id' => $data->order_id,
            'user_id' => $data->user_id,
            'content' => 'test',
        ];
        $this->assertDatabaseHas('notes', $arrayNote);
    }
}
