@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sample</h4>
        <div class="mb-4" id="g1"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sample</h4>
        <div class="container text-center">
          <div id="g2" class="gauge"></div>
          <a href="#" class="btn btn-primary" id="g2_refresh">Random Refresh</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sample</h4>
        <div class="row">
          <div class="box col-lg-3">
            <div id="g3" class="gauge"></div>
          </div>
          <div class="box col-lg-3">
            <div id="g4" class="gauge"></div>
          </div>
          <div class="box col-lg-3">
            <div id="g5" class="gauge"></div>
          </div>
          <div class="box col-lg-3">
            <div id="g6" class="gauge"></div>
          </div>
        </div>
        <div class="row text-center d-flex justify-content-center">
          <button type="button" class="btn btn-primary mt-4" id="gauge_refresh">Refresh Gauges</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sample</h4>
        <div class="row">
          <div class="box col-lg-3">
            <div id="g7" class="gauge"></div>
          </div>
          <div class="box col-lg-3">
            <div id="g8" class="gauge"></div>
          </div>
          <div class="box col-lg-3">
            <div id="g9" class="gauge"></div>
          </div>
          <div class="box col-lg-3">
            <div id="g10" class="gauge"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/raphael/raphael.min.js') !!}
  {!! Html::script('/assets/plugins/justgage/justgage.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/justgage.js') !!}
@endpush