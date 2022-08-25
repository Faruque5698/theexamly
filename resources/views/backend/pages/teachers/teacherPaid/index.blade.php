@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/bootstrap-toggle/css/bootstrap4-toggle.min.css') !!}
    {!! Html::style('/css/toggle-text-style.css') !!}
    {!! Html::style('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
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
                            <li class="breadcrumb-item active" aria-current="page"><a>Teachers</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Paid Teacher</span></li>
                        </ol>
                        {{-- @permission('add_teacher_btn') --}}
                          <?php 
                          
                            foreach ($teacherList as $key => $value) {
                              
                            
                          }
                            
                          ?>
                          @if(!empty($value))
                          <a href="{{ route('admin.teacher.paid-teacher-add',[$value->id]) }}"
                                class="btn btn-sm btn-info button-custom">Payment Add
                          </a>
                          @endif
                        {{-- @endpermission --}}
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
                              <th>Earned Amount</th>
                              {{-- <th>Paid Amount</th> --}}
                              <th>Payment Amount</th>
                              <th>Date</th>
                              @permission('view_teacher', 'edit_teacher', 'delete_teacher')
                                <th style="text-align:center">Actions</th>
                              @endpermission  
                            </tr>
                          </thead>
                          <tbody>
                              @php
                                  $key = 0;

                              @endphp
                              @foreach($teacherList as $teacher)
                                  <tr id="{{$teacher->id}}">
                                      <td>{{ ++$key }}</td>
                                      <td>{{ $teacher->user->name }}</td>
                                      <td>@if(!empty($sum))
                                          {{ ($sum/100*25) }} 
                                          @else
                                              0 
                                          @endif
                                      </td>
                                      {{-- <td>{{ $teacher->paid_amount }}</td> --}}
                                      <td>{{ $teacher->payment_amount }}</td>
                                      <td>{{ $teacher->date }}</td>
                                      <td style="text-align: center">
                                          @permission('edit_teacher')
                                            <a href="{{ route('admin.teacher.paid-teacher-edit', $teacher->id)}}" class="btn btn-success"
                                              title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                          @endpermission
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                          <div class="float-right">
                            <tr><td>Total Paid: {{ $totalPaid }}</td></tr>
                          </div>
                        </table>
                      </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>    
    @include('backend.pages.teachers.modal.teacherResponsibility-view')
    @include('backend.pages.teachers.modal.teacherResponsibility-delete')  
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
                <h3  style="text-align:center">Teacher Payment Details</h3>
                <table id="order-listing" class="table student-dm">
                  <thead>
                    <tr>
                      <th style="text-align:center; font-size: 20px;">SL#</th>
                      <th style="text-align:center; font-size: 20px;">Name</th>
                      <th style="text-align:center; font-size: 20px;">Earned Amount</th>
                      <th style="text-align:center; font-size: 20px;">Payment Amount</th>
                      <th style="text-align:center; font-size: 20px;">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $key = 0;
                    @endphp
                    @foreach($teacherList as $teacher)
                        <tr id="{{$teacher->id}}">
                            <td style="text-align:center;font-size:18px;">{{ ++$key }}</td>
                            <td>{{ $teacher->user->name }}</td>
                            <td>@if(!empty($sum))
                                {{ ($sum/100*25) }} 
                                @else
                                    0 
                                @endif
                            </td>
                            <td>{{ $teacher->payment_amount }}</td>
                            <td>{{ $teacher->date }}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table><br>
                <div class="float-right">
                  <tr><td>Total Paid: {{ $totalPaid }}</td></tr>
                </div>
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
    {!! Html::script('/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
    {!! Html::script('/assets/js/printThis.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/data-table.js') !!}
    {!! Html::script('/assets/js/toastDemo.js') !!}

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

    {{-- Print option start --}}
    <script>
      $('#btn').click( function(){
        $('.print-container').printThis();
      })
    </script>
    {{-- Print option end --}}
  
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
          url:"teacher_responsibility_delete/"+user_id,
          dataType: "JSON",
          data: {
            "id": user_id
          },
          beforeSend:function(){
            $('#ok_button').text('Deleting...');
          },
          success:function(response)
          {
            // console.log(response);
            $('#confirmModal').modal('hide');
            $('#'+user_id).remove();
            $('#ok_button').text("OK");
            showSuccessToast(response.success);
            window.location.replace('teacher_responsibility_index');
          }
        })
      });
    </script>
    {{-- Ajax delete by modal js code end --}}
  
    {{-- Ajax View by modal js code start --}}
    <script type="text/javascript">
      $(document).on('click', '.view-modal', function() {
        var id = $(this).data('id');
        var APP_URL = {!! json_encode(url('/')) !!};
        //alert(APP_URL);

        $.ajax({
          cache: false,
          type: 'get',
          url: "teacher_responsibility_index/"+id,
          data: { 'id': id },
          // beforeSend: function(jqXHR, settings) {
          //     console.log(settings.url);
          // },
          success: function(data) {
            // console.log(data);
            $('#description').text(data.responsibilitis.description); 
            $('#status').text((data.responsibilitis.status) ? "Active" : "Inactive");
            $('#viewModal').modal('show');
          }
        });

      });
    </script>
    {{-- Ajax View by modal js code end --}}

    <script>
      $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var category_id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: 'teacher_responsibility_index/changeTeacherResponsibilityStatus',
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
