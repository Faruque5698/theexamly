@extends('layout.master-mini')
@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center auth multi-step-login">
  <div class="row w-100">
    <div class="col-md-5 mx-auto py-5">
      <h4 class="text-center">Create your account</h4>
      <form class="step-form" id="msform">
        <!-- progressbar -->
        <ul class="step-progress" id="progressbar">
          <li class="active">Login Details</li>
          <li>User Profile</li>
          <li>Finish</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
          <div class="form-group">
            <input class="form-control" type="text" name="username" placeholder="Username" />
          </div>
          <div class="form-group">
            <input class="form-control" type="password" name="pass" placeholder="Password" />
          </div>
          <div class="form-group">
            <input class="form-control" type="password" name="cpass" placeholder="Confirm Password" />
          </div>
          <button class="btn btn-primary next action-button float-left" type="button" name="next" value="Next" />Next</button>
        </fieldset>
        <fieldset>
          <div class="row">
            <div class="form-group col-md-6">
              <input class="form-control" type="text" name="FirstName" placeholder="First Name" />
            </div>
            <div class="form-group col-md-6">
              <input class="form-control" type="text" name="Last Name" placeholder="Last Name" />
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <input class="form-control" type="email" name="email" placeholder="Email" />
            </div>
            <div class="form-group col-md-6">
              <input class="form-control" type="text" name="Country" placeholder="Country" />
            </div>
          </div>
          <div class="form-group">
            <input class="form-control" type="number" name="Number" placeholder="Number" />
          </div>
          <button class="btn btn-primary next action-button float-left" type="button" name="next" value="Next" />Next</button>
        </fieldset>
        <fieldset class="text-center">
          <p class="font-weight-bold">Created sucessfully</p>
          <i class="mdi mdi-shield-check text-warning icon-lg"></i>
          <h4 class="font-weight-bold">Welcome justdo</h4>
          <p class="mb-0 text-muted">You’ve successfully created a account for this user.</p>
        </fieldset>
      </form>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/jquery.easing/jquery.easing.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/login.js') !!}
@endpush