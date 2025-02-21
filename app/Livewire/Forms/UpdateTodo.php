<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;

class UpdateTodo extends Form
{
    public string $title;
    public ?string $description = null;
    public string $priority;
    public ?string $deadline = null;

    protected function rules(): array
    {
        return [
            "title" => ["required", "string", "max:200"],
            "description" => ["nullable", "string"],
            "priority" => ["required", "string", Rule::in(["low", "medium", "high"])],
            "deadline" => ["nullable", "date"]
        ];
    }

    protected function messages(): array
    {
        return [
            "title.required" => ":attribute tidak boleh kosong"
        ];
    }
}
