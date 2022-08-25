@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
    {!! Html::style('public/css/toggle-text-style.css') !!}
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}

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
                                <li class="breadcrumb-item"><a>Exam</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Group List</span></li>
                            </ol>
                            @permission('add_course_btn')
                                <a href="{{ route('admin.course.create') }}"
                                class="btn btn-sm btn-info button-custom">Add New Exam Group
                                </a>
                            @endpermission

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
                                        <th>ID #</th>
                                        <th>Full Name</th>
                                        <th>Short Name</th>
                                        <!--<th>Subjects</th>-->
                                        @permission('activate_course')
                                            <th>Status</th>
                                        @endpermission
                                        
                                        <th>
                                            @permission('edit_course', 'delete_course')    
                                                Actions @endpermission
                                        </th>     
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($courses as $key=>$course)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $course->full_name }}</td>
                                            <td>{{ $course->short_name }}</td>
                                            {{--<td>
                                                @foreach ($course->subjects as $key=>$subject)
                                                    {{$subject->name}}{{ ((++$key)==count($course->subjects)) ? '' : ',' }} 
                                                @endforeach
                                            </td>--}}
                                            @permission('activate_course')
                                                <td>
                                                    <input data-id="{{$course->id}}" class="toggle-class" type="checkbox" data-width="60px" data-size="xs" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $course->status ? 'checked' : '' }}>  
                                                </td>
                                            @endpermission

                                            <td>
                                                @permission('edit_course')
                                                    <a href="{{ route("admin.course.edit", $course->id)}}"
                                                       class="btn btn-success" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endpermission

                                                   
                                                @permission('delete_course')
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="javascript:void(0)" class="btn btn-danger delete"

                                                       title="delete" data-id={{$course->id}}>
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
    <div class="printDiv" style="visibility: hidden; display:inline;">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">                              
                <div class="table-responsive table table-bordered print-container p-3" id="div-id-name"><br>
                    <div class="row justify-content-center align-items-center">
                        <div class="float-left mr-4">
                            <img id='img' src="{{($generalSettings) ? url('/public/uploads/files/logo/').$generalSettings->image : '' }}" class="" style="background-color:#900c3f; background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                        </div>
                        
                        <div class="float-right mb-4">
                            <span class="font-weight-bold" style="font-size: 25px; margin-top:150px">{{($generalSettings) ? $generalSettings->name : ''}}</span>
                            <br>
                            <span class="font-weight-bold" style="font-size: 25px">Course: All Courses</span>
                        </div>
                    </div>
                    <br>  
                    <h3  style="text-align:center">All Courses Offered</h3>
                    <br>
                    <table id="order-listing" class="table text-center student-dm">
                        <thead>
                            <tr>
                                <th style="text-align:center; font-size: 20px;">ID #</th>
                                <th style="text-align:center; font-size: 20px;">Full Name</th>
                                <th style="text-align:center; font-size: 20px;">Short Name</th>
                                <!--<th style="text-align:center; font-size: 20px;">Subjects</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $key=>$course)
                                <tr class="item">
                                    <td style="text-align:center;font-size:18px;">{{ ++$key }}</td>
                                    <td style="text-align:center;font-size:18px;">{{ $course->full_name }}</td>
                                    <td style="text-align:center;font-size:18px;">{{ $course->short_name }}</td>
                                    {{--<td style="text-align:center;font-size:18px;">
                                        @foreach ($course->subjects as $key=>$subject)
                                            {{$subject->name}}{{ ((++$key)==count($course->subjects)) ? '' : ',' }} 
                                        @endforeach
                                    </td>--}}
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
     @include('backend.pages.course.modal.course-delete')
@endsection

@push('plugin-scripts')
    {!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('public/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
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
              url: 'changeStatus',
              data: {'status': status, 'category_id': category_id},
              success: function(data){
                showSuccessToast('Status changed successfully');
                console.log(data.success)
              }
          });
      })
    })
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
          url:"courseDelete/"+user_id,
          dataType: "JSON",
          data: {
          "id": user_id, _token: '{{csrf_token()}}'},
     
          beforeSend:function(){
          $('#ok_button').text('Deleting...');
          },
          success:function(response)
        {
          console.log(response);
          $('#confirmModal').modal('hide');
          $('#'+user_id).remove();
          $('#ok_button').text("OK");
          if(response.success){
            showSuccessToast(response.success);
            window.location.replace('course');
          }else{
            showDangerToast(response.danger);
          }
        }
        })
        });
      </script>
    {{-- Ajax delete by modal js code end --}}  
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
