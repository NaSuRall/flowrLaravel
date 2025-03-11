<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liste extends Model
{
    use HasFactory;
    protected $table = 'lists';


    protected $fillable = ['user_id','name', 'description', 'lien'];
    public $timestamps = true;
}
