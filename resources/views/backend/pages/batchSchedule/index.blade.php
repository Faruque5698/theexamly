@extends('backend.layout.master')

@push('plugin-styles')

    {!! Html::style('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
    {!! Html::style('/css/toggle-text-style.css') !!}

@endpush

@section('content')
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-header">
                    <div class="template-demo">
                        <nav aria-label="breadcrumb" class="nav-container">
                            <ol class="breadcrumb breadcrumb-custom ">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a></li>
                                <li class="breadcrumb-item"><a>Class Routine</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Class Routine List</span></li>
                            </ol>
                            @permission('add_batch_btn')
                                <a href="{{ route('admin.batchSchedule.create') }}"
                                class="btn btn-sm btn-info button-custom">Add New Class Routine
                                </a>
                            @endpermission
                        </nav>
                    </div>
                    <div class="col-md-12 text-right" style="margin-top: 8px; margin-bottom: 8px">
                        <button id='btn' class="btn btn-sm btn-success float right"><i class="fa fa-print" aria-hidden="true"style="width: 44px;font-size: 14px;"> Print</i></button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table text-center student-dm">
                                    <thead>
                                        <tr>
                                            <th>SL#</th>
                                            <th>Batch Name</th>
                                            <th>Course Name</th>
                                            <th style="width:70px">Start Date</th>
                                            <th style="width:70px">End Date</th>
                                            <th> 
                                                {{-- @permission('view_batch', 'edit_batch' , 'delete_batch')  --}}
                                                Actions 
                                                {{-- @endpermission --}}
                                            </th>                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($batchSchedules as $key=>$batchSchedule)
                                        <tr class="item">
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $batchSchedule->batch->name }}</td>
                                            <td>{{ $batchSchedule->course->full_name }}</td>
                                            <td>
                                               {{ date('d-m-Y', strtotime($batchSchedule->start_date))}}
                                            </td>
                                            <td class="end_date">
                                                {{ date('d-m-Y', strtotime($batchSchedule->end_date))}}
                                            </td>
                                            <td style="width: 10%">
                                                <div class="dropdown">
                                                    <a class=" dropdown-toggle dropdown_toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false" data-dropup-auto="false"><i class="fa fa-cog"></i></a>   
                                                    <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="dropdownMenuButton">
                                                    @permission('addTopic_class_routine')
                                                    <a href="{{ route("admin.batchSchedule.addClass", $batchSchedule)}}" class="dropdown-item add {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}" title="add" data-id={{$batchSchedule->id}}><i class="fa fa-plus"></i> Add Topic</a>
                                                   
                                                    <div class="dropdown-divider {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}"></div> 
                                                    @endpermission
                                                    @permission('view_class_routine')
                                                    <a href="{{ route("admin.batchSchedule.show", $batchSchedule)}}" class="dropdown-item view-modal" title="View">
                                                    <i class="fa fa-eye"></i> View</a>
                                                    @endpermission
                                
                                                    @permission('edit_class_routine')
                                                    <div class="dropdown-divider {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}"></div>
                                                    <a href="{{ route("admin.batchSchedule.edit", $batchSchedule)}}" class="dropdown-item {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}" title="Edit" role="button">
                                                    <i class="fa fa-edit"></i> Edit</a>
                                                    @endpermission
                                
                                
                                                    @permission('delete_class_routine')
                                                    <div class="dropdown-divider {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}"></div>
                                                    @csrf
                                                    <a href="javascript:void(0)" class="dropdown-item delete {{strtotime(date('d-m-Y')) > strtotime($batchSchedule->end_date) ? 'd-none' : ''}}" title="delete" data-id={{$batchSchedule->id}}><i class="fa fa-trash"></i> Delete</a>
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
                        <div class="float-right mb-4">
                            <span class="font-weight-bold" style="font-size: 25px; margin-top:150px">{{($generalSettings) ? $generalSettings->name : ''}}</span>
                            <br>
                            <span class="font-weight-bold" style="font-size: 25px">Batch: All Running Batches</span>
                        </div>
                    </div>
                    <br>  
                    <h3  style="text-align:center">Class Routine List</h3>
                    <br>
                    <table id="order-listing" class="table text-center student-dm">
                        <thead>
                            <tr>
                                <th style="text-align:center; font-size: 20px;">SL#</th>
                                <th style="text-align:center; font-size: 20px;">Batch Name</th>
                                <th style="text-align:center; font-size: 20px;">Course Name</th>
                                <th style="text-align:center; font-size: 20px;">Start Date</th>
                                <th style="text-align:center; font-size: 20px;">End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($batchSchedules as $key=>$batchSchedule)
                                <tr class="item">
                                    <td style="text-align:center;font-size:18px;">{{ ++$key }}</td>
                                    <td style="text-align:center;font-size:18px;">{{ $batchSchedule->batch->name }}</td>
                                    <td style="text-align:center;font-size:18px;">{{ $batchSchedule->course->full_name }}</td>
                                    <td style="text-align:center;font-size:18px;">
                                        {{ date('d-m-Y', strtotime($batchSchedule->start_date))}}
                                    </td>
                                    <td style="text-align:center;font-size:18px;" class="end_date">
                                        {{ date('d-m-Y', strtotime($batchSchedule->end_date))}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table><br>
                    <div class="float-left ml-2">
                        <p>Powered By : Desktopit.com.bd</p>
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
    @include('backend.pages.batch.runningBatch.modal.runningBatch-view')
    @include('backend.pages.batch.runningBatch.modal.runningBatch-delete')
@endsection

@push('plugin-scripts')
    {!! Html::script('/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('/assets/plugins/moment/moment.js') !!}
    {!! Html::script('/assets/js/printThis.js') !!}
@endpush

{{-- js code snippet to show toastr notification --}}

@push('custom-scripts')
    {!! Html::script('/assets/js/data-table.js') !!}
    {!! Html::script('/assets/js/toastDemo.js') !!}
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
            url:'batchScheduleDelete/'+user_id,
            dataType: "JSON",
            data: {"id": user_id, _token: '{{csrf_token()}}'},
            beforeSend:function(){
            $('#ok_button').text('Deleting...');
            },
            success:function(response){
                $('#confirmModal').modal('hide');
                $('#'+user_id).remove();
                $('#ok_button').text("OK");
                showSuccessToast(response.success);
                window.location.replace('batchSchedule');
            }
        })
    });
    </script>
    {{-- Ajax delete by modal js code end --}}  
    {{-- Print option starts --}}
    <script>
        $('#btn').click( function(){
          $('.print-container').printThis();
        })
    </script>
    {{-- Print option edns --}}  
@endpush
