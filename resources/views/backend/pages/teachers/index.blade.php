@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
    {!! Html::style('/css/toggle-text-style.css') !!}
    {!! Html::style('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
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
                            <li class="breadcrumb-item active" aria-current="page"><span>Teachers List</span></li>
                        </ol>
                        @permission('add_teacher_btn')
                          <a href="{{ route('admin.teacher.create') }}"
                                class="btn btn-sm btn-info button-custom">Add New Teacher
                          </a>
                        @endpermission
                    </nav>
                </div>
            </div>         
            <div class="card">
              <div class="card-body">
                 <div class="row justify-content-end mb-4">
                  <button id='btn' class="btn btn-sm btn-success"><i class="fa fa-print" aria-hidden="true"> Print</i></button>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr>
                              <th>SL#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone No</th>
                              <th>Status</th>
                              {{-- <th>Batch Name</th>
                              <th>Designation</th> --}}
                              @permission('view_teacher', 'edit_teacher', 'delete_teacher')
                                <th style="text-align:center">Actions</th>
                              @endpermission  
                            </tr>
                          </thead>
                          <tbody>
                              @php
                                  $key = 0;
                              @endphp
                              @foreach($teachers as $teacher)
                                  <tr id="{{$teacher->id}}">
                                      <td>{{ ++$key }}</td>
                                      <td>{{ $teacher->user->name ?? '-' }}</td>
                                      <td>{{ $teacher->user->email ?? '-' }}</td>
                                      <td>{{ $teacher->user->phone ?? '-' }}</td>
                                      <td>
                                        <input data-id="{{$teacher->id}}" class="toggle-class" type="checkbox" data-width="60px" data-size="xs" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $teacher->status ? 'checked' : '' }}>
                                      </td>
                                      {{-- <td>{{ $teacher->batch->name ?? '-' }}</td>
                                      <td>{{ $teacher->designation ?? '-' }}</td> --}}
                                      <td style="text-align: center">
                                        @permission('view_teacher')
                                            <a href="javascript:void(0)" class="btn btn-warning view-modal"
                                              title="View" data-id={{$teacher->id }}>
                                                <i class="fa fa-eye"></i>
                                            </a>
                                          @endpermission
                                          @permission('edit_teacher')
                                            <a href="{{ route('admin.teacher.edit', $teacher->id)}}" class="btn btn-success"
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
    @include('backend.pages.teachers.modal.teacher-view')
    @include('backend.pages.teachers.modal.teacher-delete')  
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
                <h3  style="text-align:center">All Teacher's List</h3>
                <table id="order-listing" class="table student-dm">
                  <thead>
                    <tr>
                      <th style="text-align:center; font-size: 20px;">SL#</th>
                      <th style="text-align:center; font-size: 20px;">Name</th>
                      <th style="text-align:center; font-size: 20px;">Email</th>
                      <th style="text-align:center; font-size: 20px;">Phone No</th>
                      <th style="text-align:center; font-size: 20px;">Address</th>
                      <th style="text-align:center; font-size: 20px;">Details</th>
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
                            <td style="text-align:center;font-size:18px;">{{ $teacher->user->email ?? '-' }}</td>
                            <td style="text-align:center;font-size:18px;">{{ $teacher->user->phone ?? '-' }}</td>
                            <td style="text-align:center;font-size:18px;">{{ $teacher->address ?? '-' }}</td>
                            <td style="text-align:center;font-size:18px;">{{ $teacher->details ?? '-' }}</td>
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
@endsection

@push('plugin-scripts')
    {!! Html::script('/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
    {!! Html::script('/assets/js/printThis.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/data-table.js') !!}
    {!! Html::script('/assets/js/toastDemo.js') !!}
  
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
      url:"teacher/delete/"+user_id,
      dataType: "JSON",
      data: {
      "id": user_id

      },
      beforeSend:function(){
      $('#ok_button').text('Deleting...');
      },
      success:function(response)
      {
      // console.log(response);
      $('#confirmModal').modal('hide');
      $('#'+user_id).remove();
      $('#ok_button').text("OK");
      showSuccessToast(response.success);
      window.location.replace('teacher');
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
