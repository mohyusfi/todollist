<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateTodo;
use App\Services\TodolistService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormCreateTodo extends Component
{
    public CreateTodo $form;
    // public string $title;
    public string $method;
    public string $btnSubmit;
    public array $dropDownItems;

    // private TodolistService $todolistService;

    public function mount(
        string $method,
        string $btnSubmit,
        array $dropDownItems,
        // TodolistService $todolistService
        ): void
    {
        $this->method = $method;
        $this->btnSubmit = $btnSubmit;
        $this->dropDownItems = $dropDownItems;
        // $this->todolistService = $todolistService;
    }

    public function create(TodolistService $todolistService)
    {
        $result = $this->validate();

        $user_id = Auth::user()->id;

        $todo = array_merge($result, ["created_by" => $user_id]);

        $todolistService->save($todo);

        $this->dispatch('loads');

        return session()->flash('success', 'berhasil menambah todo');
    }
    public function render()
    {
        return view('livewire.form-create-todo');
    }
}
