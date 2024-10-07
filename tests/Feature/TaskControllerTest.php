<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_tasks()
    {
        $response = $this->get('/tasks');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_view_tasks()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/tasks');
        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_create_task()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $taskData = [
            'title' => 'New Task',
            'description' => 'Task description',
        ];

        $response = $this->post('/tasks', $taskData);
        $response->assertRedirect('/tasks');
        $this->assertDatabaseHas('tasks', $taskData);
    }

    public function test_authenticated_user_can_update_task()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $task = Task::factory()->create(['user_id' => $user->id]);

        $updatedTaskData = [
            'title' => 'Updated Task',
            'description' => 'Updated description',
        ];

        $response = $this->put("/tasks/{$task->id}", $updatedTaskData);
        $response->assertRedirect('/tasks');
        $this->assertDatabaseHas('tasks', $updatedTaskData);
    }

    public function test_authenticated_user_can_delete_task()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $task = Task::factory()->create(['user_id' => $user->id]);

        $response = $this->delete("/tasks/{$task->id}");
        $response->assertRedirect('/tasks');
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
