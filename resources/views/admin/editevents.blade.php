
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
				

			
		
		<div class="row">
			<div class="col-md-12">
				<div id="login" class="tab-pane active">
          		@foreach($result as $results)
          			<!-- {{$results->event_id}} -->
                   {!! Form::open(array('url' => 'admin/dashboard/editevents', 'id' => 'signupForm', 'method' => 'POST', 'role' => 'form', 'class' => 'form-signin')) !!}

                   {{ Form::hidden('id', $results->event_id, ['class' => 'form-control sal','placeholder' => 'Enter Event Title' ]) }}
                 
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {{ Form::label('title', 'Title') }}
				        {{ Form::text('title', $results->title, ['class' => 'form-control sal','placeholder' => 'Enter Event Title' ]) }}
				        {{ $errors->first('title', '<p class="help-block">:message</p>') }}
				    </div>


				    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {{ Form::label('title', 'Start Date') }}
				        {{ Form::text('startdate', $results->start, ['class' => 'form-control sal','placeholder' => 'Rs:100000' ]) }}
				        {{ $errors->first('title', '<p class="help-block">:message</p>') }}
				    </div>

				    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {{ Form::label('title', 'End Date') }}
				        {{ Form::text('edate', $results->end, ['class' => 'form-control sal','placeholder' => 'Rs:100000' ]) }}
				        {{ $errors->first('title', '<p class="help-block">:message</p>') }}
				    </div>

				     <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				        {{ Form::label('title', 'Url') }}
				        {{ Form::text('url', $results->url, ['class' => 'form-control sal','placeholder' => 'www.example.com' ]) }}
				        {{ $errors->first('title', '<p class="help-block">:message</p>') }}
				    </div>

				   @endforeach

                    <div class="form-group"> 
                    		 {!! Form::submit('Submit', ['class' => 'btn btn-default pull-left'] ) !!}
                    		<!-- {!! Form::submit('Save') !!}       -->
                           <!--  {{ Form::select('size', array('L' => 'Large', 'S' => 'Small'), null, array('class'=>'form-control','style'=>'' )) }} -->
                    </div> 
                    <p>
                    </p>
                  

                    {!! Form::close() !!}  
    
          </div>
					
				
				
				
			</div><!--/.col-->
			
			
		</div><!--/.row-->
	</div>	<!--/.main-->



@endsection