@extends('layout.master')

@section('content')
<div>
  <div class="row">
    <div class="col-lg-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Plotted Cities</h4>
          <div class="container">
            <div class="plotted-cities">
              <div class="map"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Example 1</h4>
          <div class="container">
            <div class="mapcontainer mapeal-example-2">
              <div class="map">
                <span>Alternative content for the map</span>
              </div>
              <div class="myLegend">
                <span>Alternative content for the legend</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Example 2</h4>
          <div class="container">
            <div class="mapcontainer mapeal-example-3 bg-blue">
              <div class="map">
                <span>Alternative content for the map</span>
              </div>
              <div>
                <div class="population myLegend">
                  <span>Alternative content for the legend</span>
                </div>
              </div>
                  <span>Alternative content for the legend</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/raphael/raphael.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-mapael/jquery.mapael.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-mapael/maps/france_departments.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-mapael/maps/usa_states.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-mapael/maps/world_countries.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/mapeal.js') !!}
  {!! Html::script('/assets/js/mapeal_example_2.js') !!}
  {!! Html::script('/assets/js/mapeal_example_3.js') !!}
@endpush