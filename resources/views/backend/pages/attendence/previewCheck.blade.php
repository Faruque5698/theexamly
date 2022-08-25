@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
@endpush

@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Attendence</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Check Attendence</span></li>
                        </ol>
                      </nav>
                </div>
            </div>
            <br>
            <div class="card-body">
                <div class="text-center">
                    <div class="form-body">
                        {!! Form::open(['id'=>'previewCheckForm','class'=>'ml-5' ,'enctype'=>'multipart/form-data','url' => route('admin.attendance.preview')]) !!}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Batch Name <span class="requiredStar" style="color: red"> * </span></label>
                             <div class="col-sm-5">
                                <select class="form-control" name="batch_name" id="batch_name">
                                    <option value="">Select Batch...</option>
                                    @foreach($batch as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Attendance Date <span class="requiredStar" style="color: red"> * </span></label>
                             <div class="col-sm-5">
                                 <input id="attendance_date" class="form-control" type="date" name="attendance_date"
                                 value="<?php echo date("Y-m-d"); ?>">
                             </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="text-center">
                                    {!! Form::submit('Check',['class'=>'btn btn-primary mr-2']) !!}
                                    {{-- <a class="btn btn-primary" href="{{ route('admin.batchSchedule.create') }}">Enter</a> --}}
                                    <a class="btn btn-danger" href="{{ route('admin.attendance.index') }}">Cancel</a>
                                </div>
                            </div>
                        </div>
                     {{-- {!! Form::close() !!} --}}
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
   {!! Html::script('/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/data-table.js') !!}
    {!! Html::script('/assets/js/toastDemo.js') !!}
    {!! Html::script('/assets/js/validation/previewCheckForm-validation.js') !!}

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
@endpush



