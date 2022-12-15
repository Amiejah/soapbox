<?php

namespace Tests\Feature;

use App\Http\Livewire\Post\Index;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PostsOverviewTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_if_post_model_is_working()
    {
        $post = Post::factory()->create();

        $this->assertModelExists($post);
    }

    /** @test */
    public function test_if_posts_are_loaded()
    {
        $component = Livewire::test(Index::class);
        $component->assertStatus(200);
    }

    /** @test */
    public function sort_posts_by_creation_date()
    {
        $post1 = Post::create(
            [
                'title' => 'Test post 1',
                'content' => 'Test post 1',
                'image' => 'https://placeimg.com/1024/540/any',
            ]
        );

        $post2 = Post::create(
            [
                'title' => 'Test post 2',
                'content' => 'Test post 2',
                'image' => 'https://placeimg.com/1024/540/any',
            ]
        );

        $post3 = Post::create(
            [
                'title' => 'Test post 3',
                'content' => 'Test post 3',
                'image' => 'https://placeimg.com/1024/540/any',
            ]
        );


        Livewire::test(Index::class)
            ->call('sortBy', 'created_at')
            ->assertSet('sortField', 'created_at')
            ->assertStatus(200);
    }
}
