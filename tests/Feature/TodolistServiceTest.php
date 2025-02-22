<?php

namespace Tests\Feature;

use App\Models\Todolist;
use App\Models\User;
use Mockery\VerificationDirector;
use Tests\TestCase;
use App\Services\TodolistService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TodolistServiceTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        DB::delete("DELETE from todolists");
        DB::delete("DELETE from users");
    }

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

        $isSuccess = $this->todoService()->save($data);

        self::assertTrue($isSuccess);
    }

    public function testUpdate(): void
    {
        $user = [
            'id' => 1,
            'name' => "joko",
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => "rahasia123",
            'remember_token' => 1388912,
        ];

        $user = User::create($user);

        $data = [
            "id" => 1,
            "title" => "sample title",
            "description" => "sample description",
            "status" => "to-do",
            "priority" => "medium",
            "created_by" => $user->id
        ];

        $this->todoService()->save($data);
        $todo = Todolist::latest("created_at")->first();
        Log::info($todo->description);

        $isSuccess = $this->todoService()->update(["description" => "sample update"], $todo->id);
        $updated_todo = Todolist::find($todo->id);
        Log::info($updated_todo->description);
        self::assertTrue($isSuccess);
        self::assertEquals("sample update", $updated_todo->description);
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

        $todo = Todolist::create($data);
        $isSuccess= $this->todoService()->delete($todo->id);

        self::assertTrue($isSuccess);
    }
}
