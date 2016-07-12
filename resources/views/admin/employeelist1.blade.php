@extends('layouts.dashboardtemplate')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	

	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Advanced Table</div>
					<div class="panel-body">
						<table data-toggle="table" data-url="url{{'admin/dashboard/employeelist1'}}"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						    <tr>
						        <th data-field="user_id" data-checkbox="true" >Item ID</th>
						        <th data-field="username" data-sortable="true">Item ID</th>
						        <th data-field="fullname"  data-sortable="true">Item Name</th>
						        <th data-field="dob" data-sortable="true">Item Price</th>
						    </tr>
						    </thead>
						</table>
					</div>
				</div>
			</div>
		</div>
		</div>
@endsection