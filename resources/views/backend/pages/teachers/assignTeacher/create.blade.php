@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('/assets/plugins/choices/public/assets/styles/choices.min.css') !!}
    {!! Html::style('/css/loader.css') !!}
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
                            <li class="breadcrumb-item active" aria-current="page"><span>Add New Teacher Assignment</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="ajax_loader">
              <img src="{{ url('assets/images/loading.gif') }}" class="img-responsive" />
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
                    <form class="cmxform" id="teacherAssignForm" method="post" action="{{ route('admin.teacher.assignStore') }}" enctype="multipart/form-data">
                        @csrf
                      <fieldset>
                        <div class="form-group">
                          {!! Form::label('name','Teachers Name') !!} <span class="requiredStar" style="color: red"> * </span>
                          <select class="form-control"  name="user_id" id="user_id" required>
                            <option value="" >Select One...</option>
                            @foreach($teacher as $key=> $teachers)
                              <option value="{{ $teachers->user_id }}" 
                                {{(old("user_id") == $teachers->user_id ? "selected":"")}}>{{ $teachers->user->name }}</option>
                            @endforeach  
                          </select>
                        </div>
                        <div class="form-group">

                            {!! Form::label('name','Exam Category') !!} <span class="requiredStar" style="color: red"> * </span>
                            {!!  Form::select('exam_category',$examCategory,old('exam_category'),['class'=>'form-control','placeholder'=>'Select a Exam Category','required']) !!}
                        </div>

                        <div class="form-group">

                            {!! Form::label('name','Exam Group') !!} <span class="requiredStar" style="color: red"> * </span>
                            <select name="exam_group" id="exam_group" class="form-control">
                                <option value="">Select a Group</option>
                            </select>
                        </div>

                        <div class="form-group">

                            {!! Form::label('name','Subject Name') !!} <span class="requiredStar" style="color: red"> * </span>
                            <select name="subject_name[]" class="form-control" id="choices-multiple-remove-button" multiple>
                                <option value="">Select subject</option>
                            </select>
                        </div>

                        <input class="btn btn-primary" type="submit" value="Create">
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
    {!! Html::script('/assets/plugins/choices/public/assets/scripts/choices.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/validation/teacherAssignForm-validation.js') !!}
    {!! Html::script('/assets/plugins/Bootstrap-4-Multi-Select/dist/js/BsMultiSelect.js') !!} 
    {!! Html::script('/assets/js/bt-maxlength.js') !!}
    {!! Html::script('/assets/js/file-upload.js') !!}
    {!! Html::script('/assets/js/iCheck.js') !!}
    {!! Html::script('/assets/js/select2.js') !!}
    {!! Html::script('/assets/js/typeahead.js') !!}
    {!! Html::script('/assets/js/toastDemo.js') !!}

    {{-- js script to show toastr notification --}}
    <script type="text/javascript">   
      $(document).ready(function () {
          @if (session('success'))
          showSuccessToast('{{ session("success") }}');
          @elseif(session('warning'))
          showWarningToast('{{ session("warning") }}');
          @elseif(session('danger'))
          showWarningToast('{{ session("danger") }}');
          @endif
      });

      // ajax setup block to send csrf token when making a request
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  </script>

    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
            jQuery('select[name="exam_category"]').on('change',setGroup); // call the function to populate batch dropdown
            jQuery('select[name="exam_category"]').on('change',setSubject);

             // call the function to populate subject dropdown
            const exam_category = $('select[name="exam_category"]').val();
            if(exam_category){
              // when editing automatically make ajax request to populate batch and subject dropdown and keep the previously entered value as selected
              jQuery.ajax({
                url : 'assign/batch/' +exam_category,
                type : "GET",
                dataType : "json",
                beforeSend: function()
                {
                  $('.ajax_loader').css("visibility", "visible"); // to show spinner gif when ajax request is processing 
                },
                success:function(data)
                {
                  // console.log(data);
                  jQuery('select[name="exam_group"]').empty();
                  const exam_group = "{{ old('exam_group') }}";
                  // console.log('hi');
                  for (let index = 0; index < data.length; index++) {
                     
                    $('select[name="exam_group[]"]').append('<option value="'+ data[index].id +'">'+ data[index].full_name +'</option>');
                    
                  }
                  // jQuery.each(data, function(key,value){
                  //     $('select[name="exam_group"]').append('<option value="'+ key +'"'+(exam_group == key ? 'selected' : '')+'>'+ value +'</option>');
                  // });
                },
                complete: function()
                {
                  $('.ajax_loader').css("visibility", "hidden"); // to hide spinner gif when ajax request is complete
                },
              });

              jQuery.ajax({
              url : 'assign/subject/' +exam_category,
              type : "GET",
              dataType : "json",
              beforeSend: function()
              {
                $('.ajax_loader').css("visibility", "visible"); // to show spinner gif when ajax request is processing
              },
              success:function(data)
              {
                // console.log(data);
                const subject_name = "{{ old('subject_name') }}";
                jQuery('select[name="subject_name"]').empty();
                jQuery.each(data, function(key,value){
                    $('select[name="subject_name"]').append('<option value="'+ key +'"'+(subject_name == key ? 'selected' : '')+'>'+ value +'</option>');
                });
              },
              complete: function()
              {
                $('.ajax_loader').css("visibility", "hidden"); // to hide spinner gif when ajax request is complete
              },
            });
          }
        });
    </script>
    <script>
      // setBatch function populates batch dropdown. It makes ajax request to fetch batches related to the course selected
      function setGroup(){
        var countryID = jQuery(this).val();
          if(countryID){
            jQuery.ajax({
                url : 'assign/batch/' +countryID,
                type : "GET",
                dataType : "json",
                beforeSend: function()
              {
                $('.ajax_loader').css("visibility", "visible");
              },
                success:function(data)
                {
                  // console.log(data);
                  jQuery('select[name="exam_group"]').empty();
                  for (let index = 0; index < data.length; index++) {
                   
                  $('select[name="exam_group"]').append('<option value="'+ data[index].id +'">'+ data[index].full_name +'</option>');
                  }
                },
                complete: function()
              {
                $('.ajax_loader').css("visibility", "hidden");
              },
            });
           }
            else{
              $('select[name="exam_group"]').empty();
            }
      }

      // setSubject function populates subject dropdown. It makes ajax request to fetch subjects related to the course selected
      function setSubject(){
        var countryID = jQuery(this).val();
        var examGroup = $("#exam_group").val();

        if(countryID){
          jQuery.ajax({
              url : 'assign/subject/' +countryID,
              type : "GET",
              dataType : "json",
              beforeSend: function()
            {
              $('.ajax_loader').css("visibility", "visible");
            },
              success:function(data)
              {
                console.log(data);
                $(document).ready(function(){
                   var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                   removeItemButton: true,
                   maxItemCount:5,
                   searchResultLimit:5,
                   renderChoiceLimit:5
                   });

                   $("div").focusout(function(){
                       $(this).css("background-color", "#FFFFFF");
                   });

                   });
                   $("#teacherAssignForm").submit(function(e) {
                       var contents = $('#choices-multiple-remove-button').val();

                       if(contents.length === 0){

                       }
                   });
                  $('#choices-multiple-remove-button').empty();

                  $('#choices-multiple-remove-button').append('<option value="">Select..</option>');
                  //
                // jQuery('select[name="subject_name"]').empty();
                // jQuery.each(data, function(key,value){
                //     $('select[name="subject_name"]').append('<option value="'+ key +'">'+ value +'</option>');
                // });
                for (let index = 0; index < data.length; index++) {
                   
                  $('select[name="subject_name[]"]').append('<option value="'+ data[index].id +'">'+ data[index].name +'</option>');
                  
                }
              },
              complete: function()
            {
              $('.ajax_loader').css("visibility", "hidden");
            },
          });
        }
        else{
          $('#choices-multiple-remove-button').empty();
        }
      }
    </script>
@endpush
