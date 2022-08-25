@extends('backend.layout.master')

@push('plugin-styles')
{!! Html::style('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
{!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
{!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
@endpush

<style>
    .recordtable .table td, .recordtable .table th {
     padding: .35rem .50rem;
     vertical-align: center;
 }
 </style>

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
                            <li class="breadcrumb-item"><a href="#">Attendence</a></li>
                            <li class="breadcrumb-item"><a href="#">View Attendence</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Edit Attendance</span></li>
                        </ol>
                        {{-- @permission('add_modules')  --}}
                        {{-- <a href="{{ route('admin.modules.create') }}"
                        class="btn btn-sm btn-info button-custom">Add New Module
                        </a> --}}
                        {{-- @endpermission --}}
                    </nav>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.attendance.update',['attendance'=>$attendance]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row justify-content-md-center">
                        <div class="table-responsive recordtable col-md-10">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                      <th style="width: 20%">Student ID</th>
                                      <th style="width: 20%">Date</th>
                                      <th style="width:30%" class="">Student Name</th>
                                      <th style="width:30%" class="">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                     
                                          <tr>
                                              {{-- <td>{{ ++$key }}</td> --}}
                                              <td>{{ $attendance->student_id }}</td>
                                              <td>{{  date ('d-m-Y',strtotime($attendance->attendance_date)) }}</td>
                                              <td>{{ $attendance->batch_student->user->name }}</td>
                                              <td>
                                                  <div class="col-sm-6" style="padding:0px">
                                                      <select class="form-control" name=action id="attendance" required style="margin-left: 0px;">
                                                          <option value="p"
                                                           @if ($attendance->action == 'p') selected @endif >Present</option>
                                                          <option value="a"
                                                          @if ($attendance->action == 'a') selected @endif>Absent</option>
                                                          <option value="l"
                                                          @if ($attendance->action == 'l') selected @endif>Late</option>
                                                          <option value="o"
                                                          @if ($attendance->action == 'o') selected @endif>On Leave</option>
                                                      </select>
                                                  </div>  
                                              </td>
                                          </tr>
                                      
                                  </tbody>
                            </table>
                            <br>
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <a class="btn btn-danger" href="{{ route('admin.attendance.previewCheck') }}">Cancel</a>
                        </div>
                    </div>
                    
                </form>
            </div>   
        </div>
    </div>
</div>

@endsection

@push('plugin-scripts')
{!! Html::script('/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
{!! Html::script('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
{!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}

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
@endpush