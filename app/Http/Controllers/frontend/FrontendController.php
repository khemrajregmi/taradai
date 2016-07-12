<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use Hash;
use App\UserInfo;
use App\Events;
use App\UserAttendance;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
class FrontendController extends Controller
{
    
    public function index()
    {
        // $event = Events::all();
        $event = DB::table('events')->get();
        $log = DB::table('logtable')
                ->where(DB::raw('date(date)'), Carbon::today())
                ->get();




        // $events =json_decode($event)
        // echo "<pre>";
        // print_r($log);
        // echo "</pre>";
        // exit();
        return view('frontend.frontpage')
        ->with('event',$event)
        ->with('log',$log)
        ->with('title','Dashboard');
    }

    public function employerLogin(Request $request){
        // return "helllo";
        //  {
        // if ($request->session()->has('userId'))
        //     return redirect('admin/dashboard');
        
        return view('login.login')->with('title', 'Employer Login');
    }



    public function __construct(Request $response)
    {
        echo $response->session()->get('userID');
    }


    	// return "hello this is loading fron frontend Controller";
	// 	return view('login.login')
	// 	->with('title', 'Login');
		
	// }


     public function postemployerLogin(Request $request){
        // return "ae hello";


        $userId = userinfo::all()
        ->where('email', $request->email)->where('password',md5($request->password))
        ->first();

        // return $userId;

      
    
        if(is_null($userId)){

            // echo "hello this is testing";
            return "error";
        }
        else {
            $isAdmin = userinfo::all()
            ->where('email', $request->email)->where('password',md5($request->password))
            ->first();

            // echo "hello sudip bro congrt ";
            // return $isAdmin;

          // $isAdmin['IsSuperAdmin'];
            if($isAdmin['IsSuperAdmin']== "Y" ){
                session(['userId' => $userId->user_id]);
                    // return redirect('admin/dashboard')
                    // ->with('success', 'You have successfully logged in!')
                    // ->with('title', 'Admin :: Dashboard')
                    // ->with('heading', 'Admin :: Dashboard');
                return "successadmin";
            }
                else
                {
                    
                   
                    session(['userId' => $userId->user_id]);
                    $userId = $request->session()->get('userId');
                    // return $userId;
                    // $current_time = Carbon::now()->toDayDateTimeString();this information is not stored in database
                    // $current_time = Carbon::now();
                    date_default_timezone_set('Asia/Kathmandu');
                    // $current_time = date('Y-m-d g:i:s' );
                    $current_time = Carbon::now();
                    $date = date('Y-m-d');
                    
                     $select = userattendance::where('user_id','=', (int)$userId )
                    ->where('todaydate', '=' , $date)
                    ->first();

                    // return "hello";

                    // return $select['attendance_status'];

                    if(is_null($select)){
                         // return 'uneedtoinsert';
                          DB::table('userattendance')->insert(
                                         array(
                                                'user_id'   =>   $userId,
                                                'login_time'   =>   $current_time,
                                                'logout_time'   =>   $current_time,
                                                'IPaddress'   =>   $_SERVER['REMOTE_ADDR'],
                                                'attendance_status'   =>   'P',
                                                'todaydate'   =>   $date,
                                                'created_at' => $current_time,
                                                'updated_at' => $current_time
                                                )
                                        );


                          $name = DB::table('userinfo')
                                             ->select('fullname')
                                             ->where('user_id', '=', $userId)
                                             ->get();
                                             // return $name;


                                                foreach ($name as $key) {
                                                   $log= $key->fullname;
                                                }

                          DB::table('logtable')->insert(
                                         array(
                                                'title'   =>   'Attendence',
                                                'description'   =>   $log."   is present Today",
                                                'date' => $current_time
                                                )
                                        );
                                       return "sucessemployee";
                             }
                         else
                           { 

                            return "sucessemployee";
                        // return 'noneedtoinsert';
                          
                            }
                 
                   
                    }
        }


       
   
        
    }




}
