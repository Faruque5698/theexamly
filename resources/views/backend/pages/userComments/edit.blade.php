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
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.userComments.index')}}">Comments List</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Update Comments</span></li>
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
                    <h4 class="card-title">Update your comment</h4>
                    <form class="cmxform" id="commentsForm" method="post" action="{{ route('admin.userComments.update',$userComments->id) }}" enctype="multipart/form-data" accept-charset="utf-8" name="edit">
                      @csrf
                      @method('PATCH')
                      <fieldset>
                        <input id="subject" class="form-control" name="user_id" type="hidden" value="{{ $userComments->user_id }}">
                        <div class="form-group">
                            <label for="subject">Title<span class="requiredStar" style="color: red"> * </span></label>
                            <input id="subject" class="form-control" name="subject" minlength="3" type="text" value="{{ $userComments->subject }}" required>
                        </div>
                        <div class="form-group">
                          <label for="comments">Comments<span class="requiredStar" style="color: red"> * </span></label>
                          <textarea id="comments" class="form-control" name="comments" value="{{ $userComments->comments }}" rows="4" required>{{ $userComments->comments }}</textarea>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Update">
                        <a class="btn btn-danger" href="{{ route('admin.teacher.index') }}">Back</a>
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
    {!! Html::script('public/assets/js/img-preview.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/validation/commentsForm-validation.js') !!}
    {!! Html::script('public/assets/js/bt-maxlength.js') !!}
    {!! Html::script('public/assets/js/file-upload.js') !!}
    {!! Html::script('public/assets/js/iCheck.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/typeahead.js') !!}
    {!! Html::script('public/assets/js/toastDemo.js') !!}

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
