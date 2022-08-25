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
                            <li class="breadcrumb-item active" aria-current="page"><a>Communication</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Zoom Api Update</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row grid-margin">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">API Information Update</h4>
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div><br />
                    @endif
                    <form class="cmxform" id="zoomCreateForm" method="post" action="{{ route('admin.communication.updateApiData',$data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                      <fieldset>
                        <div class="form-group">
                          <label for="user_name">User Name<span class="requiredStar" style="color: red"> * </span></label>
                          {!!  Form::select('user_name', $user, $data->user_name,['class'=>'form-control','placeholder'=>'Select a user','required']) !!}
                        </div>
                        <div class="form-group">
                          <label for="zoom_api_url">ZOOM API URL<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="zoom_api_url" class="form-control" type="text" name="zoom_api_url" value="https://api.zoom.us/v2/" required/>
                        </div>
                        <div class="form-group">
                          <label for="zoom_api_key">ZOOM API KEY<span class="requiredStar" style="color: red"> * </span></label>
                        <input id="zoom_api_key" class="form-control" name="zoom_api_key" value="{{ $data->zoom_api_key }}" required/>
                        </div>
                        <div class="form-group">
                          <label for="zoom_api_secret">ZOOM API SECRET<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="zoom_api_secret" class="form-control" name="zoom_api_secret" value="{{ $data->zoom_api_secret }}" required/>
                        </div>
                        <div class="form-group">
                           <label>
                             {!! Form::checkbox('status', '1', $data->status, ['id' => 'status']) !!}
                             Enable this API <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can enable or disable this API data."></i>
                           </label>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Update">
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
    {!! Html::script('public/js/img-preview.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/validation/zoomCreateForm-validation.js') !!}
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
@endpush
