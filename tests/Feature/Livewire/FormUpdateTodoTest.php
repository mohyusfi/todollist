<?php

namespace Tests\Feature\Livewire;

use App\Livewire\FormUpdateTodo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class FormUpdateTodoTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(FormUpdateTodo::class)
            ->assertStatus(200);
    }
}
