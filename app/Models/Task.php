<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'status',
        'reminder'
    ];

    protected $casts = [
        'due_date' => 'date',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
