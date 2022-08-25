@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('/assets/plugins/select2/css/select2.min.css') !!}
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
                            <li class="breadcrumb-item active" aria-current="page"><a>Teachers</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Assign Teacher</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.teacher.assignIndex')}}">Assign Teacher List</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Update Teacher Assignment</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row grid-margin">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div><br />
                    @endif
                    {{-- <h4 class="card-title">Teacher Assign Information</h4> --}}
                    <form class="cmxform" id="teacherForm" method="post" action="{{ route('admin.teacher.assignUpdate',$teacher->id) }}" enctype="multipart/form-data" accept-charset="utf-8" name="edit">
                      @csrf
                      @method('PATCH')
                      <fieldset>
                        <input type="hidden" name="id" value="{{$teacher->id}}">
                        <div class="form-group">
                            <label for="cname">Teacher Name<span class="requiredStar" style="color: red"> * </span></label>
                            <select class="form-control"  name="user_id" id="user_id" required>
                            <option value="" >Select One...</option>
                            @foreach($teachers as $key=> $teacherSingle)
                              <option value="{{ $teacherSingle->user_id }}" {{($teacher->user_id == $teacherSingle->user_id) ? 'selected' : ''}} >{{ $teacherSingle->user->name }}</option>
                            @endforeach  
                          </select>
                        </div>

                        {{-- <div class="form-group">
                            {!! Form::label('name','Course Type') !!} <span class="requiredStar" style="color: red"> * </span> --}}
                            {{-- {!!  Form::select('course_name', $course, $assignTeacher->course_name,['class'=>'form-control','placeholder'=>'Select a Course','required']) !!} --}}
                           {{--  <select class="form-control" name="course_name" id="course_name">
                                <option value="">Select One...</option>
                                @foreach($assignTeacher as $key=> $value)
                                <option value="{{$key}}"  selected>{{$value->course->full_name}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group">

                            {!! Form::label('name','Exam Category') !!} <span class="requiredStar" style="color: red"> * </span>
                            {!!  Form::select('exam_category',$examCategory,$teacher->course_name,['class'=>'form-control','placeholder'=>'Select a Exam Category','required']) !!}
                        </div>
                        {{-- <div class="form-group">

                            {!! Form::label('name','Course Type') !!} <span class="requiredStar" style="color: red"> * </span>
                            {!!  Form::select('course_name', $course, $teacher->course_name,['class'=>'form-control','placeholder'=>'Select a Course','required']) !!}
                        </div> --}}

                        <div class="form-group">

                            {!! Form::label('name','Exam Group') !!} <span class="requiredStar" style="color: red"> * </span>
                            <select name="exam_group" id="exam_group" class="form-control">
                                <option value="">Select a Group</option>
                            </select>
                        </div>

                        <div class="form-group">

                            {!! Form::label('name','Subject Name') !!} <span class="requiredStar" style="color: red"> * </span>
                            <select name="subject_name" class="form-control">
                                <option value="">Select a subject</option>
                            </select>
                        </div>

                        <input class="btn btn-primary" type="submit" value="Update">
                        <a class="btn btn-danger" href="{{ route('admin.teacher.assignIndex') }}">Back</a>
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
    {!! Html::script('/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') !!}
    {!! Html::script('/assets/plugins/icheck/icheck.min.js') !!}
    {!! Html::script('/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('/assets/plugins/typeaheadjs/typeahead.bundle.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('/assets/js/img-preview.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/validation/teacherForm-validation.js') !!}
    {!! Html::script('/assets/js/bt-maxlength.js') !!}
    {!! Html::script('/assets/js/file-upload.js') !!}
    {!! Html::script('/assets/js/iCheck.js') !!}
    {!! Html::script('/assets/js/select2.js') !!}
    {!! Html::script('/assets/js/typeahead.js') !!}
    {!! Html::script('/assets/js/toastDemo.js') !!}

{{--     <script type="text/javascript">
      document.forms['edit'].elements['course_id'].value='{{$teacher->course_id}}'
      document.forms['edit'].elements['user_id'].value='{{$teacher->user_id}}'
    </script> --}}

    <script type="text/javascript">
        $(document).ready(function () {
            @if (session('success'))
            showSuccessToast('{{ session("success") }}');
            @elseif(session('warning'))
            showWarningToast('{{ session("warning") }}');
            @endif
        });
    </script>
        <!-- dropdown.blade.php -->
    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
          var course_id = $('select[name="exam_category"]').val();
          if(course_id){
            jQuery.ajax({
              url : 'batch/' +course_id,
              type : "GET",
              dataType : "json",
                         
              success:function(data)
              {
                console.log(data);
                jQuery('select[name="exam_group"]').empty();
                jQuery.each(data, function(key,value){
                  // (key=={{$teacher->batch_name}}?'selected':'')
                  $('select[name="exam_group"]').append('<option value="'+ key +'"'+(key=={{$teacher->batch_name}}?'selected':'')+'>'+ value +'</option>');
                });
              }
            });

            jQuery.ajax({
              url : 'subject/' +course_id,
              type : "GET",
              dataType : "json",
              success:function(data)
              {
                console.log(data);
                jQuery('select[name="subject_name"]').empty();
                jQuery.each(data, function(key,value){
                  $('select[name="subject_name"]').append('<option value="'+ key +'"'+(key=={{$teacher->subject_name}}?'selected':'')+'>'+ value +'</option>');
                });
              }
            });


          } else{
            $('select[name="exam_group"]').empty();
            $('select[name="subject_name"]').empty();
          }


            jQuery('select[name="exam_category"]').on('change',function(){
                var countryID = $(this).val();
                if(countryID)
                   {
                      jQuery.ajax({
                         url : 'batch/' +countryID,
                         type : "GET",
                         dataType : "json",
                         
                         success:function(data)
                         {
                            console.log(data);
                            jQuery('select[name="exam_group"]').empty();
                            jQuery.each(data, function(key,value){
                               $('select[name="exam_group"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                         }
                      });
                    }
                else
                   {
                      $('select[name="exam_group"]').empty();
                   }
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
            jQuery('select[name="exam_category"]').on('change',function(){
                var countryID = jQuery(this).val();
                var exam_group = $("#exam_group").val();
                // console.log(countryID);
                // console.log(exam_group);
                if(countryID)
                   {
                      jQuery.ajax({
                         url : 'subject/' +countryID+'/'+exam_group,
                         type : "GET",
                         dataType : "json",
                         success:function(data)
                         {
                            console.log(data);
                            jQuery('select[name="subject_name"]').empty();
                            jQuery.each(data, function(key,value){
                               $('select[name="subject_name"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                         }
                      });
                    }
                else
                   {
                      $('select[name="subject_name"]').empty();
                   }
            });
        });
    </script>
@endpush
