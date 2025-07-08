<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Jetstream;

class UserController extends Controller
{
    public function create(){
        Gate::authorize('create' , User::class);
        return view('createNewAdmin');
    }

    public function store(Request $request){
        Gate::authorize('create' , User::class);
        $validation = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required']
        ]);

        $validation['role']= 'admin';

        $user = User::create($validation);
        return redirect()->route('customer.show' , $user->id);
    }
}
