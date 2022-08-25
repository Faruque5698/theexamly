@extends('layout.master')

@push('plugin-styles')
  {!! Html::style('/assets/plugins/dragula/dragula.min.css') !!}
@endpush

@section('content')
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Simple Dragula</h4>
        <p class="card-description">Drag and drop between Team A and Team B</p>
        <div class="row">
          <div class="col-md-6 h-100">
            <div class="bg-secondary p-4">
              <h6 class="card-title">Team A</h6>
              <div id="profile-list-left" class="py-2">
                <div class="card rounded mb-2">
                  <div class="card-body p-3">
                    <div class="media">
                      <img src="https://via.placeholder.com/43x43" alt="image" class="img-sm mr-3 rounded-circle">
                      <div class="media-body">
                        <h6 class="mb-1">Rebecca young</h6>
                        <p class="mb-0 text-muted">
                          Software engineer                               
                        </p>
                      </div>                              
                    </div>
                  </div>
                </div>
                <div class="card rounded mb-2">
                  <div class="card-body p-3">
                    <div class="media">
                      <img src="https://via.placeholder.com/36x36" alt="image" class="img-sm mr-3 rounded-circle">
                      <div class="media-body">
                        <h6 class="mb-1">Jacob march</h6>
                        <p class="mb-0 text-muted">
                          Designer                                
                        </p>
                      </div>                              
                    </div>
                  </div>
                </div>
                <div class="card rounded mb-2">
                  <div class="card-body p-3">
                    <div class="media">
                      <img src="https://via.placeholder.com/43x43" alt="image" class="img-sm mr-3 rounded-circle">
                      <div class="media-body">
                        <h6 class="mb-1">Catherine</h6>
                        <p class="mb-0 text-muted">
                          Tester                                
                        </p>
                      </div>                              
                    </div>
                  </div>
                </div>
                <div class="card rounded mb-2">
                  <div class="card-body p-3">
                    <div class="media">
                      <img src="https://via.placeholder.com/36x36" alt="image" class="img-sm mr-3 rounded-circle">
                      <div class="media-body">
                        <h6 class="mb-1">Thomas Cook</h6>
                        <p class="mb-0 text-muted">
                          Developer                                
                        </p>
                      </div>                              
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 h-100">
            <div class="bg-secondary p-4">
              <h6 class="card-title">Team B</h6>
              <div id="profile-list-right" class="py-2">
                <div class="card rounded mb-2">
                  <div class="card-body p-3">
                    <div class="media">
                      <img src="https://via.placeholder.com/43x43" alt="image" class="img-sm mr-3 rounded-circle">
                      <div class="media-body">
                        <h6 class="mb-1">Keto Philip</h6>
                        <p class="mb-0 text-muted">
                          Business Analyst                               
                        </p>
                      </div>                              
                    </div>
                  </div>
                </div>
                <div class="card rounded mb-2">
                  <div class="card-body p-3">
                    <div class="media">
                      <img src="https://via.placeholder.com/43x43" alt="image" class="img-sm mr-3 rounded-circle">
                      <div class="media-body">
                        <h6 class="mb-1">Jacob Stephen</h6>
                        <p class="mb-0 text-muted">
                          Tester                                
                        </p>
                      </div>                              
                    </div>
                  </div>
                </div>
                <div class="card rounded mb-2">
                  <div class="card-body p-3">
                    <div class="media">
                      <img src="https://via.placeholder.com/43x43" alt="image" class="img-sm mr-3 rounded-circle">
                      <div class="media-body">
                        <h6 class="mb-1">March Creg</h6>
                        <p class="mb-0 text-muted">
                          Developer                               
                        </p>
                      </div>                              
                    </div>
                  </div>
                </div>
                <div class="card rounded mb-2">
                  <div class="card-body p-3">
                    <div class="media">
                      <img src="https://via.placeholder.com/43x43" alt="image" class="img-sm mr-3 rounded-circle">
                      <div class="media-body">
                        <h6 class="mb-1">Peter Beckham</h6>
                        <p class="mb-0 text-muted">
                          Designer                                
                        </p>
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
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Drag and drop tasks</h4>
        <p class="card-description">
          Drag and drop tasks from todo to in-progress or vice-versa
        </p>
        <div class="row">
          <div class="col-md-6">
            <h6 class="card-title">Todo</h6>
            <div id="dragula-left" class="py-2">
              <div class="card rounded border mb-2">
                <div class="card-body p-3">
                  <div class="media">
                    <i class="ti-desktop icon-sm align-self-center mr-3"></i>
                    <div class="media-body">
                      <h6 class="mb-1">Build wireframe</h6>
                      <p class="mb-0 text-muted">
                        Build wireframe for the new app                               
                      </p>
                    </div>                              
                  </div> 
                </div>
              </div>
              <div class="card rounded border mb-2">
                <div class="card-body p-3">
                  <div class="media">
                    <i class="ti-file icon-sm align-self-center mr-3"></i>
                    <div class="media-body">
                      <h6 class="mb-1">Postpone project deadline</h6>
                      <p class="mb-0 text-muted">
                        Fix new release date                             
                      </p>
                    </div>                              
                  </div> 
                </div>
              </div>
              <div class="card rounded border mb-2">
                <div class="card-body p-3">
                  <div class="media">
                    <i class="ti-upload icon-sm align-self-center mr-3"></i>
                    <div class="media-body">
                      <h6 class="mb-1">Upload the new update</h6>
                      <p class="mb-0 text-muted">
                        Submit the new build in play store                              
                      </p>
                    </div>                              
                  </div> 
                </div>
              </div>
              <div class="card rounded border mb-2">
                <div class="card-body p-3">
                  <div class="media">
                    <i class="ti-agenda icon-sm align-self-center mr-3"></i>
                    <div class="media-body">
                      <h6 class="mb-1">Book flight</h6>
                      <p class="mb-0 text-muted">
                        Book flight tickets                               
                      </p>
                    </div>                              
                  </div> 
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <h6 class="card-title mt-4 mt-md-0">In progress</h6>
            <div id="dragula-right" class="py-2">
              <div class="card rounded border mb-2">
                <div class="card-body p-3">
                  <div class="media">
                    <i class="ti-user icon-sm align-self-center mr-3"></i>
                    <div class="media-body">
                      <h6 class="mb-1">Project details</h6>
                      <p class="mb-0 text-muted">
                        Get new project details from Greg                               
                      </p>
                    </div>                              
                  </div> 
                </div>
              </div>
              <div class="card rounded border mb-2">
                <div class="card-body p-3">
                  <div class="media">
                    <i class="ti-view-grid icon-sm align-self-center mr-3"></i>
                    <div class="media-body">
                      <h6 class="mb-1">Leave approval</h6>
                      <p class="mb-0 text-muted">
                        Approve leaves for Mike                           
                      </p>
                    </div>                              
                  </div> 
                </div>
              </div>
              <div class="card rounded border mb-2">
                <div class="card-body p-3">
                  <div class="media">
                    <i class="ti-agenda icon-sm align-self-center mr-3"></i>
                    <div class="media-body">
                      <h6 class="mb-1">Make reservations at hotel</h6>
                      <p class="mb-0 text-muted">
                        Book rooms for vacation                             
                      </p>
                    </div>                              
                  </div> 
                </div>
              </div>
              <div class="card rounded border mb-2">
                <div class="card-body p-3">
                  <div class="media">
                    <i class="ti-calendar icon-sm align-self-center mr-3"></i>
                    <div class="media-body">
                      <h6 class="mb-1">Meeting with client</h6>
                      <p class="mb-0 text-muted">
                        New project meeting                              
                      </p>
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
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Change property of dropped element</h4>
        <p class="card-description">
          Drag and drop tasks from todo to in-progress or vice-versa
        </p>
        <div class="row">
          <div class="col-md-6">
            <h6 class="card-title">Todo</h6>
            <div id="dragula-event-left" class="py-2">
              <div class="card rounded border mb-2">
                <div class="card-body p-3">
                  <div class="media">
                    <i class="ti ti-pin-alt icon-sm text-primary align-self-center mr-3"></i>
                    <div class="media-body">
                      <h6 class="mb-1">Build wireframe</h6>
                      <p class="mb-0 text-muted">
                        Build wireframe for the new app                               
                      </p>
                    </div>                              
                  </div> 
                </div>
              </div>
              <div class="card rounded border mb-2">
                <div class="card-body p-3">
                  <div class="media">
                    <i class="ti ti-pin-alt icon-sm text-primary align-self-center mr-3"></i>
                    <div class="media-body">
                      <h6 class="mb-1">Postpone project deadline</h6>
                      <p class="mb-0 text-muted">
                        Fix new release date                             
                      </p>
                    </div>                              
                  </div> 
                </div>
              </div>
              <div class="card rounded border mb-2">
                <div class="card-body p-3">
                  <div class="media">
                    <i class="ti ti-pin-alt icon-sm text-primary align-self-center mr-3"></i>
                    <div class="media-body">
                      <h6 class="mb-1">Upload the new update</h6>
                      <p class="mb-0 text-muted">
                        Submit the new build in play store                              
                      </p>
                    </div>                              
                  </div> 
                </div>
              </div>
              <div class="card rounded border mb-2">
                <div class="card-body p-3">
                  <div class="media">
                    <i class="ti ti-pin-alt icon-sm text-primary align-self-center mr-3"></i>
                    <div class="media-body">
                      <h6 class="mb-1">Book flight</h6>
                      <p class="mb-0 text-muted">
                        Book flight tickets                               
                      </p>
                    </div>                              
                  </div> 
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <h6 class="card-title mt-4 mt-md-0">In progress</h6>
            <div id="dragula-event-right" class="py-2">
              <div class="card rounded border mb-2">
                <div class="card-body p-3">
                  <div class="media">
                    <i class="ti ti-time icon-sm text-success align-self-center mr-3"></i>
                    <div class="media-body">
                      <h6 class="mb-1">Project details</h6>
                      <p class="mb-0 text-muted">
                        Get new project details from Greg                               
                      </p>
                    </div>                              
                  </div> 
                </div>
              </div>
              <div class="card rounded border mb-2">
                <div class="card-body p-3">
                  <div class="media">
                    <i class="ti ti-time icon-sm text-success align-self-center mr-3"></i>
                    <div class="media-body">
                      <h6 class="mb-1">Leave approval</h6>
                      <p class="mb-0 text-muted">
                        Approve leaves for Mike                           
                      </p>
                    </div>                              
                  </div> 
                </div>
              </div>
              <div class="card rounded border mb-2">
                <div class="card-body p-3">
                  <div class="media">
                    <i class="ti ti-time icon-sm text-success align-self-center mr-3"></i>
                    <div class="media-body">
                      <h6 class="mb-1">Make reservations at hotel</h6>
                      <p class="mb-0 text-muted">
                        Book rooms for vacation                             
                      </p>
                    </div>                              
                  </div> 
                </div>
              </div>
              <div class="card rounded border mb-2">
                <div class="card-body p-3">
                  <div class="media">
                    <i class="ti ti-time icon-sm text-success align-self-center mr-3"></i>
                    <div class="media-body">
                      <h6 class="mb-1">Meeting with client</h6>
                      <p class="mb-0 text-muted">
                        New project meeting                              
                      </p>
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

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/dragula/dragula.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dragula.js') !!}
@endpush