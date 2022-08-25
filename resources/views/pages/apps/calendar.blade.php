@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/fullcalendar/fullcalendar.min.css') !!}
@endpush


@section('content')
<div class="row">
  <div class="col-md-3">
    <div class="fc-external-events">
      <div class='fc-event'>
        <p>Deciphering Marketing Lingo For Small Business Owners</p>
        <p class="small-text"></p>
        <p class="text-muted mb-0">Georgia</p>
      </div>
      <div class='fc-event'>
        <p>Influencing The Influencer</p>
        <p class="small-text"></p>
        <p class="text-muted mb-0">Netherlands</p>
      </div>
      <div class='fc-event'>
        <p>Profiles Of The Powerful Advertising Exec Steve Grasse</p>
        <p class="small-text"></p>
        <p class="text-muted mb-0">Canada</p>
      </div>
    </div>
    <div class="mt-4">
      <p>Filter board</p>
      <div class="form-check form-check-primary">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input" checked> Project Board </label>
      </div>
      <div class="form-check form-check-danger">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input" checked> Kamban Board </label>
      </div>
      <div class="form-check form-check-info">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input" checked> Summary Board </label>
      </div>
      <div class="form-check form-check-success">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input" checked> Planner Board </label>
      </div>
    </div>
  </div>
  <div class="col-md-9">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Fullcalendar</h4>
        <div id="calendar" class="full-calendar"></div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
{!! Html::script('/assets/plugins/moment/moment.js') !!}
  {!! Html::script('/assets/plugins/fullcalendar/fullcalendar.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/calendar.js') !!}
@endpush