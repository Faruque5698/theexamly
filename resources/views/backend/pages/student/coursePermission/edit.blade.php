<?php
    use App\Models\Backend\Course; 
?>
@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('public/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
    {!! Html::style('public/css/toggle-text-style.css') !!}
@endpush

@section('content')
<div class="row">

    <div class="col-md-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Student</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Course Permission</span></li>
                        </ol>
                        {{-- @permission('add_blog_btn') 
                            <a href="{{ route('admin.blogs.create') }}" class="btn btn-sm btn-info button-custom">Add New
                                Blog
                            </a>
                        @endpermission --}}
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
                                        <th>Course Name</th>
                                        <th>Subject Name</th>
                                        <th> 
                                            @permission('activate_status_blog')
                                                Action  
                                            @endpermission 
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key=>$subjects)
                                        <?php 
                                        //var_dump($subjects);
                                            $name = DB::table('subjects')->where('id',$subjects)->get()->pluck('name','id')->first();
                                            $sName = DB::table('subject_user')->where('subject_id',$subjects)->get()->pluck('subject_id')->first();
                                            $status = DB::table('subject_user')->select('status')->where('id',$sName)->get()->first();
                                            //var_dump($status);
                                            $group_name = DB::table('subjects')->where('id',$subjects)->get()->pluck('group_id')->first();
                                            $course = Course::where('id',$group_name)->get()->pluck('full_name')->first();
                                        ?>
                                    
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $course }}</td>
                                        <td>{{ $name }}</td>
                                        <td>
                                            <?php $statusValue = DB::table('subject_user')->select('status')->where('subject_id', $subjects)->where('user_id', $id)->get()->pluck('status')->first(); ?>
                                            @if($statusValue =='0')
                                                <a href="{{ route('admin.students.course-permission.edits',[$sName,$id]) }}" class="btn btn-danger">Unenroll</a>
                                            @else
                                                <a href="{{ route('admin.students.course-permission.edits',[$sName,$id]) }}" class="btn btn-primary">enroll</a>    
                                            @endif
                                           
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
@include('backend.pages.blog.modal.blog-delete')
@include('backend.pages.blog.modal.blog-view')
@endsection

@push('plugin-scripts')
{!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
{!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
{!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
{!! Html::script('public/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
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
</script>

{{-- Ajax delete by modal js code start --}}

<script type="text/javascript">
    var id;
    $(document).on('click', '.delete', function(){
        id = $(this).data('id');
        $('#confirmModal').modal('show');
    });

    $('#ok_button').click(function(){
        $.ajax({
            cache: false,
            type: 'delete',
            url:"blogs/delete/"+id,
            dataType: "JSON",
            data: {"id": id, _token: '{{csrf_token()}}'},
            beforeSend:function(){
                $('#ok_button').text('Deleting...');
            },
            success:function(response)
            {
                // console.log(response.success);
                $('#confirmModal').modal('hide');
                $('#'+id).remove();
                $('#ok_button').text("OK");
                showSuccessToast(response.success);
                window.location.replace('blogs');
            }
        })
    });
</script>
{{-- Ajax delete by modal js code end --}}

{{-- Toggle button js code starts --}}
<script>
    $(function() {

          $('.toggle-class').change(function() {
              var status = $(this).prop('checked') == true ? 1 : 0;
              var category_id = $(this).data('id');
   console.log(status);
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: '/theexamly/admin/students/course-permission/editss',
                  data: {'status': status, 'category_id': category_id},
                  success: function(data){
                     console.log(data);
                    showSuccessToast('Status changed successfully');
                  }
              });
          })
         })
</script>
{{-- Toggle button js code ends --}}
@endpush