<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;

class PostControllerTest extends TestCase
{
    use WithFaker;
    use DatabaseMigrations;
    public function test_create_post_for_non_logged_in()
    {
        $payload = [
            'title' => $this->faker->name,
            'content' => $this->faker->paragraph
        ];
        $response = $this->post('/posts', $payload);
        $response->assertRedirect('login');
    }
    public function test_edit_post_for_non_logged_in()
    {
        $id = Post::factory()->create()->id;
        $response = $this->patch("/posts/" . $id, [
            'title' => $this->faker->name,
            'content' => $this->faker->paragraph
        ]);
        $response->assertRedirect('login');
    }
    public function test_store_for_validation()
    {
        $this->actingAs(User::factory()->create());
        $payload = [
            'title' => '44',
            'content' => '44'
        ];
        $response = $this->post('/posts', $payload);
        $response->assertSessionHasErrors();
    }
    public function test_update_for_validation()
    {
        $this->actingAs(User::factory()->create());
        $id = Post::factory()->create()->id;
        $payload = [
            'title' => $this->faker->name,
            'content' => $this->faker->paragraph
        ];
        $response = $this->patch('/posts/' . $id, $payload);
        $this->assertDatabaseHas('posts', [
            'title' => $payload['title'],
            'content' => $payload['content']
        ]);
    }
    public function test_for_posts_get_route_if_has_data()
    {
        $post = Post::factory()->create();
        $response = $this->get('/posts');
        $response->assertSeeText($post->title);
    }
}
