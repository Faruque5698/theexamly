@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/jsgrid/jsgrid.min.css') !!}
  {!! Html::style('/assets/plugins/jsgrid/jsgrid-theme.min.css') !!}
@endpush

@section('content')
<div class="row grid-margin">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic Table</h4>
        <p class="card-description">A basic example of js-grid</p>
        <div id="js-grid"></div>
      </div>
    </div>
  </div>
</div>
<div class="row grid-margin">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Static Table</h4>
        <p class="card-description">A static table without options</p>
        <div id="js-grid-static"></div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sortable table</h4>
        <p class="card-description">Perform sorting action</p>
        <div class="sort-panel d-flex align-items-ceter mb-4">
          <label class="d-flex justify-content-start mb-0"> Sorting Field: <select id="sortingField" class="form-control form-control-sm mr-2 ml-2">
              <option>Name</option>
              <option>Age</option>
              <option>Address</option>
              <option>Country</option>
              <option>Married</option>
            </select>
          </label>
          <button type="button" id="sort" class="btn btn-info btn-sm">Sort</button>
        </div>
        <div id="js-grid-sortable"></div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/jsgrid/jsgrid.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/js-grid.js') !!}
  {!! Html::script('/assets/js/db.js') !!}
@endpush