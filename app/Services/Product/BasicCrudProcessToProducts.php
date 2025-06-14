<?php

namespace App\Services\Product;

use App\Events\SendMailToNewProductEvent;
use App\Models\Product;

class BasicCrudProcessToProducts
{
    public function index($request)
    {
       return Product::search($request ,['name'])->paginate("15");
    }

    public function store($validated)
    {
        $product = Product::create($validated);
        event(new SendMailToNewProductEvent());
    }
}

