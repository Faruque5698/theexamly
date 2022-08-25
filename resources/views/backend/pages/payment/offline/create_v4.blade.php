@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
@endpush

@section('content')  
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Payment</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Add Payment</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Payment Information</span></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row grid-margin">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    {{-- <h4 class="card-title">Payment Information</h4> --}}
                    <div class="text-center" style="color: green;">
                        @foreach( $students as $key=>$value)
                            {{$value->batch->name}}<br>
                            {{$value->user->name}} -
                            {{$value->student_id}} -
                            {{$value->user->phone}}<br>
                        @endforeach                            
                    </div><br>                                     
                    <fieldset>
                        <div class="col-lg-6" style="margin-left: 220px">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="payment_date">Current Date<span class="requiredStar" style="color: red"> * </span></label>
                                        <input id="payment_date" class="form-control" name="payment_date" value="{{date('d-m-Y')}}" type="text" style="cursor:not-allowed" readonly>
                                    </div>
                                    <div class="form-group">
                                        
                                        <form class="cmxform" id="couponForm" action="{{ route('admin.payment.couponCheck4',[$value->user_id,$value->batch_id]) }}" enctype="multipart/form-data">
                                            <label for="coupon_code">Apply Coupon</label>
                                            <div class="form-inline">
                                                @if($coupon_code == null)
                                                    <input id="coupon_code" class="form-control" type="text" name="coupon_code" style="width: 60%">&nbsp;&nbsp;&nbsp;
                                                    <input type="submit" name="submit" value="Apply" class="form-control btn-danger">
                                                @else
                                                    <input id="coupon_code" class="form-control" type="text" name="coupon_code" value="{{ $coupon_code }}" style="width: 60%">&nbsp;&nbsp;&nbsp;
                                                    <input type="submit" name="submit" value="Apply" class="form-control btn-danger" disabled>
                                                @endif

                                                
                                            </div><br>
                                            <div class="form-group">
                                                <label for="total_amount">Total Amount<span class="requiredStar" style="color: red"> * </span></label>
                                                @if($paymentedAmountCheck == null)
                                                    <input id="course_fee" class="form-control" name="course_fee" value="{{ $fixedCourseFee }}" type="text"  readonly>
                                                @elseif($paymentedAmountCheck != null and $coupon_code == null)    
                                                    <input id="course_fee" class="form-control" name="course_fee" value="{{ $due_course_fee }}" type="text"  readonly>
                                                @else    
                                                    <input id="course_fee" class="form-control" name="course_fee" value="{{ $course_fee }}" type="text"  readonly>
                                                @endif    
                                            </div> 
                                        </form>                                                           
                                    </div>
                                    <form class="cmxform" id="paymentForm" method="post" action="{{ route('admin.collectFees.store4') }}" enctype="multipart/form-data">

                                        @csrf 
                                        <div class="form-group" style="display: none">
                                            <label for="payment_date">Current Date<span class="requiredStar" style="color: red"> * </span></label>
                                            <input id="payment_date" class="form-control" name="payment_date" value="{{date('d-m-Y')}}" type="text" style="cursor:not-allowed" readonly>
                                        </div>

                                        <input type="hidden" name="user_id" value="{{ $value->user_id }}">
                                        <input type="hidden" name="student_id" value="{{ $value->student_id }}">
                                        <input type="hidden" name="batch_id" value="{{ $value->batch_id }}">
                                        <input type="hidden" name="coupon_code" value="{{ $coupon_code }}">
                                        @if($paymentedAmountCheck == null)
                                            <input  name="course_fee" value="{{ $fixedCourseFee }}" type="hidden" readonly>
                                        @elseif($paymentedAmountCheck != null and $coupon_code == null)    
                                            <input id="course_fee" class="form-control" name="course_fee" value="{{ $paymentedAmountCheck }}" type="hidden"  readonly>
                                        @else    
                                            <input id="course_fee" class="form-control" name="course_fee" value="{{ $course_fee }}" type="hidden" readonly>
                                        @endif
                                        <div class="form-group">
                                            <label for="payment_amount">Payment Amount<span class="requiredStar" style="color: red"> * </span></label>
                                            <input id="payment_amount" class="form-control" name="paymented_amount" type="text" required>
                                        </div>
                                        @if($coupon_code != null)
                                        <div class="form-group" style="display: none">
                                            <label for="commitment_date">Commitment Date</label>
                                            <input class="form-control" type="date" name="commitment_date" id="commitment_date">
                                        </div>
                                        @else
                                        <div class="form-group">
                                            <label for="commitment_date">Commitment Date<span class="requiredStar" style="color: red"> * </span></label>
                                            <input class="form-control" type="date" name="commitment_date" id="commitment_date" required>
                                        </div>
                                        @endif
                                        {{-- paid in function start --}}
                                       {{--  <div class="form-group">
                                            {!! Form::label('name','Paid In') !!} <span class="requiredStar" style="color: red"> * </span><br>
                                            <input type="radio" id="full" name="paid_in" value="full" onclick="ShowHideDiv()"> Full<br>
                                            <input type="radio" id="partial" name="paid_in" value="partial" onclick="ShowHideDiv()"> Partial <br>
                                        </div>

                                        <div class="form-group" id="fullPaid" style="display: none">
                                            <label for="payment_amount">Payment Amount</label>
                                            <input id="payment_amount2" class="form-control" name="paymented_amount" type="text" required>
                                        </div>

                                        <div class="form-group" id="partialPaid" style="display: none">
                                            <label for="payment_amount">Payment Amount</label>
                                            <input id="payment_amount3" class="form-control" name="paymented_amount" type="text" required>
                                            <label for="commitment_date">Commitment Date</label>
                                            <input class="form-control" type="date" name="commitment_date" id="commitment_date" required>
                                        </div> --}}
                                        {{-- paid in function end --}}  

                                        <div class="form-group">
                                            <label for="payment_method">Payment Method<span class="requiredStar" style="color: red"> * </span></label>&nbsp;&nbsp;
                                            <input type="radio" name="payment_method" value="cash" checked="checked"> Cash &nbsp;&nbsp;
                                            <input type="radio" name="payment_method" value="Online"> Online &nbsp;&nbsp;
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Note</label>
                                            <textarea id="description" class="form-control" type="text" name="description"></textarea>
                                        </div>
                                        <input class="btn btn-primary" type="submit" value="Submit">
                                        <a class="btn btn-danger" href="{{ url()->previous() }}">Back</a>
                                    </form>    
                                </div>
                            </div>
                        </div>
                    </fieldset>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div> 
@endsection

@push('plugin-scripts')
    {!! Html::script('/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') !!}
    {!! Html::script('/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/validation/paymentForm-validation.js') !!}
    {!! Html::script('/assets/js/validation/couponForm-validation.js') !!}
    {!! Html::script('/assets/js/bt-maxlength.js') !!}
    {!! Html::script('/assets/js/file-upload.js') !!}
    {!! Html::script('/assets/js/select2.js') !!}
    {!! Html::script('/assets/js/toastDemo.js') !!}

    <script type="text/javascript">
        $(document).ready(function () {
            @if (session('success'))
            showSuccessToast('{{ session("success") }}');
            @elseif(session('warning'))
            showWarningToast('{{ session("warning") }}');
            @elseif(session('error'))
            showWarningToast('{{ session("error") }}');
            @endif
        });
    </script>
    <script type="text/javascript">
        function ShowHideDiv() {
            var chkYes = document.getElementById("full");
            var dvPassport = document.getElementById("fullPaid");           
            var chkNo = document.getElementById("partial");
            var dvPassport2 = document.getElementById("partialPaid");
            dvPassport.style.display = chkYes.checked ? "block" : "none";
            dvPassport2.style.display = chkNo.checked ? "block" : "none";
        }
    </script>
    {{-- <script type="text/javascript">
      var inp1 = document.getElementById("payment_amount2");
      inp1.oninput = function () {
        document.getElementById("payment_amount3").disabled = this.value != "";
        document.getElementById("commitment_date").disabled = this.value != "";
      };
      var inp1 = document.getElementById("payment_amount3");
      inp1.oninput = function () {
        document.getElementById("payment_amount2").disabled = this.value != "";
      };
    </script> --}}
@endpush
