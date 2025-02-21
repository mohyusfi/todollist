<?php

namespace App\Livewire\Pages;

use App\Models\Todolist;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

// #[Layout(null)]
class Dashboard extends Component
{
    public ?Collection $todos;

    public function mount(): void
    {
        $this->loadTodo();
    }

    #[On('loads')]
    public function loadTodo(): void
    {
        $this->todos = Todolist::orderByRaw("
            FIELD(priority, 'high', 'medium', 'low')
        ")->get();
    }
    public function render()
    {
        return view('livewire.pages.dashboard', [
            'todos' => $this->todos
        ]);
    }
}
