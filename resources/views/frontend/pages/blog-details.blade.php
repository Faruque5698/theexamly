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
                  <h2 class="header mb-0">Blog Details</h2>
                </div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item breadcrumb_item">
                      <a href="{{ route('frontend.index') }}">হোম</a>
                    </li>
                    <li class="breadcrumb-item breadcrumb_item active">
                      Blog Details
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="svg_container">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path
              fill="#fff"
              fill-opacity="1"
              d="M0,128L60,138.7C120,149,240,171,360,160C480,149,600,107,720,112C840,117,960,171,1080,160C1200,149,1320,75,1380,37.3L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"
            ></path>
          </svg>
        </div>
      </section>
      <!-- end page title -->
      <section class="blog_details_page">
        <div class="container">
          <div class="row">
           @foreach($blogDetails as $key=>$blogDetail) 
            <div class="col-12 col-lg-8">
              <div class="blog_details_main">
                <div class="blog_image text-center">
                  <img class="img-fluid" src="{{ asset('\uploads\files\blog') }}/{{ $blogDetail->image }}" alt="blog" />
                </div>

                <div class="blog_body p-3">
                  <h4 class="title">
                    {{ $blogDetail->title }}
                  </h4>
                  <div class="text">
                    {!! $blogDetail->description !!}
                    <br />
                  </div>
                  <div
                    class="blog_footer d-flex flex-column flex-md-row justify-content-between mt-5"
                  >
                    <div class="tags">
                      <h5 class="header d-inline-block">Tag:</h5>
                      <a href="#">Tag One,</a><a href="#">Tag Two,</a
                      ><a href="#">Tag Three</a>
                    </div>

                    <div class="share_icons">
                      <h5 class="header d-inline-block">Share:</h5>
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           @endforeach
            <div class="col-12 col-lg-4 mt-5 mt-lg-0">
              <div class="blog_sidebar">
                <!-- blog search -->
                <div class="blog_search">
                  <form class="form-inline">
                    <div class="input-group w-100">
                      <input
                        type="text"
                        class="form-control form_control"
                        id="inlineFormInputGroupUsername2"
                        placeholder="Search Blog"
                      />
                      <div class="input-group-append">
                        <button class="btn search_box_btn" type="button">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- recent blog  stories-->
                <div class="mt-5 recent_blog_stories">
                  <h4 class="header mb-3">Recent Stories</h4>
                 @foreach($blog as $key=>$blogs) 
                  <div class="single_recent_blog">
                    <div class="row align-items-center">
                      <div class="col-sm-4">
                        <a href="{{ route('blog.blogDetails',[ $blogs->id]) }}">
                          <img
                            src="{{ asset('\uploads\files\blog') }}/{{ $blogs->image }}"
                            class="img rounded img-fluid"
                            alt="recent-stories"
                          />
                        </a>
                      </div>
                      <div class="col-sm-8">
                        <a
                          class="text-decoration-none"
                          href="{{ route('blog.blogDetails',[ $blogs->id]) }}"
                        >
                          <h6 class="title">
                            {{ $blogs->title }}
                          </h6>
                        </a>

                        <span class="d-inline-block text-muted"
                          >{{ $blogs->created_at->format('d-M-Y') }}</span
                        >
                      </div>
                    </div>
                  </div>
                 @endforeach 
                </div>
                <!-- tag blog -->
                <div class="mt-5 blog_tag">
                  <h4 class="header mb-3">Tags</h4>
                  <div>
                    <a class="blog_tag_link rounded d-inline-block p-2" href="#"
                      >Blink</a
                    >
                    <a class="blog_tag_link rounded d-inline-block p-2" href="#"
                      >Web Design</a
                    >
                    <a class="blog_tag_link rounded d-inline-block p-2" href="#"
                      >Saas</a
                    >
                    <a class="blog_tag_link rounded d-inline-block p-2" href="#"
                      >Corporate</a
                    >
                    <a class="blog_tag_link rounded d-inline-block p-2" href="#"
                      >Sass</a
                    >
                    <a class="blog_tag_link rounded d-inline-block p-2" href="#"
                      >Software</a
                    >
                    <a class="blog_tag_link rounded d-inline-block p-2" href="#"
                      >Landing</a
                    >
                    <a class="blog_tag_link rounded d-inline-block p-2" href="#"
                      >Startup</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

  @endsection
   
 {{--  @push('plugin-scripts')
  <!-- js -->
    <script src="{{ asset('public/frontend/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/scrollPosStyler.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.anchorScroll.min.js') }}"></script>
  @endpush

  @push('custom-scripts')
    <!-- custom js -->
    <script src="{{ asset('public/frontend/js/common.js') }}"></script>
  @endpush --}}
