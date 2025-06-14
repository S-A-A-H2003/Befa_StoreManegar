<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::paginate('15');
        return view('crud.log.index' , compact('logs'));

    }
}
