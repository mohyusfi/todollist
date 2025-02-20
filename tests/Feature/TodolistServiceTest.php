<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use App\Services\TodolistService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodolistServiceTest extends TestCase
{
    use RefreshDatabase;
    public function todoService(): TodolistService
    {
        return $todolistService = $this->app->make(TodolistService::class);
    }

    public function testSave(): void
    {
        $user = [
            'name' => "joko",
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => "rahasia123",
            'remember_token' => 1388912,
        ];

        $user = User::create($user);

        $data = [
            "title" => "sample title",
            "description" => "sample description",
            "status" => "to-do",
            "priority" => "medium",
            "created_by" => $user->id
        ];

        $todo = $this->todoService()->save($data);
        self::assertNotNull($todo);
        self::assertEquals([
            "title" => "sample title",
            "description" => "sample description",
            "status" => "to-do",
            "priority" => "medium",
            "created_by" => 1
        ], [
            "title" => $todo->title,
            "description" => $todo->description,
            "status" => $todo->status,
            "priority" => $todo->priority,
            "created_by" => $todo->created_by
        ]);
    }

    public function testDelete(): void
    {
        $user = [
            'name' => "joko",
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => "rahasia123",
            'remember_token' => 1388912,                    
        ];

        $user = User::create($user);

        $data = [
            "title" => "sample title",
            "description" => "sample description",
            "status" => "to-do",
            "priority" => "medium",
            "created_by" => $user->id
        ];

        $todo = $this->todoService()->save($data);
        $isSuccess= $this->todoService()->delete($todo->id);

        self::assertTrue($isSuccess);
    }
}
