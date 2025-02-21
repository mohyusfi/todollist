<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateTodo;
use App\Services\TodolistService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormCreateTodo extends Component
{
    public CreateTodo $form;
    public string $method;
    public string $btnSubmit;
    public array $dropDownItems;

    public function mount(
        string $method,
        string $btnSubmit,
        array $dropDownItems,
        ): void
    {
        $this->method = $method;
        $this->btnSubmit = $btnSubmit;
        $this->dropDownItems = $dropDownItems;
    }

    public function create(TodolistService $todolistService)
    {
        $result = $this->form->validate();

        $user_id = Auth::user()->id;

        $todo = array_merge($result, ["created_by" => $user_id]);

        if ($todolistService->save($todo)) {
            $this->dispatch('loads');
            session()->flash('success', 'berhasil menambah todo');
            return;
        }

        $this->addError('error', 'terjadi kesalahan serve');
        return;
    }
    public function render()
    {
        return view('livewire.form-create-todo');
    }
}
