@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/icheck/skins/all.css') !!}
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
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Staff</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span> <a href="{{route('admin.staff.index')}}">Staff List</a> </span></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Add Staff</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row grid-margin">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Staffs Information</h4>
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div><br />
                    @endif
                    <form class="cmxform" id="staffForm" method="post" action="{{ route('admin.staff.store') }}" enctype="multipart/form-data">
                        @csrf
                      <fieldset>
                        <div class="form-group">
                          <label for="cname">Staff Name<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="cname" class="form-control" name="name" minlength="3" type="text" value="{{old('name')}}" required>
                        </div>
                        <div class="form-group">
                          <label for="phone">Phone Number (Personal)<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="phone" class="form-control" value="{{old('phone')}}" type="text" name="phone" required>
                        </div>
                        <div class="form-group">
                          <label for="cemail">E-Mail Address</label>
                          <input id="cemail" class="form-control" type="email" name="email" value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                          <label for="password">Login Password<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="password" class="form-control" type="Password" minlength="8" name="password" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="designation">Designation</label>
                            <input id="designation" class="form-control" type="text" name="designation">
                        </div> --}}
                        <div class="form-group">
                          <label for="address">Address</label>
                          <textarea id="address" class="form-control" name="address" rows="4">{{old('address')}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="details">Details</label>
                          <textarea id="details" class="form-control" name="details" rows="4">{{old('details')}}</textarea>
                        </div>
                        <!--<div class="form-group">-->
                        <!--    <label for="batch_id">Batch</label>-->
                        <!--    <select class="form-control" name="batch_id" id="batch_id">-->
                        <!--        <option value="">Select One...</option>-->
                        <!--        @foreach($dept as $data)-->
                        <!--          <option value="{{$data->id}}" {{old('batch_id') == $data->id ? 'selected' : ''}} >{{$data->name}}</option>-->
                        <!--         @endforeach-->
                        <!--    </select>-->
                        <!--</div>-->
                         {{-- <img id='img' src="/logo/img-icon.svg" alt="image" height="150" width="150"> --}}
                        <div class="form-group">                          
                            <label for="image">Image</label><br>
                            {{-- <div id="thumb-output"></div> --}}
                            <img id="img" src="{{ asset('/public/uploads/avatars/default.jpg') }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px; margin-bottom:10px">
                            <br>
                            <input id="image" class="form-control" type="file" name="image">
                            <br>
                            <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>Image Dimension must be 250x250 and size has to be less than 2 MB</p>
                            <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>Image format has to be either .jpeg .jpg or .png</p>
                        </div>
                        <div class="form-group">
                          <label>
                            {!! Form::checkbox('status', '1', old('status'), ['id' => 'status']) !!}
                            Enable this Staff <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can enable or disable this staff"></i>
                          </label>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Create">
                        <a class="btn btn-danger" href="{{ route('admin.staff.index') }}">Cancel</a>
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
    {!! Html::script('public/js/img-preview.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/validation/staffForm-validation.js') !!}
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
    </script>

    <script>
 
    $(document).ready(function(){
      $('#file-input').on('change', function(){ //on file input change
        console.log("here");
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {  
                var data = $(this)[0].files; //this file data 
                $.each(data, function(index, file){ //loop though each file
                    if(/(\.|\/)(jpe?g|png)$/i.test(file.type)){ //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file){ //trigger function on successful read
                        return function(e) {
                            var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
                            $('#thumb-output').append(img); //append image to output element
                        };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });
                
            }
          });
      });
   
    </script>
@endpush
