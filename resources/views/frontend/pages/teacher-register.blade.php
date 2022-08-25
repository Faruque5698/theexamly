@extends('frontend.layout.master')

@push('plugin-styles')
@endpush

  @section('content')  
      <!-- page title -->
      <section class="page_title">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div
                class="page_title_container d-flex flex-column align-items-center justify-content-center"
              >
                <div class="page_title_heading">
                  <h2 class="header mb-0">শিক্ষক রেজিস্ট্রেশান</h2>
                </div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item breadcrumb_item">
                      <a href="{{ url('/') }}">হোম</a>
                    </li>
                    <li class="breadcrumb-item breadcrumb_item active">
                      <a href="#">শিক্ষক রেজিস্ট্রেশান</a>
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end page title -->
      <!-- teacher responsibility -->
      <section class="teacher_responsibility my-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="text_box p-2 p-lg-5">
                <h2 class="header">শিক্ষকের দায়িত্ব</h2>
                <div class="text">

                  @foreach($teacherResponsibility as $key => $responsibility)
                    {!! $responsibility->description !!}
                  @endforeach
                </div>
                <div class="form-group form_group form-check mt-5">
                  <input
                    type="checkbox"
                    class="form-check-input form_check_input"
                    id="teacherResponsibilityCheckbox"
                  />
                  <label class="form-check-label form_check_label"
                    >আমি উপরোক্ত শর্তাবলীর সাথে একমত এবং দ্বায়িত্বাগুলি সঠিক
                    ভাবে পালন করব।
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- register form -->
      <section class="register my-5 hidden" id="teacherRegisterSection">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="register_box p-2 p-lg-5">
                <!-- Title Box -->
                <div class="heading text-center mb-5">
                  <h2 class="header">রেজিস্ট্রেশান</h2>
                  <div class="paragraph">সকল তথ্য ইংরেজিতে প্রদান করুন।</div>
                </div>

                <!-- Login Form -->
                <div class="register_form">
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div><br />
                  @endif
                  <form class="cmxform" id="teacherForm" method="post" action="{{ route('teacher_registration.store') }}" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    <div class="row">
                      <!-- Form Group -->
                      <div class="form-group col-12">
                        <label
                          >নামের প্রথম অংশ (নামের শেষ অংশ বাদে সকল অংশ ) <span class="requiredStar" style="color: red"> * </span></label
                        >
                        <input name="first_name" id="first_name"
                          class="form-control form_control"
                          type="text"
                          placeholder="e.g. Md. Abdullah"
                        />
                      </div>
                      <div class="form-group col-12">
                        <label>নামের শেষ অংশ <span class="requiredStar" style="color: red"> * </span></label>
                        <input name="last_name" id="last_name"
                          class="form-control form_control"
                          type="text"
                          placeholder="e.g. Mamun"
                        />
                      </div>

                      <!-- Form Group -->
                      <div class="form-group col-12">
                        <label>ইমেইল <span class="requiredStar" style="color: red"> * </span></label>
                        <input name="email" id="email"
                          class="form-control form_control"
                          type="email"
                          placeholder="e.g. name@domain.com"
                        />
                      </div>

                      <!-- Form Group -->
                      <div class="form-group col-12">
                        <label>মোবাইল নাম্বার <span class="requiredStar" style="color: red"> * </span></label>
                        <input name="phone" id="phone"
                          class="form-control form_control"
                          type="text"
                          name="phone"
                          placeholder="e.g. 01900011100"
                        />
                      </div>
                      <div class="form-group col-12">
                        <label>এন আই ডি নম্বর <span class="requiredStar" style="color: red"> * </span></label>
                        <input name="nid_no" id="nid_no"
                          class="form-control form_control"
                          type="text"
                          name="phone"
                          placeholder="e.g. 00011100"
                        />
                      </div>
                      <div class="form-group col-12">
                        <label>শিক্ষাগত যোগ্যতা <span class="requiredStar" style="color: red"> * </span></label>
                     
                        <table class="table_of_grade">
                          <thead class="table_of_grade_thead">
                            <tr>
                              <th class="degree">পরীক্ষা</th>
                              <th class="passingYear">পাসের সন</th>
                              <th class="result">রেজাল্ট</th>
                              <th class="institution">শিক্ষা প্রতিষ্ঠানের নাম </th>
                            </tr>
                          </thead>
                          <tbody class="table_of_grade_tbody">
                            <tr>
                              <td colspan="4">
                                <table class="inner_table_of_grade">
                                  <tbody>
                                    <tr>
                                      <td class="degree">
                                        <input
                                          type="text"
                                          class="form-control form_control"
                                          name="degree[]"
                                          placeholder="e.g. SSC"
                                        />
                                      </td>
                                      <td class="passingYear">
                                        <input
                                          type="text"
                                          class="form-control form_control"
                                          name="passingYear[]"
                                          placeholder="e.g. 2021"
                                        />
                                      </td>
                                      <td class="result">
                                        <input
                                          type="text"
                                          class="form-control form_control"
                                          name="result[]"
                                          placeholder="e.g. 5"
                                        />
                                      </td>
                                      <td class="institute">
                                        <input
                                          type="text"
                                          class="form-control form_control"
                                          name="institution[]"
                                          placeholder="e.g. Rajshahi Collegiate School"
                                        />
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                          <button class="add_form_field btn_primary my-3">
                            <span> Add &nbsp;<i class="fas fa-plus"></i></span>
                          </button>
                        </div>
                        <div id="table_of_grade_error"></div>
                      </div>
                      <div class="form-group col-12">
                        <label
                          >বর্তমানে চাকুরীরত প্রতিষ্ঠানের নাম (অবসর প্রাপ্তদের
                          ক্ষেত্রে শেষ প্রতিষ্ঠানের নাম ) <span class="requiredStar" style="color: red"> * </span>
                        </label>
                        <input
                          class="form-control form_control"
                          type="text"
                          name="job_institution_name" id="job_institution_name"
                          placeholder="e.g. প্রতিষ্ঠানের নাম (পদবীসহ )"
                        />
                      </div>

                      <div class="form-group col-12">
                        <label>কোন বিষয় পড়াতে ইচ্ছুক  <span class="requiredStar" style="color: red"> * </span></label>
                        <select class="form-control form_control_select" name="exam_category" id="exam_category">
                          <option value="">নির্বাচন করুন....</option>
                          @foreach($examCategory as $key => $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-12 exam_dropdown">
                        <label>পরীক্ষা <span class="requiredStar" style="color: red"> * </span></label>
                        <div class="card">
                          <div class="card-body card_body">
                            <ul class="list-group"  id="a">

                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-12 exam_dropdown">
                        <label>বিষয় <span class="requiredStar" style="color: red"> * </span></label>
                        <div class="card">
                          <div class="card-body card_body">
                            <ul class="list-group" id="b">
                              
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="form-group col-12">
                        <label>বর্তমান ঠিকানা <span class="requiredStar" style="color: red"> * </span></label>
                        <textarea name="address" id="address" 
                          class="form-control form_control"
                          rows="3"
                        ></textarea>
                      </div>
                      <!-- Form Group -->
                      <div class="form-group col-12">
                        <label>পাসওয়ার্ড <span class="requiredStar" style="color: red"> * </span></label>

                        <input name="password" id="password" 
                          class="form-control form_control"
                          type="password"
                          placeholder="* * * * * * * *"
                        />

                        <small class="form-text text_muted text-justify">
                          পাসওয়ার্ডটিতে অবশ্যই বড় হাতের অক্ষর, ছোট হাতের
                          অক্ষর, সংখ্যা এবং একটি স্পেশাল ক্যারেক্টার
                          (!,@,#,$,%,^,&,*) সহ কমপক্ষে ৮ টি অক্ষর থাকতে হবে।
                        </small>
                      </div>
                      <div class="form-group col-12">
                        <label>কনফার্ম পাসওয়ার্ড <span class="requiredStar" style="color: red"> * </span></label>

                        <input name="confirm_password" id="confirm_password" 
                          class="form-control form_control"
                          type="password"
                          placeholder="* * * * * * * *"
                        />
                      </div>
                      <!-- term -->
                      {{-- <div class="form-group col-12">
                        <div class="form-group form_group form-check">
                          <input
                            type="checkbox"
                            class="form-check-input form_check_input"
                          />
                          <label class="form-check-label form_check_label"
                            >আমি শর্তাবলীর সাথে একমত।
                          </label>
                        </div>
                      </div> --}}

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
  @endsection

@push('plugin-scripts')
  {!! Html::script('public/frontend/js/jquery-3.5.1.min.js') !!}
  {{-- {!! Html::script('public/frontend/js/scrollPosStyler.min.js') !!} --}}
  {!! Html::script('public/frontend/js/bootstrap.bundle.min.js') !!}
  {!! Html::script('public/frontend/js/jquery.anchorScroll.min.js') !!}
  <script src="{{ asset('/assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endpush

@push('custom-scripts') 
  {!! Html::script('public/frontend/js/common.js') !!}
  {!! Html::script('public/frontend/js/createGradeRow.js') !!}
  <script src="{{ asset('/assets/js/validation/teacherForm-validation.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function () {
        @if (session('success'))
        showSuccessToast('{{ session("success") }}');
        @elseif(session('warning'))
        showWarningToast('{{ session("warning") }}');
        @endif
    });
  </script>
  <!-- dropdown.blade.php -->
  <script type="text/javascript">
     jQuery(document).ready(function ()
     {
       
       jQuery('select[name="exam_category"]').on('change',function(){
       var exam_type = jQuery(this).val();

       if(exam_type){
         jQuery.ajax({
           url : 'teacher_registration/course/' +exam_type,
           type : "GET",
           dataType : "json",
            beforeSend: function(jqXHR,settings)
           {
             $('.ajax_loader').css("visibility", "visible");
              // console.log(settings.url);
           },
           success:function(data)
           {
             // $('#a').empty();
             // $('select[name="exam"]').append('<option value="">Select one..</option>');
             jQuery.each(data, function(key,value){
                 $('#a').append('<li class="list-group-item border-0 bg-transparent"><div class="form-group form_group form-check"><input type="checkbox" id="division_id" name="group_name[]" class="form-check-input form_check_input" value="'+value+'"><label class="form-check-label form_check_label"> '+value+'</label></div>'); 
             });
           },
           complete: function()
           {
             $('.ajax_loader').css("visibility", "hidden");
           },
         });
       }
     });
    });
    </script> 
    <script type="text/javascript">
      jQuery(document).ready(function ()
      {
            
        jQuery("#a").click(function(){
          $('#division_id').empty();
            $.each($("input[name='group_name[]']:checked"), function(){            
              var favorite=($(this).val());
                //console.log(favorite);
            if(favorite){
              jQuery.ajax({
                url : 'teacher_registration/subject/' +favorite,
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
                  // $('#b').empty();
                  jQuery.each(data, function(key,value){
                     
                    $('#b').append('<li class="list-group-item border-0 bg-transparent"><div class="form-group form_group form-check"><input type="checkbox" id="division_id2" name="subject_name[]" class="form-check-input form_check_input" value="'+key+'"><label class="form-check-label form_check_label"> '+value+'('+favorite+')</label></div>'); 
                  });
                },
                complete: function()
                {
                  $('.ajax_loader').css("visibility", "hidden");
                },
              });
              
            }
            // else{
            //         $('#b').empty();
            //   }
          });
            });

         });   
    </script> 
@endpush
