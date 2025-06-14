<?php

namespace App\Models;

use App\Observers\CategoryObserv;
use App\Traits\HasSearch;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory , HasUuids , HasSearch;

    public static function booted()
    {
        static::observe(new CategoryObserv());
    }

    protected $fillable = [
        'name' , 'picture'
    ];

    public function products()
    {
       return $this->belongsToMany(Product::class , 'category_products');
    }

    public function getPictureAttribute($value)
    {
        if ($value) {
            return Storage::url($value);
        }

        return 'https://flowbite.s3.amazonaws.com/blocks/application-ui/products/imac-front-image.png';
    }
}
