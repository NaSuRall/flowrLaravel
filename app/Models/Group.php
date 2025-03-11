<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    public $timestamps = true;



    protected $fillable = ['name', 'user_id', 'code'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function groups(){
        return $this->hasMany(Group::class);
    }

    public static function getByUserId() {
        return self::where('user_id', auth()->user()->id)->get();
    }
}
