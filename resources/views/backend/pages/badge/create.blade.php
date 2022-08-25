@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
    <style>
        .thumb{
            margin: 0px 0px 10px 25px;
            width: 100px;
            height:100px
        } 
    </style>
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
                                <li class="breadcrumb-item"><a>Frontend CMS</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('admin.notice.index') }}">Badges</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $badge ? 'Update':'Create' }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">

                    @if($badge!== null)
                        {!! Form::model($badge, ['method'=>'PUT','route' => ['admin.badges.update', $badge->id ?? ''],'id'=>'testimonialForm','class'=>'cmxform','enctype'=>"multipart/form-data"]) !!}
                    @else
                        {!! Form::open(['route' => 'admin.badges.store', 'method' => 'post','id'=>'testimonialForm','enctype'=>"multipart/form-data"]) !!}
                    @endif
                    
                    @if($badge)
                        <h5>Badge {{$badge->id}}</h5>
                    @endif
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                {!! Form::label('title','Badge Top Text') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::text('top_text',old('top_text'),['class'=>'form-control']) !!}
                                @error('top_text') {{$message}} @enderror
                            </div>

                            <div class="form-group">
                                {!! Form::label('title','Badge Bottom Text') !!}
                                {!!  Form::text('bottom_text',old('bottom_text'),['class'=>'form-control']) !!}
                                @error('bottom_text') {{$message}} @enderror
                            </div>
                        </div>
                            
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit($badge!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.badges.index') }}">Cancel</a>
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
    {!! Html::script('public/assets/plugins/jquery-validation/additional-methods.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/iCheck.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/typeahead.js') !!}
    {!! Html::script('public/assets/js/validation/badgeForm-validation.js') !!}
@endpush
