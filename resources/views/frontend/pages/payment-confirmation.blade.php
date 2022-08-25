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
                  <h2 class="header mb-0">পেমেন্ট কনফার্মেশন</h2>
                </div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item breadcrumb_item">
                      <a href="{{ route('frontend.index') }}">হোম</a>
                    </li>
                    <li class="breadcrumb-item breadcrumb_item active">
                      <a href="#">পেমেন্ট কনফার্মেশন</a>
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
                <form class="cmxform" id="frontedAdmitForm" method="post" action="{{ route('admission.form.registration') }}" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="first_name" value="{{ $first_name }}">
                  <input type="hidden" name="last_name" value="{{ $last_name }}">
                  <input type="hidden" name="email" value="{{ $email }}">
                  <input type="hidden" name="phone" value="{{ $phone }}">
                  <input type="hidden" name="exam_type" value="{{ $exam_type }}">
                  <input type="hidden" name="exam" value="{{ $exam }}">
                  <input type="hidden" name="subject_id[]" value="{{ implode(",",$subject_id) }}">
                  <input type="hidden" name="course_fee" value="{{ $course_fee }}">
                  <input type="hidden" name="password" value="{{ $password }}">
                  <input type="hidden" name="date" value="{{ date('d-m-Y') }}">
                  {{-- <h2 class="header">{{ $course_name }}</h2> --}}
                  <h2 class="sub_header mb-0">{{ $first_name }} {{ $last_name }}</h2>
                  <div class="my-4">
                  <h3 class="title">{{ $course_name }}</h3>
                  <ul class="list">
                    @foreach($subject_name as $key=>$name)
                      <li class="list_item">{{ ++$key }}. {{ $name }}</li>
                    @endforeach
                  </ul>
                </div>
                  <div class="paragraph my-4">সর্বমোট : {{ $course_fee }} টাকা</div>
                  <div class="action">
                     @php
                      $amount=$course_fee;
                    @endphp
                    <a type="button" class="btn  btn_primary_cancel" href="{{ URL::previous() }}">
                      <span>বাতিল</span>
                    </a>
                    
                    @if($amount>0) 
                        <button type="submit" class="btn btn_primary">
                      {{-- <span>প্রদান নিশ্চিত</span> --}}
                      <span>ক্রয় করুন</span>
                    </button>
                    @else
                        <button type="submit" class="btn btn_primary">
                      {{-- <span>প্রদান নিশ্চিত</span> --}}
                      <span>বিনামূল্যে ক্রয় করুন</span>
                    </button>
                    @endif
                    <!--<a type="button" class="btn  btn_primary_cancel" href="{{ URL::previous() }}">-->
                    <!--  <span>বাতিল</span>-->
                    <!--</a>-->
                    <!--<button type="submit" class="btn btn_primary">-->
                    <!--  {{-- <span>প্রদান নিশ্চিত</span> --}}-->
                    <!--  <span>বিনামূল্যে ক্রয় করুন</span>-->
                    <!--</button>-->
                  </div>
                </form>
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
    <script src="{{ asset('public/assets/js/validation/frontedAdmitForm-validation.js') }}"></script>
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