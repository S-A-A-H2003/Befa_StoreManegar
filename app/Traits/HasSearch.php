<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasSearch {
    public function scopeSearch(Builder $builder , $request , $fileds)
    {
        $value = $request->input('search');

        foreach ($fileds as $filed) {
            $builder->where($filed ,"like","%{$value}%");
        }
    }
}
