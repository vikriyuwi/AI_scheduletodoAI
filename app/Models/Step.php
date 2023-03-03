<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;

    protected $table = 'step';
    protected $primaryKey = 'step_id';
    
    protected $fillable = [
        'step_name',
        'todo_id',
        'step_detail',
        'step_isdone',
        'created_at',
        'updated_at'
    ];
}
