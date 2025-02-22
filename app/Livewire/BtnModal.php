<?php

namespace App\Livewire;

use Livewire\Component;

class BtnModal extends Component
{
    public string|int|null $id = null;
    public string $logo;
    public string $class;
    public string $btnName;

    public function mount(
        string|int|null $id,
        string $logo,
        string $class,
        string $btnName
    ): void
    {
        $this->id = $id;
        $this->logo = $logo;
        $this->class = $class;
        $this->btnName = $btnName;
    }

    public function openModal(): void
    {
        $this->dispatch('openModal', id: $this->id);
    }
    public function render()
    {
        return view('livewire.btn-modal');
    }
}
