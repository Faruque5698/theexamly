<?php use App\Models\Backend\Subject; ?>
@extends('frontend.layout.master')

@push('plugin-styles')
  {!! Html::style('public/css/loader.css') !!}
@endpush
<style type="text/css">
  .course_details .course_purchege_cart_body .action .btn_primary {
    padding: 10px 30px;
  }

  .course-assign {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-top: 2rem;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    -webkit-box-pack: justify;
        -ms-flex-pack: justify;
            justify-content: space-between;
  }

  .course-assign .course-assign-count {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
  }

  .course-assign .course-assign-count i {
    font-size: 2.25rem;
    color: #15aabf;
    margin-right: .75rem;
  }

  .course-assign .course-assign-count .cac-text {
    font-size: 1rem;
  }

  .course-assign .course-assign-count .cac-text p {
    margin-bottom: .25rem;
  }

  .course-assign .course-assign-btn a {
    border-radius: 50px;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    -ms-border-radius: 50px;
    -o-border-radius: 50px;
    background-color: #036a99;
    color: #ffffff;
    padding: .625rem 1.5rem;
  }

  @media (max-width: 575.98px) {
    .course-assign .course-assign-count i {
      font-size: 1.75rem;
      color: #15aabf;
      margin-right: .75rem;
    }
    .course-assign .course-assign-count .cac-text {
      font-size: .875rem;
    }
    .course-assign .course-assign-count .cac-text p {
      margin-bottom: .25rem;
    }
    .course-assign .course-assign-btn a {
      padding: .5rem .75rem;
      font-size: .875rem;
    }
  }

  .course-features {
    margin-top: 2rem;
  }

  .course-features h3 {
    margin-bottom: 1.5rem;
    font-size: 1.5rem;
  }

  .course-features h3 a {
    color: #036a99;
    text-decoration: underline;
    white-space: nowrap;
  }

  .course-features ul li {
    font-size: 1.25rem;
    padding: .5rem 1rem;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
  }

  .course-features ul li i {
    margin-top: .25rem;
    margin-right: .75rem;
    color: #15aabf;
  }

  .course-features ul li:hover {
    background-color: rgba(21, 170, 191, 0.1);
  }

  @media (max-width: 575.98px) {
    .course-features {
      margin-top: 1.5rem;
    }
    .course-features h3 {
      margin-bottom: 1.25rem;
      font-size: 1.25rem;
    }
    .course-features ul li {
      font-size: 1rem;
      padding: .5rem .75rem;
    }
    .course-features ul li i {
      margin-top: .25rem;
      margin-right: .75rem;
      color: #15aabf;
    }
    .course-features ul li:hover {
      background-color: rgba(21, 170, 191, 0.1);
    }
  }
</style>

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
                  <h2 class="header mb-0">প্রস্তুতি পরীক্ষা সমূহ</h2>
                </div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item breadcrumb_item">
                      <a href="#">হোম</a>
                    </li>
                    <li class="breadcrumb-item breadcrumb_item active">
                      <a href="#">প্রস্তুতি পরীক্ষা সমূহ</a>
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end page title -->
      <!-- courses grid -->
      <section class="courses_details">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-7 order-1 order-lg-0">
              <div class="cd-left">
                <div class="course-title">
                  <h1>এস এস সি প্রস্তুতি পরীক্ষা</h1>
                  <p></p>
                </div>
                <div class="cd-warp">
                  <h3>যা যা পাচ্ছেনঃ</h3>
                  <div class="cdw-grid">
                    <ul class="key-feature">
                      <li><i class="fas fa-clipboard-check"></i> এস এস সি পরীক্ষার জন্য প্রস্তুতি নেয়ার একটি সঠিক গাইডলাইন</li>
                      <li><i class="fas fa-clipboard-check"></i>এস এস সি পরীক্ষার পুরো সিলেবাসের রিভিশন এবং সঠিক মূল্যায়নের সুযোগ</li>
                      <li><i class="fas fa-clipboard-check"></i> যেকোন ধরনের সমস্যা সমাধান, তথ্যের জন্য আলাদা ফেসবুক গ্রুপ</li>
                    </ul>
                    <div class="content">
                      <h3>পরীক্ষা সম্পর্কেঃ </h3>
                      <p></p>
                      <p></p>

                      <h3>প্রস্তুতি পরীক্ষাটি কাদের জন্য?</h3>
                      <ul>
                        <li><i class="fas fa-clipboard-check"></i> যারা এস এস সি পরীক্ষার প্রস্তুতি নিচ্ছেন ।</li>
                        <li><i class="fas fa-clipboard-check"></i> যারা এস এস সি পরীক্ষার জন্য সঠিক গাইডলাইন খুঁজছেন ।</li>
                        <li><i class="fas fa-clipboard-check"></i> যারা এস এস সি পরীক্ষার পুরো সিলেবাস রিভিশন- এর মাধ্যমে ভালো প্রস্তুতি নিতে চায় ।</li>
                        <li><i class="fas fa-clipboard-check"></i> যারা বার বার পরীক্ষা দিবার মাধ্যমে নিজেকে যাচাই করতে চান এবং মূল পরীক্ষার আগে নিজেকে প্রস্তুত করতে চান |</li>              
                      </ul>

                      <h3>এই প্রস্তুতি পরীক্ষাটির বৈশিষ্ট্যগুলো কী কী?</h3>
                      <ul>
                        <li><i class="fas fa-clipboard-check"></i> এস এস সি পরীক্ষা প্রস্তুতির সবকিছু এমনভাবে ডিজাইন করা হয়েছে যাতে আপনি ঘরে বসেই অল্প সময়ে সর্বোচ্চ প্রস্তুতি নিশ্চিত করতে পারেন ।</li>
                        {{-- <li><i class="fas fa-clipboard-check"></i> দেশ সেরা ইন্সট্রাক্টর, যারা এখন পাবলিক সার্ভিসে দায়িত্ব পালন করছেন, তারা আপনাকে পুরো কোর্সে গাইড করবেন ।</li> --}}
                        <li><i class="fas fa-clipboard-check"></i> ১৪৩৫৫০+ প্রশ্ন ব্যাংক, ১০০০০+ পরীক্ষার সংখ্যা, ১০+ পরীক্ষার বিষয়সমূহ, আপনার এস এস সি পরীক্ষার প্রস্তুতির জন্য একটি সম্পূর্ণ প্যাকেজ পাচ্ছেন খুবই কম খরচে ।</li>              
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="cd-warp">
                  <h3>প্রস্তুতি পরীক্ষাগুলির বিষয় সমূহঃ</h3>
                  <div class="cdw-grid cdw-subs">
                    <div class="accordion" id="accordionExamSubject">
                      <div class="card">
                        <div class="card-header" id="subHeadingOne">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubOne" aria-expanded="true" aria-controls="collapseSubOne">
                              শারীরিক শিক্ষা, স্বাস্থ্য বিজ্ঞান ও খেলাধুলা
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>

                        <div id="collapseSubOne" class="collapse" aria-labelledby="subHeadingOne" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <!--<ul>-->
                            <!--  <li>ভাষা</li>-->
                            <!--  <li>১.প্রয়োগ-অপপ্রয়োগ</li>-->
                            <!--  <li>২.বানান ও বাক্য শুদ্ধি</li>-->
                            <!--  <li>৩. পরিভাষা</li>-->
                            <!--  <li>৪. ধ্বনি</li>-->
                            <!--  <li>৫. বর্ণ</li>-->
                            <!--  <li>৬. শব্দ</li>-->
                            <!--  <li>৭. পদ</li>-->
                            <!--  <li>৮. বাক্য</li>-->
                            <!--  <li>৯. প্রত্যয়</li>-->
                            <!--  <li>১০. সন্ধি</li>-->
                            <!--  <li>১১. সমাস</li>-->
                            <!--  <li>সাহিত্য</li>-->
                            <!--  <li>১. প্রাচীন ও মধ্যযুগ</li>-->
                            <!--  <li>২. আধুনিক যুগ</li>-->
                            <!--</ul>-->
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingTwo">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubTwo" aria-expanded="false" aria-controls="collapseSubTwo">
                              বাংলাদেশের ইতিহাস ও বিশ্বসভ্যতা
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubTwo" class="collapse" aria-labelledby="subHeadingTwo" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>ইতিহাস পরিচিতি</li>
                                <li>বিম্ব সভ্যতা (মিশর, সিন্ধু, গ্রিক ও রোম)িক ও রোম)</li>
                                <li>প্রাচীন বাংলার জনপদ</li>
                                <li>প্রাচীন বাংলার রাজনৈতিক ইতিহাস</li>
                                <li> ইংরেজ শাসনামলে বাংলার স্বাধিকার আন্দোলন</li>
                                <li>ভাষা আন্দোলন ও পরবর্তী ঘটনাপ্রবাহ</li>
                                <li>সামরিক শাসন ও স্বাধিকার আন্দোলন (১৯৫৮-১৯৬৯ খ্রীঃ)</li>
                                <li>সত্তরের নির্বাচন ও মুক্তিযুদ্ধ</li>
                                <li>বঙ্গবন্ধু শেখ মুজিবর রহমানের শাসনকাল (১৯৭২-১৯৭৫)</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingThree">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubThree" aria-expanded="false" aria-controls="collapseSubThree">
                              ক্যারিয়ার এডুকেশন
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubThree" class="collapse" aria-labelledby="subHeadingThree" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>আমি ও আমার ক্যারিয়ার</li>
                                <li>ক্যারিয়ার গঠণ গুন ও দক্ষতা</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingFour">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubFour" aria-expanded="false" aria-controls="collapseSubFour">
                              পৌরনীতি ও নাগরিকতা
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubFour" class="collapse" aria-labelledby="subHeadingFour" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>পৌরনীতি ও নাগরিকতা</li>
                                <li>নাগরিক ও নাগরিকতা</li>
                                <li>রাষ্ট্র ও সরকারব্যবস্থা</li>
                                <li>সংবিধান</li>
                                <li>বাংলাদেশের সরকারব্যবস্থা</li>
                                <!--<li>গণতন্ত্রে রাজনৈতিক দল ও নির্বাচন</li>-->
                                <li>স্বাধীন বাংলাদেশের অভ্যুদয়ে নাগরিক চেতনা</li>
                                <li>বাংলাদেশ ও আন্তর্জাতিক সংগঠন</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingFive">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubFive" aria-expanded="false" aria-controls="collapseSubFive">
                              ভূগোল ও পরিবেশ
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubFive" class="collapse" aria-labelledby="subHeadingFive" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>ভূগোল ও পরিবেশ</li>
                                <li>মহাবিশ্ব ও আমাদের পৃথিবী</li>
                                <li>মানচিত্র গঠন ও ব্যবহার</li>
                                <li>প্রথিবীর অভ্যান্তরীন ও বাহ্যিক গঠন</li>
                                <li>বায়ুমন্ডল</li>
                                <li>বারিমন্ডল</li>
                                <!--<li>মানব বসতি</li>-->
                                <li>বাংরাদেশের ভৌগলিক বিবরণ</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingSix">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubSix" aria-expanded="false" aria-controls="collapseSubSix">
                              বিজ্ঞান
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubSix" class="collapse" aria-labelledby="subHeadingSix" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>উন্নততর জীবনধারা</li>
                                <li>জীবনের জন্য পানি</li>
                                <li>হৃদযন্ত্রের যত কথা</li>
                                <li>দেখতে হলে আলো চাই</li>
                                <li>পলিমার</li>
                                <li>অম্ল, ক্ষারক ও লবণের ব্যবহার</li>
                                <li>দুর্যোগের সাথে বসবাস</li>
                                <li>প্রাত্যহিক জীবনে তড়িৎ</li>
                            </ul>                            
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingSeven">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubSeven" aria-expanded="false" aria-controls="collapseSubSix">
                              ব্যবসায় উদ্যোগ
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubSeven" class="collapse" aria-labelledby="subHeadingSeven" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>ব্যবসায় পরিচিতি</li>
                                <li>ব্যবসায় উদ্যোগ ও উদ্যোক্তা</li>
                                <li>আত্মকর্মসংস্থান</li>
                                <li>মালিকানার ভিত্তিতে ব্যবসায়</li>
                                <li>ব্যবসায়ের আইনগত দিক</li>
                                <li>ব্যবসায় প্রতিষ্ঠানের ব্যবস্থাপনা</li>
                                <li>বিপণন</li>
                                <li>ব্যবসায়ে নৈতিকতা ও সামাজিক দায়বদ্ধতা</li>
                            </ul>                           
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingEight">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubEight" aria-expanded="false" aria-controls="collapseSubSix">
                              ফিন্যান্স ও ব্যাংকিং
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubEight" class="collapse" aria-labelledby="subHeadingEight" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>অর্থায়ন ও ব্যবসায় অর্থায়ন</li>
                                <li>অর্থের সময়মূল্য</li>
                                <li>ঝুঁকি ও অনিশ্চয়তা</li>
                                <li>মূলধনি আয়-ব্যয়</li>
                                <li>ব্যাংকিং ব্যবসা ও তার ধরন</li>
                                <li>বাণিজ্যিক ব্যাংক ও তার পরিচিতি</li>
                                <li>ব্যাংকের আমানত</li>
                            </ul>                            
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingNine">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubNine" aria-expanded="false" aria-controls="collapseSubSix">
                              হিসাববিজ্ঞান
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubNine" class="collapse" aria-labelledby="subHeadingNine" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                              <li>লেনদেন</li>
                              <li>দু’তরফা দাখিলা পদ্ধতি</li>
                              <li>মূলধন ও মুনাফা জাতীয় লেনদেন</li>
                              <li>হিসাব</li>
                              <li>জাবেদা</li>
                              <li>খতিয়ান</li>
                              <li>রেওয়ামিল</li>
                              <li>আর্থিক বিবরণী</li>
                            </ul>                            
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingTen">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubTen" aria-expanded="false" aria-controls="collapseSubSix">
                              অর্থনীতি
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubTen" class="collapse" aria-labelledby="subHeadingTen" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>অর্থনীতি পরিচয়</li>
                                <li>অর্থনীতির গুরুত্বপূর্ণ ধারণাসমূহ</li>
                                <li>উপযোগ, চাহিদা, যোগান ও ভারসাম্য</li>
                                <li>উৎপাদন ও সংগঠন</li>
                                <li>জাতীয় আয় ও এর পরিমাপ</li>
                                <li>বাংলাদেশের গুরুত্বপূর্ণ অর্থনৈতিক প্রসঙ্গ</li>
                            </ul>                           
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingEleven">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubEleven" aria-expanded="false" aria-controls="collapseSubSix">
                              গার্হস্থ্য বিজ্ঞান
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubEleven" class="collapse" aria-labelledby="subHeadingEleven" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>গৃহ ব্যবস্থাপনা</li>
                                <li>গৃহ ব্যবস্থাপক</li>
                                <li>সম্পদ</li>
                                <li>গৃহ সম্পদের ব্যবস্থাপনা</li>
                                <li>গৃহের অভ্যন্তরীণ সজ্জা</li>
                                <li>শিশুর বর্ধন ও বিকাশ</li>
                                <li>শিশু বিকাশ ও পারিবারিক পরিবেশ</li>
                                <li>কৈশোরের মনোসামাজিক সমস্যা-প্রতিকার ও প্রতিরোধ</li>
                                <li>খাদ্যের কাজ ও উপাদান</li>
                                <li>খাদ্য প্রস্তুত ও পরিবেশন</li>
                                <li>পোশাকের শিল্প উপাদান ও শিল্পনীতি</li>
                                <li>পোশাকের যত্ন ও পারিপাট্যতা</li>
                            </ul>                            
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingTwelve">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubTwelve" aria-expanded="false" aria-controls="collapseSubSix">
                              হিন্দুধর্ম ও নৈতিক শিক্ষা
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubTwelve" class="collapse" aria-labelledby="subHeadingTwelve" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>১ম পরিচ্ছেদ: হিন্দু ধর্মের বিশ্বাস</li>
                                <li>২য় পরিচ্ছেদ: হিন্দু ধর্মের উৎপত্তি ও ক্রমবিকাশ</li>
                                <li>ধর্মীয় আচার-অনুষ্ঠান</li>
                                <li>হিন্দু ধর্মে সংস্কার</li>
                                <li>দেব-দবেী ও পূজা</li>
                                <li>যোগসাধনা</li>
                                <li>ধর্মপথ ও আদর্শ জীবন</li>
                            </ul>                           
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingThirty">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubThirty" aria-expanded="false" aria-controls="collapseSubSix">
                              ইসলাম ও নৈতিক শিক্ষা
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubThirty" class="collapse" aria-labelledby="subHeadingThirty" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>আকাইদ ও নৈতিক জীবন</li>
                                <li>শরিয়তের উৎস</li>
                                <li>ইবাদত</li>
                                <li>আখলাক</li>
                                <li>আদর্শ জীবনচরিত</li>
                            </ul>                           
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingForty">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubForty" aria-expanded="false" aria-controls="collapseSubSix">
                              কৃষিশিক্ষা
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubForty" class="collapse" aria-labelledby="subHeadingForty" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>কৃষি প্রযুক্তি</li>
                                <li>কৃষি উপকরণ</li>
                                <li>কৃষিজ উৎপাদন</li>
                            </ul>                            
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingFifty">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubFifty" aria-expanded="false" aria-controls="collapseSubSix">
                              জীব বিজ্ঞান
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubFifty" class="collapse" aria-labelledby="subHeadingFifty" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>জীবনপাঠ</li>
                                <li>জীবকোষ ও টিস্যু</li>
                                <li>জীবনীশক্তি</li>
                                <li>খাদ্য, পুষ্টি এবং পরিপাক</li>
                                <li>জীবে পরিবহন</li>
                                <li>রেচন প্রক্রিয়া</li>
                                <li>জীবের প্রজনন</li>
                                <li>জীবের বংশগতি ও বিবর্তন</li>
                            </ul>                           
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingSixteen">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubSixteen" aria-expanded="false" aria-controls="collapseSubSix">
                              রসায়ন
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubSixteen" class="collapse" aria-labelledby="subHeadingSixteen" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>রসায়ণের ধারণা</li>
                                <li>পদার্থের অবস্থা</li>
                                <li>পদার্থের গঠন</li>
                                <li>পর্যায় সারণি</li>
                                <li>রাসায়নিক বন্ধন</li>
                                <li>মোলের ধারণা ও রাসায়নিক গণনা</li>
                                <li>রাসায়নিক বিক্রিয়া</li>
                                <li>খনিজ সম্পদ-জীবাশ্ন</li>
                            </ul>                           
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingSeventeen">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubSeventeen" aria-expanded="false" aria-controls="collapseSubSix">
                              পদার্থ বিজ্ঞান
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubSeventeen" class="collapse" aria-labelledby="subHeadingSeventeen" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>ভৌত রাশি এবং পরিমাপ</li>
                                <li>গতি</li>
                                <li>বল</li>
                                <li>কাজ, ক্ষমতা ও শক্তি</li>
                                <li>পদার্থের অবস্থা ও চাপ</li>
                                <li>তরঙ্গ ও শব্দ</li>
                                <li>আলোর প্রতিফলন</li>
                                <li>চল বিদ্যুৎ</li>
                            </ul>                            
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingEighteen">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubEighteen" aria-expanded="false" aria-controls="collapseSubSix">
                              উচ্চতর গণিত
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubEighteen" class="collapse" aria-labelledby="subHeadingEighteen" data-parent="#accordionExamSubject">
                          <div class="card-body">
                                                    
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingNineteen">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubNineteen" aria-expanded="false" aria-controls="collapseSubSix">
                              বাংলাদেশ ও বিশ্বপরিচয়
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubNineteen" class="collapse" aria-labelledby="subHeadingNineteen" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>পূর্ব বাংলার আন্দোলন ও জাতীয়তাবাদের উত্থান</li>
                                <li>স্বাধীন বাংলাদেশ</li>
                                <li>বাংলাদেশের ভূপ্রকৃতি ও জলবায়ু</li>
                                <li>বাংলাদেশের নদ নদী ও প্রাকৃতিক সম্পদ</li>
                                <li>রাষ্ট্র, নাগরিকতা ও আইন</li>
                                <li>জাতিসংঘ ও বাংলাদেশ</li>
                                <li> জাতীয় সম্পদ ও অর্থনৈতিক ব্যবস্থা</li>
                                <li>অর্থনৈতিক নির্দেশকসমূহ ও বাংলাদেশের অর্থনীতির প্রকৃতি</li>
                                <li>বাংলাদেশের সামাজিক সমস্যা ও এর প্রতিকার</li>
                            </ul>                 
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingTwenty">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubTwenty" aria-expanded="false" aria-controls="collapseSubSix">
                              তথ্য ও যোগাযোগ প্রযুক্তি
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubTwenty" class="collapse" aria-labelledby="subHeadingTwenty" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>তথ্য ও যোগাযোগ প্রযুক্তি এবং আমাদের বাংলাদেশ</li>
                                <li>কম্পিউটার ও কম্পিউটার ব্যবহারকারীর নিরাপত্তা</li>
                                <li>আমার শিক্ষায় ইন্টারনেট</li>
                                <li>আমার লেখালেখি ও হিসাব</li>
                                <li>মাল্টিমিডিয়া ও গ্রাফিক্স</li>
                            </ul>           
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingTwoentyOne">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubTwoentyOne" aria-expanded="false" aria-controls="collapseSubSix">
                              গণিত
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubTwoentyOne" class="collapse" aria-labelledby="subHeadingTwoentyOne" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>সেট ও ফাংশন</li>
                                <li>বীজগাণিতিক রাশি</li>
                                <li>সূচক ও লগারিদম</li>
                                <li>ব্যবহারিক জ্যামিতি</li>
                                <li>বৃত্ত</li>
                                <li>ত্রিকোণমিতিক অনুপাত</li>
                                <li>সসীম ধারা</li>
                                <li>পরিমিতি</li>
                                <li>পরিসংখ্যান</li>
                            </ul>            
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingTwoentyTwo">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubTwoentyTwo" aria-expanded="false" aria-controls="collapseSubSix">
                              English 2nd Paper
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubTwoentyTwo" class="collapse" aria-labelledby="subHeadingTwoentyTwo" data-parent="#accordionExamSubject">
                          <div class="card-body">
                                 
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingTwoentyThree">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubTwoentyThree" aria-expanded="false" aria-controls="collapseSubSix">
                              English 1st Paper
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubTwoentyThree" class="collapse" aria-labelledby="subHeadingTwoentyThree" data-parent="#accordionExamSubject">
                          <div class="card-body">
                                     
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingTwoentyFour">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubTwoentyFour" aria-expanded="false" aria-controls="collapseSubSix">
                              বাংলা ২য় পত্র
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubTwoentyFour" class="collapse" aria-labelledby="subHeadingTwoentyFour" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>ধ্বনিতত্ত্ব</li>
                                <li>ধ্বনি পরিবর্তন</li>
                                <li>সন্ধি</li>
                                <li>দ্বিরুক্ত শব্দ</li>
                                <li>সংখ্যাবাচক শব্দ</li>
                                <li>পদাশ্রিত নির্দেশক</li>
                                <li>সমাস</li>
                                <li>উপসর্গ</li>
                                <li>কৃৎ-প্রত্যয়ের বিস্তারিত আলোচনা</li>
                                <li>তদ্ধিত প্রত্যয়</li>
                                <li>শব্দের শ্রেণিবিভাগ</li>
                                <li>পদ-প্রকরণ</li>
                                <li>ক্রিয়াপদ</li>
                                <li>কারক ও বিভক্তি এবং সম্বন্ধ পদ ও সম্বোধন পদ</li>
                                <li>অনুসর্গ বা কর্মপ্রবচনীয় শব্দ</li>
                                <li>বাক্য প্রকরণ</li>
                                <li>শব্দের যোগ্যতার বিকাশ ও বাগধারা</li>
                                <li>উক্তি পরিবর্তন</li>
                                <li>বাচ্য এবং বাচ্য পরিবর্তন</li>
                            </ul>   
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingTwoentyFive">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubTwoentyFive" aria-expanded="false" aria-controls="collapseSubSix">
                              বাংলা ১ম পত্র
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubTwoentyFive" class="collapse" aria-labelledby="subHeadingTwoentyFive" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>গদ্য</li>
                                <li>সুভা</li>
                                <li>আম আঁটির ভেঁপু</li>
                                <li>বইপড়া</li>
                                <li>মানুষ মুহাম্মদ (স.)</li>
                                <li>নিমগাছ</li>
                                <li>শিক্ষা মনুষ্যত্ব</li>
                                <li>প্রবাস বন্ধু</li>
                                <li>মমতাদি</li>
                                <li>একাত্তরের দিনগুলি</li>
                                <li>সাহিত্যের রূপ ও রীতি</li>
                                <li>পদ্য</li>
                                <li>বঙ্গবাণী</li>
                                <li>কপোতাক্ষ নদ</li>
                                <li>জীবন-সঙ্গীত</li>
                                <li>মানুষ</li>
                                <li>পল্লিজননী</li>
                                <li>রানার</li>
                                <li>তোমাকে পাওয়ার জন্যে, হে স্বাধীনতা</li>
                                <li>আমার পরিচয়</li>
                                <li>স্বাধীনতা, এই শব্দটি কীভাবে আমোদের হলো</li>
                                <li>উপন্যাসঃ কাকতাড়ুয়া</li>
                                <li>নাটকঃ বহিপীর</li>
                            </ul>               
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="cd-warp">
                  <h3>এছাড়াও পাচ্ছেনঃ </h3>
                  <div class="cdw-grid">
                    <ul class="key-feature">
                      {{-- <li><i class="fas fa-clipboard-check"></i> বিসিএস পরীক্ষার জন্য প্রস্তুতি নেয়ার একটি সঠিক গাইডলাইন</li> --}}
                      <li><i class="fas fa-clipboard-check"></i>এস এস সি পরীক্ষা সিলেবাস ও প্রতিটি বিষয়ের বিস্তারিত ব্যাখ্যা</li>
                      {{-- <li><i class="fas fa-clipboard-check"></i> এস এস সি পরীক্ষা প্রশ্ন ও সমাধান </li> --}}
                      <li><i class="fas fa-clipboard-check"></i> এটিই পূর্ণাঙ্গ কোর্স নই , এখানে প্রতিনিয়ত নতুন নতুন প্রশ্ন সংযোজন করা হচ্ছে </li>
                      <li><i class="fas fa-clipboard-check"></i> ক্রয় কৃত প্রস্তুতি পরীক্ষায় অংশ গ্রহণের সময় কেউ বই দেখে পরীক্ষা দিবেন না , নিজে নিজে  চেষ্টা করুন এবং নিজেকে যাচাই করুন | </li>
                    </ul>
                  </div>
                </div>
                <div class="cd-warp">
                  <h3>পেমেন্ট পদ্ধতিঃ </h3>
                  <div class="cdw-grid">
                    <ul class="key-feature">
                      <li><i class="fas fa-clipboard-check"></i> পরীক্ষাটি ক্রয় করতে হলে আপনাকে এক্সামলীতে রেজিস্ট্রেশন করতে হবে | </li>
                      <li><i class="fas fa-clipboard-check"></i> আপনার রেজিস্ট্রেশন সম্পন্ন হলে ড্যাশবোর্ড থেকে আপনি বিকাশ , নগদ , রকেট , কার্ড যেকোনো অপশনের মাধ্যমে পেমেন্ট করতে এবং পরীক্ষাটি ক্রয় করতে পারবেন |</li>
                      {{-- <li><i class="fas fa-clipboard-check"></i> বিসিএস পরীক্ষার পুরো সিলেবাসের রিভিশন এবং সঠিক মূল্যায়নের সুযোগ</li>
                      <li><i class="fas fa-clipboard-check"></i> যেকোন ধরনের সমস্যা সমাধান, তথ্যের জন্য আলাদা ফেসবুক গ্রুপ</li> --}}
                    </ul>
                  </div>
                </div>             
              </div>
            </div>
            <div class="col-12 col-lg-5 order-0 mb-5 mb-lg-0 order-lg-1" id='ch'>
              <div class="cd-right">
                <div class="cdr-card">
                  <div class="embed-responsive embed-responsive-16by9">
                    {{-- <iframe class="embed-responsive-item" src="{{asset('public/uploads/course/theExamly Video.mp4')}}" allowfullscreen></iframe> --}}
                    <img class="embed-responsive-item" src="{{asset('public/uploads/course/s1.png')}}">
                  </div>
                  <div class="exam-price">
                    {{-- পরীক্ষাগুলির মূল্যঃ  --}}
                    {{-- <span class="original">৳ ৩,০০০</span> --}}
                    <span class="discount">পরীক্ষাগুলি এখন সম্পূর্ণ ফ্রি</span>
                  </div>
                  <div class="achievements">
                    <div class="row">                    
                      <div class="col-12 col-sm-6">
                        <div class="single_achivement d-flex align-items-center justify-content-start">
                          <div class="icon mr-2">
                            <i class="fas fa-book-open"></i>
                          </div>
                          <div class="single_achivement_text">
                            <h5 class="header mb-0">১৪৩৫৫০+</h5>
                            <p class="paragraph mb-0">প্রশ্ন ব্যাংক</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="single_achivement d-flex align-items-center justify-content-start">
                          <div class="icon mr-2">
                            <i class="fas fa-spell-check"></i>
                          </div>
                          <div class="single_achivement_text">
                            <h5 class="header mb-0">১০০০০+</h5>
                            <p class="paragraph mb-0">পরীক্ষার সংখ্যা</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="single_achivement d-flex align-items-center justify-content-start">
                          <div class="icon mr-2">
                            <i class="fas fa-users"></i>
                          </div>
                          <div class="single_achivement_text">
                            <h5 class="header mb-0">৫০০০+</h5>
                            <p class="paragraph mb-0">পরীক্ষার্থীর সংখ্যা</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="single_achivement d-flex align-items-center justify-content-start">
                          <div class="icon mr-2">
                            
                            <i class="fas fa-book"></i>
                          </div>
                          <div class="single_achivement_text">
                            <h5 class="header mb-0">১০+</h5>
                            <p class="paragraph mb-0">পরীক্ষার বিষয়সমূহ</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="cart-btn">
                    @if(Auth::user())
                      <a href="http://theexamly.com/admin/dashboard">শুরু করুন</a>
                    @else
                      <a href="{{route('user.login')}}">শুরু করুন</a>
                    @endif
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h3 class="mb-4">সম্পর্কিত অন্যান্য পরীক্ষা সমূহঃ</h3>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="cd-right mb-4">
                <div class="cdr-card">
                  <div class="card-img">
                    <img class="img-fluid rounded-top" src="{{asset('public/uploads/course/h2.png')}}">
                  </div>
                  <div class="exams-title">
                    এইচ এস সি
                  </div>
                  <div class="exam-price ex-related">
                    <span class="discount">পরীক্ষাগুলি এখন সম্পূর্ণ ফ্রি</span>
                    {{-- মূল্যঃ 
                    <span class="original">৳ ৩,০০০</span>
                    <span class="discount">৳ ১,০০০</span> --}}
                  </div>
                  <div class="cart-btn">
                      <a href="{{route('frontend.courses',['এইচ এস সি'])}}">বিস্তারিত </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

  @endsection

@push('custom-scripts') 
  <!-- filterByGroup.blade.php -->
  <script type="text/javascript">
    function showDiv(pageid){

      var value = pageid.split("/");

      var val1 = value['0'];
      var val2 = value['1'];
      // console.log(val1);
      // var val2 = value['1'].split("");
      // var value2=val2.toString();
      jQuery.ajax({
        url : 'subject/' +val1 +'/'+val2,
        type : "GET",
        dataType : "json",
        beforeSend: function(jqXHR,settings)
        {
            $('.ajax_loader').css("visibility", "visible");
            console.log(settings.url);
        },
        success:function(data)
        {
          // console.log(data);
          $('#subject').empty();
          $('#ch').empty();
          // console.log('check');
              // console.log(data);
            if(data==''){
              //alert('hi');
              $('#ch').append('শীঘ্রই আসবে');
              // $('#ch').css('display','');
            }
            // elseif(val!='' && val1 !='5'){
            //   $('#ch').append('উদ্ভোধনের অপেক্ষায় ');
            // }
            else{
              $('#ch').append('');
              // $('#ch').css('display','none');
            } 

            $.each(data,function(index,val){
                 console.log(val[0].full_name);
                 $('#ch').append('<div class="courses_heading_filter"><div class="row mb-4 align-items-center"><div class="col-md-12 mb-3 mb-md-0"><h1>'+ val[index].full_name+'</h1></div></div></div><div class="row"><div class="col-12"><img class="img-fluid" src="{{asset('public/uploads/files/banner/')}}/'+ val[index].image+'" alt="Course Image"></div><div class="col-12"><div class="course-assign"><div class="course-assign-count"><i class="fas fa-user-check"></i><div class="cac-text"><p>কোর্সটি ক্রয় করছেন</p><p class="font-weight-bold">'+ val[index].purchasing_count+' জন</p></div></div><div class="course-assign-btn"><a class="btn" href="#">কোর্সটি ক্রয় করুন</a></div></div></div><div class="col-12"><div class="course-features"><h3>যে যে বিষয়ে শিখতে ও পরীক্ষা দিতে পারবেন- </h3><ul>'+for(let index = 0; index < val.length; index++){ '<li><i class="fas fa-book-reader"></i>100</li>'  +} '</ul></div><div class="course-features"><h3>কোর্সটি করতে আপনার প্রয়োজন হবে-</h3><ul><li><i class="far fa-check-square"></i> কোর্সটির প্রিমিয়াম সদস্যপদ</li><li><i class="far fa-check-square"></i> স্মার্টফোন অথবা কম্পিউটার বা ল্যাপটপ</li><li><i class="far fa-check-square"></i> ওয়াইফাই বা মোবাইল ইন্টারনেট সংযোগ</li></ul></div><div class="course-features"><h3>বিস্তারিত জানতে কল করুন:- <a href="tel:+৮৮০১৯১৩৮০০৮০০">০১৯১৩ ৮০০ ৮০০</a></h3></div></div></div>'); 
            });
         
              // for (let index = 0; index < val.length; index++) {
                
              
              // } 
         
        },
        complete: function()
          {
            $('.ajax_loader').css("visibility", "hidden");
          },
      });
    }
  </script>

  <!-- filterByPaidFree.blade.php -->
  <script type="text/javascript">
    function showDiv2(checkid) {

    if ( $('#paid').is(':checked') ) { 
    // function showDiv2(checkid){

      var id = checkid;

      jQuery.ajax({
        url : 'subjects/' +id,
        type : "GET",
        dataType : "json",
        beforeSend: function(jqXHR,settings)
        {
            $('.ajax_loader').css("visibility", "visible");
            // console.log(settings.url);
        },
        success:function(data)
        {
          // console.log(data);
          $('#subject').empty();
          $.each(data , function(index, val) { 
            for (let index = 0; index < val.length; index++) {
              $('#subject').append('<div class="col-xl-4 col-md-6"><div class="single_courses"><a href="{{ url("/courseDetails/") }}/'+ val[index].id+'"><div class="course_image text-center"><img class="img-fluid" src="{{ asset("public/uploads/subject") }}/'+val[index].image+'" alt="top-courses"/></div></a><div class="course_body p-2 text-center"><a class="text-decoration-none" href="{{ url("/courseDetails/") }}/'+ val[index].id+'"><h4 class="title mb-0">'+val[index].name+'</h4></a><div class="courses_footer d-flex align-items-center justify-content-between"><div class="course_info"><span class="amount mr-2">'+(val[index].price<1 ? 'Free': (val[index].price)+' Tk') +'</span></div><div class="course_action"><a class="btn_primary text-decoration-none" href="{{ route('user.login') }}"><span>Add to Cart</span></a></div></div></div></div></div>'); 
            }
          });
          
        },
        complete: function()
          {
            $('.ajax_loader').css("visibility", "hidden");
          },
      });
    }else{
      $('#subject').empty();
    }
  }
    
  </script>
  <script type="text/javascript">
    function showDiv1(checkid) {

    if( $('#free').is(':checked') ){
          
          var id = checkid;

          jQuery.ajax({
            url : 'subjects/' +id,
            type : "GET",
            dataType : "json",
            beforeSend: function(jqXHR,settings)
            {
                $('.ajax_loader').css("visibility", "visible");
                // console.log(settings.url);
            },
            success:function(data)
            {
              // console.log(data);
              $('#subject').empty();
              $.each(data , function(index, val) { 
                for (let index = 0; index < val.length; index++) {
                  $('#subject').append('<div class="col-xl-4 col-md-6"><div class="single_courses"><a href="{{ url("/courseDetails/") }}/'+ val[index].id+'"><div class="course_image text-center"><img class="img-fluid" src="{{ asset("public/uploads/subject") }}/'+val[index].image+'" alt="top-courses"/></div></a><div class="course_body p-2 text-center"><a class="text-decoration-none" href="{{ url("/courseDetails/") }}/'+ val[index].id+'"><h4 class="title mb-0">'+val[index].name+'</h4></a><div class="courses_footer d-flex align-items-center justify-content-between"><div class="course_info"><span class="amount mr-2">'+(val[index].price<1 ? 'Free': (val[index].price)+' Tk') +'</span></div><div class="course_action"><a class="btn_primary text-decoration-none" href="{{ route('user.login') }}"><span>Add to Cart</span></a></div></div></div></div></div>'); 
                  // <span class="enrolled_users mr-2">No of Exam&nbsp;</i>'+val[index].no_of_exam+'</span>
                }
              });
              
            },
            complete: function()
              {
                $('.ajax_loader').css("visibility", "hidden");
              },
          });
    }else{
      $('#subject').empty();
    }
  }
  </script>
  <script type="text/javascript">
    $('#sortBy').change(function() {
      var val =$('#sortBy').val();
      var val2 =$('#groupType').val();
      
    //   function showDiv(pageid){

    //   var value = pageid.split("/");

    //   var val1 = value['0'];
    //   var val2 = value['1'];

    //   console.log(value);
    // };
    var get = $('#track').val();
    console.log(get);
      jQuery.ajax({
        url : 'sortBy/' +val,
        type : "GET",
        dataType : "json",
        beforeSend: function(jqXHR,settings)
        {
            $('.ajax_loader').css("visibility", "visible");
            console.log(settings.url);
        },
        success:function(data)
        {
          console.log(data);
          $('#subject').empty();
          $.each(data , function(index, val) { 
            for (let index = 0; index < val.length; index++) {
              $('#subject').append('<div class="col-xl-4 col-md-6"><div class="single_courses"><a href="{{ url("/courseDetails/") }}/'+ val[index].id+'"><div class="course_image text-center"><img class="img-fluid" src="{{ asset("public/uploads/subject") }}/'+val[index].image+'" alt="top-courses"/></div></a><div class="course_body p-2 text-center"><a class="text-decoration-none" href="{{ url("/courseDetails/") }}/'+ val[index].id+'"><h4 class="title mb-0">'+val[index].name+'</h4></a><div class="courses_footer d-flex align-items-center justify-content-between"><div class="course_info"><span class="amount mr-2">'+(val[index].price<1 ? 'Free': (val[index].price)+' Tk') +'</span></div><div class="course_action"><a class="btn_primary text-decoration-none" href="{{ route('user.login') }}"><span>Add to Cart</span></a></div></div></div></div></div>'); 
            }
          });
        },
        complete: function()
          {
            $('.ajax_loader').css("visibility", "hidden");
          },
      });
    });
  </script>
@endpush
