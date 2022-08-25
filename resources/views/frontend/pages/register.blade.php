@extends('frontend.layout.master')

  @section('content')

    <main>
      <!-- page title -->
      <section class="page_title">
        <!--<div class="container">-->
        <!--  <div class="row">-->
        <!--    <div class="col-12">-->
        <!--      <div-->
        <!--        class="page_title_container d-flex flex-column align-items-center justify-content-center"-->
        <!--      >-->
        <!--        <div class="page_title_heading">-->
        <!--          <h2 class="header mb-0">Registration</h2>-->
        <!--        </div>-->
        <!--        <nav aria-label="breadcrumb">-->
        <!--          <ol class="breadcrumb mb-0">-->
        <!--            <li class="breadcrumb-item breadcrumb_item">-->
        <!--              <a href="{{ route('frontend.index') }}">হোম</a>-->
        <!--            </li>-->
        <!--            <li class="breadcrumb-item breadcrumb_item active">-->
        <!--              <a href="{{ route('frontend.showAdmissionForm') }}">Registration</a>-->
        <!--            </li>-->
        <!--          </ol>-->
        <!--        </nav>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
        
       <!-- commented before-->
        <!--<div class="svg_container">-->
        <!--  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">-->
        <!--    <path-->
        <!--      fill="#fff"-->
        <!--      fill-opacity="1"-->
        <!--      d="M0,128L60,138.7C120,149,240,171,360,160C480,149,600,107,720,112C840,117,960,171,1080,160C1200,149,1320,75,1380,37.3L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"-->
        <!--    ></path>-->
        <!--  </svg>-->
        <!--</div>-->
        <!-- commented before-->
      </section>
      <!-- end page title -->
      <!-- register form -->
      <section class="register my-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
              <div class="register_box p-2 p-lg-5">
                <!-- Title Box -->
                <div class="heading text-center mb-5">
                  <h2 class="header">Registration</h2>
                  <div class="paragraph">
                    <span class="secondary_color">Welcome!</span> Please confirm
                    that you are visiting
                  </div>
                </div>

                <!-- Login Form -->
                <div class="register_form">
                  <form class="cmxform" id="frontedAdmitForm" method="post" action="{{ route('admission.form.store') }}" enctype="multipart/form-data">
                   @csrf
                    <div class="row">
                      <!-- Form Group -->
                      <div class="form-group col-12 col-lg-6">
                        <label for="name">Full Name<span class="requiredStar" style="color: red"> * </span></label>
                        <input id="name" class="form-control" name="name" type="text" required>
                      </div>

                      <!-- Form Group -->
                      <div class="form-group col-12 col-lg-6">
                        <label for="designation">Phone No<span class="requiredStar" style="color: red"> * </span></label>
                              <input id="phone" class="form-control" type="text" name="phone" required>
                      </div>

                      <!-- Form Group -->
                      <div class="form-group col-12 col-lg-6">
                        <label for="designation">Email Address<span class="requiredStar" style="color: red"> * </span></label>
                              <input id="email" class="form-control" type="email" name="email" autocomplete="off" required>
                      </div>

                      <!-- Form Group -->
                      <div class="form-group col-12 col-lg-6">
                        <label for="institution_name">Institution Name</label> <span class="requiredStar" style="color: red"> * </span>
                            {!!  Form::text('institution_name',null,['class'=>'form-control','required']) !!}
                      </div>

                      <!-- Form Group -->
                      <div class="form-group col-12 col-lg-6">
                        {!! Form::label('name','District') !!} <span class="requiredStar" style="color: red"> * </span>
                              {!!  Form::select('district',$district,null,['class'=>'form-control','placeholder'=>'Select district...','id'=>'select1','required']) !!}
                      </div>
                      <!-- Form Group -->
                      <div class="form-group col-12 col-lg-6">
                        {!! Form::label('name','Thana') !!} <span class="requiredStar" style="color: red"> * </span>
                              {!!  Form::select('thana',$thana,null,['class'=>'form-control','placeholder'=>'Select thana...','id'=>'select2','required']) !!}
                      </div>
                      <!-- Form Group -->
                      <div class="form-group col-12 col-lg-6">
                        <label for="class">Class</label> <span class="requiredStar" style="color: red"> * </span>
                            {!!  Form::text('class',null,['class'=>'form-control','required']) !!}
                      </div>

                      <!-- Form Group -->
                      <div class="form-group col-12 col-lg-6">
                        <label for="password">Login Password<span class="requiredStar" style="color: red"> * </span></label>
                            <input id="password" class="form-control" type="Password" minlength="8" name="password" required>
                            <p style="font-size: 12px;color: red">Passwords must contain at least 8 characters, including uppercase, lowercase letters, numbers and a special character.</p>
                      </div>

                      <div
                        class="form-group col-lg-12 col-md-12 col-sm-12 text-center"
                      >
                        <button type="submit" class="btn_primary">
                          <span>Sign Up </span>
                        </button>
                      </div>

                      <div
                        class="form-group col-lg-12 col-md-12 col-sm-12 text-center"
                      >
                        <div class="users">
                          Already have an account?
                          <a class="secondary_color" href="{{ route('user.login') }}"
                            >Sign In</a
                          >
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
  @endsection