@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/light-gallery/lightgallery.css') !!}
@endpush

@section('content')
<div class="row grid-margin">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">light Gallery</h4>
        <p class="card-text"> Click on any image to open in lightbox gallery </p>
        <div id="lightgallery" class="row lightGallery">
          <a href="https://via.placeholder.com/1280x768" class="image-tile"><img src="https://via.placeholder.com/300x300" alt="image small"></a>
          <a href="https://via.placeholder.com/1280x768" class="image-tile"><img src="https://via.placeholder.com/300x300" alt="image small"></a>
          <a href="https://via.placeholder.com/1280x768" class="image-tile"><img src="https://via.placeholder.com/300x300" alt="image small"></a>
          <a href="https://via.placeholder.com/1280x768" class="image-tile"><img src="https://via.placeholder.com/300x300" alt="image small"></a>
          <a href="https://via.placeholder.com/1280x768" class="image-tile"><img src="https://via.placeholder.com/300x300" alt="image small"></a>
          <a href="https://via.placeholder.com/1280x768" class="image-tile"><img src="https://via.placeholder.com/300x300" alt="image small"></a>
          <a href="https://via.placeholder.com/1280x768" class="image-tile"><img src="https://via.placeholder.com/300x300" alt="image small"></a>
          <a href="https://via.placeholder.com/1280x768" class="image-tile"><img src="https://via.placeholder.com/300x300" alt="image small"></a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row grid-margin">
  <div class="col-lg-12">
    <div class="card px-3">
      <div class="card-body">
        <h4 class="card-title">Without Thumbnails</h4>
        <div id="lightgallery-without-thumb" class="row lightGallery">
          <a href="https://via.placeholder.com/1280x768" class="image-tile"><img src="https://via.placeholder.com/300x300" alt="image small"></a>
          <a href="https://via.placeholder.com/1280x768" class="image-tile"><img src="https://via.placeholder.com/300x300" alt="image small"></a>
          <a href="https://via.placeholder.com/1280x768" class="image-tile"><img src="https://via.placeholder.com/300x300" alt="image small"></a>
          <a href="https://via.placeholder.com/1280x768" class="image-tile"><img src="https://via.placeholder.com/300x300" alt="image small"></a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="card px-3">
      <div class="card-body">
        <h4 class="card-title">Video Gallery</h4>
        <div id="video-gallery" class="row lightGallery">
          <a class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="https://www.youtube.com/watch?v=meBbDqAXago">
            <img src="https://via.placeholder.com/231x156" alt="image" />
            <div class="demo-gallery-poster">
              <img src="https://via.placeholder.com/60x60" alt="image">
            </div>
          </a>
          <a class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="https://www.youtube.com/watch?v=Pq9yPrLWMyU">
            <img src="https://via.placeholder.com/231x156" alt="image" />
            <div class="demo-gallery-poster">
              <img src="https://via.placeholder.com/60x60" alt="image">
            </div>
          </a>
          <a class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="https://vimeo.com/1084537">
            <img src="https://via.placeholder.com/231x156" alt="image" />
            <div class="demo-gallery-poster">
              <img src="https://via.placeholder.com/60x60" alt="image">
            </div>
          </a>
          <a class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="https://vimeo.com/35451452">
            <img src="https://via.placeholder.com/231x156" alt="image" />
            <div class="demo-gallery-poster">
              <img src="https://via.placeholder.com/60x60" alt="image">
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/light-gallery/lightgallery-all.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/light-gallery.js') !!}
@endpush