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
        'todo_note',
        'user_id',
        'todo_difficulty_level',
        'todo_link',
        'todo_deadline',
        'todo_weight',
        'todo_deadline_weight',
        'todo_level_weight',
        'todo_cluster',
        'todo_status',
        'created_at',
        'updated_at'
    ];

    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id','user_id');
    }

    public function Step()
    {
        return $this->hasMany('App\Models\Step','todo_id','todo_id');
    }

    public function TodoProgress()
    {
        return $this->hasOne('App\Models\TodoProgress','todo_id','todo_id');
    }
}
