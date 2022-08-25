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
                  <h2 class="header mb-0">আমাদের সম্পর্কে</h2>
                </div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item breadcrumb_item">
                      <a href="{{ url('/') }}">হোম</a>
                    </li>
                    <li class="breadcrumb-item breadcrumb_item active">
                      আমাদের সম্পর্কে
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end page title -->

      <section class="about_us py-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4 mb-3 mb-lg-0">
              <div class="about_us_header_text text-center mb-3">
                <h2 class="header mb-0">
                  <span class="primary_color">আমাদের </span>
                  <span class="secondary_color"> সম্পর্কে</span>
                </h2>
                <p class="paragraph my-3">
               
                  <?php
                  foreach ($about as $key => $aboutUs) {
                  }
                ?>
                  {{ $aboutUs->title }}
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-6 order-1 order-lg-0 mt-3 mt-lg-0">
              <div class="about_us_text">
                {!! $aboutUs->description !!}
                   
            
              </div>
            </div>
            <div class="col-12 col-lg-6 order-0 order-lg-1">
              <div class="about_us_video">
                 <!-- for html video -->
                @if(!empty($aboutUsLink))  
                <video class="html_video" poster="{{ asset('public/uploads/files/aboutUs/') }}/{{ $aboutUs->image }}" controls>
                  <source
                  src="{{ asset('/') }}/{{ $aboutUs->video }}"
                  type="video/mp4"
                />
                  Your browser does not support the video tag.
                </video>
                @else
                  <div class="about_us_image">
                    <img
                      class="img-fluid"
                      src="{{ asset('public/uploads/files/aboutUs/') }}/{{ $aboutUs->image }}"
                      alt="about_us"
                    />
                  </div>  
                @endif
              </div>
            </div>
          </div>
        </div>
      </section>
 
    </main>
  @endsection