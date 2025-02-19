<?php

namespace App\Livewire;

use App\Models\Todolist;
use Livewire\Component;

class TodolistList extends Component
{
    public Todolist $todo;

    public function mount(Todolist $todo): void
    {
        $this->todo = $todo;
    }
    public function render()
    {
        return view('livewire.todolist-list');
    }
}
