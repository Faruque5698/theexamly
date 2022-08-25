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
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.teacher.index')}}">Teachers List</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Add Teacher</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row grid-margin">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Teachers Information</h4>
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div><br />
                    @endif
                    <form class="cmxform" id="teacherForm" method="post" action="{{ route('admin.teacher.store') }}" enctype="multipart/form-data">
                        @csrf
                      <fieldset>
                        <div class="form-group">
                          <label for="cname">Teachers Name<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="cname" class="form-control" name="name" minlength="3" type="text" required>
                        </div>
                        <div class="form-group">
                          <label for="phone">Phone Number (Personal)<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="phone" class="form-control" type="text" name="phone" required>
                        </div>
                        <div class="form-group">
                          <label for="cemail">E-Mail Address<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="cemail" class="form-control" type="email" name="email" required>
                        </div>
                        <div class="form-group">
                          <label for="password">Login Password<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="password" class="form-control" type="Password" minlength="8" name="password" required>
                        </div>
                        
                        {{-- <div class="form-group">
                            <label for="batch_id">Batch<span class="requiredStar" style="color: red"> * </span></label>
                            <select class="form-control" name="batch_id" id="batch_id">
                                <option value="">Select One...</option>
                                @foreach($teacher as $data)
                                <option value="{{$data->id}}" >{{$data->name}}</option>
                                 @endforeach
                            </select>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="designation">Designation<span class="requiredStar" style="color: red"> * </span></label>
                            <select class="form-control"  name="designation" id="designation">
                              <option value="" >Select One...</option>
                              <option value="Teacher">Teacher</option>
                            </select>
                        </div> --}}
                        
                        <div class="form-group">
                          <label for="address">Address</label>
                          <textarea id="address" class="form-control" name="address" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="details">Details</label>
                          <textarea id="details" class="form-control" name="details" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input id="image" class="form-control" type="file" name="image">
                        </div>
                        <div class="form-group">
                          <label>
                            {!! Form::checkbox('status', '1', old('status'), ['id' => 'status']) !!}
                            Enable this Teacher <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can enable or disable this teacher"></i>
                          </label>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Create">
                        <a class="btn btn-danger" href="{{ route('admin.teacher.index') }}">Cancel</a>
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
    {!! Html::script('/assets/plugins/jquery-validation/additional-methods.js') !!}
    {!! Html::script('/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') !!}
    {!! Html::script('/assets/plugins/icheck/icheck.min.js') !!}
    {!! Html::script('/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('/assets/plugins/typeaheadjs/typeahead.bundle.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/validation/teacherForm-validation.js') !!}
    {!! Html::script('/assets/js/bt-maxlength.js') !!}
    {!! Html::script('/assets/js/file-upload.js') !!}
    {!! Html::script('/assets/js/iCheck.js') !!}
    {!! Html::script('/assets/js/select2.js') !!}
    {!! Html::script('/assets/js/typeahead.js') !!}

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
