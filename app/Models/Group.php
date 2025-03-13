<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    protected $table = 'groups';
    public $timestamps = true;



    protected $fillable = ['name', 'user_id', 'code'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public static function getByUserId() {
        return self::where('user_id', auth()->user()->id)->get();
    }

    public static function generateUniqueCode()
    {
        do {
            $code = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
        } while (self::where('code', $code)->exists());

        return $code;
    }

}
