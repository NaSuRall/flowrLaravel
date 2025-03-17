<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Support extends Model
{
    use HasFactory;

    protected $table = 'support';
    protected $fillable = [
        'user_id',
        'object',
        'description',
        'piece_jointe',
        'email',
    ];
}
