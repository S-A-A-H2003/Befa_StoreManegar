<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Policies\CustomerPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CustomerController extends Controller
{
    public function index()
    {
        //Gate::authorize('viewAny' , [CustomerPolicy::class]);
        $users = User::paginate('15');
        return view('crud.customer.index' , compact('users'));

    }

    public function show(User $user)
    {
        //Gate::authorize('viewAny' , [CustomerPolicy::class]);
        return view('crud.customer.show' , compact('user'));
    }
}
