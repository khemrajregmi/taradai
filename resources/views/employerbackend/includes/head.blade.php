    
<?php echo
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<!-- <meta http-equiv="cache-control" content="private, max-age=0, no-cache">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="expires" content="0"> -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="_token" content="{!! csrf_token() !!}"/>
<script src="{{url('resources/assets/admin/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{url('resources/assets/admin/js/bootstrap-datepicker.js')}}"></script>

<script src="{{url('http://parsleyjs.org/dist/parsley.min.js')}}"></script>

<title>{{$title}}</title>


<link href="{{url('http://parsleyjs.org/src/parsley.css')}}" rel="stylesheet">
<link href="{{url('resources/assets/admin/css/bootstrap.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{url('resources/assets/admin/css/circle.css')}}">
<link href="{{url('resources/assets/admin/css/datepicker3.css')}}" rel="stylesheet">
<link href="{{url('resources/assets/admin/css/styles.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{url('resources/assets/admin/plugin/Font-Awesome/css/font-awesome.css')}}" />


<!--Icons-->
<script src="{{url('resources/assets/admin/js/lumino.glyphs.js')}}"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>