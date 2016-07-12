
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
				<h1 class="page-header">{{$heading}}</h1>
			</div>
		</div><!--/.row-->
				<?php

				// echo "<pre>";
				// print_r($data);
				// echo "<pre>";
				// exit();
				?>

			
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked email"><use xlink:href="#stroked-email"></use></svg> Update Employee</div>
					<div class="panel-body">
						<form class="form-horizontal" action="{{url('admin/dashboard/employee/update')}}" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="formdata[user_id]" value="{{ $data->user_id }}">
							<fieldset>
								
								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Full Name</label>
									<div class="col-md-6">
										<input id="name" name="formdata[fullname]" type="text" value="{{$data->fullname}} " placeholder="Your Full Name" class="form-control">
									</div>
								</div>


								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Address</label>
									<div class="col-md-6">
										<input id="address" name="formdata[address]" value="{{$data->address}} " type="text" placeholder="Your Address" class="form-control">
									</div>
								</div>


								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Contact</label>
									<div class="col-md-6">
										<input id="address" name="formdata[phone]" value="{{$data->phone}} " type="text" placeholder="Your Phone Number" class="form-control">
									</div>
								</div>


								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" >Date of Birth</label>
									<div class="col-md-6">
										<input id="dob" name="formdata[dob]" type="text" value="{{$data->dob}} " placeholder="Your email" class="form-control">
									</div>
								</div>


								<!-- Email input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="email">Email</label>
									<div class="col-md-6">
										<input id="email" name="formdata[email]" value="{{$data->email}} " type="text" placeholder="Your email" class="form-control">
									</div>
								</div>


								<div class="form-group">
                                            <label class="col-md-3 control-label">Is Admin</label>

                                            <div class="col-md-6">
                                                <select name="formdata[IsSuperAdmin]" class="form-control">
                                                	<option value="Y" <?php echo ($data->IsSuperAdmin == 'Y')?'selected':''; ?>>Yes</option>
                                                	<option value="N" <?php echo ($data->IsSuperAdmin == 'N')?'selected':''; ?>>No</option>
                                                </select>
                                            </div>
                                   </div> 


								<div class="form-group">
                                            <label class="col-md-3 control-label">Status</label>

                                            <div class="col-md-6">
                                                <select name="formdata[status]" class="form-control">
                                                	<option value="Y" <?php echo ($data->status == 'Y')?'selected':''; ?>>Yes</option>
                                                	<option value="N" <?php echo ($data->status == 'N')?'selected':''; ?>>No</option>
                                                </select>
                                            </div>
                                   </div> 

								
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-7 widget-right">
									
										<button type="submit" class="btn btn-default btn-md pull-right">Update</button>
									</div>

									<div class="col-md-1 widget-right">
										<button type="reset" class="btn btn-default ">Cancel</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
					
				
				
				
			</div><!--/.col-->
			
			
		</div><!--/.row-->
	</div>	<!--/.main-->



@endsection