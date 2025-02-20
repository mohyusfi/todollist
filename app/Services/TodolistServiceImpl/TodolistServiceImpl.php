<?php


namespace App\Services\TodolistServiceImpl;

use App\Models\Todolist;
use App\Services\TodolistService;

class TodolistServiceImpl implements TodolistService {
    public function save(array $todo): Todolist
    {
        return Todolist::create($todo);
    }

    public function update(array $todo, int $id): void
    {

    }

    public function delete(int $id): ?bool
    {
        $todo = Todolist::find($id);
        return $todo->delete();
    }
}

