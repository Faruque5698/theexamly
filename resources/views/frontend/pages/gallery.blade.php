@extends('frontend.layout.master')
@push('plugin-styles')
{!! Html::style('public/css/frontend/css/lightbox.min.css') !!}
@endpush

@section('content')
<!-- page title -->
<section class="page_title">
    <div class="page_title_overlay">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="page_title_overlay_content text-center">
              <h2>Gallery</h2>
              <ul>
                <li><a href="{{ route('frontend.index') }}">Home</a></li>
                <li>
                  <span><i class="fas fa-angle-double-right"></i></span>
                </li>
                <li>
                  <a class="active" href="{{ route('frontend.gallery') }}">Gallery</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- gallery -->
  <section class="gallery_page">
    <div class="container">
      <div class="row">

        
        @foreach ($galleries as $gallery)
        <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
          <div class="single_gallery">
            <div class="card single_gallery_card">
              <div class="single_gallery_card_image">
                <img
                  src="{{asset('uploads/files/photos/')}}/{{$gallery->photos->first()->image}}"
                  class="card-img-top"
                  alt="gallery" style="height: 170px; width:250px"
                />
                <div
                  class="single_gallery_card_image_overlay d-flex align-items-center justify-content-center"
                >
                  @foreach ($gallery->photos as $photo)
                  <a href="{{asset('uploads/files/photos/')}}/{{$photo->image}}"
                  data-lightbox="{{$gallery->news->title}}">
                  @if ($loop->first)
                    <i class="fas fa-search-plus"></i>
                  @endif 
                  </a> 
                  @endforeach
                </div>
              </div>

              <div class="single_gallery_card_body p-2">
                <h5
                  class="single_gallery_card_title"
                  data-toggle="tooltip"
                  data-placement="top"
                  title="{{$gallery->news->title}}"
                >
                  {{$gallery->news->title}}
                </h5>
              </div>
            </div>
          </div>
        </div>
        @endforeach

        <div class="col-12">
          <div class="mt-5 d-flex justify-content-center">
            {{ $galleries->links() }}
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection

@push('plugin-scripts')
{!! Html::script('public/js/frontend/lightbox.min.js') !!}
@endpush

@push('plugin-scripts')
{!! Html::script('public/js/frontend/gallery-page.js') !!}
@endpush