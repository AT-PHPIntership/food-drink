<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
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
        factory(Order::class)->create([
            'status' => Order::PENDING,
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
                'notes' => [
                    [
                        'id',
                        'user_id',
                        'order_id',
                        'content',
                        'created_at',
                        'updated_at'
                    ]
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
        $cancel = [
            'content' => 'test'
        ];
        $response = $this->jsonUser('PUT', '/api/orders/1/cancel', $cancel);
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
        $data = json_decode($response->getContent());
        $arrayOrder = [
            'id' => $data->data->id,
            'user_id' => $data->data->user_id,
            'status' => $data->data->status,
        ];
        $this->assertDatabaseHas('orders', $arrayOrder);
        $arrayNote = [
            'user_id' => $data->data->notes[0]->user_id,
            'order_id' => $data->data->notes[0]->order_id,
            'content' => $data->data->notes[0]->content,
        ];
        $this->assertDatabaseHas('notes', $arrayNote);
    }
}
