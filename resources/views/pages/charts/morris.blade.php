@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/morrisjs/morris.css') !!}
@endpush

@section('content')
<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Line chart</h4>
        <div id="morris-line-example"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Bar chart</h4>
        <div id="morris-bar-example"></div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Area chart</h4>
        <div id="morris-area-example"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Doughnut chart</h4>
        <div id="morris-donut-example"></div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/raphael/raphael.min.js') !!}
  {!! Html::script('/assets/plugins/morrisjs/morris.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/morris.js') !!}
@endpush