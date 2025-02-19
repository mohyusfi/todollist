<?php


namespace App\Services\TodolistServiceImpl;

use App\Models\Todolist;
use App\Services\TodolistService;

class TodolistServiceImpl implements TodolistService {
    public function save(array $todo): void
    {
        Todolist::create($todo);
    }
}

