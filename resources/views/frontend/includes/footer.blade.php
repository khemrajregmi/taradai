  <div id="hellow" class="modal fade" role="dialog">
      <div class="modal-dialog">

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
                        
                  <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                      Enter your username and password 
                  </p>
                  <p>
                    </p>
                  <div>
                    
                  </div>
                    <div class="form-group">
                            {!! Form::email('email', '', array('id'=>'username', 'class'=>'form-control', 'autofocus'=>'autofocus', 'placeholder' => 'Email')) !!}
                    </div>

                    <div class="form-group">       
                            {!! Form::password('password', array('id'=>'password', 'class'=>'form-control', 'placeholder' => 'Password')) !!}
                            <p>
                              

                            </p>
                            {!! Form::submit('Login', array('class' => 'submit btn-success btn btn-large')) !!}
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





  <div id="footer">

        <p>&copy;  www.tagnepal.com.np &nbsp;{{date('Y')}} &nbsp; Designed By: <a href="http://www.tagnepal.com.np/" target="_blank">TAG Pvt. Ltd.</a></p>
    <?php
    // echo "<pre>";
    // print_r(json_encode($event));
    // echo "</pre>";
    ?>


    </div>
    <script type="text/javascript">
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>

    <script>

    $(document).ready(function() {



        $('#calendar').fullCalendar({
      
            defaultDate: '2016-06-12',
            editable: true,
            // droppable: true,
            Boolean, default: undefined,
            eventLimit: true, // allow "more" link when too many events
            events: <?php

              echo json_encode($event);
              
             ?>,
            // events: [{"title":"This is ",
            //         "start":'2016-06-01'},{
            //         title: 'khem',
            //         start: '2016-06-07',
            //         end: '2016-06-07'
            //     },{
            //         id: 999,
            //         title: 'Repeating Event',
            //         start: '2016-06-09T16:00:00'
            //     },
            //     {
            //         id: 999,
            //         title: 'Repeating Event',
            //         start: '2016-06-16T16:00:00'
            //     },
            //     {
            //         title: 'Conference',
            //         start: '2016-06-11',
            //         end: '2016-06-13'
            //     },
            //     {
            //         title: 'Meeting',
            //         start: '2016-06-12T10:30:00',
            //         end: '2016-06-12T12:30:00'
            //     },
            //     {
            //         title: 'Lunch',
            //         start: '2016-06-12T12:00:00'
            //     },
            //     {
            //         title: 'Meeting',
            //         start: '2016-06-12T14:30:00'
            //     },
            //     {
            //         title: 'Happy Hour',
            //         start: '2016-06-12T17:30:00'
            //     },
            //     {
            //         title: 'Dinner',
            //         start: '2016-06-12T20:00:00'
            //     },
            //     {
            //         title: 'Birthday Party',
            //         start: '2016-06-13T07:00:00'
            //     },
            //     {
            //         title: 'Click for Google',
            //         url: 'http://google.com/',
            //         start: '2016-06-28'
            //     }
            // ],

             dayClick: function(date, jsEvent, view) {

                // alert('Clicked on: ' + date.format());
                var date = date.format();
                // alert(date);

                var date2="<?php
                        // $today = date("j F Y");
                         $today = date("Y-m-d"); 
                         echo $today;
                          ?>";
              // alert(date2);
              if(date==date2){
                // alert('hello this is me');
                $("#hellow").modal('show');
              }
             else{
              alert('Please have a click on today date only!!!');
             }
            }
        });
    });

    
</script>

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
                // alert('hello');
                $('#response').show();
              },
            success:function(resp){
                // alert(resp);

                if(resp == 'error'){
                   alert('this is not a valid section');
                   $('.errormsg').html('Error Please try again !!!');
                   }
                 if(resp == 'successadmin'  ){ // alert(resp);
                    window.location.replace("{{url('admin/dashboard')}}");
                  }
                 
                 if(resp == 'sucessemployee'){
                    window.location.replace("{{url('employer/dashboard')}}");
                 }
              }
            });
          });
</script>

   

</body>

</html>