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
                            <li class="breadcrumb-item"><a>Frontend CMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Badges</span></li>

                        </ol>
                        {{-- @permission('add_news_btn')  --}}
                            {{-- <a href="{{ route('admin.badges.create') }}" class="btn btn-sm btn-info button-custom">Add Badge
                            </a> --}}
                        {{-- @endpermission --}}
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
                                        <th>Top Text</th>
                                        <th>Bottom Text</th>
                                        <th>
                                            {{-- @permission('view_news', 'edit_news', 'delete_news') --}}
                                            Actions 
                                            {{-- @endpermission  --}}
                                        </th>
                                         
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($badges as $key=>$badge)
                                    <tr>
                                        <td>Badge {{ ++$key }}</td>
                                        <td>{{ $badge->top_text }}</td>
                                        <td>{{ $badge->bottom_text }}</td>
                                        <td>
                                            {{-- @permission('edit_news')   --}}
                                                <a href="{{ route("admin.badges.edit", $badge)}}" class="btn btn-success"
                                                title="Edit"><i class="fa fa-edit"></i>
                                                </a>
                                            {{-- @endpermission --}}
                                            @csrf
                                            @method('DELETE')
                                            {{-- @permission('delete_news')  --}}
                                                {{-- <a href="javascript:void(0)" class="btn btn-danger delete" title="delete" data-id={{$testimonial->id}}>
                                                <i class="fa fa-trash"></i>
                                                </a> --}}
                                            {{-- @endpermission --}}
                                            
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
@endpush