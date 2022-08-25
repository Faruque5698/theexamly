@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/owl-carousel-2/assets/owl.carousel.min.css') !!}
  {!! Html::style('/assets/plugins/owl-carousel-2/assets/owl.theme.default.min.css') !!}
@endpush

@section('content')
<div>
  <div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Basic carousel</h4>
          <div class="owl-carousel owl-theme full-width">
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Carousel with captions</h4>
          <div class="owl-carousel owl-theme full-width">
            <div class="item">
              <div class="card text-white">
                <img class="card-img" src="https://via.placeholder.com/506x316" alt="Card image">
                <div class="card-img-overlay d-flex">
                  <div class="mt-auto text-center w-100">
                    <h3>Third Slide Label</h3>
                    <h6 class="card-text mb-4 font-weight-normal">Nulla vitae elit libero, a pharetra augue mollis interdum.</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="card text-white">
                <img class="card-img" src="https://via.placeholder.com/506x316" alt="Card image">
                <div class="card-img-overlay d-flex">
                  <div class="mt-auto text-center w-100">
                    <h3>Third Slide Label</h3>
                    <h6 class="card-text mb-4 font-weight-normal">Nulla vitae elit libero, a pharetra augue mollis interdum.</h6>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="card text-white">
                <img class="card-img" src="https://via.placeholder.com/506x316" alt="Card image">
                <div class="card-img-overlay d-flex">
                  <div class="mt-auto text-center w-100">
                    <h3>Third Slide Label</h3>
                    <h6 class="card-text mb-4 font-weight-normal">Nulla vitae elit libero, a pharetra augue mollis interdum.</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Loop</h4>
          <div class="owl-carousel owl-theme loop">
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">non-Loop</h4>
          <div class="owl-carousel owl-theme nonloop">
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Lazy load</h4>
          <div class="owl-carousel owl-theme lazy-load">
            <img class="owl-lazy" src="https://via.placeholder.com/506x316" data-src="https://via.placeholder.com/506x316" data-src-retina="https://via.placeholder.com/506x316" alt="image"/>
            <img class="owl-lazy" src="https://via.placeholder.com/506x316" data-src="https://via.placeholder.com/506x316" data-src-retina="https://via.placeholder.com/506x316" alt="image"/>
            <img class="owl-lazy" src="https://via.placeholder.com/506x316" data-src="https://via.placeholder.com/506x316" alt="image"/>
            <img class="owl-lazy" src="https://via.placeholder.com/506x316" data-src="https://via.placeholder.com/506x316" alt="image"/>
            <img class="owl-lazy" src="https://via.placeholder.com/506x316" data-src="https://via.placeholder.com/506x316" alt="image"/>
            <img class="owl-lazy" src="https://via.placeholder.com/506x316" data-src="https://via.placeholder.com/506x316" alt="image"/>
            <img class="owl-lazy" src="https://via.placeholder.com/506x316" data-src="https://via.placeholder.com/506x316" alt="image"/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Right to left</h4>
          <div class="owl-carousel owl-theme rtl-carousel">
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
            <div class="item">
              <img src="https://via.placeholder.com/506x316" alt="image"/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Video</h4>
          <div class="owl-carousel owl-theme video-carousel">
              <div class="item-video"><a class="owl-video" href="https://www.youtube.com/watch?v=9JBNmGlEdLY"></a></div>
              <div class="item-video"><a class="owl-video" href="https://www.youtube.com/watch?v=Pq9yPrLWMyU"></a></div>
              <div class="item-video"><a class="owl-video" href="https://www.youtube.com/watch?v=yWd4mzGqQYo"></a></div>
              <div class="item-video"><a class="owl-video" href="https://www.youtube.com/watch?v=8Tc7PMuHTJQ"></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/owl-carousel-2/owl.carousel.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/owl-carousel.js') !!}
@endpush