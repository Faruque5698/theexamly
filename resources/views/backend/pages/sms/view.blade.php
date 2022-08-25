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
    <div class="col-md-13 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>SMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>SMS Log</span></li>
                        </ol>
                        
                        @permission('send_sms_btn')
                          <a href="{{ route('admin.sms.index') }}"
                              class="btn btn-sm btn-info button-custom"> Send SMS
                          </a>
                        @endpermission
                        
                    </nav>
                </div>
            </div>
            <!--<div class="col-md-12 text-right mt-1 mb-1">-->
            <!--  <button id='btn' class="btn btn-sm btn-warning float right mr-3">Print</button>-->
            <!--</div> -->
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
                              <th>#</th>
                              <th>Name</th>
                              <th>Id</th>
                              <th>Phone No</th>
                              <th>Batch/Group Name</th>
                              <th>Sending Time</th>
                              <th>Message Description</th>
                              {{-- <th style="text-align:center">Actions</th> --}}
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($sms as $key=>$data)
                                <tr >
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $data->user->name ?? $data->phoneBook->name ?? '-' }}</td>
                                    <td>{{ $data->user->student_id ?? '-' }}</td>
                                    <td>{{ $data->phone ?? '-' }}</td>
                                    <td>{{ $data->batch->name ?? $data->phoneBook->phoneBookGroup->group_name ?? '-' }}</td>
                                    <td>{{ $data->created_at ?? '-' }}</td>
                                    <td class="word_breck">{{ $data->description ?? '-' }}</td>
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
    @include('backend.pages.sms.modal.sms-view')
    @include('backend.pages.sms.modal.sms-delete')

  <div class="printDiv" style="visibility: hidden; display:inline;">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="table-responsive table table-bordered print-container p-3" id="div-id-name"><br>
              <div class="row justify-content-center align-items-center mb-3">
                <div class="float-left mr-4">
                    <img id='img' src="{{ asset('/public/uploads/files/logo') }}/{{$generalSettings->image }}" class="" style="background-color:#75414b; background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                </div>
              </div>
                <h3  style="text-align:center">All SMS Log</h3>
                <br>
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Id</th>
                      <th>Phone No</th>
                      <th>Batch/Group Name</th>
                      <th>Sending Time</th>
                      <th>Message Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($sms as $key=>$data)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $data->user->name ?? $data->phoneBook->name ?? '-' }}</td>
                            <td>{{ $data->user->student_id ?? '-' }}</td>
                            <td>{{ $data->phone ?? '-' }}</td>
                            <td>{{ $data->batch->name ?? $data->phoneBook->phoneBookGroup->group_name ?? '-' }}</td>
                            <td>{{ $data->created_at ?? '-' }}</td>
                            <td>{{ $data->description ?? '-' }}</td>
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
        url: "sms/"+id,
        data: { 'id': id },
        success: function(data) {
        $('#name').text(data.sms.user.name);
        $('#title').text(data.sms.title);
        $('#description').text(data.sms.description);
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
    url:"inbox/delete/"+user_id,
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
@endpush
