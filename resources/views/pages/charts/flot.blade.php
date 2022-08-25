@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sample Chart</h4>
        <div id="chartLegend" class="flot-chart-legend"></div>
        <div id="curved-line-chart" class="float-chart mt-5"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Pie chart</h4>
        <div class="float-chart-container">
          <div id="pie-chart" class="float-chart"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Line Chart</h4>
        <div class="float-chart-container">
          <div id="line-chart" class="float-chart"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Bar Chart</h4>
        <div class="float-chart-container">
          <div id="column-chart" class="float-chart"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Stacked Bar Chart</h4>
        <div class="float-chart-container">
          <div id="stacked-bar-chart" class="float-chart"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Real-time Chart</h4>
        <div class="float-chart-container">
          <div id="realtime-chart" class="float-chart"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Area Chart</h4>
        <div class="float-chart-container">
          <div id="area-chart" class="float-chart"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/flot/dist/es5/jquery.flot.js') !!}
  {!! Html::script('/assets/plugins/flot/source/jquery.flot.resize.js') !!}
  {!! Html::script('/assets/plugins/flot/source/jquery.flot.categories.js') !!}
  {!! Html::script('/assets/plugins/flot/source/jquery.flot.fillbetween.js') !!}
  {!! Html::script('/assets/plugins/flot/source/jquery.flot.pie.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/flot-chart.js') !!}
@endpush