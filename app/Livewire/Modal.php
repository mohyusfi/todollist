<?php

namespace App\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public bool $isOpen = false;
    public string $btnOpen, $btnSubmit;
    public string $titleModal;
    public string $method;
    public array $dropDownItems;

    public function mount(
        string $btnOpen,
        string $btnSubmit,
        string $titleModal,
        string $method,
        array $dropDownItems
        ): void
    {
        $this->btnOpen = $btnOpen;
        $this->btnSubmit = $btnSubmit;
        $this->titleModal = $titleModal;
        $this->method = $method;
        $this->dropDownItems = $dropDownItems;
    }

    public function openModal(): void
    {
        $this->isOpen = true;
    }

    public function closeModal(): void
    {
        $this->isOpen = false;
    }
    public function render()
    {
        return view('livewire.modal');
    }
}
