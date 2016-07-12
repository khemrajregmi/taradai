<!-- http://www.webjet.com.au/ -->
@extends('layouts.dashboardtemplate')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
 <div class="row">
	                <div class="col-lg-12">
	                    <div class="panel panel-default">
	                        <div class="panel-heading">
	                            {{$heading}}
	                            <a class="pull-right" href="{{url('admin/dashboard/employee/add')}}"><i class="icon-plus-sign"></i></a>
	                        </div>
	                        <div class="panel-body">

	                        <a href="{{url('admin/dashboard/employee/add')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add</a>




									{!! Form::open(array('url' => 'admin/dashboard/search','method' => 'POST', 'id' => 'signupForm', 'class'=>'form navbar-form navbar-right searchform')) !!}

									  <!-- {!! Form::open(array('url' => 'admin/dashboard/search', 'id' => 'signupForm', 'method' => 'POST', 'role' => 'form', 'class' => 'form-signin')) !!} -->

										    {!! Form::text('search', null,
										                           array('required',
										                                'class'=>'form-control',
										                                'placeholder'=>'Search ...')) !!}
										     {!! Form::submit('Search',
										                                array('class'=>'btn btn-default')) !!}
										 {!! Form::close() !!}
								
	                            
	                            <div class="table-responsive">
	                            
	                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                                    <thead>
	                                        <tr>
	                                            <th>S.No.</th>
	                                            <th>Usernme</th>
	                                            <th>Full Name</th>
	                                            <th>Address</th>
	                                            <th>Date of Birthday</th>
	                                            <th>Phone</th>
	                                            <th>Email</th>
	                                            <th>IsAdmin</th>
	                                            <th>Status</th>
	                                            <th>Edit</th>
	                                            <th>Delete</th>
	                                            <th>Attendance</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    
		                                    <?php
		                                   // $count= ($page-1) * $take;
		                                    $count =0;
		                                      ?>
		                                    
		                                    @foreach($datalist->getCollection()->all() as $data)
		                                    
		                                    	<tr class="<?php echo ($count++%2 == 0)?'odd':'even'?>">
		                                    		<td>{{$count}}</td>
		                                            <td>{{$data->username}}</td>
		                                            <td>{{$data->fullname}}</td>
		                                            <td>{{$data->address}}</td>
		                                            <td>{{$data->dob}}</td>
		                                            <td>{{$data->phone}}</td>
		                                            <td>{{$data->email}}</td>
		                                            <td>{{$data->IsSuperAdmin}}</td>
		                                            <td>{{$data->status}}</td>
		                                            <td><a href="{{url("admin/dashboard/employee/").'/'.$data->user_id}}" ><i class="icon-edit"></i></a></td>
		                                            <td><a href="{{url("admin/dashboard/employee/remove").'/'.$data->user_id}}" onClick="return confirm('Are you sure you want to remove this employer ? ')"><i class="icon-remove-sign"></i></a></td>
		                                            <td><a href="{{url("admin/dashboard/attendencelist/").'/'.$data->user_id}}" ><i class="glyphicon glyphicon-eye-open"></i></a></td>
		                                        </tr>
		                                        
		                                    @endforeach

	                                    </tbody>
	                                </table>
	                               	{{ $datalist->render() }}

					            </div>
	                           
	                        </div>
	                    </div>
	                </div>
    </div>
    </div>

   

   

 
 
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header is this</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>

  
</div>

 <!-- <script type="text/javascript">
    	$(".glyphicon ").on( "click", function(res) { 
    			res.preventDefault();
    			alert('hello ');
    			var id=$(this).attr('id');
    			// var id=$(this).find("#id").val();
    			alert(id);
    			// $("#myModal").modal('show');


    			$.ajax({
           			url: '<?php// echo url('/').'/admin/dashboard/attendencelist/'; ?>'+ id,
		            type: 'GET',
		            // data: {_token: CSRF_TOKEN},
   					// dataType: 'JSON',

		             beforeSend: function() {
		                alert('hello this is ajax');
		                // $('#response').show();
		              },
		            success:function(resp){
		            	alert(resp);
		            	alert('it is really nice to meet YOu honey');
		            	$.each(resp, function(i,item){
		            		alert(item);
		            		$("#myModal").modal('show');
		            		$("#myModal .modal-body").html(item);
		            	});
		                // alert(resp);
		                // return false;
		                // $("#myModal").modal('show');
		                // $("#myModal .modal-body").html(resp);

		               
		              }
		            });
    	});
    </script>

     <script type="text/javascript">
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script> -->
@endsection