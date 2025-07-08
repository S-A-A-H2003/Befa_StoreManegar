<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Policies\LogPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LogController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny' , Log::class);
        $logs = Log::orderBy('created_at' ,'desc')->paginate('15');
        return view('crud.log.index' , compact('logs'));

    }
}
