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
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a>Settings</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>All Users</span></li>
                            </ol>
                            @permission('add_users')
                            <a href="{{ route('admin.users.create') }}"
                               class="btn btn-sm btn-info button-custom">Add New User
                            </a>
                            @endpermission
                        </nav>
                    </div>
                </div>
                <div class="text-right" style="margin-top: 8px; margin-bottom: 8px; margin-right: 25px">
                    <button id='btn' class="btn btn-sm btn-success float right"><i class="fa fa-print" aria-hidden="true"style="width: 44px;font-size: 14px;"> Print</i></button>
                </div>  
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table text-center">
                                    <thead>
                                    <tr>
                                        <th>SL #</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone No</th>
                                        <th >Created By</th>
                                        <th class="word_breck">User Role</th>
                                        <th>
                                            @permission('edit_users','delete_users')
                                            Actions @endpermission
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $key = 0;
                                    @endphp
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $user->name ?? '-' }}</td>
                                            <td>{{ $user->email ?? '-' }}</td>
                                            <td>{{ $user->phone ?? '-' }}</td>
                                            <td class="word_breck">{{ nameById($user->created_by) ?? '-' }}</td>
                                            <td>{{ $user->roles->first()->display_name ?? '-' }}</td>

                                            {{-- <td>
                                                <form action="{{ route("admin.users.destroy", $user) }}" method="post">
                                                    @permission('edit_users')
                                                    <a href="{{ route("admin.users.edit", $user)}}" class="btn btn-primary"
                                                       title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    @endpermission
                                                    @csrf
                                                    @method('DELETE')
                                                    @permission('delete_users')
                                                    <button class="btn btn-danger" type="submit"><i
                                                    class="fa fa-trash"></i></button>
                                                    @endpermission
                                                </form>
                                            </td> --}}
                                            <td>
                                                <div class="dropdown">
                                                    <a class=" dropdown-toggle dropdown_toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="dropdownMenuButton">
                                                        
                                                        <form action="{{ route("admin.users.destroy", $user) }}" method="post"  style="margin-left: 28px">
                                                            @permission('edit_users')
                                                            <a href="{{ route("admin.users.edit", $user)}}" class="btn btn-primary"
                                                               title="Edit">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            @endpermission
                                                            @csrf
                                                            @method('DELETE')
                                                            @permission('delete_users')
                                                            <button class="btn btn-danger" type="submit"><i
                                                            class="fa fa-trash"></i></button>
                                                            @endpermission
                                                        </form>
                                                    </div>
                                                </div>
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
    <div class="printDiv" style="visibility: hidden; display:inline;">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="table-responsive table table-bordered print-container p-3" id="div-id-name"><br>
                <div class="row justify-content-center align-items-center">
                    <div class="float-left mr-4">
                        <img id='img'
                            src="{{ asset('/public/uploads/files/logo') }}/{{$generalSettings->image }}"
                            class=""
                            style="background-color:#75414b; background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                    </div>
                    <div class="float-right mb-4">
                        <span class="font-weight-bold" style="font-size: 25px">{{$generalSettings->name}}</span>
                        <br>
                        <span class="font-weight-bold" style="font-size: 25px">Batch: {{ $batch_name ?? '' }}</span>
                    </div>
                </div>
                <br>
                <h3  style="text-align:center">All User's List</h3>
                <br>
                <table id="order-listing" class="table">
                    <thead>
                        <tr>
                            <th>SL #</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone No</th>
                            <th>Created By</th>
                            <th>User Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $key = 0;
                        @endphp
                        @foreach($users as $user)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $user->name ?? '-' }}</td>
                            <td>{{ $user->email ?? '-' }}</td>
                            <td>{{ $user->phone ?? '-' }}</td>
                            <td>{{ nameById($user->created_by) ?? '-' }}</td>
                            <td>{{ $user->roles->first()->display_name ?? '-' }}</td>
                            <td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="rtf-left">
                    <p>Powerd By : Desktopit.net</p>
                </div>
                <div class="rtf-right"></div>
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
    {!! Html::script('public/assets/js/printThis.js') !!}
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

    {{-- Print option start --}}
    <script>
      $('#btn').click( function(){
        $('.print-container').printThis();
      })
    </script>
@endpush
