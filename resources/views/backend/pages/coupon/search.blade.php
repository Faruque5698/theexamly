@extends('backend.layout.master')

@push('plugin-styles')
{!! Html::style('/assets/plugins/icheck/skins/all.css') !!}
{!! Html::style('/assets/plugins/select2/css/select2.min.css') !!}
{!! Html::style('/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
{!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}

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
                            <li class="breadcrumb-item active" aria-current="page">
                                <span>Search Coupon</span></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card-body">



                {!! Form::open(['id'=>'couponForm', 'method'=>'GET', 'url' => route('admin.coupon.searchResult')]) !!}

                {{-- @csrf --}}
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">

                            {!! Form::label('prefix','Prefix') !!}

                              <input class="form-control" type="text" name='filter[prefix]'>
                        </div>


                    </div>
                </div>

                  <div class="form-group">

                  	{!! Form::label('amount','Discount Ammount') !!}
                    <input class="form-control" type="text" name='filter[discount_amount]'>

                  </div>


                    <div class="form-group">

                        {!! Form::label('status','Status') !!}
                        <select class="form-control" name="filter[use_status]">
                            <option value="">Select an option</option>
                            <option value="1">Coupon Used</option>
                            <option value="0">Coupon Unused</option>
                        </select>
                    </div>

                    <div class="form-group">

                        {!! Form::label('expire_date','Expire Date') !!}
                        <input type="date" name='filter[starts_before]' id="expire_date" class="form-control col-md-3">
                    </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::submit('Search',['class'=>'btn btn-primary mr-2']) !!}
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

{!! Html::script('/assets/plugins/icheck/icheck.min.js') !!}
{!! Html::script('/assets/plugins/select2/js/select2.min.js') !!}
{!! Html::script('/assets/plugins/typeaheadjs/typeahead.bundle.min.js') !!}
{!! Html::script('/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
{!! Html::script('/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}

@endpush

@push('custom-scripts')
{!! Html::script('/assets/js/file-upload.js') !!}
{!! Html::script('/assets/js/iCheck.js') !!}
{!! Html::script('/assets/js/select2.js') !!}
{!! Html::script('/assets/js/typeahead.js') !!}
{{-- {!! Html::script('/assets/js/validation/coupon-validation.js') !!} --}}
@endpush
