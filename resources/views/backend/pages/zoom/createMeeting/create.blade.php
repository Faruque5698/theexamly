@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/assets/plugins/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css') !!}
    {!! Html::style('public/css/loader.css') !!}
@endpush

@section('content')  
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Communication</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Zoom Meeting Create</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row grid-margin">
              <div class="ajax_loader">
                <img src="{{ url('assets/images/loading.gif') }}" class="img-responsive" />
              </div>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Zoom Meeting Information</h4>
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div><br />
                    @endif
                    <form class="cmxform" id="zoomMeetingForm" method="post" action="{{ route('admin.communication.meetings') }}" enctype="multipart/form-data">
                        @csrf
                      <fieldset>
                        {{-- <div class="form-group">
                          <label for="user_name">User Name<span class="requiredStar" style="color: red"> * </span></label>
                          {!!  Form::select('user_name',$user,null,['class'=>'form-control','placeholder'=>'Select a user','required']) !!}
                        </div> --}}
                        <div class="form-group">
                          <label for="topic">Topic<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="topic" class="form-control" type="text" name="topic" style="width: 400px" required/>
                        </div>
                        <div class="form-group">
                          <label for="start_time">Start Time<span class="requiredStar" style="color: red"> * </span></label><br>
                          <input type="text" name="start_time" value="" id="datetimepicker" data-date-format="d-m-yyyy H:i:s" size="47" class="form_datetime" autocomplete="off">
                        </div>
                        <div class="form-group">
                            {!! Form::label('name','User Type') !!} <span class="requiredStar" style="color: red"> * </span>
                            {!!  Form::select('user_type',$user_type,null,['class'=>'form-control','placeholder'=>'Select a user type','required','style'=>"width: 400px"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name','Course Type') !!}
                            {!!  Form::select('course_name',$course,old('course_name'),['class'=>'form-control','placeholder'=>'Select a Course','style'=>"width: 400px"]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name','Batch Name') !!}
                            <select name="batch_name" class="form-control" style="width: 400px">
                                <option value="">Select a batch</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label for="agenda">Agenda</label> <span class="requiredStar" style="color: red"> * </span>
                          <textarea id="agenda" class="form-control" name="agenda" rows="4" style="width: 400px"/></textarea>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Create">
                        <a class="btn btn-danger" href="{{ route('admin.communication.zoomIndex') }}">Cancel</a>
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div> 
@endsection

@push('plugin-scripts')
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-validation/additional-methods.js') !!}
    {!! Html::script('public/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') !!}
    {!! Html::script('public/assets/plugins/icheck/icheck.min.js') !!}
    {!! Html::script('public/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/assets/plugins/typeaheadjs/typeahead.bundle.min.js') !!}
    {!! Html::script('public/assets/plugins/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js') !!}
    {!! Html::script('public/js/img-preview.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/validation/zoomMeetingForm-validation.js') !!}
    {!! Html::script('public/assets/js/bt-maxlength.js') !!}
    {!! Html::script('public/assets/js/file-upload.js') !!}
    {!! Html::script('public/assets/js/iCheck.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/typeahead.js') !!}
    <script type="text/javascript">
        $(document).ready(function () {
            @if (session('success'))
            showSuccessToast('{{ session("success") }}');
            @elseif(session('warning'))
            showWarningToast('{{ session("warning") }}');
            @endif
        });

        $('#datetimepicker').datetimepicker();

    </script>
        <!-- dropdown.blade.php -->
    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
            jQuery('select[name="course_name"]').on('change',setBatch);
            const course_name = $('select[name="course_name"]').val();
            if(course_name){
              jQuery.ajax({
                url : 'zoomMeetingCreate/batch/' +course_name,
                type : "GET",
                dataType : "json",
                beforeSend: function()
                {
                  $('.ajax_loader').css("visibility", "visible");
                },
                success:function(data)
                {
                  console.log(data);
                  jQuery('select[name="batch_name"]').empty();
                  const batch_name = "{{ old('batch_name') }}";
                  jQuery.each(data, function(key,value){
                      $('select[name="batch_name"]').append('<option value="'+ key +'"'+(batch_name == key ? 'selected' : '')+'>'+ value +'</option>');
                  });
                },
                complete: function()
                {
                  $('.ajax_loader').css("visibility", "hidden");
                },
              });
          }
        });
    </script>
    <script>
      function setBatch(){
        var countryID = jQuery(this).val();
          if(countryID){
            jQuery.ajax({
                url : 'zoomMeetingCreate/batch/' +countryID,
                type : "GET",
                dataType : "json",
                beforeSend: function()
              {
                $('.ajax_loader').css("visibility", "visible");
              },
                success:function(data)
                {
                  console.log(data);
                  jQuery('select[name="batch_name"]').empty();
                  jQuery.each(data, function(key,value){
                      $('select[name="batch_name"]').append('<option value="'+ key +'">'+ value +'</option>');
                  });
                },
                complete: function()
              {
                $('.ajax_loader').css("visibility", "hidden");
              },
            });
           }
            else{
              $('select[name="batch_name"]').empty();
            }
      }
  </script>    
@endpush
