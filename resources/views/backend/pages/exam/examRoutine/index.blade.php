@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/bootstrap-toggle/css/bootstrap-toggle.min.css') !!} 
    {!! Html::style('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}

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
                                <li class="breadcrumb-item"><a>Examination</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>All Exam List</span></li>
                            </ol>
                            @permission('add_exam_btn')
                                <a href="{{ route('admin.examination.createRoutine') }}"
                                class="btn btn-sm btn-info button-custom">Add New Exam
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
                                        <th>Batch Name</th>
                                        <th>Exam Name</th>
                                        <th>Date</th>
                                        {{-- <th>Subject</th> --}}
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Full Mark</th>
                                        {{-- <th>Written</th>
                                        <th>MCQ</th> --}}
                                        @permission('view_exam', 'edit_exam', 'delete_exam')
                                            <th>Actions</th>
                                        @endpermission
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($examCreates as $key=>$examCreate)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $examCreate->batch->name }}</td>
                                            <td>{{ $examCreate->exam_title }}</td>
                                            <td>{{ $examCreate->date }}</td>
                                            {{-- <td>{{ $examCreate->subject->name }}</td> --}}
                                            <td>{{ date ('h:i a',strtotime($examCreate->start_time))}}</td>
                                            <td>{{ date ('h:i a',strtotime($examCreate->end_time))}}</td>
                                            <td>{{ $examCreate->full_mark }}</td>
                                            {{-- <td>{{ $examination->written }}</td>
                                            <td>{{ $examination->mcq }}</td> --}}
                                            <td>
                                                {{-- <form action="{{ route('admin.examination.destroy', $examination)}}"
                                                      method="post"> --}}
                                                    @permission('view_exam')  
                                                        <a href="javascript:void(0)" class="btn btn-warning view-modal"
                                                        title="View" data-id={{$examCreate->id }}>
                                                        <i class="fa fa-eye"></i>
                                                        </a>
                                                    @endpermission  
                                                    @permission('edit_exam')
                                                        <a href="{{ route("admin.examCreate.edit", $examCreate)}}"
                                                        class="btn btn-success" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    @endpermission

                                                    @permission('delete_exam')
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="javascript:void(0)" class="btn btn-danger delete"

                                                        title="delete" data-id={{$examCreate->id}}>
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    @endpermission
                                                {{-- </form> --}}
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
     @include('backend.pages.exam.modal.examRoutine-view')
     @include('backend.pages.exam.modal.examRoutine-delete')
@endsection

@push('plugin-scripts')

    {!! Html::script('/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('/assets/plugins/bootstrap-toggle/js/bootstrap-toggle.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}

@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/data-table.js') !!}
    {!! Html::script('/assets/js/toastDemo.js') !!}
    <script type="text/javascript">
        $(document).ready(function () {
            @if (session('success'))
            showSuccessToast('{{ session("success") }}');
            @elseif(session('danger'))
            showDangerToast('{{ session('danger') }}');
            @elseif(session('warning'))
            showWarningToast('{{ session("warning") }}');
            @endif
        });

    </script>

<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0;
          var category_id = $(this).data('id');

          $.ajax({
              type: "GET",
              dataType: "json",
              url: 'changeStatus',
              data: {'status': status, 'category_id': category_id},
              success: function(data){
                showSuccessToast('Status changed successfully');
                console.log(data.success)
              }
          });
      })
    })
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
          url:"examCreate/"+user_id,
          dataType: "JSON",
          data: {
          "id": user_id, _token: '{{csrf_token()}}'},
     
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
          window.location.replace('examCreate');
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
        url: "examCreate/"+id,
        data: { 'id': id },
        success: function(data) {
        //console.log(APP_URL+"/uploads/user_images/"+data.students.user.user_image);
        $('#batch_name').text(data.exam_creates.batch.name);
        $('#exam_title').text(data.exam_creates.exam_title);
        $('#date').text(data.exam_creates.date);
        $('#subject_name').text(data.exam_creates.subject.name);
        $('#start_time').text(data.exam_creates.start_time);
        $('#end_time').text(data.exam_creates.end_time);
        $('#full_mark').text(data.exam_creates.full_mark);
        $('#written').text(data.exam_creates.written);
        $('#mcq').text(data.exam_creates.mcq);
        $('#viewModal').modal('show');

        }
        });

    });
    </script>
{{-- Ajax View by modal js code end --}}
@endpush
