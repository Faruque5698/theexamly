@extends('backend.layout.master')

@push('plugin-styles')
{!! Html::style('public/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
{!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
{!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
{!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
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
                            <li class="breadcrumb-item"><a>Frontend CMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Contact us Records</span></li>

                        </ol>
                        
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
                                        <th>Sender Name</th>
                                        <th>Sender Email</th>
                                        <th>Sender Phone</th>
                                        <th>Message Subject</th>
                                        @permission('view_contactus')
                                            <th>Action</th>
                                        @endpermission
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($contactusCollection as $key=>$contactus)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $contactus->name }}</td>
                                        <td>{{ $contactus->email }}</td>
                                        <td>{{ $contactus->phone }}</td>
                                        <td>{{ $contactus->subject }}</td>
                                        @permission('view_contactus')
                                            <td>
                                                <a href="javascript:void(0)" class="btn btn-warning view-modal" title="View"
                                                    data-id={{$contactus->id }}>
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        @endpermission
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
@include('backend.pages.contactus.modal.contactus-view')
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
                url: "contactus/"+id,
                data: { 'id': id },
                success: function(data) {
                    console.log(data.contactus);
                    $('#name').text(data.contactus.name);
                    $('#email').text(data.contactus.email);
                    $('#subject').text(data.contactus.subject);
                    $('#phone').text(data.contactus.phone);
                    $('#message').text(data.contactus.message);
                    $('#viewModal').modal('show');
  
                }
            });
  
        });
</script>
{{-- Ajax view modal ends --}}
@endpush