<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\UserInfo;
use App\UserAttendance;
use App\Events;
use App\Payroll;
use Carbon\Carbon;
use DB;
use Validator;

class HomeController extends Controller
{
   
public $userId = '';
    
    public function index()
    {
        //
    }

    public function __construct(Request $request)
    {
         
        if (!$request->session()->has('userId'))
            $this->middleware('auth');
        
        $this->userId = $request->session()->get('userId');
        // $userId = $request->session()->get('userId');
             
    }
    


    public function adminDashboard(Request $request)
    {   
        // echo "this is dashboard";
        // exit();
        $userId = $request->session()->get('userId');
        $userdata = userinfo::where('user_id',$userId)->get()->first();
        $log = DB::table('logtable')
                ->where(DB::raw('date(date)'), Carbon::today())
                ->get();
        // echo $userdata;
        // exit(); 
        $request->session()->flash('flash_message', 'Hello admin you are successfully logged in!');
        return view('admin.dashboard')
        ->with('success', 'You have successfully logged in!')
        ->with('title', 'Admin :: Dashboard')
        ->with('log', $log)
        ->with('userId', $userId)
        ->with('heading', 'Admin :: Dashboard');
       
        
    }


      public function Logout(Request $request)
    {
        // Auth::logout();
        $request->session()->forget('userId');
         Auth::logout();
        return redirect('/')->with('success','Successfully logged out!');
    }
    

     public function employerlist()
    {
         
        return view('admin.employeelist',[
            'datalist' => UserInfo::paginate(4)])
        // ->with('datalist', $datalist)
        // ->with('page', $page)
        // ->with('take', $take)
        // ->with('total_no', $total_no)
        ->with('title', 'Employer::List')
        ->with('search', '')
        ->with('heading', 'Employer:: List');
        
    }


    
      public function addEmployee()
    { 
        // return "hello";
        // exit();

        return view('admin.addemployee')
        ->with('title', 'Add :: Employee')
        ->with('heading', 'Add :: Employee');
       

    }



      public function postaddEmployee(Request $request)
    {
         // print_r($request->all());
        // print_r($input = Input::all());
        // print_r($fullname=Input::get('firstname').'   '.Input::get('lastname'));
        // exit();
        $userdata = array(
                            'username' => Input::get('username'),
                            'password' => md5(Input::get('password')),
                            'fullname' => Input::get('firstname').'   '.Input::get('lastname'),
                            'email' => Input::get('email'),
                            'address' => Input::get('address'),
                            'mobile' => Input::get('mobilenum'),
                            'phone' => Input::get('phonenum'),
                            'dob' => Input::get('dob'),
                            'IsSuperAdmin' => Input::get('isadmin'),
                            'status' => Input::get('status')       
                    );
     
               

                DB::table('userinfo')->insert($userdata);

                return redirect('admin/dashboard/employeelist');
       

    }



     


      public function editEmployee($slug ='')
    {
        
        $data = UserInfo::where('user_id', '=', $slug)->first();
                // echo "<pre>";
                // print_r($data);
                // echo "</pre>";
                // exit();
        return view('admin.editemployee')
        ->with('data', $data)
        ->with('title', 'Update :: Employee')
        ->with('heading', 'Update :: Employee');
            
    }

    public function updateEmployee(Request $request)
    {

        // return "helo this is testing";
        // exit();
        // echo $slug;
        // $employerId = $request->session()->get('employerId');
        // echo $slug;
        
        $formdata = $request->input('formdata');
        // echo $formdata['user_id'];
        // exit();
        // echo "<pre>";
        // print_r($formdata);
        // echo "</pre>";
        // exit();
        
        if(!is_null($formdata)) {           
        
            UserInfo::where('user_id','=',$formdata['user_id'])->update($formdata);
            return redirect('admin/dashboard/employeelist')
            ->with('title', 'Update Profile :: Dashboard')
            ->with('heading', 'Sucessfully::Updated');

            //  $data = jobEmployerUser::where('job_employer_user_id', '=', $employerId)->first();
        
            // return view('employerbackend.updateprofile')
            //     ->with('data', $data)
            //     ->with('title', 'Update Profile :: Dashboard')
            //     ->with('heading', 'Update Profile :: Dashboard');
        }

        return view('admin.editemployee')->with('success','Update password');
         
           
    }

    public function removeEmployee($slug ='')
    {
        // echo "this is remove section";
        // exit();
        UserInfo::where('user_id','=',$slug)->update('status','=', 'N');

          return redirect('admin/dashboard/employeelist')
            ->with('title', 'Remove :: Dashboard')
            ->with('heading', 'Sucessfully::Deactivated ');


    }

    public function payrollDetail($slug = '')
    {
        // print_r($request->all
        $id = $slug;
        // echo $id;
        // $id = Input::get('idd');
        // echo "the  reqired id is".$id;
        $month= date('m');
       

        // $array = json_decode(json_encode($user), True);
        $user = UserAttendance::where('user_id',$id)
        ->whereMonth('created_at', '=', $month)
        ->get();

        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";

        $totalattendence = UserAttendance::where('user_id',$id)
        ->whereMonth('created_at', '=', $month)
        ->get()->count();

        

        $username = UserInfo::where('user_id', $id)
        ->get();

        $payroll = Payroll::where('user_id',$id)
        ->get();

        $dataa = array( 'payroll' => $payroll, 'user' => $user, 'username' => $username, 'totalattendence' =>$totalattendence);
       

        // return view('admin.payrolldetail', $dataa);
        return view('admin.payrolldetail',$dataa)
                ->with('title','Payslip');



    }


     public function payrollAdd(Request $request)
    {
        // print_r($request->all());
        // return $request->size;
        // exit();

        $payroll = DB::table('payroll')->where('user_id', $request->id)->first();
        // return "hello bosss";
        // print_r($payroll);
        // return $payroll;

        if(!isset($payroll)){
            // echo "inserted";
              DB::table('payroll')->insert(
                                         array(
                                                'user_id'   =>   $request->id,
                                                'basic_pay'   =>   $request->title,
                                                'payroll_status'   =>   $request->size

                                                )
                                        );
                                       return "sucesss";
            // echo "hello this is testing";
            // return "error";
        }
        else{

            // echo $request->id;
         DB::table('payroll')
            ->where('user_id', $request->id)->update(
                                         array(
                                                'basic_pay'   =>   $request->title,
                                                'payroll_status'   =>   $request->size

                                                )
                                        );
                                       return "sucesss";
            //                            DB::table('users')
            // ->where('id', 1)
            // ->update(array('votes' => 1));
        }
        

    }




    public function payrollEmployee($page=""){
        // echo "Hello this is testing";
        // echo $page;
        // exit();
      
       $users = DB::table('userinfo AS ui')
            ->leftJoin('payroll AS p', 'ui.user_id', '=', 'p.user_id')
            ->where('ui.status', 'Y')
            ->select('ui.fullname',
                        'ui.user_id',
                        'p.basic_pay',
                        'p.payroll_status'
                        )
            ->orderBy('ui.user_id', 'asc')
            ->paginate(4);

        // $prebal = DB::table('previous_balance')
        //         ->where()
            // ->get();

        //       echo "<pre>";
        // print_r($users);
        // echo "</pre>";
        // exit();
         
        return view('admin.payroll', ['users' => $users])
        ->with('title', 'Payroll')
        ->with('take', '$take')
        ->with('page', '$page')
        ->with('search', '')
        ->with('heading', 'Payroll');
    }



   

    public function employeeAttendance($slug =''){
        $month= date('m');
       // echo "you are here".$month;
       // exit();
        // $slug='';
        // return $slug;
       
        
          
        // $userId = $request->session()->get('userId');
         //
        $userdata = userinfo::where('user_id',$slug)->get();
        // return $userdata;
        // $attendancedata = UserAttendance::where('user_id',$slug)->get();
         $attendancedata = UserAttendance::where('user_id',$slug)
        ->whereMonth('created_at', '=', $month)
        ->get();
        $totaldata = UserAttendance::where('user_id',$slug)->get()->count();

        date_default_timezone_set('Asia/Kathmandu');
        $current_time = Carbon::now()->toDayDateTimeString();
      

        return view('admin.employeeattendance')
        ->with('title', 'Employee :: Attendance')
        // ->with('page', $page)
        // ->with('take', $take)
        ->with('userdata', $userdata)
        ->with('totaldata', $totaldata)
        ->with('attendancedata', $attendancedata)
        ->with('current_time', $current_time)
        ->with('heading', 'Employee :: Attendance'); 
    }


	

    public function Eventslist(Request $request){

         // $take = 10;
        // echo $slug;
        // print_r($request->all());
        // exit();
        // $offset = ($page - 1) * $take;           // return "this is the event section";
        $result = DB::table('events')->paginate(4);
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        // exit();
        return view('admin.events',['result' => $result])
        // ->with('page', $page)
        // ->with('take', $take)
        // ->with('result', $result)
        ->with('title', 'Events')
        ->with('heading', 'Employee :: Events'); 
    }


    public function addEvents(Request $request){
        // print_r($request->all());
         DB::table('events')->insert(
                                         array(
                                                'title'   =>   $request->title,
                                                'start'   =>   $request->startdate,
                                                'end'   =>   $request->edate,
                                                'url'   =>   $request->url


                                                )
                                        );
                                       return "sucesss";
    }

     public function Eventslistsearch(Request $request){
       
        // echo "hello";
        // print_r($request->search);
        $results = UserInfo::where('fullname', 'LIKE', '%'. $request->search .'%')
        ->orWhere('address', 'LIKE', '%'. $request->search .'%')
        ->orWhere('username', 'LIKE', '%'. $request->search .'%')
        ->paginate(8);

       
        return view('admin.employeelist',[
            'datalist' => UserInfo::where('fullname', 'LIKE', '%'. $request->search .'%')
            ->orWhere('address', 'LIKE', '%'. $request->search .'%')
            ->orWhere('username', 'LIKE', '%'. $request->search .'%')
            ->paginate(8)])
        ->with('title', 'Employer::List')
        ->with('heading', 'Employer:: List');


        // echo "<pre>";
        // print_r($results);
        // echo "</pre>";
        // exit();
     }
     
     public function Monthsearch(Request $request){
       
        // echo "hello";
        // print_r($request->all());
        // exit();

        $month= $request->select;
         // $month= date('m');
        $slug= $request->id;
        // echo $month;

        // echo "     ";
        // echo $slug;
        // exit();
        $userdata = userinfo::where('user_id',$slug)->get();
         $attendancedata = UserAttendance::where('user_id',$slug)
        ->whereMonth('created_at', '=', $month)
        ->get();

        // echo "<pre>";
        // print_r($attendancedata);
        // echo "</pre>";
        // exit();
        
        $totaldata = UserAttendance::where('user_id',$slug)->get()->count();

        date_default_timezone_set('Asia/Kathmandu');
        $current_time = Carbon::now()->toDayDateTimeString();
      

        return view('admin.searchattendance')
        ->with('title', 'Employee :: Attendance')
        ->with('userdata', $userdata)
        ->with('totaldata', $totaldata)
        ->with('attendancedata', $attendancedata)
        ->with('current_time', $current_time)
        ->with('heading', 'Employee :: Attendance'); 


        
     }



    public function editEvents($slug=''){
        // print_r($request->all());
        // exit();
       echo $slug;
       // return $slug;
        $result = events::where('event_id',$slug)->get();
        // echo "<pre>";
        // return  json_encode($event);
        return view('admin.editevents')
        // ->with('page', $page)
        // ->with('take', $take)
        ->with('result', $result)
        ->with('title', 'Events')
        ->with('heading', 'Update :: Events');
    }

    


    public function postEvents(Request $request){

       // echo "This is delete section";
        // echo $slug;
        // print_r($request->all());
        DB::table('events')
            ->where('event_id', $request->id)->update(
                                         array(
                                                'title'   =>   $request->title,
                                                'start'   =>   $request->startdate,
                                                'end'   =>   $request->edate,
                                                'url'   =>   $request->url

                                                )
                                        );

      return redirect('admin/dashboard/eventslist')
            ->with('title', 'Eventlist')
            ->with('heading', 'Sucessfully::Updated ');
    }


     public function deleteEvents($slug=''){
        DB::table('events')->where('event_id', $slug)->delete();
        return redirect('admin/dashboard/eventslist')
            ->with('title', 'Eventlist')
            ->with('heading', 'Sucessfully::Deleted ');
     }


       public function changePass(Request $request)
    {
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



    public function changePassword(Request $request){

        $userId = $request->session()->get('userId');
        return view('admin.changepass')
        //->with('success', 'You have successfully logged in!')
        ->with('title', 'Change::Password')
        ->with('userId', $userId)
        ->with('heading', 'Change::Password'); 
      }




 public function deuUpdate(Request $request)
    {
       // print_r($request->all());
        // exit();
        // DB::table('payroll')
        //     ->where('user_id', $request->id)->update(
        //                                  array(
        //                                         'pre_balance'   =>   2;

        //                                         )
        //                                 );
        //                                return "sucesss";
        }

}
