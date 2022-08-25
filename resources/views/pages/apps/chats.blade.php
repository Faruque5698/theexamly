@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-md-12">
    <button type="button" class="btn btn-secondary py-3 mb-4 text-center d-md-none aside-toggler"><i class="mdi mdi-menu mr-0 icon-md"></i></button>
    <div class="card chat-app-wrapper">
      <div class="row mx-0">
        <div class="col-lg-3 col-md-4 chat-list-wrapper px-0">
          <div class="sidebar-spacer">
            <div class="input-group chat-search-input">
              <input type="text" class="form-control" placeholder="Search Inbox" aria-label="Username">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="chat-list-item-wrapper">
            <div class="list-item">
              <div class="profile-image">
                <div class="dot-indicator sm bg-success"></div>
                <img class="img-sm rounded-circle" src="https://via.placeholder.com/43x43" alt="">
              </div>
              <p class="user-name">Peter Moore</p>
              <p class="chat-time">30min ago</p>
              <p class="chat-text">Hello everyone, Iam happy to share with you our new company goals..</p>
            </div>
            <div class="list-item">
              <div class="profile-image">
                <div class="dot-indicator sm bg-primary"></div>
                <img class="img-sm rounded-circle" src="https://via.placeholder.com/43x43" alt="">
              </div>
              <p class="user-name">Lillian Woods</p>
              <p class="chat-time">1 day ago</p>
              <p class="chat-text">Hello jessica, i will b ein london tomorrow, hope we can meer there</p>
            </div>
            <div class="list-item">
              <div class="profile-image">
                <div class="dot-indicator sm bg-primary"></div>
                <img class="img-sm rounded-circle" src="https://via.placeholder.com/36x36" alt="">
              </div>
              <p class="user-name">Christina Love</p>
              <p class="chat-time">2 days ago</p>
              <p class="chat-text">Can you prep the File?</p>
            </div>
            <div class="list-item">
              <div class="profile-image">
                <div class="dot-indicator sm bg-warning"></div>
                <img class="img-sm rounded-circle" src="https://via.placeholder.com/30x30" alt="">
              </div>
              <p class="user-name">Mabelle King</p>
              <p class="chat-time">3 days ago</p>
              <p class="chat-text">A new feature has been updated your account.Check it out…</p>
            </div>
            <div class="list-item">
              <div class="profile-image">
                <img class="img-sm rounded-circle" src="https://via.placeholder.com/43x43" alt="">
              </div>
              <p class="user-name">Brandon Norton</p>
              <p class="chat-time">4 days ago</p>
              <p class="chat-text">Hello, this is an invitation from one of the most interesting teams... </p>
            </div>
          </div>
          <div class="sidebar-spacer">
            <button class="btn btn-block btn-success py-3" type="button">+ New Chat</button>
          </div>
        </div>
        <div class="col-lg-6 col-md-8 px-0 d-flex flex-column">
          <div class="chat-container-wrapper">
            <div class="chat-bubble incoming-chat">
              <div class="chat-message">
                <p>Leo duis ut diam quam nulla porttitor massa id neque. Sed enim ut sem viverra aliquet eget sit. Aenean et tortor at risus viverra.</p>
                <p>Mi in nulla posuere sollicitudin aliquam ultrices. Mauris a diam maecenas sed enim. Facilisi nullam vehicula ipsum a arcu cursus vitae congue mauris. In cursus turpis massa tincidunt dui. Mattis vulputate enim nulla aliquet porttitor lacus.</p>
              </div>
              <div class="sender-details">
                <img class="sender-avatar img-xs rounded-circle" src="https://via.placeholder.com/36x36" alt="profile image">
                <p class="seen-text">Message seen : 20 min ago</p>
              </div>
            </div>
            <div class="chat-bubble outgoing-chat">
              <div class="chat-message">
                <p class="font-weight-bold">Frank Carter</p>
                <p>Leo duis ut diam quam nulla porttitor massa id neque. Sed enim ut sem</p>
              </div>
              <div class="sender-details">
                <img class="sender-avatar img-xs rounded-circle" src="https://via.placeholder.com/43x43" alt="profile image">
                <p class="seen-text">Message seen : 10 min ago</p>
              </div>
            </div>
            <div class="chat-bubble incoming-chat">
              <div class="chat-message">
                <p class="font-weight-bold">Frank Carter</p>
                <p>Mi in nulla posuere sollicitudin aliquam ultrices. Mauris a diam maecenas sed enim. Facilisi nullam vehicula ipsum a arcu cursus vitae congue mauris.</p>
              </div>
              <div class="sender-details">
                <img class="sender-avatar img-xs rounded-circle" src="https://via.placeholder.com/36x36" alt="profile image">
                <p class="seen-text">Message seen : 8 min ago</p>
              </div>
            </div>
            <div class="chat-bubble outgoing-chat">
              <div class="chat-message">
                <p class="font-weight-bold">Frank Carter</p>
                <p>Leo duis ut diam quam nulla porttitor massa id neque. Sed enim ut sem</p>
                <p class="font-weight-medium"><i class="mdi mdi-paperclip mr-2"></i>workfile.pdf</p>
              </div>
              <div class="sender-details">
                <img class="sender-avatar img-xs rounded-circle" src="https://via.placeholder.com/43x43" alt="profile image">
                <p class="seen-text">Message seen : 10 min ago</p>
              </div>
            </div>
          </div>
          <div class="chat-text-field mt-auto">
            <form action="#">
              <div class="input-group">
                <div class="input-group-prepend">
                  <button type="button" class="input-group-text"><i class="mdi mdi-emoticon-happy-outline icon-sm"></i></button>
                </div>
                <input type="text" class="form-control" placeholder="Type a message here">
                <div class="input-group-append">
                  <button type="button" class="input-group-text"><i class="mdi mdi-paperclip icon-sm"></i></button>
                </div>
                <div class="input-group-append">
                  <button type="submit" class="input-group-text"><i class="mdi mdi-send icon-sm"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-3 d-none d-lg-block px-0 chat-sidebar">
          <img class="img-fluid w-100" src="https://via.placeholder.com/40x40" alt="profile image">
          <div class="px-4">
            <div class="d-flex pt-4">
              <div class="wrapper">
                <h5 class="font-weight-medium mb-0 ellipsis">Cecelia Benson</h5>
                <p class="mb-0 text-muted ellipsis">General manager</p>
              </div>
              <div class="badge badge-success mb-auto ml-auto">Online</div>
            </div>
            <div class="pt-3">
              <div class="d-flex align-items-center py-1">
                <i class="mdi mdi-whatsapp mr-2"></i>
                <p class="mb-0 font-weight-medium">225-248-4861</p>
              </div>
              <div class="d-flex align-items-center py-1">
                <i class="mdi mdi-email-outline mr-2"></i>
                <p class="mb-0 font-weight-medium ellipsis">cecilia.tromp@danny.com</p>
              </div>
              <div class="d-flex align-items-center py-1">
                <i class="mdi mdi-map-marker-outline mr-2"></i>
                <p class="mb-0 font-weight-medium ellipsis">United Kingdom</p>
              </div>
            </div>
            <div class="list-item">
              <div class="d-flex align-items-center justify-content-center img-sm badge-success">
                <i class="mdi mdi-cash-multiple icon-sm"></i></div>
              <div class="wrapper pl-3">
                <h5 class="font-weight-medium mb-0">$2300</h5>
                <p class="text-muted mb-0">Deposit</p>
              </div>
            </div>
            <div class="list-item">
              <div class="d-flex align-items-center justify-content-center img-sm badge-danger">
                <i class="mdi mdi-cash-multiple icon-sm"></i></div>
              <div class="wrapper pl-3">
                <h5 class="font-weight-medium mb-0">$2300</h5>
                <p class="text-muted mb-0">Deposit</p>
              </div>
            </div>
            <div class="list-item border-bottom-0">
              <div class="d-flex align-items-center justify-content-center img-sm badge-info">
                <i class="mdi mdi-cash-multiple icon-sm"></i></div>
              <div class="wrapper pl-3 w-100">
                <h5 class="font-weight-medium mb-0">$2300</h5>
                <div class="d-flex">
                  <p class="text-muted mb-0">Deposit</p>
                  <p class="font-weight-bold ml-auto">4.7 GB free</p>
                </div>
              </div>
            </div>
            <h5 class="font-weight-medium mt-3">Documentation</h5>
            <div class="list-item">
              <div class="d-flex align-items-center justify-content-center img-sm badge-primary">
                <i class="mdi mdi-file-pdf icon-sm"></i></div>
              <div class="wrapper pl-3 w-100">
                <h5 class="font-weight-medium mb-0 ellipsis">Company Profile.pdf</h5>
                <div class="d-flex">
                  <p class="text-muted mb-0">456.54 KB</p>
                  <i class="mdi mdi-arrow-down-bold text-muted ml-auto"></i>
                </div>
              </div>
            </div>
            <div class="list-item">
              <div class="d-flex align-items-center justify-content-center img-sm badge-primary">
                <i class="mdi mdi-file-pdf icon-sm"></i></div>
              <div class="wrapper pl-3 w-100">
                <h5 class="font-weight-medium mb-0 ellipsis">Proposal.pdf</h5>
                <div class="d-flex">
                  <p class="text-muted mb-0">1360.54 KB</p>
                  <i class="mdi mdi-arrow-down-bold text-muted ml-auto"></i>
                </div>
              </div>
            </div>
            <h5 class="font-weight-medium mt-5 mb-4">Share photos</h5>
            <div class="row">
              <div class="col-4">
                <img class="w-100 img-fluid rounded" src="https://via.placeholder.com/40x40" alt="image">
              </div>
              <div class="col-4">
                <img class="w-100 img-fluid rounded" src="https://via.placeholder.com/40x40" alt="image">
              </div>
              <div class="col-4">
                <img class="w-100 img-fluid rounded" src="https://via.placeholder.com/40x40" alt="image">
              </div>
            </div>
            <div class="row my-4">
              <div class="col-4">
                <img class="w-100 img-fluid rounded" src="https://via.placeholder.com/40x40" alt="image">
              </div>
              <div class="col-4">
                <img class="w-100 img-fluid rounded" src="https://via.placeholder.com/40x40" alt="image">
              </div>
              <div class="col-4">
                <img class="w-100 img-fluid rounded" src="https://via.placeholder.com/40x40" alt="image">
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-4">
                <img class="w-100 img-fluid rounded" src="https://via.placeholder.com/40x40" alt="image">
              </div>
              <div class="col-4">
                <img class="w-100 img-fluid rounded" src="https://via.placeholder.com/40x40" alt="image">
              </div>
              <div class="col-4">
                <img class="w-100 img-fluid rounded" src="https://via.placeholder.com/40x40" alt="image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection