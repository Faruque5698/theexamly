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
      <section class="courses_filter">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-3 order-1 order-lg-0">
              <div class="courses_sidebar_filter">
                <h5 class="header mb-0">প্রস্তুতি পরীক্ষা সমূহ :</h5>
                

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

                                $group2= DB::table('courses')->where("courses.id",$groups->course_id)->where('courses.status','1')->orderBy('courses.id', 'ASC')->get()->pluck('full_name','id');

                              @endphp
                              @foreach($group2 as $key=> $groupType)
                              <li>
                                <a class="sub_menu_link blah-toggler" id="track" onClick="showDiv({{ $value->id }}+'/'+{{ $groups->course_id }});" value="{{ $groups->course_id }}/{{ $value->id }}"  href="{{ route('frontend.courseDetails',$groupType) }}">{{ $groupType }}</a>

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
            <div class="col-12 col-lg-9 order-0 mb-5 mb-lg-0 order-lg-1" id='ch'>
              <div class="courses_heading_filter">
                <div class="row mb-4 align-items-center">
                  <div class="col-md-12 mb-3 mb-md-0">
                    {{-- <h1>বিসিএস প্রিলিমিনারি পরীক্ষার প্রস্তুতি</h1> --}}
                    <h1>{{ $courses->full_name }}</h1>
                  </div>                  
                </div>
              </div>

              @if($courses->full_name=='বি.সি.এস' || $courses->full_name=='প্রাথমিক শিক্ষক নিয়োগ' || $courses->full_name=='এস এস সি' || $courses->full_name=='এইচ এস সি')
                <div class="row">
                <div class="col-12">
                  <img class="img-fluid" src="{{asset('public/uploads/files/banner/')}}/{{ $courses->image }}" alt="Course Image">
                </div>

                <div class="col-12">
                  <div class="course-assign">
                    <div class="course-assign-count">
                      <i class="fas fa-user-check"></i>
                      <div class="cac-text">
                        <p>কোর্সটি ক্রয় করছেন</p>
                        @if(empty($courses->purchasing_count))
                          <p class="font-weight-bold">১০০ জন</p>
                        @else
                          <p class="font-weight-bold">{{ $courses->purchasing_count }} জন</p>
                        @endif
                      </div>
                    </div>
                    <div class="course-assign-btn">
                      @if(Auth::user())
                        <a class="btn" href="http://theexamly.com/admin/dashboard">কোর্সটি ক্রয় করুন</a>  
                      @else
                        <a class="btn" href="{{route('user.login')}}">কোর্সটি ক্রয় করুন</a> 
                      @endif
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="course-features">
                    <h3>যে যে বিষয়ে শিখতে ও পরীক্ষা দিতে পারবেন- </h3>
                    <ul>
                      @foreach($subject as $ubjects)
                        <li><i class="fas fa-book-reader"></i> {{ $ubjects->name }}</li>
                      @endforeach
                    </ul>                    
                </div>
                <div class="course-features">
                  <h3>কোর্সটি করতে আপনার প্রয়োজন হবে-</h3>
                  <ul>
                    <li><i class="far fa-check-square"></i> কোর্সটির প্রিমিয়াম সদস্যপদ</li>
                    <li><i class="far fa-check-square"></i> স্মার্টফোন অথবা কম্পিউটার বা ল্যাপটপ</li>
                    <li><i class="far fa-check-square"></i> ওয়াইফাই বা মোবাইল ইন্টারনেট সংযোগ</li>
                  </ul>
                </div>
                <div class="course-features">
                  <h3>বিস্তারিত জানতে কল করুন:- <a href="tel:+৮৮০১৯১৩৮০০৮০০">০১৯১৩ ৮০০ ৮০০</a></h3>                  
                </div>

              </div>
            </div>
              @else
                <h3 style="color:#15AABF;">শীঘ্রই আসবে</h3>
              @endif 
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
