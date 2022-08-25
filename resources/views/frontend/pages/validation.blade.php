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
                  <h2 class="header mb-0">ইমেইল কনফার্মেশন</h2>
                </div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item breadcrumb_item">
                      <a href="{{ route('frontend.index') }}">হোম</a>
                    </li>
                    <li class="breadcrumb-item breadcrumb_item active">
                      <a href="{{ route('user.login') }}">ইমেইল কনফার্মেশন</a>
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end page title -->
      <!-- confirmation -->
      <section class="my-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
              <div class="confirmation text-center">
                <h2 class="header mb-0">দি এক্সামলী পরিবারে</h2>
                <h2 class="header mb-0">আপনাকে স্বাগতম</h2>
                <div class="paragraph my-4">
                  আপনার অ্যাকাউন্ট ভেরিফিকেশনের জন্য একটি কনফার্মেশন ইমেইল
                  পাঠানো হয়েছে । ( অনুগ্রহ করে ইমেইল থেকে ইনবক্স বা স্প্যাম চেক
                  করুন )
                </div>
                <h5 class="sub_header mb-0">যেকোনো প্রয়োজনে ইমেইল করুন</h5>
                <p class="paragraph mb-0">info@theexamly.com</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  @endsection

@push('plugin-scripts')
  <!-- js -->
  <script src="{{ asset('public/assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
@endpush

@push('custom-scripts')    
  <!-- custom js -->
  <script src="{{ asset('public/assets/js/validation/loginForm-validation.js') }}"></script>
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
  // redirect to google after 11 seconds
  <script type="text/javascript">
    window.setTimeout(function() {
        window.location.href = '/';
    }, 11000);
  </script>
@endpush