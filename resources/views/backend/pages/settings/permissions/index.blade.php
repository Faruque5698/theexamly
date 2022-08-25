@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
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
                                <li class="breadcrumb-item"><a >Settings</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>All Permissions</span></li>

                            </ol>
                            {{-- @permission('add_permissions')  --}}
                                <a href="{{ route('admin.permissions.create') }}"
                                class="btn btn-sm btn-info button-custom">Add New Permission
                                </a>
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
                                        <th>Permission</th>
                                        <th>Display Name</th>
                                        <th>Module</th>
                                        <th>Created By</th>
                                        
                                        <th>
                                            @permission('edit_permissions', 'delete_permissions') Actions
                                            @endpermission
                                        </th>
                                            
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($permissions as $key=>$permission)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $permission->name ?? '-' }}</td>
                                            <td>{{ $permission->display_name ?? '-' }}</td>
                                            <td>{{ $permission->module->name ?? '-' }}</td>
                                            <td>{{ nameById($permission->created_by) }}</td>
                                            <td>
                                                <form action="{{ route("admin.permissions.destroy", $permission) }}" method="post">
                                                    @permission('edit_permissions') 
                                                        <a href="{{ route("admin.permissions.edit", $permission)}}" class="btn btn-primary" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    @endpermission

                                                    @permission('delete_permissions')
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                                    @endpermission
                                                </form>
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
@endpush
