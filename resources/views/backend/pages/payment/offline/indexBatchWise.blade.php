@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('/assets/plugins/bootstrap-toggle/css/bootstrap-toggle.min.css') !!}
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
                                <li class="breadcrumb-item"><a>Collect Fees (Batch Wise)</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Collect Fees (Batch Wise) List</span></li>
                            </ol>
                            <a id='btn' class="btn btn-sm btn-info button-custom">Print
                            </a>
                        </nav>
                    </div>
                </div>
                <input type="hidden" name="batch_id" value="{{ $batch_id }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table text-center">
                                    <thead>
                                    <tr>
                                        <th>#SL</th>
                                        {{-- <th>Roll No.</th> --}}
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Students Phone No</th>
                                        <th>Batch Name</th>
                                        @permission('batchwise_collect_fees')
                                            <th>Actions</th>
                                        @endpermission
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $key=>$student)
                                        <tr class="item">
                                            <td>{{ ++$key }}</td>
                                            {{-- <td>{{ $student->roll_no }}</td> --}}
                                            <td style="display: none">{{ $student->user_id }}</td>
                                            <td>{{ $student->student_id }}</td>
                                            <td>{{ $student->user->name }}</td>
                                            <td>{{ $student->user->phone }}</td>
                                            <td>{{ $student->batch->name }}</td>
                                            @permission('batchwise_collect_fees')
                                                <td style="width: 10%"> 
                                                {!! Form::open(['id'=>'','enctype'=>'multipart/form-data','url' => route('admin.collectFees.indexIndividual',[$student->user_id,$batch_id])]) !!}
                                                    {!! Form::submit('Collect Fees',['class'=>'btn btn-danger btn-xs']) !!} 
                                                {!! Form::close() !!}
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
                <div class="printDiv" style="visibility: hidden; display:inline;">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12">                              
                            <div class="table-responsive table table-bordered print-container p-3" id="div-id-name"><br>
                                <div class="row justify-content-center align-items-center">
                                    <div class="float-left mr-3">
                                        <img id='img' src="{{ asset('/public/uploads') }}/{{$generalSettings->image }}" class="rounded-circle" style="width:150px; height:150px; margin-left:25px; margin-bottom: 10px">
                                    </div>
                                    <div class="float-right mb-5">
                                          <span class="font-weight-bold" style="font-size: 25px">{{$generalSettings->name}}</span>
                                          <br>
                                          <span class="font-weight-bold" style="font-size: 25px">Batch: {{$student->batch->name}}</span>
                                    </div>
                                </div>  
                                <h3  style="text-align:center">Student List</h3>
                                <br>
                                <table id="order-listing" class="table">
                                  <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Students Phone No</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($students as $key=>$student)
                                        <tr class="item">
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $student->user->name }}</td>
                                            <td>{{ $student->short_name }}</td>
                                            <td>{{ $student->user->phone }}</td>
                                        </tr>
                                      @endforeach
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
            </div>
        </div>
    </div>
{{-- @include('backend.pages.student.modal.student-view')
@include('backend.pages.student.modal.student-delete') --}}
@endsection

@push('plugin-scripts')
    {{-- {!! Html::script('/assets/plugins/datatables.net/jquery.dataTables.min.js') !!} --}}
    {{-- {!! Html::script('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!} --}}
    {!! Html::script('/assets/plugins/bootstrap-toggle/js/bootstrap-toggle.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('/assets/js/printThis.js') !!}
@endpush

@push('custom-scripts')
    {{-- {!! Html::script('/assets/js/data-table.js') !!} --}}
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
                    url: 'changeStatusPublish',
                    data: {'status': status, 'category_id': category_id},
                    success: function(data){
                        showSuccessToast('Status changed successfully');
                        console.log(data.success)
                    }
                });
            })
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
