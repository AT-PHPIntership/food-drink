<?php
namespace Tests\Feature;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Faker\Factory as Faker;
use App\Category;
use Illuminate\Http\Response;

class listCategoriesTest extends TestCase
{
    use DatabaseMigrations;

    const NUMBER_RECORD_CREATE = 5;
 
    /**
     * Receive status code 200 when get list categories success.
     *
     * @return void
     */
    public function testStatusCodeSuccess()
    {
        factory(Category::class, 'parent', 1)->create();
        $response = $this->json('GET','/api/categories');
        $response->assertStatus(Response::HTTP_OK);
    }
    /**
     * Return structure of json.
     *
     * @return array
     */
    public function jsonStructureListCategories()
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
                                'name',
                                'parent_id',
                                'created_at',
                                'updated_at',
                                'level',
                                'children' => []
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
    public function testJsonListCategories()
    {
        factory(Category::class, 'parent', 1)->create();
        $response = $this->json('GET', '/api/categories');
        $response->assertJsonStructure($this->jsonStructureListCategories());
    }
    /**
     * Test compare database
     * 
     * @return void
     */
    public function testCompareDatabase()
    {
        factory(Category::class, 'parent', 1)->create();
        $response = $this->json('GET', '/api/categories');
        $data = json_decode($response->getContent())->data->data;
        foreach ($data as $category) {
            $arrayCompare = [
                'id' => $category->id,
                'name' => $category->name,
            ];
            $this->assertDatabaseHas('categories', $arrayCompare);
        }
    }
}
