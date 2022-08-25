@extends('layout.master')

@section('content')

<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="row">
        <div class="col-md-4 col-sm-6 d-flex justify-content-center border-right">
          <div class="card-body">
            <div class="wrapper text-center">
              <h4 class="card-title">Alerts Popups</h4>
              <p class="card-description">A basic message</p>
              <button class="btn btn-outline-success" onclick="showSwal('basic')">Click here!</button>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 d-flex justify-content-center border-right">
          <div class="card-body">
            <div class="wrapper text-center">
              <h4 class="card-title">Alerts Popups</h4>
              <p class="card-description">A title with a text under</p>
              <button class="btn btn-outline-success" onclick="showSwal('title-and-text')">Click here!</button>
            </div>
          </div>  
        </div>
        <div class="col-md-4 col-sm-6 d-flex justify-content-center">
          <div class="card-body">
            <div class="wrapper text-center">
              <h4 class="card-title">Alerts Popups</h4>
              <p class="card-description">A success message!</p>
              <button class="btn btn-outline-success" onclick="showSwal('success-message')">Click here!</button>
            </div>
          </div>  
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="row">
        <div class="col-md-4 col-sm-6 d-flex justify-content-center border-right">
          <div class="card-body">
            <div class="wrapper text-center">
              <h4 class="card-title">Alerts Popups</h4>
              <p class="card-description">A success message!</p>
              <button class="btn btn-outline-success" onclick="showSwal('custom-html')">Click here!</button>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 d-flex justify-content-center border-right">
          <div class="card-body">
            <div class="wrapper text-center">
              <h4 class="card-title">Alerts Popups</h4>
              <p class="card-description">A success message!</p>
              <button class="btn btn-outline-success" onclick="showSwal('warning-message-and-cancel')">Click here!</button>
            </div>
          </div>  
        </div>
        <div class="col-md-4 col-sm-6 d-flex justify-content-center">
          <div class="card-body">
            <div class="wrapper text-center">
              <h4 class="card-title">Alerts Popups</h4>
              <p class="card-description">A message with auto close timer</p>
              <button class="btn btn-outline-success" onclick="showSwal('auto-close')">Click here!</button>
            </div>
          </div>  
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-12 text-center">
            <h4 class="card-title">Avgrund Popup</h4>
            <p class="card-description">Avgrund simple popup</p>
            <a href="#" id="show" class="btn btn-outline-danger">Click here!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/sweetalert/sweetalert.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-avgrund/jquery.avgrund.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/alerts.js') !!}
  {!! Html::script('/assets/js/avgrund.js') !!}
@endpush