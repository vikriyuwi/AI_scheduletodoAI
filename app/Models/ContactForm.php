<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;

    protected $table = 'contact_form';
    protected $primaryKey = 'cf_id';

    protected $fillable = [
        'cf_id',
        'cf_name',
        'cf_email',
        'cf_phone',
        'cf_subject',
        'cf_message',
        'cf_case_closed'
    ];
}
