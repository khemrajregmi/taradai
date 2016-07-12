@extends('layouts.frontendtemplate')
@section('page_content')
	<body> 
     <div id="wrapper">

      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('login')}}">Admin</a>
            </div>
        </nav>

        <div id="page-wrapper-nosidebar">
            <!-- <div class="container-fluid"> -->
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">{{$title}}</h1>
                        @if(Session::has('success'))
                                <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            <!-- </div> -->
            <div class="row">
                <div class="col-lg-8">
                    
                   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-clock-o fa-fw"></i>Calendar For Attendance Please Click on today!!!
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="page">
                                <!-- <h2> Calendar For Attendance</h2> -->
                               
                                <div style="width:100%; max-width:600px; display:inline-block;">
                                    <div id='calendar'></div>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                            @foreach($log as $loged)
                            <?php
                            // echo "<pre>";
                            // print_r($loged);
                            // echo "</pre>";
                            ?>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> {{$loged->description}}
                                    <span class="pull-right text-muted small"><em><?php
                                    date_default_timezone_set('Asia/Kathmandu');
                                        // $timediff = strtotime($loged->date) - strtotime(date('Y-m-d H:i:s'));

                                         $timediff = strtotime(date('Y-m-d H:i:s'))-strtotime($loged->date);
                                       
                                        // echo "hello this is ".$timediff;
                                                   if(86400 < $timediff)
                                                                        echo (round($timediff/86400) == 1)?'1 day ago':round($timediff/86400).' days ago';
                                                                    else if((86400 > $timediff) && ($timediff > 3600))
                                                                        echo (round($timediff/3600) == 1)?'1 hour ago':round($timediff/3600).' hours ago';
                                                                    else if((3600 > $timediff) && ($timediff > 60))
                                                                        echo (round($timediff/60) == 1)?'1 minute ago':round($timediff/60).' minutes ago';
                                                                    else {
                                                                        echo $timediff.' seconds ago';
                                                                    }
                                                                    ?></em>
                                    </span>
                                </a>
                            @endforeach
                              
                            </div>
                            <!-- /.list-group -->
                            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                  
                    
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>


    <!-- Modal -->
    
@endsection