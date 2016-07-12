<?php

namespace App\Console;

use DB;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
         \App\Console\Commands\Inspire::class,

        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    { 
        $users = DB::table('userinfo')
                     ->all();
        
        foreach ($users as $user) {
          
         $schedule->call(function () {
         DB::table('userattendance')->insert(
                                         array(
                                                'user_id'   =>   $user['user_id'],
                                                'login_time'   =>   '',
                                                'logout_time'   =>  '' ,
                                                'IPaddress'   =>   '192.168.0.1' ,
                                                'attendance_status'   =>   'H',
                                                'todaydate'   =>   date('Y-m-d'),
                                                'created_at' => '2016-06-13 10:06:58',
                                                'updated_at' => '2016-06-13 10:06:58'
                                                )
                                        );
            })->everyMinute();
        }

       // ->sunday();
    }
}
