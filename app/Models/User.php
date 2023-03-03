<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticableTrait;

    protected $table = 'user';
    protected $primaryKey = 'user_id';
    
    protected $fillable = [
        'user_name',
        'user_gmail',
        'user_google_id',
        'user_picture',
        'password',
        'user_gender',
        'user_phone',
        'user_token',
        'created_at',
        'updated_at'
    ];
}
