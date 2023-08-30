<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('public');
        $this->category = Category::factory(5)->create();
        $this->user = User::create([
            'name' => 'Test Name',
            'email' => 'testemail@yandex.ru',
            'password' => Hash::make('123'),
            'role' => 1,
        ]);
        $this->user->email_verified_at = now();
        $this->user->save();
        $this->actingAs($this->user);
//        $this->artisan('route:cache');
    }

    public function test_get_admin_posts()
    {
        $response = $this->get('/admin/post');
        $response->assertStatus(200);
        $response->assertViewIs('admin.posts.all');
        $response->assertSeeText('ID');
    }

    public function test_create_admin_post()
    {
//        $this->withoutExceptionHandling(); // Отображает ошибки

        $file = File::create('test_file.png');

        $data = [
            'category_id' => 3,
            'title' => 'Title5',
            'text' => 'Some text',
            'image' => $file
        ];

        $response = $this->post('/admin/post/create', $data);

        $response->assertStatus(302);
        $post = Post::where('category_id', $data['category_id'])
            ->where('title', $data['title'])
            ->where('text', $data['text'])
            ->first();

//        $this->assertDatabaseCount('posts', 1);
        $this->assertEquals($data['category_id'], $post->category_id);
        $this->assertEquals($data['title'], $post->title);
        $this->assertEquals($data['text'], $post->text);
        $this->assertEquals('images/' . $file->hashName(), $post->image);
        Storage::disk('public')->assertExists($post->image);
    }

    public function test_required_title_post()
    {
//        $this->withoutExceptionHandling();

        $data = [
            'category_id' => 4,
            'title' => '',
            'text' => 'Some text',
        ];

        $response = $this->post('/admin/post/create', $data);
        $response->assertRedirect();
        $response->assertInvalid('title');
    }

    public function test_required_image_post()
    {
//        $this->withoutExceptionHandling();

        $data = [
            'category_id' => 4,
            'title' => 'Title5',
            'text' => 'Some text',
            'image' => 'NOT_FILE'
        ];

        $response = $this->post('/admin/post/create', $data);
        $response->assertRedirect();
        $response->assertInvalid('image');
    }

    public function test_read_admin_post()
    {
//        $this->withoutExceptionHandling();

        $file = File::create('test_file.png');
        $data = [
            'category_id' => 4,
            'title' => 'Title5',
            'text' => 'Some text',
            'image' => $file
        ];
        $response = $this->post('/admin/post/create', $data);
        $this->assertDatabaseCount('posts', 1);

        $post = Post::first();
        $response = $this->get('/admin/post/read/1/1', $data);
        $response->assertOk();
        $response->assertViewIs('admin.posts.read');
        $response->assertSeeText('Some text');

        $this->assertEquals($data['category_id'], $post->category_id);
        $this->assertEquals($data['title'], $post->title);
        $this->assertEquals($data['text'], $post->text);
        $this->assertEquals('images/' . $file->hashName(), $post->image);
    }

    public function test_update_admin_post()
    {
//        $this->withoutExceptionHandling();

        $file = File::create('test_file.png');
        $data = [
            'category_id' => 4,
            'title' => 'Title5',
            'text' => 'Some text',
            'image' => $file
        ];
        $response = $this->post('/admin/post/create', $data);
        $this->assertDatabaseCount('posts', 1);
        $post = Post::first();

        $response = $this->patch("/admin/post/update/$post->id", $data);
        $response->assertOk();
    }

    public function test_delete_admin_post()
    {
        $this->withoutExceptionHandling();

        $file = File::create('test_file.png');
        $data = [
            'category_id' => 4,
            'title' => 'Title5',
            'text' => 'Some text',
        ];
        $response = $this->post('/admin/post/create', $data);
        $this->assertDatabaseCount('posts', 1);
        $post = Post::first();

        $response = $this->delete('admin/post/delete/' . $post->id);
        $response->assertRedirect();
        $this->assertDatabaseCount('posts', 0);
    }

    public function test_delete_admin_post_only_user()
    {
        $this->withoutExceptionHandling();

        $file = File::create('test_file.png');
        $data = [
            'category_id' => 4,
            'title' => 'Title5',
            'text' => 'Some text',
        ];
        $response = $this->post('/admin/post/create', $data);
        $this->assertDatabaseCount('posts', 1);
        $post = Post::first();

        auth()->logout();
        $response = $this->delete('admin/post/delete/' . $post->id);
        $response->assertRedirect();
        $this->assertDatabaseCount('posts', 1);
    }
}
