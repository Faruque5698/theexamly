@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card px-3">
      <div class="card-body">
        <h4 class="card-title">Todo list</h4>
        <div class="list-wrapper pt-2">
          <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
            <li>
              <div class="form-check form-check-flat">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox">
                  Meeting with Urban Team
                </label>
              </div>
              <i class="remove ti-close"></i>
            </li>
            <li class="completed">
              <div class="form-check form-check-flat">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox" checked>
                  Duplicate a project for new customer
                </label>
              </div>
              <i class="remove ti-close"></i>
            </li>
            <li>
              <div class="form-check form-check-flat">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox">
                  Project meeting with CEO
                </label>
              </div>
              <i class="remove ti-close"></i>
            </li>
            <li class="completed">
              <div class="form-check form-check-flat">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox" checked>
                  Follow up of team zilla
                </label>
              </div>
              <i class="remove ti-close"></i>
            </li>
            <li>
              <div class="form-check form-check-flat">
                <label class="form-check-label">
                  <input class="checkbox" type="checkbox">
                  Level up for Antony
                </label>
              </div>
              <i class="remove ti-close"></i>
            </li>
          </ul>
        </div>
        <div class="add-items d-flex mb-0 mt-2">
          <input type="text" class="form-control todo-list-input"  placeholder="Add new task">
          <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="ti-location-arrow"></i></button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection