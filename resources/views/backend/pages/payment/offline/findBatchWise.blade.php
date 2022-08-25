@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('/assets/plugins/select2/css/select2.min.css') !!}
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="template-demo">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-custom">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a></li>
                                <li class="breadcrumb-item"><a>Payment</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>Collect Fees (Batch Wise)</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">

                  {!! Form::open(['id'=>'findBatchWiseForm','enctype'=>'multipart/form-data','url' => route('admin.collectFees.indexs')]) !!} 

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name','Batch Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                <select class="form-control" name="batch_id" id="batch_id" required >
                                  <option value="">Select One...</option>
                                  @foreach($batch as $key=> $value)
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
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/file-upload.js') !!}
    {!! Html::script('/assets/js/select2.js') !!}
    {!! Html::script('/assets/js/validation/findBatchWiseForm-validation.js') !!}

      <script type="text/javascript">      
        $(document).ready(function() {
            $('#batch_id').select2();
        });
    </script>
@endpush
