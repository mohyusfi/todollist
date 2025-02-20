<?php


namespace App\Services\TodolistServiceImpl;

use App\Models\Todolist;
use App\Services\TodolistService;

class TodolistServiceImpl implements TodolistService {
    public function save(array $todo): bool
    {
        $todolist = new Todolist($todo);
        return $todolist->save();
    }

    public function update(array $todo, int $id): bool
    {
        return Todolist::find($id)->update($todo);
    }

    public function delete(int $id): ?bool
    {
        $todo = Todolist::findOrFail($id);
        return $todo->delete();
    }
}

