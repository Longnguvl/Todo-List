<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Todo;
use App\Models\User;

class TodoTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_todo()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/todos', [
            'title' => 'New Todo',
            'user_id' => $user->id,
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('todos', ['title' => 'New Todo']);
    }

    public function test_can_delete_todo()
    {
        $user = User::factory()->create();
        $todo = Todo::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $response = $this->delete("/todos/{$todo->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('todos', ['id' => $todo->id]);
    }
}