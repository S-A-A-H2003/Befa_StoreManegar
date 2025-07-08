<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dashbord;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function __invoke()
    {
        Gate::authorize('dashbord', Dashbord::class);
        $status1 = Product::where('price', '<', 25)->count();
        $status2 = Product::where('price', '>=', 25)->where('price', '<=', 50)->count();
        $status3 = Product::where('price', '>', 50)->where('price', '<=', 75)->count();
        $status4 = Product::where('price', '>', 75)->count();
        $productNumber = Product::count();
        $customerNumber = User::where('role' , 'user')->count();
        $categoryNumber = Category::count();
        $lessOfTowRating = Product::where('Rating' , '<' , 2)->count();
        $moreOfTowRating = Product::where('Rating' , '>' , 2)->count();
        return view('dashboard' , compact('status1', 'status2', 'status3', 'status4' , 'productNumber' , 'customerNumber' , 'categoryNumber' , 'lessOfTowRating' , 'moreOfTowRating'));
    }
}
