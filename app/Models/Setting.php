<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Setting extends Model
{
    use HasUuids;

    protected $fillable = [
       "name" , "value" , "user_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function get($name)
    {
        return static::query()->where("user_id" , Auth::id())->where("name" , $name)->value("value");
    }

    public static function set($name , $value)
    {
        static::query()->updateOrCreate(
        [
            "name" => $name,

        ],[
            "value" => $value,
            "user_id" => Auth::id(),

        ]);
    }
}
