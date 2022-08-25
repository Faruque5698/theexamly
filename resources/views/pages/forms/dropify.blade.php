@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/dropify/css/dropify.min.css') !!}
@endpush

@section('content')
<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Your so fresh input file — Default version</h4>
        <input type="file" class="dropify" />
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">You can add a default value</h4>
        <input type="file" class="dropify" data-default-file="https://via.placeholder.com/261x162" />
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">You can set the height</h4>
        <input type="file" class="dropify" data-height="300" />
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">You can combine options</h4>
        <input type="file" class="dropify" data-height="300" data-default-file="https://via.placeholder.com/261x162" />
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">You can add a max file size</h4>
        <input type="file" class="dropify" data-max-file-size="30kb" />
      </div>
    </div>
  </div>
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">You can disable the input</h4>
        <input type="file" class="dropify" disabled="disabled" />
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/dropify/js/dropify.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dropify.js') !!}
@endpush