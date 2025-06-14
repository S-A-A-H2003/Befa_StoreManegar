<?php

namespace App\Observers;

use App\Actions\Log;
use App\Models\Product;

class ProductObserv
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        $Log = new Log();
        $Log('product' , 'created' , $product);
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        $Log = new Log();
        $Log('product' , 'updated' , $product);
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        $Log = new Log();
        $Log('product' , 'deleted' , $product);
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        $Log = new Log();
        $Log('product' , 'restored' , $product);
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        $Log = new Log();
        $Log('product' , 'forceDeleted' , $product);
    }
}
