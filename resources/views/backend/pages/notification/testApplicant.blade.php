@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
    {!! Html::style('public/css/toggle-text-style.css') !!}
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
@endpush

@section('content')
    <div class="col-md-13 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Notication</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Registration Try or Failed Users</span></li>
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
                    <div class="table-responsive">
                        <table id="order-listing" class="table student-dm">
                          <thead>
                            <tr>
                              <th>#Sl</th>
                              <th>Name</th>
                              <th>Phone No</th>
                              <th>Email</th>
                              <th style="text-align:center">Course Name</th>
                              <th style="text-align:center">Group</th>
                              <th style="text-align:center">Subject</th>
                              <th style="text-align:center">Apply Date</th>
                              {{-- @permission('approve_btn')
                                <th style="text-align:center;width: 1px">Actions</th>
                              @endpermission  --}} 
                            </tr>
                          </thead>
                          <tbody>
                              @php
                                  $key = 0;
                              @endphp
                              @foreach($list as $key=>$lists)
                                  <tr id="{{$lists->id}}">
                                      <td>{{ ++$key }}</td>
                                      <td>{{ $lists->first_name ?? '-' }} {{ $lists->last_name ?? '-' }}</td>
                                      <td>{{ $lists->phone ?? '-' }}</td>
                                      <td>{{ $lists->email ?? '-' }}</td>
                                      <td style="text-align:center">{{ $lists->courseCategorys->name ?? '-' }}</td>
                                      <td > <div style="width: 80px" class=" text-center">{{ $lists->course->full_name ?? '-' }}</div> </td>
                                      <td style="text-align:center">{{ $lists->subjects->name ?? '-' }}</td>
                                      <td>{{ date('d-m-Y H:m:s',strtotime($lists->created_at)) ?? '-' }}</td>
                                      {{-- @permission('approve_btn')
                                          <td style="width: 10%">
                                              <a href="{{ route('admin.notification.cashOnPayment.approve',[$id=$lists->id,$id2=$lists->batch_name]) }}" class="btn btn-success" title="Approve" role="button">Approve</a>
                                          </td>
                                      @endpermission --}} 
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
                    <span class="font-weight-bold" style="font-size: 25px; margin-top:150px">{{($generalSettings) ? $generalSettings->name : ''}}</span>
                    <br>
                    <span class="font-weight-bold" style="font-size: 25px">All Aplicant List</span>
                </div>
              </div>
                <h3  style="text-align:center">Apply Aplicant List</h3>
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                      <th>#Sl</th>
                      <th>Name</th>
                      <th>Phone No</th>
                      <th>Email</th>
                      <th style="text-align:center">Exam Category</th>
                      <th style="text-align:center">Group</th>
                      <th style="text-align:center">Subject</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($list as $key=>$lists)
                        <tr id="{{$lists->id}}">
                            <td>{{ ++$key }}</td>
                            <td>{{ $lists->first_name ?? '-' }} {{ $lists->last_name ?? '-' }}</td>
                            <td>{{ $lists->phone ?? '-' }}</td>
                            <td>{{ $lists->email ?? '-' }}</td>
                            <td style="text-align:center">{{ $lists->courseCategorys->name ?? '-' }}</td>
                            <td > <div style="width: 80px" class=" text-center">{{ $lists->course->full_name ?? '-' }}</div> </td>
                            <td style="text-align:center">{{ $lists->subjects->name ?? '-' }}</td>
                            <td>{{ date('d-m-Y H:m:s',strtotime($lists->created_at)) ?? '-' }}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="rtf-left">
                    <p>Powerd By : Desktopit.net</p>
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
    {!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('public/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
    {!! Html::script('public/assets/js/printThis.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/data-table.js') !!}
    {!! Html::script('public/assets/js/toastDemo.js') !!} 
    
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
