<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Todolist extends Model
{
    /** @use HasFactory<\Database\Factories\TodolistFactory> */
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "status",
        "priority",
        "deadline",
        "created_by",
        "team_id"
    ];

    protected function casts(): array
    {
        return [
            "created_at" => "datetime",
            "updated_at" => "datetime"
        ];
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
