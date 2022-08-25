@extends('backend.layout.master')

@push('plugin-styles')
{!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
{!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
{!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('public/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
{!! Html::style('public/css/toggle-text-style.css') !!}
<style>
    .slider-image{
        height:100px !important;
        width: 100px !important;
        border-radius: 0 !important;
    }
    .word_breck{
      white-space: normal!important;
      overflow-wrap: break-word;
      word-break: break-word;
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
                            <li class="breadcrumb-item active" aria-current="page"><span>Slider</span></li>

                        </ol>
                        @permission('add_slider_image_btn') 
                            <a href="{{ route('admin.slider.create') }}" class="btn btn-sm btn-info button-custom">Add Slider
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
                                        <th>Header</th>
                                        <th>Title</th>
                                        {{-- <th>Button</th> --}}
                                        @permission('activate_slider_image')
                                            <th>Status</th>
                                        @endpermission
                                        <th>
                                            @permission('view_slider_image', 'delete_slider_image')
                                                Actions 
                                            @endpermission
                                        </th>
                                       
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($sliderImages as $key=>$sliderImage)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $sliderImage->header }}</td>
                                        <td class="word_breck">{{ $sliderImage->title }}</td>
                                        {{-- <td>{{ $sliderImage->button }}</td> --}}
                                        @permission('activate_slider_image')
                                            <td>    
                                                <input data-id="{{$sliderImage->id}}" class="toggle-class" type="checkbox" data-width="60px" data-size="xs" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $sliderImage->status ? 'checked' : '' }}>   
                                            </td>
                                        @endpermission
                                        <td>
                                            @permission('view_slider_image')
                                                <a href="javascript:void(0)" class="btn btn-warning view-modal" title="View"
                                                    data-id={{$sliderImage->id }}>
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endpermission
                                            @permission('delete_slider_image')  
                                                <a href="{{ route("admin.slider.edit", $sliderImage)}}" class="btn btn-success"
                                                title="Edit"><i class="fa fa-edit"></i>
                                                </a>
                                            @endpermission
                                            @csrf
                                            @method('DELETE')
                                            @permission('delete_slider_image') 
                                                <a href="javascript:void(0)" class="btn btn-danger delete" title="delete" data-id={{$sliderImage->id}}>
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
@include('backend.pages.slider.modal.sliderImage-view')
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
        url:"slider/delete/"+id,
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
            window.location.replace('slider');
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
                  url: 'changeSliderStatus',
                  data: {'status': status, 'category_id': category_id},
                  success: function(data){
                      console.log(data);
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
                url: "slider/"+id,
                data: { 'id': id },
                success: function(data) {
                    // console.log(data.sliderImage);
                    $('#header').text(data.sliderImage.header);
                    $('#title').text(data.sliderImage.title);
                    $('#status').text((data.sliderImage.status) ? "Active" : "Inactive");
                    const src = APP_URL+"/uploads/files/slider/"+data.sliderImage.image;
                    let insertHtml = '<a href="{{asset('uploads/files/slider/')}}/'+data.sliderImage.image+'" target="blank"><img class="slider-image" src="'+src+'"></a>';
                    
                    $('#attachment').html(insertHtml);
                    $('#viewModal').modal('show');
  
                }
            });
  
        });
</script>
{{-- Ajax view modal ends --}}
@endpush