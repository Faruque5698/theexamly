@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
@endpush

@section('content')
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-header">
                    <div class="template-demo">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-custom">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a>Account</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Income</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">

                    {!! Form::open(['id'=>'findBatchWiseForm','url' => route('admin.account.incomeView.show'), 'enctype'=>'multipart/form-data']) !!}

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('name','Start Date') !!} <span class="requiredStar" style="color: red"> * </span>
                                <input type="date" class="form-control" name="start_date" id="start_date" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('name','End Date') !!} <span class="requiredStar" style="color: red"> * </span>
                                <input type="date" class="form-control" name="end_date" id="end_date" required>
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
    {!! Html::script('public/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/file-upload.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {{-- {!! Html::script('public/assets/js/validation/findBatchWiseForm-validation.js') !!} --}}

      <script type="text/javascript">
        $(document).ready(function() {
            $('#batch_id').select2();
        });
    </script>




@endpush
