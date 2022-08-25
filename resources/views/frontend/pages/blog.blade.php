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
                  <h2 class="header mb-0">ব্লগ</h2>
                </div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item breadcrumb_item">
                      <a href="{{ route('frontend.index') }}">হোম</a>
                    </li>
                    <li class="breadcrumb-item breadcrumb_item active">ব্লগ</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!--<div class="svg_container">-->
        <!--  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">-->
        <!--    <path-->
        <!--      fill="#fff"-->
        <!--      fill-opacity="1"-->
        <!--      d="M0,128L60,138.7C120,149,240,171,360,160C480,149,600,107,720,112C840,117,960,171,1080,160C1200,149,1320,75,1380,37.3L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"-->
        <!--    ></path>-->
        <!--  </svg>-->
        <!--</div>-->
      </section>
      <!-- end page title -->
      <section class="blog_page">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8">
              <div class="row">
                @foreach($blog as $key=> $blogs)
                <div class="col-12">
                  <div class="single_blog_main">
                    <a href="{{ route('blog.blogDetails',[$blogs->id]) }}">
                      <div class="blog_image text-center">
                        <img
                          class="img-fluid"
                          src="{{ asset('\uploads\files\blog') }}/{{ $blogs->image }}"
                          alt="blog"
                        />
                      </div>
                    </a>
                    <div class="blog_body p-3">
                      <a class="text-decoration-none" href="{{ route('blog.blogDetails',[$blogs->id]) }}">
                        <h4 class="title mb-0">
                          {{ $blogs->title }}
                        </h4>
                      </a>
                      <p class="paragraph mb-0">
                        {!! $blogs->description !!}
                      </p>

                      <div class="blog_action">
                        <a class="btn_primary text-decoration-none" href="{{ route('blog.blogDetails',[$blogs->id]) }}">
                          <span>Read More</span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach

                <!-- pagination -->
                {{-- <div class="col-12 mt-3">
                  <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination">
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
                      </ul>
                    </nav>
                  </div>
                </div> --}}
              </div>
            </div>
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
                 @foreach($blog->slice(0, 5) as $key=> $blogs)
                  <div class="single_recent_blog">
                    <div class="row align-items-center">
                      <div class="col-sm-4">
                        <a href="{{ route('blog.blogDetails',[$blogs->id]) }}">
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
                          href="{{ route('blog.blogDetails',[$blogs->id]) }}"
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
   
  {{-- @push('plugin-scripts')
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
