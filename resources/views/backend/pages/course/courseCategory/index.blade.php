@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
    {!! Html::style('public/css/toggle-text-style.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
@endpush

<style type="text/css">
  .word_breck{
      white-space: normal!important;
      overflow-wrap: break-word;
      word-break: break-word;
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
                                <li class="breadcrumb-item"><a >Exam</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Exam Category List</span></li>

                            </ol>
                            {{-- @permission('add_modules')  --}}
                            <a href="{{ route('admin.examCategory.create') }}"
                               class="btn btn-sm btn-info button-custom">Add New Exam Category
                            </a>
                            {{-- @endpermission --}}
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
                                        <th>Exam Category Name</th>
                                        <th>Group Name</th>
                                        <th>Description</th>
                                         @permission('activate_course')
                                            <th>Status</th>
                                        @endpermission
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($courseCategory as $key=>$courses)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $courses->name }}</td>
                                            <td class="word_breck">@foreach ($courses->groups as $key=>$group)
                                                    {{$group->full_name}}{{ ((++$key)==count($courses->groups)) ? '' : ',' }} 
                                                @endforeach</td>
                                            <td>{{ $courses->description }}</td>
                                            @permission('activate_course')
                                                <td>
                                                    <input data-id="{{$courses->id}}" class="toggle-class" type="checkbox" data-width="60px" data-size="xs" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $courses->status ? 'checked' : '' }}>  
                                                </td>
                                            @endpermission
                                            <td>
                                                    {{-- @permission('edit_modules')   --}}
                                                    <a href="{{ route("admin.examCategory.edit", $courses)}}" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i>
                                                    </a>
                                                    {{-- @endpermission --}}
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- @permission('delete_modules')  --}}
                                                    <a href="javascript:void(0)" class="btn btn-danger delete"

                                                       title="delete" data-id={{$courses->id}}>
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    {{-- @endpermission --}}
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
    @include('backend.pages.course.courseCategory.modal.courseCategory-delete')
@endsection

@push('plugin-scripts')
    {!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('public/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
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


        $(document).on('blur', '.column_name', function () {
            var column_name = $(this).data("column_name");
            var column_value = $(this).text();
            var slug = $(this).data("slug");


            if (column_value != '') {
                $.ajax({
                    url: "{{ route('admin.modules.update_module') }}",
                    method: "POST",
                    data: {column_name: column_name, column_value: column_value, slug: slug},
                    success: function (response) {
                        if (response.status === 201) {
                            showSuccessToast(response.message);
                        } else {
                            showWarningToast(response.message)
                        }
                    }
                })
            } else {

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
          url:"examCategory/"+user_id,
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
          window.location.replace('examCategory');
        }
        })
        });
      </script>
    {{-- Ajax delete by modal js code end --}}  
    <script>
        $(function() {
          $('.toggle-class').change(function() {
              var status = $(this).prop('checked') == true ? 1 : 0;
              var category_id = $(this).data('id');

              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: 'changeExamStatus',
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
