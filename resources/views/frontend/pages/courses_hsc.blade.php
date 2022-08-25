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
                  <h1>এইচ এস সি প্রস্তুতি পরীক্ষা</h1>
                  <p></p>
                </div>
                <div class="cd-warp">
                  <h3>যা যা পাচ্ছেনঃ</h3>
                  <div class="cdw-grid">
                    <ul class="key-feature">
                      <li><i class="fas fa-clipboard-check"></i> এইচ এস সি পরীক্ষার জন্য প্রস্তুতি নেয়ার একটি সঠিক গাইডলাইন</li>
                      <li><i class="fas fa-clipboard-check"></i>এইচ এস সি পরীক্ষার পুরো সিলেবাসের রিভিশন এবং সঠিক মূল্যায়নের সুযোগ</li>
                      <li><i class="fas fa-clipboard-check"></i> যেকোন ধরনের সমস্যা সমাধান, তথ্যের জন্য আলাদা ফেসবুক গ্রুপ</li>
                    </ul>
                    <div class="content">
                      <h3>পরীক্ষা সম্পর্কেঃ </h3>
                      <p></p>
                      <p></p>

                      <h3>প্রস্তুতি পরীক্ষাটি কাদের জন্য?</h3>
                      <ul>
                        <li><i class="fas fa-clipboard-check"></i> যারা এইচ এস সি পরীক্ষার প্রস্তুতি নিচ্ছেন ।</li>
                        <li><i class="fas fa-clipboard-check"></i> যারা এইচ এস সি পরীক্ষার জন্য সঠিক গাইডলাইন খুঁজছেন ।</li>
                        <li><i class="fas fa-clipboard-check"></i> যারা এইচ এস সি পরীক্ষার পুরো সিলেবাস রিভিশন- এর মাধ্যমে ভালো প্রস্তুতি নিতে চায় ।</li>
                        <li><i class="fas fa-clipboard-check"></i> যারা বার বার পরীক্ষা দিবার মাধ্যমে নিজেকে যাচাই করতে চান এবং মূল পরীক্ষার আগে নিজেকে প্রস্তুত করতে চান |</li>              
                      </ul>

                      <h3>এই প্রস্তুতি পরীক্ষাটির বৈশিষ্ট্যগুলো কী কী?</h3>
                      <ul>
                        <li><i class="fas fa-clipboard-check"></i> এইচ এস সি পরীক্ষা প্রস্তুতির সবকিছু এমনভাবে ডিজাইন করা হয়েছে যাতে আপনি ঘরে বসেই অল্প সময়ে সর্বোচ্চ প্রস্তুতি নিশ্চিত করতে পারেন ।</li>
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
                              ব্যবসায় সংগঠন ও ব্যবস্থাপনা ২য় পত্র
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>

                        <div id="collapseSubOne" class="collapse" aria-labelledby="subHeadingOne" data-parent="#accordionExamSubject">
                          <div class="card-body">

                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingTwo">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubTwo" aria-expanded="false" aria-controls="collapseSubTwo">
                              ব্যবসায় সংগঠন ও ব্যবস্থাপনা ১ম পত্র 
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubTwo" class="collapse" aria-labelledby="subHeadingTwo" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingThree">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubThree" aria-expanded="false" aria-controls="collapseSubThree">
                              বাংলা ১ম পত্র 
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubThree" class="collapse" aria-labelledby="subHeadingThree" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>গদ্য</li>
                                <li>অপরিচিতা</li>
                                <li>বিলাসি</li>
                                <li>আমার পথ</li>
                                <li>মানব কল্যাণ</li>
                                <li>মাসি - পিসি</li>
                                <li>বায়ান্নোর দিনগুলো</li>
                                <li>রেইনকোট</li>
                                <li>পদ্য</li>
                                <li>সোনার তরী</li>
                                <li>বিদ্রোহী</li>
                                <li>প্রতিদান</li>
                                <li>তাহারেই পড়ে মনে</li>
                                <li>আঠার বছর বয়স</li>
                                <li>ফেব্রুয়ারি ১৯৬৯</li>
                                <li>আমি কিংবদন্তির কথা বলছি</li>
                                <li>উপন্যাস - লালসালু</li>
                                <li>নাটক - সিরাজউদ্দৌলা</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingFour">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubFour" aria-expanded="false" aria-controls="collapseSubFour">
                              বাংলা ২য় পত্র
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubFour" class="collapse" aria-labelledby="subHeadingFour" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>বাংলা উচ্চারনের নিয়ম</li>
                                <li>বাংলা বানানের নিয়ম</li>
                                <li>বাংলা ভাষার ব্যাকরণিক শব্দ শ্রেণী</li>
                                <li>বাংলা শব্দ গঠন: (উপসর্গ ও সমাস)</li>
                                <li>বাক্যতত্ত্ব</li>
                                <li>বাংলাভাষার অপপ্রয়োগ ও শুদ্ধ প্রয়োগ</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingFive">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubFive" aria-expanded="false" aria-controls="collapseSubFive">
                              English 1st paper
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubFive" class="collapse" aria-labelledby="subHeadingFive" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingSix">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubSix" aria-expanded="false" aria-controls="collapseSubSix">
                              English 2nd paper
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubSix" class="collapse" aria-labelledby="subHeadingSix" data-parent="#accordionExamSubject">
                          <div class="card-body">
                                                        
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingSeven">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubSeven" aria-expanded="false" aria-controls="collapseSubSix">
                              তথ্য ও যোগাযোগ প্রযুক্তি
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubSeven" class="collapse" aria-labelledby="subHeadingSeven" data-parent="#accordionExamSubject">
                          <div class="card-body">
                             <ul>
                                 <li>তথ্য ও যোগাযোগ প্রযুক্তি</li>
                                 <li>কমিউনিকেশন ও কম্পিউটার নেটওয়ার্কিং</li>
                                 <li>সংখ্যা পদ্ধতি ও ডিজিটাল ডিভাইস</li>
                                 <li>ওয়েব ডিজাইন পরিচিতি এবং HTML</li>
                                 <li>প্রোগ্রামিং ভাষা</li>
                             </ul>                          
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingEight">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubEight" aria-expanded="false" aria-controls="collapseSubSix">
                              উচ্চতর গণিত ১ম পত্র
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubEight" class="collapse" aria-labelledby="subHeadingEight" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>ম্যাট্রিক্স ও নির্ণায়ক</li>
                                <li>সরল রেখা</li>
                                <li>বৃত্ত</li>
                                <li>সংযুক্ত কোণের ত্রিকোণমিতিক অনুপাত</li>
                                <li>অন্তরীকরণ</li>
                                <li>যোগজীকরণ</li>
                            </ul>                           
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingNine">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubNine" aria-expanded="false" aria-controls="collapseSubSix">
                              উচ্চতর গণিত ২য় পত্র
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubNine" class="collapse" aria-labelledby="subHeadingNine" data-parent="#accordionExamSubject">
                          <div class="card-body">
                             <ul>
                                 <li>জটিল সংখ্যা</li>
                                 <li>বহুপদী ও বহুপদী সমীকরণ</li>
                                 <li>কণিক</li>
                                 <li>বিপরীত ত্রিকোণমিতিক ফাংশান ও ত্রিকোণমিতিক সমীকরণ</li>
                                 <li>স্থিতিবিদ্যা</li>
                                 <li>সমতলে চলমান কণার গতি</li>
                             </ul>                           
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingTen">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubTen" aria-expanded="false" aria-controls="collapseSubSix">
                              পদার্থ বিজ্ঞান ১ম পত্র
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubTen" class="collapse" aria-labelledby="subHeadingTen" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>ভৌতজগত ও পরিমাপ</li>
                                <li>ভেক্টর</li>
                                <li>নিউটনিয়ান বলবিদ্যা</li>
                                <li>কাজ, শক্তি ও ক্ষমতা</li>
                                <li>মহাকর্ষ ও অভিকর্ষ</li>
                                <li>পদার্থের গাঠনিক ধর্ম</li>
                                <li>পর্যাবৃত্ত গতি</li>
                                <li>আদর্শ গ্যাস ও গ্যাসের গতিতত্ত্ব</li>
                            </ul>                            
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingEleven">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubEleven" aria-expanded="false" aria-controls="collapseSubSix">
                              পদার্থ বিজ্ঞান ২য় পত্র
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubEleven" class="collapse" aria-labelledby="subHeadingEleven" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>তাপগতিবিদ্যা</li>
                                <li>স্থির তড়িৎ</li>
                                <li>চল তড়িৎ</li>
                                <li>ভৌত আলোক বিজ্ঞান</li>
                                <li>আধুনিক পদার্থ বিজ্ঞানের সূচনা</li>
                                <li>পরমাণুর মডেল এবং নিউক্লিয়ার পদার্থবিজ্ঞান</li>
                                <li>সেমিকন্ডাক্টর ও ইলেকট্রনিক্স</li>
                            </ul>                            
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingTwelve">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubTwelve" aria-expanded="false" aria-controls="collapseSubSix">
                              রসায়ন ১ম পত্র
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubTwelve" class="collapse" aria-labelledby="subHeadingTwelve" data-parent="#accordionExamSubject">
                          <div class="card-body">
                             <ul>
                                 <li>গুণগত রসায়ন</li>
                                 <li>মৌলের পর্যায়বৃত্ত ধর্ম ও রাসায়নিক বন্ধন</li>
                                 <li>রাসায়নিক পরিবর্তন</li>
                                 <li>কর্মমুখী রসায়ন</li>
                             </ul>                           
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingThirteen">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubThirteen" aria-expanded="false" aria-controls="collapseSubSix">
                              রসায়ন ২য় পত্র
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubThirteen" class="collapse" aria-labelledby="subHeadingThirteen" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>পরিবেশ রসায়ন</li>
                                <li>জৈব রসায়ন</li>
                                <li>পরিমানগত রসায়ন</li>
                                <li>তড়িৎ রসায়ন</li>
                            </ul>                            
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingFourteen">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubFourteen" aria-expanded="false" aria-controls="collapseSubSix">
                              জীব বিজ্ঞান ১ম পত্র
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubFourteen" class="collapse" aria-labelledby="subHeadingFourteen" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>কোষ ও এর গঠন</li>
                                <li>কোষ বিভাজন</li>
                                <li>অনুজীব</li>
                                <li>নগ্নবীজি ও আবৃতবীজি উদ্ভিদ</li>
                                <li>টিস্যু ও টিস্যুতন্ত্র</li>
                                <li>উদ্ভিদ শরীরতত্ত্ব</li>
                                <li>জীব প্রযুক্তি</li>
                            </ul>                           
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingFifteen">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubFifteen" aria-expanded="false" aria-controls="collapseSubSix">
                              জীব বিজ্ঞান ২য় পত্র
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubFifteen" class="collapse" aria-labelledby="subHeadingFifteen" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>প্রাণীর বিভিন্নতা ও শ্রেণী বিন্যাস</li>
                                <li>প্রাণীর পরিচিতি</li>
                                <li>মানব শরীরত্ত্ব: পরিপাক ও শোষণ</li>
                                <li>মানব শরীরত্ত্ব: রক্ত ও সঞ্চালন</li>
                                <li>মানব শরীরতত্ত্ব: শ্বাসক্রিয়া ও শ্বসন</li>
                                <li>মানব শরীরতত্ত্ব: চলন ও অঙ্গচালনা</li>
                                <li>জিনত্ত্ব ও বিবর্তন</li>
                            </ul>                            
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingSixteen">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubSixteen" aria-expanded="false" aria-controls="collapseSubSix">
                              ফিনান্স, ব্যাংকিং ও বীমা ২য় পত্র
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubSixteen" class="collapse" aria-labelledby="subHeadingSixteen" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>ব্যাংক ব্যবস্থার প্রাথমিক ধারণা</li>
                                <li>কেন্দ্রিয় ব্যাংক</li>
                                <li>চেক, বিল অব এক্সচেঞ্জ ও প্রমিসরি নোট</li>
                                <li>ইলেকট্রনিক ও আধুনিক ব্যাংকিং</li>
                                <li>বিমা সম্পর্কে মৌলিক ধারণা</li>
                                <li>জীবন বিমা</li>
                                <li>ব্যাংক হিসাব</li>
                            </ul>                            
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingSeventeen">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubSeventeen" aria-expanded="false" aria-controls="collapseSubSix">
                              ফিনান্স, ব্যাংকিং ও বীমা ১ম পত্র
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubSeventeen" class="collapse" aria-labelledby="subHeadingSeventeen" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>অর্থায়নের সূচনা</li>
                                <li>অর্থের সময় মূল্য</li>
                                <li>দীর্ঘমেয়াদি অর্থায়ন</li>
                                <li>মূলধন বাজেটিং ও বিনিয়োগ সিদ্ধান্ত</li>
                                <li>ঝুঁকি ও মুনাফার হার</li>
                            </ul>                            
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingEighteen">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubEighteen" aria-expanded="false" aria-controls="collapseSubSix">
                              হিসাব বিজ্ঞান ২য় পত্র
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubEighteen" class="collapse" aria-labelledby="subHeadingEighteen" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>অংশীদারী ব্যবসায়ের হিসাব</li>
                                <li>যৌথ মূলধনী কম্পানির মূলধন</li>
                                <li>যৌথ মূলধনী কম্পানির আর্থিক বিবরণ</li>
                                <li>আর্থিক বিবরণী বিশ্লেষণ</li>
                                <li>মজুদ পণ্যের হিসাব রক্ষণ পদ্ধতি</li>
                                <li>উৎপাদন ব্যায় হিসাব</li>
                            </ul>                            
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingNineteen">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubNineteen" aria-expanded="false" aria-controls="collapseSubSix">
                              হিসাব বিজ্ঞান ১ম পত্র
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubNineteen" class="collapse" aria-labelledby="subHeadingNineteen" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>হিসাবের বইসমূহ</li>
                                <li>ব্যাংক সমন্বয় বিবরণী</li>
                                <li>রেওয়ামিল</li>
                                <li>দৃশ্যমান সম্পদের হিসাবরক্ষণ</li>
                                <li>আর্থিক বিবরণী</li>
                                <li>হিসাববিজ্ঞান পরিচিতি</li>
                                <li>কার্যপত্র</li>
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
                      <li><i class="fas fa-clipboard-check"></i>এইচ এস সি পরীক্ষা সিলেবাস ও প্রতিটি বিষয়ের বিস্তারিত ব্যাখ্যা</li>
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
                    <img class="embed-responsive-item" src="{{asset('public/uploads/course/h1.png')}}">
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
                    <img class="img-fluid rounded-top" src="{{asset('public/uploads/course/s2.png')}}">
                  </div>
                  <div class="exams-title">
                    এস এস সি
                  </div>
                  <div class="exam-price ex-related">
                    <span class="discount">পরীক্ষাগুলি এখন সম্পূর্ণ ফ্রি</span>
                    {{-- মূল্যঃ 
                    <span class="original">৳ ৩,০০০</span>
                    <span class="discount">৳ ১,০০০</span> --}}
                  </div>
                  <div class="cart-btn">
                      <a href="{{route('frontend.courses',['এস এস সি'])}}">বিস্তারিত </a>
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
