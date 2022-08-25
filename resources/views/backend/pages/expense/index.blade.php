@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
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
                                <li class="breadcrumb-item"><a >Account</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Expense List</span></li>

                            </ol>
                            @permission('add_expense_btn') 
                                <a href="{{ route('admin.expense.create') }}"
                                class="btn btn-sm btn-info button-custom">Add New Expense
                                </a>
                            @endpermission
                        </nav>
                    </div>
                    <div class="col-md-12 text-right" style="margin-top: 8px; margin-bottom: 8px">
                        <button id='btn' class="btn btn-sm btn-success float right"><i class="fa fa-print" aria-hidden="true"style="width: 44px;font-size: 14px;"> Print</i></button>
                    </div>
                </div>

                <span class="mt-1 ml-3">Total Expense = {{ $totalExpense }}</span>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table text-center">
                                    <thead>
                                    <tr>
                                        <th>SL #</th>
                                        <th>Expense Name</th>
                                        <th>Amount</th>
                                        <th>
                                            @permission('edit_expense' , 'delete_expense')
                                            Actions @endpermission
                                        </th>
                                            
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($expenses as $key=>$expense)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $expense->expenseCategory->expense_title }}</td>
                                            <td>{{ $expense->amount }}</td>

                                            <td>
                                                    @permission('edit_expense')  
                                                        <a href="{{ route("admin.expense.edit", $expense)}}" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i>
                                                        </a>
                                                    @endpermission

                                                    @permission('delete_expense')
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="javascript:void(0)" class="btn btn-danger delete"

                                                        title="delete" data-id={{$expense->id}}>
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
    <div class="printDiv" style= "display:inline; visibility:hidden">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                  
                <div class="table-responsive table table-bordered print-container p-3" id="div-id-name"><br>
                    <div class="row justify-content-center align-items-center mb-3">
                        <div class="float-left mr-4">
                            <img id='img' src="{{ asset('/public/uploads/files/logo') }}/{{$generalSettings->image }}" class="" style="background-color:#75414b; background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                        </div>
                        <div class="float-right mb-4">
                              <span class="font-weight-bold" style="font-size: 25px; margin-top:150px">{{$generalSettings->name}}</span>
                              <br>
                              <span class="font-weight-bold" style="font-size: 25px">All Expenses</span>
                        </div>
                    </div>  
                    <h3  style="text-align:center">All Expenses List</h3>
                    <br>
                    <table id="order-listing" class="table">
                        <thead>
                            <tr>
                                <th>SL #</th>
                                <th>Expense Name</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($expenses as $key=>$expense)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $expense->expenseCategory->expense_title }}</td>
                                    <td>{{ $expense->amount }}</td>
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
    @include('backend.pages.course.courseCategory.modal.courseCategory-delete')
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
          url:"expense/delete/"+user_id,
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
          window.location.replace('expense');
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
    {{-- Print option edns --}} 
@endpush
