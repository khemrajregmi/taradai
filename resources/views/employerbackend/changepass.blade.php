
@extends('layouts.employerdashboardtemplate')
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
        
			</div>
			
		</div>
		
	<div class="row">
    <div class="col-md-offset-3">
			<div class="col-md-9">
            <div class="panel panel-default">
          <div class="panel-heading"><svg class="glyph stroked email"><use xlink:href="#stroked-email"></use></svg> Change Your Password</div>
          <div class="panel-body">
                
                {!! Form::open(['url' => 'employer/dashboard/changepassword', 'class' => 'form-signin', 'data-parsley-validate' ] ) !!}

                          
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
		</div>
    </div>
    </div>
					
				
			

	<script>
        
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
              url: '<?php echo url('/').'/employer/dashboard/changepassword'; ?>',
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
                    // $("#hellow").modal('hide');

                      window.location.replace("{{url('employer/dashboard')}}");
                      // window.location.href = "{{url('admin/dashboard/payroll')}}";
                   }
                }
              });
            });
    
    </script>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
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

     

    <script type="text/javascript">
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>

@endsection