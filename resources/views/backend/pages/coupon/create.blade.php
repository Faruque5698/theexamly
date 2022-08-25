@extends('backend.layout.master')

@push('plugin-styles')
{!! Html::style('public/assets/plugins/icheck/skins/all.css') !!}
{!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
{!! Html::style('public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
{!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}

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
                            <li class="breadcrumb-item"><a>Coupon</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.coupon.index') }}">Coupon List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <span>Create Coupon</span></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card-body">

                  @if (count($errors) > 0)
                       <div class="alert alert-danger">
                           <ul>
                               @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                       </div>
                   @endif

                {!! Form::open(['id'=>'couponForm', 'method'=>'post', 'enctype'=>'multipart/form-data', 'url' => route('admin.coupon.store')]) !!}
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">

                            {!! Form::label('coupon_number','Number of Coupon') !!} <span class="requiredStar"
                                style="color: red"> * </span>
                            {!! Form::number('coupon_number',null,['class'=>'form-control','placeholder'=>'Coupon Amount']) !!}

                        </div>


                        <div class="form-group">

                            {!! Form::label('prefix','Prefix') !!} <span class="requiredStar"
                             style="color: red"> * </span>
                            {!! Form::select('prefix',$course_category,null,['class'=>'form-control','placeholder'=>'Coupon Prefix']) !!}
                        </div>

                        <div class="form-group">

                            {!! Form::label('ammount','Amount') !!} <span class="requiredStar"
                             style="color: red"> * </span>
                            {!! Form::number('ammount',null,['class'=>'form-control','placeholder'=>'Discount Amount']) !!}
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('name','Start Date') !!} <span class="requiredStar"
                                    style="color: red"> * </span>
                                    <input class="form-control" type="date" name="start_date" id="start_date">
                                </div>

                                <div class="form-group">
                                    {!! Form::label('name','End Date') !!} <span class="requiredStar"
                                    style="color: red"> * </span>
                                    <input class="form-control" type="date" name="end_date" id="end_date">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::submit('Save',['class'=>'btn btn-primary mr-2']) !!}
                            <a class="btn btn-danger" href="{{ route('admin.coupon.index') }}">Cancel</a>
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
{!! Html::script('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}

@endpush

@push('custom-scripts')
{!! Html::script('public/assets/js/file-upload.js') !!}
{!! Html::script('public/assets/js/iCheck.js') !!}
{!! Html::script('public/assets/js/select2.js') !!}
{!! Html::script('public/assets/js/typeahead.js') !!}
{!! Html::script('public/assets/js/validation/coupon-validation.js') !!}
@endpush
