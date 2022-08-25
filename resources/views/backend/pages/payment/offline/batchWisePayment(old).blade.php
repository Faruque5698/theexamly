@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!} 
    {!! Html::style('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {{-- {!! Html::style('/css/frontend/css/lightbox.min.css') !!} --}}
    {!! Html::style('/css/frontend/css/bootstrap.min.css') !!}
    {!! Html::style('/css/frontend/css/all.min.css') !!}
    {!! Html::style('/css/frontend/css/style.css') !!}
@endpush

@section('content')
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-header">
                    <div class="template-demo">
                        <nav aria-label="breadcrumb" class="nav-container">
                            <ol class="breadcrumb breadcrumb-custom ">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a></li>
                                <li class="breadcrumb-item"><a>Payment</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Collect Fees</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-lg-12 d-flex float-left">
                    <div class="cource_menu ml-4">
                        <h2 class="text_title text-center">Batch List</h2>
                        <ul style="border: 1px solid #A0A0A0" id="cource-filter-button" class="list-group">
                            @foreach ($batches as $batch)
                              <li data-filter="{{ $batch->batch->name ?? '' }}" 
                                class="list-group-item {{($batch->id == $batches->first()->id) ? 'active' : ''}} cource_menu_item text_subtitle">
                                <div class="d-flex justify-content-between">
                                  <span>{{ $batch->batch->name ?? '' }} &nbsp;</span>
                                  <span><i class="fas fa-chevron-right"></i></span>
                                </div>
                              </li>
                            @endforeach
                        </ul>
                    </div>
                  </div>

                  <div id="printThisDiv" class="col-md-12 mt-5 mt-lg-0">
                    <div class="row justify-content-center align-items-center d-none d-print-flex">
                      <div class="float-left mr-4">
                        <img id='img' src="{{ asset('/public/uploads/files/logo') }}/{{$generalSettings->image }}" class="" style="background-color:#75414b; background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                      </div>
                      <div class="float-right mb-4">
                          <span class="font-weight-bold" style="font-size: 25px">{{$generalSettings->name}}</span>
                          <br>
                          <span class="font-weight-bold" style="font-size: 25px">Batch: </span>
                          <span id="batch_name" class="font-weight-bold" style="font-size: 25px"></span>
                      </div>
                  </div>
                  
                    <h4 class="text_title text-center d-print-none">Details</h4>

                    <div class="row  cource-page-filtr-container">
                      
                      @foreach($batchStudent as $fee)
                      
                        <div data-category="{{ $fee->batch->name ?? '' }}" class="col-lg-12 filtr-item">
                          <div class="card-body mb-3">
                            <div class="row">
                              <div class="col-md-12 float-right">
                                <div class="table-responsive">
                                  <table class="table table-striped table-bordered table-sm" style="width: 100%;">
                                    <tbody>
                                    <tr>                                        
                                      <th>Batch Name</th>
                                      <td>{{ $fee->batch->name ?? ''}}</td>
                                    </tr>
                                      <th>Student Id</th> 
                                      @foreach( $students as $key=> $value)
                                        <td>{{ $value->student_id}}</td>
                                      @endforeach
                                    <tr>
                                      <th>Roll No</th>
                                      <td>{{ $fee->roll_no}}</td>
                                    </tr>
                                      <th>Student Name</th>
                                      @foreach( $students as $key=> $value)
                                        <td>{{ $value->user->name}}</td>
                                      @endforeach
                                    <tr>
                                      <th>Phone No</th>
                                      @foreach( $students as $key=> $value)
                                        <td>{{ $value->user->phone}}</td>
                                      @endforeach
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="card-body">
                          {{-- <div class="row">
                            <div>
                              <a class="btn btn-sm btn-info m-3 btn-print d-print-none" batch-id="{{$fee->batch->name}}">Print</a>
                            </div>
                          </div> --}}
                          <div class="row">
                            <div class="col-md-12 text-center">
                              <div class="float-left">
                                <a class="btn btn-sm btn-warning btn-print d-print-none" batch-id="{{$fee->batch->name ?? ''}}">Print</a>
                              </div>
                              @permission('individual_add_payment')
                                <a class="btn btn-success float-right d-print-none" href="{{ route('admin.collectFees.creates',[$id=$fee->user_id , $id2=$fee->batch_id]) }}" >
                                  <i class="fa fa-plus"></i> 
                                  Add payment   
                                </a>
                              @endpermission
                            </div>
                            
                          </div>
                        </div>

                        <div class="table-responsive p-2">
                          
                        <table id="table" class="table table-striped table-bordered text-center">
                          <thead>
                            <tr>
                              <th>#SL</th>
                              <th>Course Fee</th>
                              <th>Payment Amount</th>
                              <th>Due Amount</th>
                              <th>Payment Date</th>
                              <th>Cuopon Code</th>
                              @permission('individual_delete_payment')
                                <th class="d-print-none">Action</th>
                              @endpermission
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($fee->paymentHistory2 as $singleFee)
                            <tr>
                              <td>{{ ++$key }}</td>
                              <td>{{ $fee->course_fee }}</td>
                              <td>{{ $singleFee->paymented_amount }}</td>
                              <td>{{ $fee->due_amount }}</td>
                              <td>{{ $singleFee->payment_date }}</td>
                              <td>{{ $singleFee->coupon_code }}</td>
                              @permission('individual_delete_payment')
                                <td class="d-print-none">
                                  <a href="{{ route('admin.payment.delete',[$fee->user_id ?? "",$fee->batch_id ?? ""] ) }}" class=" btn-danger btn-sm ml-auto" style="font-size: 15px;margin-right: 25px;"><i class="fa fa-trash"></i></a>          
                                </td>          
                              @endpermission
                            </tr>
                            @if($totalCourseFee !=null and $loop->last)
                            <tr>
                              <td style="border: 1px solid Transparent"></td>
                              <td style="border: 1px solid Transparent">Course Fee = {{ $totalCourseFee[$fee->batch_id] }} /- </td>
                              <td style="border: 1px solid Transparent">Total = {{ $totalPaymentAmount[$fee->batch_id] }} /- </td>
                              <td style="border: 1px solid Transparent">Total = {{ $totalDue[$fee->batch_id] }} /- </td>
                              <td style="border: 1px solid Transparent" colspan="3"></td>
                          </tr>
                            @endif
                            @endforeach
                            
                          </tbody>
                        </table>
                        </div>
                        <div class="d-none d-print-block">
                          <div class="float-left ml-2">
                            <p>Powered By : Desktopit.com.bd</p>
                          </div>
                          <div class="float-right">
                            <p>Date: {{date('d-m-Y')}}</p>
                          </div>
                        </div>
                      </div>  
                    @endforeach
                  </div>
                      
                </div>         
              </div><br><br><br><br><br>
                  
            </div>
        </div>
    </div>
    @include('backend.pages.payment.modal.payment-delete') 
  <div class="printDiv" style="visibility: hidden; display:inline;">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">                  
                <div class="table-responsive table table-bordered print-container p-3" id="div-id-name"><br>
                    <div class="row justify-content-center align-items-center">
                        <div class="float-left mr-3">
                            <img id='img' src="{{ asset('/public/uploads') }}/{{$generalSettings->image }}" class="rounded-circle" style="width:150px; height:150px; margin-left:25px; margin-bottom: 10px">
                        </div>
                        <div class="float-right mb-5">
                            <span class="font-weight-bold" style="font-size: 25px">{{$generalSettings->name}}</span>
                            <br>
                            <span class="font-weight-bold" style="font-size: 25px">Batch: {{$value->batch->name ?? ''}}</span>
                        </div>
                    </div>  
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-sm" style="width: 100%;">
                                        <tbody>
                                        <tr>                                        
                                          <th>Batch Name</th>
                                           @foreach( $students as $key=> $value)
                                          <td>{{ $value->batch->name ?? ''}}</td>
                                          @endforeach
                                        </tr>
                                          <th>Student Id</th> 
                                          @foreach( $students as $key=> $value)
                                          <td>{{ $value->student_id}}</td>
                                          @endforeach
                                        <tr>
                                          <th>Roll No</th>
                                           @foreach( $students as $key=> $value)
                                          <td>{{ $value->roll_no}}</td>
                                          @endforeach
                                        </tr>
                                          <th>Student Name</th>
                                           @foreach( $students as $key=> $value)
                                          <td>{{ $value->user->name}}</td>
                                          @endforeach
                                        <tr>
                                          <th>Phone No</th>
                                           @foreach( $students as $key=> $value)
                                          <td>{{ $value->user->phone}}</td>
                                          @endforeach
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3  style="text-align:center">Payment Details</h3>
                    <br>
                    <table id="order-listing" class="table">
                     <thead>
                        <tr>
                          <th>#SL</th>
                          <th>Total Course Fee</th>
                          <th>Payment Amount</th>
                          <th>Due</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($batchStudent as $key=>$fees)
                          <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $fees->course_fee }}</td>
                            <td>{{ $fees->paymented_amount }}</td>
                            <td>{{ $fees->due_amount }}</td>
                            {{-- <td>{{ $fees->paymentHistory->first()->payment_date }}</td> --}}
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <br>
                    <div class="float-left ml-2">
                        <p>Powered By : Desktopit.com.bd</p>
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
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
  {!! Html::script('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
  {!! Html::script('/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
  {!! Html::script('/assets/js/printThis.js') !!}
  {!! Html::script('/js/frontend/jquery.filterizr.min.js') !!}
@endpush

@push('custom-scripts')
    {{-- {!! Html::script('/assets/js/data-table.js') !!} --}}
    {!! Html::script('/assets/js/toastDemo.js') !!}
    <script type="text/javascript">
        $(document).ready(function () {
            @if (session('success'))
            showSuccessToast('{{ session("success") }}');
            @elseif(session('danger'))
            showDangerToast('{{ session('danger') }}');
            @elseif(session('warning'))
            showWarningToast('{{ session("warning") }}');
            @endif
        });
        $('[data-toggle="tooltip"]').tooltip();
        $(this).addClass("active").siblings().removeClass("active");
    </script>

    <script>
        "use strict";
        $(document).ready(function () {
          $(this).addClass("active").siblings().removeClass("active");
            $("#cource-filter-button li").on("click", function () {
                $(this).addClass("active").siblings().removeClass("active");
                console.log($(this).eq(0).attr('data-filter'));
                let courseName = $(this).eq(0).attr('data-filter');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            });
            
            // project filter
            $(".cource-page-filtr-container").filterizr({
                animationDuration: 0.5,
                easing: "ease-out",
                filter: "{{$batches->first()->batch->name ?? ''}}",
            });
            //   end
        });
    </script>
 
  {{-- Print option starts --}}
  <script>
      $('.btn-print').click( function(){
        $("#batch_name").text($(this).attr("batch-id"));
        $('#printThisDiv').printThis({
          afterPrint: function() {
            window.location.reload(true);
          }
        });
      });
  </script>
  {{-- Print option ends --}} 

  {{-- Ajax delete by modal js code start --}}

    <script type="text/javascript">
      var user_id;

      $(document).on('click', '.delete', function(){
        user_id = $(this).data('id');
        $('#confirmModal').modal('show');
      });

      $('#ok_button').click(function(){
        $.ajax({
          cache: false,
          type: 'post',
          url:"payment/delete/"+user_id,
          dataType: "JSON",
          data: {
          "id": user_id
          },
          beforeSend:function(){
            $('#ok_button').text('Deleting...');
          },
          success:function(response){
            $('#confirmModal').modal('hide');
            $('#'+user_id).remove();
            $('#ok_button').text("OK");
            showSuccessToast(response.success);
          }
        })
      });
    </script>
  {{-- Ajax delete by modal js code end --}}  
@endpush
