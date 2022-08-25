@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/assets/multiSelect/MultiSelect/jquery.multiselect.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
@endpush

<style>
  .student_name .ms-options{
  margin-left: 23px !important;
  }
  .table td, .table th  {
    white-space: normal !important;

  }
  .table .message{
     width: 400px !important;
  }
    .table .action{
     width: 50px !important;
  }
</style>
@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>SMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Send SMS</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <form class="cmxform" id="smsForm" method="post" action="{{ route('admin.sms.store') }}" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="row grid-margin">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">SMS Information</h4>
                      @csrf
                      <fieldset>
                        <div class="form-group" style="display:none">
                          <label for="title">Message Type<span class="requiredStar" style="color: red"> * </span></label>&nbsp;&nbsp;
                          <input type="radio" name="message_type" value="bangla"> Bangla &nbsp;&nbsp;
                          <input type="radio" name="message_type" value="english" checked="checked"> English &nbsp;&nbsp;
                        </div>
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input id="title" class="form-control" name="title" type="text">
                        </div>
                        <label for="Send Though">Send Though<span class="requiredStar" style="color: red"> * </span></label>&nbsp;&nbsp;
                          <label class="form-group">
                            <input type="radio" id="sms" name="send_though" value="sms" checked="checked" required>
                            SMS
                          </label>&nbsp;&nbsp;
                          {{-- <label class="form-group">
                            <input type="radio" id="sms" name="send_though" value="mail">
                            Mail
                          </label> --}}
                        <div class="form-group">
                          <label for="description">Message Description<span class="requiredStar" style="color: red"> * </span></label>
                          <textarea id="description" class="form-control" type="text" name="description" rows="6"></textarea>
                          @error('description') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-group">
                          <label for="myCheck">Message Template:</label>
                          <input type="checkbox" id="myCheck" onclick="myFunction()">
                          <div id="template" style="display: none">
                          <div id="message"></div>
                          <div class="">
                           <table class="table  table-bordered">
                            <thead>
                             <tr>
                              <th class="message">Message Template</th>
                              <th class="action">Action</th>
                             </tr>
                            </thead>
                            <tbody >

                            </tbody>
                           </table>
                           {{ csrf_field() }}
                          </div>
                        </div>
                        </div>
                      </fieldset>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <div id="" class=""><br>
                      <h4 class="card-title">Massage to</h4>
                        <nav>
                          <div class="nav nav-tabs" id="nav-tab" role="tablist" style="font-size:14px">
                            <!--<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Class Wise</a>-->
                            <a class="nav-item nav-link" id="nav-home2-tab" data-toggle="tab" href="#nav-home2" role="tab" aria-controls="nav-home2" aria-selected="true">Exam Wise</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Phone Book</a>
                            <a class="nav-item nav-link" id="nav-manual-tab" data-toggle="tab" href="#nav-manual" role="tab" aria-controls="nav-manual" aria-selected="false">Guest</a>
                          </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="form-group">
                              <label for="batchId">Select Exam<span class="requiredStar" style="color: red"> * </span></label>
                              <select class="form-control batchId" name="batchId" id="batchId">
                                  <option value="">Select One...</option>
                                  @foreach($batch as $data)
                                  <option value="{{$data->id}}" >{{$data->full_name}}</option>
                                   @endforeach
                              </select>
                            </div>
                            <div class="form-group student_name">
                              <label for="name">Select Number<span class="requiredStar" style="color: red"> * </span></label>
                              <select class="form-control " name="name[]" id="name" multiple="multiple" >
                                  <option value=""></option>
                                  @foreach($name as $key=>$data)
                                  <option value="{{$data->phone}}">{{$data->name}}-{{$data->phone}}</option>
                                   @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="tab-pane fade" id="nav-home2" role="tabpanel" aria-labelledby="nav-home2-tab">
                            <div class="form-group">
                              <label for="classId">Select Exam<span class="requiredStar" style="color: red"> * </span></label>
                              <select class="form-control classId" name="classId" id="classId">
                                  <option value="">Select One...</option>
                                  @foreach($batch as $data)
                                  <option value="{{$data->id}}" >{{$data->full_name}}</option>
                                   @endforeach
                              </select>
                            </div>
                            <div class="form-group subjectId">
                              <label for="subjectId">Select Subject<span class="requiredStar" style="color: red"> * </span></label>
                              <select class="form-control subjectId" name="subjectId" id="subjectId">
                                  <option value="">Select One...</option>
                                  {{-- @foreach($subject as $data)
                                  <option value="{{$data->id}}" >{{$data->full_name}}</option>
                                   @endforeach --}}
                              </select>
                            </div>
                            <div class="form-group student_name">
                              <label for="name">Select Number<span class="requiredStar" style="color: red"> * </span></label>
                              <select class="form-control " name="name[]" id="name" multiple="multiple" >
                                  <option value=""></option>
                                  @foreach($name as $key=>$data)
                                  <option value="{{$data->phone}}">{{$data->name}}-{{$data->phone}}</option>
                                   @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="form-group">
                              <label for="groupId">Select Group<span class="requiredStar" style="color: red"> * </span></label>
                              <select class="form-control groupId" name="groupId" id="groupId">
                                  <option value="">Select One...</option>
                                  <option value="0">All</option>
                                  @foreach($group as $data)
                                  <option value="{{$data->id}}" >{{$data->group_name}}</option>
                                   @endforeach
                              </select>
                            </div>
                            <div class="form-group student_name">
                              <label for="phoneBookName">Select Number<span class="requiredStar" style="color: red"> * </span></label>
                              <select class="form-control " name="phoneBookName[]" id="phoneBookName" multiple="multiple" >
                                  <option value=""></option>
                                  @foreach($phoneBookName as $key=>$data)
                                  <option value="{{$data->phone}}">{{$data->name}}-{{$data->phone}}</option>
                                   @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="nav-manual" role="tabpanel" aria-labelledby="nav-manual-tab">
                            {{-- <div class="form-group">
                              <label for="name">Name<span class="requiredStar" style="color: red"> * </span></label><br>
                              <input type="text" class="form-control" name="name" id="name" style="width: 200px">
                            </div> --}}
                            <div class="form-group">
                              <label for="manualNumber">Phone Number<span class="requiredStar" style="color: red"> * </span></label><br>
                              <input type="text" class="form-control" name="manualNumber" id="manualNumber" style="width: 200px">
                            </div>
                            <div class="form-group">
                              <label for="groupName">Group Name<span class="requiredStar" style="color: red"> * </span></label><br>
                              <input type="text" class="form-control" name="groupName" id="groupName" style="width: 200px">
                            </div>
                          </div>
                        </div>
                      </div><br>
                      <input class="btn btn-primary" type="submit" id="submit" value="Send">
                      <a class="btn btn-danger" href="">Cancel</a>
                    </div>
                </div>
              </div>
            </form>

            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    {!! Html::script('public/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/assets/multiSelect/MultiSelect/jquery.multiselect.js') !!}
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/file-upload.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/validation/smsForm-validation.js') !!}
    {!! Html::script('public/assets/js/toastDemo.js') !!}

    <script type="text/javascript">
        $(document).ready(function () {
            @if (session('success'))
            showSuccessToast('{{ session("success") }}');
            @elseif(session('warning'))
            showWarningToast('{{ session("warning") }}');
            @endif
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

        {{-- test --}}
        <script>
        $(document).ready(function(){

         fetch_data();

         function fetch_data()
         {
          $.ajax({
           url:"{{ route('admin.sms.livetable.fetch_data') }}",
           dataType:"json",
           success:function(data)
           {
            var html = '';
            html += '<tr>';
            html += '<td contenteditable id="first_name" placeholder="type message"></td>';
            html += '<td style="text-align: center"><button style="font-size:10px; padding:6px;" type="button" class="btn btn-success btn-xs" id="add">Add</button></td></tr>';
            for(var count=0; count < data.length; count++)
            {
             html +='<tr>';
             html +='<td contenteditable class="column_name" data-column_name="description" data-id="'+data[count].id+'">'+data[count].description+'</td>';
             html += '<td style="text-align: center"><button type="button" style="font-size:10px;padding:6px;" class="btn btn-danger btn-xs delete" id="'+data[count].id+'"><i class="fa fa-trash"></i></button></td></tr>';
            }
            $('tbody').html(html);
           }
          });
         }

         var _token = $('input[name="_token"]').val();

         $(document).on('click', '#add', function(){
          var first_name = $('#first_name').text();
          if(first_name != '')
          {
           $.ajax({
            url:"{{ route('admin.sms.livetable.add_data') }}",
            method:"POST",
            data:{first_name:first_name, _token:_token},
            success:function(data)
            {
             $('#message').html(data);
             fetch_data();
            }
           });
          }
          else
          {
           $('#message').html("<div class='alert alert-danger'>Empty field not allowed</div>");
          }
         });

         $(document).on('blur', '.column_name', function(){
          var column_name = $(this).data("column_name");
          var column_value = $(this).text();
          var id = $(this).data("id");

          if(column_value != '')
          {
           $.ajax({
            url:"{{ route('admin.sms.livetable.update_data') }}",
            method:"POST",
            data:{column_name:column_name, column_value:column_value, id:id, _token:_token},
            success:function(data)
            {
             $('#message').html(data);
            }
           })
          }
          else
          {
           $('#message').html("<div class='alert alert-danger'>Enter some value</div>");
          }
         });

         $(document).on('click', '.delete', function(){
          var id = $(this).attr("id");
          if(confirm("Are you sure you want to delete this records?"))
          {
           $.ajax({
            url:"{{ route('admin.sms.livetable.delete_data') }}",
            method:"POST",
            data:{id:id, _token:_token},
            success:function(data)
            {
             $('#message').html(data);
             fetch_data();
            }
           });
          }
         });
        });
        </script>

    <script>
    function myFunction() {
      var checkBox = document.getElementById("myCheck");
      var template = document.getElementById("template");
      if (checkBox.checked == true){
        template.style.display = "block";
      } else {
         template.style.display = "none";
      }
    }
    </script>

   {{--  <script type="text/javascript">
        $("#batchId").select2({
        placeholder: "Select One...",
        allowClear: true
        });
    </script> --}}

    <script type="text/javascript">
      $(document).ready(function() {
      $('select.batchId').change(function(){
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      var batchId = $(this).val();

      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "{{route('admin.sms.search')}}",
        data:  {
          _token: CSRF_TOKEN,
          batchId: batchId// search term
        },
        // beforeSend: function(jqXHR, settings) {
        //     console.log(settings.url);
        // },
        success:function(response){
          console.log(response);
        var len = response.length;
        $("#name").empty();
        var arr = [];
        var len = response.length;
        for (var i = 0; i < len; i++)
        {
        arr.push({ value : response[i]['phone'], name: response[i]['name']+' '+response[i]['phone'], checked: true });
        }

      $('select[multiple]').multiselect('reload');
      $('select[multiple]').multiselect('loadOptions',arr);

      // DYNAMICALLY LOAD OPTIONS
      // $('select[multiple]').multiselect( 'loadOptions', [
      // {
      // name : 'Option Name 1',
      // value : 'option-value-1',
      // checked: true,

      // },
      // {
      // name : 'Option Name 2',
      // value : 'option-value-2',
      // checked: true,

      // },
      // {
      // name : 'Option Name 2',
      // value : 'option-value-2',
      // checked: true,

      // },
      // ]);

      //////
      }

    });

    });

    });
  </script>

 <script type="text/javascript">
     jQuery(document).ready(function ()
     {

       jQuery('select[name="classId"]').on('change',function(){
       var classId = jQuery(this).val();

       if(classId){
         jQuery.ajax({
           url : 'sms/subject/' +classId,
           type : "GET",
           dataType : "json",
            beforeSend: function(jqXHR,settings)
           {
             $('.ajax_loader').css("visibility", "visible");
              // console.log(settings.url);
           },
           beforeSend: function(jqXHR, settings) {
               //console.log(settings.url);
           },
           success:function(data)
           {
            //console.log(data);
             jQuery('select[name="subjectId"]').empty();
             $('select[name="subjectId"]').append('<option value="">Select one..</option>');

             for (let index = 0; index < data.length; index++) {
               $('#subjectId').append('<option value="'+ data[index].id +'">'+ data[index].name +'</option>');
             }
           },
           complete: function()
           {
             $('.ajax_loader').css("visibility", "hidden");
           },
         });
       }
     });
    });
 </script>
   <script type="text/javascript">
     $(document).ready(function() {
     $('select.subjectId').change(function(){
     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
     var subjectId = $(this).val();
     console.log(subjectId);
     $.ajax({
       type: 'POST',
       dataType: 'json',
       url: "{{route('admin.sms.searchResult')}}",
       data:  {
         _token: CSRF_TOKEN,
         subjectId: subjectId// search term
       },
       beforeSend: function(jqXHR, settings) {
           console.log(settings.url);
       },
       success:function(response){
         console.log(response);
       var len = response.length;
       $("#name").empty();
       var arr = [];
       var len = response.length;
       for (var i = 0; i < len; i++)
       {
       arr.push({ value : response[i]['phone'], name: response[i]['name']+' '+response[i]['phone'], checked: true });
       }

     $('select[multiple]').multiselect('reload');
     $('select[multiple]').multiselect('loadOptions',arr);

     }

   });

   });

   });
 </script>
    <script type="text/javascript">
      $(document).ready(function() {
      $('select.groupId').change(function(){
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      var groupId = $(this).val();

      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "{{route('admin.sms.search2')}}",
        data:  {
          _token: CSRF_TOKEN,
          groupId: groupId// search term
        },
        beforeSend: function(jqXHR, settings) {
            console.log(settings.url);
        },
        success:function(response){
          console.log(response);
        var len = response.length;
        $("#phoneBookName").empty();
        var arr = [];
        var len = response.length;
        for (var i = 0; i < len; i++)
        {
        arr.push({ value : response[i]['phone'], name: response[i]['name']+' '+response[i]['phone'], checked: true });
        }

      $('select[multiple]').multiselect('reload');
      $('select[multiple]').multiselect('loadOptions',arr);

      // DYNAMICALLY LOAD OPTIONS
      // $('select[multiple]').multiselect( 'loadOptions', [
      // {
      // name : 'Option Name 1',
      // value : 'option-value-1',
      // checked: true,

      // },
      // {
      // name : 'Option Name 2',
      // value : 'option-value-2',
      // checked: true,

      // },
      // {
      // name : 'Option Name 2',
      // value : 'option-value-2',
      // checked: true,

      // },
      // ]);

      //////
      }

    });

    });

    });
  </script>
  <script>

    $('select[multiple]').multiselect({
    columns  : 2,
    search   : true,
    selectAll: true,
    texts    : {
        placeholder: 'Select options',
        search     : 'Search Name'
    },
       // minimum height of option overlay
      maxHeight          : null,  // maximum height of option overlay
      maxWidth           : 444,
      // marginLeft         : 23,


});
      $('select[multiple]').multiselect('reload');

      $('').multiselect({

      columns: 5,     // how many columns should be use to show options
      search : true, // include option search box

      // search filter options
      searchOptions : {
        delay        : 250,                  // time (in ms) between keystrokes until search happens
        showOptGroups: false,                // show option group titles if no options remaining
        searchText   : true,                 // search within the text
        searchValue  : false,                // search within the value
        onSearch     : function( element ){} // fires on keyup before search on options happens
      },

     // plugin texts
      texts: {
        placeholder    : 'Select options', // text to use in dummy input
        search         : 'Search',         // search input placeholder text
        selectedOptions: ' selected',      // selected suffix text
        selectAll      : 'Select all',     // select all text
        unselectAll    : 'Unselect all',   // unselect all text
        noneSelected   : 'None Selected'   // None selected text
      },

      // general options
      selectAll          : true, // add select all option
      selectGroup        : false, // select entire optgroup
      minHeight          : 200,   // minimum height of option overlay
      maxHeight          : null,  // maximum height of option overlay
      maxWidth           : 433,  // maximum width of option overlay (or selector)
      maxPlaceholderWidth: null, // maximum width of placeholder button
      maxPlaceholderOpts : 3, // maximum number of placeholder options to show until "# selected" shown instead
      showCheckbox       : true,  // display the checkbox to the user
      optionAttributes   : [],  // attributes to copy to the checkbox from the option element

      // Callbacks
      onLoad  : function( element ){
        //console.log(options);

      },  // fires at end of list initialization
      onOptionClick : function( element, option ){}, // fires when an option is clicked
      onControlClose: function( element ){}, // fires when the options list is closed
      onSelectAll   : function( element ){},         // fires when (un)select all is clicked

      // @NOTE: these are for future development
      minSelect: false, // minimum number of items that can be selected
      maxSelect: false, // maximum number of items that can be selected

    });
  </script>

@endpush
