@extends('frontend.layout.master')

@section('content')
  <main>
    <!-- page title -->
    <section class="page_title">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div
              class="page_title_container d-flex flex-column align-items-center justify-content-center"
            >
              <div class="page_title_heading">
                <h2 class="header mb-0">লগ-ইন</h2>
              </div>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item breadcrumb_item">
                    <a href="{{ route('frontend.index') }}">হোম</a>
                  </li>
                  <li class="breadcrumb-item breadcrumb_item active">
                    <a href="{{ route('user.login') }}">লগ-ইন</a>
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end page title -->
    <!-- page title -->
    <section class="register">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card" style="margin-top: 16px;margin-bottom: 16px">
                        <div class="card-header">{{ __('রিসেট পাসওয়ার্ড') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ইমেইল') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary"> 
                                            {{-- {{ __('Send Password Reset Link') }} --}}
                                            {{ __('সেন্ড করুন') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </main>
@endsection

