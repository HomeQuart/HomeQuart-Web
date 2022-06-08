<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Auth;
use Carbon\Carbon;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        if(Auth::user()->role_name == 'Patient')
        {
        $data = DB::table('send_reports')->get();
        $date = Carbon::now();
        $current_time = (int) date('Hi');
            if(($current_time <= 1159) && ( Auth::user()->count_report != '1') && (Auth::user()->status == 'Active')){
                Toastr::warning('You need to send a Report for Morning','Warning');
            }
            elseif(($current_time >= 1200) && ($current_time <= 1659) && ( Auth::user()->count_report != '2') && (Auth::user()->status == 'Active')){
                Toastr::warning('You need to send a Report for Afternoon','Warning');
            }
            elseif(($current_time >= 1700) && ($current_time <= 2359) && ( Auth::user()->count_report != '3') && (Auth::user()->status == 'Active')){
                Toastr::warning('You need to send a Report for Evening','Warning');
            }

            if($date->format('Y-m-d') == Auth::user()->qperiod_end)
            {
                $update = [

                    'status'            => 'Done',
                ];
                User::find(auth()->user()->id)->update(($update));
            }
        }

        $data = DB::table('users')->get();
        $users = DB::table('users')->count();
        $user_activity_logs = DB::table('user_activity_logs')->count();
        $activity_logs = DB::table('activity_logs')->count();
        $positive_counter = DB::table('positive_counter')->count();
        $counter = DB::table('positive_counter')->get();
        $purok = DB::table('purok')->get();

        return view('home',compact('data','users','user_activity_logs','activity_logs','positive_counter','counter','purok'));


    }
}
