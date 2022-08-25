@extends('frontend.layout.master')

@section('content')
<main>
<!-- page title -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 10px;margin-bottom: 16px">
                <div class="card-header">{{ __('রিসেট পাসওয়ার্ড') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('frontend.forget-password.update') }}" id="resetForm">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ইমেইল') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('পাসওয়ার্ড') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small class="form-text text_muted text-justify text-danger">পাসওয়ার্ডটিতে অবশ্যই বড় হাতের অক্ষর, ছোট হাতের অক্ষর, সংখ্যা এবং একটি স্পেশাল ক্যারেক্টার
                          (!,@,#,$,%,^,&,*) সহ কমপক্ষে ৮ টি অক্ষর থাকতে হবে।</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('কনফার্ম পাসওয়ার্ড') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('রিসেট পাসওয়ার্ড') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection

@push('plugin-scripts')
  <!-- js -->
  <script src="{{ asset('public/assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endpush
@push('custom-scripts')    
  <!-- custom js -->
  <script src="{{ asset('public/assets/js/validation/resetForm-validation.js') }}"></script>
@endpush  