@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
@endpush

@section('content')
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-header">
                    <div class="template-demo">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-custom">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a>Teachers</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>Paid Teacher Select</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">

                    {!! Form::open(['id'=>'','method'=>'get', 'url' => route('admin.teacher.paid-teacher-index'), 'enctype'=>'multipart/form-data']) !!}
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name','Select Teacher') !!} <span class="requiredStar" style="color: red"> * </span>
                                <select class="form-control" name="teacher_id" id="teacher_id">
                                  <option value="">All Teacher List</option>
                                  @foreach($teacherlist as $key=> $value)
                                  <option value="{{$key}}" >{{$value}}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit('Show',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ url()->previous() }}">Back</a>
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    {!! Html::script('/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/file-upload.js') !!}
    {!! Html::script('/assets/js/select2.js') !!}
    {{-- {!! Html::script('/assets/js/validation/findBatchWiseForm-validation.js') !!} --}}
    {!! Html::script('/assets/js/toastDemo.js') !!}
    <script type="text/javascript">
        $(document).ready(function () {
            @if (session('success'))
            showSuccessToast('{{ session("success") }}');
            @elseif(session('warning'))
            showWarningToast('{{ session("warning") }}');
            @endif
        });
    </script>
      <script type="text/javascript">
        $(document).ready(function() {
            $('#teacher_id').select2();
        });
    </script>




@endpush
