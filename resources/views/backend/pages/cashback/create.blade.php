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
                                <li class="breadcrumb-item"><a>Cashback</a></li>
                                
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $cashback ? 'Update':'Create' }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">

                    @if($cashback!== null)
                        {!! Form::model($cashback, ['method'=>'PUT','route' => ['admin.dashboard.cashback-way.update', $cashback->id ?? ''],'id'=>'cashbackForm','class'=>'cmxform','enctype'=>"multipart/form-data"]) !!}
                      @else
                        {!! Form::open(['route' => 'admin.dashboard.cashback-way.store', 'method' => 'post','id'=>'cashbackForm','enctype'=>"multipart/form-data"]) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                {!! Form::label('description','Write your cashback media details') !!}<span class="requiredStar" style="color: red"> * </span>
                                @if ($cashback)
                                    {!! Form::textarea('cashback_way', $cashback->cashback_way ,array('required', 'class'=>'form-control', 'id'=>'summary-ckeditor', 'placeholder'=>'Ex: 01********* - Bkash')) !!} 
                                @else
                                    {!! Form::textarea('cashback_way',null,array('required', 'class'=>'form-control', 'id'=>'summary-ckeditor', 'placeholder'=>'Blog Description')) !!}
                                @endif
                                {{-- <span>Ex: 01********* - Bkash</span> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit($cashback!==null ? 'Update':'Submit',['class'=>'btn btn-primary mr-2']) !!}
                                {{-- <a class="btn btn-danger" href="{{ route('admin.dashboard.cashback.index') }}">Cancel</a> --}}
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
    {!! Html::script('public/assets/js/img-preview.js') !!}
    {!! Html::script('public/assets/plugins/icheck/icheck.min.js') !!}
    {!! Html::script('public/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/assets/plugins/typeaheadjs/typeahead.bundle.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-validation/additional-methods.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/file-upload.js') !!}
    {!! Html::script('public/assets/js/iCheck.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/typeahead.js') !!}
    {!! Html::script('public/assets/js/validation/noticeForm-validation.js') !!}
    <script src="{{ asset('public/assets/plugins/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>

<script>
    $(document).ready(function() {
        $('#blog_file').change(function(){
            console.log("here");
            $('#uploaded-file').hide();
        });
    })
</script>
@endpush
