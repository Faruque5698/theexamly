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
                                <a class="active" href="{{ route('frontend.showAdmission') }}">Online Admission</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- events -->   
<style type="text/css">
  .list-item li {
        display: block;
        padding-bottom: 9px;
        list-style-type: none;
        float: none;
        font-size: 16px;
    }
    input.largerCheckbox { 
        width: 45px; 
        height: 30px; 
    } 
</style>
<section class="event_page">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-sm-12">
                <div class="row">
          <!-- Start Welcome or About Text -->
                    <div class="card rounded-0 theme-border theme-shadow">
                        <div class="card-header theme-border-color rounded-0 theme-bg" style="background-color: #006a4e;color: white">
                                এক নজরে অনলাইনে ভর্তির নির্দেশাবলীঃ
                        </div>
                        {{-- <div class="card-body text-justify">        --}}
                        {{-- {{trans('global.nodata')}} --}}
                        {{-- <a href="{{route('admission.student.login')}}">Login</a> --}}
                        <!-- Home start -->
                        {{-- </div> --}}
                        <div class="container-fluid content_area">
                            <div class="container">
                                <div class="page-header text-center">
                                    <h2 class="school-title">the Examly</h2>
                                    {{-- <h4 class="school-estab">স্থাপিত: ১৯৫৯</h4> --}}
                                    {{-- <h4 class="school-director">আর.এম.পি পুলিশ প্রশাসনের সার্বিক তত্ত্বাবধানে পরিচালিত</h4> --}}
                                    <img src="{{asset('/uploads/files/logo/1612246873-m the examly .png')}}" style="height: 120px;width: 140px;margin-bottom: 1rem;"> 
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-info text-center">
                                            <h3>অনলাইনে ভর্তির নির্দেশাবলীঃ</h3>
                                            <p><a href="{{ route('frontend.showAdmission') }}">https://theexamly.com</a> ওয়েবসাইটের মাধ্যমে আবেদন প্রক্রিয়া সম্পন্ন করার জন্য নিম্নের তথ্যগুলি অত্যাবশ্যকঃ</p>
                                        </div>
                                        <ul class="list-item">
                                            <li>১. আবেদন ফরম পূরণের জন্য online address: <a href="{{ route('frontend.showAdmission') }}">https://theexamly.com</a> (আবেদন ফরম পূরণের নির্দেশিকা ও ভর্তি সংক্রান্ত বিজ্ঞপ্তি উক্ত address এ পাওয়া যাবে। )</li>
                                            <li>২. অনলাইনে ভর্তির জন্য ভর্তি ফরমে শিক্ষার্থীর সকল সঠিক তথ্য প্রদান করতে হবে। (ভর্তি ফরমে * চিহ্ন কলাম অবশ্যই পুরন করতে হবে |)</li>
                                            <li>৩. কোর্স ফি অনলাইনের মাধ্যমে প্রদান করতে হবে।</li>
                                            <li>৪. ভর্তি কোর্স ফি কোনোভাবেই ফেরত যোগ্য নই। </li>
                                            <li>৫. ভর্তি কোনোভাবেই বাতিল যোগ্য নই। </li>
                                            <li>৬. এছাড়াও সরাসরি প্রতিষ্ঠানে এসে ভর্তি হওয়া যাবে।</li>                
                                        </ul>
                                        <div class="float-right">
                                            <h4> Desktop IT </h4>
                                            &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;পরিচালক 
                                        </div>
                                        <br><br><br><br>
                                        <div class="text-center">
                                            <h3 class="alert alert-warning">
                                            <input type="checkbox" id="terms_and_conditions" onclick="terms_changed(this)" class="largerCheckbox"> 
                                            {{-- <input type="checkbox" id="terms_and_conditions" value="1" /> --}}
                                            আমি সম্পূর্ন নির্দেশাবলী পড়েছি এবং অনলাইনে ভর্তি প্রক্রিয়া সম্পন্ন করতে চাই।</h3>
                                            {{-- <a href="{{route('admission.student.login')}}" class="btn btn-success" id="applyNow" >Download Admit</a> --}}
                                            <button onclick="window.location='{{ url("/admission/form") }}'" class=" btn btn-primary" id="applyNow" disabled>Apply Online</button>
                                        </div>
                                        <fieldset>
                                            <legend>ঠিকানা</legend>
                                            the Examly
                                            <br>Laily Bhaban, 03 Assam Colony,
                                            Rajshahi-6203, Bangladesh.
                                            <br>ইমেইল: 
                                            theexamly@gmail.com
                                            <br>মোবাইল:
                                            +8801913800800 
                                            <br><br>
                                            <h3 class="alert alert-info text-center">অনলাইনে আবেদন সংক্রান্ত ও অন্যান্য তথ্যের জন্য : +8801913800800.</h3>
                                        </fieldset>
                                    </div>
                                </div>
          <!-- End Welcome or About Text -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>          
</section>
@endsection

{{-- @push('custom-scripts') --}}
<script type="text/javascript">
    function terms_changed(termsCheckBox){
        //If the checkbox has been checked
        if(termsCheckBox.checked){
             //Set the disabled property to FALSE and enable the button.
            document.getElementById("applyNow").disabled = false;
        } else{
            //Otherwise, disable the submit button.
            document.getElementById("applyNow").disabled = true;
        }
    }
</script>

{{-- <script type="text/javascript">
    // applyNow
    $("#applyNow" ).attr('disabled', true);
    $("#applyNow" ).disabled = true;
    document.getElementById("applyNow").disabled = true;
    $('#applyNowBTN').attr('disabled','disabled');


    $( "#checkbox" ).change(function() {
            // console.log('ok');
            if(jQuery('#checkbox').is(":checked"))
            {
                // alert();
                
                $("#applyNow").prop('disabled', false);

            }else{
                $("#applyNow" ).prop('disabled', true);
            }
        });

</script> --}}
{{-- @endpush --}}