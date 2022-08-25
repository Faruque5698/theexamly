@extends('layout.master')
@section('content')

<div>
  <div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Default accordion</h4>
          <p class="card-description">Use class <code>.accordion</code> for basic accordion</p>
          <div class="mt-4">
            <div class="accordion" id="accordion" role="tablist">
              <div class="card">
                <div class="card-header" role="tab" id="heading-1">
                  <h6 class="mb-0">
                    <a data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                      How can I pay for an order I placed?
                    </a>
                  </h6>
                </div>
                <div id="collapse-1" class="collapse show" role="tabpanel" aria-labelledby="heading-1" data-parent="#accordion">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-3">
                        <img src="https://via.placeholder.com/300x300" class="mw-100" alt="image"/>                              
                      </div>
                      <div class="col-9">
                        <p class="mb-0">You can pay for the product you have purchased using credit cards, debit cards, or via online banking. 
                        We also on-delivery services.</p>                          
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="heading-2">
                  <h6 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                      I can’t sign in to my account
                    </a>
                  </h6>
                </div>
                <div id="collapse-2" class="collapse" role="tabpanel" aria-labelledby="heading-2" data-parent="#accordion">
                  <div class="card-body">
                      <p>If while signing in to your account you see an error message, you can do the following</p>
                    <ol class="pl-3 mt-4">
                      <li>Check your network connection and try again</li>
                      <li>Make sure your account credentials are correct while signing in</li>
                      <li>Check whether your account is accessible in your region</li>
                    </ol>
                    <br>
                    <p class="text-success">
                      <i class="ti-alert-octagon mr-2"></i>If the problem persists, you can contact our support.
                    </p>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="heading-3">
                  <h6 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                      Can I add money to the wallet?
                    </a>
                  </h6>
                </div>
                <div id="collapse-3" class="collapse" role="tabpanel" aria-labelledby="heading-3" data-parent="#accordion">
                  <div class="card-body">
                    <p class="mb-0">You can add money to the wallet for any future transaction from your bank account using net-banking, or credit/debit card transaction. The money in the wallet can be used for an easier and faster transaction.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Bordered accordions</h4>
          <p class="card-description">Use class <code>.accordion-bordered</code> for bordered accordions</p>
          <div class="mt-4">
            <div class="accordion accordion-bordered" id="accordion-2" role="tablist">
              <div class="card">
                <div class="card-header" role="tab" id="heading-4">
                  <h6 class="mb-0">
                    <a data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                      How can I pay for an order I placed?
                    </a>
                  </h6>
                </div>
                <div id="collapse-4" class="collapse" role="tabpanel" aria-labelledby="heading-4" data-parent="#accordion-2">
                  <div class="card-body">
                    <p class="mb-0">You can pay for the product you have purchased using credit cards, debit cards, or via online banking. We also provide cash-on-delivery services for most of our products. You can also use your account wallet for payment. </p>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="heading-5">
                  <h6 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                      I can’t sign in to my account
                    </a>
                  </h6>
                </div>
                <div id="collapse-5" class="collapse" role="tabpanel" aria-labelledby="heading-5" data-parent="#accordion-2">
                  <div class="card-body">
                      <p>If while signing in to your account you see an error message, you can do the following</p>
                    <ol class="pl-3">
                      <li>Check your network connection and try again</li>
                      <li>Make sure your account credentials are correct while signing in</li>
                      <li>Check whether your account is accessible in your region</li>
                    </ol>
                    <br>
                    <i class="ti-alert-octagon mr-2"></i>If the problem persists, you can contact our support.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="heading-6">
                  <h6 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse-6" aria-expanded="true" aria-controls="collapse-6">
                      How can I deactivate my account?
                    </a>
                  </h6>
                </div>
                <div id="collapse-6" class="collapse show" role="tabpanel" aria-labelledby="heading-6" data-parent="#accordion-2">
                  <div class="card-body">
                    <p class="mb-0">If you wish to deactivate your account, you can go to the Settings page of your account. Click on Account Settings and then click on Deactivate.
                    You can join again as and when you wish.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Filled accordions</h4>
          <p class="card-description">Use class <code>.accordion-filled</code> for Basic Accordion</p>
          <div class="accordion accordion-filled" id="accordion-7" role="tablist">
            <div class="card">
              <div class="card-header" role="tab" id="heading-7">
                <h5 class="mb-0">
                  <a data-toggle="collapse" href="#collapse-7" aria-expanded="false" aria-controls="collapse-7">
                    Can I transfer the money from the wallet to my bank account?
                  </a>
                </h5>
              </div>
              <div id="collapse-7" class="collapse" role="tabpanel" aria-labelledby="heading-7" data-parent="#accordion-7">
                <div class="card-body">
                  <p class="mb-0">You can at any time reclaim your money to your bank account that you have registered with us. If there are no registered account, then you can add an account in the ‘Register Bank Account’ page.</p>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" role="tab" id="heading-8">
                <h5 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" href="#collapse-8" aria-expanded="true" aria-controls="collapse-8">
                    I forgot my account password. What should I do?
                  </a>
                </h5>
              </div>
              <div id="collapse-8" class="collapse show" role="tabpanel" aria-labelledby="heading-8" data-parent="#accordion-7">
                <div class="card-body">
                  <ol class="pl-3">
                    <li>Click on the ‘forgot password’ link.</li>
                    <li>Enter your email address registered with us</li>
                    <li>Click on the link sent you in the email</li>
                    <li>Reset your password</li>
                  </ol>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" role="tab" id="heading-9">
                <h5 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" href="#collapse-9" aria-expanded="false" aria-controls="collapse-9">
                    What should I do if I need any assistance using my account
                  </a>
                </h5>
              </div>
              <div id="collapse-9" class="collapse" role="tabpanel" aria-labelledby="heading-9" data-parent="#accordion-7">
                <div class="card-body">
                  <p class="mb-0">If you need any assistance while using your account, you can contact our customer support via email at support@abc.com. Or you can live chat with our support team. Our support team is available 24*7</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Solid header accordion</h4>
          <p class="card-description">Use class <code>.accordion-solid-header</code> for basic accordion</p>
          <div class="mt-4">
            <div class="accordion accordion-solid-header" id="accordion-4" role="tablist">
              <div class="card">
                <div class="card-header" role="tab" id="heading-10">
                  <h6 class="mb-0">
                    <a data-toggle="collapse" href="#collapse-10" aria-expanded="true" aria-controls="collapse-10">
                      How can I pay for an order I placed?
                    </a>
                  </h6>
                </div>
                <div id="collapse-10" class="collapse show" role="tabpanel" aria-labelledby="heading-10" data-parent="#accordion-4">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-3">
                        <img src="https://via.placeholder.com/300x300" class="mw-100" alt="image"/>                              
                      </div>
                      <div class="col-9">
                        <p class="mb-0">You can pay for the product you have purchased using credit cards, debit cards, or via online banking. 
                        We also on-delivery services.</p>                             
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="heading-11">
                  <h6 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse-11" aria-expanded="false" aria-controls="collapse-11">
                      I can’t sign in to my account
                    </a>
                  </h6>
                </div>
                <div id="collapse-11" class="collapse" role="tabpanel" aria-labelledby="heading-11" data-parent="#accordion-4">
                  <div class="card-body">
                      <p>If while signing in to your account you see an error message, you can do the following</p>
                    <ol class="pl-3 mt-4">
                      <li>Check your network connection and try again</li>
                      <li>Make sure your account credentials are correct while signing in</li>
                      <li>Check whether your account is accessible in your region</li>
                    </ol>
                    <br>
                    <p class="text-success">
                      <i class="ti-alert-octagon mr-2"></i>If the problem persists, you can contact our support.
                    </p>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="heading-12">
                  <h6 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse-12" aria-expanded="false" aria-controls="collapse-12">
                      Can I add money to the wallet?
                    </a>
                  </h6>
                </div>
                <div id="collapse-12" class="collapse" role="tabpanel" aria-labelledby="heading-12" data-parent="#accordion-4">
                  <div class="card-body">
                    <p class="mb-0">You can add money to the wallet for any future transaction from your bank account using net-banking, or credit/debit card transaction. The money in the wallet can be used for an easier and faster transaction.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Solid content accordion</h4>
          <p class="card-description">Use class <code>.accordion-solid-content</code> for basic accordion</p>
          <div class="mt-4">
            <div class="accordion accordion-solid-content" id="accordion-5" role="tablist">
              <div class="card">
                <div class="card-header" role="tab" id="heading-13">
                  <h6 class="mb-0">
                    <a data-toggle="collapse" href="#collapse-13" aria-expanded="true" aria-controls="collapse-13">
                      How can I pay for an order I placed?
                    </a>
                  </h6>
                </div>
                <div id="collapse-13" class="collapse show" role="tabpanel" aria-labelledby="heading-13" data-parent="#accordion-5">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-3">
                        <img src="https://via.placeholder.com/300x300" class="mw-100" alt="image"/>                              
                      </div>
                      <div class="col-9">
                        <p class="mb-0">You can pay for the product you have purchased using credit cards, debit cards, or via online banking. 
                        We also on-delivery services.</p>                             
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="heading-14">
                  <h6 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse-14" aria-expanded="false" aria-controls="collapse-14">
                      I can’t sign in to my account
                    </a>
                  </h6>
                </div>
                <div id="collapse-14" class="collapse" role="tabpanel" aria-labelledby="heading-14" data-parent="#accordion-5">
                  <div class="card-body">
                      <p>If while signing in to your account you see an error message, you can do the following</p>
                    <ol class="pl-3 mt-4">
                      <li>Check your network connection and try again</li>
                      <li>Make sure your account credentials are correct while signing in</li>
                      <li>Check whether your account is accessible in your region</li>
                    </ol>
                    <br>
                    <p class="text-danger">
                      <i class="ti-alert-octagon mr-2"></i>If the problem persists, you can contact our support.
                    </p>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="heading-15">
                  <h6 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse-15" aria-expanded="false" aria-controls="collapse-15">
                      Can I add money to the wallet?
                    </a>
                  </h6>
                </div>
                <div id="collapse-15" class="collapse" role="tabpanel" aria-labelledby="heading-15" data-parent="#accordion-5">
                  <div class="card-body">
                    <p class="mb-0">You can add money to the wallet for any future transaction from your bank account using net-banking, or credit/debit card transaction. The money in the wallet can be used for an easier and faster transaction.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Multi colored accordion</h4>
          <p class="card-description">Use class <code>.accordion-multi-colored</code> for basic accordion</p>
          <div class="mt-4">
            <div class="accordion accordion-multi-colored" id="accordion-6" role="tablist">
              <div class="card">
                <div class="card-header" role="tab" id="heading-16">
                  <h6 class="mb-0">
                    <a data-toggle="collapse" href="#collapse-16" aria-expanded="false" aria-controls="collapse-16">
                      How can I pay for an order I placed?
                    </a>
                  </h6>
                </div>
                <div id="collapse-16" class="collapse" role="tabpanel" aria-labelledby="heading-16" data-parent="#accordion-6">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-3">
                        <img src="https://via.placeholder.com/300x300" class="mw-100" alt="image"/>                              
                      </div>
                      <div class="col-9">
                        <p class="mb-0">You can pay for the product you have purchased using credit cards, debit cards, or via online banking. 
                        We also on-delivery services.</p>                             
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="heading-17">
                  <h6 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse-17" aria-expanded="false" aria-controls="collapse-17">
                      I can’t sign in to my account
                    </a>
                  </h6>
                </div>
                <div id="collapse-17" class="collapse" role="tabpanel" aria-labelledby="heading-17" data-parent="#accordion-6">
                  <div class="card-body">
                      <p>If while signing in to your account you see an error message, you can do the following</p>
                    <ol class="pl-3 mt-4">
                      <li>Check your network connection and try again</li>
                      <li>Make sure your account credentials are correct while signing in</li>
                      <li>Check whether your account is accessible in your region</li>
                    </ol>
                    <br>
                    <p class="text-danger">
                      <i class="ti-alert-octagon mr-2"></i>If the problem persists, you can contact our support.
                    </p>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" role="tab" id="heading-18">
                  <h6 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse-18" aria-expanded="true" aria-controls="collapse-18">
                      Can I add money to the wallet?
                    </a>
                  </h6>
                </div>
                <div id="collapse-18" class="collapse show" role="tabpanel" aria-labelledby="heading-18" data-parent="#accordion-6">
                  <div class="card-body">
                    <p class="mb-0">You can add money to the wallet for any future transaction from your bank account using net-banking, or credit/debit card transaction. The money in the wallet can be used for an easier and faster transaction.</p>
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