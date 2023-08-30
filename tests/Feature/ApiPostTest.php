<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ApiPostTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
        $this->category = Category::factory(5)->create();
        $this->withHeaders([
            'accept' => 'application/json'
        ]);
    }

    public function test_get_admin_api_posts()
    {
        $this->withoutExceptionHandling();

        $file = File::create('test_file.png');

        $data = [
            'category_id' => 3,
            'title' => 'Title5',
            'text' => 'Some text',
            'image' => $file
        ];
        $post = Post::create($data);

        $response = $this->get('/api/post');

        $response->assertJson([[
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'text' => $data['text'],
            'image' => $post->image
        ]]);
    }

    public function test_create_admin_post()
    {
        $this->withoutExceptionHandling();

        $file = File::create('test_file.png');

        $data = [
            'category_id' => 3,
            'title' => 'Title5',
            'text' => 'Some text',
            'image' => $file
        ];
        $response = $this->post('/api/post/create', $data);

        $this->assertDatabaseCount('posts', 1);
        $response->assertStatus(200);
        $response->assertJson([
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'text' => $data['text'],
            'image' => 'images/' . $file->hashName()
        ]);
    }

    public function test_required_title_post()
    {
//        $this->withoutExceptionHandling();

        $file = File::create('test_file.png');

        $data = [
            'category_id' => 3,
            'title' => '',
            'text' => 'Some text',
            'image' => $file
        ];
        $response = $this->post('/api/post/create', $data);

        $this->assertDatabaseCount('posts', 0);
        $response->assertInvalid('title');
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['title' => 'The title field is required.']);
    }

    public function test_required_image_post()
    {

    }

    public function test_read_admin_post()
    {

    }

    public function test_update_admin_post()
    {
//        $this->withoutExceptionHandling();

        $file = File::create('test_file.png');

        $data = [
            'category_id' => 3,
            'title' => 'Title5',
            'text' => 'Some text',
            'image' => $file
        ];
        $post = Post::create($data);

        $this->assertDatabaseCount('posts', 1);
//        $response->assertStatus(422);
        $newData = [
            'category_id' => 4,
            'title' => 'Title6',
            'text' => 'Some text6',
            'image' => $file
        ];

        $response = $this->patch('/api/post/update/' . $post->id, $newData);
        $response->assertJson([
            'category_id' => $newData['category_id'],
            'title' => $newData['title'],
            'text' => $newData['text'],
            'image' => 'images/' . $file->hashName()
        ]);
    }

    public function test_delete_admin_post()
    {

    }

    public function test_delete_admin_post_only_user()
    {

    }
}
