<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $users = User::paginate('15');
        return view('crud.customer.index' , compact('users'));

    }

    public function show(User $user)
    {
        return view('crud.customer.show' , compact('user'));
    }
}
