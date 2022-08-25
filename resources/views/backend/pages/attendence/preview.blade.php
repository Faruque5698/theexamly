@extends('backend.layout.master')

@push('plugin-styles')

    {!! Html::style('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('/assets/plugins/bootstrap-toggle/css/bootstrap-toggle.min.css') !!}

@endpush

@section('content')
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-header">
                    <div class="template-demo">
                        <nav aria-label="breadcrumb" class="nav-container">
                            <ol class="breadcrumb breadcrumb-custom ">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a>Attendance</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>View Attendance</span></li>
                                
                                <div class="col-md-8 text-right" style="margin-top:7px;margin-left:20px">
                                    <button id='btn' class="btn btn-sm btn-success float right"><i class="fa fa-print" aria-hidden="true"style="width: 44px;font-size: 14px;"> Print</i></button>
                                </div>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table text-center">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Student ID</th>
                                        <th>Students Name</th>
                                        <th>Attend Status</th>
                                        @permission('attendance_edit')
                                            <th>Action</th>
                                        @endpermission
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($attendances as $key=>$attendance)
                                        <tr class="item">
                                            {{-- <td>{{ ++$key }}</td> --}}
                                            <td>{{  date ('d-m-Y',strtotime($attendance->attendance_date)) }}</td>
                                            <td>{{ $attendance->student_id }}</td>
                                            <td>{{ $attendance->batch_student->user->name }}</td>
                                            <td>
                                                @if ($attendance->action == 'p')
                                                    Present
                                                @elseif($attendance->action == 'l')
                                                    Late
                                                @elseif($attendance->action == 'a') 
                                                    Absent
                                                @else 
                                                    On Leave       
                                                @endif
                                            </td>
                                            {{-- <td></td> --}}
                                            @permission('attendance_edit')
                                                <td style="width: 10%"> 
                                                    <a href="{{ route("admin.attendance.edit", $attendance)}}"
                                                        class="btn btn-success"
                                                        title="Edit"
                                                        role="button">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                            @endpermission
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="printDiv" style="visibility: hidden; display:inline;">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">                              
                <div class="table-responsive table table-bordered print-container p-3" id="div-id-name"><br>
                    <div class="row justify-content-center align-items-center mb-3">
                        <div class="float-left mr-4">
                            <img id='img' src="{{($generalSettings) ? url('/uploads/files/logo/').'/'.$generalSettings->image : '' }}" class="" style="background-color:#900c3f; background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                        </div>
                        <div class="float-right mb-4">
                            <span class="font-weight-bold" style="font-size: 25px; margin-top:150px">{{($generalSettings) ? $generalSettings->name : ''}}</span>
                            <br>
                            <span class="font-weight-bold" style="font-size: 25px">Batch: {{ $students->first()->batch->name ?? '' }}</span>
                        </div>
                    </div>
                    <br>  
                    <h3  style="text-align:center">Attendance List</h3>
                    <br>
                    <table id="order-listing" class="table text-center student-dm">
                        <thead>
                            <tr>
                                <td>Sl</td>
                                <th>Date</th>
                                <th>Student ID</th>
                                <th>Students Name</th>
                                <th>Attend Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendances as $key=>$attendance)
                                <tr class="item">
                                    <td>{{ ++$key }}</td>
                                    <td>{{  date ('d-m-Y',strtotime($attendance->attendance_date)) }}</td>
                                    <td>{{ $attendance->student_id }}</td>
                                    <td>{{ $attendance->batch_student->user->name }}</td>
                                    <td>
                                        @if ($attendance->action == 'p')
                                            Present
                                        @elseif($attendance->action == 'l')
                                            Late
                                        @elseif($attendance->action == 'a') 
                                            Absent
                                        @else 
                                            On Leave       
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table><br>
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
    @include('backend.pages.student.modal.student-delete')
@endsection

@push('plugin-scripts')

    {!! Html::script('/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('/assets/plugins/bootstrap-toggle/js/bootstrap-toggle.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('/assets/js/printThis.js') !!}

@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/data-table.js') !!}
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
    </script>

    <script>
        $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var category_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: 'changeStatusPublish',
                    data: {'status': status, 'category_id': category_id},
                    success: function(data){
                        showSuccessToast('Status changed successfully');
                        console.log(data.success)
                    }
                });
            })
        });
    </script>

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
        url:"students/"+user_id,
        dataType: "JSON",
        data: {
        "id": user_id, _token: '{{csrf_token()}}'},

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
        window.location.replace('student');
        }
        })
        });
    </script>

  {{-- Ajax View by modal js code start --}}
  {{-- Print option starts --}}
    <script>
        $('#btn').click( function(){
          $('.print-container').printThis();
        })
    </script>
    {{-- Print option edns --}} 
  
@endpush
