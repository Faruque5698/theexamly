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
                                <li class="breadcrumb-item"><a>Payment</a></li>
                                <li class="breadcrumb-item"><a>Due Payment</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Due Payment List</span></li>
                            </ol>

                            <a id='btn' class="btn btn-sm btn-info button-custom">Print
                            </a>

                        </nav>
                    </div>
                </div>
                <input type="hidden" name="batch_id" value="{{ $batch_id }}">
                <label style="text-align: center">Batch Name: {{ $batch_name }}</label>
                Total Due Amount = {{ $sum }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table text-center">
                                  <thead>
                                    <tr>
                                        <th>SL</th>
                                        {{-- <th>Batch Name</th> --}}
                                        <th>Student Id</th>
                                        <th>Student Name</th>
                                        <th>Phone No</th>
                                        <th>Course Fee</th>
                                        <th>Due Amount</th>
                                        @permission('make_due_payment')
                                          <th>Actions</th>  
                                        @endpermission
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($dues as $key=>$due)
                                        <tr class="item">
                                            <td>{{ ++$key }}</td>
                                            {{-- <td>{{ $due->batch->name }}</td> --}}
                                            <td>{{ $due->student_id }}</td>
                                            <td>{{ $due->user->name ?? '-' }}</td>
                                            <td>{{ $due->user->phone ?? '-' }}</td>
                                            <td>{{ $due->course_fee }}</td>
                                            <td>{{ $due->due_amount }}</td>
                                            @permission('make_due_payment')
                                              <td style="width: 10%">
                                                @if($batch_id==0)
                                                    <a href="{{ route('admin.collectFees.creates',[$id=$due->user_id , $id2=$due->batch_id]) }}" class=" btn-success btn-sm ml-auto" style="font-size: 15px;margin-right: 25px;">Make Payment
                                                      <i class="fa fa-plus"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('admin.collectFees.creates',[$id=$due->user_id , $id2=$batch_id]) }}" class=" btn-success btn-sm ml-auto" style="font-size: 15px;margin-right: 25px;">Make Payment
                                                      <i class="fa fa-plus"></i>
                                                    </a>
                                                @endif    
                                              </td>
                                            @endpermission
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
                    <h3  style="text-align:center">Due List</h3>
                    <br>
                    <table id="order-listing" class="table text-center">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Student Id</th>
                          <th>Student Name</th>
                          <th>Phone No</th>
                          <th>Due Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($dues as $key=>$due)
                          <tr class="item">
                            <td>{{ ++$key }}</td>
                            <td>{{ $due->student_id ?? '-' }}</td>
                            <td>{{ $due->user->name ?? '-' }}</td>
                            <td>{{ $due->user->phone ?? '-' }}</td>
                            <td>{{ $due->due_amount ?? '-' }}</td>
                          </tr>
                        @endforeach
                        <td colspan="4"><strong>Total Due</strong></td>
                        <td style="border: 1px solid Transparent">{{ $sum }}</td>
                      </tbody>
                    </table>
                    <br>
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
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
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
