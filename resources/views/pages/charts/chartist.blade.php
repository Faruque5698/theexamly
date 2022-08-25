@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/chartist/chartist.min.css') !!}
@endpush

@section('content')
<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Simple Line chart</h4>
        <div class="ct-chart ct-perfect-fourth" id="ct-chart-line"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Line scatterer</h4>
        <div id="rickshaw-time-scale"></div>
        <div class="ct-chart ct-perfect-fourth" id="ct-chart-line-scatterer"></div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Stacked bar chart</h4>
        <div class="ct-chart ct-perfect-fourth" id="ct-chart-stacked-bar"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Horizontal bar chart</h4>
        <div class="ct-chart ct-perfect-fourth" id="ct-chart-horizontal-bar"></div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Pie chart</h4>
        <div class="ct-chart ct-perfect-fourth" id="ct-chart-pie"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Donut</h4>
        <div class="ct-chart ct-perfect-fourth" id="ct-chart-donut"></div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartist/chartist.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/chartist.js') !!}
@endpush