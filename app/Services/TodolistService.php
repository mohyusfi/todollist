<?php

namespace App\Services;

interface TodolistService {
    public function save(array $todo): void;
}
