<?php

namespace App\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public bool $isOpen = false;
    public string $btnOpen, $btnClose, $btnSubmit;
    public string $titleModal;
    public string $method;

    public function mount(string $btnOpen, string $btnClose, string $btnSubmit, string $titleModal, string $method): void
    {
        $this->btnOpen = $btnOpen;
        $this->btnClose = $btnClose;
        $this->btnSubmit = $btnSubmit;
        $this->titleModal = $titleModal;
        $this->method = $method;
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
