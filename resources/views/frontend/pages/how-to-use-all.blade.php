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
                  <h2 class="header mb-0">ব্যবহার বিধি</h2>
                </div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item breadcrumb_item">
                      <a href="{{ url('/') }}">হোম</a>
                    </li>
                    <li class="breadcrumb-item breadcrumb_item active">
                      ব্যবহার বিধি
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end page title -->
      <!-- use gide -->
      <section class="use_gide">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="use_gide_content">
                <div class="accordion" id="accordionExample">
                  @foreach($userManualAll as $key=>$details)
                  <div class="card">
                    <div class="card-header" id="heading{{ $details->id }}">
                      <h2 class="mb-0">
                        <button
                          class="btn btn-link btn-block text-left"
                          type="button"
                          data-toggle="collapse"
                          data-target="#collapse{{ $details->id }}"
                          aria-expanded="true"
                          aria-controls="collapse{{ $details->id }}"
                        >
                          {{ $details->title }}
                        </button>
                      </h2>
                    </div>

                    <div
                      id="collapse{{ $details->id }}"
                      class="collapse"
                      aria-labelledby="heading{{ $details->id }}"
                      data-parent="#accordionExample"
                    >
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 col-lg-8 order-1 order-lg-0">
                            <div class="use_gide_text">
                              {!! $details->description !!}
                              {{-- <a class="primary_color" href="#">আরও পড়ুন </a> --}}
                            </div>
                          </div>
                          <div
                            class="col-12 col-lg-4 order-0 order-lg-1 mb-3 mb-lg-0"
                          >
                            <div class="use_gide_video">
                              <!--<a-->
                              <!--  href="{{ asset('/') }}{{ $details->video }}"-->
                              <!--  class="text-decoration-none popupYoutubeVideo"-->
                              <!-->
                                <div class="use_gide_image text-center">
                                  <img
                                    class="img-fluid"
                                    src="{{ asset('public/uploads/files/userManual/') }}/{{ $details->image }}"
                                    alt="about_us"
                                  />
                                  <!--<div class="body py-2">-->
                                  <!--  <span class="play_icon mr-2"-->
                                  <!--    ><i class="fas fa-play"></i-->
                                  <!--  ></span>-->
                                  <!--  <span> Play Video</span>-->
                                  <!--</div>-->
                                </div>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  @endsection

<script src="public/frontend/js/jquery.magnific-popup.min.js"></script>
<script src="public/frontend/js/popupYoutube.js"></script>
