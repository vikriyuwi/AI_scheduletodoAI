<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todo';
    protected $primaryKey = 'todo_id';
    
    protected $fillable = [
        'todo_name',
        'user_id',
        'todo_difficulty_level',
        'todo_link',
        'todo_deadline',
        'created_at',
        'updated_at'
    ];
}
