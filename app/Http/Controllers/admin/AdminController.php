<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{


     public function employerLogin(Request $request)
    {
        if ($request->session()->has('userId'))
            return redirect('admin/dashboard');
        
        return view('backend.jobemployerlogin')->with('title', 'Employer Login');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(Request $response)
    {
        echo $response->session()->get('userID');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
     public function getLogout(Request $request)
    {
        $request->session()->forget('userId');
        return redirect('/dashboardlogin')->with('success','Successfully logged out!');
    }

}
