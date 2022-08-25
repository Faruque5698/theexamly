@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
@endpush

@section('content')
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Jquery-toast styles</h4>
        <p class="card-description mb-0"> Click on the below buttons for notifications in different styles. </p>
        <p class="card-description"> The <code>icon</code> property can be used to specify the predefined types of toasts - success, info, warning and danger </p>
        <div class="template-demo d-flex justify-content-between flex-wrap">
          <button type="button" class="btn btn-success btn-fw" onclick="showSuccessToast()">Success</button>
          <button type="button" class="btn btn-info btn-fw" onclick="showInfoToast()">Info</button>
          <button type="button" class="btn btn-warning btn-fw" onclick="showWarningToast()">Warning</button>
          <button type="button" class="btn btn-danger btn-fw" onclick="showDangerToast()">Danger</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Jquery-toast positions</h4>
        <p class="card-description"> The <code>position</code> property can be used to specify the predefined positions of toasts </p>
        <div class="template-demo d-flex justify-content-between flex-wrap">
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="showToastPosition('bottom-left')">Bottom-left</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="showToastPosition('bottom-right')">Bottom-right</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="showToastPosition('bottom-center')">Bottom-center</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="showToastPosition('top-left')">Top-left</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="showToastPosition('top-right')">Top-right</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="showToastPosition('top-center')">Top-center</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="showToastPosition('mid-center')">Mid-center</button>
          <button type="button" class="btn btn-outline-primary btn-sm" onclick="showToastInCustomPosition()">Custom</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Bootstrap alert</h4>
        <p class="car-description">Add class <code>.alert .alert-*</code></p>
        <div class="alert alert-success" role="alert"> You successfully read this important alert message. </div>
        <div class="alert alert-info" role="alert"> This alert needs your attention, but it's not that important. </div>
        <div class="alert alert-warning" role="alert"> Better check yourself, you're not looking too good. </div>
        <div class="alert alert-danger" role="alert"> Change a few things up and try submitting again. </div>
        <div class="alert alert-primary" role="alert"> This is a primary alert </div>
        <div class="alert alert-secondary" role="alert"> This alert is not so important. </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Custom alerts</h4>
        <p class="card-description"> Custom HTML inside alert </p>
        <div class="card card-inverse-secondary mb-5">
          <div class="card-body">
            <p class="mb-4"> Well done! You successfully read this important alert message. </p>
            <button class="btn btn-secondary">Ok</button>
            <button class="btn btn-light">Cancel</button>
          </div>
        </div>
        <div class="card card-inverse-info">
          <div class="card-body">
            <p class="mb-4"> Heads up! This alert needs your attention, but it's not super important. </p>
            <button class="btn btn-info">Ok</button>
            <button class="btn btn-light">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Bootstrap alerts in fill colors</h4>
        <p class="card-description"> Add class <code>.alert-fill-*</code> with <code>.alert</code>
        </p>
        <div class="alert alert-fill-primary" role="alert">
          <i class="mdi mdi-alert-circle"></i> There! This is a primary alert. </div>
        <div class="alert alert-fill-success" role="alert">
          <i class="mdi mdi-alert-circle"></i> Well done! You successfully read this important alert message. </div>
        <div class="alert alert-fill-info" role="alert">
          <i class="mdi mdi-alert-circle"></i> Heads up! This alert needs your attention, but it's not super important. </div>
        <div class="alert alert-fill-warning" role="alert">
          <i class="mdi mdi-alert-circle"></i> Warning! Better check yourself, you're not looking too good. </div>
        <div class="alert alert-fill-danger" role="alert">
          <i class="mdi mdi-alert-circle"></i> Oh snap! Change a few things up and try submitting again. </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Desktop notification</h4>
        <p class="card-description">Create simple desktop notifications</p>
        <form>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Write some title here" value="Sample title" required>
            <label class="mt-4" for="message">Message</label>
            <textarea placeholder="Write some message here" id="message" class="form-control" required>Sample content</textarea>
          </div>
          <button type="submit" class="btn btn-success"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Notify</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/toastDemo.js') !!}
  {!! Html::script('/assets/js/desktop-notification.js') !!}
@endpush