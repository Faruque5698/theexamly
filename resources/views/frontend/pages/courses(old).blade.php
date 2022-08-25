<?php use App\Models\Backend\Subject; ?>
@extends('frontend.layout.master')

@push('plugin-styles')
  {!! Html::style('public/css/loader.css') !!}
@endpush

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
                  <h2 class="header mb-0">প্রস্তুতি পরীক্ষা সমূহ </h2>
                </div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item breadcrumb_item">
                      <a href="{{ route('frontend.index') }}">হোম</a>
                    </li>
                    <li class="breadcrumb-item breadcrumb_item active">
                      <a href="#">প্রস্তুতি পরীক্ষা সমূহ </a>
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="svg_container">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path
              fill="#fff"
              fill-opacity="1"
              d="M0,128L60,138.7C120,149,240,171,360,160C480,149,600,107,720,112C840,117,960,171,1080,160C1200,149,1320,75,1380,37.3L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"
            ></path>
          </svg>
        </div> --}}
      </section>
      <!-- end page title -->

      <!-- courses grid -->
      <section class="courses_filter">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-3 order-1 order-lg-0">
              <div class="courses_sidebar_filter">
                <h5 class="header mb-0">&nbsp;প্রস্তুতি পরীক্ষা সমূহ :</h5> 
                <!--course free or paid -->
                {{-- <div class="courses_free_or__paid mt-3">
                  <form class="courses_free_or__paid_form">
                    <label class="courses_free_or__paid_form_label mb-2"
                      >Free
                      <input type="checkbox" name="free" id="free" onClick="showDiv1(0);"/>
                      <span class="checkmark"></span>
                    </label>
                    <label class="courses_free_or__paid_form_label"
                      >Paid
                      <input type="checkbox" name="paid" id="paid" onClick="showDiv2(1);"/>
                      <span class="checkmark"></span>
                    </label>
                  </form>
                </div> --}}

                <!-- courcses category -->
                <div class="courses_category mt-3">
                  <div
                    class="accordion courses_category_accordion"
                    id="accordionExample"
                  >
                   @foreach($ExamCategory as $key=> $value)
                    <div class="card accordion_card">
                      <div class="card-header accordion_header" id="{{ $value->id }}">
                        <h2
                          class="header mb-0 collapsed"
                          data-toggle="collapse"
                          data-target="#collapseOne_{{ $value->id }}"
                          aria-expanded="true"
                          aria-controls="collapseOne"
                        >
                          {{ $value->name }}
                        </h2>
                      </div>

                      <div
                        id="collapseOne_{{ $value->id }}"
                        class="collapse"
                        aria-labelledby="{{ $value->id }}"
                        data-parent="#accordionExample"
                      >
                        @foreach($group as $key=> $groups)
                        <div class="card-body accordion_body">
                          <ul class="sub_menu">
                           @if($value->id == $groups->course_category_id)
                            
                              @php

                                $group2= DB::table('courses')->where("courses.id",$groups->course_id)->where('courses.status','1')->get()->pluck('full_name','id');

                              @endphp
                              @foreach($group2 as $key=> $groupType)
                              <li>
                                <a class="sub_menu_link blah-toggler" id="track" onClick="showDiv({{ $value->id }}+'/'+{{ $groups->course_id }});" value="{{ $groups->course_id }}/{{ $value->id }}"  href="##">{{ $groupType }}</a>

                                <input class="sub_menu_link" type="hidden" name="groupType" id="groupType" value="{{ $groups->course_id }}/{{ $value->id }}">
                              </li>
                              @endforeach
                           @endif
                          </ul>
                        </div>
                        @endforeach
                      </div>
                    </div>
                   @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-9 order-0 mb-5 mb-lg-0 order-lg-1">
              <div class="ajax_loader">
                <img src="{{ url('public/assets/images/loading.gif') }}" class="img-fluid" />
              </div>
              {{-- <div class="courses_heading_filter">
                <div class="row mb-4 align-items-center">
                  <div class="col-md-5 mb-3 mb-md-0">
                    <span class="text-muted">Showing 1 to 18 of 20 total</span>
                  </div>
                  <div
                    class="col-md-7 d-flex align-items-center justify-content-md-end"
                  >
                    <div class="sort_filter d-flex align-items-center">
                      <select class="form-control form-control-sm form_control" id="sortBy">
                        <option selected="">Sort By</option>
                        <option value="1">Newest Item</option>
                        <option value="2">Populer</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div> --}}

              @if($slug == 'চাকুরী নিয়োগ পরীক্ষা' || $slug == 'বি.সি.এস')
                <div class="single_courses user_alert">

                  <div class="ua-text">
                    
                      নীচের সাবজেক্টসমূহ মিলে বিসিএস এর একটি সম্পূর্ন কোর্স। এর সাথে বিনামূল্যে পাচ্ছেন পি. এস. সি নির্ধারিত বিসিএস প্রিলিমিনারি পরীক্ষার সম্পূর্ণ সিলেবাস এবং বিগত পরীক্ষার (১০ম - ৪২তম) প্রশ্ন সমূহ অধ্যয়ন ও প্র্যাক্টিস করার সুযোগ। 
                  </div>
                  
                    @if(Auth::user())
                      <a href="{{ url('admin/dashboard/buySubject/7') }}" class="btn add_to_cart">কোর্সটি ক্রয় করুন </a>
                    @else
                      <a href="{{ route('buyer.login',['বি.সি.এস']) }}" class="btn add_to_cart">কোর্সটি ক্রয় করুন </a>
                    @endif
                    
                </div>
              @else
                <span></span>
              @endif  
<div class="col-md-12 text-center" ><h3 style="color:#15AABF;" id="ch"></h3></div>
              <div class="row subject" id="subject">
                  
                @if($allSubjects->isEmpty())
                  <div class="col-md-12 text-center">
                    <h3 style="color:#15AABF;">শীঘ্রই আসবে</h3>
                  </div>
                @elseif($allSubjects->isNotEmpty() && $slug != 'জে এস সি' && $slug != 'এস এস সি' && $slug != 'এইচ এস সি' && $slug != 'ষষ্ঠ শ্রেণী' && $slug != 'সপ্তম শ্রেণী')
                  <div class="col-md-12 text-center">
                    <!--<h3 style="margin-bottom:12px;color: #15AABF;;">উদ্ভোধনের অপেক্ষায় </h3>-->
                  </div>  
                  @foreach($allSubjects as $key=>$result)

                    <div class="col-xl-4 col-md-6">
                      <div class="single_courses">
                        {{-- <a href="{{ route('frontend.course_details', [$result->id]) }}"> --}}
                      <div class="course_image text-center">
                        <img
                          class="img-fluid"
                          src="{{ asset("public/uploads/subject") }}/{{ $result->image }}"
                          alt="top-courses"
                        />
                      </div>
                    {{-- </a> --}}
                  </div>
                </div>
                @endforeach
                @else
                @foreach($allSubjects as $key=>$result)

                  <div class="col-xl-4 col-md-6">
                  <div class="single_courses">
                    @if($slug == 'চাকুরী নিয়োগ পরীক্ষা' || $slug == 'বি.সি.এস')
                        <div class="course_image text-center">
                          <img
                            class="img-fluid"
                            src="{{ asset("public/uploads/subject") }}/{{ $result->image }}"
                            alt="top-courses"
                          />
                        </div>
                    @else  
                    <!--<a href="{{ route('frontend.course_details', [$result->id]) }}">-->
                    <a href="{{ route('user.login') }}">
                      <div class="course_image text-center">
                        <img
                          class="img-fluid"
                          src="{{ asset("public/uploads/subject") }}/{{ $result->image }}"
                          alt="top-courses"
                        />
                      </div>
                    </a>
                    @endif 

                    @if($slug == 'চাকুরী নিয়োগ পরীক্ষা' || $slug == 'বি.সি.এস')
                      <div></div>
                    @else
                    <div class="course_body p-2 text-center">
                      <!--<a class="text-decoration-none" href="{{ route('frontend.course_details', [$result->id]) }}">-->
                      <a class="text-decoration-none" href="{{ route('user.login') }}">
                        <h4 class="title mb-0">{{ $result->name }}</h4>
                      </a>
                      <div
                        class="courses_footer d-flex align-items-center justify-content-between"
                      >
                        @if($result->price==0)
                          <div class="course_info">
                            <span class="amount mr-2">Free</span>
                            {{-- <span class="enrolled_users mr-2"
                            ><i class=""></i>No of Exam&nbsp; {{ $result->no_of_exam }}</span> --}}
                          {{-- <span class="course_duration"
                            ><i class="far fa-clock"></i> 5 hr</span
                          > --}}
                          </div>
                        @else
                          <div class="course_info">
                            <span class="amount mr-2">{{ $result->price }}&nbsp;Tk</span>
                            {{-- <span class="enrolled_users mr-2"
                            ><i class=""></i>No of Exam&nbsp; {{ $result->no_of_exam }}</span> --}}
                          {{-- <span class="course_duration"
                            ><i class="far fa-clock"></i> 5 hr</span
                          > --}}
                          </div>
                        @endif
                        
                        @php
                          $exam_id = Subject::where('id',$result->id)->get()->pluck('exam_category')->first();
                        @endphp
                        
                        <div class="course_action">
                          @if(!empty(Auth::user()->id))
                            <a class="btn_primary text-decoration-none" href="{{ url('admin/dashboard/buySubject',[$exam_id]) }}"><span>Add to Cart</span>
                            </a>
                          @else
                            <a class="btn_primary text-decoration-none" href="{{ route('user.login') }}">
                              <span>Add to Cart</span>
                            </a>
                          @endif
                        </div>
                      </div>
                    </div>
                    @endif
                  </div>
                </div>
                @endforeach
                @endif
                <!-- pagination -->
                <div class="col-12 mt-3">
                  <div
                    class="d-flex justify-content-center justify-content-lg-start"
                  >
                    <nav aria-label="Page navigation example">
                      {{-- <ul class="pagination">
                        <li class="page-item page_item">
                          <a
                            class="page-link page_link"
                            href="#"
                            aria-label="Previous"
                          >
                            <span aria-hidden="true">&laquo;</span>
                          </a>
                        </li>
                        <li class="page-item page_item active">
                          <a class="page-link page_link" href="#">1</a>
                        </li>
                        <li class="page-item page_item">
                          <a class="page-link page_link" href="#">2</a>
                        </li>
                        <li class="page-item page_item">
                          <a class="page-link page_link" href="#">3</a>
                        </li>
                        <li class="page-item page_item">
                          <a
                            class="page-link page_link"
                            href="#"
                            aria-label="Next"
                          >
                            <span aria-hidden="true">&raquo;</span>
                          </a>
                        </li>
                      </ul> --}}
                    </nav>
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
              $('#ch').css('display','');
            }
            // elseif(val!='' && val1 !='5'){
            //   $('#ch').append('উদ্ভোধনের অপেক্ষায় ');
            // }
            else{
              $('#ch').append('');
              $('#ch').css('display','none');
            } 
          $.each(data , function(index, val) {

            if(val1=='5'){
              for (let index = 0; index < val.length; index++) {
                
                $('#subject').append('<div class="col-xl-4 col-md-6"><div class="single_courses"><a href="{{ route('user.login') }}"><div class="course_image text-center"><img class="img-fluid" src="{{ asset("public/uploads/subject") }}/'+val[index].image+'" alt="top-courses"/></div></a><div class="course_body p-2 text-center"><a class="text-decoration-none" href="{{ url("/courseDetails/") }}/'+ val[index].id+'"><h4 class="title mb-0">'+val[index].name+'</h4></a><div class="courses_footer d-flex align-items-center justify-content-between"><div class="course_info"><span class="amount mr-2">'+(val[index].price<1 ? 'Free': (val[index].price)+' Tk') +'</span></div><div class="course_action">@if(!empty(Auth::user()->id)) <a class="btn_primary text-decoration-none" href="{{ url("admin/dashboard/buySubject/") }}/'+ val[index].exam_category+'"><span>Add to Cart</span></a>@else<a class="btn_primary text-decoration-none" href="{{ route('user.login') }}"><span>Add to Cart</span></a>@endif</div></div></div></div></div>'); 
              }
            }else{
              for (let index = 0; index < val.length; index++) {
                
                $('#subject').append('<div class="col-xl-4 col-md-6"><div class="single_courses"<div class="course_image text-center"><img class="img-fluid" src="{{ asset("public/uploads/subject") }}/'+val[index].image+'" alt="top-courses"/></div><div class="course_body p-2 text-center"><div class="courses_footer d-flex align-items-center justify-content-between"><div class="course_info"></div><div class="course_action"></div></div></div></div></div>'); 
              }
            }
          });
          
          if (val1 =='7') {
            $(".user_alert").show();
          }else{
            $(".user_alert").hide();
          }
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
              $('#subject').append('<div class="col-xl-4 col-md-6"><div class="single_courses"><a href="{{ route('user.login') }}"><div class="course_image text-center"><img class="img-fluid" src="{{ asset("public/uploads/subject") }}/'+val[index].image+'" alt="top-courses"/></div></a><div class="course_body p-2 text-center"><a class="text-decoration-none" href="{{ url("/courseDetails/") }}/'+ val[index].id+'"><h4 class="title mb-0">'+val[index].name+'</h4></a><div class="courses_footer d-flex align-items-center justify-content-between"><div class="course_info"><span class="amount mr-2">'+(val[index].price<1 ? 'Free': (val[index].price)+' Tk') +'</span></div><div class="course_action"><a class="btn_primary text-decoration-none" href="{{ route('user.login') }}"><span>Add to Cart</span></a></div></div></div></div></div>'); 
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
            // console.log(settings.url);
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