@extends('frontend.layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
@endpush

@section('content')

<section class="page_title">
    <div class="page_title_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_overlay_content text-center">
                        <h2>Admission</h2>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Home</a></li>
                            <li>
                                <span><i class="fas fa-angle-double-right"></i></span>
                            </li>
                            <li>
                                <a class="active" href="{{ route('frontend.showAdmissionForm') }}">Online Admission</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="event_page">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                      <form class="cmxform" id="frontedAdmitForm" method="post" action="" enctype="multipart/form-data">
                          @csrf
                        <fieldset>
                          <div class="form-group">
                            <h4>Your Information Successfully Submited and on holded for Admin Approval. Please contact to office as soon as possible.</h4>
                          </div>
                        </fieldset>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
  {!! Html::script('/assets/js/toastDemo.js') !!}
<script type="text/javascript">
      $(document).ready(function () {
          @if (session('success'))
          showSuccessToast('{{ session("success") }}');
          @elseif(session('warning'))
          showWarningToast('{{ session("warning") }}');
          @elseif(session('danger'))
          showWarningToast('{{ session("danger") }}');
          @endif
      });
  </script>
  // redirect to google after 9 seconds
  <script type="text/javascript">
    window.setTimeout(function() {
        window.location.href = 'https://romenenglish.com/';
    }, 9000);
  </script>
@endpush
