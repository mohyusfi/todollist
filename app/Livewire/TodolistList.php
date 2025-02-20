<?php

namespace App\Livewire;

use App\Models\Todolist;
use App\Services\TodolistService;
use Livewire\Attributes\On;
use Livewire\Component;

class TodolistList extends Component
{
    public Todolist $todo;

    public function mount(Todolist $todo): void
    {
        $this->todo = $todo;
    }

    public function delete($idtodo, TodolistService $todolistService)
    {
        $todolistService->delete($idtodo);
        $this->dispatch("loads");
    }
    public function render()
    {
        return view('livewire.todolist-list');
    }
}
