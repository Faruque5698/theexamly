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
                                <li class="breadcrumb-item"><a >Account</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $expense ? 'Update':'Create' }}</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">


                    @if($expense !== null)

                        {!! Form::model($expense, ['id'=>'expenseForm','method'=>'PUT','route' => ['admin.expense.update', $expense]]) !!}
                    @else
                        {!! Form::open(['id'=>'expenseForm', 'url' => route('admin.expense.store')]) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">

                                {!! Form::label('expenseCategory_id','Expense Type') !!} <span class="requiredStar" style="color: red"> * </span>
                                <select class="form-control" name="expenseCategory_id" id="expenseCategory_id" required>
                                    <option value="">Select One...</option>
                                    @foreach($expenseCategories as $key=> $value)
                                        <option value="{{$key}}" @if($expense !== null && $expense->expenseCategory_id==$key) selected @endif
                                            >{{$value}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                {!! Form::label('amount','Expense Amount') !!}<span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('amount',old('amount'),['class'=>'form-control','placeholder'=>'Expense Amount','required']) !!}

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit($expense!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.expense.index') }}">Cancel</a>
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
    {!! Html::script('public/assets/plugins/icheck/icheck.min.js') !!}
    {!! Html::script('public/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/assets/plugins/typeaheadjs/typeahead.bundle.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/file-upload.js') !!}
    {!! Html::script('public/assets/js/iCheck.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/typeahead.js') !!}
    {!! Html::script('public/assets/js/validation/expenseForm-validation.js') !!}
@endpush
