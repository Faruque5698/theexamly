<?php use App\Models\Backend\Subject; ?>
@extends('frontend.layout.master')

@push('plugin-styles')
  {!! Html::style('/css/loader.css') !!}
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
                  <h1>বিসিএস প্রিলিমিনারি প্রস্তুতি পরীক্ষা</h1>
                    <p>বর্তমান সময়ে বিসিএস প্রিলিমিনারি পরীক্ষা সবচেয়ে প্রতিযোগিতামূলক পরীক্ষাগুলোর মধ্যে একটি। এই প্রতিযোগিতায় টিকে থাকতে হলে আমাদের দরকার পূর্ণ পরিকল্পনা ও অনুশীলন। এই পথচলায় আপনার সঠিক পথ প্রদর্শক হয়ে আপনাদের সামনে উপস্থিত হয়েছে theExamly.com </p>
                </div>
                <div class="cd-warp">
                  <h3>যা পাচ্ছেনঃ</h3>
                  <div class="cdw-grid">
                    <ul class="key-feature">
                      <li><i class="fas fa-clipboard-check"></i> দেশের সেরা শিক্ষক ও অভিজ্ঞ ব্যক্তিবর্গের দ্বারা তৈরিকৃত প্রশ্নের মাধ্যমে মডেল টেষ্টের ব্যবস্থা।</li>
                      <li><i class="fas fa-clipboard-check"></i> বিষয় ভিত্তিক প্রাকটিস পরীক্ষা দেওয়ার ব্যবস্থা।</li>
                      <li><i class="fas fa-clipboard-check"></i> প্রতিনিয়ত সরকারি নির্দেশাবলী এবং সাম্প্রতিক সিলেবাস অনুসরণ করা।</li>
                      <li><i class="fas fa-clipboard-check"></i> প্রতিদিনই নতুন তথ্য/প্রশ্ন সংযোজন ও পুরাতন তথ্য/প্রশ্ন বিয়োজন করা হয় ।</li>
                      <li><i class="fas fa-clipboard-check"></i> প্রত্যেক শিক্ষার্থীর মডেল টেষ্ট দেওয়ার মাধ্যমে গ্রেড ও মেরিট লিস্ট সম্পর্কে অবগত হওয়া।</li>
                      <li><i class="fas fa-clipboard-check"></i> ঘরে ও বাইরে যে কোন অবস্থায় অ্যাপের মাধ্যমে অধ্যয়ন এবং অনুশীলন চলিয়ে যাওয়া।</li>
                    </ul>
                    <div class="content">
                      <h3>পরীক্ষা সম্পর্কেঃ </h3>
 <p>বাংলাদেশ সিভিল সার্ভিস বা বিসিএস বাংলাদেশের সবচেয়ে প্রতিযোগিতামূলক চাকরির পরীক্ষাগুলোর মধ্যে একটি। প্রতি বছর গড়ে প্রায় ৫ লক্ষ প্রার্থী বিসিএস প্রিলিমিনারি পরীক্ষা দেয়,সেই হিসেবে প্রতি পদের বিপরীতে পরিক্ষার্থীর সংখ্যা গড়ে ২০৫ জন। যার ফলে সাধারণ প্রস্তুতির কোনো প্রার্থীর জন্য বাংলাদেশ সিভিল সার্ভিস ক্যাডার হওয়ার পথটা হয়ে পড়ে অনেক কঠিন।
                       বিসিএস পরীক্ষায় ভালো করার জন্য একাগ্রতা, সঠিক নির্দেশনা এবং পূর্ণাঙ্গ প্রস্তুতি খুবই গুরুত্বপূর্ণ। যদি ৪৫তম বিসিএস আপনার লক্ষ্য হয়ে থাকে, তাহলে এই প্রস্তুতি পরীক্ষাটি আপনার জন্যই!</p>
                    <p>
                       এই অত্যন্ত প্রতিযোগিতামূলক পরীক্ষার প্রস্তুতি নেয়ার সময় বেশিরভাগ বিসিএস পরীক্ষার্থীরা কোচিং সেন্টারের ভিড়ে হারিয়ে যায়। সঠিক মেন্টরশিপ এবং নির্দেশনার অভাবে অনেক পরীক্ষার্থী পরীক্ষার জন্য সঠিকভাবে প্রস্তুতি নিতে পারেন না । তাই বিসিএস পরীক্ষার সর্বোচ্চ প্রস্তুতি নিতে সাহায্য করার জন্য এক্সামলী আপনার জন্য নিয়ে এসেছে অভিজ্ঞ মেন্টরদের দ্বারা ডিজাইন করা বিসিএস প্রিলিমিনারি প্রস্তুতি পরীক্ষা!</p>                      
<!--<p>সবচেয়ে কম সময়ে আপনার সর্বোচ্চ প্রস্তুতি নিশ্চিত করার জন্য এই প্রস্তুতি পরীক্ষায় পুরো বিসিএস প্রিলিমিনারি সিলেবাস কভার করা হয়েছে যেখানে রয়েছে ১৪৩৫৫০+ প্রশ্ন ব্যাংক, ১০০০০+ পরীক্ষার সংখ্যা, ১০ টি পরীক্ষার বিষয়সমূহ ।-->
<!--যদি আপনি আপনার ৪৫তম বিসিএস -এ বিসিএস ক্যাডার হবার স্বপ্নকে পূরণ করতে চান, তাহলে এখনই শুরু করুন!</p>-->
                      <h3>প্রস্তুতি পরীক্ষাটি কাদের জন্য?</h3>
                      <ul>
                        <li><i class="fas fa-clipboard-check"></i> যারা প্রস্তুতি নিচ্ছেন বা নিবেন বলে ভাবছেন।</li>
                        <li><i class="fas fa-clipboard-check"></i> যারা নিজেদেরকে নিজেরাই যাচাই করতে চান।</li>
                        <li><i class="fas fa-clipboard-check"></i> যারা প্রতিযোগীতামূলক প্রস্তুতি নিতে চান।</li>            
                        </ul>

                      <!--<h3>এই প্রস্তুতি পরীক্ষাটির বৈশিষ্ট্যগুলো কী কী?</h3>-->
                      <!--<ul>-->
                      <!--  <li><i class="fas fa-clipboard-check"></i> বিসিএস প্রিলিমিনারি  পরীক্ষা প্রস্তুতির সবকিছু এমনভাবে ডিজাইন করা হয়েছে যাতে আপনি ঘরে বসেই অল্প সময়ে সর্বোচ্চ প্রস্তুতি নিশ্চিত করতে পারেন ।</li>-->
                      <!--  <li><i class="fas fa-clipboard-check"></i> দেশ সেরা বিসিএস ইন্সট্রাক্টর, যারা এখন পাবলিক সার্ভিসে বিসিএস ক্যাডার হিসেবে দায়িত্ব পালন করছেন, তারা আপনাকে পুরো কোর্সে গাইড করবেন ।</li>-->
                      <!--<li><i class="fas fa-clipboard-check"></i> ১৪৩৫৫০+ প্রশ্ন ব্যাংক, ১০০০০+ পরীক্ষার সংখ্যা, ১০ টি পরীক্ষার বিষয়সমূহ  ৪৫ তম বিসিএস প্রস্তুতির জন্য একটি সম্পূর্ণ প্যাকেজ পাচ্ছেন খুবই কম খরচে ।</li>-->
                      <!--</ul>-->
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
                              বিসিএস - বাংলা ভাষা ও সাহিত্য
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>

                        <div id="collapseSubOne" class="collapse" aria-labelledby="subHeadingOne" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                              <li>ভাষা</li>
                              <li>১.প্রয়োগ-অপপ্রয়োগ</li>
                              <li>২.বানান ও বাক্য শুদ্ধি</li>
                              <li>৩. পরিভাষা</li>
                              <li>৪. ধ্বনি</li>
                              <li>৫. বর্ণ</li>
                              <li>৬. শব্দ</li>
                              <li>৭. পদ</li>
                              <li>৮. বাক্য</li>
                              <li>৯. প্রত্যয়</li>
                              <li>১০. সন্ধি</li>
                              <li>১১. সমাস</li>
                              <li>সাহিত্য</li>
                              <li>১. প্রাচীন ও মধ্যযুগ</li>
                              <li>২. আধুনিক যুগ</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingTwo">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubTwo" aria-expanded="false" aria-controls="collapseSubTwo">
                              BCS - English Language and Literature
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubTwo" class="collapse" aria-labelledby="subHeadingTwo" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                              <li>English Language</li>
                              <li>A. Parts of Speech:</li>
                              <li>1. The Noun</li>
                              <li>The Determiner</li>
                              <li>3. The Gender</li>
                              <li>4. The Number</li>
                              <li>5. The Pronoun</li>
                              <li>6. The Verb</li>
                              <li>i. The Finite: transitive, intransitive</li>
                              <li>ii. The Non-finite: participles, infinitives, gerund</li>
                              <li>iii. The Linking Verb</li>
                              <li>iv. The Phrasal Verb</li>
                              <li>v. Modals</li>
                              <li>7. The Adjective</li>
                              <li>8.The Adverb</li>
                              <li>9.The Preposition</li>
                              <li>10. The Conjunction</li>
                              <li>B. Idioms & Phrases</li>
                              <li>1. Meanings of Phrases,</li>
                              <li>2. Kinds of Phrases</li>
                              <li>3. Identifying Phrases</li>
                              <li>C. Clauses:</li>
                              <li>1. The Principal Clause</li>
                              <li>2. The Subordinate Clause:</li>
                              <li>3. The Noun Clause</li>
                              <li>4. The Adjective Clause</li>
                              <li>5. The Adverbial Clause & its types</li>
                              <li>D. Corrections:</li>
                              <li>1. The Tense</li>
                              <li>2. The Verb</li>
                              <li>3. The Preposition</li>
                              <li>4. The Determiner</li>
                              <li>5. The Gender</li>
                              <li>6. The Number</li>
                              <li>7. Subject-Verb Agreement</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingThree">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubThree" aria-expanded="false" aria-controls="collapseSubThree">
                              বিসিএস - বাংলাদেশ বিষয়াবলি
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubThree" class="collapse" aria-labelledby="subHeadingThree" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                              <li>১.বাংলাদেশের জাতীয় বিষয়াবলি</li>
                              <li>ক) প্রাচীনকাল হতে সম- সাময়িক কালের ইতিহাস, কৃষ্টি ও সংস্কৃতি। বাংলাদেশের স্বাধীনতা যুদ্ধের ইতিহাস:</li>
                              <li>খ) ভাষা আন্দোলন; ১৯৫৪ সালের নির্বাচন; ছয়-দফা আন্দোলন, ১৯৬৬; গণ অভুত্থান ১৯৬৮-৬৯; ১৯৭০ সালের সাধারণ নির্বাচন; অসহযোগ আন্দোলন ১৯৭১;</li>
                              <li>গ) ৭ মার্চের ঐতিহাসিক ভাষণ; স্বাধীনতা ঘোষণা; মুজিবনগর সরকারের গঠন ও কার্যাবলি ; মুক্তিযুদ্ধের রণকৌশল;</li>
                              <li>ঘ) মুক্তিযুদ্ধে বৃহৎ শক্তিবর্গের ভূমিকা; পাক বাহিনীর আত্মসমর্পণ এবং বাংলাদেশের অভ্যুদয়।</li>
                              <li>২.বাংলাদেশের কৃষিজ সম্পদ - শস্য উৎপাদন এবং এর বহুমুখীকরণ, খাদ্য উৎপাদন ও ব্যাবস্থাপনা ।</li>
                              <li>৩. বাংলাদেশের জনসংখ্যা- আদমশুমারি, জাতি, গোষ্ঠী ও উপজাতি সংক্রান্ত বিষয়াদি ।</li>
                              <li>৪. বাংলাদেশের অর্থ নীতি</li>
                              <li>ক) পরিকল্পনা প্রেক্ষিত ও পঞ্চবার্ষিকী, জাতীয় আয়-ব্যয়</li>
                              <li>খ) নীতি ও বার্ষিক উন্নয়ন কর্মসূচি, দারিদ্র্য বিমোচন ইত্যাদি</li>
                              <li>৫. বাংলাদেশের শিল্প ও বাণিজ্য</li>
                              <li>ক) শিল্প উৎপাদন, পণ্য আমদানি ও রপ্তািনিকরণ, গার্মেন্টস শিল্প ও এর সার্বিক ব্যবস্থাপনা,</li>
                              <li>খ) লেন-দেন, অর্থ প্রেরণ, ব্যাংক ও বীমা ব্যবস্থাপনা ইত্যাদি</li>
                              <li>৬. বাংলাদেশের সংবিধান</li>
                              <li>ক) প্রস্তাবনা ও বৈশিষ্ট্য, মৌলিক অধিকারসহ রাষ্ট্র পরিচালনার মূলনীতিসমূহ ।</li>
                              <li>খ) সংবিধানের সংশোধনীসমূহ।</li>
                              <li>৭. বাংলাদেশের রাজনৈতিক ব্যবস্থা</li>
                              <li>ক) দলসমূহের গঠন, ভূমিকা ও কার্যক্রম, ক্ষমতাসীন ও বিরোধী দলের পারস্পরিক সম্পর্কাদি,</li>
                              <li>খ) সুশীল সমাজ ও চাপ সৃষ্টিকারী গোষ্ঠী সমূহ এবং এদের ভূমিকা।</li>
                              <li>৮. বাংলাদেশের সরকার ব্যবস্থা</li>
                              <li>ক) শাসন ও বিচার বিভাগসমূহ, আইন প্রণয়ন,</li>
                              <li>খ) নীতি নির্ধারণ, জাতীয় ও স্থানীয় পর্যায়ের প্রশাসনিক ব্যবস্থাপনা কাঠামো</li>
                              <li>গ) প্রশাসনিক পুনর্বিন্যাস ও সংস্কার/<li>
                              <li>৯. বাংলাদেশের জাতীয় বিষয় সমূহ</li>
                              <li>ক) বাংলাদেশের জাতীয় অর্জন, বিশিষ্ট ব্যক্তিত্ব, গুরুত্বপূর্ণ প্র তিষ্ঠান ও স্থাপনাসমূহ,</li>
                              <li>খ) জাতীয় পুরস্কার, বাংলাদেশের খেলাধুলাসহ চলচ্চিত্র, গণমাধ্যম-সংশ্লিষ্ট বিষয়াদি।</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingFour">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubFour" aria-expanded="false" aria-controls="collapseSubFour">
                              বিসিএস - আন্তর্জাতিক বিষয়াবলি
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubFour" class="collapse" aria-labelledby="subHeadingFour" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                              <li>১. বৈশ্বিক ইতিহাস, আঞ্চলিক ও আন্তর্জাতিক ব্যবস্থা, ভূ-রাজনীতি এক নজরে বিশ্বি</li>
                              <li>২. আন্তর্জাতিক নিরাপত্তা ও আন্তরাষ্ট্রীয় ক্ষমতা সম্পর্ক</li>
                              <li>৩. বিশ্বের সাম্প্রতিক ও চলমান ঘটনাপ্রবাহ;<li>
                              <li>৪. আন্ত র্জাতিক পরিবেশগত ইস্যু ও কূটনীতি;</li>
                              <li>৫. আন্ত র্জাতিক সংগঠনসমূহ এবং বৈশ্বিক অর্থনৈতিক প্রতিষ্ঠানাদি।</li>
                              <li>৬. আন্তর্জাতিক সংগঠন সমূহ এবং বৈশ্বিক অর্থনৈতিক প্রতিষ্ঠানাদিপনা ।</li>
                              <li>৭. আঞ্চলিক রাজনৈতিক জোটা</li>
                              <li>৮. আন্তর্জাতিক সেবা সংস্থাতি</li>
                              <li>৯. আন্তর্জাতিক চুক্তি ও সনদ</li>
                              <li>১০. আন্তর্জাতিক নিরাপত্তা ও আন্তঃরাষ্ট্রীয় ক্ষমতা সম্পর্ক</li>
                              <li>১১. স্থাপত্য, সপ্তাশ্চার্য, লাইব্রেরী, জাদুঘর ও সাহিত্য</li>
                              <li>১২. আন্তর্জাতিক পরিবেশগত ইস্যু ও কূটনীতি</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingFive">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubFive" aria-expanded="false" aria-controls="collapseSubFive">
                              বিসিএস - ভূগোল (বাংলাদেশ ও বিশ্বঃ) পরিবেশ ও দুর্যোগ ব্যবস্থাপনা
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubFive" class="collapse" aria-labelledby="subHeadingFive" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>১. বাংলাদেশ ও অঞ্চলভিত্তিক ভৌগলিক অবস্থান ও সীমানা</li>
                                <li>২. অঞ্চলভিত্তিক ভৌত পরিবেশ, সম্পদের বন্টন ও গুরুত্ব</li>
                                <li>৩. বাংলাদেশের পরিবেশ, প্রকৃতি ও সম্পদ,প্রধান চ্যালেঞ্জ সমুহ</li>
                                <li>৪. বাংলাদেশ ও বৈশ্বিক পরিবেশ পরিবর্তন</li>
                                <li>৫. প্রাকৃতিক দুযোর্গ ও ব্যবস্থাপনা</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingSix">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubSix" aria-expanded="false" aria-controls="collapseSubSix">
                              বিসিএস - সাধারণ বিজ্ঞান
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubSix" class="collapse" aria-labelledby="subHeadingSix" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>ভৌত বিজ্ঞান</li>
                                <li>১) পদার্থের অবস্থা, এটমের গঠন, কার্বনের বহুমুখী ব্যবহার,</li>
                                <li>২) এসিড, ক্ষার, লবণ , পদার্থের ক্ষয়, সাবানের কাজ,</li>
                                <li>৩) ভৌত রাশি এবং এর পরিমাপ, ভৌত বিজ্ঞানের উন্নোয়ন,</li>
                                <li>৪) চৌম্বোকত্ব, তরঙ্গ এবং শব্দ</li>
                                <li>৫) তাপ ও তাপগতি বিদ্যা, আলোর প্র কৃ তি,</li>
                                <li>৬) স্থির এবং চল তড়িৎ, ইলেকট্রনিক্স, আধুনিক পদার্থ বিজ্ঞান</li>
                                <li>৭) শক্তির উৎস এবং এর প্রয়োগ, নবায়নযোগ্য শক্তির উৎস, পারমাণবিক শক্তি,</li>
                                <li>৮) খনিজ উৎস, শক্তির রূপান্তর, আলোক যন্ত্রপাতি,</li>
                                <li>৯) মৌলিক কণা, ধাতব পদার্থ এবং তাদের যৌগসমূহ, অধাতব পদার্থ , জারণ-বিজারণ , তড়িৎ কোষ, অজৈব যৌগ, জৈব যৌগ, তড়িৎ</li>
                                <li>১০.চৌম্বক, ট্রন্সফরমার, এক্সরে, তেজস্ক্রিয়তা ইত্যাদি।</li>
                                <li>জীববিজ্ঞান</li>
                                <li>১) পদার্থের জীববিজ্ঞান-বিষয়ক ধর্ম, টিস্যু, জেনেটিকস, জীববৈচিত্র্য, এনিম্যাল ডাইভরসিটি, প্লান্ট ডাইভারসিটি, এনিম্যাল টিস্যু,</li>
                                <li>২) অর্গান এবং অর্গানিক সিস্টেম, সালোক সংশ্লেষণ ,</li>
                                <li>৩) ভাইরাস, ব্যাকটেরিয়া, জুলোজিক্যাল নমেনক্লেচার, বোটানিক্যাল নমেনক্লেচার,</li>
                                <li>৪) প্রাণিজগৎ, উদ্ভিদ, ফুল, ফল, রক্ত ও রক্ত সঞ্চালন, রক্তচাপ, হৃদপিণ্ড এবং হৃদরোগ,স্নায়ু এবং স্নায়ু রোগ,</li>
                                <li>৫) খাদ্য ও পুষ্টি , ভিটামিন, মাইক্রোবায়োলজি, প্লান্ট নিউট্রেশন, পরাগায়ন ইত্যাদি।</li>
                                <li>আধুনিক বিজ্ঞান</li>
                                <li>১) পৃথিবী সৃষ্টির ইতিহাস, কসমিকরে, ব্লাক হোল, হিগের কণা, বারিমণ্ডল, টাইড, বায়ুমণ্ডল,</li>
                                <li>২) টেকটোনিক প্লেট, সাইক্লোন, সুনামি, বিবর্তন, সামুদ্রিক জীবন,</li>
                                <li>৩) মানবদেহ, রোগের কারণ ও প্রতিকার, সংক্রামক রোগ, রোগ জীবাণুর জীবনধারণ, মা ও শিশু স্বাস্থ্য,</li>
                                <li>৪) ইম্যুনাইজেশন এবং ভ্যাকসিনেশন, এইচআইভি, এইডস, টিবি, পোলিও,</li>
                                <li>৫) জোয়ার-ভাটা, এপিকালচার, সেরিকালচার, পিসিকালচার, হর্টি কালচার , ডায়োড, ট্রানজিস্টর, আইসি, আপেক্ষিক তত্ত্ব, ফোটন কণা ইত্যাদি।</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingSeven">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubSeven" aria-expanded="false" aria-controls="collapseSubSeven">
                              বিসিএস - কম্পিউটার ও তথ্য প্রযুক্তি
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubSeven" class="collapse" aria-labelledby="subHeadingSeven" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>পার্ট -১</li>
                                <li>১. কম্পিউটারের ইতিহাস, প্রকারভেদ, পারঙ্গমতা ও অঙ্গসংগঠন</li>
                                <li>২. কম্পিউটার পেরিফেরালস ও অপারেটিং সিস্টেম</li>
                                <li>৩. কম্পিউটার প্রোগ্রাম ও নম্বর ব্যবস্থা</li>
                                <li>৪. ডেটাবেজ ম্যানেজমেন্ট সিস্টেম, দৈনন্দিন জীবনে কম্পিউটার</li>
                                <li>পার্ট - ২</li>
                                <li>৫. ই-কমার্স, সেলুলার ডাটা নেটওয়ার্ক, কম্পিউটার নেটওয়ার্ক</li>
                                <li>৬. দৈনন্দিন জীবনে তথ্য প্রযুক্তি, স্মার্ট ফোন, ওয়ার্ল্ড ওয়াইড ওয়েব, ইন্টারনেট</li>
                                <li>৭. নিত্য প্রয়োজনীয় কম্পিউটিং প্রযুক্তি, ক্লায়েন্ট সার্ভার ম্যানেজমেন্ট, মোবাইল প্রযুক্তির বৈশিষ্ট্য সমূহ</li>
                                <li>৮. তথ্য প্রযুক্তি বড় প্রতিষ্ঠান ও তাদের সেবা, ক্লাউড কম্পিউটিং, সোশ্যাল নেটওয়ার্কিং, রোবোটিক্স, সাইবার অপরাধ</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingEight">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubEight" aria-expanded="false" aria-controls="collapseSubEight">
                              বিসিএস - গাণিতিক যুক্তি
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubEight" class="collapse" aria-labelledby="subHeadingEight" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>পাটিগণিত</li>
                                <li>১. বাস্তব সংখ্যা</li>
                                <li>২. ল.সা.গু. ও গ.সা.গু</li>
                                <li>৩. শতকরা</li>
                                <li>৪. লাভ-ক্ষতি</li>
                                <li>৫. সরল ও যৌগিক মুনাফা</li>
                                <li>৬. অনুপাত-সমানুপাত</li>
                                <li>বীজগণিত</li>
                                <li>১. বীজগাণিতিক সূত্রাবলি</li>
                                <li>২. বহুপদী উৎপাদক</li>
                                <li>৩. সরল ও দ্বিঘাত সমীকরণ</li>
                                <li>৪. সরল ও দ্বিঘাত অসমতা</li>
                                <li>৫. সরল সহ-সমীকরণ</li>
                                <li>৬. সূচক ও লগারিদম</li>
                                <li>৭. সমান্তর ও গুণোত্তর অনুক্রম ও ধারা</li>
                                <li>জ্যামিতি</li>
                                <li>১. রেখা</li>
                                <li>২. কোণ</li>
                                <li>৩. ত্রিভুজ ও চতুর্ভুজ সংক্রান্ত উপপাদ্য</li>
                                <li>৪. পিথাগোরাসের উপপাদ্য</li>
                                <li>৫. বৃত্ত সংক্রান্ত উপপাদ্য</li>
                                <li>৬. পরিমিতি- সরল ক্ষেত্র ও ঘনবস্তু</li>
                                <li>বিচ্ছিন্ন গণিত</li>
                                <li>১. সেট</li>
                                <li>২. বিন্যাস ও সমাবেশ</li>
                                <li>৩. পরিসংখ্যান ও সম্ভাব্যতা</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingNine">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubNine" aria-expanded="false" aria-controls="collapseSubNine">
                              বিসিএস - মানসিক দক্ষতা
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubNine" class="collapse" aria-labelledby="subHeadingNine" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>অধ্যায় - ১ ভাষাগত যৌক্তিক বিচার</li>
                                <li>অধ্যায় - ২ সমস্যা সমাধান</li>
                                <li>অধ্যায় - ৩ বানান ও ভাষা</li>
                                <li>অধ্যায় - ৪ যান্ত্রিক দক্ষতা</li>
                                <li>অধ্যায় - ৫ স্থানাঙ্ক সম্পর্ক</li>
                                <li>অধ্যায় - ৬ সংখ্যাগত ক্ষমতা</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingTen">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubTen" aria-expanded="false" aria-controls="collapseSubTen">
                              বিসিএস - নৈতিকতা, মূল্যবোধ ও সুশাসন
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubTen" class="collapse" aria-labelledby="subHeadingTen" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>১. মূল্যবোধ, শিক্ষা এবং সুশাসনের সংজ্ঞা</li>
                                <li>২. মূল্যবোধ শিক্ষার সাথে সুশাসনের সম্পর্ক</li>
                                <li>৩. মূল্যবোধ শিক্ষা এবং সুশাসনের সাধরণ ধারণা</li>
                                <li>৪. মূল্যবোধ শিক্ষা এবং সুশাসনের গুরুত্ব</li>
                                <li>৫. মূল্যবোধ শিক্ষা এবং সুশাসনের প্রভাব</li>
                                <li>৬. সুশাসন ও মূল্যবোধ শিক্ষার উপাদান</li>
                                <li>৭. মূল্যবোধ শিক্ষা এবং সুশাসনের উপযোগিতা এবং অভাবজনিত প্রভাব</li>
                                <li>৮. সামাজিক ন্যায়বিচার</li>
                                <li>৯. বাংলাদেশের সংবিধান</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--<div class="cd-warp">-->
                <!--  <h3>এছাড়াও পাচ্ছেনঃ </h3>-->
                <!--  <div class="cdw-grid">-->
                <!--    <ul class="key-feature">-->
                <!--      {{-- <li><i class="fas fa-clipboard-check"></i> বিসিএস পরীক্ষার জন্য প্রস্তুতি নেয়ার একটি সঠিক গাইডলাইন</li> --}}-->
                <!--      <li><i class="fas fa-clipboard-check"></i>বিসিএস প্রিলিমিনারি পরীক্ষার সিলেবাস ও প্রতিটি বিষয়ের বিস্তারিত ব্যাখ্যা</li>-->
                      
                <!--                          <li><i class="fas fa-clipboard-check"></i> বিসিএস প্রশ্ন ও সমাধান : ১০ম - ৪৪ তম</li>-->

                      
                <!--      <li><i class="fas fa-clipboard-check"></i> এটিই পূর্ণাঙ্গ পরীক্ষা নই , এখানে প্রতিনিয়ত নতুন নতুন প্রশ্ন সংযোজন করা হচ্ছে |</li>-->
                <!--      <li><i class="fas fa-clipboard-check"></i> ক্রয় কৃত প্রস্তুতি পরীক্ষায় অংশ গ্রহণের সময় কেউ বই দেখে পরীক্ষা দিবেন না , নিজে নিজে  চেষ্টা করুন এবং নিজেকে যাচাই করুন | </li>-->
                <!--    </ul>-->
                <!--  </div>-->
                <!--</div>-->
                <div class="cd-warp">
                  <h3>পেমেন্ট পদ্ধতিঃ </h3>
                  <div class="cdw-grid">
                      
                      <p>আপনার রেজিস্ট্রেশন সম্পন্ন হলে চাহিদা অনু্যায়ী প্রস্তুতি পরীক্ষা সিলেক্ট করে ক্রয় করুন বাটনে ক্লিক করলে একটি পেমেন্ট উইন্ডো আসবে সেখানে ভেরিফায়েড পেমেন্ট গেটওয়ে সূর্যপে এর মাধ্যমে আপনি বিকাশ , নগদ , রকেটসহ আরো মোবাইল ব্যাংকিং অপশন এবং ক্রেডিট কার্ড ও ডেবিট কার্ড যেকোনো অপশনের মাধ্যমে পেমেন্ট করতে পারবেন।</p>
                 <!--   <ul class="key-feature">-->
                 <!--     <li><i class="fas fa-clipboard-check"></i> পরীক্ষাটি ক্রয় করতে হলে আপনাকে এক্সামলীতে রেজিস্ট্রেশন করতে হবে |</li>-->
                 <!--     <li><i class="fas fa-clipboard-check"></i> আপনার রেজিস্ট্রেশন সম্পন্ন হলে ড্যাশবোর্ড থেকে আপনি বিকাশ , নগদ , রকেট , কার্ড যেকোনো অপশনের মাধ্যমে পেমেন্ট করতে এবং পরীক্ষাটি ক্রয় করতে পারবেন |</li>-->
                 <!--<li><i class="fas fa-clipboard-check"></i> বিসিএস পরীক্ষার পুরো সিলেবাসের রিভিশন এবং সঠিক মূল্যায়নের সুযোগ</li>-->
                 <!--     <li><i class="fas fa-clipboard-check"></i> যেকোন ধরনের সমস্যা সমাধান, তথ্যের জন্য আলাদা ফেসবুক গ্রুপ</li>-->
                 <!--   </ul>-->
                  </div>
                </div>             
              </div>
            </div>
            <div class="col-12 col-lg-5 order-0 mb-5 mb-lg-0 order-lg-1" id='ch'>
              <div class="cd-right">
                <div class="cdr-card">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{asset('public/uploads/course/theExamly_Video.mp4')}}" allowfullscreen></iframe>
                    <!--<img class="embed-responsive-item" src="{{asset('public/uploads/course/bcs.png')}}">-->
                  </div>
                  <div class="exam-price">
                    পরীক্ষাগুলির মূল্যঃ 
                    <span class="original">৳ ৩,০০০</span>
                    <span class="discount">৳ ৯৯০</span>
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
                            <h5 class="header mb-0">১০</h5>
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
                    <img class="img-fluid rounded-top" src="{{asset('public/uploads/course/p2.png')}}">
                  </div>
                  <div class="exams-title">
                    প্রাথমিক শিক্ষক নিয়োগ
                  </div>
                  <div class="exam-price ex-related">
                    মূল্যঃ 
                    <span class="original">৳ ১,০০০</span>
                    <span class="discount">৳ ৪৯০</span>
                  </div>
                  <div class="cart-btn">
                      <a href="{{route('frontend.courses',['প্রাথমিক শিক্ষক নিয়োগ'])}}">বিস্তারিত </a>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="cd-right mb-4">
                <div class="cdr-card">
                  <div class="card-img">
                    <img class="img-fluid rounded-top" src="{{asset('public/uploads/course/ssn2.png')}}">
                  </div>
                  <div class="exams-title">
                    স্কুল পর্যায় শিক্ষক নিবন্ধন
                  </div>
                  <div class="exam-price ex-related">
                    মূল্যঃ 
                    <span class="original">৳ ১,০০০</span>
                    <span class="discount">৳ ৩৯০</span>
                  </div>
                  <div class="cart-btn">
                      <a href="{{route('frontend.courses',['স্কুল পর্যায় শিক্ষক নিবন্ধন'])}}">বিস্তারিত </a>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="cd-right mb-4">
                <div class="cdr-card">
                  <div class="card-img">
                    <img class="img-fluid rounded-top" src="{{asset('public/uploads/course/bpn2.png')}}">
                  </div>
                  <div class="exams-title">
                    বেসরকারি প্রভাষক নিবন্ধন
                  </div>
                  <div class="exam-price ex-related">
                    মূল্যঃ 
                    <span class="original">৳ ১,০০০</span>
                    <span class="discount">৳ ৩৯০</span>
                  </div>
                  <div class="cart-btn">
                      <a href="{{route('frontend.courses',['বেসরকারি প্রভাষক নিবন্ধন'])}}">বিস্তারিত </a>
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
