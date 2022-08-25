@extends('frontend.layout.master')

@push('plugin-styles')
  {!! Html::style('public/css/loader.css') !!}
  {!! Html::style('/assets/plugins/choices/public/assets/styles/choices.min.css') !!}
  {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
  {!! Html::style('/css/loader.css') !!}
@endpush
<style type="text/css">
  .codeply .dropdown{
      margin-top: 30%;
      transform-style: preserve-3d;
      transform: translate3d(0,0,10px) !important;
  }
 .codeply .dropdown a{
      width: 100% !important;
  }
 .codeply .dropdown-item{
      color: black;
  }
 .codeply .dropdown-menu{
      position: relative !important;
      transform: translate3d(0,0,10px) !important;
  }

 .codeply .container {
    width: 150px !important;
    height: 150px;
    float: left;
    margin: 3% 2.25% 0 2.25%;
    transform-style: preserve-3d;
  }

  #main {
    transform-style: preserve-3d;
  }

 .codeply .card {
    width: 100%;
    height: 100%;
    position: absolute;
    transition: transform 0.8s;
    transform-style: preserve-3d;
    transform-origin: right center;
  }

 .codeply .card.flipped {
    transform: translateX(-100%) rotateY(-180deg);
  }
 .codeply .card:not(.flipped) .dropdown.show {
    /* hide the dd when card is not flipped */
    display: none !important;
  }

 .codeply .card > div {
    height: 100%;
    width: 100%;
    color: white;
    text-align: center;
    font-weight: bold;
    position: absolute;
    backface-visibility: hidden;
    cursor: pointer;
    transform-style: preserve-3d;
  }

 .codeply .card .front {
    background: red;
    display: flex;
    justify-content: center;
    align-items: center;
  }

 .codeply .card .back {
    background: blue;
    transform: rotateY(180deg);
  }

 .codeply .test {
    position: relative !important;
    transform-style: preserve-3d;
  }
</style>
@section('content')
<!-- page title -->
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
<!-- events -->

<section class="event_page">
  <div class="container">
    <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                      <div class="ajax_loader">
                        <img src="{{ url('assets/images/loading.gif') }}" class="img-responsive" />
                      </div>
                      <h4 class="card-title text-center">Choose Exam Category</h4>
                      <form class="cmxform" id="frontedAdmitForm" method="post" action="{{ route('admission.form.confirm') }}" enctype="multipart/form-data">
                          @csrf
                        <fieldset>
                          <div id="main" class="codeply" >
                              <br>
                               @foreach($examCategory as $category)
                              <section class="container">
                                 
                                  <div class="card">
                                      <div class="front">
                                        
                                          <p> {{ $category->name }}</p>

                                      </div>
                                      <div class="back">
                                          <div class="test">
                                              <div class="dropdown">
                                                  <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Select
                                                    </a>
                                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">

                                                    @foreach ($course as $key=>$group)
                                                      @if($category->id==$group->course_category_id)
                                                        <a class="dropdown-item" value="{{ $group->id }}"><span>{{ $group->full_name }}</span></a>
                                                      @endif 
                                                      @endforeach
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </section>
                              @endforeach
                          </div>
                        </fieldset>
                     {{--    <div class="container">
                          <div class="row">
                            <div class="col-12 text-center">
                                  <input class="btn btn-primary" id="submit" type="submit" value="Payment & Submit">
                          <a class="btn btn-danger" href="{{ route('frontend.index') }}">Cancel</a>

                            </div>
                          </div>
                        </div> --}}
                        
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>
@endsection
{{-- @push('custom-scripts')
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
@endpush --}}
@push('plugin-scripts')
{!! Html::script('/assets/plugins/Bootstrap-4-Multi-Select/dist/js/BsMultiSelect.js') !!}
@endpush
@push('plugin-scripts')
  {!! Html::script('/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
  {!! Html::script('/assets/plugins/choices/public/assets/scripts/choices.min.js') !!}
  {!! Html::script('/assets/js/validation/frontedAdmitForm-validation.js') !!}
  {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
  {!! Html::script('/assets/js/toastDemo.js') !!}
  <script type="text/javascript">
    $(document).ready(function() {
        $('.container').hover(function() {
            if (!$(this).find('.card').hasClass('flipped')) {
                $(this).find('.card').toggleClass('flipped')
            }
            $(this).find('.card').addClass('hovered');
        }, function() {
            var val = $(this).find('.card');
            $(this).find('.card').removeClass('hovered');
            setTimeout(function() {
                if (!val.hasClass('hovered')) {
                    val.removeClass('flipped')
                }
            }, 800);
        });

    });
  </script>
@endpush
