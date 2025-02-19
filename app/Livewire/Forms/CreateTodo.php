<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateTodo extends Form
{
    // #[Validate('required')]
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
