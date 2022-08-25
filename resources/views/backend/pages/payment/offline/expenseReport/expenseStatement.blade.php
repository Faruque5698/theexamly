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
                                <li class="breadcrumb-item"><a>Report</a></li>
                                <li class="breadcrumb-item"><a>Income Report</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Income Report List</span></li>
                            </ol>

                            <a id='btn' class="btn btn-sm btn-success button-custom" style="color:white"><i class="fa fa-print"> Print</i></a>

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
                                        <th>SL</th>
                                        <th>Expense Type</th>
                                        <th>Total Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($paymnets as $key=>$payment)
                                        <tr class="item">
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $payment->expenseCategory->expense_title }}</td>
                                            <td>{{ $payment->total_ammount }}</td>
                                        </tr>
                                    @endforeach
                                    <table class="ml-auto" style="margin-right: 160px"><tr><td>Total = {{ $totalAll->totalAll }}</td></tr></table>                                          
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
                            <img id='img' src="{{ asset('/public/uploads/files/logo') }}/{{$generalSettings->image }}" class="" style="background-color:#75414b; background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                        </div>
                        <div class="float-right mb-4">
                            <span class="font-weight-bold" style="font-size: 25px">{{$generalSettings->name}}</span>
                            <br>
                            <span class="font-weight-bold" style="font-size: 25px">Expense Type: {{$expense_category_name ?? ""}}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="order-listing" class="table text-center">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Expense Type</th>
                                                <th>Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($paymnets as $key=>$payment)
                                                <tr class="item">
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $payment->expenseCategory->expense_title }}</td>
                                                    <td>{{ $payment->total_ammount }}</td>
                                                </tr>
                                            @endforeach
                                            <td colspan="2"><strong>Total</strong></td>
                                            <td style="border: 1px solid Transparent" colspan="3">{{ $totalAll->totalAll }}</td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><br>
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
