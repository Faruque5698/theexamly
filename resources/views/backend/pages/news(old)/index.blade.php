@extends('backend.layout.master')

@push('plugin-styles')
{!! Html::style('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
{!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
{!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
{!! Html::style('/css/toggle-text-style.css') !!}
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
                            <li class="breadcrumb-item active" aria-current="page"><span>News</span></li>

                        </ol>
                        @permission('add_news_btn') 
                            <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-info button-custom">Add News
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
                                        <th>News Title</th>
                                        @permission('activate_news')
                                            <th>Status</th>
                                        @endpermission
                                        
                                        <th>
                                            @permission('view_news', 'edit_news', 'delete_news')
                                            Actions @endpermission 
                                        </th>
                                         
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($news as $key=>$news)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $news->title }}</td>
                                        @permission('activate_news')
                                            <td>
                                                <input data-id="{{$news->id}}" class="toggle-class" type="checkbox" data-width="70px" data-size="xs" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Publish" data-off="Unpublish" {{ $news->status ? 'checked' : '' }}>
                                            </td>
                                        @endpermission    
                                        <td>
                                            @permission('view_news')
                                                <a href="javascript:void(0)" class="btn btn-warning view-modal" title="View"
                                                    data-id={{$news->id }}>
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endpermission
                                            @permission('edit_news')  
                                                <a href="{{ route("admin.news.edit", $news)}}" class="btn btn-success"
                                                title="Edit"><i class="fa fa-edit"></i>
                                                </a>
                                            @endpermission
                                            @csrf
                                            @method('DELETE')
                                            @permission('delete_news') 
                                                <a href="javascript:void(0)" class="btn btn-danger delete" title="delete" data-id={{$news->id}}>
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
@include('backend.pages.news.modal.news-view')
@endsection

@push('plugin-scripts')
{!! Html::script('/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
{!! Html::script('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
{!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
{!! Html::script('/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
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
        url:"news/delete/"+id,
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
            window.location.replace('news');
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
                  url: 'changeNewsStatusPublish',
                  data: {'status': status, 'category_id': category_id},
                  success: function(data){
                    showSuccessToast('Status changed successfully');
                    console.log(data.success)
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
                url: "news/"+id,
                data: { 'id': id },
                success: function(data) {
                    console.log(data.news);
                    // console.log(data.attachmentExtension);
                    $('#title').text(data.news.title);
                    $('#description').html(data.news.description);
                    $('#status').text((data.news.status) ? "Published" : "Unpublished");
                    let i = 0;
                    for(i = 0; i < data.news.gallery.photos.length; i++) {
                        const src = APP_URL+"/uploads/files/photos/"+data.news.gallery.photos[i].image;
                        // console.log(src);
                        const imageLink = document.createElement('a');
                        imageLink.href = src;
                        imageLink.target = "_blank";
                        const img = new Image();
                        img.src = src;
                        img.style.height = '100px';
                        img.style.width = '100px';
                        img.style.borderRadius = '0';
                        img.style.marginLeft = '5px';
                        img.style.marginTop = '5px';
                        imageLink.appendChild(img);
                        $('#attachment').append(imageLink);
                    }
                    $('#viewModal').modal('show');
  
                }
            });
  
        });
</script>
{{-- Ajax view modal ends --}}
@endpush