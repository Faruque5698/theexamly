@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
@endpush

@section('content')  
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Teachers</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.teacher.index')}}">Teacher Responsibility</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Add Teacher Responsibility</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row grid-margin">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    {{-- <h4 class="card-title">Teachers Information</h4> --}}
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div><br />
                    @endif
                    <form class="cmxform" id="teacherForm" method="post" action="{{ route('admin.teacher.teacherResponsibilityStore') }}" enctype="multipart/form-data">
                        @csrf
                      <fieldset>
                        <div class="form-group">
                          <label for="details">Resposibility</label>
                          {!! Form::textarea('description', null ,array('required', 'class'=>'form-control', 'id'=>'summary-ckeditor')) !!} 
                        </div>
                        <div class="form-group">
                          <label>
                            {!! Form::checkbox('status', '1', old('status'), ['id' => 'status']) !!}
                            Enable this Responsibility <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can enable or disable this responsibility"></i>
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
    {!! Html::script('/assets/plugins/icheck/icheck.min.js') !!}
    {!! Html::script('/assets/plugins/typeaheadjs/typeahead.bundle.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/validation/teacherForm-validation.js') !!}
    {!! Html::script('/assets/js/iCheck.js') !!}
    {!! Html::script('/assets/js/typeahead.js') !!}
    {!! Html::script('/assets/plugins/ckeditor/ckeditor.js') !!}
    {!! Html::script('/assets/js/toastDemo.js') !!}

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
      CKEDITOR.replace( 'summary-ckeditor' );
    </script>
@endpush
