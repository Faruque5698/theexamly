@extends('backend.layout.master')

@push('plugin-styles')
  {!! Html::style('public/assets/plugins/jquery-bar-rating/dist/themes/css-stars.css') !!}
  {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
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
                        <li class="breadcrumb-item active" aria-current="page"><span>Profile</span></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-5">
                    <div class="border-bottom text-center pb-4">
                      <img src="{{ asset('/uploads/user_images') }}/{{ $user->user_image }}" alt="profile" class="img-lg rounded-circle mb-3" style="width: 160px; height:160px; border-radius: 5px"/>
                      <h2>{{ $user->name }}</h2>{{ $user->email }}<br><br>
                      <div class="d-flex justify-content-between">
                        @permission('change_image')
                        <button class="btn btn-success" onclick="window.location.href='{{ url('/admin/profileImage') }}'">Change Image</button>
                        @endpermission
                        @permission('change_password')
                        <button class="btn btn-success" onclick="window.location.href='{{ url('/admin/profile/changePassword') }}'">Change Password</button>
                        @endpermission
                      </div>
                    </div>
                    <div class="py-4">
                      <p class="clearfix">
                        <span class="float-left"> Status </span>
                        <span class="float-right text-muted"> Active </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left"> User Name </span>
                        <span class="float-right text-muted"> {{ $user->name }} </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left"> User Type </span>
                        <span class="float-right text-muted"> {{ $user->user_type }} </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left"> Mail </span>
                        <span class="float-right text-muted"> {{ $user->email }} </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left"> Mobile Number </span>
                        <span class="float-right text-muted"> {{ $user->phone }} </span>
                      </p>
                    </div>
                    <a class="btn btn-primary btn-block" href="{{ route('admin.dashboard') }}">Back</a>
                  </div>
                  <div class="col-lg-7">
                    <div class="d-flex justify-content-between">
                      <div>
                        <h3>{{ $user->name }}</h3>
                        <div class="d-flex align-items-center">
                          <h5 class="mb-0 mr-2 text-muted">{{ $user->email }}</h5>
                        </div>
                      </div>
                    </div><br>
                    <div class="mt-4 py-2 border-top border-bottom" style="text-align: center;">
                        Update Profile
                    </div>
                    <div class="profile-feed" style="margin-left: 4%"><br>
                      <div class="col-md-14 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <form  action="{{ route('update.profile') }}" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="PUT">
                              <div class="form-group">
                                <label for="name">Username</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$profile->name}}" required>
                              </div>
                              <div class="form-group">
                                <label for="name">User Type</label>
                                <input type="text" class="form-control" name="user_type" id="name" value="{{$profile->user_type}}" required>
                              </div>
                              <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{$profile->email}}" required>
                              </div>
                              <div class="form-group">
                                <label for="phone">Mobile Number</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{$profile->phone}}">
                              </div>
                              @permission('update')
                              <button type="submit" class="btn btn-primary mr-2">Update</button>
                              @endpermission
                              {{-- <button class="btn btn-light">Cancel</button> --}}
                            </form>
                          </div>
                        </div>
                      </div>  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('public/assets/plugins/jquery-bar-rating/jquery.barrating.js') !!}
  {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/profile-demo.js') !!}
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
