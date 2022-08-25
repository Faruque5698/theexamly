@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex mb-4">
          <h5 class="mr-2 font-weight-semibold border-right pr-2 mr-2">Users</h5>
          <h5 class="font-weight-semibold">430</h5>
        </div>
        <div class="row">
          <div class="col-md-12 mb-5">
            <div class="card rounded shadow-none border">
              <div class="card-body">
                <div class="row">
                  <div class="col-xl-5 d-sm-flex">
                    <div class="user-avatar mb-auto">
                      <img src="https://via.placeholder.com/43x43" alt="profile image" class="profile-img img-lg rounded-circle">
                      <span class="edit-avatar-icon"><i class="mdi mdi-camera"></i></span>
                    </div>
                    <div class="wrapper pl-xl-4">
                      <div class="wrapper d-flex align-items-center">
                        <h4 class="mb-0 font-weight-medium">Danny Santiago</h4>
                        <div class="badge badge-secondary text-dark mt-2 ml-2">Pro</div>
                      </div>
                      <div class="wrapper d-flex align-items-center font-weight-medium text-muted">
                        <i class="mdi mdi-map-marker-outline mr-2"></i>
                        <p class="mb-0 text-muted">San Francisco, California</p>
                      </div>
                      <div class="wrapper d-flex align-items-start pt-3">
                        <div class="badge badge-secondary text-dark mr-2">
                          <i class="mdi mdi-check-circle-outline icon-sm"></i>
                        </div>
                        <div class="badge badge-secondary text-dark mr-2">
                          <i class="mdi mdi-email-outline icon-sm"></i>
                        </div>
                        <div class="badge badge-secondary text-dark mr-2">
                          <i class="mdi mdi-format-list-bulleted icon-sm"></i>
                        </div>
                        <div class="wrapper pl-2">
                          <h6 class="mt-n1 mb-0 font-weight-medium">23455</h6>
                          <p class="text-muted">Viewers</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-8 col-xl-4">
                    <div class="d-flex align-items-center w-100">
                      <p class="mb-0 mr-3 font-weight-semibold">Progress</p>
                      <div class="progress progress-md w-100">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mb-0 ml-3 font-weight-semibold">67%</p>
                    </div>
                    <p class="text-muted mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  </div>
                  <div class="col-sm-4 col-xl-3">
                    <div class="wrapper d-flex justify-content-end">
                      <button type="button" class="btn btn-sm btn-inverse-primary mr-2">ASK</button>
                      <button type="button" class="btn btn-sm btn-info">HIRE</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper border-top">
                <div class="card-body">
                  <div class="row">
                    <div class="col d-flex mb-2 mb-md-0">
                      <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                        <i class="mdi mdi-traffic-light icon-sm my-0 mx-1"></i>
                      </div>
                      <div class="wrapper pl-3">
                        <p class="mb-0 font-weight-medium text-muted">TOTAL TRAFFIC</p>
                        <h4 class="font-weight-semibold mb-0">350,897</h4>
                      </div>
                    </div>
                    <div class="col d-flex mb-2 mb-md-0">
                      <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                        <i class="mdi mdi-account-plus icon-sm my-0 mx-1"></i>
                      </div>
                      <div class="wrapper pl-3">
                        <p class="mb-0 font-weight-medium text-muted">NEW USERS</p>
                        <h4 class="font-weight-semibold mb-0">2,356</h4>
                      </div>
                    </div>
                    <div class="col d-flex mb-2 mb-md-0">
                      <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                        <i class="mdi mdi-server-security icon-sm my-0 mx-1"></i>
                      </div>
                      <div class="wrapper pl-3">
                        <p class="mb-0 font-weight-medium text-muted">SALES</p>
                        <h4 class="font-weight-semibold mb-0">927</h4>
                      </div>
                    </div>
                    <div class="col d-flex mb-2 mb-md-0">
                      <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                        <i class="mdi mdi-chart-arc icon-sm my-0 mx-1"></i>
                      </div>
                      <div class="wrapper pl-3">
                        <p class="mb-0 font-weight-medium text-muted">PERFORMANCE</p>
                        <h4 class="font-weight-semibold mb-0 text-primary">49.65%</h4>
                      </div>
                    </div>
                    <div class="col d-flex align-items-center">
                      <div class="image-grouped ml-auto">
                        <img src="https://via.placeholder.com/40x40" data-toggle="tooltip" data-placement="top" title="Mary Sharp" alt="profile image">
                        <img src="https://via.placeholder.com/40x40" data-toggle="tooltip" data-placement="top" title="Cory Medina" alt="profile image">
                        <img src="https://via.placeholder.com/40x40" data-toggle="tooltip" data-placement="top" title="Clyde Hammond" alt="profile image">
                        <div class="text-avatar" data-toggle="tooltip" data-placement="top" title="4 More Peoples">+4</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 mb-5">
            <div class="card rounded shadow-none border">
              <div class="card-body">
                <div class="row">
                  <div class="col-xl-5 d-sm-flex">
                    <div class="user-avatar mb-auto">
                      <img src="https://via.placeholder.com/36x36" alt="profile image" class="profile-img img-lg rounded-circle">
                      <span class="edit-avatar-icon"><i class="mdi mdi-camera"></i></span>
                    </div>
                    <div class="wrapper pl-xl-4">
                      <div class="wrapper d-flex align-items-center">
                        <h4 class="mb-0 font-weight-medium">Lelia Bowers</h4>
                      </div>
                      <div class="wrapper d-flex align-items-center font-weight-medium text-muted">
                        <i class="mdi mdi-map-marker-outline mr-2"></i>
                        <p class="mb-0 text-muted">Central African Republic</p>
                      </div>
                      <div class="wrapper d-flex align-items-start pt-3">
                        <div class="badge badge-secondary text-dark mr-2">
                          <i class="mdi mdi-check-circle-outline icon-sm"></i>
                        </div>
                        <div class="badge badge-secondary text-dark mr-2">
                          <i class="mdi mdi-email-outline icon-sm"></i>
                        </div>
                        <div class="badge badge-secondary text-dark mr-2">
                          <i class="mdi mdi-format-list-bulleted icon-sm"></i>
                        </div>
                        <div class="wrapper pl-2">
                          <h6 class="mt-n1 mb-0 font-weight-medium">23525</h6>
                          <p class="text-muted">Viewers</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-8 col-xl-4">
                    <div class="d-flex align-items-center w-100">
                      <p class="mb-0 mr-3 font-weight-semibold">Progress</p>
                      <div class="progress progress-md w-100">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mb-0 ml-3 font-weight-semibold">45%</p>
                    </div>
                    <p class="text-muted mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  </div>
                  <div class="col-sm-4 col-xl-3">
                    <div class="wrapper d-flex justify-content-end">
                      <button type="button" class="btn btn-sm btn-inverse-primary mr-2">ASK</button>
                      <button type="button" class="btn btn-sm btn-info">HIRE</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper border-top">
                <div class="card-body">
                  <div class="row">
                    <div class="col d-flex mb-2 mb-md-0">
                      <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                        <i class="mdi mdi-traffic-light icon-sm my-0 mx-1"></i>
                      </div>
                      <div class="wrapper pl-3">
                        <p class="mb-0 font-weight-medium text-muted">TOTAL TRAFFIC</p>
                        <h4 class="font-weight-semibold mb-0">443,235</h4>
                      </div>
                    </div>
                    <div class="col d-flex mb-2 mb-md-0">
                      <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                        <i class="mdi mdi-account-plus icon-sm my-0 mx-1"></i>
                      </div>
                      <div class="wrapper pl-3">
                        <p class="mb-0 font-weight-medium text-muted">NEW USERS</p>
                        <h4 class="font-weight-semibold mb-0">3,433</h4>
                      </div>
                    </div>
                    <div class="col d-flex mb-2 mb-md-0">
                      <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                        <i class="mdi mdi-server-security icon-sm my-0 mx-1"></i>
                      </div>
                      <div class="wrapper pl-3">
                        <p class="mb-0 font-weight-medium text-muted">SALES</p>
                        <h4 class="font-weight-semibold mb-0">345</h4>
                      </div>
                    </div>
                    <div class="col d-flex mb-2 mb-md-0">
                      <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                        <i class="mdi mdi-chart-arc icon-sm my-0 mx-1"></i>
                      </div>
                      <div class="wrapper pl-3">
                        <p class="mb-0 font-weight-medium text-muted">PERFORMANCE</p>
                        <h4 class="font-weight-semibold mb-0 text-primary">34.43%</h4>
                      </div>
                    </div>
                    <div class="col d-flex align-items-center">
                      <div class="image-grouped ml-auto">
                        <img src="https://via.placeholder.com/92x92" data-toggle="tooltip" data-placement="top" title="Mary Sharp" alt="profile image">
                        <img src="https://via.placeholder.com/92x92" data-toggle="tooltip" data-placement="top" title="Cory Medina" alt="profile image">
                        <img src="https://via.placeholder.com/40x40" data-toggle="tooltip" data-placement="top" title="Clyde Hammond" alt="profile image">
                        <div class="text-avatar" data-toggle="tooltip" data-placement="top" title="4 More Peoples">+4</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 mb-5">
            <div class="card rounded shadow-none border">
              <div class="card-body">
                <div class="row">
                  <div class="col-xl-5 d-sm-flex">
                    <div class="user-avatar mb-auto">
                      <img src="https://via.placeholder.com/43x43" alt="profile image" class="profile-img img-lg rounded-circle">
                      <span class="edit-avatar-icon"><i class="mdi mdi-camera"></i></span>
                    </div>
                    <div class="wrapper pl-xl-4">
                      <div class="wrapper d-flex align-items-center">
                        <h4 class="mb-0 font-weight-medium">Tommy Jenkins</h4>
                      </div>
                      <div class="wrapper d-flex align-items-center font-weight-medium text-muted">
                        <i class="mdi mdi-map-marker-outline mr-2"></i>
                        <p class="mb-0 text-muted">Bouvet Island</p>
                      </div>
                      <div class="wrapper d-flex align-items-start pt-3">
                        <div class="badge badge-secondary text-dark mr-2">
                          <i class="mdi mdi-check-circle-outline icon-sm"></i>
                        </div>
                        <div class="badge badge-secondary text-dark mr-2">
                          <i class="mdi mdi-email-outline icon-sm"></i>
                        </div>
                        <div class="badge badge-secondary text-dark mr-2">
                          <i class="mdi mdi-format-list-bulleted icon-sm"></i>
                        </div>
                        <div class="wrapper pl-2">
                          <h6 class="mt-n1 mb-0 font-weight-medium">34526</h6>
                          <p class="text-muted">Viewers</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-8 col-xl-4">
                    <div class="d-flex align-items-center w-100">
                      <p class="mb-0 mr-3 font-weight-semibold">Progress</p>
                      <div class="progress progress-md w-100">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 77%" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mb-0 ml-3 font-weight-semibold">77%</p>
                    </div>
                    <p class="text-muted mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  </div>
                  <div class="col-sm-4 col-xl-3">
                    <div class="wrapper d-flex justify-content-end">
                      <button type="button" class="btn btn-sm btn-inverse-primary mr-2">ASK</button>
                      <button type="button" class="btn btn-sm btn-info">HIRE</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper border-top">
                <div class="card-body">
                  <div class="row">
                    <div class="col d-flex mb-2 mb-md-0">
                      <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                        <i class="mdi mdi-traffic-light icon-sm my-0 mx-1"></i>
                      </div>
                      <div class="wrapper pl-3">
                        <p class="mb-0 font-weight-medium text-muted">TOTAL TRAFFIC</p>
                        <h4 class="font-weight-semibold mb-0">563,645</h4>
                      </div>
                    </div>
                    <div class="col d-flex mb-2 mb-md-0">
                      <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                        <i class="mdi mdi-account-plus icon-sm my-0 mx-1"></i>
                      </div>
                      <div class="wrapper pl-3">
                        <p class="mb-0 font-weight-medium text-muted">NEW USERS</p>
                        <h4 class="font-weight-semibold mb-0">2,543</h4>
                      </div>
                    </div>
                    <div class="col d-flex mb-2 mb-md-0">
                      <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                        <i class="mdi mdi-server-security icon-sm my-0 mx-1"></i>
                      </div>
                      <div class="wrapper pl-3">
                        <p class="mb-0 font-weight-medium text-muted">SALES</p>
                        <h4 class="font-weight-semibold mb-0">765</h4>
                      </div>
                    </div>
                    <div class="col d-flex mb-2 mb-md-0">
                      <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                        <i class="mdi mdi-chart-arc icon-sm my-0 mx-1"></i>
                      </div>
                      <div class="wrapper pl-3">
                        <p class="mb-0 font-weight-medium text-muted">PERFORMANCE</p>
                        <h4 class="font-weight-semibold mb-0 text-primary">23.56%</h4>
                      </div>
                    </div>
                    <div class="col d-flex align-items-center">
                      <div class="image-grouped ml-auto">
                        <img src="https://via.placeholder.com/43x43" data-toggle="tooltip" data-placement="top" title="Mary Sharp" alt="profile image">
                        <img src="https://via.placeholder.com/43x43" data-toggle="tooltip" data-placement="top" title="Cory Medina" alt="profile image">
                        <img src="https://via.placeholder.com/92x92" data-toggle="tooltip" data-placement="top" title="Clyde Hammond" alt="profile image">
                        <div class="text-avatar" data-toggle="tooltip" data-placement="top" title="4 More Peoples">+4</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 mb-5">
            <div class="card rounded shadow-none border">
              <div class="card-body">
                <div class="row">
                  <div class="col-xl-5 d-sm-flex">
                    <div class="user-avatar mb-auto">
                      <img src="https://via.placeholder.com/43x43" alt="profile image" class="profile-img img-lg rounded-circle">
                      <span class="edit-avatar-icon"><i class="mdi mdi-camera"></i></span>
                    </div>
                    <div class="wrapper pl-xl-4">
                      <div class="wrapper d-flex align-items-center">
                        <h4 class="mb-0 font-weight-medium">Ramiz Dedaković</h4>
                      </div>
                      <div class="wrapper d-flex align-items-center font-weight-medium text-muted">
                        <i class="mdi mdi-map-marker-outline mr-2"></i>
                        <p class="mb-0 text-muted">Saint Kitts and Nevis</p>
                      </div>
                      <div class="wrapper d-flex align-items-start pt-3">
                        <div class="badge badge-secondary text-dark mr-2">
                          <i class="mdi mdi-check-circle-outline icon-sm"></i>
                        </div>
                        <div class="badge badge-secondary text-dark mr-2">
                          <i class="mdi mdi-email-outline icon-sm"></i>
                        </div>
                        <div class="badge badge-secondary text-dark mr-2">
                          <i class="mdi mdi-format-list-bulleted icon-sm"></i>
                        </div>
                        <div class="wrapper pl-2">
                          <h6 class="mt-n1 mb-0 font-weight-medium">69434</h6>
                          <p class="text-muted">Viewers</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-8 col-xl-4">
                    <div class="d-flex align-items-center w-100">
                      <p class="mb-0 mr-3 font-weight-semibold">Progress</p>
                      <div class="progress progress-md w-100">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <p class="mb-0 ml-3 font-weight-semibold">55%</p>
                    </div>
                    <p class="text-muted mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  </div>
                  <div class="col-sm-4 col-xl-3">
                    <div class="wrapper d-flex justify-content-end">
                      <button type="button" class="btn btn-sm btn-inverse-primary mr-2">ASK</button>
                      <button type="button" class="btn btn-sm btn-info">HIRE</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrapper border-top">
                <div class="card-body">
                  <div class="row">
                    <div class="col d-flex mb-2 mb-md-0">
                      <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                        <i class="mdi mdi-traffic-light icon-sm my-0 mx-1"></i>
                      </div>
                      <div class="wrapper pl-3">
                        <p class="mb-0 font-weight-medium text-muted">TOTAL TRAFFIC</p>
                        <h4 class="font-weight-semibold mb-0">343,525</h4>
                      </div>
                    </div>
                    <div class="col d-flex mb-2 mb-md-0">
                      <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                        <i class="mdi mdi-account-plus icon-sm my-0 mx-1"></i>
                      </div>
                      <div class="wrapper pl-3">
                        <p class="mb-0 font-weight-medium text-muted">NEW USERS</p>
                        <h4 class="font-weight-semibold mb-0">5,324</h4>
                      </div>
                    </div>
                    <div class="col d-flex mb-2 mb-md-0">
                      <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                        <i class="mdi mdi-server-security icon-sm my-0 mx-1"></i>
                      </div>
                      <div class="wrapper pl-3">
                        <p class="mb-0 font-weight-medium text-muted">SALES</p>
                        <h4 class="font-weight-semibold mb-0">235</h4>
                      </div>
                    </div>
                    <div class="col d-flex mb-2 mb-md-0">
                      <div class="d-inline-flex align-items-center justify-content-center border rounded-circle px-2 py-2 my-auto text-muted">
                        <i class="mdi mdi-chart-arc icon-sm my-0 mx-1"></i>
                      </div>
                      <div class="wrapper pl-3">
                        <p class="mb-0 font-weight-medium text-muted">PERFORMANCE</p>
                        <h4 class="font-weight-semibold mb-0 text-primary">45.23%</h4>
                      </div>
                    </div>
                    <div class="col d-flex align-items-center">
                      <div class="image-grouped ml-auto">
                        <img src="https://via.placeholder.com/43x43" data-toggle="tooltip" data-placement="top" title="Mary Sharp" alt="profile image">
                        <img src="https://via.placeholder.com/40x40" data-toggle="tooltip" data-placement="top" title="Cory Medina" alt="profile image">
                        <img src="https://via.placeholder.com/36x36" data-toggle="tooltip" data-placement="top" title="Clyde Hammond" alt="profile image">
                        <div class="text-avatar" data-toggle="tooltip" data-placement="top" title="4 More Peoples">+2</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection