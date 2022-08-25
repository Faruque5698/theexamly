@section('title')
Login |
@endsection

@extends('backend.layout.master-mini')

@section('content')

<div class="content-wrapper d-flex align-items-stretch auth auth-img-bg"  style="background-color:white">
    <div class="row flex-grow">
        <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
                <div class="brand-logo form-inline">
                    <img class="shadow" src="{{ url('/uploads/english_logo.png') }}" alt="logo">&nbsp;&nbsp;<h4 class="form-inline"></h4>
                </div>
                <h4>Welcome!</h4>
                <h6 class="font-weight-light">Happy to see you!</h6>
                <form class="pt-3" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail">User-Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <span
                                    class="input-group-text bg-transparent border-right-0 @error('email') border-danger text-danger @enderror">
                                    <i
                                        class="mdi mdi-account-outline text-primary @error('email') border-danger text-danger @enderror"></i>
                                </span>
                            </div>
                            <input type="email"
                                class="form-control form-control-lg border-left-0 @error('email') border-danger @enderror"
                                name="email" value="{{ old('email') }}" id="" value="{{ old('email') }}" required
                                autocomplete="email" autofocus placeholder="User-Email">
                        </div>
                        @error('email')
                        <span class="text-small text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <span
                                    class="input-group-text bg-transparent border-right-0 @error('password') border-danger text-danger @enderror">
                                    <i
                                        class="mdi mdi-lock-outline text-primary @error('password') border-danger text-danger @enderror"></i>
                                </span>
                            </div>

                            <input type="password"
                                class="form-control form-control-lg border-left-0 @error('password') border-danger @enderror"
                                id="exampleInputPassword" name="password" required autocomplete="current-password"
                                placeholder="Password">

                        </div>

                        @error('password')
                        <span class="text-small text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <label class="form-check-label text-muted">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}><i class="input-helper"></i> Keep me signed
                                in </label>
                        </div>
                        <!--   <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>-->
                    </div>
                    <div class="my-3">
                        <button type="submit" class="btn btn-block btn-primary font-weight-medium auth-form-btn">
                            LOGIN
                        </button>
                    </div>
                    <!--
                        <div class="mb-2 d-flex">
                            <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
                                <i class="mdi mdi-facebook mr-2"></i>Facebook
                            </button>
                            <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
                                <i class="mdi mdi-google mr-2"></i>Google
                            </button>
                        </div>
                        <div class="text-center mt-4 font-weight-light"> Don't have an account? <a
                                href="register-2.html" class="text-primary">Create</a>
                        </div>
                    -->
                </form>
            </div>
        </div>
        <div class="col-lg-6 d-flex flex-row">
            <div class="slide-image"
                style="background-image: url('https://via.placeholder.com/705x615'); background-size: cover;">
                <p class="slide-content">স্বত্ব &copy; {{ now()->year }} <a href="https://theexamly.com/"
                        target="_blank"> - দি এক্সামলী</a> কর্তৃক সর্বস্বত্ব সংরক্ষিত ।</p>
            </div>
        </div>
    </div>
</div>

@endsection
