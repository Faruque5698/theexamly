@extends('layout.master')

@section('content')
<div class="content-wrapper px-3 pt-0 pb-0">
  <div class="email-wrapper wrapper">
    <div class="row align-items-stretch">
      <div class="mail-sidebar d-none d-lg-block col-md-2 pt-3 bg-white">
        <div class="menu-bar">
          <ul class="menu-items">
            <li class="compose mb-3"><button class="btn btn-primary btn-block p-3">Compose</button></li>
            <li class="active"><a href="#"><i class="mdi mdi-email-outline"></i> Inbox</a><span class="badge badge-pill badge-success">8</span></li>
            <li><a href="#"><i class="mdi mdi-share"></i> Sent</a></li>
            <li><a href="#"><i class="mdi mdi-file-outline"></i> Draft</a><span class="badge badge-pill badge-warning">4</span></li>
            <li><a href="#"><i class="mdi mdi-upload"></i> Outbox</a><span class="badge badge-pill badge-danger">3</span></li>
            <li><a href="#"><i class="mdi mdi-star-outline"></i> Starred</a></li>
            <li><a href="#"><i class="mdi mdi-delete"></i> Trash</a></li>
          </ul>
          <div class="wrapper">
            <div class="online-status d-flex justify-content-between align-items-center">
              <p class="chat">Chats</p> <span class="status offline online"></span>
            </div>
          </div>
          <ul class="profile-list">
            <li class="profile-list-item"> <a href="#"> <span class="pro-pic"><img src="https://via.placeholder.com/43x43" alt=""></span>
                <div class="user">
                  <p class="u-name">David</p>
                  <p class="u-designation">Python Developer</p>
                </div>
              </a></li>
            <li class="profile-list-item"> <a href="#"> <span class="pro-pic"><img src="https://via.placeholder.com/36x36" alt=""></span>
                <div class="user">
                  <p class="u-name">Stella Johnson</p>
                  <p class="u-designation">SEO Expert</p>
                </div>
              </a></li>
            <li class="profile-list-item"> <a href="#"> <span class="pro-pic"><img src="https://via.placeholder.com/40x40" alt=""></span>
                <div class="user">
                  <p class="u-name">Catherine</p>
                  <p class="u-designation">IOS Developer</p>
                </div>
              </a></li>
            <li class="profile-list-item"> <a href="#"> <span class="pro-pic"><img src="https://via.placeholder.com/92x92" alt=""></span>
                <div class="user">
                  <p class="u-name">John Doe</p>
                  <p class="u-designation">Business Analyst</p>
                </div>
              </a></li>
            <li class="profile-list-item"> <a href="#"> <span class="pro-pic"><img src="https://via.placeholder.com/40x40" alt=""></span>
                <div class="user">
                  <p class="u-name">Daniel Russell</p>
                  <p class="u-designation">Tester</p>
                </div>
              </a></li>
            <li class="profile-list-item"> <a href="#"> <span class="pro-pic"><img src="https://via.placeholder.com/30x30" alt=""></span>
                <div class="user">
                  <p class="u-name">Sarah Graves</p>
                  <p class="u-designation">Admin</p>
                </div>
              </a></li>
            <li class="profile-list-item"> <a href="#"> <span class="pro-pic"><img src="https://via.placeholder.com/40x40" alt=""></span>
                <div class="user">
                  <p class="u-name">Sophia Lara</p>
                  <p class="u-designation">UI/UX</p>
                </div>
              </a></li>
            <li class="profile-list-item"> <a href="#"> <span class="pro-pic"><img src="https://via.placeholder.com/92x92" alt=""></span>
                <div class="user">
                  <p class="u-name">Catherine Myers</p>
                  <p class="u-designation">Business Analyst</p>
                </div>
              </a></li>
            <li class="profile-list-item"> <a href="#"> <span class="pro-pic"><img src="https://via.placeholder.com/92x92" alt=""></span>
                <div class="user">
                  <p class="u-name">Tim</p>
                  <p class="u-designation">PHP Developer</p>
                </div>
              </a></li>
          </ul>
        </div>
      </div>
      <div class="mail-list-container col-md-3 pt-4 pb-4 border-right bg-white">
        <div class="border-bottom pb-4 mb-3 px-3">
          <div class="form-group">
            <input class="form-control w-100" type="search" placeholder="Search mail" id="Mail-rearch">
          </div>
        </div>
        <div class="mail-list">
          <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
          <div class="content">
            <p class="sender-name">David Moore</p>
            <p class="message_text">Hi Emily, Please be informed that the new project presentation is due Monday.</p>
          </div>
          <div class="details">
            <i class="mdi mdi-star-outline"></i>
          </div>
        </div>
        <div class="mail-list new_mail">
          <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked> </label></div>
          <div class="content">
            <p class="sender-name">Microsoft Account Password Change</p>
            <p class="message_text">Change the password for your Microsoft Account using the security code 35525</p>
          </div>
          <div class="details">
            <i class="mdi mdi-star favorite"></i>
          </div>
        </div>
        <div class="mail-list">
          <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
          <div class="content">
            <p class="sender-name">Sophia Lara</p>
            <p class="message_text">Hello, last date for registering for the annual music event is closing in</p>
          </div>
          <div class="details">
            <i class="mdi mdi-star-outline"></i>
          </div>
        </div>
        <div class="mail-list">
          <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
          <div class="content">
            <p class="sender-name">Stella Davidson</p>
            <p class="message_text">Hey there, can you send me this year’s holiday calendar?</p>
          </div>
          <div class="details">
            <i class="mdi mdi-star favorite"></i>
          </div>
        </div>
        <div class="mail-list">
          <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
          <div class="content">
            <p class="sender-name">David Moore</p>
            <p class="message_text">FYI</p>
          </div>
          <div class="details">
            <i class="mdi mdi-star favorite"></i>
          </div>
        </div>
        <div class="mail-list">
          <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
          <div class="content">
            <p class="sender-name">Daniel Russel</p>
            <p class="message_text">Hi, Please find this week’s update..</p>
          </div>
          <div class="details">
            <i class="mdi mdi-star-outline"></i>
          </div>
        </div>
        <div class="mail-list">
          <div class="form-check"><label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
          <div class="content">
            <p class="sender-name">Sarah Graves</p>
            <p class="message_text">Hey, can you send me this year’s holiday calendar ?</p>
          </div>
          <div class="details">
            <i class="mdi mdi-star-outline"></i>
          </div>
        </div>
        <div class="mail-list">
          <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
          <div class="content">
            <p class="sender-name">Bruno King</p>
            <p class="message_text">Hi, Please find this week’s monitoring report in the attachment.</p>
          </div>
          <div class="details">
            <i class="mdi mdi-star-outline"></i>
          </div>
        </div>
        <div class="mail-list">
          <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
          <div class="content">
            <p class="sender-name">Me, Mark</p>
            <p class="message_text">Hi, Testing is complete. The system is ready to go live.</p>
          </div>
          <div class="details">
            <i class="mdi mdi-star-outline"></i>
          </div>
        </div>
        <div class="mail-list">
          <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
          <div class="content">
            <p class="sender-name">Catherine Myers</p>
            <p class="message_text">Template Market: Limited Period Offer!!! 50% Discount on all Templates.</p>
          </div>
          <div class="details">
            <i class="mdi mdi-star favorite"></i>
          </div>
        </div>
        <div class="mail-list">
          <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
          <div class="content">
            <p class="sender-name">Daniel Russell</p>
            <p class="message_text">Hi Emily, Please approve my leaves for 10 days from 10th May to 20th May.</p>
          </div>
          <div class="details">
            <i class="mdi mdi-star-outline"></i>
          </div>
        </div>
        <div class="mail-list">
          <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
          <div class="content">
            <p class="sender-name">Sarah Graves</p>
            <p class="message_text">Hello there, Make the most of the limited period offer. Grab your favorites</p>
          </div>
          <div class="details">
            <i class="mdi mdi-star-outline"></i>
          </div>
        </div>
        <div class="mail-list">
          <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
          <div class="content">
            <p class="sender-name">John Doe</p>
            <p class="message_text">This is the first reminder to complete the online cybersecurity course</p>
          </div>
          <div class="details">
            <i class="mdi mdi-star-outline"></i>
          </div>
        </div>
        <div class="mail-list">
          <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> </label></div>
          <div class="content">
            <p class="sender-name">Bruno</p>
            <p class="message_text">Dear Employee, As per the regulations all employees are required to complete</p>
          </div>
          <div class="details">
            <i class="mdi mdi-star-outline"></i>
          </div>
        </div>
      </div>
      <div class="mail-view d-none d-md-block col-md-9 col-lg-7 bg-white">
        <div class="row">
          <div class="col-md-12 mb-4 mt-4">
            <div class="btn-toolbar">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="mdi mdi-reply text-primary"></i> Reply</button>
                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="mdi mdi-reply-all text-primary"></i>Reply All</button>
                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="mdi mdi-share text-primary"></i>Forward</button>
              </div>
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="mdi mdi-attachment text-primary"></i>Attach</button>
                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="mdi mdi-delete text-primary"></i>Delete</button>
              </div>
            </div>
          </div>
        </div>
        <div class="message-body">
          <div class="sender-details">
            <img class="img-sm rounded-circle mr-3" src="https://via.placeholder.com/92x92" alt="">
            <div class="details">
              <p class="msg-subject"> Weekly Update - Week 19 (May 8, 2017 - May 14, 2017) </p>
              <p class="sender-email"> Sarah Graves <a href="#">itsmesarah268@gmail.com</a> &nbsp;<i class="mdi mdi-account-multiple-plus"></i>
              </p>
            </div>
          </div>
          <div class="message-content">
            <p>Hi Emily,</p>
            <p>This week has been a great week and the team is right on schedule with the set deadline. The team has made great progress and achievements this week. At the current rate we will be able to deliver the product right on time and meet the quality that is expected of us. Attached are the seminar report held this week by our team and the final product design that needs your approval at the earliest.</p>
            <p>For the coming week the highest priority is given to the development for <a href="https://www.bootstrapdash.com/" target="_blank">https://www.bootstrapdash.com/</a> once the design is approved and necessary improvements are made.</p>
            <p><br><br>Regards,<br>Sarah Graves</p>
          </div>
          <div class="attachments-sections">
            <ul>
              <li>
                <div class="thumb"><i class="mdi mdi-file-pdf"></i></div>
                <div class="details">
                  <p class="file-name">Seminar Reports.pdf</p>
                  <div class="buttons">
                    <p class="file-size">678Kb</p>
                    <a href="#" class="view">View</a>
                    <a href="#" class="download">Download</a>
                  </div>
                </div>
              </li>
              <li>
                <div class="thumb"><i class="mdi mdi-file-image"></i></div>
                <div class="details">
                  <p class="file-name">Product Design.jpg</p>
                  <div class="buttons">
                    <p class="file-size">1.96Mb</p>
                    <a href="#" class="view">View</a>
                    <a href="#" class="download">Download</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection