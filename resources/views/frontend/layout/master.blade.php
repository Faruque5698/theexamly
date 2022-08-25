<?php 
use App\Models\Backend\Course;
use App\Models\Backend\Subject;
use App\Models\Backend\CourseCategory;
use App\Models\Backend\GenaralSettings;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Evaluate Yourself</title>
    
    <meta name="author" content="">
    <meta name="keywords" content="theExamly,BSC, বিসিএস , বিসিএস প্রস্তুতই পরীক্ষা ,প্রাথমিক শিক্ষক নিয়োগ প্রস্তুতি পরীক্ষা, প্রাথমিক শিক্ষক নিয়োগ,স্কুল পর্যায় শিক্ষক নিবন্ধন, বেসরকারি প্রভাষক নিবন্ধন, এস এস সি, এস এস সি প্রস্তুতি পরীক্ষা, এইচ এস সি, এইচ এস সি প্রস্তুতি পরীক্ষা">
    <meta name="description" content="বিসিএস প্রিলিমিনারি, সরকারী চাকুরী, ব্যাংক, শিক্ষক নিয়োগ, মেডিকেল, ইঞ্জিনিয়ারিং, বিশ্ববিদ্যালয়ে ভর্তি, এস এস সি ও এইচ এস সি পাবলিক পরীক্ষা প্রস্তুতির জন্য নিজেকে মূল্যায়নের সকল আয়োজন।">
    
    <meta property="og:title" content="theExamly - Evaluate Yourself" />
    <meta property="og:site_name" content="theExamly|theExamly.com| theexamly.com" />
    <meta property="og:description" content="বিসিএস প্রিলিমিনারি, সরকারী চাকুরী, ব্যাংক, শিক্ষক নিয়োগ, মেডিকেল, ইঞ্জিনিয়ারিং, কৃষি বিশ্ববিদ্যালয় সহ বিশ্ববিদ্যালয়ের ভর্তি প্রস্তুতি এছাড়াও এস এস সি ও এইচ এস সি পাবলিক পরীক্ষা প্রস্তুতির জন্য অধ্যয়ন ও নিজেকে নিজে মূল্যায়নের রয়েছে সকল আয়োজন"/>
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://theexamly.com"/>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!--<script async src="https://www.googletagmanager.com/gtag/js?id=G-YSYG2CN2XW"></script>-->
    
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZKS9QR2ZY4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ZKS9QR2ZY4');
</script>

    <!-- favicon -->

    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="{{ asset('public/frontend/images/favicon/apple-touch-icon.png')  }}"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="{{ asset('public/frontend/images/favicon/favicon-32x32.png') }}"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset('public/frontend/images/favicon/favicon-16x16.png') }}"
    />
    <link rel="manifest" href="{{ asset('public/frontend/images/favicon/site.webmanifest') }}" />

    <!-- bootstrap css -->
    {!! Html::style('public/frontend/css/bootstrap.min.css') !!}

    <!-- google font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- fontawesome -->
    {!! Html::style('public/frontend/fonts/fontawesome-5-15-2/css/all.min.css') !!}

    <!-- magnific popup -->
    {{-- <link rel="stylesheet" href=".public/frontend/css/magnific-popup.css" /> --}}
    <!-- custom css -->
  @stack('plugin-styles')
    {!! Html::style('public/frontend/css/style.css') !!} 
    {!! Html::style('public/frontend/css/custom.css') !!} 
    {{-- {!! Html::style('public/frontend/css/developerStyle.css') !!}  --}}
  @stack('style')
    
</head>

<body id="home" data-spy="scroll" data-target="#navbarSupportedContent" data-offset="0">
    <!-- Load Facebook SDK for JavaScript -->
      <!--<div id="fb-root"></div>-->
      <!--<script>-->
      <!--  window.fbAsyncInit = function() {-->
      <!--    FB.init({-->
      <!--      xfbml            : true,-->
      <!--      version          : 'v10.0'-->
      <!--    });-->
      <!--  };-->

      <!--  (function(d, s, id) {-->
      <!--  var js, fjs = d.getElementsByTagName(s)[0];-->
      <!--  if (d.getElementById(id)) return;-->
      <!--  js = d.createElement(s); js.id = id;-->
      <!--  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';-->
      <!--  fjs.parentNode.insertBefore(js, fjs);-->
      <!--}(document, 'script', 'facebook-jssdk'));</script>-->

      <!-- Your Chat Plugin code -->
      <!--<div class="fb-customerchat"-->
      <!--  attribution="setup_tool"-->
      <!--  page_id="116134766968285">-->
      <!--</div>-->
    <header>
      <!-- navbar top -->
      <section class="navbar_top py-2">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div
                class="d-flex flex-column flex-md-row align-items-center justify-content-md-between"
              >
                <div class="left_navbar_top d-flex flex-column flex-md-row">
                  <span class="mr-3"
                    ><span class="text_color_primary">কল করুন: </span
                    >
                    <span style="font-weight: 500;">+৮৮@php echo GenaralSettings::get()->first()->phone;@endphp
                    </span>
                    <!--<a class="link text-decoration-none" href="#"-->
                    <!--  >+৮৮@php echo GenaralSettings::get()->first()->phone;@endphp-->
                    <!--</a>-->
                  </span>
                  <span
                    ><span class="text_color_primary">ইমেইল করুন: </span
                    ><a class="link text-decoration-none" href="mailto:"
                      >@php $genaralSettings = GenaralSettings::get()->first(); 
                         @endphp {{ $genaralSettings->email }}</a
                    ></span
                  >
                </div>
                {{-- start for login user only --}}
                @if(Auth::user())
                <div class="right_navbar_top">
                  <div class="auth_user dropdown">
                    <a
                      class="dropdown_btn dropdown-toggle"
                      href="#"
                      role="button"
                      id="dropdownMenuLinkAvatar"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      @if(empty(Auth::user()->user_image))
                      <img
                        src="{{ asset('public/uploads/user_images/default.jpg') }}"
                        class="avatar rounded-circle"
                        alt="auth"
                      />
                      @else
                        <img
                        src="{{ asset('public/uploads/user_images/') }}/{{ Auth::user()->user_image }}"
                        class="avatar rounded-circle"
                        alt="auth"
                      />
                      @endif
                      {{ Auth::user()->name }}
                    </a>

                    <div
                      class="dropdown-menu dropdown_menu"
                      aria-labelledby="dropdownMenuLinkAvatar"
                    >
                      <a class="dropdown-item dropdown_item" href="http://theexamly.com/admin/dashboard"
                        >পরীক্ষা কেন্দ্র </a
                      >
                      {{-- <a class="dropdown-item dropdown_item" href="#"
                        >Setting</a
                      > --}}
                      <a class="dropdown-item dropdown_item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">লগ আউট</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </div>
                  </div>
                </div>
                {{-- end for login user only --}}
                {{-- If not login start --}}
                @else
                <div class="right_navbar_top">
                  <a class="btn_primary text-decoration-none" href="{{ route('user.login') }}"
                    ><span>লগ-ইন</span>
                  </a>
                  <a
                    class="btn_primary text-decoration-none"
                    href="{{ route('frontend.showAdmissionForm') }}"
                    ><span>রেজিস্ট্রেশন</span>
                  </a>
                </div>
                @endif
                {{-- If not login end --}}
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- navbar -->
      <nav class="navbar navbar_main navbar-expand-lg sps py-lg-0 py-2">
        <div class="container py-0">
          <a class="navbar-brand" href="{{ route('frontend.index') }}">
            <h1><img src="{{ asset('public/frontend/images/logo/logo.webp') }}" alt="theExamly - Evaluate Yourself." class="logo"/></h1>
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon">
              <i class="fas fa-bars"></i>
            </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav navbar_nav mx-auto">
              <li class="nav-item nav_item">
                <a
                  id="scrollToHom"
                  class="nav-link nav_link active"
                  href="{{ route('frontend.index') }}"
                >
                  <span class="mr-1"><i class="fas fa-home"></i></span> হোম</a
                >
              </li>

                            <li class="nav-item nav_item dropdown">
                <a
                  class="nav-link nav_link dropdown-toggle"
                  href="#"
                  id="navbarScrollingDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-expanded="false"
                >
                  <span class="mr-1"><i class="fas fa-book-open"></i></span>
                  প্রস্তুতি পরীক্ষা সমূহ
                </a>
                <ul
                  class="dropdown-menu dropdown_menu"
                  aria-labelledby="navbarScrollingDropdown"
                >
                  @php 
                    $ExamCategory = CourseCategory::where('status',1)->orderBy('serial', 'DESC')->get();
                    $group = DB::table('course_course_category')->orderBy('serial','ASC')->get();
                  @endphp
                  @foreach($ExamCategory as $key=> $value)

                  <li class="dropdown-submenu dropdown">
                    <a
                      class="dropdown-item dropdown_item dropdown-toggle"
                      href="#"
                      role="button"
                      id="dropdownSubMenuLink"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                      >{{ $value->name }}</a
                    >
                    <ul
                      class="dropdown-menu dropdown_menu"
                      aria-labelledby="dropdownSubMenuLink"
                    >
                    @foreach($group as $key=> $groups)
                      @if($value->id == $groups->course_category_id)
                            
                        @php

                          $group2= DB::table('courses')->where("courses.id",$groups->course_id)->where('courses.status','1')->get()->pluck('full_name','id');
                        
                        @endphp
                        @foreach($group2 as $key=> $groupType)
                      <li>
                        <a class="dropdown-item dropdown_item" href="{{ route('frontend.courses',[$groupType]) }}"
                          >{{ $groupType }}</a
                        >
                      </li>
                     
                      @endforeach
                       @endif
                    @endforeach  
                    </ul>
                  </li>
                  @endforeach
                </ul>
              </li>
              <li class="nav-item nav_item">
                @if(!empty(Auth::user()->id))
                    <a
                      id="scrollToTesimonials"
                      class="nav-link nav_link"
                      href="{{ route('admin.dashboard') }}"
                    >
                    <span class="mr-1"><i class="fas fa-check-square"></i></span>
                    পরীক্ষা কেন্দ্র
                  </a>
                @else
                  <a
                    id="scrollToTesimonials"
                    class="nav-link nav_link"
                    href="{{ route('user.login') }}"
                  >
                  <span class="mr-1"><i class="fas fa-check-square"></i></span>
                  পরীক্ষা কেন্দ্র
                </a>
                @endif
              </li>
              <!--<li class="nav-item nav_item">-->
              <!--  <a-->
              <!--    id="scrollToBoo"-->
              <!--    class="nav-link nav_link"-->
              <!--    href="{/{ route('userManual.detail') }}"-->
              <!--  >-->
              <!--    <span class="mr-1"><i class="fas fa-file-alt"></i></span> ব্যবহারবিধি  </a-->
              <!--  >-->
              <!--</li>-->
              <!--<li class="nav-item nav_item">-->
              <!--  <a-->
              <!--    id="scrollToTesimonials"-->
              <!--    class="nav-link nav_link"-->
              <!--    href="#scrollTesimonials"-->
              <!--  >-->
              <!--    <span class="mr-1"><i class="fas fa-comments"></i></span>-->
              <!--    পরীক্ষার্থীদের মন্তব্য</a-->
              <!--  >-->
              <!--</li>-->

              <!--<li class="nav-item nav_item">-->
              <!--  <a-->
              <!--    id="scrollToBlo"-->
              <!--    class="nav-link nav_link"-->
              <!--    href="{/{ route('blog') }}"-->
              <!--  >-->
              <!--    <span class="mr-1"><i class="fab fa-blogger-b"></i></span>-->
              <!--    ব্লগ</a-->
              <!--  >-->
              <!--</li>-->
              <li class="nav-item nav_item">
                <a class="nav-link nav_link" href="{{ route('frontend.contact') }}">
                  <span class="mr-1"><i class="fas fa-address-book"></i></span>
                  যোগাযোগ</a
                >
              </li>
              <!--<li class="nav-item nav_item">-->
              <!--  <a class="nav-link nav_link" href="{{ url('https://play.google.com/store/apps/details?id=theexamly.com') }}">-->
              <!--    <span class="mr-1"><i class="fas fa-mobile-alt"></i></span>-->
              <!--    <span class="mr-1"><i class="fab fa-google-play"></i></span>-->
              <!--    মোবাইল অ্যাপ</a-->
              <!--  >-->
              <!--</li>-->
            </ul>
            <div class="google_play pb-3 pb-lg-0">
              <div class="google-logo mr-2">
                <a href="{{ url('https://play.google.com/store/apps/details?id=theexamly.com') }}">
                  <img class="img-fluid app-logo" src="{{asset('public/uploads/appLogo/google_store.webp')}}" alt="google_play_store">
                </a>
              </div>
              <div class="ios-logo">
                <a href="{{ url('https://www.apple.com/app-store/') }}">
                  <img class="img-fluid app-logo" src="{{asset('public/uploads/appLogo/ios.webp')}}" alt="ios_store">
                </a>
              </div>
              <!--<a href="{{ url('https://play.google.com/store/apps/details?id=theexamly.com') }}" class="btn">-->
              <!--  <i class="fab fa-google-play"></i-->
              <!--  ><span class="sub_title">Get Android App On</span-->
              <!--  ><span class="title">Google Play</span>-->
              <!--</a>-->
            </div>
          </div>
        </div>
      </nav>
    </header>


    @yield('content')

    <footer>
      <section class="footer">
        <!-- footer link section -->
        <div class="footer_link_section py-5">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-md-5 col-lg-4">
                <div class="footer_text">
                  <div class="footer_logo">
                    <img
                      class="img-fluid"
                      src="{{ asset('public/frontend/images/logo/logo.png') }}"
                      alt="logo"
                    />
                  </div>
                  <p class="paragraph mb-0 py-2" style="text-align:justify"><a href="#" style="color:white">theExamly.com</a> অনলাইনে অনুশীলনের একটি দুর্দান্ত সমাধান, কারণ আমাদের রয়েছে চাকুরীর জন্য বিসিএস প্রিলিমিনারি, সরকারী চাকুরী, প্রাইমারি শিক্ষক নিয়োগ, স্কুল-কলেজ-মাদ্রাসার শিক্ষক নিবন্ধন, মেডিকেল / ইঞ্জিনিয়ারিং / কৃষি বিশ্ববিদ্যালয় সহ সকল পাবলিক বিশ্ববিদ্যালয়ের পরীক্ষা এবং পাবলিক পরীক্ষা যেমন- এস এস সি ও এইচ এস সি পরীক্ষাগুলির জন্য অসংখ্য প্রশ্নের বৃহৎ সুবিন্যস্ত ডাটাবেস সমৃদ্ধ সিস্টেম। </p>
                  <!--<div class="footer_social_icons">-->
                  <!--  <a class="icon_link text-decoration-none mr-1" href="https://www.facebook.com/theExamly">-->
                  <!--    <i class="fab fa-facebook-f"></i>-->
                  <!--  </a>-->
                  <!--  <a class="icon_link text-decoration-none mr-1" href="#">-->
                  <!--    <i class="fab fa-twitter"></i>-->
                  <!--  </a>-->
                  <!--  <a class="icon_link text-decoration-none mr-1" href="#">-->
                  <!--    <i class="fab fa-youtube"></i>-->
                  <!--  </a>-->
                  <!--  <a class="icon_link text-decoration-none" href="#">-->
                  <!--    <i class="fab fa-linkedin-in"></i>-->
                  <!--  </a>-->
                  <!--</div>-->
                </div>
              </div>
              <div class="col-12 col-md-3 col-lg-2 mt-4 mt-lg-0">
                <div class="footer_link  text-md-right">
                  <h5 class="header">এক নজরে</h5>
                  <ul>
                    <li>
                      <a class="text-decoration-none link" href="{{ route('aboutUs') }}">
                        আমাদের সম্পর্কে
                      </a>
                    </li>
                    <li>
                      <a class="text-decoration-none link" href="{{ route('userManual.detail') }}">
                        ব্যবহারবিধি
                      </a>
                    </li>
                    {{-- <li>
                      <a class="text-decoration-none link" href="#scrollTesimonials">
                         পরীক্ষার্থীদের মন্তব্য
                      </a>
                    </li> --}}
                    <li>
                      <a class="text-decoration-none link" href="{{ route('privacyPolicy') }}">
                        গোপনীয়তার নীতিমালা
                      </a>
                    </li>
                    <li>
                      <a class="text-decoration-none link" href="{{ route('termsAndConditions') }}">
                         ব্যবহারের শর্তাবলী
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <!--<div class="col-12 col-md-3 col-lg-2 mt-4 mt-lg-0">-->
              <!--  <div class="footer_link text-md-right">-->
              <!--    <h5 class="header">অনুসরণ করুন</h5>-->
              <!--    <ul>-->
              <!--      <li><a class="text-decoration-none link" href="https://www.facebook.com/theExamly">-->
              <!--          ফেইসবুক পেইজ -->
              <!--        </a></li>-->
              <!--      <li><a class="text-decoration-none link" href="#">-->
              <!--          ইউটিউব চ্যানেল -->
              <!--        </a></li>-->
              <!--    </ul>-->
              <!--  </div>-->
              <!--</div>-->
              @php 
                $address = GenaralSettings::get()->pluck('address')->first();
                $mobile = GenaralSettings::get()->pluck('phone')->first();
              @endphp
              <div class="col-12 col-md-3 col-lg-2 mt-4 mt-lg-0 ">
                <div class="footer_address text-md-right">
                  <h5 class="header">যোগাযোগ </h5>
                  <ul style="width: 212px;">
                    
                    {{-- <li class="link" style="width: 180px">{{ $address }} </li> --}}
                    <!--<li class="link">সেলস সাপোর্ট :  {{ $mobile }} </li>-->
                    <li class="link">সেলস সাপোর্ট : ০১৭১৫৬০৩০৪১-৪২  </li>
                    <li class="link">কন্টেন্ট সাপোর্ট :  ০১৭১৫৬০৩০৪৩ </li>
                    <li class="link">সিস্টেম সাপোর্ট : ০১৯১৩৮০০৮০০ </li>
                    <!--<li class="link">সিস্টেম সাপোর্ট :   ০১৭১৫৬০৩০৪৩ </li>-->
                    <!--<li class="link">টেকনিক্যাল সাপোর্ট :             ০১৭১৫৬০৩০৪৭</li>-->
                    <!--<li class="link">গ্রীন রোড , ঢাকা ১২০৫</li>-->
                    <!--<li class="link">মোবাইল : ০১৯১৩৮০০৮০০</li>-->
                  </ul>
                  <div class="footer_social_icons mt-2">
                      <a class="icon_link text-decoration-none mr-1" target="_blank" href="https://www.facebook.com/theExamly">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                      <a class="icon_link text-decoration-none mr-1" target="_blank" href="#">
                        <i class="fab fa-youtube" style="background-color: #FF0000;"></i>
                      </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- footer copyright -->
        <div class="footer_copyright">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="footer_copyright_text text-center py-3">
                  স্বত্ব &copy; <span id="year"></span> - এক্সামলী কর্তৃক
                  সর্বস্বত্ব সংরক্ষিত । ডেভেলপমেন্ট অ্যান্ড মেইনটেনান্স বাই
                  <a
                    class="secondary_color hover_secondary_color" style="color: white"
                    href="https://desktopit.net/"
                    >ডেস্কটপ আইটি</a
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="shurjoPay col-lg-12">
              <div class="text-center">
                <img src="{{ asset('public/frontend/images/shurjoPayFooter.webp') }}" class="mw-100" alt="shurjoPay_banner">
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- back to top -->
      <section class="back_to_top">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <a class="text-decoration-none back_to_top_btn" href="#home">
                <i class="fas fa-arrow-up"></i>
              </a>
            </div>
          </div>
        </div>
      </section>
    </footer>

    @stack('backToTop')

    <!-- js -->
    {!! Html::script('public/frontend/js/jquery-3.5.1.min.js') !!}
    {!! Html::script('public/frontend/js/bootstrap.bundle.min.js') !!}
    {!! Html::script('public/frontend/js/scrollPosStyler.min.js') !!}
    {!! Html::script('public/frontend/js/jquery.anchorScroll.min.js') !!}
    @stack('plugin-scripts')

    <!-- custom js -->
    {!! Html::script('public/frontend/js/common.js') !!}    
    @stack('custom-scripts')
  </body>

</html>