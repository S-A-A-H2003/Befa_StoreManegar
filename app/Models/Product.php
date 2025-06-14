<?php

namespace App\Models;

use App\Observers\ProductObserv;
use App\Traits\HasSearch;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory , HasUuids , HasSearch;

    public static function booted()
    {
        static::observe(new ProductObserv());
    }

    protected $fillable = [
        "name" ,
        "picture" ,
        "price" ,
        "price_before" ,
        "discription" ,
        "rating" ,
        "inventory" ,
        "options" ,
    ];

    protected $casts = [
        "options" => "object" ,
    ];

    public function categorys()
    {
       return $this->belongsToMany(Category::class , 'category_products');
    }

    public function getPictureAttribute($value)
    {
        if ($value) {
          return Storage::url($value);
        }

        return 'https://flowbite.s3.amazonaws.com/blocks/application-ui/products/imac-front-image.png';
    }
}
