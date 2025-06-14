<?php

namespace App\Observers;

use App\Actions\Log;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryObserv
{
    /**
     * Handle the Category "created" event.
     */
    public function created(Category $category): void
    {
        $Log = new Log();
        $Log('category' , 'created' , $category);
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Category $category): void
    {
        $Log = new Log();
        $Log('category' , 'updated' , $category);
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        $Log = new Log();
        $Log('category' , 'deleted' , $category);
    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Category $category): void
    {
        $Log = new Log();
        $Log('category' , 'restored' , $category);
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        $Log = new Log();
        $Log('category' , 'forceDeleted' , $category);
    }

}
