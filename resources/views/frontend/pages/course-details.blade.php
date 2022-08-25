<?php
  use App\Models\Backend\Subject;
  use Carbon\Carbon;
?>
@extends('frontend.layout.master')

  @section('content')

    <main>
      <!-- page title -->
      <section class="page_title">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div
                class="page_title_container d-flex flex-column align-items-center justify-content-center"
              >
                <div class="page_title_heading">
                  <h2 class="header mb-0">পরীক্ষা সমূহ</h2>
                </div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item breadcrumb_item">
                      <a href="{{ route('frontend.index') }}">হোম</a>
                    </li>
                    <li class="breadcrumb-item breadcrumb_item active">
                      <a href="#">পরীক্ষা সমূহ</a>
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="svg_container">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path
              fill="#fff"
              fill-opacity="1"
              d="M0,128L60,138.7C120,149,240,171,360,160C480,149,600,107,720,112C840,117,960,171,1080,160C1200,149,1320,75,1380,37.3L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"
            ></path>
          </svg>
        </div>
      </section>
      <!-- end page title -->

      <!-- course details -->
      <section class="course_details my-5">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-2">
              <div
                class="nav course_details_nav flex-row flex-lg-column nav-pills"
                id="v-pills-tab"
                role="tablist"
                aria-orientation="vertical"
              >
                <a
                  class="nav-link nav_link active"
                  id="v-pills-home-tab"
                  data-toggle="pill"
                  href="#v-pills-home"
                  role="tab"
                  aria-controls="v-pills-home"
                  aria-selected="true"
                >
                  এই পরীক্ষা সম্পর্কে
                </a>
                <a
                  class="nav-link nav_link"
                  id="v-pills-profile-tab"
                  data-toggle="pill"
                  href="#v-pills-profile"
                  role="tab"
                  aria-controls="v-pills-profile"
                  aria-selected="false"
                >
                  পরীক্ষা কন্টেন্ট
                </a>
                {{-- <a
                  class="nav-link nav_link"
                  id="v-pills-messages-tab"
                  data-toggle="pill"
                  href="#v-pills-messages"
                  role="tab"
                  aria-controls="v-pills-messages"
                  aria-selected="false"
                >
                  FAQ
                </a> --}}
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div
                class="tab-content tab_content py-4 px-2"
                id="v-pills-tabContent"
              >
                <div
                  class="tab-pane fade show active"
                  id="v-pills-home"
                  role="tabpanel"
                  aria-labelledby="v-pills-home-tab"
                >
                  <div class="about_course_details">
                    {{-- <h2 class="header text-center mb-5">উচ্চতর গণিত</h2> --}}
                    <h2 class="header text-center mb-5">{{ $value->name }}</h2>
                    <div class="icons d-flex justify-content-around">
                      <div class="single_icon_box text-center">
                        <div class="icon"><i class="far fa-clock"></i></div>
                        <p class="paragraph">সময়কাল </p>
                        <strong> {{ date('d F Y', strtotime($value->start_date )) }} To {{ date('d F Y', strtotime($value->end_date )) }}</strong>
                      </div>

                      <div class="single_icon_box text-center">
                        <div class="icon"><i class="fas fa-book-open fa fa-3x"></i></div>
                        <p class="paragraph">পরীক্ষার সংখ্যা</p>
                        <strong>{{ $value->no_of_exam }} টি</strong>
                      </div>

                      <div class="single_icon_box text-center">
                        <div class="icon"><i class="fas fa-users"></i></div>
                        <p class="paragraph">পরীক্ষা দিয়েছেন</p>
                        <strong> 1,533 জন </strong>
                      </div>

                      {{-- <div class="single_icon_box text-center">
                        <div class="icon">
                          <i class="fas fa-graduation-cap"></i>
                        </div>
                        <p class="paragraph">সার্টিফিকেট</p>
                        <strong> আছে </strong>
                      </div> --}}
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="v-pills-profile"
                  role="tabpanel"
                  aria-labelledby="v-pills-profile-tab"
                >
                  <!-- course content -->
                  <div class="course_content">
                    <ul>
                      @php
                        $exam_type = $value->exam_type;
                        $arry = preg_split("/[,]/",$exam_type);
                      @endphp

                      @foreach($arry as $key=> $type)
                      <li>
                        <div
                          class="course_content_text d-flex justify-content-start"
                        >
                          <div class="icon mr-2">
                            <i class="far fa-check-circle"></i>
                          </div>
                          <div class="text">{{ $type }}</div>
                        </div>
                      </li>
                      @endforeach
                      {{-- <li>
                        <div
                          class="course_content_text d-flex justify-content-start"
                        >
                          <div class="icon mr-2">
                            <i class="far fa-check-circle"></i>
                          </div>
                          <div class="text">MCQ</div>
                        </div>
                      </li> --}}
                      {{-- <li>
                        <div
                          class="course_content_text d-flex justify-content-start"
                        >
                          <div class="icon mr-2">
                            <i class="far fa-check-circle"></i>
                          </div>
                          <div class="text">Written</div>
                        </div>
                        <ul class="sub_list">
                          <li>
                            <div
                              class="course_content_text d-flex justify-content-start"
                            >
                              <div class="icon mr-2">
                                <i class="far fa-dot-circle"></i>
                              </div>
                              <div class="text">Sort Written</div>
                            </div>
                          </li>
                          <li>
                            <div
                              class="course_content_text d-flex justify-content-start"
                            >
                              <div class="icon mr-2">
                                <i class="far fa-dot-circle"></i>
                              </div>
                              <div class="text">Long Written</div>
                            </div>
                          </li>
                        </ul>
                      </li>
                    </ul> --}}
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="v-pills-messages"
                  role="tabpanel"
                  aria-labelledby="v-pills-messages-tab"
                >
                  <!-- faq -->
                  <div class="faq">
                    <ul>
                      <li>
                        <!--<h2 class="title">১. একাউন্ট কিভাবে খুলব?</h2>-->
                        <!--<p class="paragraph">-->
                        <!--  ওয়েব সাইটের উপরে রেজিস্টার অপশনে গিয়ে আপনার নাম, মোবাইল নম্বর, ইমেইল ও অন্যান্য প্রয়োজনীয় তথ্য প্রদান করার মাধ্যমে  আপনার অ্যাকাউন্ট তৈরি করুন এবং আপনার পছন্দের সাবজেক্টটি কিনে পরীক্ষার মাধ্যমে নিজেকে যাচাই করুন | -->
                        <!--</p>-->
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-4 mt-5 mt-lg-0">
              <div class="course_purchege_cart">
                <div
                  id="course-pursege-cart-video"
                  class="course_purchege_cart_video text-center"
                >
                  <a href="#">
                    <img
                      class="img-fluid"
                      src="{{ asset('public/uploads/subject') }}/{{ $value->image }}"
                      alt="courses name"
                    />
                    {{-- <div class="overlay text-center">
                      <img
                        class="img img-fluid"
                        src="{{ asset('public/frontend/images/top-courses/play/1.png') }}"
                        alt="play"
                      />
                    </div> --}}
                  </a>
                </div>
                <div class="course_purchege_cart_body p-3 text-center">
                  <div class="price">
                    <h2 class="header"><del>&#2547;300</del> &#2547;{{ $value->price }}</h2>

                    <p class="paragraph">{{ 

                      $diff_in_days = Carbon::parse($value->end_date)->diffInDays(Carbon::parse(date('d-m-Y')))
                      
                     }}&nbsp; Day left at this price!</p>
                  </div>
                  @php
                    $exam_id = Subject::where('id',$value->id)->get()->pluck('exam_category')->first();
                  @endphp
                  <div class="action">
                    @if(Auth::user())
                      <a class="btn_primary text-decoration-none" href="{{ url('admin/dashboard/buySubject',[$exam_id]) }}">
                    @else
                      <a class="btn_primary text-decoration-none" href="{{ route('user.login') }}">
                    @endif
                      <span>Add to Cart</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  @endsection