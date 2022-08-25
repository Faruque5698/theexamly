@extends('frontend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/choices/public/assets/styles/choices.min.css') !!}
    {!! Html::style('public/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('public/css/loader.css') !!}
@endpush

@section('content')

    <main>
      <!-- page title -->
      <!--<section class="page_title">-->
      <!--  <div class="container">-->
      <!--    <div class="row">-->
      <!--      <div class="col-12">-->
      <!--        <div-->
      <!--          class="page_title_container d-flex flex-column align-items-center justify-content-center"-->
      <!--        >-->
      <!--          <div class="page_title_heading">-->
      <!--            <h2 class="header mb-0">রেজিস্ট্রেশন</h2>-->
      <!--          </div>-->
      <!--          <nav aria-label="breadcrumb">-->
      <!--            <ol class="breadcrumb mb-0">-->
      <!--              <li class="breadcrumb-item breadcrumb_item">-->
      <!--                <a href="{{ route('frontend.index') }}">হোম</a>-->
      <!--              </li>-->
      <!--              <li class="breadcrumb-item breadcrumb_item active">-->
      <!--                <a href="{{ route('frontend.showAdmissionForm') }}">রেজিস্ট্রেশন</a>-->
      <!--              </li>-->
      <!--            </ol>-->
      <!--          </nav>-->
      <!--        </div>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</section>-->
      <!-- end page title -->
      <!-- register form -->
      <section class="register my-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
              <div class="register_box p-2 p-lg-5">
                <!-- Title Box -->
                <div class="heading text-center mb-5">
                  <h2 class="header">রেজিস্ট্রেশন</h2>
                  <div class="paragraph">
                    এখানে সকল তথ্য ইংলিশ এ দিয়ে রেজিস্ট্রেশন সম্পূর্ণ করুন ।
                  </div>
                </div>

                <!-- Login Form -->
                <div class="register_form">
                  <form class="cmxform" id="frontedAdmitForm" method="post" action="{{ route('frontend.registration') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <!-- Form Group -->
                      <div class="form-group col-12">
                        <label
                          >নামের প্রথম অংশ (নামের শেষ অংশ বাদে সকল অংশ )</label
                        > <span class="requiredStar" style="color: red"> * </span>
                        <input name="first_name" id="first_name"
                          class="form-control form_control"
                          type="text"
                          placeholder="e.g. Md. Abdullah"
                        />
                      </div>
                      <div class="form-group col-12">
                        <label>নামের শেষ অংশ </label> <span class="requiredStar" style="color: red"> * </span>
                        <input name="last_name" id="last_name"
                          class="form-control form_control"
                          type="text"
                          placeholder="e.g. Mamun"
                        />
                      </div>

                      <!-- Form Group -->
                      <div class="form-group col-12">
                        <label>ইমেইল</label> <span class="requiredStar" style="color: red"> * </span><span>( জিমেইল আবশ্যক  )</span>
                        <input name="email" id="email"
                          class="form-control form_control"
                          type="email"
                          placeholder="e.g. name@gmail.com"
                        />
                      </div>

                      <!-- Form Group -->
                      <div class="form-group col-12">
                        <label>মোবাইল নাম্বার </label> <span class="requiredStar" style="color: red"> * </span>
                        <input
                          class="form-control form_control"
                          type="text"
                          name="phone"
                          id="phone"
                          placeholder="e.g. 01900011100"
                        />
                      </div>
                      <div class="form-group col-12">
                        <label >পাসওয়ার্ড</label> <span class="requiredStar" style="color: red"> * </span>
                        <div class="input-group">
                          <input  class="form-control form_control" name="password" id="password" type="password"
                          placeholder="* * * * * * * *"aria-label="Recipient's username" aria-describedby="basic-addon2" autocomplete="new-password">
                          <div class="input-group-append ">
                            <span class="input-group-text border-0" onclick="password_show_hide();">
                              <i class="fas fa-eye-slash" id="show_eye"></i>
                              <i class="fas fa-eye d-none" id="hide_eye"></i>
                            </span>
                          </div>
                          <small class="form-text text_muted text-justify">পাসওয়ার্ডটিতে অবশ্যই বড় হাতের অক্ষর, ছোট হাতের অক্ষর, সংখ্যা এবং একটি স্পেশাল ক্যারেক্টার
                          (!,@,#,$,%,^,&,*) সহ কমপক্ষে ৮ টি অক্ষর থাকতে হবে।</small>
                        </div>
                      </div>

                      <div class="form-group col-12">
                        <label>কনফার্ম পাসওয়ার্ড</label> <span class="requiredStar" style="color: red"> * </span>

                        <div class="input-group">
                          <input  class="form-control form_control" name="confirm_password" id="confirm_password" type="password"
                          placeholder="* * * * * * * *"aria-label="Recipient's username" aria-describedby="basic-addon2">
                          <div class="input-group-append ">
                            <span class="input-group-text border-0" onclick="password_show_hide2();">
                              <i class="fas fa-eye-slash" id="show_eye2"></i>
                              <i class="fas fa-eye d-none" id="hide_eye2"></i>
                            </span>
                          </div>
                          {{-- <small class="form-text text_muted text-justify">পাসওয়ার্ডটিতে অবশ্যই বড় হাতের অক্ষর, ছোট হাতের অক্ষর, সংখ্যা এবং একটি স্পেশাল ক্যারেক্টার
                          (!,@,#,$,%,^,&,*) সহ কমপক্ষে ৮ টি অক্ষর থাকতে হবে।</small> --}}
                        </div>
                      </div>

                      <div class="form-group col-12">
                        <label>এক্সামলী সম্পর্কে সর্ব প্রথম কিভাবে জেনেছিলেন ?</label> <span class="requiredStar" style="color: red"> * </span>
                        <div
                          class="accordion exam_dropdown"
                          id="accordionExample"
                        >
                          <div class="card">
                            <div
                              class="card-header card_header"
                              id="headingOne"
                            >
                              <h2 class="mb-0">
                                <button
                                  class="btn btn-link btn-block text-left"
                                  type="button"
                                  data-toggle="collapse"
                                  data-target="#collapseOne"
                                  aria-expanded="true"
                                  aria-controls="collapseOne"
                                >
                                  <div class="form-group form_group form-check">
                                   {{--  <input
                                      type="checkbox" id="checkall" name="subject"
                                      class="form-check-input form_check_input"
                                    /> --}}
                                    <label
                                      class="form-check-label form_check_label align-bottom"
                                      >যেকোনো একটি টিক চিহ্ন দিন </label
                                    >
                                  </div>
                                </button>
                              </h2>
                            </div>

                            <div
                              id="collapseOne"
                              class="collapse show"
                              aria-labelledby="headingOne"
                              data-parent="#accordionExample"
                            >
                              <div class="card-body card_body">
                                <ul class="list-group" id="a" style="cursor:not-allowed;">
                                  <li
                                    class="list-group-item border-0 bg-transparent"
                                  >
                                    <div
                                      class="form-group form_group form-check"
                                    >
                                      <input
                                        type="radio"
                                        class="form-check-input form_check_input" name="track" value="facebook"
                                      />
                                      <label
                                        class="form-check-label form_check_label"
                                        >ফেইসবুক </label
                                      >
                                    </div>
                                  </li>
                                  <li
                                    class="list-group-item border-0 bg-transparent"
                                  >
                                    <div
                                      class="form-group form_group form-check"
                                    >
                                      <input
                                        type="radio"
                                        class="form-check-input form_check_input" name="track" value="youtube"
                                      />
                                      <label
                                        class="form-check-label form_check_label"
                                        >ইউটিউব </label
                                      >
                                    </div>
                                  </li>
                                  <li
                                    class="list-group-item border-0 bg-transparent"
                                  >
                                    <div
                                      class="form-group form_group form-check"
                                    >
                                      <input
                                        type="radio"
                                        class="form-check-input form_check_input" name="track" value="previous_user"
                                      />
                                      <label
                                        class="form-check-label form_check_label"
                                        >পূর্বের এক্সামলী ব্যবহারকারি </label
                                      >
                                    </div>
                                  </li> 
                                  <li
                                    class="list-group-item border-0 bg-transparent"
                                  >
                                    <div
                                      class="form-group form_group form-check"
                                    >
                                      <input
                                        type="radio"
                                        class="form-check-input form_check_input" name="track" value="tv"
                                      />
                                      <label
                                        class="form-check-label form_check_label"
                                        >টেলিভিশন বিজ্ঞাপন </label
                                      >
                                    </div>
                                  </li>
                                  <li
                                    class="list-group-item border-0 bg-transparent"
                                  >
                                    <div
                                      class="form-group form_group form-check"
                                    >
                                      <input
                                        type="radio"
                                        class="form-check-input form_check_input" name="track" value="paper"
                                      />
                                      <label
                                        class="form-check-label form_check_label"
                                        >পত্রিকা বিজ্ঞাপন </label
                                      >
                                    </div>
                                  </li>
                                  <li
                                    class="list-group-item border-0 bg-transparent"
                                  >
                                    <div
                                      class="form-group form_group form-check"
                                    >
                                      <input
                                        type="radio"
                                        class="form-check-input form_check_input" name="track" value="varsity_mate"
                                      />
                                      <label
                                        class="form-check-label form_check_label"
                                        >বিশ্ববিদ্যালয়ের সহপাঠী </label
                                      >
                                    </div>
                                  </li>
                                  <li
                                    class="list-group-item border-0 bg-transparent"
                                  >
                                    <div
                                      class="form-group form_group form-check"
                                    >
                                    <input onclick="checkTextField()" type="radio" class="form-check-input form_check_input" id="otherCheck" name="track" value="others"/>
                                    <label class="form-check-label form_check_label">অন্যান্য </label> <br/><br>
                                    <input class="d-none form-control" type="text" name="otherText" id="otherText" />

                                      {{-- <input
                                        type="checkbox"
                                        class="form-check-input form_check_input"
                                      />
                                      <label
                                        class="form-check-label form_check_label"
                                        >অন্যান্য </label
                                      > --}}
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-12">
                        <label>পূর্বের এক্সামলী ব্যবহারকারির রেফার কোড </label> <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="পূর্বের এক্সামলী ব্যবহারকারির রেফার কোডটি  আপনি ব্যবহার করলে উক্ত রেফার কোডধারী ব্যক্তি এক্সামলীর পক্ষ থেকে পুরস্কৃত হবেন এবং আপনিও আপনার রেফার কোডটি শেয়ার করলে এবং আপনার রেফার কোডটি অন্য কেউ ব্যবহার করলে আপনিও পুরস্কৃত হবেন |"></i>
                        <input name="refer_code" id="refer_code"
                          class="form-control form_control"
                          type="text"
                          placeholder="e.g. exa000"
                        />
                      </div>

                      <!-- term -->
                      <div class="form-group col-12">
                        <div class="form-group form_group form-check">
                          <input id="checkbox" name="checkbox"
                            type="checkbox"
                            class="form-check-input form_check_input" required
                          />
                          <label class="form-check-label form_check_label"
                            >আমি <a href="{{ route('privacyPolicy') }}">গোপনীয়তার নীতিমালা</a>, <a href="{{ route('termsAndConditions') }}">ব্যবহারের শর্তাবলীর</a> সাথে একমত পোষণ করছি ।
                          </label>
                        </div>
                      </div>
                      <input type="hidden" name="admission_date" value="{{date('d-m-y')}}">
                      <div class="form-group col-12 text-center">
                        <button type="submit" class="btn_primary" id="submit_button">
                          <span>সাইন আপ </span>
                        </button>
                      </div>

                      <div class="form-group col-12 text-center">
                        <div class="users">
                          আগেই অ্যাকাউন্ট খুলেছিলেন ? তাহলে
                          <a class="secondary_color" href="{{ route('user.login') }}">
                            লগ-ইন করুন
                          </a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  {{-- @endpush--}}
@endsection

@push('plugin-scripts')
    <!-- js -->
    <script src="{{ asset('public/assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/jquery-validation/additional-methods.js') }}"></script>
    <!-- {!! Html::script('public/assets/plugins/jquery-validation/additional-methods.js') !!} -->
    <script src="{{ asset('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/choices/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/icheck/icheck.min.js') }}"></script>
@endpush
@push('custom-scripts')
    <!-- custom js -->
    <script src="{{ asset('public/assets/js/validation/frontedAdmitForm-validation.js') }}"></script>
    <script src="{{ asset('public/assets/js/iCheck.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/Bootstrap-4-Multi-Select/dist/js/BsMultiSelect.js') }}"></script>
    <script src="{{ asset('public/assets/js/toastDemo.js') }}"></script>

    <script type="text/javascript">
      $(document).ready(function () {
          @if (session('success'))
          showSuccessToast('{{ session("success") }}');
          @elseif(session('danger'))
          showDangerToast('{{ session("danger") }}');
          @elseif(session('warning'))
          showWarningToast('{{ session("warning") }}');
          @endif
      });
  </script>
  <script type="text/javascript">
    let discountAmount = 0;
    function ShowHideDiv() {
        var chkYes = document.getElementById("checkbox");
        var dvPassport = document.getElementById("couponCode");
        dvPassport.style.display = chkYes.checked ? "block" : "none";
    }
  </script>

    {{-- check all button function --}}
    <script type="text/javascript">
      $("#checkall").click(function (){
          if ($("#checkall").is(':checked')){
             $(".checkboxes").each(function (){
                $(this).prop("checked", true);
                });
             }else{
                $(".checkboxes").each(function (){
                     $(this).prop("checked", false);
                });
             }
      });

    </script>

    {{-- terms and condition check also enable submit button function--}}
    <script>
      $('#checkbox').change(function() {
        if(this.checked) {
          $("#submit_button").removeAttr('disabled');
        }else{
          $("#submit_button").prop("disabled", true);
        }
      });
    </script>

    {{-- hash password view function --}}
    <script type="text/javascript">
      function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    </script>

    <script type="text/javascript">
      function password_show_hide() {
        var x = document.getElementById("password");
        var show_eye = document.getElementById("show_eye");
        var hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type === "password") {
          x.type = "text";
          show_eye.style.display = "none";
          hide_eye.style.display = "block";
        } else {
          x.type = "password";
          show_eye.style.display = "block";
          hide_eye.style.display = "none";
        }
      }
      function password_show_hide2() {
        var x = document.getElementById("confirm_password");
        var show_eye2 = document.getElementById("show_eye2");
        var hide_eye2 = document.getElementById("hide_eye2");
        hide_eye2.classList.remove("d-none");
        if (x.type === "password") {
          x.type = "text";
          show_eye2.style.display = "none";
          hide_eye2.style.display = "block";
        } else {
          x.type = "password";
          show_eye2.style.display = "block";
          hide_eye2.style.display = "none";
        }
      }
    </script>
    <script type="text/javascript">
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
    <script type="text/javascript">
      function checkTextField() {
          let checkBox = document.getElementById('otherCheck');
          let text = document.getElementById('otherText');

          if (checkBox.checked == true) {
              // text.style.display = 'block';
              text.classList.remove('d-none');
          } else {
              text.classList.add('d-none');
          }
      }
    </script>
@endpush
