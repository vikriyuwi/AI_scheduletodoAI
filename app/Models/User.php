<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'user_id';
    
    protected $fillable = [
        'user_gmail',
        'user_google_id',
        'user_gender',
        'user_phone',
        'created_at',
        'updated_at'
    ];
}
