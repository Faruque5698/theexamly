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
                            @if(Auth::user()->user_type=="Student" || Auth::user()->user_type=="Teacher")
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;পরীক্ষা কেন্দ্র</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>নোটিশ</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>নোটিশ লিস্ট</span></li>
                            @else
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="ti-home"></i>&nbsp;Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Notice</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Notice List</span></li>
                            @endif
                        </ol>
                        @permission('add_notice_btn') 
                            <a href="{{ route('admin.notice.create') }}" class="btn btn-sm btn-info button-custom">Add New
                                Notice
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
                                        @if(Auth::user()->user_type=="Student" || Auth::user()->user_type=="Teacher")
                                        <th>সিরিয়াল নম্বর</th>
                                        <th>স্মারক নম্বর </th>
                                        <th>প্রকাশের তারিখ</th>
                                        <th>বিষয়</th>
                                        <th>বর্ণনা</th>
                                        @else
                                        <th>SL#</th>
                                        <th>Ref. Number</th>
                                        <th>Publish Date</th>
                                        <th>Subject</th>
                                        <th>Description</th>
                                        @endif
                                        <th> 
                                            @permission('activate_notice')
                                                Status  
                                            @endpermission 
                                        </th>
                                        <th>
                                            @permission('view_notice','edit_notice', 'delete_notice')   
                                                @if(Auth::user()->user_type=="Student" || Auth::user()->user_type=="Teacher")
                                                    বিস্তারিত
                                                @else
                                                    Actions 
                                                @endif  
                                            @endpermission 
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @if(Auth::user()->user_type=="Super Admin" || Auth::user()->user_type=="Admin")
                                        @foreach($notices as $key=>$notice)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td class="word_breck">{{ $notice->swarak_no }}</td>
                                        <td>{{ $notice->publish_date }}</td>
                                        <td class="word_breck">{{ $notice->title }}</td>
                                        <td class="word_breck">{!! $notice->description !!}</td>
                                        <td>
                                            @permission('activate_notice') 
                                                <input data-id="{{$notice->id}}" class="toggle-class" type="checkbox" data-width="70px" data-size="xs" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Publish" data-off="Unpublish" {{ $notice->status ? 'checked' : '' }}>
                                            @endpermission
                                        </td>
                                        <td>
                                            @permission('view_notice')  
                                                <a role="button" href="javascript:void(0)" class="btn btn-warning view-modal" title="ক্লিক করুন"
                                                    data-id={{$notice->id }} data-toggle="modal" data-target="#viewModalNotice">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endpermission

                                            @permission('edit_notice')  
                                                <a href="{{ route("admin.notice.edit", $notice)}}" class="btn btn-success"
                                                    title="Edit"><i class="fa fa-edit"></i>
                                                </a>
                                            @endpermission
                                            
                                            @permission('delete_notice')
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0)" class="btn btn-danger delete" title="delete"
                                                    data-id={{$notice->id}}>
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            @endpermission
                                    
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    
                                    @foreach($userNotices as $key=>$notices)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td class="word_breck">{{ $notices->swarak_no }}</td>
                                        <td>{{ $notices->publish_date }}</td>
                                        <td class="word_breck">{{ $notices->title }}</td>
                                        <td class="word_breck">{!! $notices->description !!}</td>
                                        <td>
                                            @permission('activate_notice') 
                                                <input data-id="{{$notices->id}}" class="toggle-class" type="checkbox" data-width="70px" data-size="xs" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Publish" data-off="Unpublish" {{ $notices->status ? 'checked' : '' }}>
                                            @endpermission
                                        </td>
                                        <td>
                                            @permission('view_notice')  
                                                <a role="button" href="javascript:void(0)" class="btn btn-warning view-modal" title="ক্লিক করুন"
                                                    data-id={{$notices->id }} data-toggle="modal" data-target="#viewModalNotice">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endpermission

                                            @permission('edit_notice')  
                                                <a href="{{ route("admin.notice.edit", $notices)}}" class="btn btn-success"
                                                    title="Edit"><i class="fa fa-edit"></i>
                                                </a>
                                            @endpermission
                                            
                                            @permission('delete_notice')
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0)" class="btn btn-danger delete" title="delete"
                                                    data-id={{$notices->id}}>
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            @endpermission
                                    
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        @include('backend.pages.batch.batchCategory.modal.batchCategory-delete')
        @include('backend.pages.notice.modal.notice-view')
    </div>
</div>

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
            url:"notice/delete/"+id,
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
                window.location.replace('notice');
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
                  url: 'changeNoticeStatusPublish',
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
            console.log(id);
            $.ajax({
                cache: false,
                type: 'get',
                url: "notice/"+id,
                data: { 'id': id },
                success: function(data) {
                    //console.log(data.notice);
                    console.log(data.attachmentExtension);
                    $('#swarak_no').html(data.notice.swarak_no);
                    $('#publish_date').html(data.notice.publish_date);
                    $('#title').text(data.notice.title);
                    $('#description').html(data.notice.description);
                    $('#status').text((data.notice.status) ? "Published" : "Unpublished");
                    if(data.attachmentExtension == "pdf"){
                        let insertHtml = '<a href="{{asset('uploads/files/notice_files/')}}/'+data.notice.file+'" target="blank"><i class="fa fa-file-pdf-o fa-2x"></i></a>';
                        $('#attachment').html(insertHtml);
                    }else{
                        let insertHtml = '<a href="{{asset('uploads/files/notice_files/')}}/'+data.notice.file+'" target="blank"><i class="fa fa-file-image-o fa-2x"></i></a>';
                        $('#attachment').html(insertHtml);
                    }
                    $('#viewModal').modal('show');
  
                }
            });
  
        });
</script>
{{-- Ajax view modal ends --}}
@endpush