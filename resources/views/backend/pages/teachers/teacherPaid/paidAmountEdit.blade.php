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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa-fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Teachers</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.teacher.index')}}">Paid Teacher</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Payment Add</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row grid-margin">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Payment Information</h4>
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div><br />
                    @endif
                    <form class="cmxform" id="teacherForm" method="post" action="{{ route('admin.teacher.paid-teacher-update') }}" enctype="multipart/form-data">
                        @csrf
                      <fieldset>
                        <input id="cname" class="form-control" name="id" value="{{ $teacherDetail->id }}" type="hidden">
                        <div class="form-group">
                          <label for="cname">Teachers Name<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="cname" class="form-control" name="name" value="{{ $teacherDetail->user->name }}" style="cursor: not-allowed;" readonly type="text" required>
                        </div>
                        <div class="form-group">
                          <label for="cemail">E-Mail Address<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="cemail" class="form-control" type="email" name="email" value="{{ $teacherDetail->user->email }}" style="cursor: not-allowed;" readonly display="none"  required>
                        </div>
                        <div class="form-group">
                          <label for="date">Date<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="date" class="form-control" type="text" name="date" value="{{ date('d-m-Y') }}" style="cursor: not-allowed;" readonly required>
                        </div>
                        <div class="form-group">
                          <label for="earned_amount">Earned Amount<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="earned_amount" class="form-control" type="text" name="earned_amount" value="{{ $sum }}" style="cursor: not-allowed;" readonly required>
                        </div>
                        {{-- <div class="form-group">
                          <label for="paid_amount">Paid Amount<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="paid_amount" class="form-control" type="text" name="paid_amount" value="{{ $teacherDetail->paid_amount }}" style="cursor: not-allowed;" readonly required>
                        </div> --}}
                        <div class="form-group">
                          <label for="payment_amount">Payment Amount<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="payment_amount" class="form-control" type="text" name="payment_amount" value="{{ $teacherDetail->payment_amount }}" required>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Update">
                        <a class="btn btn-danger" href="{{ URL::previous() }}">Cancel</a>
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
