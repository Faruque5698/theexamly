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
                                <li class="breadcrumb-item active" aria-current="page"><span>All Modules</span></li>

                            </ol>
                            @permission('add_modules') 
                                <a href="{{ route('admin.modules.create') }}"
                                class="btn btn-sm btn-info button-custom">Add New Module
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
                                        <th>Module Name</th>
                                        <th>Created By</th>
                                        <th>Status</th>
                                        <th>
                                            @permission('edit_modules', 'delete_modules')
                                            Actions 
                                            @endpermission
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($modules as $key=>$module)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td contenteditable class="column_name" data-column_name="name"
                                                data-slug="{{ $module->slug }}">{{ $module->name }}</td>

                                            <td>{{ nameById($module->created_by) }}</td>
                                            <td>
                                                @if($module->status === 1)
                                                    <label class="badge badge-outline-info">Published</label>
                                                @else
                                                    <label class="badge badge-outline-warning">Unpublished</label>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.modules.destroy', $module)}}"
                                                      method="post">
                                                    @permission('edit_modules')  
                                                        <a href="{{ route("admin.modules.edit", $module)}}" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i>
                                                        </a>
                                                    @endpermission
                                                    @csrf
                                                    @method('DELETE')
                                                    @permission('delete_modules') 
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
            @elseif(session('info'))
            showWarningToast('{{ session("info") }}');
            @elseif(session('danger'))
            showWarningToast('{{ session("danger") }}');
            @endif
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(document).on('blur', '.column_name', function () {
            var column_name = $(this).data("column_name");
            var column_value = $(this).text();
            var slug = $(this).data("slug");


            if (column_value != '') {
                $.ajax({
                    url: "{{ route('admin.modules.update_module') }}",
                    method: "POST",
                    data: {column_name: column_name, column_value: column_value, slug: slug},
                    success: function (response) {
                        if (response.status === 201) {
                            showSuccessToast(response.message);
                        } else {
                            showWarningToast(response.message)
                        }
                    }
                })
            } else {

            }
        });

    </script>
@endpush
