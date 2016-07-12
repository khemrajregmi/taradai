@extends('layouts.dashboardtemplate')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	

	<div class="row">
			<div class="col-lg-12">
	                    <div class="panel panel-default">
	                        <div class="panel-heading">
	                            {{$heading}}
	                            <!-- <a class="pull-right" href="{{url('admin/dashboard/employee/add')}}"><i class="icon-plus-sign"></i></a> -->
	                        </div>
	                        <div class="panel-body">
	                        
								
	                            
	                            <div class="table-responsive">
	                            
	                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                                    <thead>
	                                        <tr>
	                                            <th>S.No.</th>
	                                            <th>Full Name</th>
	                                            <th>Basic Salary</th>
	                                            <th>Payroll Status</th>
	                                            <th>Payroll</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    
		                                    <?php
		                                     $count = ($page-1) * $take; 
		                                    // $count=0;
		                                     ?>
		                                    
		                                    @foreach($users->getCollection()->all() as $data)
		                                    
		                                    	<tr class="<?php echo ($count++%2 == 0)?'odd':'even'?>">
		                                    		<td>{{$count}}</td>
		                                            <td>{{$data->fullname}}</td>
		                                            <td>Rs. {{$data->basic_pay}}</td>
		                                            <td>{{$data->payroll_status}}</td>
		                                            <td>
		                                            <a href="{{url("admin/dashboard/payrolldetail/").'/'.$data->user_id}}" ><i class="detail  glyphicon glyphicon-eye-open" id='{{$data->user_id}}'></i></a>&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp


		                                            <a href="{{url("admin/dashboard/payrolladd/").'/'.$data->user_id}}" ><i class="add icon-plus-sign" id='{{$data->user_id}}'></i></a>

		                                            </td>
		                                        </tr>
		                                        
		                                    @endforeach

	                                    </tbody>
	                                </table>
	                                

					            	
					            </div>
	                            {{ $users->links() }}
	                        </div>
	                    </div>
	                </div>
		</div>
		</div>


		<div id="hellow" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <div class="errormsg">
            
          </div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Payroll</h4>
          </div>
          <div class="modal-body">

          <div id="login" class="tab-pane active">

                    {!! Form::open(array('url' => '/employer/login', 'id' => 'signupForm', 'method' => 'POST', 'role' => 'form', 'class' => 'form-signin')) !!}

                 
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {{ Form::label('title', 'Basic Salary') }}
				        {{ Form::text('title', null, ['class' => 'form-control sal','placeholder' => 'Rs:100000' ]) }}
				        {{ $errors->first('title', '<p class="help-block">:message</p>') }}
				    </div>


				     <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {{ Form::label('title', 'Salary Status') }}
				        {{ Form::select('size', array('Paid' => 'Paid', 'Outstanding' => 'Outstanding', 'Advance' => 'Advance'), null, array('class'=>'form-control' )) }}
				        <!-- {{ Form::text('title', null, ['class' => 'form-control','placeholder' => 'Enter Basic Salary']) }} -->
				        {{ $errors->first('title', '<p class="help-block">:message</p>') }}
				    </div>

                    <div class="form-group"> 
                    		 {!! Form::submit('Submit', ['class' => 'btn btn-default pull-left'] ) !!}
                    		<!-- {!! Form::submit('Save') !!}       -->
                           <!--  {{ Form::select('size', array('L' => 'Large', 'S' => 'Small'), null, array('class'=>'form-control','style'=>'' )) }} -->
                    </div> 
                    <p>
                    </p>
                  

                    {!! Form::close() !!}    
    
          </div>

          
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          </div>
        </div>

      </div>
 </div>



 <script>
		    var id ='';// $(document).on( "click", ".icon-plus-sign", function(res) { 
		    var thiss="";
		    $(".add ").on( "click", function(res) { 
		        res.preventDefault();  //to prevent the default action i.e is redirection on our case
		        thiss=$(this);
		        id=thiss.attr('id');
		        
		      $("#hellow").modal('show');
		    });


	    $("form").submit(function(res){
	    		
	            // alert('hellow there submitting form');
	           res.preventDefault();
	           id=thiss.attr('id'); //we cant use $(this) because 
	    	
	    	

	           // alert('hello tara dai');
	           // var id=document.getElementById('id')
	           // alert(id);
	           var title=$("input[name='title']").val();

	           var size=$('select[name=size]').val();
	           // var size=$(this).find("input[name='size']").val();
	           // alert(size);
	           // return false;		
	           var token=thiss.find("input[type='hidden']").val();

	          

	            $.ajax({
	            url: '<?php echo url('/').'/admin/dashboard/payrolladd'; ?>',
	            type: 'POST',
	            data: {'title':title, 'size':size,'token':token,'id':id},
	             beforeSend: function() {
	                // alert('hello');
	                $('#response').show();
	              },
	            success:function(resp){
	                alert(resp);
	                 
	                 if(resp == 'sucesss'){
	                 	// alert('hellloooo');
	                 	$("#hellow").modal('hide');

	                    window.location.replace("{{url('admin/dashboard/payroll')}}");
	                    // window.location.href = "{{url('admin/dashboard/payroll')}}";
	                 }
	              }
	            });
	          });
    
    </script>






 		<div id="hello" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <div class="errormsg">
            
          </div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Payroll Detail</h4>
          </div>
          <div class="modal-body khem">

        

          
          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          </div>
        </div>

      </div>
 </div>

		



    <script>
		   //  var idd ='';// $(document).on( "click", ".icon-plus-sign", function(res) { 
		   //  var thisss="";
		   //  $(".glyphicon-eye-open").on( "click", function(res) { 
		   //  	// alert('this is testion section');
		   //      res.preventDefault();  //to prevent the default action i.e is redirection on our case
		   //      thisss=$(this);
		   //      idd=thisss.attr('id');
		   //      // alert(idd);


		   //       $.ajax({
	    //         url: '<?php //echo url('/').'/admin/dashboard/payrolldetail'; ?>',
	    //         type: 'GET',
	    //         data: {'idd':idd},
	             
	    //         }).success( 
	    //         // alert(dataa);
					//     function(dataa) 
					//     {
					//     	$("#hello").modal('show');
					//         $('.khem').html(dataa);
					//     }
					// );
		   //  });



	


	    
    
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>
@endsection