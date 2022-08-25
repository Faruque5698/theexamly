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
                            <li class="breadcrumb-item active" aria-current="page"><a>SMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span> <a href="{{route('admin.sms.phoneBook')}}">Phone Book</a> </span></li>
                            <li class="breadcrumb-item active" aria-current="page"><span> <a href="{{route('admin.sms.phoneBookGroup.createGroup')}}">Phone Book Group</a> </span></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Update Phone Book Group</span></li>
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
                    <form class="cmxform" id="phoneBookForm" method="post" action="{{ route('admin.sms.phoneBookGroup.phoneBookGroupUpdate',$phoneBookGroup->id) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PATCH')
                      <div class="form-group">
                        <label for="group_name">Group Name</label><span class="requiredStar" style="color: red"> *</span>
                        <input type="text" class="form-control" id="group_name" name="group_name" value="{{ $phoneBookGroup->group_name }}" placeholder="Enter name" style="width: 200px" required>
                      </div>
                      <button type="submit" class="btn btn-primary">Update</button>
                      <a href="{{ route('admin.sms.phoneBookGroup.createGroup') }}" class="btn btn-danger">Back</a>
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
