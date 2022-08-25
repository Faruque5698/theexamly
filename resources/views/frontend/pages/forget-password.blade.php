@extends('frontend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
@endpush

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
                  <h2 class="header mb-0">Forget Password</h2>
                </div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item breadcrumb_item">
                      <a href="#">হোম</a>
                    </li>
                    <li class="breadcrumb-item breadcrumb_item active">
                      <a href="#">Forget Password</a>
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="svg_container">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path
              fill="#fff"
              fill-opacity="1"
              d="M0,128L60,138.7C120,149,240,171,360,160C480,149,600,107,720,112C840,117,960,171,1080,160C1200,149,1320,75,1380,37.3L1440,0L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"
            ></path>
          </svg>
        </div>
      </section>
      <!-- end page title -->
      <!-- register form -->
      <section class="register my-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
              <div class="register_box p-2 p-lg-5">
                <!-- Title Box -->
                <div class="heading text-center mb-5">
                  <h2 class="header">Forget Password</h2>
                </div>

                <!-- Login Form -->
                <div class="register_form">
                  <form class="pt-3" method="POST" action="{{ route('frontend.forget-password.check') }}" id="loginForm">
                    @csrf
                    <div class="row">
                      <!-- Form Group -->
                      <div class="form-group col-12">
                        <label>Email Address</label>
                        <input
                          class="form-control form_control"
                          type="email"
                          name="email"
                          value=""
                          placeholder="Email Address"
                          required=""
                        />
                      </div>

                      <div
                        class="form-group col-12 text-center"
                      >
                        <button type="submit" class="btn_primary">
                          <span>Submit </span>
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

@push('plugin-scripts')
  <!-- js -->
  <script src="{{ asset('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
@endpush

@push('custom-scripts')    
  <!-- custom js -->
  <script src="{{ asset('public/assets/js/toastDemo.js') }}"></script>
  <script type="text/javascript">
      $(document).ready(function () {
          @if (session('success'))
          showSuccessToast('{{ session("success") }}');
          @elseif(session('danger'))
          showDangerToast('{{ session("danger") }}');
          @elseif(session('warning'))
          showWarningToast('{{ session("warning") }}');
          @endif
      });
  </script>
@endpush