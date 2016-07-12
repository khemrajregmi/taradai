
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title> Login</title>
    <meta http-equiv="cache-control" content="private, max-age=0, no-cache">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="expires" content="0">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
  <meta name="_token" content="{!! csrf_token() !!}"/>
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
     <link rel="stylesheet" href="{{url('resources/assets/login/plugins/bootstrap/css/bootstrap.css')}}" />
     <link rel="stylesheet" href="{{url('resources/assets/admin/plugin/Font-Awesome/css/font-awesome.css')}}" />

    <link rel="stylesheet" href="{{url('resources/assets/login/css/login.css')}}" />
    <link rel="stylesheet" href="{{url('resources/assets/login/plugins/magic/magic.css')}}" />
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body >

   <!-- PAGE CONTENT --> 
    <div class="container">

   
    <div class="tab-content">
       
    <div id="login" class="tab-pane active">

                    {!! Form::open(array('url' => '/login', 'id' => 'signupForm', 'method' => 'POST', 'role' => 'form', 'class' => 'form-signin')) !!}

                    <!-- {!! Form::token() !!} -->

                   
                    @if(Session::has('error'))
	                    <div class="alert alert-error">
	                        {{Session::get('error')}}
	                    </div>
                    @endif
                    
    				
            				@if(Session::has('success'))
            					<div class="alert alert-success">
                        	{{Session::get('success')}}
                        </div>
                    @endif
                     <div class="text-center">
                  <!--         <img src="" id="logoimg" alt=" Logo" /> -->
                     Login Section
                      </div>

                    <div class="aleart">
                      
                    </div>
                        
	                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
	                    Enter your username and password 
	                </p>
                            {!! Form::email('email', '', array('id'=>'username', 'class'=>'form-control', 'autofocus'=>'autofocus', 'placeholder' => 'Email')) !!}
                            
                            {!! Form::password('password', array('id'=>'password', 'class'=>'form-control', 'placeholder' => 'Password')) !!}
                            {!! Form::submit('Login', array('class' => 'submit btn-success btn btn-large')) !!}
                            <!-- <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                              <span class="sr-only">Loading...</span> -->
                              <div id="response">
                                  <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
                                  <span class="sr-only">Loading...</span>
                              <!-- ajax loading is going on testing hai !!! -->
                              </div>
                            
                      

                    {!! Form::close() !!}    
    
    </div>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="{{url('admin/forgotpassword')}}">Forgot Password</a></li>
            <li><a class="text-muted" href="{{url('admin/register')}}">Sign Up</a></li>
        </ul>
    </div>


</div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="{{url('resources/assets/login/plugins/jquery-2.0.3.min.js')}}"></script>
      <script src="{{url('resources/assets/login/plugins/bootstrap/js/bootstrap.js')}}"></script>
      <script src="{{url('resources/assets/login/js/login.js')}}"></script>


      <script>
          $("form").submit(function(res){
            // alert('hellow there submitting form');
           res.preventDefault();
           // alert('hello tara dai');
           var email=$(this).find("input[name='email']").val();
           var password=$(this).find("input[name='password']").val();
           var token=$(this).find("input[type='hidden']").val();

          

            $.ajax({
            url: '<?php echo url('/').'/login'; ?>',
            type: 'POST',
            data: {'email':email, 'password':password,'token':token},
             beforeSend: function() {
                $('#response').show();
              },
            success:function(resp){
                alert(resp);

                if(resp == 'error')
                   // alert('this is not a valid section');
                   $('alert').html('Error Please try again !!!');
                 if(resp == 'successadmin'  )
                  // alert(resp);
                    window.location.replace("{{url('admin/dashboard')}}");
                 if(resp == 'sucessemployee')
                    window.location.replace("{{url('employer/dashboard')}}");
              }
            });
          });
    </script>
      <!--END PAGE LEVEL SCRIPTS -->

      <script type="text/javascript">
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
      </script>

</body>
    <!-- END BODY -->
</html>
