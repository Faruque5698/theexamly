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
                                <li class="breadcrumb-item"><a>Batch</a></li>
                                <li class="breadcrumb-item"><a>Running Batch</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Running Batch List</span></li>
                            </ol>
                            @permission('add_batch_btn')
                                <a href="{{ route('admin.batch.create') }}"
                                class="btn btn-sm btn-info button-custom">Add New Batch
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
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Available Seat</th>
                                        @permission('activate_batch')
                                        <th> Status </th>
                                        @endpermission                                       
                                        <th> @permission('view_batch', 'edit_batch' , 'delete_batch') 
                                            Actions @endpermission
                                        </th>                                       
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($batches as $key=>$batch)
                                        <tr class="item">
                                            <td>{{ ++$key }}</td>
                                            <td style="width: 20%">{{ $batch->name }}</td>
                                            <td>
                                               {{ date('d-m-Y', strtotime($batch->start_date))}}
                                            </td>
                                            <td class="end_date">
                                                {{ date('d-m-Y', strtotime($batch->end_date))}}
                                            </td>
                                            <td>{{ $batch->available_seat }}</td>
                                            <!--<td>-->
                                            <!--    @foreach ($batch->day_time as $day)-->
                                            <!--        {{ (!$loop->last) ? $day->day.',' : $day->day }}-->
                                            <!--    @endforeach-->
                                            <!--</td>-->
                                            @permission('activate_batch')
                                                <td>
                                                    <input data-id="{{$batch->id}}" class="toggle-class" type="checkbox" data-width="60px" data-size="xs" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $batch->status ? 'checked' : '' }}>
                                                </td>
                                            @endpermission

                                            <td style="width: 20%">
                                                @permission('view_batch')
                                                  <a href="javascript:void(0)" class="btn btn-warning view-modal"
                                                     title="View" data-id={{$batch->id }}>
                                                      <i class="fa fa-eye"></i>
                                                  </a>
                                                @endpermission

                                                @permission('edit_batch')
                                                    <a href="{{ route("admin.batch.edit", $batch)}}"
                                                       class="btn btn-success
                                                       @php
                                                        if(strtotime(date('d-m-Y')) > strtotime($batch->end_date)) {
                                                            echo 'disabled';
                                                        }
                                                        @endphp"
                                                        title="Edit"
                                                       role="button">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endpermission   

                                                @permission('delete_batch')
                                                    @csrf
                                                    <a href="javascript:void(0)" class="btn btn-danger delete 
                                                        @php
                                                         if(strtotime(date('d-m-Y')) > strtotime($batch->end_date)) {
                                                             echo 'disabled';
                                                         }
                                                         @endphp"
                                                       title="delete" data-id={{$batch->id}}>
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
                    <h3  style="text-align:center">Running Batch List</h3>
                    <br>
                    <table id="order-listing" class="table text-center student-dm">
                        <thead>
                            <tr>
                                <th style="text-align:center; font-size: 20px;">SL#</th>
                                <th style="text-align:center; font-size: 20px;">Batch Name</th>
                                <th style="text-align:center; font-size: 20px;">Course Name</th>
                                <th style="text-align:center; font-size: 20px;">Seat Capacity</th>
                                <th style="text-align:center; font-size: 20px;">Start Date</th>
                                <th style="text-align:center; font-size: 20px;">End Date</th>
                                <th style="text-align:center; font-size: 20px;">Days</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($batches as $key=>$batch)
                                <tr class="item">
                                    <td width="5%" style="text-align:center;font-size:18px;">{{ ++$key }}</td>
                                    <td width="20%" style="text-align:center;font-size:18px;">{{ $batch->name }}</td>
                                    <td width="20%" style="text-align:center;font-size:18px;">{{ $batch->course->full_name }}</td>
                                    <td width="10%" style="text-align:center;font-size:18px;">{{ $batch->seat_capacity }}</td>
                                    <td width="15%" style="text-align:center;font-size:18px;">
                                        {{ date('d-m-Y', strtotime($batch->start_date))}}
                                    </td>
                                    <td width="15%" style="text-align:center;font-size:18px;" class="end_date">
                                        {{ date('d-m-Y', strtotime($batch->end_date))}}
                                    </td>
                                    <td width="15%" style="text-align:center;font-size:18px;">
                                        @foreach ($batch->day_time as $day)
                                            {{ (!$loop->last) ? $day->day.',' : $day->day }}
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table><br>
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
    @include('backend.pages.batch.runningBatch.modal.runningBatch-view')
    @include('backend.pages.batch.runningBatch.modal.runningBatch-delete')
@endsection

@push('plugin-scripts')
    {!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('public/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('public/assets/plugins/moment/moment.js') !!}
    {!! Html::script('public/assets/js/printThis.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/data-table.js') !!}
    {!! Html::script('public/assets/js/toastDemo.js') !!}
    {{-- js snippet to show toastr notification --}}
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

    {{-- js snippet to toggle teacher active status --}}
    <script>
        $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var category_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'changeStatusPublish',
                data: {'status': status, 'category_id': category_id},
                success: function(data){
                    showSuccessToast('Status changed successfully');
                    console.log(data.success)
                }
            });
        })
        })
    </script>

    {{-- Ajax View by modal js code start --}}
    <script type="text/javascript">
        $(document).on('click', '.view-modal', function() {
            var id = $(this).data('id');
            var APP_URL = {!! json_encode(url('/')) !!};

            $.ajax({
                cache: false,
                type: 'get',
                url: "batch/"+id,
                data: { 'id': id },
                success: function(data) {
                    $('#name').text(data.batch.name);
                    $('#start_date').text(moment(data.batch.start_date).format('DD-MM-YYYY'));
                    $('#end_date').text(moment(data.batch.end_date).format('DD-MM-YYYY'));
                    $('#days').html('<b>Time</b>');
                    $('#course_id').text(data.batch.course.full_name);
                    @if(Auth::id() == 1)
                        $('#seat_capacity').text(data.batch.seat_capacity);
                    @else
                        $('#seat_capacity').text(data.batch.seat_capacity - 5);
                    @endif
                    $('#description').text(data.batch.description);
                    $("td[id*=class-day]").remove();
                    $("td[id*=start_time]").remove();
                    for (let index = 0; index < data.batch.day_time.length; index++) {
                        let html = '<tr>';
                        html+= '<td id="class-day" class="text-capitalize font-weight-bold font-italic">'+data.batch.day_time[index].day+'</td>';
                        html+='<td id="start_time">'+moment(data.batch.day_time[index].start_time,'HH:mm').format('hh:mm A')+' to '+moment(data.batch.day_time[index].end_time, 'HH:mm').format('hh:mm A')+'</td>';
                        html+='</tr>';
                        $('#days_row').after(html);
                    }

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
                url:"runningBatch/"+user_id,
                dataType: "JSON",
                data: {"id": user_id, _token: '{{csrf_token()}}'},
    
                beforeSend:function(){
                    $('#ok_button').text('Deleting...');
                },
                success:function(response){
                    // console.log(response);
                    $('#confirmModal').modal('hide');
                    $('#ok_button').text("OK");
                    if(response.success){
                        showSuccessToast(response.success);
                        window.location.replace('batch');
                    }else{
                        showDangerToast(response.danger);
                    }
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
        <script>
            $('#modal-btn').click( function(){
                $('.print-modal').printThis();
            })
        </script>
    {{-- Print option ends --}}  
@endpush
