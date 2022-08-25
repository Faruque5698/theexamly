@extends('frontend.layout.master')

@section('content')

<main>
  <!-- page title -->
  <section class="page_title">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="page_title_container d-flex flex-column align-items-center justify-content-center">
            <div class="page_title_heading">
              <h2 class="header mb-0">ব্যবহারের শর্তাবলী</h2>
            </div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item breadcrumb_item">
                  <a href="{{ route('frontend.index') }}">হোম</a>
                </li>
                <li class="breadcrumb-item breadcrumb_item active">
                  ব্যবহারের শর্তাবলী
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end page title -->
  <section class="blog_details_page">
    <div class="container">
      <div class="row">
        @foreach($termsCondition as $key=>$condition)
        <div class="col-12">
          <div class="blog_details_main p-5">
            <div class="blog_image text-center"><strong>ব্যবহারের শর্তাবলী</strong>
              {{-- <img class="img-fluid" src="{{ asset('\uploads\files\blog') }}" alt="blog" /> --}}
            </div>

            <div class="blog_body p-3">
              <div class="text">
                {!! $condition->description !!}
                <br />
              </div>
              <div class="blog_footer d-flex flex-column flex-md-row justify-content-between mt-5">
                <div class="share_icons">
                  <h5 class="header d-inline-block">Share:</h5>
                  <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.theExamly.com/termsAndConditions&display=popup"
                    rel="me" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                  <!--<a href="https://twitter.com/share?url=https://theexamly.com/termsAndConditions&display=popup&text=share"-->
                  <!--  rel="me" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>-->
                  <!--<a-->
                  <!--  href="http://www.linkedin.com/shareArticle?mini=true&url=https://theexamly.com/termsAndConditions&source=https://theexamly.com/termsAndConditions"><i-->
                  <!--    class="fab fa-linkedin-in"></i></a>-->
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
</main>

@endsection