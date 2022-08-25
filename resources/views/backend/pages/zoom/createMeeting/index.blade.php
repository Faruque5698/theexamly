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
                            <li class="breadcrumb-item active" aria-current="page"><a>Communication</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Zoom Meeting List</span></li>
                        </ol>
                        
                        @permission('add_staff')
                        <a href="{{ route('admin.communication.zoomMeetingCreate') }}"
                            class="btn btn-sm btn-info button-custom">Create New Zoom Meeting
                        </a>
                        @endpermission
                        
                    </nav>
                </div>
            </div>
            <div class="col-md-12 text-right" style="margin-top: 8px; margin-bottom: 8px">
              <button id='btn' class="btn btn-sm btn-success float right"><i class="fa fa-print" aria-hidden="true"style="width: 44px;font-size: 14px;"> Print</i></button>
            </div>  
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr>
                              <th>SL#</th>
                              <th style="text-align:center">Topic</th>
                              <th style="text-align:center">Start Time</th>
                              <th style="text-align:center">Agenda</th>
                              <th style="text-align:center">Join</th>
                              @permission('zoom_meeting_status')
                              <th style="text-align:center">Status</th>
                              @endpermission
                              @permission('zoom_meeting_delete')
                              <th style="text-align:center">Actions</th>
                              @endpermission
                            </tr>
                          </thead>
                          <tbody>
                            @php
                              $key = 0;
                            @endphp
                            @foreach($meetingList as $key=> $data)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $data->topic ?? '-' }}</td>
                                    <td style="text-align:center">{{ date('d-m-Y H:i:s', strtotime($data->start_time ?? '-'))}}</td>
                                    <td style="text-align:center">{{ $data->agenda ?? '-' }}</td>
                                    <td style="text-align:center">
                                        {!! $data->status == "0" ? " " : '<a href="'.$data->join_url.'"><i class="fa fa-video-camera" aria-hidden="true" data-toggle="tooltip" data-original-title="you can join zoom meeting by click the icon"></i></a>'
                                        !!}
                                    </td>
                                    @permission('zoom_meeting_status')
                                    <td>
                                        <input data-id="{{$data->id}}" class="toggle-class" type="checkbox" data-width="65px" data-size="xs" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Awaited" data-off="Finished" {{ $data->status ? 'checked' : '' }}>
                                    </td>
                                    @endpermission  
                                    <td style="text-align:center">
                                        <div class="dropdown">
                                            <a class=" dropdown-toggle dropdown_toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i></a>
                                            <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="dropdownMenuButton">

                                                @permission('zoom_meeting_delete')
                                                    @csrf
                                                    <a href="javascript:void(0)" class="dropdown-item delete" title="delete" data-id={{$data->id}}><i
                                                            class="fa fa-trash"></i> Delete</a>
                                                @endpermission        
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
    @include('backend.pages.staff.modal.staff-delete')

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
                <h3  style="text-align:center">All Staffs List</h3>
                <br>
                <table id="order-listing" class="table student-dm">
                  <thead>
                    <tr>
                      <th style="text-align:center; font-size: 20px;">SL#</th>
                      <th style="text-align:center; font-size: 20px;">Topic</th>
                      <th style="text-align:center; font-size: 20px;">Start Time</th>
                      <th style="text-align:center; font-size: 20px;">Agenda</th>
                      <th style="text-align:center; font-size: 20px;">Join Url</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $key = 0;
                    @endphp
                    @foreach($meetingList as $data)
                        <tr id="{{$data->id}}">
                            <td style="text-align:center;font-size:18px;">{{ ++$key }}</td>
                            <td>{{ $data->topic ?? '-' }}</td>
                            <td>{{ $data->start_time ?? '-' }}</td>
                            <td>{{ $data->agenda ?? '-' }}</td>
                            <td>{{ $data->join_url ?? '-' }}</td>
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
    url:"meetings/delete/"+user_id,
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
    window.location.replace('meetingsIndex');
    }
    })
    });
    </script>
    {{-- Ajax delete by modal js code end --}}
    
    {{-- Print option start --}}
    <script>
      $('#btn').click( function(){
        $('.print-container').printThis();
      })
    </script>
    {{-- Print option end --}}

    {{-- Status change start --}}
    <script>
      $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var category_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'changeMeetingStatus',
                data: {'status': status, 'category_id': category_id},
                success: function(data){
                  window.location.replace('meetingsIndex'); 
                  showSuccessToast('Status changed successfully');
                  console.log(data.success)
                }
            });
        })
      })
    </script>
    {{-- Status change end --}}
@endpush
