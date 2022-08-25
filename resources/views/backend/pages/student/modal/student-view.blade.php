<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Student Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="col-md-12 text-right" style="margin-top: 8px;">
                <button id='modal-btn' class="btn btn-sm btn-success float right"><i class="fa fa-print" aria-hidden="true"style="width: 44px;font-size: 14px;"> Print</i></button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered student-dm">

                    <tbody>
                        <tr>
                            <td style="text-align: center;" colspan="2"><img id="user_image"
                                    style="border-radius: 7px; width:200px; height:200px;" src=""></td>
                        </tr>
                       <tr>
                            <td class="text-capitalize font-weight-bold font-italic">First Name </td>
                            <td id="firstName"></td>

                        </tr>
                        <tr>
                            <td class="text-capitalize font-weight-bold font-italic">Last Name </td>
                            <td id="lastName"></td>

                        </tr>
                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic"> Mobile</td>
                            <td id="mobile"></td>

                        </tr>
                        <tr>
                            <td class="text-capitalize font-weight-bold font-italic">Email </td>
                            <td id="email"></td>

                        </tr>
                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic"> Password</td>
                            <td id="password"></td>

                        </tr>

                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic"> Birth Certificate No./NID No. </td>
                            <td id="birth_id"></td>

                        </tr>

                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic"> Permanent Address </td>
                            <td id="permanentAddress"></td>

                        </tr>
                        
                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic"> Latest educational qualifications </td>
                            <td id="class"></td>

                        </tr>

                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic"> Educational Institution Name</td>
                            <td id="school_name"></td>

                        </tr>
                        
                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic"> Cashback Media Details</td>
                            <td id="cashback_way"></td>

                        </tr>
                        
                        <tr>

                            <td class="text-capitalize font-weight-bold font-italic"> Entry Date</td>
                            <td id="entry_date"></td>

                        </tr>
                        
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<div class="print-modal1" style="visibility: hidden; display:inline;">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="table-responsive print-modal p-3" id="div-id-name"><br>
                <div class="row justify-content-center align-items-center">
                    <div class="float-left mr-4">
                        <img id='img' src="{{($generalSettings) ? url('/public/uploads/files/logo/').'/'.$generalSettings->image : '' }}" class="" style="background-color:#900c3f; background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                    </div>
                    {{-- <div class="float-right mb-4">
                        <span class="font-weight-bold" style="font-size: 25px; margin-top:150px">{{($generalSettings) ? $generalSettings->name : ''}}</span>
                          <br>
                          @if($students->isEmpty())
                            <span class="font-weight-bold" style="font-size: 25px">Batch: {{"" ?? $student->batch->name}}</span>
                          @else 
                            <span class="font-weight-bold" style="font-size: 25px">Batch: {{ $student->batch->name ?? ""}}</span>  
                          @endif
                          
                    </div> --}}
                </div>
                <br>
                <h3  style="text-align:center">Student Detailed Information</h3>
                <br>
                <div class="modal-body">
                    <table class="table table-bordered student-dm">
    
                            <tbody>
                                
                                
                                    <tr>
                                        <td class="text-capitalize font-weight-bold font-italic" style="font-size:18px;">First Name </td>
                                        <td id="fullName_print" style="font-size:18px;"></td>
                                        <td class="text-capitalize font-weight-bold font-italic" style="font-size:18px;">Last Name </td>
                                        <td id="nickName_print" style="font-size:18px;"></td>
            
                                    </tr>
                                    
                                    <tr>
            
                                        <td class="text-capitalize font-weight-bold font-italic" style="font-size:18px;"> Mobile</td>
                                        <td id="mobile_print" style="font-size:18px;"></td>
                                        <td class="text-capitalize font-weight-bold font-italic" style="font-size:18px;">Email </td>
                                        <td id="email_print" style="font-size:18px;"></td>
            
                                    </tr>

                                    <tr>
            
                                        <td class="text-capitalize font-weight-bold font-italic" style="font-size:18px;"> Password</td>
                                        <td id="password_print" style="font-size:18px;"></td>
                                        <td class="text-capitalize font-weight-bold font-italic" style="font-size:18px;"> Birth Certificate No./NID No. </td>
                                        <td id="birth_id_print" style="font-size:18px;"></td>
            
                                    </tr>

                                    <tr>
                                        <td class="text-capitalize font-weight-bold font-italic" style="font-size:18px;"> Permanent Address</td>
                                        <td id="permanent_address_print" style="font-size:18px;"></td>
                                    
                                    </tr>

                                    <tr>
                                        <td class="text-capitalize font-weight-bold font-italic" style="font-size:18px;"> Class </td>
                                        <td id="class_print" style="font-size:18px;"></td>
                                        <td class="text-capitalize font-weight-bold font-italic" style="font-size:18px;"> Educational Institution Name </td>
                                        <td id="school_name_print" style="font-size:18px;"></td>
                                    </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="float-left ml-2">
                            <p>Powered By : Desktopit.net</p>
                        </div>
                        <div class="float-right">
                            <p>Date: {{date('d-m-Y')}}</p>
                        </div>
                    </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>  
