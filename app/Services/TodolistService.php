<?php

namespace App\Services;

use App\Models\Todolist;

interface TodolistService {
    public function save(array $todo): Todolist;
    public function update(array $todo, int $id): void;
    public function delete(int $id): ?bool;
}
