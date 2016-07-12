@include('admin.includes.head')
<body class="payslip">
                <div class="wrapper">

                  <div class="pay">
                    <h4 class="payhead">TAG Nepal -The ArdentGroup</h4>
                    <p class="payhead">House No.#53, Chaitya Marga, Lagimpat</p>
                    <h6 class="payhead">Kathmandu, Nepal 44616</h6>
                    <h6 class="payhead">Tel: 977-1-4003550/6922994</h6>
                    <h4 class="payhead">Employee Pay Slip</h4>
                  </div>

                    <div class="table-responsive">
                              
                                        <?php
                                         // $count = ($page-1) * $take;
                                        $count=1;
                                          ?>
                                        
                                        <?php
                                         $total=0;
                                         
                                         ?>

                                        @foreach ($user as $data)
                                              <?php 
                                                  $break= $data['break'];
                                                  $breaksec=$break*3600;
                                                  $Duration1 = $data['login_time'];
                                                  $Duration2 = $data['logout_time'];
                                                   $init = (strtotime($Duration2)-strtotime($Duration1))-$breaksec;
                                                  // $init = 685;
                                                  $hours = floor($init / 3600);
                                                  $minutes = floor(($init / 60) % 60);
                                                  $seconds = $init % 60;

                                               $total=$total+$init;
                                      
                                                  
                                                ?>
                                                  
                                        @endforeach
                                         <?php 
                                          // echo $total;
                                          $hours = floor($total / 3600);
                                                  $minutes = floor(($total / 60) % 60);
                                                  $seconds = $total % 60;

                                                  ?>
                                                  <div class="alert alert-success">
                                                  
                                                  <?php
                                                    
                                                  // echo "<pre>";

                                                 echo "Total working hrs is   "."  =>  ".  $hours.'hr   '.$minutes.'mins   '.$seconds.'sec'.'          ';
                                                
                                                echo $fulltime=$hours.'hr   '.$minutes.'mins';                                                  
                                                 ?>

                                                 </div>




                                                  <div class="alert alert-success">
                                                  
                                                  <?php
                                                    
                                                  
                                                 echo " YOUR BASIC SALARY of THE MONTH is Rs  ::::> " ;
                                                 foreach ($payroll as $pay) {
                                                  echo   $pay['basic_pay'];
                                                 }
                                                 ?>

                                                 </div>


                                                   <div class="alert alert-success">
                                                  
                                                  <?php
                                                    
                                                  
                                                 echo "BASIC SALARY Tll TODAY is Rs  ::::> " ;
                                                 foreach ($payroll as $pay) {
                                                  echo  ($salary= $pay['basic_pay']*$total)/576000;
                                                 }
                                                 ?>

                                                 </div>
                                         


                                                                        <div class="col-sm-6">
                          
                        </div>    

                  <div>
                  <form>
                  <hr>
                  <div class="row">
                    <table>
                      <tr>
                        <td>Month</td>
                        <td><input type="" name="" value="{{ date('F')  }}"></td>
                        <td> </td>
                        <td>Year</td>
                        <td><input type="" name="" value=" 20{{date('y')}}"></td>
                      </tr>
                    </table>
                    <hr>
                    <table>
                  
                      <tr>
                        <td>Employee Name</td>@foreach ($username as $name)
                        <td><input type="" name="" value="{{$name->fullname}}"></td>
                        <td> </td>
                        <td>Employee ID</td>
                        <td><input type="" name="" value="#00{{$name->user_id}}"></td>@endforeach

                      </tr>
                      <tr>
                        <td>Department ::</td>
                        <td> Research & Development</td>
                        <td> </td>
                        <td> Designation</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>Bank A/C No.</td>
                        <td><input type="" name="" value=""></td>
                        <td> </td>
                        <td> E-PAN No.#</td>
                        <td><input type="" name="" value=""></td>
                      </tr>
                      <tr>
                        <td>Bank Name</td>
                        <td>Century Bank</td>
                        <td> </td>
                        <td> Currency</td>
                        <td>Neplease Currency</td>
                      </tr>
                      <tr>
                        <td>BaseSalary</td>
                        <td><input type="" name="" value=" Rs.  <?php  foreach ($payroll as $pay) {
                                                  echo   $pay['basic_pay'];
                                                 }?>"></td>
                        <td> </td>
                        <td> Rate/Hour</td>
                        <td> 135.5/Hour      Worked</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Req.Working Hours</td>
                        <td><input type="" name="" value="  160       |  {{$fulltime}}"></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Req.Working days</td>
                        <td><input type="" name="" value="   23        | {{$totalattendence}}"></td>
                      </tr>
                      <div></div>
                      <div></div>


                    </table>
                    </div>
                    <div>Benifits</div>@foreach ($payroll as $pay)
                    <div>
                    <table>
                      <tr>
                        <td><h4>EARNING</h4>  </td>
                        <td><h4>AMOUNT(NPR)</h4></td>
                        <td></td>
                        <td><h4>DEDUCTIONS</h4></td>
                        <td><h4>AMOUNTS</h4></td>
                      </tr>
                      <tr>
                        <td>Basic Pay</td>
                        <td><input type="" name="" value="Rs. {{$a=$pay->basic_pay}}"></td>
                        <td></td>
                        <td>Advance Pay</td>
                        <td><input type="" name="" value="Rs. {{$aa=$pay->advance_pay}}"></td>
                      </tr>
                      <tr>
                        <td>Food Allowance</td>
                        <td><input type="" name="" value="Rs. {{$b=$pay->food_allowance}}"></td>
                        <td></td>
                        <td>Loan EMI</td>
                        <td><input type="" name="" value="Rs. {{$bb=$pay->loan_emi}}"></td>
                      </tr>
                      <tr>
                        <td>Travel Allowance</td>
                        <td><input type="" name="" value="Rs. {{$c=$pay->travel_allowance}}"></td>
                        <td></td>
                        <td>SST</td>
                        <td><input type="" name="" value="Rs. {{$cc=$pay->sst}}"></td>
                      </tr>
                      <tr>
                        <td>Entertainment</td>
                        <td><input type="" name="" value="Rs. {{$d=$pay->entertainment}}"></td>
                        <td></td>
                        <td>Provident Fund</td>
                        <td><input type="" name="" value="Rs. {{$dd=$pay->provision_fund}}"></td>
                      </tr>
                      <tr>
                        <td>Over Time(OT)</td>
                        <td><input type="" name="" value="Rs. {{$e=$pay->overtime}}"></td>
                        <td></td>
                        <td>Insurance</td>
                        <td><input type="" name="" value="Rs. {{$ee=$pay->insurance}}"></td>
                      </tr>
                      <tr>
                        <td>TDA</td>
                        <td><input type="" name="" value="Rs. {{$f=$pay->tda}}"></td>
                        <td></td>
                        <td>Other</td>
                        <td><input type="" name="" value="Rs. {{$ff=$pay->deduct_other}}"></td>
                      </tr>
                      <tr>
                        <td>Profit Sharing % </td>
                        <td><input type="" name="" value="Rs. {{$g=$pay->profit_sharing}}"></td>
                        <td></td>
                        <td> </td>
                        <td><input type="" name=""  value=""></td>
                      </tr>
                      <tr>
                        <td>Commission %</td>
                        <td><input type="" name=""  value="Rs. {{$h=$pay->commission}}"></td>
                        <td></td>
                        <td></td>
                        <td><input type="" name=""  value=""></td>
                      </tr>
                      <tr>
                        <td>Others</td>
                        <td><input type="" name=""  value="Rs. {{$i=$pay->earning_other}}"></td>
                        <td></td>
                        <td></td>
                        <td><input type="" name=""  value=""></td>
                      </tr>
                      <tr>
                        <td><h4>Total Earning</h4></td>
                        <td><input type="" name=""  value="Rs.{{$totalearning=$a+$b+$c+$d+$e+$f+$g+$h+$i}}"></td>
                        <td></td>
                        <td><h4>Total Deductible</h4></td>
                        <td><input type="" name=""  value="Rs.{{$totaldeductable=$aa+$bb+$cc+$dd+$ee+$ff}}"></td>
                      </tr>

                      <tr>
                        <td>  </td>
                        <td></td>
                        <td></td>
                        <td><b>GROSS PAYABLE</b></td>
                        <td><input type="" name=""  value=""></td>
                      </tr>

                      <tr>
                        <td>Previous Balance</td>
                        <td><input type="" name=""  value=""></td>
                        <td></td>
                        <td><b>NET PAYABLE</b></td>
                        <td><input type="" name=""  value=""></td>
                      </tr>

                      <tr>
                        <td>Carry Over/Due</td>
                        <td><input type="" name=""  value=""></td>
                        <td></td>
                        <td><b>Actual Paid</b></td>
                        <td><input type="" name=""  value=""></td>
                      </tr>
                      @endforeach


                    </table>  
                    
                    </form>
                  <div></div>
                  <hr>  
                  <div> 
                      The Sum of Amount  NPR ......... is paid to Mr./Ms. ......, as a salary for the month of ..... Amount in words ........
                  </div>
                  </div>
                  <form style="text-align:center;">

                    <p>  </p>

                    <a href="#" id="lnkPrint" target="_blank">Print</a>
                  </form>
                  <script type="text/javascript">
                    $( document ).ready(function() {
                        $('#lnkPrint').click(function()
                         {
                             window.print();
                         });
                    });
                  </script>
</body>

             
           

                     