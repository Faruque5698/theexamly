@extends('backend.layout.master')

@push('plugin-styles')
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
                                <li class="breadcrumb-item"><a >Examination</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Grade Info</span></li>

                            </ol>
                            @permission('add_grade_btn')
                                <a href="{{ route('admin.examGrade.create') }}"
                                class="btn btn-sm btn-info button-custom">Set Exam Grade
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
                                        <th>Grade Name</th>
                                        <th>Grade Point</th>
                                        <th>Number From</th>
                                        <th>Number To</th>
                                        
                                            <th>
                                                @permission('edit_grade', 'delete_grade')
                                                Actions @endpermission
                                            </th>
                                            
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($grades as $key=>$grade)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $grade->grade_name }}</td>
                                            <td>{{ $grade->grade_point }}</td>
                                            <td>{{ $grade->number_from }}</td>
                                            <td>{{ $grade->number_to }}</td>
                                            <td>
                                                    @permission('edit_grade')  
                                                        <a href="{{ route("admin.examGrade.edit", $grade)}}" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i>
                                                        </a>
                                                    @endpermission
                                                    
                                                    @permission('delete_grade')
                                                    @csrf
                                                    @method('DELETE') 
                                                        <a href="javascript:void(0)" class="btn btn-danger delete"

                                                        title="delete" data-id={{$grade->id}}>
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
    @include('backend.pages.course.courseCategory.modal.courseCategory-delete')
@endsection

@push('plugin-scripts')
    {!! Html::script('/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
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
          url:"examGrade/delete/"+user_id,
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
          window.location.replace('examGrade');
        }
        })
        });
      </script>
    {{-- Ajax delete by modal js code end --}}  
@endpush
