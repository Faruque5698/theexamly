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
                            <li class="breadcrumb-item active" aria-current="page"><a>Edit Payment</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Edit Payment Information</span></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row grid-margin">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="text-center" style="color: green;">
                        {{$batchStudent->batch->name}}<br>
                        {{$batchStudent->user->name}} -
                        {{$batchStudent->student_id}} - 
                        {{$batchStudent->user->phone}}<br>
                    </div><br>                                     
                    <fieldset>
                        <div class="col-lg-6" style="margin-left: 220px">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        
                                        <form class="cmxform" id="couponForm" method="post" action="{{ route('admin.payment.update',[$paymentHistory->id,$batchStudent->id]) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group">
                                                <label for="pre_amount">Previous Paymented Amount<span class="requiredStar" style="color: red"> * </span></label>
                                                <input id="pre_amount" class="form-control" name="pre_amount" value="{{ $paymentHistory->paymented_amount }}" type="text"  readonly>
                                            </div>
                                            <div class="form-group">    
                                                <label for="update_amount">Update Payment Amount<span class="requiredStar" style="color: red"> * </span></label>   
                                                <input id="update_amount" class="form-control" name="update_amount" value="{{ $paymentHistory->paymented_amount }}" type="text">
                                            </div> 
                                            <input class="btn btn-primary" type="submit" value="Update">
                                            {{-- <a class="btn btn-danger" href="{{ url()->previous() }}">Back</a> --}}
                                        </form>                                                           
                                    </div>
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
