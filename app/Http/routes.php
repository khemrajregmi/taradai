<?php

// DB_CONNECTION=mysql
// DB_HOST=50.62.209.196:3306
// DB_PORT=3306
// DB_DATABASE=tagattendance
// DB_USERNAME=tagattendance
// DB_PASSWORD=TagNepal

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

	// Route::get('/dashboard', function () {
	//     return view('admin.dashboard');
	// });

	//frontend section starts
	Route::get('/','frontend\FrontendController@index');
	//frontend section end

	//login Section for the admin starts
	// Route::get('dashboard', 'frontend\FrontendController@employerLogin');
	Route::get('/login', 'frontend\FrontendController@employerLogin');
	// Route::get('dashboard/login', 'frontend\FrontendController@employerLogin');
	Route::post('/login', 'frontend\FrontendController@postemployerLogin');
	//login Section for the admin ends

	//admin section starts
	Route::get('admin/dashboard/logout', 'admin\HomeController@Logout');
	Route::get('admin/dashboard', 'admin\HomeController@adminDashboard');
	Route::get('admin/dashboard/employeelist', 'admin\HomeController@employerlist');

	Route::get('admin/dashboard/employeelist1', 'admin\HomeController@employerlist1'); //test

	Route::get('admin/dashboard/employee/add', 'admin\HomeController@addEmployee');
	Route::post('admin/dashboard/employee/add', 'admin\HomeController@postaddEmployee');

	// Route::get('admin/dashboard/employee/', 'admin\HomeController@editEmployee');
	Route::get('admin/dashboard/employee/{id}', 'admin\HomeController@editEmployee');
	Route::post('admin/dashboard/employee/update', 'admin\HomeController@updateEmployee');
	Route::get('admin/dashboard/payroll', 'admin\HomeController@payrollEmployee');
	Route::get('admin/dashboard/eventslist', 'admin\HomeController@Eventslist');
	Route::post('admin/dashboard/search', 'admin\HomeController@Eventslistsearch');
	Route::post('admin/dashboard/monthsearch', 'admin\HomeController@Monthsearch');
	Route::post('admin/dashboard/changepass', 'admin\HomeController@changePass');
	Route::get('admin/dashboard/changepassword', 'admin\HomeController@changePassword');
	// Route::post('admin/dashboard/search', function () {
	//     return "hello";
	// });
	Route::post('admin/dashboard/addevents', 'admin\HomeController@addEvents');
	Route::get('admin/dashboard/editevents/{id}', 'admin\HomeController@editEvents');
	Route::post('admin/dashboard/editevents', 'admin\HomeController@postEvents');
	Route::get('admin/dashboard/deleteevent/{id}', 'admin\HomeController@deleteEvents');
	Route::get('admin/dashboard/payrolldetail/{id}', 'admin\HomeController@payrollDetail');
	Route::post('admin/dashboard/payrolladd', 'admin\HomeController@payrollAdd');
	Route::get('admin/dashboard/employee/remove/{id}', 'admin\HomeController@removeEmployee');
	Route::get('admin/dashboard/attendencelist/{id}', 'admin\HomeController@employeeAttendance');
	//admin section ends


	//employer section starts
	// Route::post('employer/login', 'frontend\FrontendController@postemployerLogin');
	Route::get('employer/login', 'frontend\FrontendController@postemployerLogin');
	Route::get('employer/dashboard', 'employer\EmployerController@index');
	// Route::post('employer/dashboard/changepass', 'employer\EmployerController@changePass');
	Route::post('employer/dashboard/changepassword', 'employer\EmployerController@changePassword');
	Route::get('employer/dashboard/changepass', 'employer\EmployerController@employeePass');
	Route::post('employer/dashboard/break', 'employer\EmployerController@Break');
	Route::get('employer/attendence', 'employer\EmployerController@employerAttendence');
	Route::get('employer/dashboard/excel', 'employer\EmployerController@get_export');
	Route::get('employer/dashboard/logout', 'employer\EmployerController@Logout');
	//employer section starts



	Route::get('admin/dashboard/employee/attendance', 'admin\AttendenceController@index');

	Route::get('admin/dashboard/employee/payroll', 'admin\PayrollController@index');
	






