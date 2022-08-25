@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div>
  <div class="row grid-margin">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Bootstrap Maxlength</h4>
          <div class="form-group row">
            <div class="col-lg-3">
              <label class="col-form-label">Default usage</label>
            </div>
            <div class="col-lg-8">
              <input class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig" type="text" placeholder="Type Something..">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-3">
              <label class="col-form-label">Few options</label>
            </div>
            <div class="col-lg-8">
              <input class="form-control" maxlength="20" name="defaultconfig-2" id="defaultconfig-2" type="text" placeholder="Type Something..">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-3">
              <label class="col-form-label">All the options</label>
            </div>
            <div class="col-lg-8">
              <input class="form-control" maxlength="10" name="defaultconfig-3" id="defaultconfig-3" type="text" placeholder="Type Something..">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-3">
              <label class="col-form-label">Text Area</label>
            </div>
            <div class="col-lg-8">
              <textarea id="maxlength-textarea" class="form-control" maxlength="100" rows="2" placeholder="This textarea has a limit of 100 chars."></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Basic form validation</h4>
          <form class="cmxform" id="commentForm" method="get" action="#">
            <fieldset>
              <div class="form-group">
                <label for="cname">Name (required, at least 2 characters)</label>
                <input id="cname" class="form-control" name="name" minlength="2" type="text" required>
              </div>
              <div class="form-group">
                <label for="cemail">E-Mail (required)</label>
                <input id="cemail" class="form-control" type="email" name="email" required>
              </div>
              <div class="form-group">
                <label for="curl">URL (optional)</label>
                <input id="curl" class="form-control" type="url" name="url">
              </div>
              <div class="form-group">
                <label for="ccomment">Your comment (required)</label>
                <textarea id="ccomment" class="form-control" name="comment" required></textarea>
              </div>
              <input class="btn btn-primary" type="submit" value="Submit">
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Complete form validation</h4>
          <form class="cmxform" id="signupForm" method="get" action="#">
            <fieldset>
              <div class="form-group">
                <label for="firstname">Firstname</label>
                <input id="firstname" class="form-control" name="firstname" type="text">
              </div>
              <div class="form-group">
                <label for="lastname">Lastname</label>
                <input id="lastname" class="form-control" name="lastname" type="text">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input id="username" class="form-control" name="username" type="text">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" name="password" type="password">
              </div>
              <div class="form-group">
                <label for="confirm_password">Confirm password</label>
                <input id="confirm_password" class="form-control" name="confirm_password" type="password">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" name="email" type="email">
              </div>
              <input class="btn btn-primary" type="submit" value="Submit">
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
  {!! Html::script('/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/form-validation.js') !!}
  {!! Html::script('/assets/js/bt-maxlength.js') !!}
@endpush