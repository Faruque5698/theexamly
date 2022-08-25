@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('public/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
    {!! Html::script('public/jquery-2.2.4.js') !!}
    {!! Html::script('public/assets/bootstrap/bootstrap.min.js') !!}
@endpush

@section('content')

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Settings</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>System Settings</span></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card-body">

                @if($product!== null)
                    {!! Form::model($product, ['method'=>'PUT','route' => ['admin.settings.update', $product->id ?? ''],'id'=>'settingsForm','class'=>'cmxform','enctype'=>"multipart/form-data"]) !!}
                  @else
                    {!! Form::open(['route' => 'admin.settings.store', 'method' => 'post','id'=>'settingsForm','enctype'=>"multipart/form-data"]) !!}
                @endif

                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">General</a>
                      <a class="nav-item nav-link" id="nav-settings-tab" data-toggle="tab" href="#nav-settings" role="tab" aria-controls="nav-settings" aria-selected="false">Email</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">SMS</a>
                      <a class="nav-item nav-link" id="nav-messages-tab" data-toggle="tab" href="#nav-messages" role="tab" aria-controls="nav-messages" aria-selected="false">Payment</a>
                      <a class="nav-item nav-link" id="nav-social-tab" data-toggle="tab" href="#nav-social" role="tab" aria-controls="nav-social" aria-selected="false">Social Link</a>
                      <a class="nav-item nav-link" id="nav-logo-tab" data-toggle="tab" href="#nav-logo" role="tab" aria-controls="nav-logo" aria-selected="false">Logo</a>
                      <a class="nav-item nav-link" id="nav-site-block-tab" data-toggle="tab" href="#nav-site-block" role="tab" aria-controls="nav-site-block" aria-selected="false">Site Block</a>    
                  </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">Name</label><span class="requiredStar" style="color: red"> * </span>
                            <input type="text" class="form-control" name="school_name" value="{{ $product!==null ? $product->name:'' }}" required>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">Motto</label>
                            <input type="text" class="form-control" name="motto" id="motto" value="{{ $product!==null ? $product->motto:'' }}">
                            <p style="color: #725a5a">*Note: &nbsp;maximum character should not exceed 50.</p>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">Site Title</label><span class="requiredStar" style="color: red"> * </span>
                            <input type="text" class="form-control" name="site_title" value="{{ $product!==null ? $product->site_title:'' }}" required>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">Phone</label><span class="requiredStar" style="color: red"> * </span>
                            <input type="text" class="form-control" name="phone" value="{{ $product!==null ? $product->phone:'' }}" required>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">Email</label><span class="requiredStar" style="color: red"> * </span>
                            <input type="text" class="form-control" name="email" value="{{ $product!==null ? $product->email:'' }}" required>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">Currency Symbol</label>
                            <input type="text" class="form-control" name="currency_symbol" value="{{ $product!==null ? $product->currency_symbol:'' }}">
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">Timezone</label>
                            <select class="form-control select2" name="timezone">
                              <option value=""></option>
                              {{-- {{ create_timezone_option(('timezone')) }} --}}
                            </select>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">Language</label>
                            <select class="form-control" name="language">
                                <option value="">Select One...</option>
                                <option value="English"@if($product !== null && $product->language=="English") selected @endif>English</option>
                                <option value="Bangla"@if($product !== null && $product->language=="Bangla") selected @endif>Bangla</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">Address</label>
                            <textarea class="form-control" name="address">@if($product!==null){{$product->address}}@endif</textarea>
                            {{-- <input type="text" class="form-control" name="address"
                                    value="{{ $product!==null ? $product->address:'' }}" required> --}}
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="tab-pane fade" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">Mail Type</label>
                            <select class="form-control niceselect wide" name="mail_type" id="mail_type">
                              <option value="mail" {{ ('mail_type')=="mail" ? "selected" : "" }}
                                @if($product !== null && $product->mail_type=="mail") selected @endif>PHP Mail</option>
                              <option value="smtp" {{ ('mail_type')=="smtp" ? "selected" : "" }}
                                @if($product !== null && $product->mail_type=="smtp") selected @endif>SMTP</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">From Email</label>
                            <input type="text" class="form-control" name="from_email"
                                value="{{ $product!==null ? $product->from_email:'' }}">
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">From Name</label>
                            <input type="text" class="form-control" name="from_name"
                                value="{{ $product!==null ? $product->from_name:'' }}">
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">SMTP Host</label>
                            <input type="text" class="form-control smtp" name="smtp_host"
                                value="{{ $product!==null ? $product->smtp_host:'' }}">
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">SMTP Port</label>
                            <input type="text" class="form-control smtp" name="smtp_port"
                                value="{{ $product!==null ? $product->smtp_port:'' }}">
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">SMTP Username</label>
                            <input type="text" class="form-control smtp" autocomplete="off" name="smtp_username"
                                value="{{ $product!==null ? $product->smtp_username:'' }}">
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">SMTP Password</label>
                            <input type="password" class="form-control smtp" autocomplete="off" name="smtp_password"
                                value="{{ $product!==null ? $product->smtp_password:'' }}">
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">SMTP Encryption</label>
                            <select class="form-control smtp" name="smtp_encryption">
                                <option value="ssl" {{ ('smtp_encryption')=="ssl" ? "selected" : "" }}
                                @if($product !== null && $product->smtp_encryption=="ssl") selected @endif>SSL</option>
                                <option value="tls" {{ ('smtp_encryption')=="tls" ? "selected" : "" }}
                                @if($product !== null && $product->smtp_encryption=="tls") selected @endif>TLS</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label">SMS API URL</label>
                            <input type="text" class="form-control" name="api_url" value="{{ $product!==null ? $product->sms_api_url:'' }}">
                          </div>
                        </div>

                        <div class="col-md-6 clear">
                          <div class="form-group">
                            <label class="control-label">SID</label>
                            <input type="text" class="form-control" name="sid" value="{{ $product!==null ? $product->sid:'' }}">
                          </div>
                        </div>

                        <div class="col-md-6 clear">
                          <div class="form-group">
                            <label class="control-label">Token / Username</label>
                            <input type="text" class="form-control" name="user_name" value="{{ $product!==null ? $product->sms_username:'' }}">
                          </div>
                        </div>

                        <div class="col-md-6 clear">
                          <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" class="form-control" name="password"
                                value="{{ $product!==null ? $product->sms_password:'' }}">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="nav-messages" role="tabpanel" aria-labelledby="nav-messages-tab">
                    <div class="row">
                      <h5 style="margin-left: 1%">SSL</h5>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">SSL Active</label>
                          <select class="form-control" name="ssl_active">
                            <option value="Yes" @if($product !== null && $product->ssl_active=="Yes") selected @endif></option>
                            <option value="No" @if($product !== null && $product->ssl_active=="No") selected @endif>No</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Customer Name</label>
                          <input type="text" class="form-control" name="customer_name" value="{{ $product!==null ? $product->customer_name:'' }}">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Customer Email</label>
                          <input type="text" class="form-control" name="customer_email" value="{{ $product!==null ? $product->customer_email:'' }}">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Customer Phone</label>
                          <input type="text" class="form-control" name="customer_phone" value="{{ $product!==null ? $product->customer_phone:'' }}">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Gateway link</label>
                          <input type="text" class="form-control" name="gateway_link" value="{{ $product!==null ? $product->gateway_link:'' }}">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Store Id</label>
                          <input type="text" class="form-control" name="store_id" value="{{ $product!==null ? $product->store_id:'' }}">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Store Password</label>
                          <input type="password" class="form-control" name="store_password" value="{{ $product!==null ? $product->store_password:'' }}">
                        </div>
                      </div>                          
                    </div>
                  </div>

                  <div class="tab-pane fade" id="nav-social" role="tabpanel" aria-labelledby="nav-social-tab">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Facebook</label>
                          <input type="text" class="form-control" name="facebook" 
                          value="{{ $product !== null ? $product->facebook:'' }}" placeholder="https://www.facebook.com/">
                        </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                            <label class="control-label">Twitter</label>
                            <input type="text" class="form-control" name="twitter" value="{{ $product!==null ? $product->twitter:'' }}" placeholder="https://twitter.com/">
                          </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Youtube</label>
                          <input type="text" class="form-control" name="youtube" value="{{ $product!==null ? $product->youtube:'' }}" placeholder="https://www.youtube.com/">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Instagram</label>
                          <input type="text" class="form-control" name="instagram"
                                value="{{ $product!==null ? $product->instagram:'' }}" placeholder="https://www.instagram.com/">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">LinkedIn</label>
                          <input type="text" class="form-control" name="linkedin"
                                value="{{ $product!==null ? $product->linkedin:'' }}" placeholder="https://www.linkedin.com/">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="nav-logo" role="tabpanel" aria-labelledby="nav-logo-tab">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          @if($product != null)
                            <img id='img' src="{{ asset('/public/uploads/files/logo/') }}/{{$product->image }}" style="width:200px; height:100px; margin-left:25px; margin-bottom: 10px">
                          @else
                            <img id='img' src="{{ asset('/public/uploads/default.jpg') }}" style="width:100px; height:100px;  margin-left:25px; margin-bottom: 10px">
                          @endif
                          <br>
                          <label class="control-label">Upload Logo</label>
                          <input type="file" class="form-control dropify" name="image" id="image" data-max-file-size="2M" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" data-default-file="">
                                {{-- {!! Form::file('image', ['class' => 'checkImage form-control dropify','id'=>'image','aria-describedby' => 'image','placeholder'=>'select a Image', 'onclick' => 'this.value = null', '(change)' => "onChange($event)"]) !!} --}}
                                {{-- <span class="validation-msg" id="type-error">
                                    @error('image'){{ $message }}@enderror
                                </span> --}}
                          <br>

                          <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>Image Dimension must be 250x250 and size has to be less than 2 MB</p>
                          <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>Image format has to be either .jpeg .jpg or .png</p>

                        </div>
                      </div>
                    </div>
                  </div> 
                  <div class="tab-pane fade" id="nav-site-block" role="tabpanel" aria-labelledby="nav-site-block-tab">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          @if($product->reg_url != null)
                            <input type="checkbox" class="" name="reg_url" 
                            value="{{ $product->reg_url }}" {{  ($product->reg_url == 1 ? ' checked' : '') }}><label class="control-label">&nbsp;Registration URL</label>
                          @else
                            <input type="checkbox" class="" name="reg_url" 
                            value="1" {{  ($product->reg_url == 1 ? ' checked' : '') }}><label class="control-label">&nbsp;Registration URL</label>
                          @endif 
                          @if($product->buy_course_url != null) 
                            <input type="checkbox" class="" name="buy_course_url" 
                            value="{{ $product->buy_course_url }}" {{  ($product->buy_course_url == 1 ? ' checked' : '') }}><label class="control-label">&nbsp;Buy Course URL</label>
                          @else
                            <input type="checkbox" class="" name="buy_course_url" 
                            value="1" {{  ($product->buy_course_url == 1 ? ' checked' : '') }}><label class="control-label">&nbsp;Buy Course URL</label>
                          @endif
                          @if($product->login_url != null) 
                            <input type="checkbox" class="" name="login_url" 
                            value="{{ $product->login_url }}" {{  ($product->login_url == 1 ? ' checked' : '') }}><label class="control-label">&nbsp;Login URL</label>
                           @else
                            <input type="checkbox" class="" name="login_url" 
                            value="1" {{  ($product->login_url == 1 ? ' checked' : '') }}><label class="control-label">&nbsp;Login URL</label>
                          @endif
                          @if($product->moodle_button != null) <br>
                            <input type="checkbox" class="" name="moodle_button" 
                            value="{{ $product->moodle_button }}" {{  ($product->moodle_button == 1 ? ' checked' : '') }}><label  class="control-label">&nbsp;Moodle Button</label>
                           @else<br>
                            <input type="checkbox" class="" name="moodle_button" 
                            value="1" {{  ($product->moodle_button == 1 ? ' checked' : '') }}><label class="control-label">&nbsp;Moodle Access</label>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div></br>

                <div class="form-group text-right">
                  {!! Form::submit($product!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                  <a type="button" href="{{ route('admin.settings.index') }}" class="btn btn-danger">Cancel</a>
                </div>
              {!! Form::close() !!}
           </div>
        </div>
    </div>
  </div>
@endsection

@push('plugin-scripts')
    {!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('public/assets/js/img-preview.js') !!}
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/data-table.js') !!}
    {!! Html::script('public/assets/js/toastDemo.js') !!}
    {!! Html::script('public/assets/js/validation/settingsForm-validation.js') !!}

    <script type="text/javascript">
        $(document).ready(function () {
            @if (session('success'))
            showSuccessToast('{{ session("success") }}');
            @elseif(session('warning'))
            showWarningToast('{{ session("warning") }}');
            @endif
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script type="text/javascript">
        if($("#mail_type").val() != "smtp"){
        $(".smtp").prop("disabled",true);
      }
      $(document).on("change","#mail_type",function(){
        if( $(this).val() != "smtp" ){
            $(".smtp").prop("disabled",true);
        }else{
            $(".smtp").prop("disabled",false);
        }
      });
    </script>
@endpush
