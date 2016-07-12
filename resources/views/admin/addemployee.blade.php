
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
			@if (count($errors) > 0)
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
		</div><!--/.row-->
									
			
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked email"><use xlink:href="#stroked-email"></use></svg> Add Employee</div>
					<div class="panel-body">
								
 								 {!! Form::open(['url' => 'admin/dashboard/employee/add', 'class' => 'form-signin', 'data-parsley-validate' ] ) !!}

       

        <!-- <h2 class="form-signin-heading">Please register</h2> -->
						        <div class="form-group">
						        <!-- <label for="inputFirstName" class="sr-only">Username</label> -->
						        {{ Form::label('title', 'Username') }}
						        {!! Form::text('username', null, [
						            'class'                         => 'form-control',
						            'placeholder'                   => 'Username',
						            'required',
						            'id'                            => 'inputusername',
						            'data-parsley-required-message' => 'First Name is required',
						            'data-parsley-trigger'          => 'change focusout',
						            'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
						            'data-parsley-minlength'        => '2',
						            'data-parsley-maxlength'        => '32'
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
						        <!-- <label for="inputFirstName" class="sr-only">Username</label> -->
						        {{ Form::label('title', 'Fullname') }}
						         <label for="inputLastName" class="sr-only">Fullname</label>
						        {!! Form::text('fullname', null, [
						            'class'                         => 'form-control',
						            'placeholder'                   => 'Full Name',
						            'required',
						            'id'                            => 'inputFullName',
						            'data-parsley-required-message' => 'Full Name is required',
						            'data-parsley-trigger'          => 'change focusout',
						            'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
						            'data-parsley-minlength'        => '2',
						            'data-parsley-maxlength'        => '32'
						        ]) !!}
						        </div>




						         <div class="form-group">
						        <!-- <label for="inputFirstName" class="sr-only">Username</label> -->
						        {{ Form::label('title', 'Email Address') }}<label for="inputEmail" class="sr-only">Email address</label>
						        {!! Form::email('email', null, [
						            'class'                         => 'form-control',
						            'placeholder'                   => 'Email address',
						            'required',
						            'id'                            => 'inputEmail',
						            'data-parsley-required-message' => 'Email is required',
						            'data-parsley-trigger'          => 'change focusout',
						            'data-parsley-type'             => 'email'
						        ]) !!}
						        </div>



						         <div class="form-group">
						        <!-- <label for="inputFirstName" class="sr-only">Username</label> -->
						        {{ Form::label('title', 'Address') }}
						         <label for="inputLastName" class="sr-only">Address</label>
						        {!! Form::text('address', null, [
						            'class'                         => 'form-control',
						            'placeholder'                   => 'Address',
						            'required',
						            'id'                            => 'inputAddress',
						            'data-parsley-required-message' => 'Address is required',
						            'data-parsley-trigger'          => 'change focusout',
						            'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
						            'data-parsley-minlength'        => '2',
						            'data-parsley-maxlength'        => '32'
						        ]) !!}
						        </div>



						         <div class="form-group">
						        <!-- <label for="inputFirstName" class="sr-only">Username</label> -->
						        {{ Form::label('title', 'Contact') }}
								 <label for="inputLastName" class="sr-only">Contact</label>
								        {!! Form::text('contact', null, [
								            'class'                         => 'form-control',
								            'placeholder'                   => 'Contact',
								            'required',
								            'id'                            => 'inputContact',
								            'data-parsley-required-message' => 'Contact is required',
								            'data-parsley-trigger'          => 'change focusout',
								            'data-parsley-pattern'          => '1234567789',
								            'data-parsley-minlength'        => '2',
								            'data-parsley-maxlength'        => '32'
								        ]) !!}
								        </div>



								         <div class="form-group">
						        <!-- <label for="inputFirstName" class="sr-only">Username</label> -->
								        {{ Form::label('title', 'Date of Birth') }}
										  <label for="inputLastName" class="sr-only">Contact</label>
								        {!! Form::date('dob', null, [
								            'class'                         => 'form-control',
								            'id'                            => 'dataofbirth',
								            'data-parsley-required-message' => 'DOB is required',
								            'data-parsley-trigger'          => 'change focusout'
								        ]) !!}
								        </div>



								         <div class="form-group">
								        <!-- <label for="inputFirstName" class="sr-only">Username</label> -->
								        {{ Form::label('title', 'Is Admin') }}
								        <label for="inputLastName" class="sr-only">Is Admin</label>
								        {!! Form::select('isadmin', array('Y' => 'Yes', 'N' => 'No'), null, [
								            'class'                         => 'form-control',
								            'id'                            => 'inputisadmin',
								            'data-parsley-required-message' => 'Is Admin is required',
								            'data-parsley-trigger'          => 'change focusout'
								        ]) !!}
								        </div>


								         <div class="form-group">
								        <!-- <label for="inputFirstName" class="sr-only">Username</label> -->
								        {{ Form::label('title', 'Status') }}
								        <label for="inputLastName" class="sr-only">Status</label>
								       
								        {!! Form::select('status', array('Y' => 'Yes', 'N' => 'No'), null, [
								            'class'                         => 'form-control',
								            'id'                            => 'inputisadmin',
								            'data-parsley-required-message' => 'Status is required',
								            'data-parsley-trigger'          => 'change focusout'
								        ]) !!}
								        </div>



		        <div class="form-group">
									<div class="col-md-7 widget-right">
									
										<button type="submit" class="btn btn-default btn-md pull-right">Add Employee</button>
									</div>

									<div class="col-md-1 widget-right">
										<button type="reset" class="btn btn-default ">Cancel</button>
									</div>
				</div>


						

						    <script type="text/javascript">
						        window.ParsleyConfig = {
						            errorsWrapper: '<div></div>',
						            errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>'
						        };
						    </script>

						    
						<!-- <form class="form-horizontal" action="{{url('admin/dashboard/employee/add')}}" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<fieldset>
								Name input-->
								<!-- <div class="form-group">
									<label class="col-md-3 control-label" >Username</label>
									<div class="col-md-6">
									<input id="username" name="username" type="text" placeholder="Username" class="form-control">
									</div>
								</div> -->
							
								<!-- Email input-->
								<!-- <div class="form-group">
									<label class="col-md-3 control-label" for="email">Password</label>
									<div class="col-md-6">
										<input id="password" name="password" type="password" placeholder="*****" class="form-control">
									</div>
								</div> -->
								
								<!-- Email input-->
								<!-- <div class="form-group">
									<label class="col-md-3 control-label" for="email">Confirm Password</label>
									<div class="col-md-6">
										<input id="cpassword" name="cpassword" type="password" placeholder="*****" class="form-control">
									</div>
								</div> -->

								<!-- Email input-->
								<!-- <div class="form-group">
									<label class="col-md-3 control-label" for="email">Full Name</label>
									<div class="col-md-6">
										<input id="name" name="fullname" type="text" placeholder="Your Full Name" class="form-control">
									</div>
								</div> -->


								<!-- Email input-->
								<!-- <div class="form-group">
									<label class="col-md-3 control-label" for="email">Address</label>
									<div class="col-md-6">
										<input id="address" name="address" type="text" placeholder="Your Address" class="form-control">
									</div>
								</div>
 -->

								<!-- <div class="form-group">
									<label class="col-md-3 control-label" for="email">Contact</label>
									<div class="col-md-6">
										<input id="address" name="contact" type="text" placeholder="Your Phone Number" class="form-control">
									</div>
								</div> -->


								<!-- Email input-->
								<!-- <div class="form-group">
									<label class="col-md-3 control-label" >Date of Birth</label>
									<div class="col-md-6">
										<input id="dob" name="dob" type="date" placeholder="Your email" class="form-control">
									</div>
								</div> -->


								<!-- Email input-->
								<!-- <div class="form-group">
									<label class="col-md-3 control-label" for="email">Email</label>
									<div class="col-md-6">
										<input id="email" name="email" type="text" placeholder="Your email" class="form-control">
									</div>
								</div> -->


								<!-- <div class="form-group">
                                            <label class="col-md-3 control-label">Is Admin</label>

                                            <div class="col-md-6">
                                                <select name="isadmin" class="form-control">
                                                	<option value="Y">Yes</option>
                                                	<option value="N">No</option>
                                                </select>
                                            </div>
                                   </div> --> 


								<!-- <div class="form-group">
                                            <label class="col-md-3 control-label">Status</label>

                                            <div class="col-md-6">
                                                <select name="status" class="form-control">
                                                	<option value="Y">Yes</option>
                                                	<option value="N">No</option>
                                                </select>
                                            </div>
                                   </div> --> 

								
								
								<!-- Form actions -->
								<!-- <div class="form-group">
									<div class="col-md-7 widget-right">
									
										<button type="submit" class="btn btn-default btn-md pull-right">Add Employee</button>
									</div>

									<div class="col-md-1 widget-right">
										<button type="reset" class="btn btn-default ">Cancel</button>
									</div>
								</div>
							</fieldset>
						</form>  -->
					</div>
				</div>
					
				
				
				
			</div><!--/.col-->
			
			
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection