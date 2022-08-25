@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-md-12 col-xl-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic Tab</h4>
        <p class="card-description">Horizontal bootstrap tab</p>
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home-1" role="tab" aria-controls="home-1" aria-selected="true">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-1" role="tab" aria-controls="profile-1" aria-selected="false">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab" aria-controls="contact-1" aria-selected="false">Contact</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="home-1" role="tabpanel" aria-labelledby="home-tab">
            <div class="media">
              <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/300x300" alt="sample image">
              <div class="media-body">
                <h4 class="mt-0">Why choose us?</h4>
                <p>
                    Far curiosity incommode now led smallness allowance. Favour bed assure son things yet. She consisted 
                    consulted elsewhere happiness disposing household any old the. Widow downs you new shade drift hopes 
                    small. So otherwise commanded sweetness we improving. Instantly by daughters resembled unwilling principle 
                    so middleton.
                </p>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
            <div class="media">
              <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/92x92" alt="sample image">
              <div class="media-body">
                <h4 class="mt-0">John Doe</h4>
                <p>
                    Fail most room even gone her end like. Comparison dissimilar unpleasant six compliment two unpleasing 
                    any add. Ashamed my company thought wishing colonel it prevent he in. Pretended residence are something 
                    far engrossed old off.
                </p>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
            <h4>Contact us </h4>
            <p>
              Feel free to contact us if you have any questions!
            </p>
            <p>
              <i class="ti-headphone-alt text-info"></i>
              +123456789
            </p>
            <p>
              <i class="ti-email text-success"></i>
              contactus@example.com
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-6 grid-margin stretch-card d-none d-md-flex">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Vertical Tabs</h4>
        <p class="card-description">Add class <code>.nav-tabs-vertical</code> to <code>.nav</code> and 
          <code>.tab-content-vertical</code> to <code>.tab-content</code>
        </p>
        <div class="row">
          <div class="col-4">
            <ul class="nav nav-tabs nav-tabs-vertical" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab-vertical" data-toggle="tab" href="#home-2" role="tab" aria-controls="home-2" aria-selected="true">
                Home
                <i class="ti-home text-info ml-2"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab-vertical" data-toggle="tab" href="#profile-2" role="tab" aria-controls="profile-2" aria-selected="false">
                Profile
                <i class="ti-user text-danger ml-2"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab-vertical" data-toggle="tab" href="#contact-2" role="tab" aria-controls="contact-2" aria-selected="false">
                Reach
                <i class="ti-email text-success ml-2"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-8">
            <div class="tab-content tab-content-vertical">
              <div class="tab-pane fade show active" id="home-2" role="tabpanel" aria-labelledby="home-tab-vertical">
                <div class="text-center">
                  <img class="mr-3 w-25 mb-4" src="https://via.placeholder.com/300x300" alt="sample image">                            
                </div>
                <p>
                    Inhabiting discretion the her dispatched decisively boisterous joy. So form were wish open 
                    is able of mile of. Waiting express if prevent it we an musical. Especially reasonable travelling 
                </p>
              </div>
              <div class="tab-pane fade" id="profile-2" role="tabpanel" aria-labelledby="profile-tab-vertical">
                <div class="text-center">
                  <img class="mb-3 w-25 rounded" src="https://via.placeholder.com/43x43" alt="sample image">
                  <h5 class="mt-0">Adam John</h5>
                  <p class="mb-0">UX specialist</p>
                  <p class="mb-0">Florida</p>
                </div>
              </div>
              <div class="tab-pane fade" id="contact-2" role="tabpanel" aria-labelledby="contact-tab-vertical">
                <h4>Contact us </h4>
                <p>
                  Feel free to contact us if you have any questions!
                </p>
                <p>
                  <i class="ti-headphone-alt text-info"></i>
                  +123456789
                </p>
                <p>
                  <i class="ti-email text-success"></i>
                  contactus@example.com
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 grid-margin stretch-card d-none d-md-flex">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Custom vertical tab</h4>
        <p class="card-description">Add class <code>.nav-tabs-vertical-custom</code> to <code>.nav</code>
        and <code>.tab-content-vertical-custom</code> to <code>.tab-content</code></p>
        <div class="row">
          <div class="col-3">
            <ul class="nav nav-tabs nav-tabs-vertical-custom" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab-custom" data-toggle="tab" href="#home-3" role="tab" aria-controls="home-3" aria-selected="true">
                  Playing Video Games With Imagination
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab-custom" data-toggle="tab" href="#profile-3" role="tab" aria-controls="profile-3" aria-selected="false">
                  Getting Free Publicity For Your Business
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab-custom" data-toggle="tab" href="#contact-3" role="tab" aria-controls="contact-3" aria-selected="false">
                  Tips For Designing An Effective Business Card
                </a>
              </li>
            </ul>
          </div>
          <div class="col-9 col-lg-6">
            <div class="tab-content tab-content-vertical tab-content-vertical-custom">
              <div class="tab-pane fade show active" id="home-3" role="tabpanel" aria-labelledby="home-tab-custom">
                <h6 class="font-weight-normal">Profiles Of The Powerful Advertising Exec Steve Grasse</h6>
                <h3 class="font-weight-normal">How To Write Better Advertising Copy</h3>
                <div class="d-flex mt-4">
                    <img src="https://via.placeholder.com/300x300" class="w-25 h-100 rounded" alt="image"/>
                    <img src="https://via.placeholder.com/300x300" class="w-25 h-100 ml-2 rounded" alt="image"/>                              
                </div>
                <p class="mt-4">
                    The key to victory is discipline, and that means a well made bed. You will practice until you can make 
                    your bed in your sleep. You don't know how to do any of those. Then throw her in the laundry room, which 
                    will hereafter be referred to as "the brig".
                </p>
              </div>
              <div class="tab-pane fade" id="profile-3" role="tabpanel" aria-labelledby="profile-tab-custom">
                <div class="media">
                  <img class="align-self-center mr-3 w-25 rounded" src="https://via.placeholder.com/300x300" alt="sample image">
                  <div class="media-body">
                    <p>
                        And until then, I can never die? I'm a thing. Fry, you can't just sit here in the dark listening to 
                        classical music. Is today's hectic lifestyle making you tense and impatient? Is today's hectic lifestyle 
                        making you tense and impatient?
                    </p>
                    <p>
                        Robot 1-X, save my friends! And Zoidberg! Aww, it's true. I've been hiding it for so long. Fry, we have a 
                        crate to deliver. Yes! In your face, Gandhi! Interesting. No, wait, the other thing: tedious.
                    </p>
                    <p>
                        Five hours? Aw, man! Couldn't you just get me the death penalty? Yes! In your face, Gandhi! We're rescuing 
                        ya. Yeah, I do that with my stupidness. With gusto.
                    </p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="contact-3" role="tabpanel" aria-labelledby="contact-tab-custom">
                <div class="media">
                  <div class="media-body">
                    <h5 class="mt-0 mb-1">You've swallowed a planet!</h5>
                    Did I mention we have comfy chairs? You hate me; you want to kill me! Well, go on! Kill me! KILL ME! I'm the Doctor, 
                    I'm worse than everyone's aunt. *catches himself* And that is not how I'm introducing myself.
                  </div>
                  <img class="ml-3 w-25" src="https://via.placeholder.com/300x300" alt="sample image">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Pills</h4>
        <p class="card-description">Basic nav pills</p>
        <ul class="nav nav-pills nav-pills-success" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="media">
              <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/300x300" alt="sample image">
              <div class="media-body">
                <h5 class="mt-0">I'm doing mental jumping jacks.</h5>
                <p>Only you could make those words cute. Oh I beg to differ, I think we have a lot to discuss. After all, you are a client. I am not a killer. I feel like a 
                  jigsaw puzzle missing a piece. And I'm not even sure what the picture should be.</p>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="media">
              <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/300x300" alt="sample image">
              <div class="media-body">
                <p>I'm thinking two circus clowns dancing. You? Finding a needle in a haystack isn't hard when every straw is computerized. Tell him time is of the essence. 
                  Somehow, I doubt that. You have a good heart, Dexter.</p>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="media">
              <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/300x300" alt="sample image">
              <div class="media-body">
                <p>
                    I'm really more an apartment person. This man is a knight in shining armor. Oh I beg to differ, I think we have a lot to discuss. After all, you are a client. You all right, Dexter?
                </p>
                <p>
                    I'm generally confused most of the time. Cops, another community I'm not part of. You're a killer. I catch killers. Hello, Dexter Morgan.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12 col-xl-6 grid-margin stretch-card d-none d-md-flex">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Vertical Pills</h4>
        <p class="card-description">Add class <code>.nav-pills-vertical</code> to <code>.nav</code> and 
          <code>.tab-content-vertical</code> to <code>.tab-content</code>
        </p>
        <div class="row">
          <div class="col-4">
            <ul class="nav nav-pills nav-pills-vertical nav-pills-info" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <li class="nav-item">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                  <i class="ti-home"></i>
                  Home
                </a>                          
              </li>
              <li class="nav-item">
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                  <i class="ti-user"></i>
                  Profile
                </a>                          
              </li>
              <li class="nav-item">
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                  <i class="ti-email"></i>
                  Reach
                </a>                          
              </li>
            </ul>
          </div>
          <div class="col-8">
            <div class="tab-content tab-content-vertical" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="media">
                  <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/300x300" alt="sample image">
                  <div class="media-body">
                    <h5 class="mt-0">I'm doing mental jumping jacks.</h5>
                    <p>
                      Only you could make those words cute. Oh I beg to differ, I think we have a lot to discuss. After all, 
                      you are a client. I am not a killer. 
                    </p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="media">
                  <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/300x300" alt="sample image">
                  <div class="media-body">
                    <p>I'm thinking two circus clowns dancing. You? Finding a needle in a haystack isn't hard when every straw is computerized. Tell him time is of the essence. 
                      Somehow, I doubt that. You have a good heart, Dexter.</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <div class="media">
                  <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/300x300" alt="sample image">
                  <div class="media-body">
                    <p>
                        I'm really more an apartment person. This man is a knight in shining armor. Oh I beg to differ, I think we have a lot to discuss. After all, you are a client. You all right, Dexter?
                    </p>
                    <p>
                        I'm generally confused most of the time. Cops, another community I'm not part of. You're a killer. I catch killers. Hello, Dexter Morgan.
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
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Custom pills</h4>
        <p class="card-description">Add class <code>.nav-pills-custom</code> and <code>.tab-content-custom-pill</code> to <code>.nav-pills</code> and <code>.tab-content</code></p>
        <div class="row">
          <div class="col-md-10 mx-auto">
            <ul class="nav nav-pills nav-pills-custom" id="pills-tab-custom" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab-custom" data-toggle="pill" href="#pills-health" role="tab" aria-controls="pills-home" aria-selected="true">
                  Health
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab-custom" data-toggle="pill" href="#pills-career" role="tab" aria-controls="pills-profile" aria-selected="false">
                  Career
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab-custom" data-toggle="pill" href="#pills-music" role="tab" aria-controls="pills-contact" aria-selected="false">
                  Music
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-vibes-tab-custom" data-toggle="pill" href="#pills-vibes" role="tab" aria-controls="pills-contact" aria-selected="false">
                  Vibes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-energy-tab-custom" data-toggle="pill" href="#pills-energy" role="tab" aria-controls="pills-contact" aria-selected="false">
                  Energy
                </a>
              </li>
            </ul>
            <div class="tab-content tab-content-custom-pill" id="pills-tabContent-custom">
              <div class="tab-pane fade show active" id="pills-health" role="tabpanel" aria-labelledby="pills-home-tab-custom">
                <div class="d-flex mb-4">
                  <img src="https://via.placeholder.com/300x300" class="w-25 h-100 rounded" alt="sample image">
                  <img src="https://via.placeholder.com/300x300" class="w-25 h-100 ml-4 rounded" alt="sample image">
                  <img src="https://via.placeholder.com/300x300" class="w-25 h-100 ml-4 rounded" alt="sample image">
                </div>
                <p>
                    I'm not the monster he wants me to be. So I'm neither man nor beast. I'm something new entirely. With 
                    my own set of rules. I'm Dexter. Boo. Only you could make those words cute. I'm thinking two circus clowns dancing. You?
                </p>
                <p>
                    Under normal circumstances, I'd take that as a compliment. Tell him time is of the essence. I'm really more 
                    an apartment person. Finding a needle in a haystack isn't hard when every straw is computerized.
                </p>
              </div>
              <div class="tab-pane fade" id="pills-career" role="tabpanel" aria-labelledby="pills-profile-tab-custom">
                <div class="media">
                  <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/300x300" alt="sample image">
                  <div class="media-body">
                    <p>I'm thinking two circus clowns dancing. You? Finding a needle in a haystack isn't hard when every straw is 
                      computerized. Tell him time is of the essence. 
                      Somehow, I doubt that. You have a good heart, Dexter.</p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-music" role="tabpanel" aria-labelledby="pills-contact-tab-custom">
                <div class="media">
                  <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/300x300" alt="sample image">
                  <div class="media-body">
                    <p>
                        I'm really more an apartment person. This man is a knight in shining armor. Oh I beg to differ, 
                        I think we have a lot to discuss. After all, you are a client. You all right, Dexter?
                    </p>
                    <p>
                        I'm generally confused most of the time. Cops, another community I'm not part of. You're a killer. 
                        I catch killers. Hello, Dexter Morgan.
                    </p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-vibes" role="tabpanel" aria-labelledby="pills-vibes-tab-custom">
                <div class="media">
                  <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/300x300" alt="sample image">
                  <div class="media-body">
                    <p>
                        This man is a knight in shining armor. I feel like a jigsaw puzzle missing a piece. And I'm not 
                        even sure what the picture should be. Somehow, I doubt that. You have a good heart, Dexter. Keep your mind limber.
                    </p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="pills-energy" role="tabpanel" aria-labelledby="pills-energy-tab-custom">
                <div class="media">
                  <img class="mr-3 w-25 rounded" src="https://via.placeholder.com/300x300" alt="sample image">
                  <div class="media-body">
                    <p>
                        Finding a needle in a haystack isn't hard when every straw is computerized. You're a killer. I catch killers. 
                        I will not kill my sister. I will not kill my sister. I will not kill my sister. Rorschach would say you have a hard time relating to others.
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
@endsection