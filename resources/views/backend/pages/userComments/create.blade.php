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
                            <li class="breadcrumb-item active" aria-current="page"><a>Comments</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Comments Add</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row grid-margin">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Text your comment</h4>
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div><br />
                    @endif
                    <form class="cmxform" id="commentsForm" method="post" action="{{ route('admin.userComments.store') }}" enctype="multipart/form-data">
                        @csrf
                      <fieldset>
                        <input id="subject" class="form-control" name="user_id" type="hidden" value="{{ Auth::id() }}">
                        <div class="form-group">
                          <label for="subject">Title<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="subject" class="form-control" name="subject" minlength="3" type="text" required>
                        </div>
                        <div class="form-group">
                          <label for="comments">Comments<span class="requiredStar" style="color: red"> * </span></label>
                          <textarea id="comments" class="form-control" name="comments" rows="4" required></textarea>
                        </div>
                        {{-- <div class="form-group">
                          <label>
                            {!! Form::checkbox('status', '1', old('status'), ['id' => 'status']) !!}
                            Enable this Teacher <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can enable or disable this teacher"></i>
                          </label>
                        </div> --}}
                        <input class="btn btn-primary" type="submit" value="Post">
                        <a class="btn btn-danger" href="{{ route('admin.userComments.create') }}">Cancel</a>
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
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/validation/commentsForm-validation.js') !!}
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
