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
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                        class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a>Students</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>Batch Transfer</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="ajax_loader">
                    <img src="{{ url('assets/images/loading.gif') }}" class="img-responsive" />
                </div>
                <div class="card">
                <p class="text-black" style="font-size: 15px; text-align: center; color: black"> </p>
                </div>
                <div class="card-body">

                        {!! Form::open(['id'=>'reAdmissionForm','enctype'=>'multipart/form-data','url' => route('admin.students.transferStore')]) !!}

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group" id="style">
                                {!! Form::label('name3','Student\'s Id') !!} <span class="requiredStar" style="color: red"> * </span>
                                <input id="studentId" type="text" name="user_id2" placeholder="" class="form-control studentId" autocomplete="off" data-id="">
                                <input id="value2" type="hidden" name="user_id2">
                                <div class="card" id="name_list2">
                                </div>
                                <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>Type at least first 3 digits of Student ID for suggestion</p>
                            </div>
{{-- 
                            <div class="form-group" id="style">
                                {!! Form::label('name','Student\'s Name or Phone No') !!} <span class="requiredStar" style="color: red"> * </span>
                                <input id="name" type="text" name="user_id"  placeholder="" class="form-control studentId" autocomplete="off" data-id="">
                                <input id="value" type="hidden" name="user_id">
                                <div class="card" id="name_list">
                                </div>
                            </div>  --}}

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
                                {!! Form::label('name','Admission Date') !!} <span class="requiredStar" style="color: red"> * </span>
                                <input class="form-control" type="date" name="admission_date" value="{{ date("Y-m-d")}}" id="admission_date">
                            </div>

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
            user_id = value.split('-')[1];
            // console.log(user_id); 
            // getBatch(user_id);
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
            $('#name_list2').html("");
            if(value2){
                user_id = value2;
                user_id = value.split('-')[1];
                $('#value2').val(user_id); 
                getBatch(user_id);
                // console.log(user_id +" from here");  
            }
        });
    });
</script>

{{-- <script type="text/javascript">
    var inp1 = document.getElementById("studentId");
    inp1.oninput = function () {
        document.getElementById("name").disabled = this.value != "";
    };
    var inp1 = document.getElementById("name");
    inp1.oninput = function () {
        document.getElementById("studentId").disabled = this.value != "";
    };
</script> --}}

<script>
    $('#value2').change(function(){
        console.log($('#value2').val());   
    });

    $('#value').change(function(){
        console.log($('#value').val());
    });
</script>

<script>
    function getBatch(studentId){
        if(studentId)
        {
            $.ajax({
                url : 'batchTransfer/batch/'+studentId,
                type : "GET",
                dataType : "json",
                beforeSend: function()
            {
                $('.ajax_loader').css("visibility", "visible");
            },
                success:function(data)
                {
                    console.log(data.course_batch);
                    $('select[name="batch_name"]').empty();
                    for (let index = 0; index < data.course_batch.length; index++) {
                        if(data.course_batch[index].id != data.current_batch_id){
                            $('#batch_name_admin').append('<option value="'+ data.course_batch[index].id +'">'+ data.course_batch[index].name +' ('+ data.course_batch[index].seat_capacity+' seat available)</option>');
                        }
                        if(data.course_batch[index].seat_capacity >=6  && data.course_batch[index].id != data.current_batch_id){
                            $('#batch_name_manager').append('<option value="'+ data.course_batch[index].id +'">'+ data.course_batch[index].name+' ('+ (data.course_batch[index].seat_capacity-5)+'+ seat available)</option>');
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

    
</script>
@endpush
