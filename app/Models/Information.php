<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Information extends Model
{
    use HasUuids;

    protected $fillable = [
       "photo" , "city" , "address" , "date_barth" , "age" , "gender" , "user_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPhotoAttribute($value)
    {
        if ($value) {
            return Storage::url($value);
        }

        return 'https://flowbite.s3.amazonaws.com/blocks/application-ui/products/imac-front-image.png';
    }
}
