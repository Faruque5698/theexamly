@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/nouislider/nouislider.min.css') !!}
  {!! Html::style('/assets/plugins/ion-rangeslider/ion.rangeSlider.css') !!}
@endpush

@section('content')
<div>
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Horizontal slider</h4>
          <p class="card-description">noUiSlider is a range slider without bloat. It offers a ton off features, and it is as small, lightweight and minimal as possible</p>
          <div class="template-demo">
            <div id="ul-slider-1" class="ul-slider slider-primary"></div>
            <div id="ul-slider-2" class="ul-slider slider-danger"></div>
            <div id="ul-slider-3" class="ul-slider slider-warning"></div>
            <div id="ul-slider-4" class="ul-slider slider-info"></div>
            <div id="ul-slider-5" class="ul-slider slider-success"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Vertical slider</h4>
          <p class="card-description">The orientation setting can be used to set the slider to <code>"vertical"</code> or <code>"horizontal"</code></p>
          <div class="template-demo d-flex justify-content-center">
            <div id="ul-slider-6" class="ul-slider slider-primary"></div>
            <div id="ul-slider-7" class="ul-slider slider-danger"></div>
            <div id="ul-slider-8" class="ul-slider slider-warning"></div>
            <div id="ul-slider-9" class="ul-slider slider-info"></div>
            <div id="ul-slider-10" class="ul-slider slider-success"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Values range</h4>
          <p class="card-description">noUiSlider will keep your values within the slider range, which saves you a bunch of validation.</p>
          <div class="template-demo">
            <div id="value-range" class="ul-slider slider-success"></div>
            <p class="mt-3">Value: <span id="huge-value"></span></p>
          </div>
        </div>
        <div class="card-body">
          <h4 class="card-title">Slider handles</h4>
          <div class="template-demo">
            <div id="skipstep" class="ul-slider slider-success"></div>
            <div class="d-flex justify-content-between">
              <p class="mt-3">Value: <span id="skip-value-lower"></span></p>
              <p class="mt-3">Value: <span id="skip-value-upper"></span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Connected Handles</h4>
          <p class="card-description">The connect setting can be used to control the bar between the handles, or the edges of the slider</p>
          <div class="template-demo">
            <div id="skipstep-connect" class="ul-slider slider-primary"></div>
            <div class="d-flex justify-content-between">
              <p class="mt-3">Value: <span id="skip-value-lower-2"></span></p>
              <p class="mt-3">Value: <span id="skip-value-upper-2"></span></p>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h4 class="card-title">Connected Handles Variation</h4>
          <div class="template-demo">
            <div id="skipstep-connect-3" class="ul-slider slider-danger"></div>
            <div class="d-flex justify-content-between">
              <p class="mt-3">Value: <span id="skip-value-lower-3"></span></p>
              <p class="mt-3">Value: <span id="skip-value-upper-3"></span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 grid-margin">
      <div class="card">
        <div class="row">
          <div class="col-md-12">
            <div class="card-body">
              <h4 class="card-title">Slider with tooltip</h4>
              <p class="card-description">noUiSlider can provide a basic tooltip without using its events system. Set the tooltips option to <code>true</code> to enable.</p>
              <div class="mt-5 pt-4 w-75 mx-auto">
                <div id="soft-limit" class="ul-slider slider-primary mb-5"></div>
              </div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Color Variations</h4>
              <p class="card-description">Tooltip slider with different color options, use class <code>slider-*</code> to quickly create a styled slider. Uses native boostrap colors scheme classes</p>
              <div class="mt-5 pt-4 w-75 mx-auto">
                <div id="soft-limit-2" class="ul-slider slider-success mb-5 mt-5"></div>
              </div>
              <div class="mt-5 pt-4 w-75 mx-auto pt-5">
                <div id="soft-limit-3" class="ul-slider slider-danger mb-5 mt-5"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Ion Range silders</h4>
          <div class="template-demo">
            <div class="slider-wrap">
              <p class="card-description">Start without params</p>
              <input type="text" id="range_01" name="range_01" value="" />
            </div>
            <div class="slider-wrap">
              <p class="card-description">Set min value, max value and start point</p>
              <input type="text" id="range_02" name="range_02" value="" />
            </div>
            <div class="slider-wrap">
              <p class="card-description">Set type to double and specify range, also showing grid and adding prefix "$"</p>
              <input type="text" id="range_03" name="range_03" value="" />
            </div>
            <div class="slider-wrap">
              <p class="card-description">Connecting from and two values</p>
              <input type="text" id="range_04" name="range_04" value="" />
            </div>
            <div class="slider-wrap">
              <p class="card-description">Disable visual details</p>
              <input type="text" id="range_05" name="range_05" value="" />
            </div>
            <div class="slider-wrap">
              <p class="card-description">Disable part of visual details</p>
              <input type="text" id="range_06" name="range_06" value="" />
            </div>
            <div class="slider-wrap">
              <p class="card-description">Using prefixes</p>
              <input type="text" id="range_07" name="range_07" value="" />
            </div>
            <div class="slider-wrap">
              <p class="card-description">Using postfixes</p>
              <input type="text" id="range_08" name="range_08" value="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Advanced sliders</h4>
          <div class="template-demo">
            <div class="slider-wrap">
              <p class="card-description">Grid will set up automatically, just set grid to true:</p>
              <input type="text" id="range_09" name="range_09" value="" />
            </div>
            <div class="slider-wrap">
              <p class="card-description">Want more? Use grid_num:</p>
              <input type="text" id="range_10" name="range_10" value="" />
            </div>
            <div class="slider-wrap">
              <p class="card-description">Have predifined step? You can snap grid to it:</p>
              <input type="text" id="range_11" name="range_11" value="" />
            </div>
            <div class="slider-wrap">
              <p class="card-description">Even if you have a very strange step!</p>
              <input type="text" id="range_12" name="range_12" value="" />
            </div>
            <div class="slider-wrap">
              <p class="card-description">Lock handle</p>
              <input type="text" id="range_13" name="range_13" value="" />
            </div>
            <div class="slider-wrap">
              <p class="card-description">Limit movement</p>
              <input type="text" id="range_15" name="range_15" value="" />
            </div>
            <div class="slider-wrap">
              <p class="card-description">Advanced limit example</p>
              <input type="text" id="range_16" name="range_16" value="" />
            </div>
            <div class="slider-wrap">
              <p class="card-description">Disable slider</p>
              <input type="text" id="range_17" name="range_17" value="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/nouislider/nouislider.min.js') !!}
  {!! Html::script('/assets/plugins/ion-rangeslider/ion.rangeSlider.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/no-ui-slider.js') !!}
  {!! Html::script('/assets/js/ion-range-slider.js') !!}
@endpush