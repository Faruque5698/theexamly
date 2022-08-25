@extends('frontend.layout.master')


@section('content')
<!-- page title -->
<section class="page_title">
    <div class="page_title_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_overlay_content text-center">
                        <h2>Admission</h2>
                        <ul>
                            <li><a href="{{ route('frontend.index') }}">Home</a></li>
                            <li>
                                <span><i class="fas fa-angle-double-right"></i></span>
                            </li>
                            <li>
                                <a class="active" href="{{ route('frontend.showAdmissionForm') }}">Online Admission</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- events -->
<section class="event_page">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-title text-center">{{ $course_name }}</h4>
                      <h5 class="card-title text-center">{{ $name }} - {{ $phone }}</h5>
                      <form class="cmxform" id="frontedAdmitForm" method="post" action="{{ route('admission.form.store') }}" enctype="multipart/form-data">
                          @csrf
                        <fieldset>
                          <div class="form-group" style="display: none">
                            <label for="name">Student's Full Name<span class="requiredStar" style="color: red"> * </span></label>
                            <input id="name" class="form-control" name="name" value="{{ $name }}" type="text" required readonly style="cursor: not-allowed">
                          </div>
                          <div class="form-group" style="display: none">
                              <label for="designation">Student's Phone No<span class="requiredStar" style="color: red"> * </span></label>
                              <input id="phone" class="form-control" type="text" name="phone" value="{{ $phone }}" required readonly style="cursor: not-allowed">
                          </div>
                          <div class="form-group">
                              <label for="designation">Student's Email Address</label>
                              <input id="email" class="form-control" type="email" name="email" value="{{ $email }}" required readonly style="cursor: not-allowed">
                          </div>
                          <div class="form-group" style="display: none">
                            <label for="course_name">Course Name</label> <span class="requiredStar" style="color: red"> * </span>
                            <input id="course_name" class="form-control" type="text" name="course_name" value="{{ $course_name2 }}" required readonly style="cursor: not-allowed">
                          </div> 
                          <div class="form-group" style="display: none">
                            <label for="batch_id">Batch Name</label> <span class="requiredStar" style="color: red"> * </span>
                            <input id="batch_name" class="form-control" type="text" name="batch_name" value="{{ $batch_name }}" required>
                          </div>
                          <div class="form-group" style="display: none">
                            <label for="password">Login Password<span class="requiredStar" style="color: red"> * </span></label>
                            <input id="password" class="form-control" type="Password" minlength="8" name="password" value="{{ $password }}" readonly style="cursor: not-allowed">
                          </div>
                          <div class="form-group">
                            <label for="course_fee">Course Fee</label>
                            <input type="text" name="course_fee" class="form-control" id="course_fee" value="{{ $course_fee }}" readonly style="cursor: not-allowed">
                          </div>
                          <div class="form-group" style="display: none">
                            {!! Form::label('name','Coupon Code') !!}
                            </span>
                            <input class="form-control" type="text" name="coupon_code" id="coupon_code" value="{{$coupon_code}}">
                          </div>
                          <div class="form-group">
                            <label for="payment_amount">Total Payment Amount</label>
                            <input type="text" name="payment_amount" class="form-control" id="payment_amount" value="{{ $payment_amount }}" readonly style="cursor: not-allowed">
                          </div>
                          <label>
                              <input type="checkbox" name="checkbox"  id="checkbox"> I agree to the <a href="{{ route('frontend.showAdmission') }}" style="color: red;text-decoration: underline;">terms & conditions</a> and <a href="{{ route('frontend.showAdmission') }}" style="color: red;text-decoration: underline;">privacy policy</a>.
                          </label><br>
                          {{-- <input class="btn btn-primary" id="submit_button" type="submit" value="Online Payment" disabled> --}}
                          {{-- <button class="btn btn-primary" name="action" value="online_payment" id="submit_button" disabled>Online Payment</button> --}}
                          <button class="btn btn-success" name="action" value="cash_on" id="submit_button2" disabled>Cash on Payment</button>
                          <button class="btn btn-primary" name="action" value="online_payment" id="btnShow" disabled>Online Payment</button>
                          {{-- <input type="button" class="btn btn-primary" id="btnShow" disabled value="Online Payment"> --}}
                          <div id="dialog" style="display: none" align = "center">
                             <strong> Online Payment is Currently Unavailable, please click Cash on Payment Button or contact office for more details.</strong>
                          </div>
                        </fieldset>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('plugin-scripts')
  {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
  {!! Html::script('public/assets/js/validation/frontedAdmitForm-validation.js') !!}
  <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
  <!--<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js" type="text/javascript"></script>-->
  <!--<link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css"-->
  <!--  rel="stylesheet" type="text/css" />-->
  <script type="text/javascript">
      function ShowHideDiv() {
            var chkYes = document.getElementById("checkbox");
            var dvPassport = document.getElementById("couponCode");
            dvPassport.style.display = chkYes.checked ? "block" : "none";
        }
  </script>

<!-- dropdown.blade.php -->
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
      
        jQuery('select[name="course_name"]').on('change',function(){
            var countryID = jQuery(this).val();
            console.log(countryID);
            if(countryID)
               {
                  jQuery.ajax({
                     url : 'form/batch/' +countryID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        $('#batch_name_admin').empty();
                        $('#batch_name_manager').empty();
                        for (let index = 0; index < data.length; index++) {
                          // console.log(`id: ${data[index].id}, name: ${data[index].name}, seat: ${data[index].seat_capacity}`);
                          $('#batch_name_admin').append('<option value="'+ data[index].id +'">'+ data[index].name +' - Seat-'+ data[index].seat_capacity+'</option>');
                          if(data[index].seat_capacity >=6 )
                          $('#batch_name_manager').append('<option value="'+ data[index].id +'">'+ data[index].name +' - Seat-'+ (data[index].seat_capacity-5)+'</option>');
                        }
                     }
                  });
                }
            else
               {
                  $('#batch_name_admin').empty();
               }
        });
    });
</script>
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="course_name"]').on('change',function(){
            var countryID = jQuery(this).val();

            if(countryID)
               {
                  jQuery.ajax({
                     url : 'form/fee/' +countryID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        jQuery('select[name="course_fee"]').empty();
                        jQuery.each(data, function(key,value){
                          // console.log(value);
                           $('input[name=course_fee]').val(value);
                           $('input[name=payment_amount]').val(value);
                           // console.log(input);
                        });
                     }
                  });
                }
            else
               {
                  $('select[name="course_fee"]').empty();
               }
        });
    });
</script>
<script>
  $('#checkbox').change(function() {
    if(this.checked) {
      $("#btnShow").removeAttr('disabled');
      $("#submit_button2").removeAttr('disabled');
      // $('a').removeClass('disabled');
    }else{
      $("#btnShow").prop("disabled", true);
      $("#submit_button2").prop("disabled", true);
      // $('a').addClass('disabled');
    }
  });
</script>
{{-- <script type="text/javascript">
    $(function () {
        $("#dialog").dialog({
            modal: true,
            autoOpen: false,
            title: "!!!Attention",
            width: 500,
            height: 200
        });
        $("#btnShow").click(function () {
            $('#dialog').dialog('open');
        });
    });
</script> --}}
@endpush