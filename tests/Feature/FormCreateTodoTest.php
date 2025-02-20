<?php

namespace Tests\Feature;

use App\Livewire\FormCreateTodo;
use App\Livewire\Forms\CreateTodo;
use App\Models\Todolist;
use App\Models\User;
use App\Services\TodolistService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class FormCreateTodoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testRender_succesfully(): void
    {
        Livewire::test(FormCreateTodo::class, [
            "method" => "create",
            "btnSubmit" => "Submit",
            "dropDownItems" => ["low", "medium", "high"]
        ])->assertStatus(200)
            ->assertSeeText("low")
            ->assertSeeText("medium")
            ->assertSeeText("high")
            ->assertSeeText("Submit");
    }

    public function test_component_existOn_page(): void
    {
        self::assertTrue(true);
    }

    public function testSuccess_create(): void
    {
        $data = [
            "title" => "sample title",
            "description" => "sample description",
            "priority" => "low",
            "created_by" => 1
        ];

        Auth::shouldReceive('user')
            ->once()
            ->andReturn((object)['id' => 1]);

        $mockService = $this->mock(TodolistService::class, function(MockInterface $mock) use ($data){
            $mock->shouldReceive('save')->once()->with(Mockery::subset($data))->andReturn(true);
        });

        Livewire::test(FormCreateTodo::class, [
            "method" => "create",
            "btnSubmit" => "Submit",
            "dropDownItems" => ["low", "medium", "high"]
        ])->set('form.title', 'sample title')
            ->set('form.description', 'sample description')
            ->set('form.priority', 'low')
            ->call('create', $mockService)
            ->assertDispatched('loads')
            // ->assertSessionHas('success', 'berhasil menambah todo');
            ->assertSeeText('berhasil menambah todo');
    }

    public function test_title_priotiry_cant_blank(): void
    {
        $mockService = $this->mock(TodolistService::class, function(MockInterface $mock){
            $mock->shouldNotReceive('save');
        });

        Livewire::test(FormCreateTodo::class, [
            "method" => "create",
            "btnSubmit" => "Submit",
            "dropDownItems" => ["low", "medium", "high"]
        ])->set('form.title', '')
            ->set('form.description', 'sample description')
            ->set('form.priority', '')
            ->call('create', $mockService)
            ->assertHasErrors([
                'form.title' => 'required',
                'form.priority' => 'required'
            ]);
    }

    public function test_priority_must_corespon_at_dropDownItems(): void
    {
        $mockService = $this->mock(TodolistService::class, function(MockInterface $mock){
            $mock->shouldNotReceive('save');
        });

        Livewire::test(FormCreateTodo::class, [
            "method" => "create",
            "btnSubmit" => "Submit",
            "dropDownItems" => ["low", "medium", "high"]
        ])->set('form.title', 'title')
            ->set('form.description', 'sample description')
            ->set('form.priority', 'extrem')
            ->call('create', $mockService)
            ->assertHasErrors(['form.priority']);
    }
}
