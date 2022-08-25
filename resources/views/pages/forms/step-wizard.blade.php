@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">jquery-steps wizard</h4>
          <form id="example-form" action="#">
            <div>
              <h3>Account</h3>
              <section>
                <h3>Account</h3>
                <div class="form-group">
                  <label>Email address</label>
                  <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" class="form-control" placeholder="Confirm password">
                </div>
              </section>
              <h3>Profile</h3>
              <section>
                <h3>Profile</h3>
                <div class="form-group">
                  <label>First name</label>
                  <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter first name">
                </div>
                <div class="form-group">
                  <label>Last name</label>
                  <input type="password" class="form-control" placeholder="Last name">
                </div>
                <div class="form-group">
                  <label>Profession</label>
                  <input type="password" class="form-control" placeholder="Profession">
                </div>
              </section>
              <h3>Comments</h3>
              <section>
                <h3>Comments</h3>
                <div class="form-group">
                  <label>Comments</label>
                  <textarea class="form-control" rows="3"></textarea>
                </div>
              </section>
              <h3>Finish</h3>
              <section>
                <h3>Finish</h3>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    I agree with the Terms and Conditions.
                  </label>
                </div>
              </section>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--vertical wizard-->
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">jquery-steps vertical wizard</h4>
          <form id="example-vertical-wizard" action="#">
            <div>
              <h3>Account</h3>
              <section>
                <h3>Account</h3>
                <div class="form-group">
                  <label for="userName">User name *</label>
                  <input id="userName" name="userName" type="text" class="required form-control">
                </div>
                <div class="form-group">
                  <label for="password">Password *</label>
                  <input id="password" name="password" type="password" class="required form-control">
                </div>
                <div class="form-group">
                  <label for="confirm">Confirm Password *</label>
                  <input id="confirm" name="confirm" type="password" class="required form-control">
                  <small>(*) Mandatory</small>
                </div>
              </section>
              <h3>Profile</h3>
              <section>
                <h3>Profile</h3>
                <div class="form-group">
                  <label for="name">First name *</label>
                  <input id="name" name="name" type="text" class="required form-control">
                </div>
                <div class="form-group">
                  <label for="surname">Last name *</label>
                  <input id="surname" name="surname" type="text" class="required form-control">
                </div>
                <div class="form-group">
                  <label for="email">Email *</label>
                  <input id="email" name="email" type="text" class="required email form-control">
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input id="address" name="address" type="text" class="form-control">
                  <small>(*) Mandatory</small>
                </div>
              </section>
              <h3>Finish</h3>
              <section>
                <h3>Finish</h3>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    I agree with the Terms and Conditions.
                  </label>
                </div>
              </section>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/jquery-steps/jquery.steps.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-validation/jquery.validate.min.js') !!}

@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/wizard.js') !!}
@endpush