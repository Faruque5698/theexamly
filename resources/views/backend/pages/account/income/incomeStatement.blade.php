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
                                <li class="breadcrumb-item"><a>Income</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Income List</span></li>
                            </ol>

                            <a id='btn' class="btn btn-sm btn-success button-custom" style="color:white"><i class="fa fa-print"> Print</i>
                            </a>

                        </nav>
                    </div>
                </div>
                @php $sum=0; @endphp
                @foreach($paymnets as $key=>$payment)
                @php $sum = $sum + $payment->total_ammount; @endphp
                @endforeach
                <span class="mt-1 ml-3">Total Income = {{ $sum }}</span>    
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table text-center">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Student Id</th>
                                        <th>Student Name</th>
                                        <th>Phone No</th>
                                        <th>Batch Name</th>
                                        <th>Total Amount</th>
                                        @permission('income_details_btn')
                                            <th>Actions</th>
                                        @endpermission    
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $sum=0; @endphp
                                    @foreach($paymnets as $key=>$payment)
                                        <tr class="item">
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $payment->student_id }}</td>
                                            <td>{{ $payment->user->name }}</td>
                                            <td>{{ $payment->user->phone }}</td>
                                            <td>{{ ($payment->batch_count)>1 ? 'Multiple Batches ('.$payment->batch->name.'...'.')' : $payment->batch->name }}</td>
                                            <td>{{ $payment->total_ammount }}</td>
                                            {{-- @php $sum = $sum + $payment->total_ammount; @endphp --}}
                                            @permission('income_details_btn')
                                                <td style="width: 10%">
                                                    <a href="{{ route('admin.collectFees.indexIndividual',[$id=$payment->user_id,$id2=$payment->batch_id]) }}" class="btn btn-warning" title="Details" role="button"><i class="fa fa-info-circle"></i></a>
                                                </td>
                                            @endpermission    
                                        </tr>
                                    @endforeach
                                    {{-- <table class="ml-auto" style="margin-right: 160px"><tr><td>Total = {{ $sum }}</td></tr></table>   --}}                                        
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
                                style="background-color:#75414b; background-blend-mode: multiply;-webkit-print-color-adjust: exact; padding:5px;">
                        </div>
                        <div class="float-right mb-4">
                            <span class="font-weight-bold" style="font-size: 25px">{{$generalSettings->name}}</span>
                            <br>
                            <span class="font-weight-bold" style="font-size: 25px">Batch: {{ $batch_name ?? '' }}</span>
                        </div>
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="order-listing" class="table text-center">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Student Id</th>
                                                <th>Student Name</th>
                                                <th>Phone No</th>
                                                <th>Batch Name</th>
                                                <th>Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($paymnets as $key=>$payment)
                                                <tr class="item">
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $payment->student_id }}</td>
                                                    <td>{{ $payment->user->name }}</td>
                                                    <td>{{ $payment->user->phone }}</td>
                                                    <td>{{ $payment->batch->name }}</td>
                                                    <td>{{ $payment->total_ammount }}</td>
                                                </tr>
                                                @php $sum = $sum + $payment->total_ammount; @endphp
                                            @endforeach
                                            {{-- <table class="ml-auto" style=""><tr><td style="width: 175px">Total = {{ $totalAll->totalAll }}</td></tr></table> --}}
                                            <td colspan="5"><strong>Total</strong></td>
                                            <td style="border: 1px solid Transparent">{{ $sum }}</td>
                                        </tbody>
                                    </table>
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
