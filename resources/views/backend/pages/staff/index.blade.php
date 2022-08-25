@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
    {!! Html::style('public/css/toggle-text-style.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
@endpush

@section('content')
    <div class="col-md-13 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Staff</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Staffs List</span></li>
                        </ol>
                        
                        @permission('add_staff')
                        <a href="{{ route('admin.staff.create') }}"
                            class="btn btn-sm btn-info button-custom">Add New Staff
                        </a>
                        @endpermission
                        
                    </nav>
                </div>
            </div>
            <div class="card">
              <div class="card-body">
                 <div class="row justify-content-end mb-4">
                  <button id='btn' class="btn btn-sm btn-success"><i class="fa fa-print" aria-hidden="true"> Print</i></button>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr>
                              <th>SL#</th>
                              <th>Name</th>
                              <th>Phone No</th>
                              <th>Email</th>
                              <!--<th>Designation</th>-->
                              <!--<th>Batch</th>-->
                              <th>Address</th>
                              <th>Status</th>
                              <th style="text-align:center">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $key = 0;
                            @endphp
                            @foreach($users as $data)
                                <tr id="{{$data->id}}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $data->user->name ?? '-' }}</td>
                                    <td>{{ $data->user->phone ?? '-' }}</td>
                                    <td>{{ $data->user->email ?? '-' }}</td>
                                    {{-- <td>{{ $data->designation ?? '-' }}</td> --}}
                                    <!--<td>{{ $data->batch->name ?? '-' }}</td>-->
                                    <td>{{ $data->address ?? '-' }}</td>
                                    <td>
                                        <input data-id="{{$data->id}}" class="toggle-class" type="checkbox" data-width="60px" data-size="xs" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $data->status ? 'checked' : '' }}>
                                      </td>
                                    <td>
                                        @permission('view_staff')
                                        <a href="javascript:void(0)" class="view-modal btn btn-warning" title="View" style="padding: 8px"
                                            data-id={{$data->id}}>
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @endpermission
                                        @permission('edit_staff')
                                        <a href="{{ route('admin.staff.edit', $data->id)}}" class="btn btn-success" title="Edit"
                                            style="padding: 8px">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @endpermission
                                        @permission('delete_staff')
                                        <a href="javascript:void(0)" class="btn btn-danger delete" title="Delete" style="padding: 8px"
                                            data-id={{$data->id}}>
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
    @include('backend.pages.staff.modal.staff-view')
    @include('backend.pages.staff.modal.staff-delete')

  <div class="printDiv" style="visibility: hidden; display:inline;">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="table-responsive table table-bordered print-container p-3" id="div-id-name"><br>
                <div class="row justify-content-center align-items-center mb-3">
                  <div class="float-left mr-4">
                    <img id='img' src="{{($generalSettings) ? url('/uploads/files/logo/').'/'.$generalSettings->image : '' }}" class="" style="background-color:#900c3f; background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                  </div>
                    <div class="float-right mb-5">
                      <span class="font-weight-bold" style="font-size: 25px; margin-top:150px">{{($generalSettings) ? $generalSettings->name : ''}}</span>
                    </div>
                </div>
                <br>
                <h3  style="text-align:center">All Staffs List</h3>
                <br>
                <table id="order-listing" class="table student-dm">
                  <thead>
                    <tr>
                      <th style="text-align:center; font-size: 20px;">SL#</th>
                      <th style="text-align:center; font-size: 20px;">Name</th>
                      <th style="text-align:center; font-size: 20px;">Email</th>
                      <th style="text-align:center; font-size: 20px;">Phone No</th>
                      <!--<th style="text-align:center; font-size: 20px;">Batch</th>-->
                      <th style="text-align:center; font-size: 20px;">Address</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $key = 0;
                    @endphp
                    @foreach($users as $data)
                        <tr id="{{$data->id}}">
                            <td style="text-align:center;font-size:18px;">{{ ++$key }}</td>
                            <td style="text-align:center;font-size:18px;">{{ $data->user->name ?? '-' }}</td>
                            <td style="text-align:center;font-size:18px;">{{ $data->user->email ?? '-' }}</td>
                            <td style="text-align:center;font-size:18px;">{{ $data->user->phone ?? '-' }}</td>
                            <!--<td style="text-align:center;font-size:18px;">{{ $data->batch->name ?? '-' }}</td>-->
                            <td style="text-align:center;font-size:18px;">{{ $data->address ?? '-' }}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <br>
                <div class="float-left ml-2">
                  <p>Powered By : Desktopit.net</p>
                </div>
                <div class="float-right">
                    <p>Date: {{date('d-m-Y')}}</p>
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
    {!! Html::script('public/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
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


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

    {{-- Ajax View by modal js code start --}}
    <script type="text/javascript">
        $(document).on('click', '.view-modal', function() {
        var id = $(this).data('id');
        var APP_URL = {!! json_encode(url('/')) !!};
        //alert(APP_URL);

        $.ajax({
        cache: false,
        type: 'get',
        url: "staff/"+id,
        data: { 'id': id },
        success: function(data) {
            console.log(data);
            $('#name').text(data.staff.user.name);
            $('#email').text(data.staff.user.email);
            $('#mobile').text(data.staff.user.phone);
            (data.staff.batch) ? $('#batch').text(data.staff.batch.name) : $('#batch').text(); // show batch name only if the staff is assigned to a specific batch
            $('#address').text(data.staff.address);
            $('#details').text(data.staff.details);
            $('#user_image'). attr("src", APP_URL+"/uploads/user_images/"+data.staff.user.user_image);
            $('#viewModal').modal('show');

          }
        });

    });
    </script>
    {{-- Ajax View by modal js code end --}}

    {{-- Ajax delete by modal js code start --}}

    <script type="text/javascript">
        var user_id;

        $(document).on('click', '.delete', function(){
        user_id = $(this).data('id');
        $('#confirmModal').modal('show');
        });


    $('#ok_button').click(function(){
    $.ajax({
    cache: false,
    type: 'delete',
    url:"staff/delete/"+user_id,
    dataType: "JSON",
    data: {
    "id": user_id

    },
    beforeSend:function(){
    $('#ok_button').text('Deleting...');
    },
    success:function(response)
    {
    //console.log(response.success);
    $('#confirmModal').modal('hide');
    $('#'+user_id).remove();
    $('#ok_button').text("OK");
    showSuccessToast(response.success);
    window.location.replace('staff');
    }
    })
    });
    </script>

    {{-- Print option start --}}
    <script>
      $('#btn').click( function(){
        $('.print-container').printThis();
      })
    </script>
    <script>
      $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var category_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'changeStaffStatus',
                data: {'status': status, 'category_id': category_id},
                success: function(data){
                  showSuccessToast('Status changed successfully');
                  console.log(data.success)
                }
            });
        })
      })
    </script>
@endpush
