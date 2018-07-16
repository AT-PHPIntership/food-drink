<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Response;
use App\User;

class UserProfileTest extends TestCase
{
    use DatabaseMigrations;

    /**
    * Override function setUp() for make product
    *
    * @return void
    */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureUserProfile()
    {
        return [
            'meta' => [
                'status',
                'code'
            ],
            'data' => [
                'user' => [
                    'id',
                    'name',
                    'email',
                    'role',
                    'created_at',
                    'updated_at',
                    'deleted_at',
                    'user_info' => [
                        'id',
                        'user_id',
                        'address',
                        'phone',
                        'avatar',
                        'created_at',
                        'updated_at',
                        'deleted_at',
                        'avatar_url',
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
    public function testJsonProfileUser()
    {
        $response = $this->jsonUser('GET', '/api/profile');
        $response->assertJsonStructure($this->jsonStructureUserProfile());
        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * Test return json true
     * 
     * @return void
     */
    public function testReturnJson()
    {
        $response = $this->jsonUser('GET', '/api/profile');
        $data = json_decode($response->getContent());
        $response->assertJsonFragment([
            'name' => $data->data->user->name,
            'email' => $data->data->user->email,
            'address' => $data->data->user->user_info->address,
            'phone' => $data->data->user->user_info->phone,
            'avatar' => $data->data->user->user_info->avatar
        ]);
    }
}
