<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Response;
use App\User;
use App\UserInfo;

class EditUserTest extends TestCase
{
    use DatabaseMigrations;

    /**
    * Override function setUp() for make user
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
    public function jsonStructureEditProfile()
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
                'user_info' => [
                    'id',
                    'user_id',
                    'address',
                    'phone',
                    'avatar',
                    'avatar_url'
                ]
            ]
        ];
    }


    /**
     * Receive status code 200 when get product success.
     *
     * @return void
     */
    public function testJsonRegister()
    {
        $update = [
            'name' => 'test name',
            'email' => 'hayes@example.com',
            'password' => '123456',
            'phone' => '02126984'
        ];
        $this->jsonUser('PUT', 'api/profile', $update)
            ->assertJsonStructure($this->jsonStructureEditProfile());

    }

    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureValidate()
    {
        return [
            'message',
            'errors' => [
                'name'=> [],
                'email' => [],
                'phone' => [],
                'avatar' => []
            ],
            'code',
            'request' => []
        ];
    }

        /**
     * Test validate update
     *
     * @return void
     */
    public function testUpdateValidateForInput()
    {
        $update = [
            'name' => '',
            'email' => '',
            'password' => '',
            'phone' => '',
            'address' => 'address',
            'avatar' => '',
            '_method' => 'PUT'
        ];
        $this->jsonUser('PUT', 'api/profile', $update)
            ->assertJsonStructure($this->jsonStructureValidate());
    }

    /**
     * Test check some object compare database.
     *
     * @return void
     */
    public function testCompareDatabase()
    {
        $update = [
            'name' => 'test name',
            'email' => 'testemail@gmail.com',
            'address' => 'test address',
            'phone' => '0123456789',
            '_method' => 'PUT'
        ];
        $responseProfie = $this->jsonUser('PUT', 'api/profile', $update);
        $data = json_decode($responseProfie->getContent())->data;
        $arrayUser = [
            'id' => $data->id,
            'name' => $data->name,
            'email' => $data->email
        ];
        $this->assertDatabaseHas('users', $arrayUser);
        $arrayUserInfo = [
            'id' => $data->user_info->id,
            'user_id' => $data->user_info->user_id,
            'address' => $data->user_info->address,
            'phone' => $data->user_info->phone
        ];
        $this->assertDatabaseHas('user_infos', $arrayUserInfo);
    }
}
