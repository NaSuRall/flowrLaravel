<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listeTemplate extends Model
{
    use HasFactory;
    protected $table = 'liste_template';


    protected $fillable = ['liste_id','user_id','name', 'description', 'Lien'];
    public $timestamps = true;
}
