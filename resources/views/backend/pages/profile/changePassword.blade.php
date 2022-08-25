@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
@endpush

@section('content')
	<div class="col-md-12 grid-margin stretch-card">
    	<div class="card">
        	<div class="card-header">
            	<div class="template-demo">
                	<nav aria-label="breadcrumb" class="nav-container">
                    	<ol class="breadcrumb breadcrumb-custom ">
                        	@if(Auth::user()->user_type=="Student" || Auth::user()->user_type=="Teacher")
                    			<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                    class="fa fa-bars"></i>&nbsp;পরীক্ষা কেন্দ্র</a></li>
                        		<li class="breadcrumb-item active" aria-current="page"><a>প্রোফাইল</a></li>
                        		<li class="breadcrumb-item active" aria-current="page"><span>পাসওয়ার্ড পরিবর্তন করুন </span></li>
                        	@else
                        		<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                    class="ti-home"></i>&nbsp;Dashboard</a></li>
                        		<li class="breadcrumb-item active" aria-current="page"><a>Profile</a></li>
                        		<li class="breadcrumb-item active" aria-current="page"><span>Change Password</span></li>
                        	@endif
                    	</ol>
                	</nav>
            	</div>
        	</div><br>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="col-md-8">
								<form class="cmxform" id="passwordForm" action="{{ route('admin.change.password') }}" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
									@csrf
									<div class="form-group">
										<label class="col-sm-3 control-label">পূর্বের পাসওয়ার্ড<span class="requiredStar" style="color: red"> * </span></label>
										<div class="col-sm-9">
											<input type="password" class="form-control" name="oldpassword" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">নতুন পাসওয়ার্ড <span class="requiredStar" style="color: red"> * </span></label>
										<div class="col-sm-9">
											<input type="password" class="form-control" name="password" id="password" minlength="8" required>
											<small class="form-text text_muted text-justify" style="font-size: 10px;">পাসওয়ার্ডটিতে অবশ্যই বড় হাতের অক্ষর, ছোট হাতের অক্ষর, সংখ্যা এবং একটি স্পেশাল ক্যারেক্টার (!,@,#,$,%,^,&,*) সহ কমপক্ষে ৮ টি অক্ষর থাকতে হবে।</small>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">কনফার্ম পাসওয়ার্ড<span class="requiredStar" style="color: red"> * </span></label>
										<div class="col-sm-9">
											<input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-9">
											<button type="submit" class="btn btn-info">পাসওয়ার্ড পরিবর্তন করুন </button>
											<a class="btn btn-md btn-danger" href="{{ URL::previous() }}">বাতিল</a>
										</div>
									</div>
								</form>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('plugin-scripts')
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('public/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/validation/passwordForm-validation.js') !!}
    {!! Html::script('public/assets/js/bt-maxlength.js') !!}
    {!! Html::script('public/assets/js/toastDemo.js') !!}
    S
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