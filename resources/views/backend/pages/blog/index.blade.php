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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Frontend CMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Blogs</span></li>
                        </ol>
                        @permission('add_blog_btn') 
                            <a href="{{ route('admin.blogs.create') }}" class="btn btn-sm btn-info button-custom">Add New
                                Blog
                            </a>
                        @endpermission
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
                                        <th>Blog Title</th>
                                        <th> 
                                            @permission('activate_status_blog')
                                                Status  
                                            @endpermission 
                                        </th>
                                        <th>
                                            @permission('view_blog','edit_blog', 'delete_blog')  
                                                Actions   
                                            @endpermission 
                                        </th>
                                       
                                           
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($blogs as $key=>$blog)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>
                                            @permission('activate_notice') 
                                                <input data-id="{{$blog->id}}" class="toggle-class" type="checkbox" data-width="70px" data-size="xs" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Publish" data-off="Unpublish" {{ $blog->status ? 'checked' : '' }}>
                                            @endpermission
                                        </td>
                                        <td>
                                            @permission('view_blog')  
                                                <a href="javascript:void(0)" class="btn btn-warning view-modal" title="View"
                                                    data-id={{$blog->id }}>
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endpermission

                                            @permission('edit_blog')  
                                                <a href="{{ route("admin.blogs.edit", $blog)}}" class="btn btn-success"
                                                    title="Edit"><i class="fa fa-edit"></i>
                                                </a>
                                            @endpermission
                                            
                                            @permission('delete_blog')
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0)" class="btn btn-danger delete" title="delete"
                                                    data-id={{$blog->id}}>
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
    
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: 'changeBlogStatusPublish',
                  data: {'status': status, 'category_id': category_id},
                  success: function(data){
                    showSuccessToast('Status changed successfully');
                    // console.log(data.success)
                  }
              });
          })
         })
</script>
{{-- Toggle button js code ends --}}

{{-- Ajax view modal starts --}}
<script type="text/javascript">
    $(document).on('click', '.view-modal', function() {

            var id = $(this).data('id');
            var APP_URL = {!! json_encode(url('/')) !!};
            // console.log(id);
            $.ajax({
                cache: false,
                type: 'get',
                url: "blogs/"+id,
                data: { 'id': id },
                success: function(data) {
                    // console.log(data.attachmentExtension);
                    $('#title').text(data.blog.title);
                    $('#description').html(data.blog.description);
                    $('#status').text((data.blog.status) ? "Published" : "Unpublished");
                    $('#image'). attr("src", APP_URL+"/public/uploads/files/blog/"+data.blog.image);
                    $('#viewModal').modal('show');
                }
            });
  
        });
</script>
{{-- Ajax view modal ends --}}
@endpush