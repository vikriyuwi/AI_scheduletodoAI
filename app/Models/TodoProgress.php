<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoProgress extends Model
{
    use HasFactory;

    protected $table = 'todo_progress';

    public function Todo()
    {
        return $this->belongsTo('App\Models\Todo','todo_id','todo_id');
    }
}
