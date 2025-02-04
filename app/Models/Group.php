<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    public $timestamps = true;

    protected $fillable = ['user_id', 'name', 'created_at', 'updated_at'];

    public static function getByUserId() {
        return self::where('user_id', auth()->user()->id)->get();
    }
}
