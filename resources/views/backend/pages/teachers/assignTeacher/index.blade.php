@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
    {!! Html::style('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
@endpush

@section('content')
    <div class="col-md-13 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Teachers</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Assign Teacher</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Assign Teacher List</span></li>
                        </ol>
                        @permission('add_teacher_btn')
                          <a href="{{ route('admin.teacher.assign') }}"
                                class="btn btn-sm btn-info button-custom">Assign Teacher
                          </a>
                        @endpermission
                    </nav>
                </div>
            </div>
            <!--<div class="col-md-12 text-right" style="margin-top: 8px; margin-bottom: 8px">-->
            <!--  <button id='btn' class="btn btn-sm btn-success float right"><i class="fa fa-print" aria-hidden="true"style="width: 44px;font-size: 14px;"> Print</i></button>-->
            <!--</div>            -->
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
                              <th style="text-align:center">SL#</th>
                              <th style="width:100px">Teacher Name</th>
                              <th style="text-align:center">Exam Category</th>
                              <th style="text-align:center">Group Name</th>
                              <th style="text-align:center;width:100px">Subject Name</th>
                              @permission('edit_teacher', 'delete_teacher')
                                <th style="text-align:center;width:100px">Actions</th>
                              @endpermission  
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($teachers as $key=>$teacher)
                                  <tr>
                                      <td style="text-align:center">{{ ++$key }}</td>
                                      <td style="">{{ $teacher->user->name ?? '-' }}</td>
                                      <td style="text-align:center">{{ $teacher->courseCategory->name ?? '-' }}</td>
                                      <td style="text-align:center">{{ $teacher->course->full_name ?? '-' }}</td>
                                      <td style="text-align:center">{{ $teacher->subject->name ?? '-' }}</td>
                                      <td style="text-align:center">
                                          @permission('edit_teacher')
                                            <a href="{{ route('admin.teacher.assignEdit', $teacher->id)}}" class="btn btn-success"
                                              title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                          @endpermission
                                          @permission('delete_teacher')
                                            <a href="javascript:void(0)" class="btn btn-danger delete"
                                              title="delete" data-id={{$teacher->id}}>
                                                <i class="fa fa-trash"></i>
                                            </a>
                                          @endpermission
                                      </td>
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
    @include('backend.pages.teachers.assignTeacher.modal.assignTeacher-delete')  
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
                <div class="float-right mb-5">
                  <span class="font-weight-bold" style="font-size: 25px; margin-top:150px">{{($generalSettings) ? $generalSettings->name : ''}}</span>
              </div>
            </div>
                <h3  style="text-align:center">All Assigned Teacher's List</h3>
                <br>
                <table id="order-listing" class="table student-dm">
                  <thead>
                    <tr>
                      <th style="text-align:center; font-size: 20px;">SL#</th>
                      <th style="text-align:center; font-size: 20px;">Teacher Name</th>
                      <th style="text-align:center; font-size: 20px;">Exam Category</th>
                      <th style="text-align:center; font-size: 20px;">Group Name</th>
                      <th style="text-align:center; font-size: 20px;">Subject Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $key = 0;
                    @endphp
                    @foreach($teachers as $teacher)
                        <tr id="{{$teacher->id}}">
                            <td style="text-align:center;font-size:18px;">{{ ++$key }}</td>
                            <td style="text-align:center;font-size:18px;">{{ $teacher->user->name ?? '-' }}</td>
                            <td style="text-align:center">{{ $teacher->courseCategory->name ?? '-' }}</td>
                            <td style="text-align:center;font-size:18px;">{{ $teacher->course->full_name ?? '-' }}</td>
                            <td style="text-align:center;font-size:18px;">{{ $teacher->subject->name ?? '-' }}</td>
                            
                        </tr>
                    @endforeach
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
@endsection

@push('plugin-scripts')
    {!! Html::script('/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!} 
    {!! Html::script('/assets/js/printThis.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/data-table.js') !!}
    {!! Html::script('/assets/js/toastDemo.js') !!}

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
      url:"assignDelete/"+user_id,
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
      window.location.replace("{{route('admin.teacher.assignIndex')}}");
      }
      })
      });
    </script>
  {{-- Ajax delete by modal js code end --}}

    {{-- Print option start --}}
    <script>
      $('#btn').click( function(){
        $('.print-container').printThis();
      })
    </script>
@endpush
