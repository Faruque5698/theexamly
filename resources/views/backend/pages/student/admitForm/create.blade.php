@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/css/loader.css') !!}
@endpush

@section('content')  
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Students</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Student Admission Form</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row grid-margin">
              <div class="ajax_loader">
                <img src="{{ url('assets/images/loading.gif') }}" class="img-responsive" />
              </div>
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Student Information</h4>
                    <form class="cmxform" id="admitForm" method="post" action="{{ route('admin.students.store') }}" enctype="multipart/form-data">
                        @csrf
                      <fieldset>
                        <div class="form-group">
                          <label for="name">Student's Full Name<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="name" class="form-control" name="name" type="text" value= "{{old('name')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Student's Phone No<span class="requiredStar" style="color: red"> * </span></label>
                            <input id="phone" class="form-control" type="text" name="phone" value="{{old('phone')}}" required>
                        </div>
                        <div class="form-group">
                          <label for="email">Student's Email Address<span class="requiredStar" style="color: red"> * </span></label>
                            <input id="email" class="form-control" type="email" name="email" value="{{old('email')}}" required>
                        </div>
                        <div class="form-group">
                          <label for="present_address">Address</label>
                          <textarea id="present_address" class="form-control" name="present_address" rows="4">{{old('present_address')}}</textarea>
                        </div>
                        <div class="form-group">
                          <label for="course_id">Course Name</label> <span class="requiredStar" style="color: red"> * </span>
                          {!!  Form::select('course_name',$course,old('course_name'),['class'=>'form-control','placeholder'=>'Select a Course','required']) !!}
                        </div> 
                        @permission('batch_seat_admin')
                        <div class="form-group">
                          <label for="batch_id">Batch Name</label> <span class="requiredStar" style="color: red"> * </span>
                          <select name="batch_name" class="form-control" id="batch_name_admin">
                            <option value="">Select a batch</option>
                          </select>
                        </div> 
                        @endpermission
                        @permission('batch_seat_manager')
                        <div class="form-group">
                          <label for="batch_id">Batch Name</label> <span class="requiredStar" style="color: red"> * </span>
                          <select name="batch_name" class="form-control" id="batch_name_manager">
                            <option value="">Select a batch</option>
                          </select>
                        </div>
                        @endpermission 
                        <div class="form-group" style="display: none">
                          <label for="roll_no">Roll No</label>
                          <input id="roll_no" class="form-control" name="roll_no" rows="4"></input>
                        </div>
                        <div class="form-group" style="display: none">
                          <label for="student_id">Student ID</label>
                          <input id="student_id" class="form-control" name="student_id"></input>
                        </div>
                        <div class="form-group" style="display: none">
                          <label for="password">Login Password<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="password" class="form-control" type="Password" minlength="8" name="password" value="{{ $password }}">
                        </div>
                        <div class="form-group">
                          <label for="payment_amount">Course Fee</label>
                          <input type="text" name="course_fee" class="form-control" id="course_fee" 
                          readonly style="cursor: not-allowed">
                        </div>                        
                        <div class="form-group">
                          <input type="checkbox" name="checkbox"  id="checkbox" onclick="ShowHideDiv()"
                          {{(old('coupon_code') ? 'checked' : '')}}> Have any Coupon Code <i class="fa fa-question-circle" data-toggle="tooltip" title=""
                            data-original-title="you can use coupon by checked the button"></i>
                        </div>
                        <div class="form-group" id="couponCode" style="display: none">
                          {!! Form::label('name','Coupon Code') !!}
                          <input class="form-control" type="text" name="coupon_code" id="coupon_code" 
                          value="{{old('coupon_code')}}">
                        </div>
                        <div class="form-group">
                          <label for="payment_amount">Payment Amount<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="payment_amount" class="form-control" type="number" name="payment_amount" max="course_fee" value="{{old('payment_amount')}}" required>
                        </div>
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('name','Next Payment Commitment Date') !!}
                                <input class="form-control" type="date" name="commitment_date" id="commitment_date"
                                value="{{old('commitment_date')}}">
                            </div>
                          </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Submit">
                        <a class="btn btn-danger" href="{{ route('admin.students.index') }}">Cancel</a>
                      </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div> 
@endsection

@push('plugin-scripts')
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('public/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') !!}
    {!! Html::script('public/assets/plugins/select2/js/select2.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/validation/admitForm-validation.js') !!}
    {!! Html::script('public/assets/js/bt-maxlength.js') !!}
    {!! Html::script('public/assets/js/file-upload.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/toastDemo.js') !!}
    <script type="text/javascript">
        let discountAmount = 0;
        $(document).ready(function () {
            @if (session('success'))
            showSuccessToast('{{ session("success") }}');
            @elseif(session('danger'))
            showDangerToast('{{ session("danger") }}');
            @elseif(session('warning'))
            showWarningToast('{{ session("warning") }}');
            @endif
        });

    </script>
    <!-- Check button for coupon -->
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
          if("{{old('coupon_code')}}"){
            ShowHideDiv();
          }
          jQuery('select[name="course_name"]').on('change',getBatch);
          const course_name = $('select[name="course_name"]').val();

          if(course_name){
            jQuery.ajax({
              url : 'admit/batch/' +course_name,
              type : "GET",
              dataType : "json",
              beforeSend: function()
              {
                $('.ajax_loader').css("visibility", "visible");
              },
              success:function(data)
              {
                //console.log(data);
                $('#batch_name_admin').empty();
                $('#batch_name_manager').empty();
                const selected_batch = "{{ old('batch_name') }}";
                console.log(selected_batch);
                for (let index = 0; index < data.length; index++) {
                  // console.log(`id: ${data[index].id}, name: ${data[index].name}, seat: ${data[index].seat_capacity}`);
                  $('#batch_name_admin').append('<option value="'+ data[index].id +'"'+(selected_batch == data[index].id ? 'selected': '')+'>'+ data[index].name +' ('+ data[index].seat_capacity+' seat available)</option>');
                  if(data[index].seat_capacity >=6 ){
                    $('#batch_name_manager').append('<option value="'+ data[index].id +'"'+(selected_batch == data[index].id ? 'selected': '')+'>'+ data[index].name+' ('+ (data[index].seat_capacity-5)+'+ seat available)</option>');
                  }
                }
              },
              complete: function()
              {
                $('.ajax_loader').css("visibility", "hidden");
              },
            });

            jQuery.ajax({
              url : 'admit/fee/' +course_name,
              type : "GET",
              dataType : "json",
              success:function(data)
              {
                  jQuery('select[name="course_fee"]').empty();
                  jQuery.each(data, function(key,value){
                    $('input[name=course_fee]').val(value);
                  });
              },
            });
          }
        });
    </script>
    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
            jQuery('select[name="course_name"]').on('change',getCourseFee);

            $('input[name=payment_amount]').change(commitmentDateValidation);
        });

        function getBatch(){
          var countryID = jQuery(this).val();
          if(countryID)
              {
                jQuery.ajax({
                    url : 'admit/batch/' +countryID,
                    type : "GET",
                    dataType : "json",
                    beforeSend: function()
                    {
                      $('.ajax_loader').css("visibility", "visible");
                    },
                    success:function(data)
                    {
                      //console.log(data);
                      $('#batch_name_admin').empty();
                      $('#batch_name_manager').empty();
                      for (let index = 0; index < data.length; index++) {
                        // console.log(`id: ${data[index].id}, name: ${data[index].name}, seat: ${data[index].seat_capacity}`);
                        $('#batch_name_admin').append('<option value="'+ data[index].id +'">'+ data[index].name +' ('+ data[index].seat_capacity+' seat available)</option>');
                        if(data[index].seat_capacity >=6 ){
                          $('#batch_name_manager').append('<option value="'+ data[index].id +'">'+ data[index].name
                          +' ('+ (data[index].seat_capacity-5)+'+ seat available)</option>');
                        }
                      }
                    },
                    complete: function()
                    {
                      $('.ajax_loader').css("visibility", "hidden");
                    },
                });
              }
          else
              {
                $('#batch_name_admin').empty();
              }
        }

        function getCourseFee(){
          var countryID = jQuery(this).val();

          if(countryID){
            jQuery.ajax({
              url : 'admit/fee/' +countryID,
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
              },
            });
          }
          else{
            $('select[name="course_fee"]').empty();
          }
        }

        function commitmentDateValidation(){
          let pay_amount = $('#payment_amount').val();
          let course_fee = $('#course_fee').val() - discountAmount;
          if(Number(pay_amount) <  Number(course_fee)){
            $('#commitment_date').prop('required',true);
          } else{
            $('#commitment_date').removeAttr('required');
          }
        }

        $("#coupon_code").focusout(function(){
          let couponCode = $(this).val();
          if(couponCode){
            $.ajax({
              url : "{{route('admin.students.getCouponInfo')}}",
              type : "GET",
              dataType : "json",
              data:{coupon:couponCode},
              beforeSend: function()
              {
                $('.ajax_loader').css("visibility", "visible");
              },
              success:function(data)
              {
                if(data.danger){
                  showDangerToast(data.danger);
                }else{
                  discountAmount = data.amount;
                  showSuccessToast('Coupon code Successfully applied');
                  let course_fee = $('#course_fee').val() - discountAmount;
                  console.log(course_fee);
                  commitmentDateValidation();
                }
              },
              complete: function()
              {
                $('.ajax_loader').css("visibility", "hidden");
              },
            });
          } 
        });
    </script>
@endpush
