<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="{{url('admin/dashboard')}}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li><a href="{{url('admin/dashboard/employeelist')}}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Emploee List</a></li>
			<!-- <li><a href="{{url('admin/dashboard/employeelist1')}}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Test</a></li> -->
			<!-- <li><a href="admin/dashboard/employee/attendance"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Attendence</a></li> -->
			<li><a href="{{url('admin/dashboard/payroll')}}"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Payroll</a></li>
			<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> More 
				</a>
				<ul class="children collapse" id="sub-item-1">
				
					<li>
						<a class="" href="{{url('admin/dashboard/eventslist')}}">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Add Events
						</a>
					</li>

					<li>
						<a class="" href="{{url('admin/dashboard/changepassword')}}">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Change Password
						</a>
					</li>
					
					</li>
				</ul>
			</li>
			
			
		</ul>
		
	</div><!--/.sidebar-->