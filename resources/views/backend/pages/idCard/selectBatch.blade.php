@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('public/css/loader.css') !!}
@endpush

@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a></li>
                            <li class="breadcrumb-item"><a href="#">ID Card</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Select Course and Batch</span></li>
                        </ol>
                      </nav>
                </div>
            </div>
            <div class="card-body">
                <div class="ajax_loader">
                    <img src="{{ url('assets/images/loading.gif') }}" class="img-responsive" />
                </div>
               {!! Form::open(['id'=>'batchScheduleForm','enctype'=>'multipart/form-data','url' => route('admin.students.idcardGeneration')]) !!}
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">

                               {!! Form::label('name','Course Type') !!} <span class="requiredStar" style="color: red"> * </span>
                               {!!  Form::select('course_name', $course, null,['class'=>'form-control','placeholder'=>'Select a Course','required']) !!}
                           </div>

                           <div class="form-group">

                               {!! Form::label('name','Batch Name') !!} <span class="requiredStar" style="color: red"> * </span>
                               <select name="batch_name" class="form-control">
                                   <option>Select a batch</option>
                               </select>
                           </div>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-md-8">
                           <div class="text-center float-left">
                               {!! Form::submit('Show',['class'=>'btn btn-primary mr-2']) !!}
                               {{-- <a class="btn btn-primary" href="{{ route('admin.batchSchedule.create') }}">Enter</a> --}}
                               {{-- <a class="btn btn-danger" href="{{ route('admin.batchSchedule.index') }}">Cancel</a> --}}
                           </div>
                       </div>
                   </div>
               {{-- {!! Form::close !!} --}}
            </div>          
        </div>
    </div>

@endsection

@push('plugin-scripts')
   {!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
   {!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
   {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
   {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/data-table.js') !!}
    {!! Html::script('public/assets/js/toastDemo.js') !!}
    {!! Html::script('public/assets/js/validation/batchScheduleForm-validation.js') !!}

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
    <!-- dropdown.blade.php -->
    <script type="text/javascript">
        jQuery(document).ready(function ()
        {
            jQuery('select[name="course_name"]').on('change',function(){
                let countryID = jQuery(this).val();
                let base_url = {!! json_encode(url('/')) !!};
                if(countryID)
                   {
                      jQuery.ajax({
                         url : base_url+'/admin/batchSchedule/check/batch/'+countryID,
                         type : "GET",
                         dataType : "json",
                         beforeSend: function()
                        {
                            $('.ajax_loader').css("visibility", "visible");
                        },
                         success:function(data)
                         {
                            console.log(data);
                            $('select[name="batch_name"]').empty();
                            // $.each(data, function(key,value){
                            //    $('select[name="batch_name"]').append('<option value="'+ key +'">'+ value +'</option>');
                            // });
                            for (let index = 0; index < data.length; index++) {
                                $('select[name="batch_name"]').append('<option value="'+ data[index].id +'">'+ data[index].name +'</option>');
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
            });
        });
    </script>
@endpush



