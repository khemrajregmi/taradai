
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
				<h3 class="page-header">{{$heading}}</h3>
			</div>
				@if(Session::has('flash_message'))
				    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
				@endif
  </div>  
		</div><!--/.row-->
									
			
		
		<div class="row">
			<div class="col-md-offset-4">
				<div class="col-md-9">

				<div class="panel panel-warning">
				  <div class="panel-heading">
				    <h3 class="panel-title">Attendence Notification Pannel</h3>
				  </div>
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
                                        // echo strtotime(date('Y-m-d H:i:s'));
                                         // echo "Aele ko time yo ho keta".date('Y-m-d H:i:s');
                                        // echo "   -    ";
                                        // echo strtotime($loged->date);

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
				  
				  
				  </div>
				</div>

				
				
				
			</div><!--/.col-->
			
			
		</div><!--/.row-->
	</div>	<!--/.main-->


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

                    {!! Form::open(['url' => 'admin/dashboard/employee/add', 'class' => 'form-signin', 'data-parsley-validate' ] ) !!}

                    			
                    			{{ Form::hidden('invisible', 'secret', array('id' => $userId)) }}
                 
                   				<div class="form-group">
						        {{ Form::label('title', 'Old Password') }}
						        <label for="inputPassword" class="sr-only"> Old Password</label>
						        {!! Form::password('oldpassword', [
						            'class'                         => 'form-control',
						            'placeholder'                   => 'Old Password',
						            'required',
						            'id'                            => 'oldPassword',
						            'data-parsley-required-message' => 'Password is required',
						            'data-parsley-trigger'          => 'change focusout',
						            'data-parsley-minlength'        => '4',
						            'data-parsley-maxlength'        => '20'
						        ]) !!}
						        </div>


                   				<div class="form-group">
						        {{ Form::label('title', 'Password') }}
						        <label for="inputPassword" class="sr-only">Password</label>
						        {!! Form::password('password', [
						            'class'                         => 'form-control',
						            'placeholder'                   => 'Password',
						            'required',
						            'id'                            => 'inputPassword',
						            'data-parsley-required-message' => 'Password is required',
						            'data-parsley-trigger'          => 'change focusout',
						            'data-parsley-minlength'        => '6',
						            'data-parsley-maxlength'        => '20'
						        ]) !!}
						        </div>


						         <div class="form-group">
						        <!-- <label for="inputFirstName" class="sr-only">Username</label> -->
						        {{ Form::label('title', 'Confirm Password') }}
						        <label for="inputPasswordConfirm" class="sr-only has-warning">Confirm Password</label>
						        {!! Form::password('password_confirmation', [
						            'class'                         => 'form-control',
						            'placeholder'                   => 'Password confirmation',
						            'required',
						            'id'                            => 'inputPasswordConfirm',
						            'data-parsley-required-message' => 'Password confirmation is required',
						            'data-parsley-trigger'          => 'change focusout',
						            'data-parsley-equalto'          => '#inputPassword',
						            'data-parsley-equalto-message'  => 'Not same as Password',
						        ]) !!}
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
 			<script type="text/javascript">
						        window.ParsleyConfig = {
						            errorsWrapper: '<div></div>',
						            errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>'
						        };
			</script>

			<script>
		    
		    $(".change").on( "click", function(res) { 
		        res.preventDefault();  //to prevent the default action i.e is redirection on our case
		       
		        
		      $("#hellow").modal('show');
		    });


	    $("form").submit(function(res){
	    		
	            // alert('hellow there submitting form');
	           res.preventDefault();
	           // id=thiss.attr('id'); //we cant use $(this) because 
	    	
	    	

	           // alert('hello tara dai');
	          
	           var password=$("input[name='password']").val();
	           // alert(password);
	           var token=$("input[type='hidden']").val();
	           var id=$("input[name='invisible']").attr('id');
	           // alert(id);
	           // alert('ya pani hunxa');
	           

	            $.ajax({
	            url: '<?php echo url('/').'/admin/dashboard/changepass'; ?>',
	            type: 'POST',
	            data: {'password':password, 'id':id, 'token':token},
	             beforeSend: function() {
	                alert('hello hello');
	                $('#response').show();
	              },
	            success:function(resp){
	                alert(resp);
	                 
	                 if(resp == 'sucesss'){
	                 	// alert('hellloooo');
	                 	$("#hellow").modal('hide');

	                    window.location.replace("{{url('admin/dashboard')}}");
	                    // window.location.href = "{{url('admin/dashboard/payroll')}}";
	                 }
	              }
	            });
	          });
    
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>



@endsection