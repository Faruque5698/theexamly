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
                  <h1>প্রাথমিক শিক্ষক নিয়োগ প্রস্তুতি পরীক্ষা</h1>
                  <p>বাংলাদেশের চাকরি নিয়োগ এর ক্ষেত্রে অন্যতম বড় নিয়োগ পরীক্ষা হচ্ছে প্রাথমিক সহকারী শিক্ষক নিয়োগ পরীক্ষা। ইতিহাস ঘেটে দেখা গেছে, গড়ে প্রতি ৪০ জনে ১ জন প্রাথমিক সহকারী শিক্ষক হিসেবে নিয়োগ পান। এত জনের মধ্যে আমার কি হবে চাকরি?? খূবই স্বাভাবিক এটা মনে হওয়া "
এই ধারণা থেকে  কিভাবে বেরিয়ে এসে আপনি শতভাগ প্রস্তুতি নিয়ে আপনার স্বপ্নকে বাস্তবে রূপ দিবেন, সেই সমাধানে  আপনার পাশে আছে এক্সামলি!</p>
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
                      <p>বাংলাদেশের ইতিহাসে অন্যতম সবচেয়ে বড় নিয়োগ পরীক্ষা হচ্ছে প্রাথমিক সহকারী শিক্ষক নিয়োগ পরীক্ষা। বিগত বছরগুলোর ক্ষেত্রে দেখা গেছে, গড়ে প্রতি ৪০ জনে ১ জন প্রাথমিক সহকারী শিক্ষক হিসেবে নিয়োগ পান। আপনার মনে হতে পারে, "এতজনের মধ্যে কি আমার চাকরিটা পাওয়া সম্ভব?" কিংবা "এতো অল্প সময়ে প্রাথমিকের সহকারী শিক্ষক নিয়োগ পরীক্ষার জন্য প্রস্তুতি কীভাবে নিবো?</p>
                      <p>চাকরি পরিক্ষা শুনলেই আমাদের মাথায় প্রথমেই আসে `কোচিং সেন্টার` । কিন্তু কোচিং সেন্টার গুলোতে খুব বেশি যেই সমস্যা দেখা যায় সেটা হচ্ছে সঠিক গাইডলাইন এবং আরও বেশি হচ্ছে অল্প সময়ের মধ্যে সেই সঠিক মনিটরিং নিজের কাজে লাগানো। তাই প্রাথমিক শিক্ষক নিয়োগ পরীক্ষার সর্বোচ্চ প্রস্তুতি নিতে সাহায্য করার জন্য এক্সামলী  আপনার জন্য নিয়ে এসেছে অভিজ্ঞ মেন্টরদের দ্বারা প্রস্তুতকৃত  প্রাথমিক শিক্ষক নিয়োগ  পরীক্ষার  সঠিক দিক নির্দেশনা
আমাদের রয়েছে  ১৪৩৫৫০+ প্রশ্ন ব্যাংক,  ১০০০০+ পরীক্ষার সংখ্যা, ৬ টি পরীক্ষার বিষয়সমূহ, যা আপনার স্বপ্নকে বাস্তব পরিণতি দিতে আপনাকে সাহায্য করবে। <strong>প্রাথমিক শিক্ষক নিয়োগ</strong> পরীক্ষা প্রস্তুতি!</p>
                      

                      <h3>প্রস্তুতি পরীক্ষাটি কাদের জন্য?</h3>
                      
                      <ul>
                        <li><i class="fas fa-clipboard-check"></i> যারা প্রস্তুতি নিচ্ছেন বা নিবেন বলে ভাবছেন।</li>
                        <li><i class="fas fa-clipboard-check"></i> যারা নিজেদেরকে নিজেরাই যাচাই করতে চান।</li>
                        <li><i class="fas fa-clipboard-check"></i> যারা প্রতিযোগীতামূলক প্রস্তুতি নিতে চান।</li>            
                      </ul>
                    <!--  <ul>-->
                    <!--         <li><i class="fas fa-clipboard-check"></i>যারা ভাবছেন প্রস্তুতি নেয়া শুরু করবেন বা যারা ইতিমধ্যে শুরু করে দিয়েছেন।</li>-->
                    <!--<li><i class="fas fa-clipboard-check"></i>যারা মনে করছেন তারা সঠিক দিক নির্দেশনা পাচ্ছেন না</li>-->
                    <!--<li><i class="fas fa-clipboard-check"></i>যাদের মোটামুটি প্রিপারেশন নেয়া আছে কিন্তু আরও ডিতেইলস পড়াশুনা করতে চাচ্ছেন।</li>-->
                    <!--<li><i class="fas fa-clipboard-check"></i>যারা নিজেদেরকে বার বার পরীক্ষা দিয়ে যাচাই করতে চান এবং মূল পরীক্ষার জন্য নিজেকে খুব ভালোভাবে তৈরি করে নিতে চান </li>-->
           
              
                    <!--  </ul>-->

                    <!--  <h3>এই প্রস্তুতি পরীক্ষাটির বৈশিষ্ট্যগুলো কী কী?</h3>-->
                    <!--  <ul>-->
                    <!--    <li><i class="fas fa-clipboard-check"></i> প্রাথমিক শিক্ষক নিয়োগ পরীক্ষা প্রস্তুতির সবকিছু এমনভাবে ডিজাইন করা হয়েছে যাতে আপনি ঘরে বসেই অল্প সময়ে সর্বোচ্চ প্রস্তুতি নিশ্চিত করতে পারেন ।</li>-->
                    <!--<li><i class="fas fa-clipboard-check"></i> এখন কথা হচ্ছে খরচ কেমন?  যে কেউ কি এটা কিনতে পারবে?-->
                    <!--    ১৪৩৫৫০+ প্রশ্ন ব্যাংক, ১০০০০+ পরীক্ষার সংখ্যা, ৬ টি পরীক্ষার বিষয়সমূহ, আপনার প্রাথমিক শিক্ষক নিয়োগ পরীক্ষা প্রস্তুতির জন্য একটি সম্পূর্ণ প্যাকেজ পাচ্ছেন খুবই কম খরচে ।</li> -->
                    <!--  </ul>-->
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
                              বাংলা 
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>

                        <div id="collapseSubOne" class="collapse" aria-labelledby="subHeadingOne" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                              <li>ক. বাংলা ব্যাকরণ</li>
                              <li>১. ভাষা, বর্ণ ও ধ্বনি</li>
                              <li>২. বাংলা ভাষার শব্দাবলি</li>
                              <li>৩. সন্ধি</li>
                              <li>৪. লিঙ্গ ও বচন</li>
                              <li>৫. পদ প্রকরণ</li>
                              <li>৬. কারক ও বিভক্তি</li>
                              <li>৭. সমাস</li>
                              <li>৮. প্রত্যয়</li>
                              <li>৯. শুদ্ধ বানান</li>
                              <li>১০. সমার্থক বা প্রতিশব্দ</li>
                              <li>১১. বিপরীতার্থক শব্দ</li>
                              <li>১২. বাক্য প্রকরণ</li>
                              <li>১৩. কাল ও কালের বিশিষ্ট প্রয়োগ</li>
                              <li>১৪. উপসর্গ</li>
                              <li>১৫. দিরুক্ত শব্দ বা শব্দ দ্বৈত</li>
                              <li>১৬. যতি চিহ্ন বা বিরাম চিহ্ন</li>
                              <li>১৭. এককথায় প্রকাশ</li>
                              <li>১৮. বাগধারা ও প্রবাদ-প্রবচন</li>
                              <li>১৯. বিবিধ</li>
                              <li>খ. বাংলা সাহিত্য</li>
                              <li>১. প্রাচীন যুগ (৬৫০-১২০০)</li>
                              <li>২. মধ্যযুগ (১২০১-১৮০০)</li>
                              <li>৩. আধুনিক যুগের বিকাশ</li>
                              <li>৪. সাহিত্যকর্ম ও রচয়িতা</li>
                              <li>৫. সাহিত্যকর্মের শ্রেণী, উপজীব্য ও চরিত্রPage</li>
                              <li>৬. পঙ্কতি ও উদ্ধৃতি</li>
                              <li>৭. ছদ্মনাম, উপাধি ও প্রবর্তক</li>
                              <li>৮. পত্রিকা ও সাময়িকী</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingTwo">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubTwo" aria-expanded="false" aria-controls="collapseSubTwo">
                              English 
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubTwo" class="collapse" aria-labelledby="subHeadingTwo" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                              <li>English Grammar</li>
                              <li>1. Parts of Speech</li>
                              <li>2. Number</li>
                              <li>3. Sentence</li>
                              <li>4. Tense</li>
                              <li>5. Appropriate Preposition</li>
                              <li>6. Article</li>
                              <li>7. Voice</li>
                              <li>8. Narration</li>
                              <li>9. Degree</li>
                              <li>10. Fill in the Blank</li>
                              <li>11. Correct Spelling</li>
                              <li>12. Correction</li>
                              <li>13. Synonyms & Antonyms</li>
                              <li>14. Phrases & Idioms and Word Meaning</li>
                              <li>15. Translation</li>
                              <li>16. MISCELLANEOUS</li>
                              <li>17. English Literature</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingThree">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubThree" aria-expanded="false" aria-controls="collapseSubThree">
                              গণিত 
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubThree" class="collapse" aria-labelledby="subHeadingThree" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>পাটিগণিত</li>
                                <li>১। সংখ্যার ধারণা</li>
                                <li>২। ল. সা. গু ও গ. সা. গু</li>
                                <li>৩। ভগ্নাংশ</li>
                                <li>৪। সরলীকরণ</li>
                                <li>৫। অনুপাত - সমানুপাত ও মিশ্রণ</li>
                                <li>৬। গড়<li>
                                <li>৭। ঐকিক নিয়ম</li>
                                <li>৮। সময়, দুরত্ব ও গতিবেগ</li>
                                <li>৯। শতকরা</li>
                                <li>১০। লাভ -ক্ষতি</li>
                                <li>১১। সুদকষা</li>
                                <li>১২। ক্ষেত্রফল ও পরিসীমা</li>
                                <li>১৩। ধারা</li>
                                <li>খ. বীজগণিত</li>
                                <li>১। বীজগণিতীয় রাশিমালার যোগ, বিয়োগ, গুণ ও ভাগ</li>
                                <li>২। বীজগণিতীয় সূত্রাবলী ও প্রয়োগ</li>
                                <li>৩। উৎপাদকে বিশ্লেষণ</li>
                                <li>৪। সূচক ও লগারিদম</li>
                                <li>৫। সরল সমীকরণ ও প্রয়োগ</li>
                                <li>৬। সরল সহ-সমীকরণ ও প্রয়োগ</li>
                                <li>৭। সেট</li>
                                <li>গ. জ্যামিতি</li>
                                <li>১। ত্রিভুজ</li>
                                <li>২। চতুর্ভুজ</li>
                                <li>৩। বৃত্ত</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingFour">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubFour" aria-expanded="false" aria-controls="collapseSubFour">
                              সাধারণ জ্ঞান (বিজ্ঞান ও প্রযুক্তি)
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubFour" class="collapse" aria-labelledby="subHeadingFour" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>পদার্থ বিজ্ঞান</li>
                                <li>* বলবিদ্যা</li>
                                <li>*মহাকর্ষ ও অভিকর্ষ</li>
                                <li>* শব্দ</li>
                                <li>* যন্ত্রবিদ্যা</li>
                                <li>* তাপ</li>
                                <li>* কাজ, ক্ষমতা, শক্তি</li>
                                <li>বিদ্যুৎ</li>
                                <li>আলো</li>
                                <li>* চুম্বক</li>
                                <li>* ইলেকট্রনিক্স</li>
                                <li>রসায়ন</li>
                                <li>উদ্ভিদ বিজ্ঞান</li>
                                <li>প্রাণী বিজ্ঞান</li>
                                <li>মানবদেহ</li>
                                <li>রোগ ও চিকিৎসা</li>
                                <li>খাদ্য ও পুষ্টি</li>
                                <li>ভূগোল</li>
                                <li>মহাকাশ বিজ্ঞান</li>
                                <li>পরিবেশ বিজ্ঞান</li>
                                <li>আবিষ্কার -আবিষ্কারক ও বৈজ্ঞানিক যন্ত্রের ব্যবহার</li>
                                <li>কম্পিউটার, তথ্য ও যোগাযোগ প্রযুক্তি</li>
                                <li>ক. কম্পিউটারের মৌলিক ধারণা</li>
                                <li>খ. কম্পিউটার সিস্টেম ও মেমোরি</li>
                                <li>গ. তথ্য ও যোগাযোগ প্রযুক্তি</li>
                                <li>বিবিধ</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingFive">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubFive" aria-expanded="false" aria-controls="collapseSubFive">
                              সাধারণ জ্ঞান (আন্তর্জাতিক)
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubFive" class="collapse" aria-labelledby="subHeadingFive" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>১। দেশ - মহাদেশ</li>
                                <li>২। রাজধানী , মুদ্রা ও পার্লামেন্ট</li>
                                <li>৩। নদী, প্রণালী, দ্বীপ ও মহাসাগর</li>
                                <li>৪। বিখ্যাত ব্যক্তিত্ব</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="subHeadingSix">
                          <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSubSix" aria-expanded="false" aria-controls="collapseSubSix">
                              সাধারণ জ্ঞান ( বাংলাদেশ)
                              <i class="fas fa-angle-right"></i>
                            </button>
                          </h2>
                        </div>
                        <div id="collapseSubSix" class="collapse" aria-labelledby="subHeadingSix" data-parent="#accordionExamSubject">
                          <div class="card-body">
                            <ul>
                                <li>১। ভৌগোলিক অবস্থান ও ভূপ্রকৃতি</li>
                                <li>২। জনসংখ্যা ও উপজাতি</li>
                                <li>৩। সাগর-নদী, দ্বীপ ও পাহাড়</li>
                                <li>৪। বাংলাদেশের ইতিহাস</li>
                                <li>৫। সংবিধান ও প্রশাসনিক কাঠামো</li>
                                <li>৬। কৃষিজ, খনিজ ও বনোজসম্পদ</li>
                                <li>৭। শিল্প - বাণিজ্য - অর্থনীতি</li>
                                <li>৮। সংস্কৃতি ও ঐতিহ্য</li>
                                <li>৯। সংস্থা - সংগঠন - একাডেমি</li>
                                <li>১০। স্থাপত্য ও পুরাকীর্তি</li>
                                <li>১১। পরিবহন ও যোগাযোগ</li>
                                <li>১২। বাংলাদেশ ও বহির্বিশ্ব</li>
                                <li>১৩. পুরস্কার - সম্মাননা</li>
                                <li>১৪। খেলাধুলা</li>
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
                <!--      <li><i class="fas fa-clipboard-check"></i>প্রাথমিক শিক্ষক নিয়োগ প্রিলিমিনারি পরীক্ষার সিলেবাস ও প্রতিটি বিষয়ের বিস্তারিত ব্যাখ্যা</li>-->
                <!--      <li><i class="fas fa-clipboard-check"></i>পূর্বের প্রাথমিক শিক্ষক নিয়োগ পরীক্ষার প্রশ্ন ও সমাধান </li>-->
                <!--      <li><i class="fas fa-clipboard-check"></i> এটিই পূর্ণাঙ্গ কোর্স নই , এখানে প্রতিনিয়ত নতুন নতুন প্রশ্ন সংযোজন করা হচ্ছে </li>-->
                <!--      <li><i class="fas fa-clipboard-check"></i> ক্রয় কৃত প্রস্তুতি পরীক্ষায় অংশ গ্রহণের সময় কেউ বই দেখে পরীক্ষা দিবেন না , নিজে নিজে  চেষ্টা করুন এবং নিজেকে যাচাই করুন | </li>-->
                <!--    </ul>-->
                <!--  </div>-->
                <!--</div>-->
                <div class="cd-warp">
                  <h3>পেমেন্ট পদ্ধতিঃ </h3>
                    <p>আপনার রেজিস্ট্রেশন সম্পন্ন হলে চাহিদা অনু্যায়ী প্রস্তুতি পরীক্ষা সিলেক্ট করে ক্রয় করুন বাটনে ক্লিক করলে একটি পেমেন্ট উইন্ডো আসবে সেখানে ভেরিফায়েড পেমেন্ট গেটওয়ে সূর্যপে এর মাধ্যমে আপনি বিকাশ , নগদ , রকেটসহ আরো মোবাইল ব্যাংকিং অপশন এবং ক্রেডিট কার্ড ও ডেবিট কার্ড যেকোনো অপশনের মাধ্যমে পেমেন্ট করতে পারবেন।</p>

                  <!--<div class="cdw-grid">-->
                  <!--  <ul class="key-feature">-->
                  <!--    <li><i class="fas fa-clipboard-check"></i> পরীক্ষাটি ক্রয় করতে হলে আপনাকে এক্সামলীতে রেজিস্ট্রেশন করতে হবে | </li>-->
                  <!--    <li><i class="fas fa-clipboard-check"></i> আপনার রেজিস্ট্রেশন সম্পন্ন হলে ড্যাশবোর্ড থেকে আপনি বিকাশ , নগদ , রকেট , কার্ড যেকোনো অপশনের মাধ্যমে পেমেন্ট করতে এবং পরীক্ষাটি ক্রয় করতে পারবেন |</li>-->
                  <!--    {{-- <li><i class="fas fa-clipboard-check"></i> বিসিএস পরীক্ষার পুরো সিলেবাসের রিভিশন এবং সঠিক মূল্যায়নের সুযোগ</li>-->
                  <!--    <li><i class="fas fa-clipboard-check"></i> যেকোন ধরনের সমস্যা সমাধান, তথ্যের জন্য আলাদা ফেসবুক গ্রুপ</li> --}}-->
                  <!--  </ul>-->
                  <!--</div>-->
                </div>             
              </div>
            </div>
            <div class="col-12 col-lg-5 order-0 mb-5 mb-lg-0 order-lg-1" id='ch'>
              <div class="cd-right">
                <div class="cdr-card">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{asset('public/uploads/course/primary preparation_1.mp4')}}" allowfullscreen></iframe>
                    <!--<img class="embed-responsive-item" src="{{asset('public/uploads/course/p1.png')}}">-->
                  </div>
                  <div class="exam-price">
                    পরীক্ষাগুলির মূল্যঃ 
                    <span class="original">৳ ১,০০০</span>
                    <span class="discount">৳ ৪৯০ </span>
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
                            <h5 class="header mb-0">৬</h5>
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
                    <img class="img-fluid rounded-top" src="{{asset('public/uploads/course/b2.png')}}">
                  </div>
                  <div class="exams-title">
                    বিসিএস
                  </div>
                  <div class="exam-price ex-related">
                    মূল্যঃ 
                    <span class="original">৳ ৩,০০০</span>
                    <span class="discount">৳ ৯৯০</span>
                  </div>
                  <div class="cart-btn">
                      <a href="{{route('frontend.courses',['বিসিএস'])}}">বিস্তারিত </a>
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
                    <span class="discount">৳ ৪৯০</span>
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
