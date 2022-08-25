 @extends('backend.layout.master')

 @push('plugin-styles')
     {!! Html::style('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
     {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
     {!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
 @endpush

 @section('content')
     <div class="col-md-12 grid-margin stretch-card">
         <div class="card">
             <div class="card-header">
                 <div class="template-demo">
                     <nav aria-label="breadcrumb" class="nav-container">
                         <ol class="breadcrumb breadcrumb-custom ">
                             <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i>&nbsp;Home</a></li>
                             <li class="breadcrumb-item"><a href="#">Class Routine</a></li>
                             <li class="breadcrumb-item active" aria-current="page"><span>Edit Class Routine</span></li>
                         </ol>
                       </nav>
                 </div>
             </div>
            <div class="portlet-body form">
				<div class="form-body">
					{!! Form::model($batchSchedule, ['id'=>'batchScheduleForm','method'=>'PUT','route' => ['admin.batchSchedule.update', $batchSchedule]]) !!}
                    <div class="alert alert-info marginBottomNone">
                        <div class="form-group marginBottomNone">
                            <div class="row">
                                <div class="input-form">
                                  <div class="form-inline">
                                	<div class="col-md-3 routineFildMarginBottom" style="margin-left: 2%">
                                		<label class="control-label" style="margin-right: 60%">Batch Name</label>
                                      
                                        {!! Form::select('batch_name', $batch, $batchSchedule->batch_name, ['class' => 'form-control','placeholder' => 'Select a Batch..']) !!}
                                    </div>

                                    <div class="col-md-3 routineFildMarginBottom">
                                    	<label class="control-label"style="margin-right: 56%">Subject Name</label>
                                        {!! Form::select('subject_name', $subject, $batchSchedule->name, ['class' => 'form-control','placeholder' => 'Select your Subject..']) !!}
                                    </div>
                                    
                                    <div class="col-md-3 routineFildMarginBottom">
                                    	<label class="control-label" style="margin-right: 80%">Days</label>
                                    	{!! Form::select('days', $day, $batchSchedule->name, ['class' => 'form-control','placeholder' => 'Select a Day..']) !!}
                                    </div>

                                    <div class="col-md-3 routineFildMarginBottom" style="margin-left: 2%">
                                    	<label class="control-label" style="margin-right: 63%">Start Time</label>
                                        <input class="form-control" type="time" name="start_time" value="{{ $batchSchedule->start_time }}"
                                            id="start_time">
                                    </div>

                                    <div class="col-md-3 routineFildMarginBottom">
                                    	<label class="control-label" style="margin-right: 63%">End Time</label>
                                        <input class="form-control" type="time" name="end_time" value="{{ $batchSchedule->end_time }}">
                                    </div>

                                    <div class="col-md-3 routineFildMarginBottom">
                                    	<label class="control-label" style="margin-right: 63%">Room No</label>
                                        <input type="text" class="form-control" placeholder="" name="room_no" value="{{ $batchSchedule->room_no }}" data-validation="required" data-validation-error-msg="" required>
                                    </div>
                                  </div> 
								</div>
                            </div>
                        </div>                       
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="float-right">
                                {!! Form::submit($batchSchedule!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                                <a class="btn btn-danger" href="{{ route('admin.batchSchedule.index') }}">Cancel</a>
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
    {!! Html::script('/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
 @endpush

 @push('custom-scripts')
     {!! Html::script('/assets/js/data-table.js') !!}
     {!! Html::script('/assets/js/toastDemo.js') !!}
     {!! Html::script('/assets/js/validation/batchScheduleForm-validation.js') !!}

     {{-- js code snippet to show toastr notification --}}
     
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

    {{-- js code snippet to populate select batch dropdown according to selected course --}}

     <script type="text/javascript">
       $(document).ready(function(){
         $( "#add-row" ).click(function(){
           $( "div.input-form" ).first().clone().appendTo( ".personal-details1" ).append('<a href="#" id="remove" class="text-danger"><i class="fa fa-minus fa-2x" aria-hidden="true"></i></a>').find('input').val('');
         });

         $( "body" ).on('click', '#remove', function(){
           $(this).closest('.input-form').remove();
         });
       });
     </script>
 @endpush
 


