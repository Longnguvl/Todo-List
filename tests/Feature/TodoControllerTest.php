<?php

namespace Tests\Feature;

use App\Models\Todo;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TodoControllerTest extends TestCase
{
    public function test_create_todo()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->postJson('/api/todos', ['title' => 'New Todo']);

        $response->assertStatus(201)
                 ->assertJsonStructure(['id', 'title', 'completed']);
    }

    public function test_get_all_todos()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        Todo::factory()->create(['user_id' => $user->id]);

        $response = $this->getJson('/api/todos');

        $response->assertStatus(200)
                 ->assertJsonCount(1);
    }

    public function test_update_todo()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $todo = Todo::factory()->create(['user_id' => $user->id]);

        $response = $this->putJson("/api/todos/{$todo->id}", ['title' => 'Updated Todo']);

        $response->assertStatus(200)
                 ->assertJson(['title' => 'Updated Todo']);
    }

    public function test_delete_todo()
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $todo = Todo::factory()->create(['user_id' => $user->id]);

        $response = $this->deleteJson("/api/todos/{$todo->id}");

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Todo deleted successfully']);
    }
}
