<?php use App\Models\Backend\Student; ?>
@extends('backend.layout.master')
<style type="text/css">
  /*Buy button responsive*/
  @media (max-width: 480px){

      .buy-buttons {
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .buy-buttons a{
          padding: 10px 6px;
          margin-left: 10px;
      }
      .buy-buttons input{
        padding: 10px 8px;
      }
  }
</style>
@push('plugin-styles')
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('public/assets/plugins/choices/public/assets/styles/choices.min.css') !!}
    {!! Html::style('public/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('public/css/loader.css') !!}
@endpush

@section('content')
    <div class="col-md-13 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                          @if(Auth::user()->user_type=="Student")
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="ti-home"></i>&nbsp;হোম</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>পরীক্ষা কেন্দ্র</span></li>
                          @else
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="ti-home"></i>&nbsp;Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Dashboard</a></li>
                          @endif
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <div class="ajax_loader">
                    <!--<img src="{{ url('public/assets/images/loading.gif') }}" class="img-responsive" />-->
                  </div>
                  <form class="cmxform" id="buySubjectForm" method="post" action="{{ route('admission.form.payment') }}" enctype="multipart/form-data">
                      @csrf
                    <fieldset>
                      <input id="user_id" class="form-control" type="text" name="user_id" value="{{ Auth::id() }}" hidden>
                      <input id="courseCategory" class="form-control" type="text" name="courseCategory" value="{{ request('id') }}" hidden>
                      <div class="form-group">
                        <label for="group_name">পরীক্ষার নাম<span class="requiredStar" style="color: red"> * </span></label>
                        <select class="form-control" name="course_name" id="course_name" required>
                            <option value="" >নির্বাচন করুন...</option>
                            @foreach($course as $key=> $courses)
                              <option value="{{ $courses->id }}">{{ $courses->full_name }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group" id="a" style="cursor:not-allowed">
                          {{-- <label for="batch_id">Subject Name</label> <span class="requiredStar" style="color: red"> * </span>
                          <select name="subject_id[]" class="form-control" id="choices-multiple-remove-button" multiple required>

                          </select> --}}
                      </div>
                      <div class="form-group">
                          <label for="fee">ফি<span class="requiredStar" style="color: red"> * </span></label>
                          <input id="course_fee" class="form-control" type="text" name="course_fee"  readonly>
                          {{-- <div class="pre_sub" id="pre_sub_div" style="font-size: 12px;display: none;font-weight: 600;">ইতিমধ্যে কেনা হয়েছে: <span class="text-danger" id="pre_sub" style="color: #15aabf;"></span> </div>                   --}}
                      </div>

                      <div class="form-group">
                        <label for="batch_name">ব্যাচ নাম<span class="requiredStar" style="color: red"> * </span></label>
                        <select class="form-control" name="student_batch_id" id="student_batch_id" required>
                            <option value="" >নির্বাচন করুন...</option>
                            {{-- @foreach($batch as $key=> $batchs)
                              <?php $batch_count = Student::where('student_batch_id', $batchs->id)->count();$count=($batchs->seat_capacity)-(strval($batch_count));?>
                              <option value="{{ $batchs->id }}">{{ $batchs->name }} (Available Seat-{{$count}})</option>
                            @endforeach   --}}
                          </select>
                          <div class="batch_div" id="batch_details" style="font-size: 12px;display: none;font-weight: 600;">ব্যাচের সময়কাল : <span class="text-danger" id="batch_div" style="color: #15aabf;"></span> </div>
                      </div>

                      <div class="form-group">
                          <input type="checkbox" name="checkbox"  id="checkbox" onclick="ShowHideDiv()">&nbsp;  কুপন কোড প্রয়োগ করতে চেক বক্স এ ক্লিক করুন  !
                      </div>

                      <div class="form-group form-inline" id="couponCode" style="display: none">

                        <div class="form-group mx-sm-3 mb-2">
                          <label for="inputPassword2" class="sr-only">Coupon Code</label>
                          <input class="form-control" type="text" name="coupon_code" id="coupon_code">&nbsp;
                          {{-- <button class="btn btn-primary" onclick="">Apply</button> --}}
                          <a href="#" id="apply" class="btn btn-primary" onclick="this.disabled=true;">Apply</a>
                        </div>
                      </div>
                      <div class="buy-buttons">
                        <input class="btn btn-primary" id="submit1" target="_blank" type="submit" style="display: none" value="ক্রয় করুন">
                        <input class="btn btn-primary" id="submit2" target="_blank" type="submit" style="display: none" value="ক্রয় করুন">
                        <a class="btn btn-danger" href="{{ URL('/dashboard') }}">বাতিল করুন </a>
                        <!--<a class="btn btn-danger" href="{{ URL::previous() }}">বাতিল করুন </a>-->
                      </div>
                    </fieldset>
                  </form>
                </div>
              </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    {!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('public/assets/plugins/choices/public/assets/scripts/choices.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('public/assets/plugins/icheck/icheck.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/data-table.js') !!}
    {!! Html::script('public/assets/js/toastDemo.js') !!}
    {!! Html::script('public/assets/js/iCheck.js') !!}
    {!! Html::script('public/assets/js/validation/buySubjectForm-validation.js') !!}
    {!! Html::script('public/assets/plugins/Bootstrap-4-Multi-Select/dist/js/BsMultiSelect.js') !!}

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
          let discountAmount = 0;
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
                 var courseCategory = $("#courseCategory").val();

                if(countryID)
                   {
                      jQuery.ajax({
                         url : 'subject/' +courseCategory+'/'+countryID ,
                         type : "GET",
                         dataType : "json",
                         beforeSend: function(jqXHR,settings)
                        {
                          $('.ajax_loader').css("visibility", "visible");
                        //   console.log(settings.url);
                        },
                         success:function(data)
                         {
                        //   console.log(data);
                          if(data.length == 0) {
                                  alert('No available subject');
                                  $(':input[type="submit"]').prop('disabled', true);
                                  window.location.replace(courseCategory);
                                  // return;
                            }

                            $('#a').empty();

                            // $('#a').append('<option value="">Select..</option>');
                            // if(courseCategory=='2' || courseCategory=='7'){
                                for (let index = 0; index < data.length; index++) {

                                // $('select[name="subject_id[]"]').append('<option value="'+ data[index].id +'">'+ data[index].name +'</option>');
                                $('#a').append('<div class="col-xl-4 col-md-6"><label class="checkbox-inline"><input type="checkbox" id="division_id" name="subject_id[]" checked disabled style="cursor:not-allowed;" value="'+data[index].id+'"><input type="checkbox" id="division_id" name="subject_id[]" checked  style="display:none;" value="'+data[index].id+'"> '+data[index].name+'</label></div>');

                                }
                                document.getElementById('a').style.pointerEvents = 'none';
                                totalAmount(countryID);
                            // }else{
                            //     for (let index = 0; index < data.length; index++) {

                            //     // $('select[name="subject_id[]"]').append('<option value="'+ data[index].id +'">'+ data[index].name +'</option>');
                            //     $('#a').append('<div class="col-xl-4 col-md-6"><label class="checkbox-inline"><input type="checkbox" id="division_id" name="subject_id[]" value="'+data[index].id+'"> '+data[index].name+'</label></div>');

                            //     }
                            // }
                         },
                         complete: function()
                        {
                          $('.ajax_loader').css("visibility", "hidden");
                        },
                      });
                    }
                else
                   {
                      $('#a').empty();
                   }
            });
        });
    </script>
{{--     <script>
    $(document).ready(function() {
        $("#a").click(function(){
          // console.log('hi');
            var favorite = [];
            $.each($("input[name='division_id[]']:checked"), function(){
                favorite.push($(this).val());
            });
            alert("My favourite sports are: " + favorite.join(", "));
        });
    });
</script> --}}
    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
            jQuery("#a").click(function(){
                var favorite = [];
            $.each($("input[name='subject_id[]']:checked"), function(){
                favorite.push($(this).val());console.log(favorite);
            });
                var sum =0;
                $.each(favorite , function(index, val) {
                //   console.log(index, val);
                if(favorite)
                   {
                      jQuery.ajax({
                         url : 'fee/' +val,
                         type : "GET",
                         dataType : "json",
                         beforeSend: function(jqXHR,settings)
                        {
                          $('.ajax_loader').css("visibility", "visible");
                        //   console.log(settings.url);
                        },
                         success:function(data)
                         {
                            jQuery('select[name="course_fee"]').empty();
                            jQuery.each(data, function(key,value){
                              sum = value+sum;
                              // console.log(sum);
                                $('#course_fee').val(sum);
                            });
                         },
                         complete: function()
                         {
                           $('.ajax_loader').css("visibility", "hidden");
                         },
                      });
                    }
                else{
                      $('select[name="course_fee"]').empty();
                   }
               });
            });
        });
    </script>
    {{-- ajker code end --}}
{{-- <script type="text/javascript">
$(document).ready(function(){
    $("#course_name").change(function(){
      //$("#selText").html($($(this).children("option:selected")[0]).text());
       var txt = $($(this).children("option:selected")[0]).text();
       $("<span>" + txt + "<br/></span>").appendTo($("#selText span:last"));
    });
});
</script> --}}
    <script type="text/javascript">
      function totalAmount(countryID) {
         var course = countryID;
         // console.log(course);
          if(course){

              jQuery.ajax({
                  url : 'totalFee/' +course,
                  type : "GET",
                  dataType : "json",
                  beforeSend: function(jqXHR,settings)
                {
                  $('.ajax_loader').css("visibility", "visible");
                //   console.log(settings.url);
                },
                  success:function(data)
                  {
                  // console.log(data);
                    jQuery('#course_fee').empty();
                        $('#course_fee').val(data);
                        if (data>0) {
                          $("#submit1").css("display", "");
                          $("#submit2").css("display", "none");
                        }else{
                          $("#submit1").css("display", "none");
                          $("#submit2").css("display", "");
                        }
                  },
                  complete: function()
                  {
                    $('.ajax_loader').css("visibility", "hidden");
                  },
              });
            }
        else{
              $('#course_fee').empty();
            }
      }
    </script>

    <!-- dropdown.blade.php -->
    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
            jQuery('select[name="course_name"]').on('change',function(){
                var countryID = jQuery(this).val();
                 var courseCategory = $("#courseCategory").val();

                if(countryID)
                   {
                      jQuery.ajax({
                         url : 'pre_subject/' +courseCategory+'/'+countryID ,
                         type : "GET",
                         dataType : "json",
                         beforeSend: function(jqXHR,settings)
                        {
                        //   console.log(settings.url);
                        },
                         success:function(data)
                         {
                        //   console.log(data);

                            $('#pre_sub').empty();
                                if (data!='') {
                                  console.log(data);
                                    $("#pre_sub_div").css({display: ""});
                                    alert('প্রস্তুতি পরীক্ষাটি ইতিপূর্বে ক্রয় করা হয়েছে |');
                                  // showWarningToast(data.success);
                                  $(':input[type="submit"]').prop('disabled', true);
                                  window.location.replace(courseCategory);
                                // for (let index = 0; index < data.length; index++) {

                                // $('#pre_sub').append(' '+data[index].name+', '+' ');

                                // }
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
                      $('#pre_sub').empty();
                   }
            });
        });
    </script>
    <script type="text/javascript">
        // console.log('hhi');
        jQuery(document).ready(function ()
        {
            jQuery("#a").click(function(){
                var favorite = [];
                $.each($("input[name='subject_id[]']:checked"), function(){
                    favorite.push($(this).val());
                });

                $.each(favorite , function(index, val) {
                    var subjectId = val;
                    // console.log(subjectId);
                    if(subjectId){

                          jQuery.ajax({
                             url : 'pre_subject_id/' +subjectId,
                             type : "GET",
                             dataType : "json",
                             beforeSend: function(jqXHR,settings)
                            {
                              $('.ajax_loader').css("visibility", "visible");
                            //   console.log(settings.url);
                            },
                             success:function(data)
                             {
                                // console.log('Result');
                                // console.log(data);
                                for (let index = 0; index < data.length; index++) {
                                    if (data[index].name) {
                                        alert(''+data[index].name+' '+ " বিষয়টি  ইতিপূর্বে ক্রয় করা হয়েছে | বিষয়টি বাদ দিন |");
                                        // $(':input[type="submit"]').prop('disabled', true);
                                    }else{
                                        // $(':input[type="submit"]').prop('disabled', false);
                                    }
                                }
                             },

                          });
                    }else{
                         $('#pre_sub').empty();
                    }

               });
            });
        });
    </script>
    <script type="text/javascript">
      $("#coupon_code").keyup(function(){
        $('#submit').prop('disabled', true);
      });

      $("#coupon_code").focusout(function(){
              let couponCode = $(this).val();

              if(couponCode){
                $.ajax({
                  url : "{{route('admission.form.getCouponInfo')}}",
                  type : "GET",
                  dataType : "json",
                  data:{coupon:couponCode},
                  beforeSend: function(jqXHR,settings)
                  {
                    $('.ajax_loader').css("visibility", "visible");
                    // console.log(settings.url);
                  },
                  success:function(data)
                  {
                    //   console.log(data);
                    if(data.danger){
                      showDangerToast(data.danger);
                    }else{
                      discountAmount = data.amount;
                      showSuccessToast('Coupon code Successfully applied');
                      let course_fee = $('#course_fee').val() - discountAmount;
                      $('#course_fee').val(course_fee);
                      $('#payment_amount').val(course_fee);
                      // console.log(course_fee);
                      // commitmentDateValidation();
                        $('#coupon_code').val('');
                    }
                  },
                  complete: function()
                  {
                    $('.ajax_loader').css("visibility", "hidden");
                    $('#submit').removeAttr('disabled');
                  },
                });
              }
            });
    </script>

    {{-- batch details function --}}
    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
            jQuery('select[name="student_batch_id"]').on('change',function(){
                var countryID = jQuery(this).val();
                 // var courseCategory = $("#courseCategory").val();

                if(countryID)
                   {
                      jQuery.ajax({
                         url : 'batch-details/' +countryID ,
                         type : "GET",
                         dataType : "json",
                         beforeSend: function(jqXHR,settings)
                        {
                          // console.log(settings.url);
                        },
                         success:function(data)
                         {
                          // console.log(data);

                            $('#batch_div').empty();
                                if (data!='') {
                                    $("#batch_details").css({display: ""});
                                for (let index = 0; index < data.length; index++) {

                                $('#batch_div').append(' '+data[index].start_date+' থেকে '+' '+data[index].end_date+'');

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
                      $('#batch_div').empty();
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
                         url : 'batchDetails/' +countryID ,
                         type : "GET",
                         dataType : "json",
                         beforeSend: function(jqXHR,settings)
                        {
                          $('.ajax_loader').css("visibility", "visible");
                          // console.log(settings.url);
                        },
                         success:function(data)
                         {
                          // console.log(data);

                            $('#student_batch_id').empty();
                            for (let index = 0; index < data.length; index++) {
                            $('#student_batch_id').append('<option value="'+data[index].id+'">'+data[index].name+' (Available Seat-'+data[index].available_seat+')</option>');
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
                      $('#student_batch_id').empty();
                   }
            });
        });
    </script>
@endpush
