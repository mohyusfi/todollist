<?php

namespace Tests\Feature\Livewire;

use App\Livewire\FormCreateTodo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class FormCreateTodoTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(FormCreateTodo::class)
            ->assertStatus(200);
    }
}
