@extends('frontend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/frontend/css/magnific-popup.css') !!}
    {!! Html::style('public/frontend/css/slick.css') !!}
@endpush
              
  @section('content')
    <main>
       <!-- banner -->
      <section class="banner">
        <div class="container">
          <div class="row">
            @if(!empty($frontendNotice))
            <div class="col-12 text-center mt-3">
              <div class="temporary_notice" style="font-size: 20px;color: white;margin-bottom: 0rem !important">
                <p class="paragraph">
                  {!! $frontendNotice !!}
                  {{-- এই সাইটটিতে এখন পরীক্ষামূলক সম্প্রচার চলছে। বিধায় এখন পরীক্ষা গুলি সকলের
                  জন্য ফ্রি। --}}
                </p>
              </div>
            </div>
            @else
              <span></span>
            @endif
            <div class="col-12">
              <!--<div-->
              <!--  id="carouselExampleCaptions"-->
              <!--  class="carousel slide carousel-fade"-->
              <!--  data-ride="carousel"-->
              
              
              
              
                <div class="carousel-inner carousel_inner"> 
                  <div class="carousel-item carousel_item active" data-interval="12000">
                   
                    <div class="carousel-caption carousel_caption">
                      <div class="banner_text text-center my-5">
                        <h2 class="header">
                            {{ $activeSlider->header }}
                        </h2>

                        <p class="paragraph text-center d-inline-block">
                            {{ $activeSlider->title }}
                        </p>

                        <div class="banner_action">
                          @if(Auth::user())
                            <a
                              class="get_stared btn_primary text-decoration-none text-uppercase mr-2"
                              href="{{ route('admin.dashboard') }}"
                            >
                              <span>শুরু করুন</span>
                            </a>
                          @else
                            <a
                              class="get_stared btn_primary text-decoration-none text-uppercase mr-2"
                              href="{{ route('user.login') }}"
                            >
                              <span>শুরু করুন</span>
                            </a>
                          @endif

                          <a
                            class="btn_primary text-decoration-none text-uppercase"
                            href="#topCourses"
                          >
                            <span>প্রস্তুতি পরীক্ষা সমূহ</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  @foreach($slider as $key=>$slide)
                  <div class="carousel-item carousel_item" data-interval="12000">
                    <div class="carousel-caption carousel_caption">
                      <div class="banner_text text-center my-5">
                        <h2 class="header">
                          {{-- ঘরে বসে পড়াশোনার সহজ সমাধান --}}
                          {{ $slide->header }}
                        </h2>

                        <p class="paragraph text-center d-inline-block">
                         {{--  ক্লাস ১-১২, ভর্তি পরীক্ষা, বিশ্ববিদ্যালয় ও চাকরি
                          জীবনের জন্য পাবে স্পেশাল কোর্স, মডেল টেস্টসহ ২৪/৭
                          দিকনির্দেশনা ।
                            সিলেক্ট করো তোমার সেকশন, শুরু করো তোমার
                            জার্নি। --}}
                            {{ $slide->title }}
                        </p>

                        <div class="banner_action">
                          @if($slide->get_started=='0')
                              <span></span>
                            @else
                              <a class="get_stared btn_primary text-decoration-none text-uppercase mr-2" href="{{ route('user.login') }}">
                                <span>শুরু করুন </span>
                              </a>
                          @endif
                            @if($slide->exams=='0')
                              <span></span>
                            @else
                              <a
                                class="btn_primary text-decoration-none text-uppercase"
                                href="#topCourses">
                                <span>প্রস্তুতি পরীক্ষা সমূহ</span>
                              </a>
                            @endif  
                        </div>
                      </div>
                    </div>
                  </div>@endforeach
                  {{-- <div class="carousel-item carousel_item">
                    <div class="carousel-caption carousel_caption">
                      <div class="banner_text text-center my-5">
                        <h2 class="header">
                          ঘরে বসে পড়াশোনার সহজ সমাধান
                        </h2>

                        <p class="paragraph text-center d-inline-block">
                          ক্লাস ১-১২, ভর্তি পরীক্ষা, বিশ্ববিদ্যালয় ও চাকরি
                          জীবনের জন্য পাবে স্পেশাল কোর্স, মডেল টেস্টসহ ২৪/৭
                          দিকনির্দেশনা ।
                         
                            সিলেক্ট করো তোমার সেকশন, শুরু করো তোমার
                            জার্নি।
                        </p>

                        <div class="banner_action">
                          <a
                            class="get_stared btn_primary text-decoration-none text-uppercase mr-2"
                            href="{{ route('user.login') }}"
                          >
                            <span>শুরু করুন</span>
                          </a>

                          <a
                            class="btn_primary text-decoration-none text-uppercase"
                            href="#topCourses"
                          >
                            <span>এক্সাম সমহ</span>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div> --}}
                </div>
                
              </div>
            </div>
            <div class="col-12">
              <img
                class="img-fluid"
                src="{{ asset('public/frontend/images/banner/banner.webp') }}"
                alt="banner"
              />
            </div>
          </div>
        </div>
      </section>

      <!-- search box -->
      {{-- <section class="search_box mt-5">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="d-flex align-items-center justify-content-center">
                <form class="form-inline search_box_form">
                  <div class="input-group">
                    <input
                      type="text"
                      class="form-control form_control"
                      placeholder="What do you want to learn?"
                    />
                    <div class="input-group-append">
                      <button class="btn search_box_btn" type="button">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section> --}}
      <!--<div class="text-center"  style="font-size: 18px;margin-top: 2px">আপনি শিক্ষক হিসাবে অংশগ্রহণ করতে চাইলে <a href="{{ route('teacher_registration') }}"><strong>রেজিস্ট্রেশান</strong></a> করুন।</div>-->
      <!-- top courses -->
      <section class="top_courses" id="topCourses">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-6 col-lg-4 mb-3 mb-lg-0">
              <div class="top_courses_text">
                <h2 class="header mb-0">
                  <span class="primary_color">প্রস্তুতি পরীক্ষা</span>
                  <span class="secondary_color">সমূহ </span>
                </h2>
                <p class="my-3" style="text-align:justify">
                    বিসিএস প্রিলিমিনারি, সরকারী চাকুরী, শিক্ষক নিয়োগ, মেডিকেল, ইঞ্জিনিয়ারিং, কৃষি বিশ্ববিদ্যালয় সহ বিশ্ববিদ্যালয়ের ভর্তি প্রস্তুতি এছাড়াও এস এস সি ও এইচ এস সি পাবলিক পরীক্ষা প্রস্তুতির জন্য অধ্যয়ন ও নিজেকে নিজে মূল্যায়নের রয়েছে সকল আয়োজন। আপনার উপযুক্ত মডেলটেস্ট পরীক্ষাটি বেছে নিয়ে পরীক্ষায় অংশগ্রহণ করুন। </p>
                <!--<div class="top_courses_action">-->
                <!--  <a class="btn_primary text-decoration-none" href="{{ route('frontend.courses',['বিসিএস']) }}"-->
                <!--    ><span>বিস্তারিত</span>-->
                <!--  </a>-->
                <!--</div>-->
              </div>
            </div>
            
            @php
              $group = DB::table('course_course_category')->orderBy('serial','ASC')->get();
            @endphp
            @foreach($ExamCategory as $key=> $value)
           
            <div class="col-12 col-md-6 col-lg-4">
              <div class="single_courses">
                <div class="contents">
                  <div class="content-overlay"></div>
                <a href="#">
                  <div class="course_image text-center">
                    <img
                      class="img-fluid"
                      src="{{ asset('public/uploads/course') }}/{{ $value->image }}"
                      alt="top-courses"
                    />
                  </div>
                </a>
                <div class="content-details p-3 fadeIn-bottom">
                  
                    <ul class="">
                      @foreach($group as $key=> $groups)
                        @if($value->id == $groups->course_category_id)
                              
                          @php

                            $group2= DB::table('courses')->where("courses.id",$groups->course_id)->where('courses.status','1')->get()->pluck('full_name','id');
                          
                          @endphp
                          @foreach($group2 as $key=> $groupType)
                          <li><a class="btn btn-light" href="{{ route('frontend.courses',[$groupType]) }}">{{ $groupType }}</a></li>
                       
                        @endforeach
                        @endif
                    @endforeach 
                    </ul>
                  </div>  
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      <!-- tesimonials -->
      @php
        foreach($achievement as $key=>$achievements)
      @endphp
      @if(!empty($achievements))
      <section class="achievements">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-6">
              <div class="achievements_image text-center">
                <img
                  class="img-fluid"
                  src="{{ asset('public/uploads/files/achievement/') }}/{{ $achievements->image }}"
                  alt="achivement"
                />
              </div>
            </div>
            <div class="col-12 col-lg-6 mt-3 mt-lg-0">
              <div class="achievements_content_text text-right">
                <h2 class="header mb-0">
                  <span class="primary_color">আমাদের</span>
                  <span class="secondary_color">অর্জন</span>
                </h2><br>
                {{-- <p class="paragraph my-3">
                  কোর্স, কুইজ, ইন্টারেক্টিভ একাডেমিক পরীক্ষা,
                  প্রফেশনাল এবং স্কিল ডেভেলপমেন্ট কোর্সসমূহ পাবে সব সময়।
                </p> --}}
              </div>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <div
                    class="single_achivement d-flex align-items-center justify-content-start p-4"
                  >
                    <div class="icon mr-2">
                      <i class="fas fa-book-open"></i>
                    </div>
                    <div class="single_achivement_text">
                      <h5 class="header mb-0">{{ $achievements->no_of_quiz }}+</h5>
                      <p class="paragraph mb-0">প্রশ্ন ব্যাংক</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div
                    class="single_achivement d-flex align-items-center justify-content-start p-4"
                  >
                    <div class="icon mr-2">
                      <i class="fas fa-spell-check"></i>
                    </div>
                    <div class="single_achivement_text">
                      <h5 class="header mb-0">{{ $achievements->no_of_exam }}+</h5>
                      <p class="paragraph mb-0">পরীক্ষার সংখ্যা</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div
                    class="single_achivement d-flex align-items-center justify-content-start p-4"
                  >
                    <div class="icon mr-2">
                      <i class="fas fa-users"></i>
                    </div>
                    <div class="single_achivement_text">
                      <h5 class="header mb-0">{{ $achievements->no_of_candidates }}+</h5>
                      <p class="paragraph mb-0">পরীক্ষার্থীর সংখ্যা</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <div
                    class="single_achivement d-flex align-items-center justify-content-start p-4"
                  >
                    <div class="icon mr-2">
                      {{-- <i class="fa fa-users-b"></i> --}}
                      <i class="fas fa-book"></i>
                    </div>
                    <div class="single_achivement_text">
                      <h5 class="header mb-0">{{ $achievements->no_of_exam_topics }}+</h5>
                      <p class="paragraph mb-0">পরীক্ষার বিষয়সমূহ</p>
                    </div>
                  </div>
                </div>
                <!--<div class="col-12 col-sm-6">-->
                <!--  <div-->
                <!--    class="single_achivement d-flex align-items-center justify-content-start p-4"-->
                <!--  >-->
                <!--    <div class="icon mr-2">-->
                <!--      {{-- <i class="fa fa-users-b"></i> --}}-->
                <!--      <i class="fas fa-book-reader"></i>-->
                <!--    </div>-->
                <!--    <div class="single_achivement_text">-->
                <!--      <h5 class="header mb-0">{{ $achievements->subject_of_theExaminee }}+</h5>-->
                <!--      <p class="paragraph mb-0">পরীক্ষার্থীর বিষয়</p>-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->
              </div>
            </div>
          </div>
        </div>
      </section>
      @else
        <div></div>
      @endif
      <!-- feature -->
      @php
        foreach($feature as $key=>$features)
      @endphp
      @if(!empty($features))
      <section class="why_us">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-6">
              <div class="image text-center">
                <img
                  class="img-fluid"
                  src="{{ asset('public/uploads/files/features/') }}/{{ $features->image }}"
                  alt="achivement"
                />
              </div>
            </div>
            <div class="col-12 col-lg-6 mt-3 mt-lg-0">
              <div class="why_us_heading">
                <h2 class="header mb-0">
                  <span class="primary_color">কেন</span>
                  <span class="secondary_color">?</span>
                </h2>
              </div>
              <ul class="why_us_list">
                {{-- <li>
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="icon">
                      <span class="mr-2"
                        ><i class="far fa-check-circle"></i
                      ></span>
                    </div>
                    <div class="text">{!! $features->description !!}</div>
                  </div>
                </li> --}}
                <li>
                  <div class="d-flex justify-content-start align-items-center">
                    {{-- <div class="icon">
                      <span class="mr-2"
                        ><i class="far fa-check-circle"></i
                      ></span>
                    </div> --}}
                    <div class="text">
                      {!! $features->description !!}
                    </div>
                  </div>
                </li>
                {{-- <li>
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="icon">
                      <span class="mr-2"
                        ><i class="far fa-check-circle"></i
                      ></span>
                    </div>
                    <div class="text">
                      প্রত্যেক শিক্ষার্থীকে অধ্যায়ভিত্তিক লেকচার শীট প্রদান করা
                      হয়।
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="icon">
                      <span class="mr-2"
                        ><i class="far fa-check-circle"></i
                      ></span>
                    </div>
                    <div class="text">
                      প্রত্যেক শিক্ষার্থীকে অধ্যায়ভিত্তিক লেকচার শীট প্রদান করা
                      হয়।
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="icon">
                      <span class="mr-2"
                        ><i class="far fa-check-circle"></i
                      ></span>
                    </div>
                    <div class="text">
                      প্রত্যেক শিক্ষার্থীকে অধ্যায়ভিত্তিক লেকচার শীট প্রদান করা
                      হয়।
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="icon">
                      <span class="mr-2"
                        ><i class="far fa-check-circle"></i
                      ></span>
                    </div>
                    <div class="text">
                      প্রত্যেক শিক্ষার্থীকে অধ্যায়ভিত্তিক লেকচার শীট প্রদান করা
                      হয়।
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="icon">
                      <span class="mr-2"
                        ><i class="far fa-check-circle"></i
                      ></span>
                    </div>
                    <div class="text">
                      প্রত্যেক শিক্ষার্থীকে অধ্যায়ভিত্তিক লেকচার শীট প্রদান করা
                      হয়।
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="icon">
                      <span class="mr-2"
                        ><i class="far fa-check-circle"></i
                      ></span>
                    </div>
                    <div class="text">
                      প্রত্যেক শিক্ষার্থীকে অধ্যায়ভিত্তিক লেকচার শীট প্রদান করা
                      হয়।
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="icon">
                      <span class="mr-2"
                        ><i class="far fa-check-circle"></i
                      ></span>
                    </div>
                    <div class="text">
                      প্রত্যেক শিক্ষার্থীকে অধ্যায়ভিত্তিক লেকচার শীট প্রদান করা
                      হয়।
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="icon">
                      <span class="mr-2"
                        ><i class="far fa-check-circle"></i
                      ></span>
                    </div>
                    <div class="text">
                      প্রত্যেক শিক্ষার্থীকে অধ্যায়ভিত্তিক লেকচার শীট প্রদান করা
                      হয়।
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex justify-content-start align-items-center">
                    <div class="icon">
                      <span class="mr-2"
                        ><i class="far fa-check-circle"></i
                      ></span>
                    </div>
                    <div class="text">
                      প্রত্যেক শিক্ষার্থীকে অধ্যায়ভিত্তিক লেকচার শীট প্রদান করা
                      হয়।
                    </div>
                  </div>
                </li> --}}
              </ul>
            </div>
          </div>
        </div>
      </section>
      @else
        <div></div>
      @endif
      {{-- <!-- user document -->
      <section class="blog">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 mb-3 mb-lg-0">
              <div class="blog_text">
                <h2 class="header mb-0">
                  <span class="primary_color">কি ভাবে</span>
                  <span class="secondary_color">
                    আপনি আমাদের এই ওয়েবসাইট ব্যবহার করবেন
                  </span>
                </h2>
                <p class="paragraph mb-0 py-3">
                  দি এক্সামলী ব্যবহার এর সকল দিক নির্দেশনা খুব সহজে তুলে ধরা হয়েছে | যাতে খুব সহজে ইউজারের  ব্যবহার করা সম্ভাব হয় | 
                </p>
                <div class="blog_text_action">
                  <a
                    class="btn_primary text-decoration-none"
                    href="{{ route('userManual.detail') }}"
                    ><span>বিস্তারিত</span>
                  </a>
                </div>
              </div>
            </div>
            @foreach($userManual as $key=>$manual)
            <div class="col-12 col-md-6 col-lg-4">
              <div class="single_blog">
                <a href="{{ route('userManual.details',$manual->id) }}">
                  <div class="blog_image text-center">
                    <img
                      class="img-fluid"
                      src="{{ asset('public/uploads/files/userManual/') }}/{{ $manual->image }}"
                      alt="userManual"
                    />
                  </div>
                </a>
                <div class="blog_body p-3">
                  <a class="text-decoration-none" href="{{ route('userManual.details',$manual->id) }}">
                    <h4 class="title mb-0">{{ $manual->title }}</h4>
                  </a>
                  <p class="paragraph mb-0">
                    {!! Str::of($manual->description)->limit(150) !!}
                  </p>

                  <div class="blog_action">
                    <a class="btn_primary text-decoration-none" href="{{ route('userManual.details',$manual->id) }}">
                      <span>বিস্তারিত</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section> --}}
      <!--top books -->
      <!--<section class="top_courses" id="scrollBooks">-->
      <!--  <div class="container">-->
      <!--    <div class="row">-->
      <!--      <div class="col-4">-->
      <!--        <div class="top_books_text">-->
      <!--          <h2 class="header mb-0">-->
      <!--            <span class="primary_color">সর্বাধিক </span>-->
      <!--            <span class="secondary_color">অংশ গ্রহণকৃত পরীক্ষাসমূহ</span>-->
      <!--          </h2>-->

      <!--          <p class="paragraph my-3">-->
      <!--            {{-- তুমি পড়াশোনার কোন পর্যায়ে? তোমার পরীক্ষার বিষয়টি বেছে নাও! --}}-->
      <!--            দেশের সকল পাবলিক ও প্রফেশনাল পরীক্ষার জন্য নিজেকে তৈরী করতে বেছে নিন আপনার বিষয়টি।-->
      <!--          </p>-->
      <!--          <div class="top_books_action">-->
      <!--            <a class="btn_primary text-decoration-none" href="{/{ route('frontend.courses',['SSC Preparation']) }}"-->
      <!--              ><span>বিস্তারিত</span>-->
      <!--            </a>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </div>-->
            
      <!--      @/foreach($subject->slice(0, 11) as $key=> $value)-->
      <!--      <div class="col-12 col-md-6 col-lg-4">-->
      <!--        <div class="single_courses">-->
      <!--          <a href="{/{ route('frontend.course_details',[$value->id]) }}">-->
      <!--            <div class="course_image text-center">-->
      <!--              <img-->
      <!--                class="img-fluid"-->
      <!--                src="{/{ asset('public/uploads/subject') }}/{/{ $value->image }}"-->
      <!--                alt="top-courses"-->
      <!--              />-->
      <!--            </div>-->
      <!--          </a>-->
      <!--          <div class="course_body p-3">-->
      <!--            <a class="text-decoration-none" href="{/{ route('frontend.course_details',[$value->id]) }}">-->
      <!--              {{-- <h4 class="title mb-0">উচ্চতর গণিত</h4> --}}-->
      <!--              <h4 class="title mb-0">{/{ $value->name }}</h4>-->
      <!--            </a>-->
      <!--            {{-- <h5 class="sub_title">ফাহিম মুরশেদ</h5> --}}-->
      <!--            <div-->
      <!--              class="courses_footer d-flex align-items-center justify-content-between"-->
      <!--            >-->
                    
      <!--              <div class="course_info">-->
      <!--                @/if($value->price==0)-->
      <!--                  <span class="amount mr-2"> Free </span>-->
      <!--                @/else-->
      <!--                  <span class="amount mr-2"> {/{ $value->price }} TK</span>-->
      <!--                @/endif -->
      <!--                {{-- <span class="enrolled_users mr-2"-->
      <!--                  ><i class="fas fa-users"></i> 26 st</span-->
      <!--                > --}}-->
      <!--                {{-- <span class="course_duration"-->
      <!--                  ><i class="far fa-clock"></i> 5 hr</span-->
      <!--                > --}}-->
      <!--                <span class="course_duration"-->
      <!--                  ><i class=""></i>No of Exam {/{ $value->no_of_exam }} </span-->
      <!--                >-->
      <!--              </div>-->
      <!--              <div class="course_action">-->
      <!--                <a class="btn_primary text-decoration-none" href="{/{ route('user.login') }}">-->
      <!--                  <span>Enroll Now</span>-->
      <!--                </a>-->
      <!--              </div>-->
      <!--            </div>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </div>-->
      <!--      @/endforeach-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</section>-->
      <!-- achievements -->
  
       <!-- tesimonials -->
       {{-- <section class="tesimonials" id="scrollTesimonials">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div
                class="tesimonials_text d-flex flex-column align-items-center justify-content-center"
              >
                <h2 class="header mb-0">
                  <span class="primary_color">পরীক্ষার্থীদের</span>
                  <span class="secondary_color">মন্তব্য</span>
                </h2>
                <p class="paragraph mb-0 py-3 text-center"> 
                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex
                  ratione ipsam iusto nesciunt vitae natus voluptate dolor
                  dolore porro itaque? 
              </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="row tesimonials_slider">
                @foreach($userComments as $key=>$comments2)
                <div class="col-12">
                  <div class="single_slider text-center">
                    <img
                      class="img rounded-circle"
                      src="{{ asset('public/uploads/user_images') }}/{{ $comments2->user->user_image }}"
                      alt="testimonials"
                    />
                    <h5 class="header mb-0"><span>{{ $comments2->first()->user->name }}</span></h5>
                    <h6 class="sub_header">{{ $comments2->first()->subject }}</h6>
                    <p class="paragraph px-2 px-sm-5">
                      {{ $comments2->first()->comments }}
                    </p>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>  --}}

      <!-- blog -->
      <!--<section class="blog" id="scrollBlog">-->
      <!--  <div class="container">-->
      <!--    <div class="row justify-content-center">-->
      <!--      <div class="col-12 col-md-6 col-lg-4 mb-3 mb-lg-0">-->
      <!--        <div class="blog_text">-->
      <!--          <h2 class="header mb-0">-->
      <!--            <span class="primary_color">আমাদের</span>-->
      <!--            <span class="secondary_color">ব্লগসমূহ</span>-->
      <!--          </h2>-->
      <!--          <p class="mb-0 my-3">-->
      <!--            দেশের সকল পাবলিক পরীক্ষা যেমন, এস এস সি, এইচ এস সি, বিশ্ববিদ্যালয় ভর্তি পরীক্ষা, ইঞ্জিনিয়ারিং ভর্তি পরীক্ষা, মেডিকেল ভর্তি পরীক্ষা, এগ্রিকালচার বিশ্ববিদ্যালয় ভর্তি পরীক্ষা সহ ক্লাস ভিত্তিক মডেল টেস্ট, বিসিএস ও প্রাইমারি শিক্ষক নিয়োগ পরীক্ষায় নিজেকে উপযুক্ত করে গড়ে তুলতে আজই  অংশগ্রহণ করুন আমাদের মডেল টেস্ট গুলিতে।-->
      <!--          </p>-->
      <!--          <div class="blog_text_action">-->
      <!--            <a class="btn_primary text-decoration-none" href="{/{ route('blog') }}"-->
      <!--              ><span>বিস্তারিত</span>-->
      <!--            </a>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </div>-->
      <!--      @/foreach($blogs->slice(0, 8) as $key=> $blog)-->
      <!--      <div class="col-12 col-md-6 col-lg-4">-->
      <!--        <div class="single_blog">-->
      <!--          <a href="{/{ route('blog.blogDetails',[$blog->id]) }}">-->
      <!--            <div class="blog_image text-center" style="height: 200px">-->
      <!--              <img-->
      <!--                class="img-fluid"-->
      <!--                src="{/{ asset('public/uploads/files/blog/') }}/{/{ $blog->image }}"-->
      <!--                alt="image"-->
      <!--              />-->
      <!--            </div>-->
      <!--          </a>-->
      <!--          <div class="blog_body p-3">-->
      <!--            <a class="text-decoration-none" href="{/{ route('blog.blogDetails',[$blog->id]) }}">-->
      <!--              <h4 class="title mb-0">-->
      <!--                {/{ $blog->title }}-->
      <!--              </h4>-->
      <!--            </a>-->
      <!--            <p class="paragraph mb-0">-->
      <!--              {/!! Str::of($blog->description)->limit(150) !!}-->
      <!--            </p>-->

      <!--            <div class="blog_action">-->
      <!--              <a class="btn_primary text-decoration-none" href="{/{ route('blog.blogDetails',[$blog->id]) }}">-->
      <!--                <span>Read More</span>-->
      <!--              </a>-->
      <!--            </div>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </div>-->
      <!--      @/endforeach-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</section>-->
      <!-- about us -->
      <section class="about_us">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 mb-3 mb-lg-0">
              <div class="about_us_header_text text-center mb-3">
                <h2 class="header mb-0" style="margin-bottom: 30!important;">
                  <span class="primary_color">আমাদের </span>
                  <span class="secondary_color"> সম্পর্কে</span>
                </h2>
                <p class="paragraph my-3">
                  {{-- @foreach($aboutUs as $key=>$about) --}}
                    {{ $aboutUsTitle }}
                  {{-- @endforeach --}}
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-6 order-1 order-lg-0 mt-3 mt-lg-0">
              <div class="about_us_text">
                
                    {!! Str::limit($aboutUsDescription,1400) !!}
                    
                  @if($aboutUsDescription=='')
                        <div></div>
                  @else
                  <div class="blog_text_action" style="margin-top: 14px;">
                    <a
                      class="btn_primary text-decoration-none"
                      href="{{ route('aboutUs') }}"
                      ><span>বিস্তারিত</span>
                    </a>
                  </div>
                  @endif
              </div>
            </div>
            <div class="col-12 col-lg-6 order-0 order-lg-1">
              <div class="about_us_video">
                 <!-- for html video -->
                @if(!empty($aboutUsLink)) 
                <video class="html_video" poster="{{ asset('public/uploads/files/aboutUs/') }}/{{ $aboutUsImage }}" controls>
                  <source
                    src="{{ asset('/')}}{{ $aboutUsLink }}"

                    type="video/mp4"
                  />

                  Your browser does not support the video tag.
                </video>
                @else
                  <div class="about_us_image">
                    <img
                      class="img-fluid"
                      src="{{ asset('public/uploads/files/aboutUs/') }}/{{ $aboutUsImage }}"
                      alt="about_us"
                    />
                  </div>  
                @endif
                {{-- <a
                  href="{{ asset('/')}}{{ $aboutUsLink }}"
                  class="popupYoutubeVideo"
                >
                  <div class="about_us_image">
                    <img
                      class="img-fluid"
                      src="{{ asset('public/uploads/files/aboutUs/') }}/{{ $aboutUsImage }}"
                      alt="about_us"
                    />
                    @if($aboutUsLink=='')
                        <div></div>
                    @else
                    <div class="overlay">
                      <span class="play_icon"><i class="fas fa-play"></i></span>
                    </div>
                    @endif
                  </div>
                </a> --}}
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <!-- advertisement start-->
      <!--<section class="preview_slide advertisement" id="scrollTesimonials">-->
      <!--  <div class="container">-->
      <!--    <div class="row">-->
      <!--      <div class="col-12">-->
      <!--        <div-->
      <!--          class="-->
      <!--            preview_slide_text-->
      <!--            d-flex-->
      <!--            flex-column-->
      <!--            align-items-center-->
      <!--            justify-content-center-->
      <!--          "-->
      <!--        >-->
      <!--        </div>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--    <div class="row">-->
      <!--    </div>-->
      <!--    <div class="row">-->
      <!--      <div class="col-md-12">-->
      <!--        <div class="add-wrap">-->
      <!--          <div class="row custom-flex">-->
      <!--            <div class="col-md-7">-->
      <!--              <div class="blog_text">-->
      <!--                <h2 class="header mb-0">-->
      <!--                  <span class="primary_color">স্মার্ট এডুকেশন </span>-->
      <!--                  <span class="secondary_color">ম্যানেজমেন্ট সিস্টেম </span>-->
      <!--                </h2>-->
      <!--                <p class="paragraph mb-0 py-3">-->
      <!--                  ইউনিভার্সিটি, ইনস্টিটিউট,  স্কুল-কলেজ, মাদ্রাসাসহ কোচিং সেন্টারের একাডেমিক এবং এডমিনিস্ট্রেশন পরিচালনা করার পূর্ণাঙ্গ  সিস্টেম | আরও জানতে এবং সিস্টেমের ডেমো দেখতে নিচের বাটন এ ক্লিক করুন | -->
      <!--                </p>-->
      <!--                <div class="blog_text_action" style="margin-top: 18px;">-->
      <!--                  <a class="btn_primary text-decoration-none" href="https://desktopit.education"><span>বিস্তারিত </span>-->
      <!--                  </a>-->
      <!--                </div>-->
      <!--              </div>-->
      <!--            </div>-->
      <!--            <div class="col-md-3">-->
      <!--                <div class="add_image">-->
      <!--                  <img src="{{asset('public/frontend/images/advertisement/sms.png')}}" alt="advertisement">-->
      <!--                </div>-->
      <!--            </div>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</section>-->
      <!-- advertisement end-->
      
      <!-- news start-->
      <section class="blog" id="scrollBlog" style="padding-top: 0px;">
        <div class="container">
          <div class="row mb-5">
            <div class="col-12">
              <div class="blog_text text-center">
                <h2 class="header mb-0">
                  <span class="primary_color">সাম্প্রতিক</span>
                  <span class="secondary_color">খবর </span>
                </h2>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">            
            @foreach($news as $key=> $newsPortal)
              <div class="col-12 col-md-6 col-lg-4">
                <div class="single_blog">
                  <a href="{{$newsPortal->news_link}}">
                    <div class="blog_image text-center">
                      <img
                        class="img-fluid"
                        src="{{ asset('public/uploads/files/news') }}/{{$newsPortal->image}}"
                        alt="news" target="_blank" 
                      />
                    </div>
                  </a>
                  <div class="blog_body p-3">
                    <a class="text-decoration-none" href="{{$newsPortal->news_link}}" target="_blank" >
                      <h4 class="title mb-0">
                        {{$newsPortal->title}}
                      </h4>
                    </a>
                    {{-- <p class="paragraph mb-0">
                      Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                      Architecto quisquam in et neque veniam iure quae asperiores
                      totam, sit maiores saepe numquam voluptate ipsam nisi
                      voluptatibus quas quasi nemo facere?
                    </p> --}}

                    <div class="blog_action d-flex justify-content-between align-items-center" style="margin-top: 14px;">
                      <a class="btn_primary text-decoration-none" href="{{$newsPortal->news_link}}" target="_blank">
                        <span>বিস্তারিত</span>
                      </a>  
                      @if(!empty($newsPortal->date))                   
                      <span class="font-weight-bold">{{ date('d M Y', strtotime($newsPortal->date)) }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>
      <!-- news end-->
      <br><br>
    </main>
  
    <?php foreach($modals as $key=>$modal) ?>
    <!-- The Modal -->
    @if(isset($modal))
      <div class="modal" @if($modal->status=='1') id="myModal" @else id="" @endif style="backface-visibility: 100% !important; opacity: 1 !important;  transform: translateY(20%); top: -50px;">
        <div class="modal-dialog" >
          <div class="modal-content" style="background: transparent !important; border: none !important;">

            <!-- Modal body -->
            <div class="modal-body ">
              <style type="text/css">

                .theem_border {
                  border: 2px solid #006A4E;
                  width: 350px;
                  background: white;
                  border-radius: 25px;
                }
                /*.clock {
                  width: 80px;

                }
                .clockdivs div > span {
                  display: inline-block;
                  border: 2px solid #eee;
                  margin-bottom: 5px;
                  padding: 10px;
                  width: 100%;
                  color: #fff;
                  background: #006A4E;
                  border-radius: 6px;
                  text-align: center;
                  font-size: 24px;
                }*/
                .smalltext {
                  width: 100;
                  text-align: center;
                }
                .mujib img{
                  max-width: 100%;
                  margin-bottom: 5px;
                }
                #clk {
                  display: none;
                } 
                @media screen and (max-width: 400px) {
                  .theem_border {
                    width: 250px;
                  }
                  .clock {
                    width: 56px;
                  }
                  .clockdivs div > span {
                    font-size: 20px;
                  }
                }
              </style>
              <center id="center">
              <div class="theem_border" id="clk" style="width: 100%">
                <div class="clockdivs row  m-2" >
                  <button type="button" style="z-index: 100;" class="close ml-auto mt-1" data-dismiss="modal">&times;</button>
                  <div class="col-12  mb-2" >

                    @if($modal->image=='' )
                      {!! $modal->description !!}
                    @else  
                      <a href="http://www.corona.gov.bd" class="mujib" target="_blank">
                        <img src="{{ asset('public/uploads/files/modal/') }}/{{ $modal->image}}">
                      </a>
                    @endif  
                  </div>
                  <!--<div class="clock">-->
                  <!--  <span id="days"></span>-->
                  <!--  <div class="smalltext">দিন</div>-->
                  <!--</div>-->
                  <!--<div class="clock">-->
                  <!--  <span id="hours"></span>-->
                  <!--  <div class="smalltext">ঘন্টা</div>-->
                  <!--</div>-->
                  <!--<div class="clock">-->
                  <!--  <span id="minutes"></span>-->
                  <!--  <div class="smalltext">মিনিট</div>-->
                  <!--</div>-->
                  <!--<div class="clock">-->
                  <!--  <span id="seconds"></span>-->
                  <!--  <div class="smalltext">সেকেন্ড</div>-->
                  <!--</div>-->
                </div>

              </div>
            </center>
          </div>
        </div>
      </div>
    </div>
  
    @endif
    <!-- The Modal -->
  @endsection

  @push('plugin-scripts')
  <!--{!! Html::script('public/frontend/js/jquery-3.5.1.min.js') !!}-->
  {!! Html::script('public/frontend/js/jquery.magnific-popup.min.js') !!}
  {!! Html::script('public/frontend/js/slick.min.js') !!}
  <!--{!! Html::script('public/assets/bootstrap/bootstrap.min.js') !!}-->
  @endpush
  @push('custom-scripts')
    {!! Html::script('public/frontend/js/index.js') !!}
    {{-- {!! Html::script('public/frontend/js/common.js') !!} --}}
    <!--{!! Html::script('public/frontend/js/popupYoutube.js') !!}-->
    <script type="text/javascript">
      $(window).on('load',function(){
          $('#myModal').modal('show');
        //   document.getElementById("clk").style.display = "block";
      });
    </script>
    <script type="text/javascript">
      $(function () {
          $('a[href*=\\#]:not([href=\\#])').on('click', function () {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.substr(1) + ']');
              if (target.length) {
                  $('html,body').animate(
                      {
                          scrollTop: target.offset().top + -90,
                      },
                      0
                  );
                  return false;
              }
          });
      });
    </script>
  @endpush