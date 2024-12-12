<?php

use Tests\TestCase;

class TaskTest extends TestCase
{
    public function test_create_task()
    {
        $response = $this->postJson('/api/tasks', [
            'title' => 'Sample Task',
            'status' => 'pending',
        ]);

        $response->assertStatus(201)
                 ->assertJson(['title' => 'Sample Task']);
    }
}
