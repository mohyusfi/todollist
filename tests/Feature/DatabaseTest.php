<?php

namespace Tests\Feature;

use App\Models\Todolist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetTodolist(): void
    {
        $todolist = Todolist::find(1);
        Log::info($todolist->created_at->diffForHumans());

        self::assertTrue(true);
    }
}
