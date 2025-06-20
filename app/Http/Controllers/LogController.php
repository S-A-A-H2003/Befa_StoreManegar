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
        //Gate::authorize('viewAny' , [LogPolicy::class]);
        $logs = Log::paginate('15');
        return view('crud.log.index' , compact('logs'));

    }
}
