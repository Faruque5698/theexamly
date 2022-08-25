@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/select2/css/select2.min.css') !!}
@endpush

<style type="text/css">
  #style #name_list{
    display: block;
    background-color: white;
    list-style-type: none;
    position: relative;
    width: 485px;
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
    width: 485px;
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
                                <li class="breadcrumb-item"><a>Payment</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>Collect Fees</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>

               {{--  <p class="text-black" style="font-size: 11px"><span class="requiredStar" style="color: red"> * </span>Note: Please Use any one field (Student's Phone Number or Student's Id). </p> --}}
                
                <div class="card-body">
                  {!! Form::open(['id'=>'courseForm','autocomplete' => 'off','url' => route('admin.Individual.indexIndividual2')]) !!} 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group" id="style">
                            {!! Form::label('name3','Student\'s Id') !!} <span class="requiredStar" style="color: red"> * </span>
                            <input id="studentId" type="text" name="user_id2" placeholder="" class="form-control">
                            <input id="value2" type="hidden" name="user_id2">
                            <div class="card" id="name_list2">
                            </div>
                            <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>Type at least first 3 digits of Student ID for suggestion</p>
                        </div>

                        {{-- <div class="form-group" id="style">
                            {!! Form::label('name','Student\'s Name or Phone No') !!} <span class="requiredStar" style="color: red"> * </span>
                            <input id="name" type="text" name="user_id"  placeholder="" class="form-control">
                            <input id="value" type="hidden" name="user_id">
                            <div class="card" id="name_list">
                            </div>
                        </div>  --}}
                          {{-- <div class="form-group">
                            <label for="student_name">Student's Name<span class="requiredStar" style="color: red"> * </span></label>
                              <select class="form-control" name="student_name" id="student_name"  style="width: 100%">
                                  <option></option>
                              </select>
                          </div> --}}
                         {{--  <div class="form-group">
                            <label for="student_phone">Student's Phone No<span class="requiredStar" style="color: red"> * </span></label>
                              <select class="form-control" name="student_phone" id="student_phone"  style="width: 100%">
                                  <option></option>
                              </select>
                          </div> --}}                         
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit('Show',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ url()->previous() }}">Back</a>
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
    {!! Html::script('/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/select2.js') !!}
    {!! Html::script('/assets/js/validation/courseForm-validation.js') !!}

      <script type="text/javascript">      
        $(document).ready(function() {
            $('#student_phone').select2();
        });
        $(document).ready(function() {
            $('#student_id').select2();
        });
    </script>
    {{-- <script type="text/javascript">
        var inp1 = document.getElementById("student_phone");
        inp1.oninput = function () {
          document.getElementById("student_id").disabled = this.value != "";
        };
        var inp1 = document.getElementById("student_id");
        inp1.oninput = function () {
          document.getElementById("student_phone").disabled = this.value != "";
        };
    </script> --}}

    <script type="text/javascript">
      $(document).ready(function () {

        $('#name').on('keyup',function() {

            var query = $(this).val();
            if (query.length > "2") {
            $.ajax({

              url:"{{ route('admin.studentPhone') }}",

              type:"GET",

              data:{'name':query},

              success:function (data) {
                console.log(data);

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
          // console.log(value2);
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
@endpush
