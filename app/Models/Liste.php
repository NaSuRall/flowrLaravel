<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liste extends Model
{
    use HasFactory;
    protected $table = 'lists';


    protected $fillable = ['group_id','user_id','name', 'description', 'Lien'];
    public $timestamps = true;

    public function listeTemplates()
    {
        return $this->hasMany(listeTemplate::class, 'liste_id');
    }
}
