@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/jquery-bar-rating/dist/themes/css-stars.css') !!}
  {!! Html::style('/assets/plugins/light-gallery/lightgallery.css') !!}
@endpush

@section('content')
<div>
  <div class="row">
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
            <img src="https://via.placeholder.com/92x92" class="img-lg rounded" alt="profile image"/>
            <div class="ml-sm-3 ml-md-0 ml-xl-3 mt-2 mt-sm-0 mt-md-2 mt-xl-0">
              <h6 class="mb-0">Maria</h6>
              <p class="text-muted mb-1">maria@gmail.com</p>
              <p class="mb-0 text-success font-weight-bold">Designer</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
            <img src="https://via.placeholder.com/92x92" class="img-lg rounded" alt="profile image"/>
            <div class="ml-sm-3 ml-md-0 ml-xl-3 mt-2 mt-sm-0 mt-md-2 mt-xl-0">
              <h6 class="mb-0">Thomas Edison</h6>
              <p class="text-muted mb-1">thomas@gmail.com</p>
              <p class="mb-0 text-success font-weight-bold">Developer</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
            <img src="https://via.placeholder.com/92x92" class="img-lg rounded" alt="profile image"/>
            <div class="ml-sm-3 ml-md-0 ml-xl-3 mt-2 mt-sm-0 mt-md-2 mt-xl-0">
              <h6 class="mb-0">Edward</h6>
              <p class="text-muted mb-1">edward@gmail.com</p>
              <p class="mb-0 text-success font-weight-bold">Tester</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Todays Income</h4>
              <div class="d-flex justify-content-between">
                <p class="text-muted">Avg. Session</p>
                <p class="text-muted">max: 40</p>
              </div>
              <div class="progress progress-md">
                <div class="progress-bar bg-info w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Total Revenue</h4>                      
              <div class="d-flex justify-content-between">
                <p class="text-muted">Avg. Session</p>
                <p class="text-muted">max: 120</p>
              </div>
              <div class="progress progress-md">
                <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Pending Product</h4>
              <div class="d-flex justify-content-between">
                <p class="text-muted">Avg. Session</p>
                <p class="text-muted">max: 54</p>
              </div>
              <div class="progress progress-md">
                <div class="progress-bar bg-danger w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Sales</h4>
              <div class="d-flex justify-content-between">
                <p class="text-muted">Avg. Session</p>
                <p class="text-muted">max: 143</p>
              </div>
              <div class="progress progress-md">
                <div class="progress-bar bg-warning w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 grid-margin">
      <div class="card d-flex align-items-center">
        <div class="card-body">
          <div class="d-flex flex-row align-items-center">
            <i class="ti-facebook text-facebook icon-md"></i>
            <div class="ml-3">
              <h6 class="text-facebook">50k likes</h6>
              <p class="mt-2 text-muted card-text">You main list growing</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 grid-margin">
      <div class="card d-flex align-items-center">
        <div class="card-body">
          <div class="d-flex flex-row align-items-center">
            <i class="ti-youtube text-youtube icon-md"></i>
            <div class="ml-3">
              <h6 class="text-youtube">2.62k Subscribers</h6>
              <p class="mt-2 text-muted card-text">You main list growing</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 grid-margin">
      <div class="card d-flex align-items-center">
        <div class="card-body">
          <div class="d-flex flex-row align-items-center">
            <i class="ti-twitter-alt text-twitter icon-md"></i>
            <div class="ml-3">
              <h6 class="text-twitter">3k followers</h6>
              <p class="mt-2 text-muted card-text">You main list growing</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 grid-margin">
      <div class="card bg-facebook d-flex align-items-center">
        <div class="card-body">
          <div class="d-flex flex-row align-items-center">
            <i class="ti-facebook text-white icon-md"></i>
            <div class="ml-3">
              <h6 class="text-white">50k likes</h6>
              <p class="mt-2 text-white card-text">You main list growing</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 grid-margin">
      <div class="card bg-linkedin d-flex align-items-center">
        <div class="card-body">
          <div class="d-flex flex-row align-items-center">
            <i class="ti-linkedin text-white icon-md"></i>
            <div class="ml-3">
              <h6 class="text-white">5k connections</h6>
              <p class="mt-2 text-white card-text">You main list growing</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 grid-margin">
      <div class="card bg-twitter d-flex align-items-center">
        <div class="card-body">
          <div class="d-flex flex-row align-items-center">
            <i class="ti-twitter-alt text-white icon-md"></i>
            <div class="ml-3">
              <h6 class="text-white">3k followers</h6>
              <p class="mt-2 text-white card-text">You main list growing</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Todo</h4>
          <div class="list-wrapper">
            <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
              <li>
                <div class="form-check form-check-flat">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Meeting with Alisa
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li class="completed">
                <div class="form-check form-check-flat">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Call John
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li class="completed">
                <div class="form-check form-check-flat">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox" checked>
                    Prepare for presentation
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
              <li>
                <div class="form-check form-check-flat">
                  <label class="form-check-label">
                    <input class="checkbox" type="checkbox">
                    Pick up kids from school
                  </label>
                </div>
                <i class="remove ti-close"></i>
              </li>
            </ul>
          </div>
          <div class="add-items d-flex mb-0">
            <input type="text" class="form-control todo-list-input"  placeholder="Add new task">
            <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="ti-location-arrow"></i></button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Recommended</h4>
          <div class="d-flex align-items-center pb-3 border-bottom">
            <img class="img-sm rounded-circle" src="https://via.placeholder.com/43x43" alt="profile">
            <div class="ml-3">
              <h6 class="mb-1">Stella Davidson</h6>
              <small class="text-muted mb-0"><i class="ti-location-pin mr-1"></i>New York City, USA</small>
            </div>
            <i class="ti-check font-weight-bold ml-auto px-1 py-1 text-info mdi-24px"></i>
          </div>
          <div class="d-flex align-items-center py-3 border-bottom">
            <img class="img-sm rounded-circle" src="https://via.placeholder.com/43x43" alt="profile">
            <div class="ml-3">
              <h6 class="mb-1">Daniel Russel</h6>
              <small class="text-muted mb-0"><i class="ti-location-pin mr-1"></i>Florida, USA</small>
            </div>
            <i class="ti-plus font-weight-bold ml-auto px-1 py-1 text-success mdi-24px"></i>
          </div>
          <div class="d-flex align-items-center py-3 border-bottom">
            <img class="img-sm rounded-circle" src="https://via.placeholder.com/43x43" alt="profile">
            <div class="ml-3">
              <h6 class="mb-1">Bruno King</h6>
              <small class="text-muted mb-0"><i class="ti-location-pin mr-1"></i>Arkansas, USA</small>
            </div>
            <i class="ti-check font-weight-bold ml-auto px-1 py-1 text-info mdi-24px"></i>
          </div>
          <div class="d-flex align-items-center py-3 border-bottom">
            <img class="img-sm rounded-circle" src="https://via.placeholder.com/43x43" alt="profile">
            <div class="ml-3">
              <h6 class="mb-1">David Moore</h6>
              <small class="text-muted mb-0"><i class="ti-location-pin mr-1"></i>Arizon, USA</small>
            </div>
            <i class="ti-plus font-weight-bold ml-auto px-1 py-1 text-success mdi-24px"></i>
          </div>
          <div class="d-flex align-items-center pt-3">
            <img class="img-sm rounded-circle" src="https://via.placeholder.com/92x92" alt="profile">
            <div class="ml-3">
              <h6 class="mb-1">Rafell John</h6>
              <small class="text-muted mb-0"><i class="ti-location-pin mr-1"></i>Alaska, USA</small>
            </div>
            <i class="ti-plus font-weight-bold ml-auto px-1 py-1 text-success mdi-24px"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Updates</h4>
          <ul class="bullet-line-list">
            <li>
              <h6>User confirmation</h6>
              <p>Lorem Ipsum is simply dummy text of the printing </p>
              <p class="text-muted mb-4">
                <i class="ti-time"></i>
                7 months ago.
              </p>
            </li>
            <li>
              <h6>Continuous evaluation</h6>
              <p>Lorem Ipsum is simply dummy text of the printing </p>
              <p class="text-muted mb-4">
                <i class="ti-time"></i>
                7 months ago.
              </p>
            </li>
            <li>
              <h6>Promotion</h6>
              <p>Lorem Ipsum is simply dummy text of the printing </p>
              <p class="text-muted">
                <i class="ti-time"></i>
                7 months ago.
              </p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-5 grid-margin grid-margin-md-0 stretch-card">
      <div class="card">
        <div class="card-body text-center">
          <div>
            <img src="https://via.placeholder.com/43x43" class="img-lg rounded-circle mb-2" alt="profile image"/>
            <h4>Maria Johnson</h4>
            <p class="text-muted mb-0">Developer</p>
          </div>
          <p class="mt-2 card-text">
              Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
              Aenean commodo ligula eget dolor. Lorem
          </p>
          <button class="btn btn-info btn-sm mt-3 mb-4">Follow</button>
          <div class="border-top pt-3">
            <div class="row">
              <div class="col-4">
                <h6>5896</h6>
                <p>Post</p>
              </div>
              <div class="col-4">
                <h6>1596</h6>
                <p>Followers</p>
              </div>
              <div class="col-4">
                <h6>7896</h6>
                <p>Likes</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-7 grid-margin grid-margin-md-0 stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tickets</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th class="pt-1 pl-0">
                    Assigned
                  </th>
                  <th class="pt-1">
                    Product
                  </th>
                  <th class="pt-1">
                    Priority
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="py-1 pl-0">
                    <div class="d-flex align-items-center">
                      <img src="https://via.placeholder.com/43x43" alt="profile"/>
                      <div class="ml-3">
                        <p class="mb-0">Sophia Brown</p>
                        <p class="mb-0 text-muted text-small">Product Designer</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    Web App
                  </td>
                  <td>
                    <label class="badge badge-success">Low</label>
                  </td>
                </tr>
                <tr>
                  <td class="py-1 pl-0">
                    <div class="d-flex align-items-center">
                      <img src="https://via.placeholder.com/43x43" alt="profile"/>
                      <div class="ml-3">
                        <p class="mb-0">Rachel Newton</p>
                        <p class="mb-0 text-muted text-small">Mobile Developer</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    Mobile App
                  </td>
                  <td>
                    <label class="badge badge-warning">Medium</label>
                  </td>
                </tr>
                <tr>
                  <td class="py-1 pl-0">
                    <div class="d-flex align-items-center">
                      <img src="https://via.placeholder.com/43x43" alt="profile"/>
                      <div class="ml-3">
                        <p class="mb-0">Marcus Stevens</p>
                        <p class="mb-0 text-muted text-small">Core Developer</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    Plugin
                  </td>
                  <td>
                    <label class="badge badge-danger">High</label>
                  </td>
                </tr>
                <tr>
                  <td class="py-1 pl-0">
                    <div class="d-flex align-items-center">
                      <img src="https://via.placeholder.com/36x36" alt="profile"/>
                      <div class="ml-3">
                        <p class="mb-0">Theresa Becker</p>
                        <p class="mb-0 text-muted text-small">Product Designer</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    Web App
                  </td>
                  <td>
                    <label class="badge badge-success">Low</label>
                  </td>
                </tr>
                <tr>
                  <td class="py-1 pl-0">
                    <div class="d-flex align-items-center">
                      <img src="https://via.placeholder.com/43x43" alt="profile"/>
                      <div class="ml-3">
                        <p class="mb-0">Jessie Ortiz</p>
                        <p class="mb-0 text-muted text-small">Web Developer</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    SAAS App
                  </td>
                  <td>
                    <label class="badge badge-danger">High</label>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-bar-rating/jquery.barrating.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/widgets.js') !!}
@endpush