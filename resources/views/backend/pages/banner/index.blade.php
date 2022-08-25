@extends('backend.layout.master')

@push('plugin-styles')
{!! Html::style('public/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
{!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
{!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
{!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('public/css/toggle-text-style.css') !!}
<style>
    .banner-image {
        height:100px !important;
        width: 100px !important;
        border-radius: 0 !important;
    }    
    .alert {
        padding: 10px;
        background-color: #6bbd6e;
        color: white;
    } 
    
</style>
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
                            <li class="breadcrumb-item"><a>Frontend CMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Banners</span></li>

                        </ol>
                        @permission('add_banner_image_btn') 
                            <a href="{{ route('admin.banner.create') }}" class="btn btn-sm btn-info button-custom">Add Banner Image
                            </a>
                        @endpermission
                    </nav>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="alert">
                            <strong>Note: </strong> Only One Banner Image can be Activated at a Time.
                        </div>
                        <div class="table-responsive">
                            <table id="order-listing" class="table text-center">
                                <thead>
                                    <tr>
                                        <th>SL #</th>
                                        @permission('activate_banner_image')
                                            <th>Status</th>
                                        @endpermission

                                        <th>
                                            @permission('view_banner_image', 'delete_banner_image')
                                            Actions @endpermission
                                        </th>
                                            
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($banners as $key=>$banner)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        @permission('activate_banner_image')
                                            <td> 
                                                <input data-id="{{$banner->id}}" class="toggle-class" type="checkbox" data-width="60px" data-size="xs" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $banner->status ? 'checked' : '' }}>      
                                            </td>
                                        @endpermission
                                        <td>
                                            @permission('view_banner_image')
                                                <a href="javascript:void(0)" class="btn btn-warning view-modal" title="View"
                                                    data-id={{$banner->id }}>
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endpermission

                                            @permission('delete_banner_image')
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0)" class="btn btn-danger delete" title="delete" data-id={{$banner->id}}>
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
@include('backend.pages.batch.batchCategory.modal.batchCategory-delete')
@include('backend.pages.banner.modal.banner-view')
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
            @elseif(session('danger'))
            showDangerToast('{{ session("danger") }}');
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
        url:"banner/delete/"+id,
        dataType: "JSON",
        data: 
        {
            "id": id, _token: '{{csrf_token()}}'},
            beforeSend:function(){
            $('#ok_button').text('Deleting...');
        },
        success:function(response)
        {
            console.log(response.success);
            $('#confirmModal').modal('hide');
            $('#'+id).remove();
            $('#ok_button').text("OK");
            showSuccessToast(response.success);
            window.location.replace('banner');
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
              var element = $(this);
    
              $.ajax({
                  type: "GET",
                  dataType: "json",
                  url: 'changeBannerStatus',
                  data: {'status': status, 'category_id': category_id},
                  success: function(data){
                    if(data.danger){
                        showDangerToast(data.danger);
                        element.bootstrapToggle('off');
                    }else if(data.warning){
                        showWarningToast(data.warning);
                    }
                    else{
                        showSuccessToast(data.success);
                    }
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
            //alert(APP_URL);
            //console.log(id);
            $.ajax({
                cache: false,
                type: 'get',
                url: "banner/"+id,
                data: { 'id': id },
                success: function(data) {
                    console.log(data.banner);
                    $('#status').text((data.banner.status) ? "Active" : "Inactive");
                    const src = APP_URL+"/uploads/files/banner/"+data.banner.image;
                    let insertHtml = '<a href="{{asset('uploads/files/banner/')}}/'+data.banner.image+'" target="blank"><img class="banner-image" src="'+src+'"></a>';
                    
                    $('#attachment').html(insertHtml);
                    $('#viewModal').modal('show');
  
                }
            });
  
        });
</script>
{{-- Ajax view modal ends --}}
@endpush