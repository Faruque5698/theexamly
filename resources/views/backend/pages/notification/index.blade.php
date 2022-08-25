@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
    {!! Html::style('public/css/toggle-text-style.css') !!}
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
@endpush

@section('content')
{{-- <style type="text/css">
  .1_width{
    width: 10%;
  }
    .2_width{
    width: 15%;
  }
    .3_width{
    width: 15%;
  }
    .4_width{
    width: 15%;
  }
    .5_width{
    width: 15%;
  }
</style> --}}
    <div class="col-md-13 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Notication</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Due Alart List</span></li>
                        </ol>
                    </nav>
                </div>
            </div>     
            {{-- <label style="display: none">count: {{ $counts }}</label>        --}}
            <div class="card">
              <div class="card-body">
                 <div class="row justify-content-end mb-4">
                  <button id='btn' class="btn btn-sm btn-success"><i class="fa fa-print" aria-hidden="true"> Print</i></button>
                </div>
                <div class="row">
                  <div class="col-12">
                    {{-- <div class="table-responsive"> --}}
                        <table id="order-listing" class="table">
                          <thead>
                            <tr>
                              <th>#Sl</th>
                              <th>Name</th>
                              {{-- <th>Email</th> --}}
                              <th>Phone No</th>
                              <th style="text-align:center">Batch Name</th>
                              {{-- <th style="text-align:center">Course Fee</th> --}}
                              {{-- <th style="text-align:center">Paid Amount</th> --}}
                              <th style="text-align:center">Due Amount</th>
                              <th style="text-align:center">Commitment Date</th>
                              @permission('due_payment_btn')
                                <th style="text-align:center;width: 1px">Actions</th>
                              @endpermission  
                            </tr>
                          </thead>
                          <tbody>
                              @php
                                  $key = 0;
                              @endphp
                              @foreach($dueAlart as $due)
                                  <tr id="{{$due->id}}">
                                      <td>{{ ++$key }}</td>
                                      <td>{{ $due->user->name ?? '-' }}</td>
                                      {{-- <td>{{ $due->user->email ?? '-' }}</td> --}}
                                      <td>{{ $due->user->phone ?? '-' }}</td>
                                      <td style="text-align:center">{{ $due->batch->name ?? '-' }}</td>
                                      {{-- <td style="text-align:center">{{ $due->course_fee ?? '-' }}</td> --}}
                                      {{-- <td style="text-align:center">{{ $due->paymented_amount ?? '-' }}</td> --}}
                                      <td style="text-align:center">{{ $due->due_amount ?? '-' }}</td>
                                       <td style="text-align:center">{{ date('d-m-Y', strtotime($due->commitment_date ?? '-' )) }}</td>
                                      @permission('due_payment_btn')
                                          <td style="width: 10%">
                                              <a href="{{ route('admin.collectFees.indexIndividual',[$id=$due->user_id,$id2=$due->batch_id]) }}" class="btn btn-warning" title="Details" role="button"><i class="fa fa-info-circle"></i></a>
                                          </td>
                                      @endpermission 
                                  </tr>
                              @endforeach
                          </tbody>
                        </table>
                      {{-- </div> --}}
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>    
    @include('backend.pages.teachers.modal.teacher-view')  
  <div class="printDiv" style="visibility: hidden; display:inline;">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="print-container" id="div-id-name"><br>
                <div class="row justify-content-center align-items-center mb-3">
                  <div class="float-left mr-4">
                      <img id='img' src="{{($generalSettings) ? url('/uploads/files/logo/').'/'.$generalSettings->image : '' }}" class="" style="background-color:#900c3f; background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                  </div>
                  <div class="float-right mb-4">
                    <span class="font-weight-bold"
                        style="font-size: 25px; margin-top:150px">{{($generalSettings) ? $generalSettings->name : ''}}</span>
                  </div>
                </div>
                <h3  style="text-align:center">Due Alart List</h3>
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                      <th>Sl</th>
                      <th>Name</th>
                      <th>Phone No</th>
                      <th style="text-align:center">Batch Name</th>
                      <th style="text-align:center">Course Fee</th>
                      {{-- <th style="text-align:center">Payment Amount</th> --}}
                      <th style="text-align:center">Due Amount</th>
                      <th style="text-align:center">Commitment Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($dueAlart as $key=>$due)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $due->user->name ?? '-' }}</td>
                            <td>{{ $due->user->phone ?? '-' }}</td>
                            <td style="text-align:center">{{ $due->batch->name ?? '-' }}</td>
                            <td style="text-align:center">{{ $due->course_fee ?? '-' }}</td>
                            {{-- <td style="text-align:center">{{ $due->paymented_amount ?? '-' }}</td> --}}
                            <td style="text-align:center">{{ $due->due_amount ?? '-' }}</td>
                            <td style="text-align:center">{{ date('d-m-Y', strtotime($due->commitment_date ?? '-' )) }}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="rtf-left">
                    <p>Powerd By : Desktopit.net</p>
                </div>
                <div class="rtf-right"></div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>            
@endsection

@push('plugin-scripts')
    {!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('public/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
    {!! Html::script('public/assets/js/printThis.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/data-table.js') !!}
    {!! Html::script('public/assets/js/toastDemo.js') !!} 
  
  {{-- Ajax View by modal js code start --}}
      <script type="text/javascript">
        $(document).on('click', '.view-modal', function() {
        var id = $(this).data('id');
        var APP_URL = {!! json_encode(url('/')) !!};
        //alert(APP_URL);

        $.ajax({
        cache: false,
        type: 'get',
        url: "teacher/"+id,
        data: { 'id': id },
        success: function(data) {
        console.log(data);
        $('#name').text(data.teachers.user.name);
        $('#email').text(data.teachers.user.email);
        $('#mobile').text(data.teachers.user.phone);
        $('#status').text((data.teachers.status) ? "Active" : "Inactive");
        $('#address').text(data.teachers.address);
        $('#details').text(data.teachers.details);        
        $('#user_image'). attr("src", APP_URL+"/uploads/user_images/"+data.teachers.user.user_image);
        $('#viewModal').modal('show');

        }
        });

      });
      </script>
      {{-- Ajax View by modal js code end --}}
    
    <script type="text/javascript">   
        $(document).ready(function () {
            @if (session('success'))
            showSuccessToast('{{ session("success") }}');
            @elseif(session('warning'))
            showWarningToast('{{ session("warning") }}');
            @endif
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    {{-- Print option start --}}
    <script>
      $('#btn').click( function(){
        $('.print-container').printThis();
      })
    </script>

    <script>
      $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var category_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'changeTeacherStatus',
                data: {'status': status, 'category_id': category_id},
                success: function(data){
                  showSuccessToast('Status changed successfully');
                  console.log(data.success)
                }
            });
        })
      })
    </script>
@endpush
