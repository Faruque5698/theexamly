@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
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
                            <li class="breadcrumb-item active" aria-current="page"><a>Frontend CMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Terms And Condition</span></li>
                        </ol>
                        @permission('add_termsCondition_btn') 
                            <a href="{{ route('admin.termsAndConditions.create') }}" class="btn btn-sm btn-info button-custom">Add
                                Terms and Conditions
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
                                        <th>Description</th>
                                        <th>
                                            @permission('view_termsCondition','edit_termsCondition', 'delete_termsCondition')  
                                                Actions   
                                            @endpermission 
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($termsConditions as $key=>$termsCondition)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td class="word_breck">{!! Str::of($termsCondition->description)->limit(332) !!}</td>
                                        <td>
                                            @permission('view_termsCondition')  
                                                <a href="javascript:void(0)" class="btn btn-warning view-modal" title="View"
                                                    data-id={{$termsCondition->id }}>
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endpermission

                                            @permission('edit_termsCondition')  
                                                <a href="{{ route("admin.termsAndConditions.edit", $termsCondition->id)}}" class="btn btn-success"
                                                    title="Edit"><i class="fa fa-edit"></i>
                                                </a>
                                            @endpermission
                                            
                                            @permission('delete_termsCondition')
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0)" class="btn btn-danger delete" title="delete"
                                                    data-id={{$termsCondition->id}}>
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
@include('backend.pages.termsCondition.modal.termsCondition-delete')
@include('backend.pages.termsCondition.modal.termsCondition-view')
@endsection

@push('plugin-scripts')
{!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
{!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
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
            url:"termsAndConditions/delete/"+id,
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
                window.location.replace('termsAndConditions');
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
                url: "termsAndConditions/"+id,
                data: { 'id': id },
                success: function(data) {
                    // console.log(data.attachmentExtension);
                    $('#description').html(data.termsCondition.description);
                    $('#viewModal').modal('show');
                }
            });
  
        });
</script>
{{-- Ajax view modal ends --}}
@endpush