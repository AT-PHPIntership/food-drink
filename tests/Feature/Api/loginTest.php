<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Response;
use App\User;

class loginTest extends TestCase
{
    use DatabaseMigrations;

     /**
    * Set up database
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
    public function jsonStructureLoginSuccess()
    {
        return [
            'meta' => [
                'status',
                'code',
            ],
            'data' => [
                'token',
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
                        'avatar_url'
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
    public function testJsonLoginSuccess()
    {
        $body = [
            'email' => $this->user->email,
            'password' => 'hello'
        ];
        $this->jsonUser('POST', '/api/login', $body, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure($this->jsonStructureLoginSuccess());
    }

    /**
     * Test structure of json response.
     *
     * @return void
     */
    public function testJsonLoginFail()
    {
        $body = [
            'email' => $this->user->email,
            'password' => 'wrong password'
        ];
        $this->jsonUser('POST', '/api/login', $body, ['Accept' => 'application/json'])
            ->assertStatus(401)
            ->assertJsonStructure([
              'error',
              'code'
          ]);
    }
}
