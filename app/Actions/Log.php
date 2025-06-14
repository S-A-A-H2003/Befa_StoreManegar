<?php

namespace App\Actions;

use App\Models\Log as ModelsLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Log{

    public function __invoke($TableName , $ProccessName , $Proccess)
    {
        ModelsLog::create([
            'user_id' => Auth::id(),
            'information' => json_encode([
                'table_name' => $TableName ,
                'proccess_name' => $ProccessName ,
                'proccess' => $Proccess
            ]),
        ]);
    }
}
