@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
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
                            <li class="breadcrumb-item active" aria-current="page"><span>Update Staff</span></li>
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
                    <h4 class="card-title">Staff Information</h4>
                    <form class="cmxform" id="staffForm" method="post" action="{{ route('admin.staff.update',$data->id) }}" enctype="multipart/form-data" accept-charset="utf-8" name="edit">
                      @csrf
                      @method('PATCH')
                      <fieldset>
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <input type="hidden" name="user_id" value="{{$data->user_id}}">
                        <div class="form-group">
                            <label for="cname">Staff Name<span class="requiredStar" style="color: red"> * </span></label>
                            <input id="cname" class="form-control" name="name" minlength="3" type="text" value="{{ $data->user->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number (Personal)<span class="requiredStar" style="color: red"> * </span></label>
                            <input id="phone" class="form-control" type="text" name="phone" value="{{ $data->user->phone }}" required>
                        </div>
                        <div class="form-group">
                            <label for="cemail">E-Mail Address</label>
                            <input id="cemail" class="form-control" type="email" name="email" value="{{ $data->user->email }}">
                        </div>
                        <div class="form-group">
                          <label for="password">Login Password<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="password" class="form-control" type="text" name="password" value="{{$data->user->raw_password}}" required>
                        </div>
                        <div class="form-group">
                          <label for="address">Address</label>
                          <textarea id="address" class="form-control" name="address" rows="4" value="">{{ $data->address }}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="details">Details</label>
                          <textarea id="details" class="form-control" name="details" rows="4" value="">{{$data->details}}</textarea>
                       </div>
                        <!--<div class="form-group">-->
                        <!--    <label for="batch_id">Batch</label>-->
                        <!--    {!!  Form::select('batch_id',$dept,$data->batch_id,['class'=>'form-control','placeholder'=>'Select a Batch']) !!}-->
                        <!--</div>-->
                        {{-- <div class="form-group">
                           <label for="designation">Designation<span class="requiredStar" style="color: red"> * </span></label>
                           <select class="form-control"  name="designation" id="designation">
                             <option value="" >Select One...</option>
                             <option value="Manager">Manager</option>
                             <option value="Librarian">Librarian</option>
                             <option value="Driver">Driver</option>
                             <option value="Caretaker">Caretaker</option>
                           </select>
                        </div> --}}
                        
                       <div class="form-group">
                          {{-- <img src="{{ asset('/public/uploads/user_images/') }}/{{$data->user->user_image }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"> --}}
                              <label for="password">Image</label>
                              <br>
                              <img id='img' src="{{ asset('/public/uploads/user_images/') }}/{{$data->user->user_image }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px; margin-bottom:10px">
                              <input id="image" class="form-control" type="file" name="image">
                              <br>
                              <input type="hidden" name="hidden_image" value="{{$data->user->user_image}}" />
                              <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>Image Dimension must be 250x250 and size has to be less than 2 MB</p>
                              <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>Image format has to be either .jpeg .jpg or .png</p>
                        </div>
                        <div class="form-group">
                          <label>
                            {!! Form::checkbox('status', '1', $data->status, ['id' => 'status']) !!}
                            Enable this Staff <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can enable or disable this staff"></i>
                          </label>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Update">
                        <a class="btn btn-danger" href="{{ route('admin.staff.index') }}">Back</a>
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
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('public/js/img-preview.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/validation/staffForm-validation.js') !!}
    {!! Html::script('public/assets/js/bt-maxlength.js') !!}
    {!! Html::script('public/assets/js/file-upload.js') !!}
    {!! Html::script('public/assets/js/iCheck.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/typeahead.js') !!}
    {!! Html::script('public/assets/js/toastDemo.js') !!}

    {{-- <script type="text/javascript">
      document.forms['edit'].elements['department_id'].value='{{$data->department_id}}'
      document.forms['edit'].elements['designation'].value='{{$data->designation}}'
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
@endpush
