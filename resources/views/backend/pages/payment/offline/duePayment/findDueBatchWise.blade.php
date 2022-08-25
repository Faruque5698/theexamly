@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('/assets/plugins/select2/css/select2.min.css') !!}
  <style type="text/css">
    *{
      outline: 0 !important;
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
      display: block;
      padding-left: 8px;
      padding-right: unset;
      overflow: unset;
      text-overflow: unset;
      white-space: nowrap;
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
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a></li>
                                <li class="breadcrumb-item"><a>Payment</a></li>
                                <li class="breadcrumb-item"><a>Due Payment</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Due Payment Search (Batch Wise)</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">

                    {!! Form::open(['id'=>'findBatchWiseForm','enctype'=>'multipart/form-data','url' => route('admin.payment.collectFees.index')]) !!} 

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name','Batch Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                <select class="form-control" name="batch_id" id="batch_id" required >
                                  <option value="">Select One...</option>
                                  <option value="0">All</option>
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
   <!-- dropdown.blade.php -->
    <script type="text/javascript">
    jQuery(document).ready(function ()
    {
      jQuery('select[name="student_id"]').on('click',function(){
        var studentID = jQuery(this).val();

          if(studentID)
            {
              jQuery.ajax({
                  url : 'getstudent/' +studentID,
                  type : "GET",
                  dataType : "json",
                  success:function(data)
                  {
                  if(data.length==0){
                    jQuery('select[name="student_name"]').empty();
                    $("#student_name").select2({
                      placeholder: "No available data"
                      });
                  }
                    else{
                    console.log(data);
                    // $("#student_name").select2({
                    //   placeholder: "Select One.."
                    //   });
                    jQuery('select[name="student_name"]').empty();
                    $('#array').html('');

                      $('select[name="student_name"]');
                      jQuery.each(data, function(key,value){
                        $('#array').append('<input hidden disabled id="array"type="text" name="user_id[]" value="'+key+'">');

                          $('select[name="student_name"]').append('<option value="'+ key +'">'+ value +'</option>');
                      });
                      }
                        
                    }
                });
              }
            else
            {
              $('select[name="student_name"]').empty();
            }
        });
      });
    </script>
    <script type="text/javascript">
      jQuery(document).ready(function()
      {
        jQuery('select[name="student_id"]').on('click',function(){
        var studentID = jQuery(this).val();

          if(studentID)
            {
              jQuery.ajax({
                  url : 'getstudentphone/' +studentID,
                  type : "GET",
                  dataType : "json",
                  success:function(data)
                  {
                  if(data.length==0){
                    jQuery('select[name="student_phone"]').empty();
                    $("#student_phone").select2({
                      placeholder: "No available data"
                      });
                  }
                    else{
                    console.log(data);
                    // $("#student_name").select2({
                    //   placeholder: "Select One.."
                    //   });
                    jQuery('select[name="student_phone"]').empty();
                    $('#array').html('');

                      $('select[name="student_phone"]');
                      jQuery.each(data, function(key,value){
                        $('#array').append('<input hidden disabled id="array"type="text" name="user_id[]" value="'+key+'">');

                          $('select[name="student_phone"]').append('<option value="'+ key +'">'+ value +'</option>');
                      });
                      }
                        
                    }
                });
              }
            else
            {
              $('select[name="student_phone"]').empty();
            }
        });
      });
    </script>
@endpush
