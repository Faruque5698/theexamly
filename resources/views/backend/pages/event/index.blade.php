@extends('backend.layout.master')

@push('plugin-styles')
{!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
{!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
{!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('public/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
{!! Html::style('public/css/toggle-text-style.css') !!}
<style>
    .event-image {
        height:100px !important;
        width: 100px !important;
        border-radius: 0 !important;
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
                            <li class="breadcrumb-item active" aria-current="page"><span>Event</span></li>

                        </ol>
                        @permission('add_event_btn') 
                            <a href="{{ route('admin.event.create') }}" class="btn btn-sm btn-info button-custom">Add New Event
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
                                        <th>Event Title</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        @permission('activate_event')
                                            <th>Status</th>
                                        @endpermission

                                        <th>
                                            @permission('view_event', 'edit_event', 'delete_event')
                                            Actions @endpermission
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($events as $key=>$event)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>
                                            {{ date('d-m-Y', strtotime($event->start_date))}}
                                        </td>
                                        <td>
                                            {{ date('d-m-Y', strtotime($event->start_date))}}
                                        </td>
                                        @permission('activate_event')
                                            <td>
                                                <input data-id="{{$event->id}}" class="toggle-class" type="checkbox" data-width="60px" data-size="xs" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $event->status ? 'checked' : '' }}>
                                            </td>
                                        @endpermission
                                        <td>
                                            @permission('view_event')
                                                <a href="javascript:void(0)" class="btn btn-warning view-modal" title="View"
                                                    data-id={{$event->id }}>
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endpermission

                                            @permission('edit_event')  
                                                <a href="{{ route("admin.event.edit", $event)}}" class="btn btn-success"
                                                title="Edit"><i class="fa fa-edit"></i>
                                                </a>
                                            @endpermission

                                            @csrf
                                            @method('DELETE')
                                            @permission('delete_event') 
                                                <a href="javascript:void(0)" class="btn btn-danger delete" title="delete"
                                                    data-id={{$event->id}}>
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
@include('backend.pages.event.modal.event-view')
@endsection

@push('plugin-scripts')
{!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
{!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
{!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
{!! Html::script('public/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
{!! Html::script('public/assets/plugins/moment/moment.js') !!}
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
            url:"event/delete/"+id,
            dataType: "JSON",
            data: {"id": id, _token: '{{csrf_token()}}'},
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
                window.location.replace('event');
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
                  url: 'changeEventStatusActive',
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
            $.ajax({
                cache: false,
                type: 'get',
                url: "event/"+id,
                data: { 'id': id },
                success: function(data) {
                    $('#title').text(data.event.title);
                    $('#description').html(data.event.description);
                    $('#status').text((data.event.status) ? "Published" : "Unpublished");
                    const src = APP_URL+"/uploads/files/event/"+data.event.image;
                    let insertHtml = '<a href="{{asset('uploads/files/event/')}}/'+data.event.image+'" target="blank"><img class="event-image" src="'+src+'"></a>';
                    $('#attachment').html(insertHtml);
                    $('#start_date').text(data.event.start_date);
                    $('#start_date').text( moment().format('DD-MM-YYYY'));
                    $('#end_date').text(data.event.end_date);
                    $('#end_date').text( moment().format('DD-MM-YYYY'));
                    $('#viewModal').modal('show');
  
                }
            });
  
        });
</script>
{{-- Ajax view modal ends --}}
@endpush