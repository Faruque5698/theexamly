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
                            <li class="breadcrumb-item active" aria-current="page"><a>Add Monthly Payment</a></li>
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
                                        <input id="payment_date" class="form-control" name="payment_date" value="{{now()->format('D, M, Y')}}" type="text" style="cursor:not-allowed" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="payment_date">Current Month<span class="requiredStar" style="color: red"> * </span></label>
                                        <input id="payment_month" class="form-control" name="payment_month" value="{{ date('F')}}" type="text" style="cursor:not-allowed" readonly>
                                    </div>
                                    <form class="cmxform" id="paymentForm" method="post" action="{{ route('admin.collectFees.store') }}" enctype="multipart/form-data">

                                        @csrf

                                        <input type="hidden" name="user_id" value="{{ $value->user_id }}">
                                        <input type="hidden" name="student_id" value="{{ $value->student_id }}">
                                        <input type="hidden" name="batch_id" value="{{ $value->course_id }}">
                                        <input type="hidden" name="batch_id" value="{{ $value->batch_id }}">
                                        @if($duetCheck != null)
                                            <input  name="montly_fee" value="{{ $dueAmount }}" type="hidden" readonly>
                                        @else    
                                            <input id="course_fee" class="form-control" name="course_fee" value="{{ $monthlyFee }}" type="hidden"  readonly>
                                        <div class="form-group">
                                            <label for="payment_amount">Payment Amount<span class="requiredStar" style="color: red"> * </span></label>
                                            <input id="payment_amount" class="form-control" name="paymented_amount" type="text" required>
                                        </div>
                                                               
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
@endpush
