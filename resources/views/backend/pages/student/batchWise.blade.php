@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('public/assets/plugins/bootstrap-toggle/css/bootstrap-toggle.min.css') !!}
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
                                <li class="breadcrumb-item"><a>Student</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Student List</span></li>
                            </ol>

                            <a href="{{ route('admin.students.admit') }}"
                               class="btn btn-sm btn-info button-custom">Add New Student
                            </a>

                        </nav>
                    </div>
                    <div class="col-md-12 text-right" style="margin-top: 8px; margin-bottom: 8px">
                        <button id='btn' class="btn btn-sm btn-success float right"><i class="fa fa-print" aria-hidden="true"style="width: 44px;font-size: 14px;"> Print</i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table text-center">
                                    <thead>
                                    <tr>
                                        <th>Roll No.</th>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Students Phone No</th>
                                        <th>Students Email</th>
                                        <th>Batch Name</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $key=>$student)
                                        <tr class="item">
                                            {{-- <td>{{ ++$key }}</td> --}}
                                            <td>{{ $student->roll_no }}</td>
                                            <td>{{ $student->student_id }}</td>
                                            <td>{{ $student->user->name }}</td>
                                            <td>{{ $student->user->phone }}</td>
                                            <td>{{ $student->user->email }}</td>
                                            <td>{{ $student->batch->name }}</td>
                                            <td style="width: 10%"> 
                                               <div class="dropdown">
                                                    <a class=" dropdown-toggle dropdown_toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><i class="fa fa-cog"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="dropdownMenuButton">
                                                        <a href="javascript:void(0)" class="dropdown-item view-modal" title="View" data-id={{$student->id }}><i class="fa fa-eye"></i> View</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="{{ route("admin.students.edit", $student)}}"
                                                               class="dropdown-item" title="Edit" role="button">
                                                                <i class="fa fa-edit"></i> Edit</a>
                                                        <div class="dropdown-divider"></div>
                                                        @csrf
                                                        <a href="javascript:void(0)" class="dropdown-item delete" title="delete" data-id={{$student->id}}><i class="fa fa-trash"></i> Delete</a>
                                                        <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#"><span><i class="fa fa-edit"></i></span> Edit</a>
                                                    </div>
                                                </div>  
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
                                <div class="row justify-content-center align-items-center">
                                    <div class="float-left mr-4">
                                        <img id='img' src="{{($generalSettings) ? url('/uploads/files/logo/').'/'.$generalSettings->image : '' }}" class="" style="background-color:#900c3f; background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                                    </div>
                                    <div class="float-right mb-5">
                                        <span class="font-weight-bold" style="font-size: 25px; margin-top:150px">{{($generalSettings) ? $generalSettings->name : ''}}</span>
                                          <br>
                                          <span class="font-weight-bold" style="font-size: 25px">Batch: {{$student->batch->name}}</span>
                                    </div>
                                </div>  
                                <h3  style="text-align:center">Student List</h3>
                                <br>
                                <table id="order-listing" class="table">
                                  <thead>
                                    <tr>
                                        <th>Roll No.</th>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Students Phone No</th>
                                        <th>Students Email</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($students as $key=>$student)
                                        <tr class="item">
                                            <td>{{ $student->roll_no }}</td>
                                            <td>{{ $student->student_id }}</td>
                                            <td>{{ $student->user->name }}</td>
                                            <td>{{ $student->user->phone }}</td>
                                            <td>{{ $student->user->email }}</td>
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
            </div>
        </div>
    </div>
@include('backend.pages.student.modal.student-view')
@include('backend.pages.student.modal.student-delete')
@endsection

@push('plugin-scripts')
    {!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('public/assets/plugins/bootstrap-toggle/js/bootstrap-toggle.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('public/assets/js/printThis.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/data-table.js') !!}
    {!! Html::script('public/assets/js/toastDemo.js') !!}
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

    {{-- Ajax delete by modal js code end --}}
  
    {{-- Ajax View by modal js code start --}}
      <script type="text/javascript">
        $(document).on('click', '.view-modal', function() {
        var id = $(this).data('id');
        var APP_URL = {!! json_encode(url('/')) !!};
        //alert(APP_URL);

        $.ajax({
        cache: false,
        type: 'get',
        url: "students/"+id,
        data: { 'id': id },
        success: function(data) {
        console.log(data.students);
        $('#fullName').text(data.students.user.name);
        $('#fullName_print').text(data.students.user.name);
        $('#nickName').text(data.students.short_name);
        $('#nickName_print').text(data.students.short_name);
        $('#email').text(data.students.user.email);
        $('#email_print').text(data.students.user.email);
        $('#mobile').text(data.students.user.phone);
        $('#mobile_print').text(data.students.user.phone);
        $('#presentAddress').text(data.students.present_address);
        $('#presentAddress_print').text(data.students.present_address);
        $('#permanentAddress').text(data.students.permanent_address);
        $('#permanentAddress_print').text(data.students.permanent_address);
        $('#district').text(data.students.district);
        $('#district_print').text(data.students.district);
        $('#thana').text(data.students.thana);
        $('#thana_print').text(data.students.thana);
        $('#roll_no').text(data.students.roll_no); 
        $('#roll_no_print').text(data.students.roll_no); 
        $('#studentId').text(data.students.student_id);
        $('#studentId_print').text(data.students.student_id);
        $('#batch').text(data.students.batch.name);
        $('#batch_print').text(data.students.batch.name);
        $('#primaryContactNumber').text(data.students.primary_contact_number);
        $('#primaryContactNumber_print').text(data.students.primary_contact_number);
        $('#birth_date').text(data.students.birth_date); 
        $('#birth_date_print').text(data.students.birth_date); 
        $('#father_name').text(data.students.father_name);
        $('#father_name_print').text(data.students.father_name);
        $('#fa_occupation').text(data.students.fa_occupation);  
        $('#fa_occupation_print').text(data.students.fa_occupation);  
        $('#fa_phone').text(data.students.fa_phone); 
        $('#fa_phone_print').text(data.students.fa_phone); 
        $('#fa_email').text(data.students.fa_email); 
        $('#fa_email_print').text(data.students.fa_email); 
        $('#fa_nid').text(data.students.fa_nid); 
        $('#fa_nid_print').text(data.students.fa_nid); 
        $('#mother_name').text(data.students.mother_name);  
        $('#mother_name_print').text(data.students.mother_name);  
        $('#ma_occupation').text(data.students.ma_occupation);
        $('#ma_occupation_print').text(data.students.ma_occupation);
        $('#ma_phone').text(data.students.ma_phone); 
        $('#ma_phone_print').text(data.students.ma_phone); 
        $('#ma_email').text(data.students.ma_email); 
        $('#ma_email_print').text(data.students.ma_email); 
        $('#ma_nid').text(data.students.ma_nid);
        $('#ma_nid_print').text(data.students.ma_nid);
        $('#local_guardian').text(data.students.local_guardian);
        $('#local_guardian_print').text(data.students.local_guardian);
        $('#relation').text(data.students.relation);
        $('#relation_print').text(data.students.relation);
        $('#local_phone').text(data.students.local_phone);
        $('#local_phone_print').text(data.students.local_phone);
        $('#local_address').text(data.students.local_address);
        $('#local_address_print').text(data.students.local_address);
        $('#school_name').text(data.students.school_name);
        $('#school_name_print').text(data.students.school_name);
        $('#school_roll_no').text(data.students.school_roll_no);
        $('#school_roll_no_print').text(data.students.school_roll_no);
        $('#class').text(data.students.class);
        $('#class_print').text(data.students.class);
        $('#school_district').text(data.students.school_district);
        $('#school_district_print').text(data.students.school_district);
        $('#school_thana').text(data.students.school_thana);
        $('#school_thana_print').text(data.students.school_thana);
        $('#user_image'). attr("src", APP_URL+"/uploads/user_images/"+data.students.user.user_image);
        $('#viewModal').modal('show');

        }
        });

      });
      </script>
    {{-- Ajax View by modal js code end --}}

    {{-- Print option starts --}}
    <script>
        $('#btn').click( function(){
          $('.print-container').printThis();
        })
    </script>
    <script>
        $('#modal-btn').click( function(){
            $('.print-modal').printThis();
        })
    </script>
    {{-- Print option edns --}}  
@endpush
