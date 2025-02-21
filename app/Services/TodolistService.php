<?php

namespace App\Services;

interface TodolistService {
    public function save(array $todo): bool;
    public function update(array $todo, int $id): bool;
    public function delete(int $id): ?bool;
}
