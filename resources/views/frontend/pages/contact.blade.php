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
                  <h2 class="header mb-0">যোগাযোগ</h2>
                </div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item breadcrumb_item">
                      <a href="{{ url('/') }}">হোম</a>
                    </li>
                    <li class="breadcrumb-item breadcrumb_item active">
                      <a href="#">যোগাযোগ</a>
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end page title -->

      <!-- contact -->

      <section class="contact_page my-5">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="contact_box">
                <div class="row justify-content-center">
                  <div class="col-12 col-md-6 col-lg-4">
                    <div class="single_contact">
                      <h2 class="header">যোগাযোগ</h2>
                      <div class= "text-left">
                          <p class="paragraph">মোবাইল:</p>
                          <p class="paragraph ml-5"> +৮৮ ০১৭১৫৬০৩০৪১-৪২ (সেলস সাপোর্ট)</p>
                      <p class="paragraph ml-5"> +৮৮ ০১৭১৫৬০৩০৪৩ (কন্টেন্ট সাপোর্ট)</p>
                        <p class="paragraph ml-5"> +৮৮ ০১৯১৩৮০০৮০০ (সিস্টেম সাপোর্ট)</p>                      
                        <p class="paragraph">ইমেইল: </p>
                      <p class="paragraph ml-5">info@theexamly.com</p>
                      <p class="paragraph ml-5"> content@theexamly.com (কন্টেন্ট সাপোর্ট)</p>
                      <p class="paragraph ml-5"> support@theexamly.com (সিস্টেম সাপোর্ট)</p> 
                      </div>   
                       
                    </div>
                  </div>
                </div>
                {{-- <div class="row justify-content-center">
                  <div class="col-12 col-md-6 col-lg-4">
                      <div class="single_contact">
                      <h2 class="header">অফিস</h2>
                      <p class="paragraph">
                        ১৪৭ /সি (৩য় তলা) 
                      </p>
                      <p class="paragraph">
                        গ্রীন রোড , ঢাকা ১২০৫
                      </p>
                    </div>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
          {{-- <div class="row mt-5">
            <div class="col-12">
              <div class="teacher_list">
                <h2 class="header">
                  <span class="primary_color">গুরুত্বপূর্ণ</span> শিক্ষক মণ্ডলী
                </h2>

                <div class="row justify-content-center">
                  <div class="col-12 col-lg-6">
                    <!-- foreach -->
                    <div class="single_teacher">
                      <div class="row justify-content-center">
                        <div class="col-12 col-md-4 col-lg-5 col-xl-4">
                          <div class="image text-center">
                            <img
                              class="img-fluid"
                              src="./images/teacher/1.png"
                              alt="teacher"
                            />
                          </div>
                        </div>
                        <div
                          class="col-12 col-md-6 col-lg-7 col-xl-6 mt-3 mt-lg-0"
                        >
                          <div class="teacher_details text-center text-md-left">
                            <h2 class="header">মোঃ আবদুল্লা মামুন</h2>
                            <p class="paragraph">ইমেইল: name@domain.com</p>
                            <p class="paragraph">মোবাইল: +১২৬৭৬৬৫৮৪৩১</p>
                            <span class="chipe">বাংলা </span>,
                            <span class="chipe">ইংলিশ </span>,
                            <span class="chipe">গণিত </span>,
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- foreach -->
                    <div class="single_teacher">
                      <div class="row justify-content-center">
                        <div class="col-12 col-md-4 col-lg-5 col-xl-4">
                          <div class="image text-center">
                            <img
                              class="img-fluid"
                              src="./images/teacher/1.png"
                              alt="teacher"
                            />
                          </div>
                        </div>
                        <div
                          class="col-12 col-md-6 col-lg-7 col-xl-6 mt-3 mt-lg-0"
                        >
                          <div class="teacher_details text-center text-md-left">
                            <h2 class="header">মোঃ আবদুল্লা মামুন</h2>
                            <p class="paragraph">ইমেইল: name@domain.com</p>
                            <p class="paragraph">মোবাইল: +১২৬৭৬৬৫৮৪৩১</p>
                            <span class="chipe">বাংলা </span>,
                            <span class="chipe">ইংলিশ </span>,
                            <span class="chipe">গণিত </span>,
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- foreach -->
                    <div class="single_teacher">
                      <div class="row justify-content-center">
                        <div class="col-12 col-md-4 col-lg-5 col-xl-4">
                          <div class="image text-center">
                            <img
                              class="img-fluid"
                              src="./images/teacher/1.png"
                              alt="teacher"
                            />
                          </div>
                        </div>
                        <div
                          class="col-12 col-md-6 col-lg-7 col-xl-6 mt-3 mt-lg-0"
                        >
                          <div class="teacher_details text-center text-md-left">
                            <h2 class="header">মোঃ আবদুল্লা মামুন</h2>
                            <p class="paragraph">ইমেইল: name@domain.com</p>
                            <p class="paragraph">মোবাইল: +১২৬৭৬৬৫৮৪৩১</p>
                            <span class="chipe">বাংলা </span>,
                            <span class="chipe">ইংলিশ </span>,
                            <span class="chipe">গণিত </span>,
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      </section>
    </main>
  @endsection

  @push('plugin-scripts')
      <script src="{{ asset('public/frontend/js/jquery-3.5.1.min.js') }}"></script>
      <script src="{{ asset('public/frontend/js/bootstrap.bundle.min.js') }}"></script>
      {{-- <script src="{{ asset('public/frontend/js/scrollPosStyler.min.js') }}"></script> --}}
      <script src="{{ asset('public/frontend/js/jquery.anchorScroll.min.js') }}"></script>
  @endpush
  @push('custom-scripts')    
      <script src="{{ asset('public/frontend/js/common.js') }}"></script>
  @endpush    
    

