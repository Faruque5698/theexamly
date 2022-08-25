@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="d-sm-flex pb-4 mb-4 border-bottom">
          <div class="d-flex align-items-center">
            <h5 class="page-title mb-n2">Open Tickets</h5>
            <p class="mt-2 mb-n1 ml-3 text-muted">230 Tickets</p>
          </div>
          <form class="ml-auto d-flex pt-2 pt-md-0 align-items-stretch w-50 justify-content-end">
            <input type="text" class="form-control w-50" placeholder="Search">
            <button type="submit" class="btn btn-success no-wrap ml-4">Search Ticket</button>
          </form>
        </div>
        <div class="nav-scroller">
          <ul class="nav nav-tabs tickets-tab-switch" role="tablist">
            <li class="nav-item">
              <a class="nav-link rounded active" id="open-tab" data-toggle="tab" href="#open-tickets" role="tab" aria-controls="open-tickets" aria-selected="true">Open Tickets <div class="badge">13</div></a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded" id="pending-tab" data-toggle="tab" href="#pending-tickets" role="tab" aria-controls="pending-tickets" aria-selected="false">Pending Tickets <div class="badge">50 </div></a>
            </li>
            <li class="nav-item">
              <a class="nav-link rounded" id="onhold-tab" data-toggle="tab" href="#onhold-tickets" role="tab" aria-controls="onhold-tickets" aria-selected="false">On-hold Tickets <div class="badge">29 </div>
              </a>
            </li>
          </ul>
        </div>
        <div class="tab-content border-0 tab-content-basic">
          <div class="tab-pane fade show active" id="open-tickets" role="tabpanel" aria-labelledby="open-tickets">
            <div class="tickets-date-group"><i class="mdi mdi-calendar"></i>Tuesday, 21 May 2019 </div>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8 col-12">
                <div class="wrapper">
                  <h5>#39033 - Design Admin Dashboard</h5>
                  <div class="badge badge-success">New</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="https://via.placeholder.com/43x43" alt="profile image">
                  <span>Brett Gonzales</span>
                  <span><i class="mdi mdi-clock-outline"></i>03:34AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6 d-none d-md-block">
                <img class="img-xs rounded-circle" src="https://via.placeholder.com/40x40" alt="profile image">
                <span class="text-muted">Frank Briggs</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6 d-none d-md-block">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Wireframe</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8 col-12">
                <div class="wrapper">
                  <h5>#39040 - Website Redesign</h5>
                  <div class="badge badge-info">Pro</div>
                </div>
                <div class="wrapper text-muted d-none d-lg-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="https://via.placeholder.com/40x40" alt="profile image">
                  <span>Olivia Cross</span>
                  <span><i class="mdi mdi-clock-outline"></i>04:23AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-12">
                <img class="img-xs rounded-circle" src="{{ url('assets/images/faces/face14.jpg') }}" alt="profile image">
                <span class="text-muted">Frank Briggs</span>
              </div>
              <div class="ticket-float col-lg-2 d-none d-lg-block">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Wireframe</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#39041 - Bootstrap Framework not working</h5>
                  <div class="badge badge-info">Pro</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="https://via.placeholder.com/92x92" alt="profile image">
                  <span>Leah Frank</span>
                  <span><i class="mdi mdi-clock-outline"></i>04:24AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="https://via.placeholder.com/30x30" alt="profile image">
                <span class="text-muted">Emilie Barnett</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Deployed</span>
              </div>
            </a>
            <div class="tickets-date-group"><i class="mdi mdi-calendar"></i>Tuesday, 20 Apr,2019 </div>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#39045 - Design Admin Dashboard</h5>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="https://via.placeholder.com/40x40" alt="profile image">
                  <span>Luella Sparks</span>
                  <span><i class="mdi mdi-clock-outline"></i>12:54PM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="https://via.placeholder.com/43x43" alt="profile image">
                <span class="text-muted">Hunter Garza</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Concept</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#29033 - Set up the marketplace strategy </h5>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="https://via.placeholder.com/43x43" alt="profile image">
                  <span>Mitchell Barber</span>
                  <span><i class="mdi mdi-clock-outline"></i>4:19AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="https://via.placeholder.com/43x43" alt="profile image">
                <span class="text-muted">Michael Campbell</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Wireframe</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#29033 - Design Admin Dashboard</h5>
                  <div class="badge badge-success">New</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="https://via.placeholder.com/43x43" alt="profile image">
                  <span>Rhoda Jimenez</span>
                  <span><i class="mdi mdi-clock-outline"></i>01:27PM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="https://via.placeholder.com/30x30" alt="profile image">
                <span class="text-muted">Maria Cook</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Deployed</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#29033 - Compose newsletter for the big launch</h5>
                  <div class="badge badge-success">New</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="https://via.placeholder.com/40x40" alt="profile image">
                  <span>Alta Little</span>
                  <span><i class="mdi mdi-clock-outline"></i>06:16PM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="https://via.placeholder.com/40x40" alt="profile image">
                <span class="text-muted">Juan Little</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Concept</span>
              </div>
            </a>
          </div>
          <div class="tab-pane fade" id="pending-tickets" role="tabpanel" aria-labelledby="pending-tickets">
            <div class="tickets-date-group"><i class="mdi mdi-calendar"></i>Tuesday, 21 May 2019 </div>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#39045 - Design Admin Dashboard</h5>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="https://via.placeholder.com/40x40" alt="profile image">
                  <span>Luella Sparks</span>
                  <span><i class="mdi mdi-clock-outline"></i>12:54PM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="https://via.placeholder.com/43x43" alt="profile image">
                <span class="text-muted">Hunter Garza</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Concept</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#39033 - Design Admin Dashboard</h5>
                  <div class="badge badge-success">New</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="https://via.placeholder.com/43x43" alt="profile image">
                  <span>Brett Gonzales</span>
                  <span><i class="mdi mdi-clock-outline"></i>03:34AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="https://via.placeholder.com/40x40" alt="profile image">
                <span class="text-muted">Frank Briggs</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Wireframe</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#29033 - Compose newsletter for the big launch</h5>
                  <div class="badge badge-success">New</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="https://via.placeholder.com/40x40" alt="profile image">
                  <span>Alta Little</span>
                  <span><i class="mdi mdi-clock-outline"></i>06:16PM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="https://via.placeholder.com/40x40" alt="profile image">
                <span class="text-muted">Juan Little</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Concept</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#39040 - Website Redesign</h5>
                  <div class="badge badge-info">Pro</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="https://via.placeholder.com/40x40" alt="profile image">
                  <span>Olivia Cross</span>
                  <span><i class="mdi mdi-clock-outline"></i>04:23AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="{{ url('assets/images/faces/face14.jpg') }}" alt="profile image">
                <span class="text-muted">Frank Briggs</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Wireframe</span>
              </div>
            </a>
            <div class="tickets-date-group"><i class="mdi mdi-calendar"></i>Tuesday, 20 Apr,2019 </div>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#29033 - Set up the marketplace strategy </h5>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="https://via.placeholder.com/43x43" alt="profile image">
                  <span>Mitchell Barber</span>
                  <span><i class="mdi mdi-clock-outline"></i>4:19AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="https://via.placeholder.com/43x43" alt="profile image">
                <span class="text-muted">Michael Campbell</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Wireframe</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#39041 - Bootstrap Framework not working</h5>
                  <div class="badge badge-info">Pro</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="https://via.placeholder.com/92x92" alt="profile image">
                  <span>Leah Frank</span>
                  <span><i class="mdi mdi-clock-outline"></i>04:24AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="https://via.placeholder.com/30x30" alt="profile image">
                <span class="text-muted">Emilie Barnett</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Deployed</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#29033 - Design Admin Dashboard</h5>
                  <div class="badge badge-success">New</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="https://via.placeholder.com/43x43" alt="profile image">
                  <span>Rhoda Jimenez</span>
                  <span><i class="mdi mdi-clock-outline"></i>01:27PM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="https://via.placeholder.com/30x30" alt="profile image">
                <span class="text-muted">Maria Cook</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Deployed</span>
              </div>
            </a>
          </div>
          <div class="tab-pane fade" id="onhold-tickets" role="tabpanel" aria-labelledby="onhold-tickets">
            <div class="tickets-date-group"><i class="mdi mdi-calendar"></i>Tuesday, 21 May 2019 </div>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#39040 - Website Redesign</h5>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="https://via.placeholder.com/40x40" alt="profile image">
                  <span>Olivia Cross</span>
                  <span><i class="mdi mdi-clock-outline"></i>04:23AM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="{{ url('assets/images/faces/face14.jpg') }}" alt="profile image">
                <span class="text-muted">Frank Briggs</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Wireframe</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#29033 - Design Admin Dashboard</h5>
                  <div class="badge badge-success">New</div>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="https://via.placeholder.com/43x43" alt="profile image">
                  <span>Rhoda Jimenez</span>
                  <span><i class="mdi mdi-clock-outline"></i>01:27PM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="https://via.placeholder.com/30x30" alt="profile image">
                <span class="text-muted">Maria Cook</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Deployed</span>
              </div>
            </a>
            <a href="#" class="tickets-card row">
              <div class="tickets-details col-lg-8">
                <div class="wrapper">
                  <h5>#29033 - Compose newsletter for the big launch</h5>
                </div>
                <div class="wrapper text-muted d-none d-md-block">
                  <span>Assigned to</span>
                  <img class="assignee-avatar" src="https://via.placeholder.com/40x40" alt="profile image">
                  <span>Alta Little</span>
                  <span><i class="mdi mdi-clock-outline"></i>06:16PM</span>
                </div>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <img class="img-xs rounded-circle" src="https://via.placeholder.com/40x40" alt="profile image">
                <span class="text-muted">Juan Little</span>
              </div>
              <div class="ticket-float col-lg-2 col-sm-6">
                <i class="category-icon mdi mdi-folder-outline"></i>
                <span class="text-muted">Concept</span>
              </div>
            </a>
          </div>
        </div>
        <nav class="mt-4">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#">
                <i class="mdi mdi-chevron-left"></i>
              </a>
            </li>
            <li class="page-item active">
              <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">
                <i class="mdi mdi-chevron-right"></i>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
@endsection