@extends('layouts.dashboardtemplate')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">

				<h4 class="page-header">{{$heading}}</h4>
			</div  class="col-md-6">
				@if(Session::has('success'))
            		<div class="alert alert-success">
                        	{{Session::get('success')}}
                </div>
        @endif
                        {!! Form::open(array('url' => 'admin/dashboard/monthsearch','method' => 'POST', 'id' => 'signupForm', 'class'=>'form navbar-form navbar-right searchform')) !!}

                        @foreach ($userdata as $data)
                        {{ Form::hidden('id', $data->user_id) }}
                        @endforeach 
                   
                        {{ Form::select('select', 
                            array('' => '--Search-by-month--', 
                                  '01' => 'January',
                                  '02' => 'February',
                                  '03' => 'March',
                                  '04' => 'April',
                                  '05' => 'May',
                                  '06' => 'June',
                                  '07' => 'Jully',
                                  '08' => 'August',
                                  '09' => 'September',
                                  '10' => 'October',
                                  '11' => 'November',
                                  '12' => 'December'), null,
                                   array('class'=>'form-control','style'=>'' )) }}
                        <!-- {!! Form::text('search', null,
                                               array('required',
                                                    'class'=>'form-control',
                                                    'placeholder'=>'Search ...')) !!} -->
                         {!! Form::submit('Search',
                                                    array('class'=>'btn btn-default')) !!}
                     {!! Form::close() !!}
		</div><!--/.row-->
									
			{{$current_time}}
      
		
		  <!-- @foreach ($attendancedata as $data)
                             {{ ($data)}}
              @endforeach -->
        
    
     <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Advanced Table</div>
          <div class="panel-body">

            <!-- <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                <thead>
                <tr>
                    <th data-field="state" data-checkbox="true" >Item ID</th>
                    <th data-field="id" data-sortable="true">Item ID</th>
                    <th data-field="name"  data-sortable="true">Item Name</th>
                    <th data-field="price" data-sortable="true">Item Price</th>
                </tr>
                </thead>


            </table> -->

             
             <div class="table-responsive">
                              
                                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                      <thead>
                                          <tr>
                                              <th>S.No.</th>
                                              <th>Date</th>
                                              <th>Login Time</th>
                                              <th>logout Time</th>
                                              <th>Attendance</th>
                                              <th>Breaks</th>
                                              <th>Totol Present Hrs</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      
                                        <?php
                                         // $count = ($page-1) * $take;
                                        $count=1;
                                          ?>
                                        
                                        <?php
                                         $total=0;
                                         ?>
                                        @foreach ($attendancedata as $data)
                                          <!-- $totalDuration = $data->logout_time->diffInSeconds($data->login_time);
                                          gmdate('H:i:s', $totalDuration); -->

                                        
                                          <tr class="<?php
                                           // echo ($count++%2 == 0)?'odd':'even'?>"
                                           >
                                            <td>{{$count++}}</td>
                                                <!-- <td>{{$data->username}}</td> -->
                                                <td>{{$data->todaydate}}</td>
                                                <td>{{$data->login_time}}</td>
                                                <td>{{$data->logout_time}}</td>
                                                <td>{{$data->attendance_status}}</td>
                                                <td>{{$data->break}} hrs.</td>
                                                <td><?php 
                                                  $break= $data['break'];
                                                  $breaksec=$break*3600;
                                                  $Duration1 = $data['login_time'];
                                                  $Duration2 = $data['logout_time'];
                                                   $init = (strtotime($Duration2)-strtotime($Duration1))-$breaksec;
                                                  // $init = 685;
                                                  $hours = floor($init / 3600);
                                                  $minutes = floor(($init / 60) % 60);
                                                  $seconds = $init % 60;


                                                  // echo "<pre>";
                                                 echo  $hours.'hr   '.$minutes.'mins   '.$seconds.'sec';
                                                  $total=$total+$init;
                                                  // echo "</pre>";
                                                  
                                                ?></td>
                                                <!-- <td><a href="{{url("admin/dashboard/employee/").'/'.$data->user_id}}" ><i class="icon-edit"></i></a></td>
                                                <td><a href="{{url("admin/dashboard/employee/remove").'/'.$data->user_id}}" onClick="return confirm('Are you sure you want to remove this employer ? ')"><i class="icon-remove-sign"></i></a></td> -->
                                            </tr>
                                            
                                            <!-- <tr><td><?php //echo $total;?></td></tr> -->
                                        @endforeach
                                         <?php 
                                          // echo $total;
                                          $hours = floor($total / 3600);
                                                  $minutes = floor(($total / 60) % 60);
                                                  $seconds = $total % 60;

                                                  ?>
                                                  <div class="alert alert-success">
                                                  @foreach ($userdata as $user){
                                                    		{{ $user->fullname }}
                                                    }
                                                    @endforeach
                                                  <?php
                                                    
                                                  // echo "<pre>";
                                                 echo  "Total working hrs is   "."  =>  ".  $hours.'hr   '.$minutes.'mins   '.$seconds.'sec';
                                                 ?>

                                                 </div>
                                         


                                      </tbody>
                                  </table>
                                  <div class="col-sm-6">
                          
                        </div>  

                       
                      </div>
          </div>
        </div>
      </div>
    </div>


	</div>	<!--/.main-->
@endsection