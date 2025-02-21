<?php

namespace App\Livewire;

use App\Livewire\Forms\UpdateTodo;
use Livewire\Component;

class FormUpdateTodo extends Component
{
    public UpdateTodo $form;
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
    public function render()
    {
        return view('livewire.form-update-todo');
    }
}
