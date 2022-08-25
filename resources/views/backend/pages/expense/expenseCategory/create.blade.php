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
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.courseCategory.index') }}">Expense Category</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $expenseCategory ? 'Update':'Create' }}</span>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">


                    @if($expenseCategory !== null)

                        {!! Form::model($expenseCategory, ['id'=>'expenseCategoryForm','method'=>'PUT','route' => ['admin.expenseCategory.update', $expenseCategory]]) !!}
                    @else
                        {!! Form::open(['id'=>'expenseCategoryForm', 'url' => route('admin.expenseCategory.store')]) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">

                                {!! Form::label('expense_title','Expense Category Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('expense_title',old('expense_title'),['class'=>'form-control','placeholder'=>'Expense Category Name','required','minlength'=>'3']) !!}

                            </div>

                            <div class="form-group">

                                {!! Form::label('expense_description','Expense Description') !!}
                                {!!  Form::textarea('expense_description',old('expense_description'),['class'=>'form-control','placeholder'=>'Description...']) !!}

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit($expenseCategory!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.expenseCategory.index') }}">Cancel</a>
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
    {!! Html::script('public/assets/js/validation/expenseCategoryForm-validation.js') !!}
@endpush
