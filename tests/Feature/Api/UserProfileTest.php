<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Response;
use App\User;
use App\UserInfo;

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
        factory(User::class)->create();
        factory(UserInfo::class)->create();
        Artisan::call('passport:install');
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
                    'avartar_url',
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
        $response->assertJsonFragment([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'address' => $user->user_info->address,
            'phone' => $user->user_info->phone,
            'avatar' => $user->user_info->avatar_url
        ]);
    }
}
