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
                                <li class="breadcrumb-item"><a>Account</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Daily Income Expense List</span></li>
                            </ol>

                            <a id='btn' class="btn btn-sm btn-success button-custom" style="color:white"><i class="fa fa-print"> Print</i>
                            </a>

                        </nav>
                    </div>
                </div>
              {{--   @php $sum=0; @endphp
                @foreach($paymnets as $key=>$payment)
                @php $sum = $sum + $payment->total_ammount; @endphp
                @endforeach
                Total Income = {{ $sum }} --}}
                {{-- <h5><strong>Total:</strong></h5> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-title text-center">
                                <h4>Income Information</h4>
                            </div>
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>#Sl</th>
                                            <th>Student Id</th>
                                            <th>Student Name</th>
                                            <th>Phone No</th>
                                            <th>Batch Name</th>
                                            <th>Total Amount</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                          @php $sum=0; @endphp
                                        @foreach($income as $key=>$incomes)
                                         
                                            <tr class="item">
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $incomes->student_id ?? ''}}</td>
                                                <td>{{ $incomes->user->name ?? ''}}</td>
                                                <td>{{ $incomes->user->phone ?? ''}}</td>
                                                <td>{{ ($incomes->batch_count)>1 ? 'Multiple Batches ('.$incomes->batch->name.'...'.')' : $incomes->batch->name }}</td>
                                                <td>{{ $incomes->paymented_amount }}</td>
                                            </tr>
                                          @php $sum = $sum + $incomes->paymented_amount; @endphp  
                                        @endforeach 
                                        <tr>
                                            <td style="border: 1px solid Transparent" colspan="5"></td>
                                            <td style="border: 1px solid Transparent" colspan="6">Total Income = {{ $sum }}</td>
                                        </tr>                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-title text-center">
                                <h4>Expense Information</h4>
                            </div>
                            <div class="table-responsive">
                                <table id="" class="table table-striped table-bordered text-center">
                                    <thead>
                                        <tr>
                                          <th>#Sl</th>
                                          <th>Expense Category</th>
                                          <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $sum=0; @endphp
                                    @foreach($expense as $key=>$expenses)
                                        <tr class="item">
                                          <td>{{ ++$key }}</td>
                                          <td>{{ $expenses->expenseCategory->expense_title ?? ''}}</td>
                                          <td>{{ $expenses->amount ?? ''}}</td>
                                        </tr>
                                         @php $sum = $sum + $expenses->amount; @endphp 
                                    @endforeach  
                                        <tr>
                                            <td style="border: 1px solid Transparent" colspan="2"></td>
                                            <td style="border: 1px solid Transparent" colspan="3">Total Expense = {{ $sum }}</td>
                                        </tr>                                    
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
                    <div class="row justify-content-center align-items-center">
                        <div class="float-left mr-4">
                            <img id='img'
                                src="{{ asset('/public/uploads/files/logo') }}/{{$generalSettings->image }}"
                                class=""
                                style="background-color:#900c3f; background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                        </div>
                        <div class="float-right mb-4">
                            <span class="font-weight-bold" style="font-size: 25px">{{$generalSettings->name}}</span>
                        </div>
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-title text-center">
                                    <h4>Income Informtion</h4>
                                </div>
                                <div class="table-responsive">
                                    <table id="table" class="table table-striped table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th>#Sl</th>
                                                <th>Student Id</th>
                                                <th>Student Name</th>
                                                <th>Phone No</th>
                                                <th>Batch Name</th>
                                                <th>Total Amount</th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @php $sum=0; @endphp
                                            @foreach($income as $key=>$incomes)
                                         
                                                <tr class="item">
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $incomes->student_id ?? ''}}</td>
                                                    <td>{{ $incomes->user->name ?? ''}}</td>
                                                    <td>{{ $incomes->user->phone ?? ''}}</td>
                                                    <td>{{ ($incomes->batch_count)>1 ? 'Multiple Batches ('.$incomes->batch->name.'...'.')' : $incomes->batch->name }}</td>
                                                    <td>{{ $incomes->paymented_amount }}</td>
                                                </tr>
                                                @php $sum = $sum + $incomes->paymented_amount; @endphp  
                                            @endforeach 
                                            <tr>
                                                <td style="border: 1px solid Transparent" colspan="5"></td>
                                                <td style="border: 1px solid Transparent" colspan="6">Total Income = {{ $sum }}</td>
                                            </tr>                                     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><br><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-title text-center">
                                    <h4>Expense Informtion</h4>
                                </div>
                                <div class="table-responsive">
                                    <table id="" class="table table-striped table-bordered text-center">
                                        <thead>
                                            <tr>
                                              <th>#Sl</th>
                                              <th>Expense Category</th>
                                              <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $sum=0; @endphp
                                            @foreach($expense as $key=>$expenses)
                                                <tr class="item">
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $expenses->expenseCategory->expense_title ?? ''}}</td>
                                                    <td>{{ $expenses->amount ?? ''}}</td>
                                                </tr>
                                                @php $sum = $sum + $expenses->amount; @endphp 
                                            @endforeach  
                                        <tr>
                                            <td style="border: 1px solid Transparent" colspan="2"></td>
                                            <td style="border: 1px solid Transparent" colspan="3">Total Expense = {{ $sum }}</td>
                                        </tr>                                    
                                    </tbody>
                                    </table>
                                    {{-- <td colspan="5"><strong>Total</strong></td> --}}
                                </div>
                            </div>
                        </div>
                    </div><br>
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
    {!! Html::script('/assets/plugins/bootstrap-toggle/js/bootstrap4-toggle.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('/assets/plugins/moment/moment.js') !!}
    {!! Html::script('/assets/js/printThis.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/data-table.js') !!}
    {!! Html::script('public/assets/js/toastDemo.js') !!}
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
