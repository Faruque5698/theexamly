@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-md-6 col-lg-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Basic Map</h6>
        <div class="map-container">
          <div id="map-with-marker" class="google-map"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Map With custom Markers</h6>
        <div class="map-container">
          <div id="cutom-marker" class="google-map"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Map without controls</h6>
        <div class="map-container">
          <div id="map-minimal" class="google-map no-controls"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Night Mode Map</h6>
        <div class="map-container">
          <div id="night-mode-map" class="google-map"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Propia Theme</h6>
        <div class="map-container">
          <div id="propia-map-theme" class="google-map"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Apple Map Theme</h6>
        <div class="map-container">
          <div id="apple-map-theme" class="google-map"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Captor Theme</h6>
        <div class="map-container">
          <div id="nature-map-theme" class="google-map"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Avocado World Theme</h6>
        <div class="map-container">
          <div id="avocado-map-theme" class="google-map"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Captor World Theme</h6>
        <div class="map-container">
          <div id="captor-map-theme" class="google-map"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('custom-scripts')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnT63XUjqjPgXZ0lFTU_pdpfUX7swzTTM&callback=initMap"></script>
  <!-- {!! Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyCnT63XUjqjPgXZ0lFTU_pdpfUX7swzTTM&callback=initMap') !!} -->
  {!! Html::script('/assets/js/google-maps.js') !!}
@endpush