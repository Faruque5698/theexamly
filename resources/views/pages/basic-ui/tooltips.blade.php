@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic tooltip</h4>
        <p class="card-description">Basic tooltip demo that appears on hover</p>
        <p>Hover the below button for interactive demo</p>
        <button class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Basic tooltip">Hover me</button>
      </div>
      <div class="card-body">
        <h4 class="card-title">Tooltip positions</h4>
        <p class="card-description">Add attribute <code>data-placement={position}</code> to the element</p>
        <div class="tooltip-static-demo">
          <div class="tooltip bs-tooltip-top bs-tooltip-top-demo" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner">
              Top Tooltip
            </div>
          </div>
          <div class="tooltip bs-tooltip-right bs-tooltip-right-demo" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner">
              Right Tooltip
            </div>
          </div>
          <div class="tooltip bs-tooltip-bottom bs-tooltip-bottom-demo" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner">
              Bottom Tooltip
            </div>
          </div>
          <div class="tooltip bs-tooltip-left bs-tooltip-left-demo" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner">
              Left Tooltip
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <h4 class="card-title">Tooltip colors</h4>
        <p class="card-description">Add attribute <code>data-custom-class="tooltip-{color}"</code> to the element</p>
        <div class="tooltip-static-demo">
          <div class="tooltip bs-tooltip-bottom bs-tooltip-bottom-demo tooltip-success" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner">
              Success
            </div>
          </div>
          <div class="tooltip bs-tooltip-bottom bs-tooltip-bottom-demo tooltip-info" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner">
              Info
            </div>
          </div>
          <div class="tooltip bs-tooltip-bottom bs-tooltip-bottom-demo tooltip-warning" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner">
              Warning
            </div>
          </div>
          <div class="tooltip bs-tooltip-bottom bs-tooltip-bottom-demo tooltip-primary" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner">
              Primary
            </div>
          </div>
          <div class="tooltip bs-tooltip-bottom bs-tooltip-bottom-demo tooltip-danger" role="tooltip">
            <div class="arrow"></div>
            <div class="tooltip-inner">
              Danger
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic popover</h4>
        <p class="card-description">Basic popover demo that appears on click</p>
        <p>Click the below button for interactive demo</p>
        <button type="button" class="btn btn-primary" data-toggle="popover" title="Popover title" data-content="Sed posuere consectetur est at lobortis. Aenean eu leo quam.">Click me</button>
      </div>
      <div class="card-body">
        <h4 class="card-title">Popover positions</h4>
        <p class="card-description">Add attribute <code>data-placement="{position}"</code> to the element</p>
        <div class="popover-static-demo">
          <div class="popover bs-popover-top bs-popover-top-demo">
            <div class="arrow"></div>
            <h3 class="popover-header">Popover top</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="popover bs-popover-right bs-popover-right-demo">
            <div class="arrow"></div>
            <h3 class="popover-header">Popover right</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="popover bs-popover-bottom bs-popover-bottom-demo">
            <div class="arrow"></div>
            <h3 class="popover-header">Popover bottom</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="popover bs-popover-left bs-popover-left-demo">
            <div class="arrow"></div>
            <h3 class="popover-header">Popover left</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Popover Colors</h4>
        <p class="card-description">Add attribute <code>data-custom-class="popover-{color}"</code> to the element</p>
        <div class="popover-static-demo">
          <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-success">
            <div class="arrow"></div>
            <h3 class="popover-header">Success</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-warning">
            <div class="arrow"></div>
            <h3 class="popover-header">Warning</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-danger">
            <div class="arrow"></div>
            <h3 class="popover-header">Danger</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-info">
            <div class="arrow"></div>
            <h3 class="popover-header">Info</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="popover bs-popover-bottom bs-popover-bottom-demo popover-primary">
            <div class="arrow"></div>
            <h3 class="popover-header">Primary</h3>
            <div class="popover-body">
              <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam.</p>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('custom-scripts')
  {!! Html::script('/assets/js/popover.js') !!}
@endpush