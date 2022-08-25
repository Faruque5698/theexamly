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
                                <li class="breadcrumb-item active" aria-current="page"><span>Daily Attendance</span></li>
                        </ol>
                        {{-- @permission('add_modules')  --}}
                        {{-- <a href="{{ route('admin.modules.create') }}"
                        class="btn btn-sm btn-info button-custom">Add New Module
                        </a> --}}
                        {{-- @endpermission --}}
                    </nav>
                </div>
            </div>
            <div class="col-md-12 text-right" style="margin-top: 8px; margin-bottom: 8px">
              <button id='btn' class="btn btn-sm btn-success float right"><i class="fa fa-print" aria-hidden="true"style="width: 44px;font-size: 14px;"> Print</i></button>
            </div> 
            <div class="card-body">
                <form action="{{ route('admin.attendance.store') }}" method="post">
                    @csrf
                    <div class="row justify-content-md-center">
                        <div class="table-responsive recordtable col-md-10">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                      <th style="width: 20%">Student ID</th>
                                      <th style="width:40%" class="">Student Name</th>
                                      @permission('attendance_take')
                                        <th style="width:40%" class="">Action</th>
                                      @endpermission
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($students as $key=>$student)
                                          <tr>
                                              {{-- <td>{{ ++$key }}</td> --}}
                                              <td>{{ $student->student_id }}</td>
                                              <td>{{ $student->user->name }}</td>
                                              @permission('attendance_take')
                                                <td>
                                                  <div class="col-sm-6" style="padding:0px">
                                                        <select class="form-control" name=attendance[] id="attendance" required style="margin-left: 0px;">
                                                            <option value="p">Present</option>
                                                            <option value="a">Absent</option>
                                                            <option value="l">Late</option>
                                                            <option value="o">On Leave</option>
                                                        </select>
                                                  </div>
                                                  
                                                    {{-- <div> --}}
                                                    <input type="hidden" name=student_id[] id="student_id" 
                                                        value={{ $student->student_id }}>
                                                    {{-- </div>  --}}
                                                </td>
                                              @endpermission   
                                          </tr>
                                      @endforeach
                                  </tbody>
                            </table>
                            <br>
                            @permission('attendance_take')
                              <button type="submit" class="btn btn-primary">Submit</button>
                            @endpermission
                            <a class="btn btn-danger" href="{{ route('admin.attendance.check') }}">Cancel</a>
                        </div>
                    </div>                   
                </form>
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
                  <span class="font-weight-bold"
                      style="font-size: 25px; margin-top:150px">{{$generalSettings->name}}</span>
                  <br>
                  <span class="font-weight-bold" style="font-size: 25px">Batch: {{ $students->first()->batch->name ?? '' }}</span>
              </div>
          </div>
              <h3  style="text-align:center">Attendance List</h3>
              <br>
              <table id="order-listing" class="table">
                <thead>
                  <tr>
                    <th style="font-size: 20px;">Student ID/Name</th>
                    <th style="font-size: 20px;">Signature</th>
                    <th style="font-size: 20px;">Student ID/Name</th>
                    <th style="font-size: 20px;">Signature</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $key = 0;
                  @endphp
                  {{-- @foreach($students as $student)
                      <tr id="{{$student->id}}">
                          <td>{{ $student->student_id ?? '-' }} <br> {{ $student->user->name ?? '-' }} </td>
                          <td></td>
                      </tr>
                  @endforeach --}}
                  @for ($i = 0; $i < count($studentsArray); $i = $i+2)
                    <tr>
                      <td style="font-size:18px;">{{ $studentsArray[$i]['student_id'] ?? '-' }} <br> {{ $studentsArray[$i]['user']['name'] ?? '-' }} </td>
                      <td></td>
                      @if (($i+1)<count($studentsArray))
                        <td style="font-size:18px;">{{ $studentsArray[$i+1]['student_id'] ?? '-' }} <br> {{ $studentsArray[$i+1]['user']['name'] ?? '-' }} </td>
                        <td></td>
                      @endif 
                    </tr>  
                  @endfor
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

    </script>
    {{-- Print option start --}}
    <script>
      $('#btn').click( function(){
        $('.print-container').printThis();
      })
    </script>
@endpush