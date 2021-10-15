<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ChartController extends Controller
{
    public function index()
    {
        $users = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');

        $months = User::select(\DB::raw("Month(created_at) as month"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('month');
        
        $userData = array(0,0,0,0,0,0,0,0,0,0,0,0);

        foreach($months as $index => $month) {
            $month = $month - 1;
            $userData[$month] = $users[$index]; 
        }

        // dd($userData);

        return view('chart', compact('userData'));
    }
}
