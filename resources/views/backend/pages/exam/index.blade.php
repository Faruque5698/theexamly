@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/bootstrap-toggle/css/bootstrap-toggle.min.css') !!} 
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
                                <li class="breadcrumb-item"><a>Course</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Course List</span></li>
                            </ol>

                            <a href="{{ route('admin.course.create') }}"
                               class="btn btn-sm btn-info button-custom">Add New Course
                            </a>

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
                                        <th>SL #</th>
                                        <th>Full Name</th>
                                        <th>Short Name</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($courses as $key=>$course)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $course->full_name }}</td>
                                            <td>{{ $course->short_name }}</td>
                                            <td>{{ $course->courseCategory->name }}</td>
                                            <td>
                                                <input data-id="{{$course->id}}" class="toggle-class" type="checkbox" data-width="80" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $course->status ? 'checked' : '' }}>
                                            </td>
                                            <td>{{ $course->description }}</td>
                                            {{-- <td>{{ nameById($role->created_by) }}</td> --}}
                                            <td>
                                                {{-- <form action="{{ route('admin.course.destroy', $course)}}"
                                                      method="post"> --}}
                                                    {{-- @permission('edit_roles') --}}
                                                    <a href="{{ route("admin.course.edit", $course)}}"
                                                       class="btn btn-success" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    {{-- @endpermission --}}
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- @permission('delete_roles') --}}
                                                    <a href="javascript:void(0)" class="btn btn-danger delete"

                                                       title="delete" data-id={{$course->id}}>
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    {{-- @endpermission --}}
                                                {{-- </form> --}}
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
     @include('backend.pages.course.modal.course-delete')
@endsection

@push('plugin-scripts')

    {!! Html::script('/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('/assets/plugins/bootstrap-toggle/js/bootstrap-toggle.min.js') !!}
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
          //console.log(response.success);
          $('#confirmModal').modal('hide');
          $('#'+user_id).remove();
          $('#ok_button').text("OK");
          showSuccessToast(response.success);
          window.location.replace('course');
        }
        })
        });
      </script>
    {{-- Ajax delete by modal js code end --}}  
@endpush
