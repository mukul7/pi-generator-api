<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    //
    public function __invoke(Request $request)
    {
        $this->validate($request,[
            'calculationTime' => 'required|numeric|between:10,10000'
        ]);
        $endTime = Carbon::now()->add($request->query('calculationTime'), 'milliseconds');
        // $piString = $this->algorithm(1,0.0,$endTime);
        $piString = $this->algorithm($endTime);
        return $piString;
    }


    public function algorithm($endTime)
    {
        $pi = 4;
        $top = 4;
        $bot = 3;
        $minus = TRUE;

        for ($i = 0; Carbon::now()->lt($endTime); $i++) {
            $pi += ($minus ? - ($top / $bot) : ($top / $bot));
            $minus = ($minus ? FALSE : TRUE);
            $bot += 2;
        }
        return $pi;
    }
}
