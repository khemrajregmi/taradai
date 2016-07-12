<!DOCTYPE html>
<html lang="en">

<head>
    <!-- http://fullcalendar.io/docs/event_data/events_array/ -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{!! csrf_token() !!}"/>
 

    <title>  {{$title}} </title>
    <!-- new calender starts-->
    <script src="{{url('resources/assets/frontend/calender/jquery-3.0.0.js')}}"></script>  
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <script src="{{url('resources/assets/frontend/calender/js/bootstrap.min.js')}}"></script> 
    
    
    <script src="{{url('resources/assets/frontend/calender/lib/moment.min.js')}}"></script>
    
    <script src="{{url('resources/assets/frontend/calender/fullcalendar.min.js')}}"></script>
    <link href="{{url('resources/assets/frontend/calender/fullcalendar.css')}}" rel='stylesheet' />
    <link href="{{url('resources/assets/frontend/calender/fullcalendar.print.css')}}" rel='stylesheet' media='print' />
    

    <!-- new calender ends-->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
   <!--  <script src="/path/to/bootstrap/js/bootstrap.min.js"></script> -->


    <!-- <script src="{{url('resources/assets/frontend/calender/lib/jquery.min.js')}}"></script> -->
    

    <link href="{{url('resources/assets/frontend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{url('resources/assets/frontend/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('resources/assets/frontend/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <!-- <link href="{{url('resources/assets/frontend/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"> -->

   <!-- calender start -->
    
    <link rel="stylesheet" href="{{url('resources/assets/frontend/calender/css/monthly.css')}}">

    <!-- for Login -->

    <style>

    body {
        margin: 40px 10px;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }

    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }

</style>

   

    </head>
   