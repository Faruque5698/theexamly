@extends('backend.layout.master')

@push('plugin-styles')
{!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
{!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
{!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('public/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
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
                                class="ti-home"></i>&nbsp;Home</a></li>
                            <li class="breadcrumb-item"><a>Frontend CMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Gallery</span></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card-body" style="margin-bottom: 100%">
                <div class="container">
                    
                        @foreach ($galleries as $key => $gallery) 
                        <div class="card mx-2" id="inner" style="display: inline-block; width:200px">
                            <a href="{{ route('admin.gallery.show', $gallery->id) }}">
                                <img alt="Rocking the night away" class="card-img-top" style="height: 200px"
                                src="{{asset('uploads/files/photos/').('/').$gallery->photos->first()->image}}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title" style="height: 10px">
                                    <a href="{{route('admin.gallery.show', $gallery->id)}}">{{$gallery->news->title}}</a>
                                </h5>
                            </div>
                        </div>
                        @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
@include('backend.pages.batch.batchCategory.modal.batchCategory-delete')
@include('backend.pages.news.modal.news-view')
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