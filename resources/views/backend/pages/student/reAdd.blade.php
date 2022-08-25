@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/css/loader.css') !!}
@endpush

<style type="text/css">
  #style #name_list{
    display: block;
    background-color: white;
    list-style-type: none;
    position: relative;
    width: 398px;
    /*opacity: 10;*/
  }
  #style option{
    margin-left: 10px;
  }
  #style option:hover{
    background-color: #c2c2a3;
  }
   #style #name_list2{
    display: block;
    background-color: white;
    list-style-type: none;
    position: relative;
    width: 398px;
  }
</style>

@section('content')

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-header">
                    <div class="template-demo">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-custom">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a></li>
                                <li class="breadcrumb-item"><a>Students</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>Re-admission</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="ajax_loader">
                    <img src="{{ url('assets/images/loading.gif') }}" class="img-responsive" />
                </div>
                <div class="card">
                <p class="text-black" style="font-size: 15px; text-align: center; color: black"><span class="requiredStar" style="color: red"> * </span>Please Use any one fields (Student's Id or Student's Name). </p>
                </div>
                <div class="card-body">

                        {!! Form::open(['id'=>'reAdmissionForm','enctype'=>'multipart/form-data','url' => route('admin.students.batchStore')]) !!}

                    <div class="row">
                        <div class="col-md-5">
                            {{-- <div class="form-group">

                                {!! Form::label('name','Student\'s Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                <select class="form-control" name="name" id="name" onchange="showUser(this.value)">
                                  <option value="">Select One...</option>
                                  @foreach($user as $key=> $value)
                                    <option value="{{$value->id}}" >{{$value->phone}}-{{$value->name}}</option>
                                   @endforeach
                                </select>

                            </div> --}}
                            {{-- <div id="txtHint"></div> --}}

                            <div class="form-group" id="style">
                                {!! Form::label('name3','Student\'s Id') !!} <span class="requiredStar" style="color: red"> * </span>
                                <input id="studentId" type="text" name="user_id2" placeholder="" class="form-control studentId" autocomplete="off" data-id="">
                                <input id="value2" type="hidden" name="user_id2">
                                <div class="card" id="name_list2">
                                </div>
                                <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>Type at least first 3 digits of Student ID for suggestion</p>
                            </div>

                            <div class="form-group" id="style">
                                {!! Form::label('name','Student\'s Name or Phone No') !!} <span class="requiredStar" style="color: red"> * </span>
                                <input id="name" type="text" name="user_id"  placeholder="" class="form-control studentId" autocomplete="off" data-id="">
                                <input id="value" type="hidden" name="user_id">
                                <div class="card" id="name_list">
                                </div>
                                <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>Type at least first 3 characters of Student Name for suggestion</p>
                            </div> 

                            <div class="form-group">

                                {!! Form::label('name','Course Type') !!} <span class="requiredStar" style="color: red"> * </span>
                                {!!  Form::select('course_name', $course, old('course_name'),['class'=>'form-control','placeholder'=>'Select a Course','required']) !!}
                            </div>

                            {{-- <div class="form-group">

                                {!! Form::label('name','Batch Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                <select name="batch_name" class="form-control">
                                    <option>Select a batch</option>
                                </select>
                            </div> --}}
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
                            {{-- <div class="form-group">
                                {!! Form::label('name','Batch Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                <select class="form-control" name="batch_id" id="batch_id" required>
                                  <option value="">Select One...</option>
                                  @foreach($batch as $key=> $value)
                                    <option value="{{$key}}" >{{$value}}</option>
                                   @endforeach
                                </select>
                            </div>  --}}                          

                            <div class="form-group" style="display: none">

                                {!! Form::label('name','Roll No') !!} <span class="requiredStar" style="color: red"> * </span>
                                <input type="text" name="roll_no" id="roll_no" value="{{ $roll_no }}" class="form-control">

                            </div>

                            <div class="form-group" style="display: none">
                                {!! Form::label('name','Admission Date') !!} <span class="requiredStar" style="color: red"> * </span>
                                <input class="form-control" type="date" name="admission_date" value="{{ date("Y-m-d")}}" id="admission_date">
                            </div>

                            <div class="form-group">
                                <label for="payment_amount">Course Fee</label>
                                <input type="text" name="course_fee" class="form-control" id="course_fee" readonly>
                            </div>

                            <div class="form-group">
                                <label for="payment_amount">Payment Amount<span class="requiredStar" style="color: red"> * </span></label>
                                <input id="payment_amount" class="form-control" type="number" name="payment_amount" max="course_fee" value="{{old('payment_amount')}}" required>
                              </div>
                             
                                
                            <div class="form-group">
                                {!! Form::label('name','Commitment Date') !!} <span class="requiredStar" style="color: red"> *
                                </span>
                                <input class="form-control" type="date" name="commitment_date" id="commitment_date" 
                                value="{{old('commitment_date')}}">
                            </div>

                            {{-- <div class="form-group">
                                {!! Form::label('name','Coupon Code') !!} <span class="requiredStar" style="color: red"> *
                                </span>
                                <input class="form-control" type="text" name="coupon" id="coupon">
                            </div> --}}

                            <div class="form-group">

                                {!! Form::label('name','Note') !!}
                                {!!  Form::textarea('description',old('description'),['class'=>'form-control','placeholder'=>'Description...','rows'=>'4']) !!}

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit('Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.batch.index') }}">Cancel</a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    {!! Html::script('public/assets/plugins/typeaheadjs/typeahead.bundle.min.js') !!}
    {!! Html::script('public/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/typeahead.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}
    {!! Html::script('public/assets/js/validation/reAdmissionForm-validation.js') !!}
    {!! Html::script('public/assets/js/toastDemo.js') !!}

 <script type="text/javascript">
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


<script type="text/javascript">      
    $(document).ready(function() {
        $('#batch_id').select2();
    });
</script>

{{-- <script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","view/"+str,true);
    xmlhttp.send();
  }
}
</script> --}}

<script type="text/javascript">
let user_id;
    $(document).ready(function () {

        $('#name').on('keyup',function() {

            var query = $(this).val();
            if (query.length > "2") {
            $.ajax({

                url:"{{ route('admin.studentPhone') }}",

                type:"GET",

                data:{'name':query},

                success:function (data) {
                // console.log(data);

                    $('#name_list').html(data);
                }
            }) 
        }
        // end of ajax call
     });
    $(document).on('click', 'option', function(){
        var value = $(this).text();
        var value2 = $(this).val();
        $('#name').val(value);
        $('#value').val(value2);
        $('#name_list').html("");
        if(value2){
            user_id = value2;
        }
        // console.log(user_id);
        // console.log(value2 +" from there");
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#studentId').on('keyup',function() {

            var query = $(this).val();
            if (query.length > "2") {
            $.ajax({

                url:"{{ route('admin.studentId') }}",

                type:"GET",

                data:{'studentId':query},

                success:function (data) {
                // console.log(data);

                $('#name_list2').html(data);
            }
         })
        }
         // end of ajax call
        });
        $(document).on('click', 'li', function(){
            var value = $(this).text();
            var value2 = $(this).val();
            $('#studentId').val(value);
            $('#value2').val(value2);
            $('#name_list2').html("");
            if(value2){
                user_id = value2;
                // console.log(user_id +" from here");  
            }
        });
    });
</script>

<script type="text/javascript">
    var inp1 = document.getElementById("studentId");
    inp1.oninput = function () {
        document.getElementById("name").disabled = this.value != "";
    };
    var inp1 = document.getElementById("name");
    inp1.oninput = function () {
        document.getElementById("studentId").disabled = this.value != "";
    };
</script>
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="course_name"]').on('change',getBatch);
        const course_name = $('select[name="course_name"]').val();
        let base_url = {!! json_encode(url('/')) !!};
        if(course_name){
            jQuery.ajax({
                url : base_url+'/admin/students/admit/batch/'+course_name,
                type : "GET",
                dataType : "json",
                beforeSend: function()
            {
                $('.ajax_loader').css("visibility", "visible");
            },
                success:function(data){
                    jQuery('select[name="batch_name"]').empty();
                    const selected_batch = "{{ old('batch_name') }}";
                    for (let index = 0; index < data.length; index++) {
                        $('#batch_name_admin').append('<option value="'+ data[index].id +'"'+(selected_batch == data[index].id ? 'selected': '')+'>'+ data[index].name +' ('+ data[index].seat_capacity+' seat available)</option>');
                        if(data[index].seat_capacity >=6) 
                        {
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
                beforeSend: function()
            {
                $('.ajax_loader').css("visibility", "visible");
            },
                success:function(data)
                {
                jQuery('select[name="course_fee"]').empty();
                jQuery.each(data, function(key,value){
                    $('input[name=course_fee]').val(value);
                });
                },
                complete: function()
            {
                $('.ajax_loader').css("visibility", "hidden");
            },
            });

            let pay_amount = $(this).val();
            let course_fee = $('#course_fee').val();
            if(Number(pay_amount) <  Number(course_fee)){
                $('#commitment_date').prop('required',true);
            } else{
                $('#commitment_date').removeAttr('required');
            }


        }
    }
    );
</script>

<script type="text/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="course_name"]').on('change', getCourseFee);

        $('input[name=payment_amount]').change(courseFeeValidation);
    });
</script>

<script>
    $("#reAdmissionForm").submit(function(e){
        if(!$('#studentId').val() && !$('#name').val()){
            alert('Fill at least any one of the fields (Student\'s Id or Student\'s Name)');
            e.preventDefault(e);
        }
    });
</script>

<script>
    function getBatch(){
        let countryID = jQuery(this).val();
        let base_url = {!! json_encode(url('/')) !!};
        if(countryID)
        {
            jQuery.ajax({
                url : 'reAdmission/batch/'+countryID,
                url :  base_url+'/admin/students/admit/batch/'+countryID,
                type : "GET",
                dataType : "json",
                beforeSend: function()
            {
                $('.ajax_loader').css("visibility", "visible");
            },
                success:function(data)
                {
                    jQuery('select[name="batch_name"]').empty();
                    for (let index = 0; index < data.length; index++) {
                        $('#batch_name_admin').append('<option value="'+ data[index].id +'">'+ data[index].name +' ('+ data[index].seat_capacity+' seat available)</option>');
                        if(data[index].seat_capacity >=6) 
                        {
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
            $('select[name="batch_name"]').empty();
        }
    }

    function getCourseFee(){
        var countryID = jQuery(this).val();

        if(countryID)
        {
            jQuery.ajax({
                url : 'admit/fee/' +countryID,
                type : "GET",
                dataType : "json",
                beforeSend: function()
            {
                $('.ajax_loader').css("visibility", "visible");
            },
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
                complete: function()
            {
                $('.ajax_loader').css("visibility", "hidden");
            },
            });
        }
        else
        {
            $('select[name="course_fee"]').empty();
        }
    }

    function courseFeeValidation(){
        let pay_amount = $(this).val();
        let course_fee = $('#course_fee').val();
        if(Number(pay_amount) <  Number(course_fee)){
            $('#commitment_date').prop('required',true);
        } else{
            $('#commitment_date').removeAttr('required');
        }
    }
</script>
@endpush
