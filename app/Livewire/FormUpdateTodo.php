<?php

namespace App\Livewire;

use App\Livewire\Forms\UpdateTodo;
use App\Models\Todolist;
use Livewire\Component;

class FormUpdateTodo extends Component
{
    public UpdateTodo $form;
    public string|int|null $id = null;
    public string $method;
    public string $btnSubmit;
    public array $dropDownItems;
    public Todolist $olderTodo;
    public function mount(
        string $method,
        string $btnSubmit,
        array $dropDownItems,
        ): void
    {
        $this->method = $method;
        $this->btnSubmit = $btnSubmit;
        $this->dropDownItems = $dropDownItems;

        $currentTodo = Todolist::findOrFail($this->id);
        $this->olderTodo = $currentTodo;
    }

    public function update()
    {

    }

    public function render()
    {
        return view('livewire.form-update-todo');
    }
}
