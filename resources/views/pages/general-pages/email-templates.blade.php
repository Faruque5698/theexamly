@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title mb-4">Mail templates</h4>
        <div class="email">
          <div class="table-responsive mb-4">
            <table style="background:#f3f3f3; width:100%;height: 100%;" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td style="padding: 50px;">
                  <table style="width: 550px;margin: 0 auto" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                      <tr style="border-bottom:1px dashed #ddd">
                        <td style="width: 175px;height: 20px;font-family: Roboto;font-size: 18px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.11;letter-spacing: normal;text-align: center;color: #001737;padding-bottom: 22px"> Basic Email Template</td>
                      </tr>
                      <tr>
                        <td style="padding-top: 20px;">
                          <img style="float:left;width:170px;" src="{{ url('assets/images/logo.svg') }}" alt="Logo">
                          <p style="font-family: Roboto;font-size: 13px;font-weight: 500;font-style:
                      normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color:
                      #bbb;float:right;margin-top: 10px; color: #bbb;">The best selling premium email template</p>
                        </td>
                      </tr>
                      <tr>
                        <td style="border-radius: 10px;background: #fff;padding: 30px 60px 20px 60px;margin-top: 10px;display: block;">
                          <p style="font-family: Roboto;font-size: 14px;font-weight: 500;font-style:
                      normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;margin-bottom: 10px;"> Hi Cole Mendoza,</p>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;"> Your account is now verified and you can purchase tokens for the purple. Also you can submit your documents for the KYC from my Account page.</p>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;"> Hope you'll enjoy the experience, we're here if you have any questions, drop us a line at info@yourwebsite.com anytime.</p>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style:
                      normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;margin-bottom: 0px;"> Good luck! Hope it works.</p>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 2.5;letter-spacing: normal;color: #001737;margin-bottom: 0px;"> Purple team</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <table style="width:245px;margin: 20px auto 0 auto;" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                      <td>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 8px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                  <table style="margin: 20px auto 10px auto;" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                      <td style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color: #001737;"> Copyright © 2019 Bootstrapdash. All rights reserved.</td>
                    </tr>
                    <tr>
                      <td style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style:
                      normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color:
                      #bbb;text-align: center; padding-top: 15px; color: #bbb;"> Don't like these emails? <a style="color:inherit;" href="#">Unsubscribe</a>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>
          <div class="table-responsive mb-4">
            <table style="background:#f3f3f3; width:100%;height: 100%;" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td style="padding: 50px;">
                  <table style="width: 550px;margin: 0 auto" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                      <tr style="border-bottom:1px dashed #ddd">
                        <td style="width: 175px;height: 20px;font-family: Roboto;font-size: 18px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.11;letter-spacing: normal;text-align: center;color: #001737;padding-bottom: 22px"> Email Confirm Template</td>
                      </tr>
                      <tr>
                        <td style="padding-top: 20px;">
                          <img style="float:left;width: 170px;" src="{{ url('assets/images/logo.svg') }}" alt="Logo">
                          <p style="font-family: Roboto;font-size: 13px;font-weight: 500;font-style:
                      normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color:
                      #bbb;float:right;margin-top: 10px; color: #bbb;">The best selling premium email template</p>
                        </td>
                      </tr>
                      <tr>
                        <td style="border-radius: 10px;background: #fff;padding: 30px 60px 20px 60px;margin-top: 10px;display: block;">
                          <p style="font-family: Roboto;font-size: 18px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.11;letter-spacing: normal;color: #2b80ff;"> Confirm Your E-Mail Address </p>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: 500;font-style:
                      normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;margin-bottom: 10px;"> Hi Cole Mendoza,</p>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;"> Your account is now verified and you can purchase tokens for the purple. Also you can submit your documents for the KYC from my Account page.</p>
                          <a heref="#" style=" height: 34px;background: linear-gradient(to right, #da8cff, #9a55ff);border: none;color: #fff;padding: 8px 20px;border-radius: 4px;display: inline-block;margin-left: 10px;margin-bottom: 20px;">VERIFY EMAIL</a>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;">
                            <b style="font-size: 20px;margin-right:10px;">OR</b>Follow this link to verify your email address. </p>
                          <a href="#" style="display: block; font-family: Roboto;font-size: 14px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #2b80ff; margin-bottom: 15px;">https://images.unsplash.com/photo-1553531768-a0f91bcfbd3e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2550&q=80</a>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style:
                      normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;margin-bottom: 0px;"> Good luck! Hope it works.</p>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 2.5;letter-spacing: normal;color: #001737;margin-bottom: 0px;"> Purple team</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <table style="width:245px;margin: 20px auto 0 auto;" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                      <td>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 8px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                  <table style="margin: 20px auto 10px auto;" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                      <td style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color: #001737;"> Copyright © 2019 Bootstrapdash. All rights reserved.</td>
                    </tr>
                    <tr>
                      <td style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style:
                      normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color:
                      #bbb;text-align: center; padding-top: 15px; color: #bbb;"> Don't like these emails? <a style="color:inherit;" href="#">Unsubscribe</a>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>
          <div class="table-responsive mb-4">
            <table style="background:#f3f3f3; width:100%;" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td style="padding: 50px;">
                  <table style="width: 550px;height: 100%;margin: 0 auto" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                      <tr style="border-bottom:1px dashed #ddd">
                        <td style="width: 175px;height: 20px;font-family: Roboto;font-size: 18px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.11;letter-spacing: normal;text-align: center;color: #001737;padding-bottom: 22px"> Password Request Template</td>
                      </tr>
                      <tr>
                        <td style="padding-top: 20px;">
                          <img style="float:left;width: 170px;" src="{{ url('assets/images/logo.svg') }}" alt="Logo">
                          <p style="font-family: Roboto;font-size: 13px;font-weight: 500;font-style:
                      normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color:
                      #bbb;float:right;margin-top: 10px; color: #bbb;">The best selling premium email template</p>
                        </td>
                      </tr>
                      <tr>
                        <td style="border-radius: 10px;background: #fff;padding: 30px 60px 20px 60px;margin-top: 10px;display: block;">
                          <p style="font-family: Roboto;font-size: 18px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.11;letter-spacing: normal;color: #2b80ff;"> Reset Password </p>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: 500;font-style:
                      normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;margin-bottom: 10px;"> Hi Cole Mendoza,</p>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;"> Click On The link blow to reset tour password.</p>
                          <a heref="#" style=" height: 34px;background: linear-gradient(to right, #da8cff, #9a55ff);border: none;color: #fff;padding: 8px 20px;border-radius: 4px;display: inline-block;margin-left: 10px;margin-bottom: 20px;">RESET PASSWORD</a>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;"> If you did not make this request, please contact us or ignore this message.</p>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #bbbbbb;"> This is an automatically generated email please do not reply to this email. If you face any issues, please contact us at help@ourwebsite.com</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <table style="width:245px;margin: 20px auto 0 auto;" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                      <td>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 8px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                  <table style="margin: 20px auto 10px auto;" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                      <td style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color: #001737;"> Copyright © 2019 Bootstrapdash. All rights reserved.</td>
                    </tr>
                    <tr>
                      <td style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style:
                      normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color:
                      #bbb;text-align: center; padding-top: 15px; color: #bbb;"> Don't like these emails? <a style="color:inherit;" href="#">Unsubscribe</a>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>
          <div class="table-responsive mb-4">
            <table style="background:#f3f3f3; width:100%;height: 100%;" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td style="padding: 50px;">
                  <table style="width: 550px;margin: 0 auto" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                      <tr style="border-bottom:1px dashed #ddd">
                        <td style="width: 175px;height: 20px;font-family: Roboto;font-size: 18px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.11;letter-spacing: normal;text-align: center;color: #001737;padding-bottom: 22px"> Newslater Email Template</td>
                      </tr>
                      <tr>
                        <td style="padding-top: 20px;">
                          <img style="float:left;width: 170px;" src="{{ url('assets/images/logo.svg') }}" alt="Logo">
                          <p style="font-family: Roboto;font-size: 13px;font-weight: 500;font-style:
                      normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color:
                      #bbb;float:right;margin-top: 10px; color: #bbb;">The best selling premium email template</p>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding-top: 20px;">
                          <img style="max-width: 100%;width:100%;border-radius: 10px;" src="https://via.placeholder.com/8x7" alt="email image">
                        </td>
                      </tr>
                      <tr>
                        <td style="border-radius: 10px;background: #fff;padding: 30px 60px 20px 60px;margin-top: 20px;display: block;">
                          <p style="font-family: Roboto;font-size: 18px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.11;letter-spacing: normal;color: #2b80ff;"> A Succes Story </p>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: 500;font-style:
                      normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;margin-bottom: 10px;"> Hi Cole Mendoza,</p>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                          <a heref="#" style=" height: 34px;background: linear-gradient(to right, #da8cff, #9a55ff);border: none;color: #fff;padding:
                          8px 20px;border-radius: 4px;display: inline-block;margin-left: 10px;margin-bottom:
                          20px; padding: 8px 20px;">Sign up for free now</a>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #bbbbbb;"> or do something else here</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <table style="width:245px;margin: 20px auto 0 auto;" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                      <td>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 8px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                  <table style="margin: 20px auto 10px auto;" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                      <td style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color: #001737;"> Copyright © 2019 Bootstrapdash. All rights reserved.</td>
                    </tr>
                    <tr>
                      <td style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style:
                      normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color:
                      #bbb;text-align: center; padding-top: 15px; color: #bbb;"> Don't like these emails? <a style="color:inherit;" href="#">Unsubscribe</a>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>
          <div class="table-responsive">
            <table style="background:#f3f3f3; width:100%;height: 100%;" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td style="padding: 50px;">
                  <table style="width: 550px;margin: 0 auto" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                      <tr style="border-bottom:1px dashed #ddd">
                        <td style="width: 175px;height: 20px;font-family: Roboto;font-size: 18px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.11;letter-spacing: normal;text-align: center;color: #001737;padding-bottom: 22px"> Ecommerce Email Template</td>
                      </tr>
                      <tr>
                        <td style="padding-top: 20px;">
                          <img style="float:left;width: 170px;" src="{{ url('assets/images/logo.svg') }}" alt="Logo">
                          <p style="font-family: Roboto;font-size: 13px;font-weight: 500;font-style:
                      normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color:
                      #bbb;float:right;margin-top: 10px; color: #bbb;">The best selling premium email template</p>
                        </td>
                      </tr>
                      <tr>
                        <td style="border-radius: 10px;background: #fff;padding: 30px 60px 20px 60px;margin-top: 20px;display: block;">
                          <p style="font-family: Roboto;font-size: 18px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.11;letter-spacing: normal;color: #2b80ff;"> Thanks for Purchase! </p>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;"> Monday, Dec 28 2015 at 4:13 PM</p>
                          <p style="font-family: Roboto;font-size: 14px;font-weight: bold;font-style:
                          normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color:
                          #001737;margin-top: 35px;"> Your Order #00002345</p>
                          <table style="width: 100%;" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                              <tr style="border-bottom:solid 1px #ddd;">
                                <td style="padding-top: 10px;padding-bottom: 10px;font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;"> Oneplus 6T</td>
                                <td style="text-align: right;font-family: Roboto;font-size: 14px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;text-align: right;color: #001737;"> 1</td>
                                <td style="text-align: right;font-family: Roboto;font-size: 14px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;text-align: right;color: #001737;"> $ 599.00</td>
                              </tr>
                              <tr style="border-bottom:solid 1px #ddd;">
                                <td style="padding-top: 10px;padding-bottom: 10px;font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;"> Iphone x</td>
                                <td style="text-align: right;font-family: Roboto;font-size: 14px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;text-align: right;color: #001737;"> 1</td>
                                <td style="text-align: right;font-family: Roboto;font-size: 14px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;text-align: right;color: #001737;"> $ 999.00</td>
                              </tr>
                              <tr style="border-bottom:solid 1px #ddd;">
                                <td style="padding-top: 10px;padding-bottom: 10px;font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;"> iphone 8</td>
                                <td style="text-align: right;font-family: Roboto;font-size: 14px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;text-align: right;color: #001737;"> 1</td>
                                <td style="text-align: right;font-family: Roboto;font-size: 14px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;text-align: right;color: #001737;"> $ 767.87</td>
                              </tr>
                              <tr style="border-bottom:solid 1px #ddd;">
                                <td style="padding-top: 10px;padding-bottom: 10px;font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;"> Iphone 7</td>
                                <td style="text-align: right;font-family: Roboto;font-size: 14px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;text-align: right;color: #001737;"> 1</td>
                                <td style="text-align: right;font-family: Roboto;font-size: 14px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;text-align: right;color: #001737;"> $ 649.00</td>
                              </tr>
                              <tr>
                                <td style="padding-top: 10px;padding-bottom: 10px;font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;"> Subtotal </td>
                                <td style="text-align: right;font-family: Roboto;font-size: 14px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;text-align: right;color: #001737;"> 4</td>
                                <td style="text-align: right;font-family: Roboto;font-size: 14px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;text-align: right;color: #001737;"> $ 3014.87</td>
                              </tr>
                              <tr>
                                <td style="padding-top: 10px;padding-bottom: 10px;font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;"> Tax</td>
                                <td style="text-align: right;font-family: Roboto;font-size: 14px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;text-align: right;color: #001737;"> 10%</td>
                                <td style="text-align: right;font-family: Roboto;font-size: 14px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;text-align: right;color: #001737;"> $ 301.48</td>
                              </tr>
                              <tr style="border-bottom:solid 1px #ddd;">
                                <td style="padding-top: 10px;padding-bottom: 20px;font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;"> Shipping</td>
                                <td style="text-align: right;padding-bottom:20px;font-family: Roboto;font-size: 14px;font-weight: 500;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;text-align: right;color: #001737;">
                                </td>
                                <td style="text-align: right;padding-bottom:20px;font-family: Roboto;font-size:
                                14px;font-weight: 500;font-style: normal;font-stretch: normal;line-height:
                                1.71;letter-spacing: normal;text-align: right;color: #001737;"> $ 9.99</td>
                              </tr>
                              <tr>
                                <td colspan="2" style="font-family: Roboto;font-size: 14px;font-weight: bold;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737; padding-top: 15px;"> Total</td>
                                <td style="text-align: right;font-family: Roboto;font-size: 14px;font-weight: bold;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;text-align: right;color: #001737; padding-top: 15px;"> 3329.34</td>
                              </tr>
                              <tr>
                                <td style="padding-top: 40px;padding-bottom: 15px; font-family: Roboto;font-size: 14px;font-weight: bold;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;"> Your Details</td>
                              </tr>
                            </tbody>
                          </table>
                          <table style="width:100%;">
                            <tbody>
                              <tr style="border-bottom: 1px solid #ddd">
                                <td style="padding-bottom: 15px;font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;" colspan="1">Shipping To </td>
                                <td style="padding-bottom: 15px;font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;" colspan="1">Billed To </td>
                              </tr>
                              <tr style="border-bottom: 1px solid #ddd">
                                <td colspan="1" style="padding-top: 15px;padding-bottom: 25px;">
                                  <span style="display:block;max-width: 150px;font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;"> Cole Mendoza 22 23 rd Street Osbornehaven CA 94108 </span>
                                </td>
                                <td colspan="1" style="padding-top: 15px;padding-bottom: 25px;">
                                  <span style="display:block;max-width: 150px;font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing: normal;color: #001737;"> Cole Mendoza 22 23 rd Street Osbornehaven CA 94108 </span>
                                </td>
                              </tr>
                              <tr>
                                <td style="width:100%; padding-top: 30px;padding-bottom: 20px;font-family: Roboto;font-size: 14px;font-weight:
                                500;-style: normal;font-stretch: normal;line-height: 1.71;letter-spacing:
                                normal;color: #bbbbbb;"> Notice something wrong?<br> Contact our support team and we'll e happy to help.</td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <table style="width:245px;margin: 20px auto 0 auto;" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                      <td>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 8px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;margin-right:15px;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                        <table style="float:left;" cellpadding="0" cellspacing="0" border="0">
                          <tr>
                            <td style="background: #e6e6e6;color:#2b80ff;border-radius: 100%;height: 35px;width: 35px; margin-right:20px;">
                              <img style="display: block;margin: auto;max-width: 15px;" src="https://via.placeholder.com/8x7" alt="facebook">
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                  <table style="margin: 20px auto 10px auto;" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                      <td style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color: #001737;"> Copyright © 2019 Bootstrapdash. All rights reserved.</td>
                    </tr>
                    <tr>
                      <td style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style:
                      normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color:
                      #bbb;text-align: center; padding-top: 15px; color: #bbb;"> Don't like these emails? <a style="color:inherit;" href="#">Unsubscribe</a>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection