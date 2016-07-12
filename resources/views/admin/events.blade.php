 <!-- http://www.webjet.com.au/ -->
@extends('layouts.dashboardtemplate')
@section('content')
    hello this is event secton
   <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
 <div class="row">
	                <div class="col-lg-12">
	                    <div class="panel panel-default">
	                        <div class="panel-heading">
	                            {{$heading}}
	                            <a class="pull-right" href="{{url('admin/dashboard/addevents')}}"><i class="icon-plus-sign"></i></a>
	                        </div>
	                        
	                         <div class="table-responsive">
	                            
	                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                                    <thead>
	                                        <tr>
	                                            <th>S.No.</th>
	                                            <th>title</th>
	                                            <th>Start</th>
	                                            <th>End </th>
	                                            <th>URL</th>
	                                            <th>Action(s)</th>
	                                        </tr>
	                                    </thead>
	                                    <tbody>
	                                    
		                                    <?php 
		                                    // $count = ($page-1) * $take; 
		                                    $count=0;
		                                    ?>
		                                    
		                                     @foreach($result->getCollection()->all() as $data)
		                                    
		                                    	<tr class="<?php echo ($count++%2 == 0)?'odd':'even'?>">
		                                    		<td>{{$count}}</td>
		                                            <td>{{$data->title}}</td>
		                                            <td>{{$data->start}}</td>
		                                            <td>{{$data->end}}</td>
		                                            <td>{{$data->url}}</td>
		                                            <td><a href="{{url("admin/dashboard/editevents/").'/'.$data->event_id}}" ><i class="icon-edit" id="{{$data->event_id}}"></i></a></td>
		                                            <td><a href="{{url("admin/dashboard/deleteevent/").'/'.$data->event_id}}" onClick="return confirm('Are you sure you want to remove this event ? ')"><i class="icon-remove-sign"></i></a></td>
		                                            <!-- <td><a href="{{url("admin/dashboard/attendencelist/").'/'.$data->event_id}}" ><i class="glyphicon glyphicon-eye-open"></i></a></td> -->
		                                        </tr>
		                                        
		                                    @endforeach

	                                    </tbody>
	                                </table>
	                                

					            	
	                    </div>
	                    	{{ $result->links() }}
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
            <h4 class="modal-title">Employee Login</h4>
          </div>
          <div class="modal-body">

          <div id="login" class="tab-pane active">

                   {!! Form::open(array('url' => '/employer/login', 'id' => 'signupForm', 'method' => 'POST', 'role' => 'form', 'class' => 'form-signin')) !!}

                 
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {{ Form::label('title', 'Title') }}
				        {{ Form::text('title', null, ['class' => 'form-control sal','placeholder' => 'Enter Event Title' ]) }}
				        {{ $errors->first('title', '<p class="help-block">:message</p>') }}
				    </div>


				    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {{ Form::label('title', 'Start Date') }}
				        {{ Form::date('startdate', null, ['class' => 'form-control sal','placeholder' => 'Rs:100000' ]) }}
				        {{ $errors->first('title', '<p class="help-block">:message</p>') }}
				    </div>

				    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {{ Form::label('title', 'End Date') }}
				        {{ Form::date('edate', null, ['class' => 'form-control sal','placeholder' => 'Rs:100000' ]) }}
				        {{ $errors->first('title', '<p class="help-block">:message</p>') }}
				    </div>

				     <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {{ Form::label('title', 'Url') }}
				        {{ Form::text('url', null, ['class' => 'form-control sal','placeholder' => 'www.example.com' ]) }}
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
 </div>


 

 <script>
		  
		    $(".pull-right ").on( "click", function(res) { 
		        res.preventDefault();  //to prevent the default action i.e is redirection on our case
		       
		      $("#hellow").modal('show');

		    });


	    $("form").submit(function(res){
	    		
	            alert('hellow there submitting formssssssssssssssss');
	            alert('i love programming');
	           res.preventDefault();
	          
	    	
	    	

	           
	           var title=$(this).find("input[name='title']").val();
	           // alert(title);
	           var startdate=$(this).find("input[name='startdate']").val();
	           // alert(startdate);
	           var edate=$(this).find("input[name='edate']").val();
	           // alert(edate);
	           var url=$(this).find("input[name='url']").val();
	           // alert(url);
	           var token=$(this).find("input[type='hidden']").val();	
	           // var token=thiss.find("input[type='hidden']").val();

	          

	            $.ajax({
	            url: '<?php echo url('/').'/admin/dashboard/addevents'; ?>',
	            type: 'POST',
	            data: {'title':title, 'startdate':startdate,'edate':edate,'url':url,'token':token},
	             beforeSend: function() {
	                // alert('hello');
	                $('#response').show();
	              },
	            success:function(resp){
	                alert(resp);
	                 
	                 if(resp == 'sucesss'){
	                 	$("#hellow").modal('hide');

	                    // window.location.replace("{{url('admin/dashboard/payroll')}}");
	                    window.location.href = "{{url('admin/dashboard/eventslist')}}";
	                 }
	              }
	            });
	          });
    
    </script>


 

@endsection