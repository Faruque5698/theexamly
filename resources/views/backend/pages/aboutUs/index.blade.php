@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('public/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
    {!! Html::style('public/css/toggle-text-style.css') !!}
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
                            <li class="breadcrumb-item active" aria-current="page"><a>Frontend CMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>About Us</span></li>
                        </ol>
                        @permission('add_aboutUs_btn') 
                            <a href="{{ route('admin.aboutUs.create') }}" class="btn btn-sm btn-info button-custom">Add
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
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>
                                            @permission('view_aboutUs','edit_aboutUs', 'delete_aboutUs')  
                                                Actions   
                                            @endpermission 
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($aboutUss as $key=>$aboutUs)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $aboutUs->title }}</td>
                                        <td class="word_breck">{!! Str::of($aboutUs->description)->limit(260) !!}</td>
                                        <td>
                                            @permission('view_aboutUs')  
                                                <a href="javascript:void(0)" class="btn btn-warning view-modal" title="View"
                                                    data-id={{$aboutUs->id }}>
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endpermission

                                            @permission('edit_aboutUs')  
                                                <a href="{{ route("admin.aboutUs.edit", $aboutUs->id)}}" class="btn btn-success"
                                                    title="Edit"><i class="fa fa-edit"></i>
                                                </a>
                                            @endpermission
                                            
                                            @permission('delete_aboutUs')
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0)" class="btn btn-danger delete" title="delete"
                                                    data-id={{$aboutUs->id}}>
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
@include('backend.pages.aboutUs.modal.aboutUs-delete')
@include('backend.pages.aboutUs.modal.aboutUs-view')
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
            url:"aboutUs/delete/"+id,
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
                window.location.replace('aboutUs');
            }
        })
    });
</script>
{{-- Ajax delete by modal js code end --}}

{{-- Ajax view modal starts --}}
<script type="text/javascript">
    $(document).on('click', '.view-modal', function() {

        var id = $(this).data('id');
        var APP_URL = {!! json_encode(url('/')) !!};
    
        $.ajax({
            cache: false,
            type: 'get',
            url: "aboutUs/"+id,
            data: { 'id': id },
            success: function(data) {
                // console.log(data.attachmentExtension);
                $('#title').text(data.aboutUs.title);
                $('#description').html(data.aboutUs.description);
                $('#image'). attr("src", APP_URL+"/public/uploads/files/aboutUs/"+data.aboutUs.image);
                $('#video_file'). attr("src", APP_URL+"/public/uploads/files/aboutUs/video/"+data.aboutUs.video);
                $('#video_file_name').html(data.aboutUs.video);
                $('#viewModal').modal('show');
            }
        });
  
    });
</script>
{{-- Ajax view modal ends --}}
@endpush