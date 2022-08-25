@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!} 
    {!! Html::style('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}

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
                            <a  id='btn' class="btn btn-sm btn-warning button-custom">Print</a>
                        </nav>
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
                                      <td>{{ $batchStudent->first()->batch->name}}</td>
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
                @permission('batchwise_add_payment')
                  <a href="{{ route('admin.collectFees.creates',[$id=$value->user_id , $id2=$value->batch_id]) }}" class=" btn-success btn-sm ml-auto" style="font-size: 15px;margin-right: 25px;">Add payment
                    <i class="fa fa-plus"></i>
                  </a>
                @endpermission  
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                          Course Fee : {{ ($batchStudent) ? $batchStudent->first()->course_fee : ''   }}
                            <div class="table-responsive">
                                <table id="" class="table table-striped table-bordered text-center">
                                    <thead>
                                    <tr>
                                      <th>#SL</th>
                                      {{-- <th>Total Course Fee</th> --}}
                                      <th>Date</th>
                                      <th>Payment Amount</th>
                                      <th>Due Amount</th>
                                      <th>Coupon Code</th>
                                      {{-- @permission('delete_payment') --}}
                                      {{-- <th>Action</th> --}}
                                      {{-- @endpermission --}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                      @php $paid_amount = 0; @endphp
                                    @foreach($batchStudent as $key=>$fees)
                                      @foreach($fees->paymentHistory as $fee)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            {{-- <td>{{ $fees->course_fee }}</td> --}}
                                            <td>{{ date('d-m-Y',strtotime($fee->payment_date)) }}</td>
                                            <td>{{ $fee->paymented_amount }}</td>
                                            @php $paid_amount += $fee->paymented_amount @endphp
                                            {{-- <td>{{ $fees->due_amount }}</td> --}}
                                            <td>{{ $fees->course_fee - $paid_amount }}</td>
                                            <td>{{ $fee->coupon_code }}</td>
                                            {{-- <td> --}}
                                              {{-- @permission('delete_payment') --}}
                                                {{-- <a href="javascript:void(0)" class=" btn-danger delete btn-sm"
                                                  title="delete" data-toggle="tooltip" data-id={{$fees->id}}><i class="fa fa-undo"></i></i>
                                                </a> --}}
                                              {{-- @endpermission --}}
                                            {{-- </td> --}}
                                        </tr>
                                      @endforeach  
                                    @endforeach
                                    {{-- @if($totalCourseFee !=null)
                                      <tr>
                                        <td style="border: 1px solid Transparent"></td>
                                        <td style="border: 1px solid Transparent">Course Fee = {{ $totalCourseFee }} /- </td>
                                        <td style="border: 1px solid Transparent">Total = {{ $totalPaymentAmount }} /- </td>
                                        <td style="border: 1px solid Transparent">Total = {{ $totalDue }} /- </td>
                                        <td style="border: 1px solid Transparent" colspan="3"></td>
                                      </tr>
                                    @endif   --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
                        <div class="float-left mr-4">
                          <img id='img' src="{{ asset('/public/uploads/files/logo') }}/{{$generalSettings->image }}" class="" style="background-color:#75414b; background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                        </div>
                        <div class="float-right mb-4">
                            <span class="font-weight-bold" style="font-size: 25px">{{$generalSettings->name}}</span>
                            <br>
                            <span class="font-weight-bold" style="font-size: 25px">Batch: {{$value->batch->name}}</span>
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
                                          <td>{{ $value->batch->name}}</td>
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
                          <th>Coupon</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($batchStudent as $key=>$fees)
                          @foreach($fees->paymentHistory as $fee)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $fees->course_fee }}</td>
                                <td>{{ $fee->paymented_amount }}</td>
                                <td>{{ $fees->due_amount }}</td>
                                <td>{{ date('d-m-Y',strtotime($fee->payment_date)) }}</td>
                                <td>{{ $fee->coupon_code }}</td>
                            </tr>
                          @endforeach  
                        @endforeach
                        @if($totalCourseFee !=null)
                          <tr>
                            <td></td>
                            <td>Course Fee = {{ $totalCourseFee }} /- </td>
                            <td>Total = {{ $totalPaymentAmount }} /- </td>
                            <td>Total = {{ $totalDue }} /- </td>
                            <td colspan="2"></td>
                          </tr>
                        @endif  
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
    </script>
 
  {{-- Print option starts --}}
  <script>
      $('#btn').click( function(){
        $('.print-container').printThis();
      })
  </script>
  {{-- Print option edns --}} 

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
      type: 'delete',
      url:"delete/"+user_id,
      dataType: "JSON",
      data: {
      "id": user_id

      },
      beforeSend:function(){
      $('#ok_button').text('Deleting...');
      },
      success:function(response)
      {
      //console.log(response.success);
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
