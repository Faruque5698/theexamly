@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('public/css/loader.css') !!}
    <link rel="stylesheet" media="print" href="{{ asset('css/print.css') }}">
    <style>
        .first_name {
            position: relative;
            margin-bottom: 3px;
        }

        .first_name::before {
            position: absolute;
            content:"";
            height:5px;
            width:222px;
            background:#3377ff;
            bottom:0;
            left:43px;
        }

        .second_name {
            position: relative;
            margin-bottom: 3px;
        }

        .second_name::before {
            position: absolute;
            content:"";
            background:#3377ff;
            bottom:-20px;
            height:10px;
            width:350px;
            left:-22px;
        }
    </style>
@endpush

@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a></li>
                            <li class="breadcrumb-item"><a href="#">ID Card</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>ID Card Generation</span></li>
                        </ol>
                      </nav>
                </div>
                <div class="col-md-12 text-right" style="margin-top: 8px; margin-bottom: 8px">
                    <button id='print-btn' class="btn btn-sm btn-success float right"><i class="fa fa-print" aria-hidden="true"style="width: 44px;font-size: 14px;"> Print</i></button>
                </div>
            </div>
            <div class="card-body px-5">
                <div class="container" id="id-card">
                    <div class="row justify-content-center">
                        @foreach ($students as $student)
                            <div class="col-5 mb-4">
                                <div class="card">
                                    <div class="card-body" style="background-color:#e60000;background-blend-mode: multiply;-webkit-print-color-adjust: exact; color-adjust: exact;">
                                        <div class="text-center">
                                            <p style="color: #eee; margin:0; padding:0; font-size:12px;">{{$generalSettings->motto}}</p>
                                            <h1 class="font-bold first_name" style="color: yellow; font-size:45px;">{{strtoupper($firstNameInstitution)}}</h1>
                                            <h5 class="second_name" style="color:#eee; padding-top:0; font-size:20px;">{{$secondNameInstitution}}</h5> 
                                        </div>
                                        <div class="text-center mt-4">
                                            <img src="{{url('uploads/user_images').'/'.$student->user->user_image}}" alt="" style="height:120px;width:120px">
                                        </div>
                                        <div class="text-center mt-2">
                                            <p class="text-left" style="background-color:#eee; background-blend-mode: multiply;-webkit-print-color-adjust: exact; color-adjust: exact; padding:5px; width:100%; margin-bottom:8px"> Name: {{$student->user->name}}</p>
                                            <p class="text-left" style="background-color:#eee; background-blend-mode: multiply;-webkit-print-color-adjust: exact; color-adjust: exact; padding:5px; width:100%; margin-bottom:8px">ID No: {{$student->student_id}}</p>
                                            <p class="text-left" style="background-color:#eee; background-blend-mode: multiply;-webkit-print-color-adjust: exact; color-adjust: exact; padding:5px; width:100%; margin-bottom:8px">Batch Time:
                                            @if($student->batch->day_time->isNotEmpty())
                                                {{ date('H:i a', strtotime($student->batch->day_time->first()->start_time)).' - '.date('H:i a', strtotime($student->batch->day_time->first()->end_time))}}
                                            @endif
                                             </p>
                                            <p class="text-left" style="background-color:#eee; background-blend-mode: multiply;-webkit-print-color-adjust: exact; color-adjust: exact; padding:5px; width:100%; margin-bottom:8px">Mobile: {{$student->user->phone}}</p>
                                            <p class="text-left" style="background-color:#eee; background-blend-mode: multiply;-webkit-print-color-adjust: exact; color-adjust: exact; padding:5px; width:100%; margin-bottom:8px">Institute: {{$student->student->school_name}}</p>
                                        </div>
                                        <div class="row justify-content-end">
                                            {{-- <div class="col-auto float-left" style="font-size:15px">
                                                <br>
                                                Card Holder
                                            </div> --}}
                                            <div class="col-auto float-right text-white" style="font-size:15px">
                                                <br>
                                                <div class="mt-1"></div>
                                                Signature
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            @php $pageBreak = '<div class="col-12 mb-4 d-none d-print-block"></div>' @endphp
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        {!! $pageBreak !!}
                        @endforeach
                    </div>
                </div>
            </div>          
        </div>
    </div>

@endsection

@push('plugin-scripts')
   {!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
   {!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
   {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
   {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
   {!! Html::script('public/assets/js/printThis.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/data-table.js') !!}
    {!! Html::script('public/assets/js/toastDemo.js') !!}
    {!! Html::script('public/assets/js/validation/batchScheduleForm-validation.js') !!}

    <script>
        $('#print-btn').click( function(){
            $('#id-card').printThis();
        })
    </script>
@endpush



