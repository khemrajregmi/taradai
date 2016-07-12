<?php

namespace App\Http\Controllers\employer;

use Illuminate\Http\Request;
use App\UserInfo;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\UserAttendance;
use Carbon\Carbon;
use DB;
class EmployerController extends Controller
{


    public function __construct(Request $request)
    {
         
        if (!$request->session()->has('userId'))
            $this->middleware('auth');
        
        $this->userId = $request->session()->get('userId');
             
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function logout(Request $request){
    	// return "hello";
        $userId = $request->session()->get('userId');
        $date = date('Y-m-d');
        // date_default_timezone_set('Asia/Kathmandu');
        // $current_time = date('Y-m-d g:i:s' );
        date_default_timezone_set('Asia/Kathmandu');
        $current_time = Carbon::now();
		 // Auth::logout();
        DB::table('userattendance')
            ->where('user_id','=', (int)$userId )
            ->where('todaydate', '=' , $date)
            ->update(['logout_time' => $current_time]);
        $request->session()->forget('userId');
        Auth::logout();
        return redirect('/')->with('success','Successfully logged out!');
		
	}

	


	public function index(Request $request){
		// echo "this is dashboard";
        // exit();
        $month= date('m');
        $userId = $request->session()->get('userId');
        $userdata = userinfo::where('user_id',$userId)->get();
        $attendancedata = UserAttendance::where('user_id',$userId)
        ->whereMonth('created_at', '=', $month)
        ->get();
        $totaldata = UserAttendance::where('user_id',$userId)
        ->whereMonth('created_at', '=', $month)
        ->get()->count();
        date_default_timezone_set('Asia/Kathmandu');
        $current_time = Carbon::now()->toDayDateTimeString();
 
        // $date = date('Y-m-d h:i:s');
        // echo $userdata;
        // exit(); 
    
        return view('employerbackend.employerdashboard')
        ->with('success', 'You have successfully logged in!')
        ->with('title', 'Employee :: Dashboard')
        ->with('userdata', $userdata)
        ->with('totaldata', $totaldata)
        ->with('attendancedata', $attendancedata)
        ->with('current_time', $current_time)
        ->with('userId', $userId)
        ->with('heading', 'Employee :: Dashboard');	
	}

    public function employerAttendence(Request $request,$take=10, $page=1){
        $take = 5;
        $month= date('m');
        // echo $month;
        // exit();
        $offset = ($page - 1) * $take;  
        $userId = $request->session()->get('userId');
        $userdata = userinfo::where('user_id',$userId)->get();
        $attendancedata = UserAttendance::where('user_id',$userId)
        ->whereMonth('created_at', '=', $month)
        ->get();
        $totaldata = UserAttendance::where('user_id',$userId)
        ->whereMonth('created_at', '=', $month)
        ->get()->count();
        date_default_timezone_set('Asia/Kathmandu');
        $current_time = Carbon::now()->toDayDateTimeString();
         // $current_time = date('Y-m-d g:i:s' );
        // $date = date('Y-m-d h:i:s');
        // echo $userdata;
        // exit(); 
    
        return view('employerbackend.employerattendance')
        ->with('success', 'You have successfully logged in!')
        ->with('title', 'Employee :: Attendance')
        ->with('page', $page)
        ->with('take', $take)
        ->with('userdata', $userdata)
        ->with('totaldata', $totaldata)
        ->with('attendancedata', $attendancedata)
        ->with('current_time', $current_time)
        ->with('heading', 'Employee :: Attendance'); 
    }


      public function Break(Request $request){
       $date= date("Y-m-d");
        // secho $request->break;
       DB::table('userattendance')
            ->where('todaydate', $date)->update(
                                         array(
                                                'break'   =>   $request->break

                                                )
                                        );
        // UserAttendance::where('todaydate','=',$date)->update('break','=', $request->break);

        return redirect('employer/attendence');
            
      }

      public function employeePass(Request $request){

          $userId = $request->session()->get('userId');
        return view('employerbackend.changepass')
        //->with('success', 'You have successfully logged in!')
        ->with('title', 'Change::Password')
        ->with('userId', $userId)
        ->with('heading', 'Change::Password'); 
      }


        public function changePassword(Request $request){
            // print_r($request->all());
            // exit();

           DB::table('userinfo')
            ->where('user_id', $request->id)->update(
                                         array(
                                                'password'   =>   md5($request->password)

                                                )
                                        );
                                       return "sucesss";
      }
}
