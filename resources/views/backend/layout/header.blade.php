<?php
use App\Models\Backend\BatchStudent;
use Carbon\Carbon;;
use App\Models\Backend\GenaralSettings;
use App\Models\Frontend\CashOnPayment;
use App\User;

$current = Carbon::today();
$trialExpires = Carbon::today()->addDays(6);
$dueAlart = BatchStudent::with(['User','batch'])->where('due_amount','>',0)->whereBetween('commitment_date', [$current, $trialExpires])->get();
$counts = count($dueAlart);
//CashOnPayment list count start
$list = CashOnPayment::where('status',0)->get()->count();
//CashOnPayment list count end
?>

<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{ url('/') }}"><img src="{{ url('public/frontend/images/logo/logo.png') }}"
                class="ml-2" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}"><img
                src="{{ url('public/assets/images/logo-mini.png') }}" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="ti-layout-grid2"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
            <div class="google_play pb-0 pb-md-3  pb-lg-0">
              <div class="google-logo mr-1">
                <a href="{{ url('https://play.google.com/store/apps/details?id=theexamly.com') }}">
                  <img class="app-logo" src="{{asset('public/uploads/appLogo/google_store.jpg')}}">
                </a>
              </div>
              <div class="ios-logo  mr-2">
                <a href="{{ url('https://www.apple.com/app-store/') }}">
                  <img class="app-logo" src="{{asset('public/uploads/appLogo/ios.jpg')}}">
                </a>
              </div>
            </div>
            <!--<li class="nav-item nav-profile dropdown">-->
            <!--    <a class="nav-link dropdown-toggle" href="{{ url('https://play.google.com/store/apps/details?id=theexamly.com') }}"-->
            <!--        id="notificationDropdown">-->
            <!--        <i class="fa fa-download"></i><span class="badge badge-primary">মোবাইল অ্যাপ </span>&nbsp;-->
            <!--    </a>-->
            <!--</li>-->
            {{-- @permission('notification_drop-down')
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="{{ url('/admin/notification') }}" data-toggle="dropdown"
            id="notificationDropdown">
            <i class="fa fa-bell"></i><span class="badge badge-danger">{{ $counts }}</span>&nbsp;
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
                @foreach($dueAlart as $key=>$due)
                <a href=""
                    class="dropdown-item">{{ $due->user->name ?? ''}}_{{ $due->due_amount ?? ''}}_{{ date('d-m-Y', strtotime($due->commitment_date ?? ''))}}</a>
                @endforeach
            </div>
            </li>
            @endpermission --}}
            @permission('notification_button')
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="{{ url('/admin/notification/cashOnPaymentList') }}"
                    id="notificationDropdown">
                    <i class="fa fa-bell"></i><span class="badge badge-danger">{{ $list }}</span>&nbsp;
                </a>
            </li>
            @endpermission
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="{{ asset('public/uploads/user_images') }}/{{Auth::user()->user_image }}" />&nbsp;

                    {{ $currentUser ?? '' }}
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    @permission('profile')
                    <a href="{{ url('/admin/profile') }}" class="dropdown-item">
                        <i class="ti-bookmark-alt text-primary"></i>প্রোফাইল
                        <!--Profile-->
                    </a>
                    @endpermission
                    @permission('profile_change_password')
                    <a href="{{ url('/admin/profile/changePassword') }}" class="dropdown-item">
                        <i class="ti-key text-primary"></i>
                        পাসওয়ার্ড পরিবর্তন করুন
                    </a>
                    @endpermission
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="ti-power-off text-primary"></i>লগ আউট
                        <!--{{ __('Logout') }}-->
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <!--<div class="dropdown-divider"></div>-->
                    <!--<div class="exam_panel">-->
                    <!--    <form class="loginform" name="login" method="post" action="https://oe.theexamly.com/login/index.php">-->

                    <!--    <input size="10" type="hidden" name="username" value="{{ Auth::user()->email }}" />-->
                    <!--    <input size="10" type="hidden" name="password" value="{{ Auth::user()->raw_password }}" />-->
                    <!--    <button type="submit" class="btn btn-primary exam_panel_btn" href="#">পরীক্ষার কেন্দ্রে-->
                    <!--        যান </button>-->
                    <!--</form>-->
                    <!--    {{-- <form>-->
                    <!--        <button type="button" class="btn btn-primary exam_panel_btn " href="#">পরীক্ষার কেন্দ্রে-->
                    <!--            যান </button>-->
                    <!--    </form> --}}-->
                    <!--</div>-->
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="ti-layout-grid2"></span>
        </button>
    </div>
</nav>