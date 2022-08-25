@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/jvectormap/jquery-jvectormap.css') !!}
@endpush

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Jvectormap</h4>
        <p class="card-description">Simple world map using jvectormap plugin</p>
        <div id="vmap" class="vector-map" style="width: 100%; height:500px"></div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/jvectormap/jquery-jvectormap.min.js') !!}
  {!! Html::script('/assets/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/maps.js') !!}
@endpush