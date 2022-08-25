@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/light-gallery/lightgallery.css') !!}
@endpush

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="d-flex flex-column flex-md-row align-items-center">
      <h4 class="mb-md-0 mb-4">Design Board</h4>
      <div class="wrapper d-flex align-items-center">
        <div class="image-grouped ml-md-4">
          <img src="https://via.placeholder.com/40x40" alt="profile image">
          <img src="https://via.placeholder.com/40x40" alt="profile image">
          <img src="{{ url('assets/images/faces/face14.jpg') }}" alt="profile image">
        </div>
        <button type="button" class="btn private-btn btn-fw ml-4"><i class="mdi mdi-lock"></i>Private</button>
      </div>
      <div class="wrapper ml-md-auto d-flex flex-column flex-md-row kanban-toolbar ml-n2 ml-md-0 mt-4 mt-md-0">
        <div class="d-flex">
          <button type="button" class="btn btn-icons btn-light d-none d-lg-block">
            <i class="mdi mdi-magnify"></i>
          </button>
          <button type="button" class="btn btn-icons btn-light d-none d-lg-block">
            <i class="mdi mdi-filter-outline"></i>
          </button>
          <button type="button" class="btn btn-icons btn-light">
            <i class="mdi mdi-bell-outline"></i>
          </button>
          <button type="button" class="btn btn-primary">Boards</button>
        </div>
        <div class="d-flex mt-4 mt-md-0">
          <button type="button" class="btn btn-success">Create New</button>
        </div>
      </div>
    </div>
    <div class="board-wrapper pt-5">
      <div class="board-portlet">
        <h4 class="portlet-heading">Todo</h4>
        <p class="task-number">4 Tasks</p>
        <ul id="portlet-card-list-1" class="portlet-card-list">
          <li class="portlet-card">
            <div class="progress">
              <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="task-date">20 Feb 2019</p>
            <div class="action-dropdown dropdown">
              <button type="button" class="dropdown-toggle" id="portlet-action-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="portlet-action-dropdown">
                <a class="dropdown-item" href="#">Edit</a>
                <a class="dropdown-item" href="#">Delete</a>
              </div>
            </div>
            <h4 class="task-title">Server gateway</h4>
            <div class="image-grouped">
              <img src="https://via.placeholder.com/40x40" alt="profile image">
              <img src="https://via.placeholder.com/40x40" alt="profile image">
              <img src="{{ url('assets/images/faces/face14.jpg') }}" alt="profile image">
            </div>
            <div class="badge badge-inverse-success">important</div>
            <p class="due-date">Due 10 days</p>
          </li>
          <li class="portlet-card">
            <div class="progress">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 63%" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="task-date">20 Feb 2019</p>
            <div class="action-dropdown dropdown">
              <button type="button" class="dropdown-toggle" id="portlet-action-dropdown_2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="portlet-action-dropdown_2">
                <a class="dropdown-item" href="#">Edit</a>
                <a class="dropdown-item" href="#">Delete</a>
              </div>
            </div>
            <h4 class="task-title">Server gateway</h4>
          </li>
          <li class="portlet-card">
            <div class="progress">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 32%" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="task-date">24 Feb 2019</p>
            <div class="action-dropdown dropdown">
              <button type="button" class="dropdown-toggle" id="portlet-action-dropdown_3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="portlet-action-dropdown_3">
                <a class="dropdown-item" href="#">Edit</a>
                <a class="dropdown-item" href="#">Delete</a>
              </div>
            </div>
            <h4 class="task-title">Software update</h4>
          </li>
          <li class="portlet-card">
            <div class="progress">
              <div class="progress-bar bg-success" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="task-date">26 Feb 2019</p>
            <div class="action-dropdown dropdown">
              <button type="button" class="dropdown-toggle" id="portlet-action-dropdown_4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="portlet-action-dropdown_4">
                <a class="dropdown-item" href="#">Edit</a>
                <a class="dropdown-item" href="#">Delete</a>
              </div>
            </div>
            <h4 class="task-title">Network maintenance</h4>
          </li>
        </ul>
        <button type="button" class="add-portlet">+ add new card</button>
      </div>
      <div class="board-portlet">
        <h4 class="portlet-heading">In progress</h4>
        <p class="task-number">4 Tasks</p>
        <ul id="portlet-card-list-2" class="portlet-card-list">
          <li class="portlet-card">
            <div class="progress">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="task-date">18 Apr 2019</p>
            <div class="action-dropdown dropdown">
              <button type="button" class="dropdown-toggle" id="portlet-action-dropdown_8" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="portlet-action-dropdown_8">
                <a class="dropdown-item" href="#">Edit</a>
                <a class="dropdown-item" href="#">Delete</a>
              </div>
            </div>
            <h4 class="task-title">Attached Preview Icon</h4>
          </li>
          <li class="portlet-card">
            <div class="progress">
              <div class="progress-bar bg-success" role="progressbar" style="width: 24%" aria-valuenow="24" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="task-date">20 Feb 2019</p>
            <div class="action-dropdown dropdown">
              <button type="button" class="dropdown-toggle" id="portlet-action-dropdown-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="portlet-action-dropdown-6">
                <a class="dropdown-item" href="#">Edit</a>
                <a class="dropdown-item" href="#">Delete</a>
              </div>
            </div>
            <h4 class="task-title">UI Design Started</h4>
            <div class="image-grouped">
              <img src="https://via.placeholder.com/92x92" alt="profile image">
              <img src="https://via.placeholder.com/43x43" alt="profile image">
              <img src="https://via.placeholder.com/43x43" alt="profile image">
            </div>
            <div class="badge badge-inverse-success">important</div>
            <p class="due-date">Due 10 days</p>
          </li>
          <li class="portlet-card">
            <div class="progress">
              <div class="progress-bar bg-primary" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="task-date">13 Mar 2019</p>
            <div class="action-dropdown dropdown">
              <button type="button" class="dropdown-toggle" id="portlet-action-dropdown-7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="portlet-action-dropdown-7">
                <a class="dropdown-item" href="#">Edit</a>
                <a class="dropdown-item" href="#">Delete</a>
              </div>
            </div>
            <h4 class="task-title">New IOS Design</h4>
            <div class="badge badge-inverse-primary">important</div>
          </li>
        </ul>
        <button type="button" class="add-portlet">+ add new card</button>
      </div>
      <div class="board-portlet">
        <h4 class="portlet-heading">On Hold</h4>
        <p class="task-number">4 Tasks</p>
        <ul id="portlet-card-list-3" class="portlet-card-list">
          <li class="portlet-card">
            <div class="progress">
              <div class="progress-bar bg-success" role="progressbar" style="width: 63%" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="task-date">20 Feb 2019</p>
            <div class="action-dropdown dropdown">
              <button type="button" class="dropdown-toggle" id="portlet-action-dropdown_10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="portlet-action-dropdown_10">
                <a class="dropdown-item" href="#">Edit</a>
                <a class="dropdown-item" href="#">Delete</a>
              </div>
            </div>
            <h4 class="task-title">Retail Order</h4>
            <div class="image-grouped">
              <img src="https://via.placeholder.com/92x92" alt="profile image">
              <img src="https://via.placeholder.com/43x43" alt="profile image">
              <img src="https://via.placeholder.com/43x43" alt="profile image">
            </div>
            <div class="badge badge-inverse-warning">important</div>
            <p class="due-date">Due 10 days</p>
          </li>
          <li class="portlet-card">
            <div class="progress">
              <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <p class="task-date">12 Jan 2019</p>
            <div class="action-dropdown dropdown">
              <button type="button" class="dropdown-toggle" id="portlet-action-dropdown_9" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="portlet-action-dropdown_9">
                <a class="dropdown-item" href="#">Edit</a>
                <a class="dropdown-item" href="#">Delete</a>
              </div>
            </div>
            <h4 class="task-title">HTML/CSS templates</h4>
            <img class="portlet-image" src="https://via.placeholder.com/300x300" alt="">
            <div class="badge badge-inverse-warning">important</div>
            <p class="due-date">Due 10 days</p>
          </li>
        </ul>
        <button type="button" class="add-portlet">+ add new card</button>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/kanban.js') !!}
@endpush