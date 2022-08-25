@extends('backend.layout.master')

@push('plugin-styles')
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
                                        href="{{ route('admin.privacyPolicy.index') }}">Privacy Policy</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $privacyPolicy ? 'Update':'Create' }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">

                    @if($privacyPolicy!== null)
                        {!! Form::model($privacyPolicy, ['method'=>'PUT','route' => ['admin.privacyPolicy.update', $privacyPolicy->id ?? ''],'id'=>'privacyPolicyForm','class'=>'cmxform','enctype'=>"multipart/form-data"]) !!}
                      @else
                        {!! Form::open(['route' => 'admin.privacyPolicy.store', 'method' => 'post','id'=>'privacyPolicyForm','enctype'=>"multipart/form-data"]) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                {!! Form::label('description','Description') !!}<span class="requiredStar" style="color: red"> * </span>
                                @if ($privacyPolicy)
                                    {!! Form::textarea('description', $privacyPolicy->description ,array('class'=>'form-control', 'id'=>'summary-ckeditor', 'placeholder'=>'Privacy Policy Description')) !!} 
                                @else
                                    {!! Form::textarea('description',null,array('required', 'class'=>'form-control', 'id'=>'summary-ckeditor', 'placeholder'=>'Privacy Policy Description')) !!}
                                @endif
                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit($privacyPolicy!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.privacyPolicy.index') }}">Cancel</a>
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
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-validation/additional-methods.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/file-upload.js') !!}
    {!! Html::script('public/assets/js/validation/privacyPolicyForm-validation.js') !!}
    <script src="{{ asset('public/assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>
@endpush
