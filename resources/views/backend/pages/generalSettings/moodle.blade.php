@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
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
                            <li class="breadcrumb-item active" aria-current="page"><a>Settings</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Moodle Settings</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Moodle Active</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row grid-margin">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Moodle Information</h4>
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div><br/>
                    @endif
                    @if($moodle!== null)
                        {{-- {!! Form::model($moodle, ['method'=>'PUT','route' => ['admin.settings.moodleUpdate', $moodle->id ?? ''],'id'=>'settingsForm','class'=>'cmxform','enctype'=>"multipart/form-data"]) !!} --}}
                        {!! Form::open(['route' => 'admin.settings.moodleUpdate', 'method' => 'post','id'=>'settingsForm','enctype'=>"multipart/form-data"]) !!}
                      @else
                        {!! Form::open(['route' => 'admin.settings.moodleStore', 'method' => 'post','id'=>'settingsForm','enctype'=>"multipart/form-data"]) !!}
                    @endif
                    {{-- <form class="cmxform" id="teacherForm" method="post" action="{{ route('admin.settings.moodleStore') }}" enctype="multipart/form-data"> --}}
                        @csrf
                      <fieldset>
                        <div class="form-group">
                          <input type="hidden" name="id" value={{ $moodle->id ?? '' }}>
                          <label for="moodle_domain_name">Moodle Domain Name<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="moodle_domain_name" class="form-control" name="moodle_domain_name" type="text" value="{{ $moodle!==null ? $moodle->moodle_domain_name:'' }}" required>
                        </div>
                        <div class="form-group">
                          <label for="create_user_token">Create User Token<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="create_user_token" class="form-control" type="text" name="create_user" value="{{ $moodle!==null ? $moodle->create_user:'' }}" required>
                        </div>
                        <div class="form-group">
                          <label for="enroll_token">Enroll Token<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="enroll_token" class="form-control" type="text" name="enrol_user" value="{{ $moodle!==null ? $moodle->enrol_user:'' }}" required>
                        </div>
                        <div class="form-group">
                          <label>
                            {!! Form::checkbox('status', '1',  ($moodle) ? $moodle->status : '' , ['id' => 'status']) !!}
                            Enable Moodle <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="Enable of disable Moodle"></i>
                          </label>
                        </div>
                        {!! Form::submit($moodle!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                        <a class="btn btn-danger" href="{{ url()->previous() }}">Cancel</a>
                      </fieldset>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div> 
@endsection

@push('plugin-scripts')
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('public/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') !!}
    {!! Html::script('public/assets/plugins/icheck/icheck.min.js') !!}
    {!! Html::script('public/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/assets/plugins/typeaheadjs/typeahead.bundle.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/toastDemo.js') !!}
    {!! Html::script('public/assets/js/validation/teacherForm-validation.js') !!}
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
