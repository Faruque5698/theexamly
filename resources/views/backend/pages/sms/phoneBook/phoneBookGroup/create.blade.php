@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
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
                            <li class="breadcrumb-item active" aria-current="page"><a>SMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Phone Book</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Phone Book Group</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="text-right mr-2" style="margin-top: 8px; margin-bottom: 8px">
              <button id='btn' class="btn btn-sm btn-success float right"><i class="fa fa-print" aria-hidden="true"style="width: 44px;font-size: 14px;"> Print</i></button>
            </div>  
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <form class="cmxform" id="phoneBookGroupForm" method="post" action="{{ route('admin.sms.phoneBookGroup.storeGroup') }}" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                <label for="group_name"> Group Name</label><span class="requiredStar" style="color: red"> *</span>
                                <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" style="width: 200px" required>
                              </div>
                              <button type="submit" class="btn btn-primary">Add</button>
                              <a href="{{ route('admin.sms.phoneBook') }}" class="btn btn-danger">Back</a>
                            </form>
                        </div> 
                        <div class="col-6 float-right">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#Sl</th>
                                            <th>Group Name</th>
                                            <th style="text-align:center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($phoneBookGroup as $key=>$data)
                                            <tr>
                                              <td>{{ ++$key }}</td>
                                                <td>{{ $data->group_name ?? '-' }}</td>
                                                <td style="text-align:center">
                                                    @permission('edit_staff')
                                                    <a href="{{ route('admin.sms.phoneBookGroup.phoneBookGroupEdit', $data->id)}}" class="btn btn-success" title="Edit" style="padding: 8px"><i class="fa fa-edit"></i>
                                                    </a>
                                                    @endpermission
                                                    @permission('delete_staff')
                                                    <a href="javascript:void(0)" class="btn btn-danger delete" title="Delete" style="padding: 8px" data-id={{$data->id}}>
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
        </div>
    </div> 
    @include('backend.pages.sms.phoneBook.phoneBookGroup.modal.phoneBookGroup-delete')
  <div class="printDiv" style="visibility: hidden; display:inline;">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="table-responsive table table-bordered print-container p-3" id="div-id-name"><br>
                <div class="row justify-content-center align-items-center mb-3">
                    <div class="float-left mr-4">
                        <img id='img'
                            src="{{ asset('/public/uploads/files/logo') }}/{{$generalSettings->image }}"
                            class=""
                            style="background-color:#900c3f; background-blend-mode: multiply;-webkit-print-color-adjust: exact;color-adjust: exact; padding:5px;">
                    </div>
                    <div class="float-right mb-5">
                      <span class="font-weight-bold"
                          style="font-size: 25px; margin-top:150px">{{$generalSettings->name}}</span>
                    </div>
                </div>
                <br>
                <h3  style="text-align:center">All Group List</h3>
                <br>
                <table class="table student-dm">
                  <thead>
                    <tr>
                      <th style="text-align:center; font-size: 20px;">#SL</th>
                      <th style="text-align:center; font-size: 20px;">Group Name</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $key = 0;
                    @endphp
                    @foreach($phoneBookGroup as $data)
                        <tr id="{{$data->id}}">
                            <td style="text-align:center;font-size:18px;">{{ ++$key }}</td>
                            <td style="text-align:center;font-size:18px;">{{ $data->group_name ?? '-' }}</td>
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
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('public/assets/js/printThis.js') !!}    
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/data-table.js') !!}
    {!! Html::script('public/assets/js/validation/phoneBookGroupForm-validation.js') !!}
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
    url:"createGroup/delete/"+user_id,
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
    window.location.replace('createGroup');
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
