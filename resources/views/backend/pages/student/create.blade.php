@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('public/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('public/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('public/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
    {!! Html::script('public/jquery-2.2.4.js') !!}
    {!! Html::script('public/assets/bootstrap/bootstrap.min.js') !!}

@endpush

@section('content')

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            @if(Auth::user()->user_type=="Student" || Auth::user()->user_type=="Teacher")
                                
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                            class="fa fa-bars"></i>&nbsp;পরীক্ষা কেন্দ্র</a></li>           
                                <li class="breadcrumb-item"><span>প্রোফাইল</span></li>
                            @else
                                
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a>Students</a></li>
                                <li class="breadcrumb-item"><a href="{{route('admin.students.index')}}">Student List</a></li>        
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span>{{ $student ? 'Update':'Create' }}</span></li>
                            @endif
                        </ol>
                      </nav>
                </div>
            </div>

                <div class="card-body">
                    @if($student !== null)

                        {!! Form::model($student, ['id'=>'studentForm','method'=>'PUT','route' => ['admin.students.update', $student], 'enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route' => 'admin.students.store', 'method' => 'post','id'=>'studentForm','enctype'=>'multipart/form-data']) !!}
                    @endif

                    {{-- <div class="tab-content" id="nav-tabContent"> --}}
{{-- <h4>প্রোফাইল</h4> --}}
                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name','নামের প্রথম অংশ (নামের শেষ অংশ বাদে সকল অংশ )') !!} <span class="requiredStar" style="color: red"> * </span>
                                    @if($student == null)
                                        <input type="text" name="first_name" class="form-control">
                                    @else
                                        <input type="text" name="first_name" value="{{ $first_name }}" id="first_name" class="form-control">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">

                                    {!! Form::label('name','নামের শেষ অংশ') !!} <span class="requiredStar" style="color: red"> * </span>
                                    @if($student == null)
                                        <input type="text" name="last_name" class="form-control">
                                    @else
                                        <input type="text" name="last_name" value="{{ $last_name }}" id="last_name" class="form-control">
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">

                                    {!! Form::label('name','ইমেইল') !!}<span class="requiredStar" style="color: red"> * </span>
                                    @if($student == null)
                                        <input type="email" name="email" class="form-control">
                                    @else
                                        <input type="email" name="email" value="{{ $student->user->email }}" id="email" class="form-control" readonly style="cursor:not-allowed">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name','মোবাইল নাম্বার') !!} <span class="requiredStar" style="color: red"> * </span>
                                    @if($student == null)
                                        <input type="text" name="phone" class="form-control" maxlength="11">
                                    @else
                                        <input type="text" name="phone" value="{{ $student->user->phone }}" id="phone" class="form-control" maxlength="11">
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="col-md-12">
                                <div class="form-group">

                                    {!! Form::label('name','পরীক্ষার ধরণ') !!} <span class="requiredStar" style="color: red"> * </span>
                                    {!!  Form::text('exam_type',old('exam_type'),['class'=>'form-control']) !!}

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">

                                    {!! Form::label('name','পরীক্ষা') !!} <span class="requiredStar" style="color: red"> * </span>
                                    {!!  Form::text('exam',old('exam'),['class'=>'form-control']) !!}

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">

                                    {!! Form::label('name','বিষয়') !!} <span class="requiredStar" style="color: red"> * </span>
                                    {!!  Form::text('subject',old('subject'),['class'=>'form-control']) !!}

                                </div>
                            </div> --}}

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">পাসওয়ার্ড</label> <span class="requiredStar" style="color: red"> * </span>
                                    @if($student == null)
                                        <input id="password" class="form-control" type="password" minlength="8" name="password">
                                    @else
                                        <input id="password" class="form-control" type="text" minlength="8" name="password" value="{{ $student->user->raw_password }}" readonly style="cursor:not-allowed">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">

                                    {!! Form::label('name','জন্ম নিবন্ধন নম্বর / এন আই ডি নম্বর') !!} 
                                    {!!  Form::text('birth_id',old('birth_id'),['class'=>'form-control']) !!}

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">

                                    {!! Form::label('name','বর্তমান ঠিকানা') !!} 
                                    {!!  Form::text('present_address',old('present_address'),['class'=>'form-control']) !!}

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">

                                    {!! Form::label('name','সর্বশেষ শিক্ষাগত যোগ্যতা ') !!} 
                                    {!!  Form::text('class',old('class'),['class'=>'form-control']) !!}

                                </div>
                            </div> 

                            <div class="col-md-12">
                                <div class="form-group">

                                    {!! Form::label('name','শিক্ষা প্রতিষ্ঠানের নাম ') !!} 
                                    {!!  Form::text('shool_name',old('shool_name'),['class'=>'form-control']) !!}

                                </div>
                            </div> 

                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name','District') !!}
                                    {!!  Form::text('district',old('district'),['class'=>'form-control']) !!}
                                  </div>   
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name','Thana') !!}
                                    {!!  Form::text('thana',old('thana'),['class'=>'form-control']) !!}
                                  </div>
                            </div> --}}

                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                <label>
                                    {!! Form::checkbox('status', '1', old('status'), ['id' => 'status']) !!}
                                    Enable this Student <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can enable or disable this student"></i>
                                </label>
                            </div>
                            </div> --}}

                            
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                @if($student!=null)
                                    <img id='img' src="{{ asset('/public/uploads/user_images') }}/{{$student->user->user_image }}" style="width:100px; height:100px; margin-left:25px; margin-bottom: 10px">
                                @else
                                    <img id='img' src="{{ asset('/public/uploads/avatars/default.jpg') }}" style="width:100px; height:100px;  margin-left:25px; margin-bottom: 10px">
                                @endif
                                <br>
                                <label class="control-label ml-4" style="font-size: 15px">ইউজার ইমেজ</label>
                                <input type="file" class="form-control dropify" name="image" id="image" data-max-file-size="800kb" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" data-default-file="">
                                <span class="validation-msg" id="type-error">
                                    @error('image')<p class="text-danger">{{ $message }}</p>@enderror
                                </span>
                                <br>
                                    <p class="text-muted" style="font-size: 12px"><span class="requiredStar" style="color: red"> * </span>ইমেজ ডাইম্যানশন অবশ্যই ২৫০ x ২৫০ এবং সাইজ 800kb এর মধ্যে হতে হবে |</p>
                                    <p class="text-muted" style="font-size: 12px"><span class="requiredStar" style="color: red"> * </span>ইমেজ ফরম্যাট অবশ্যই .jpeg .jpg অথবা .png হতে হবে |</p>
                              </div>

                              <div class="form-group">
                                <label class="control-label ml-2" style="font-size: 15px">হাতের লেখার ছবি </label><br>
                                <label class="control-label ml-2" style="font-size: 12px">নিচের নিয়মাবলী পড়ুন :<br><span>
১ । আপনি একটি সাদা কাগজে ( সাইজ ৪" x ৮" ) নিচের লেখাটি নিজের হাতে  লিখে জমা দিন। <br>
২। লেখাটি অবশ্যই পরীক্ষার্থীর নিজের হাতের লেখা হতে হবে | পরবর্তীতে লিখিত প্রশ্নের উত্তর পত্রের সাথে না মিললে উক্ত পরীক্ষাটি বাতিল বলে গণ্য হবে |   </span></label>
                                <br><img id='img' src="{{ asset('/public/uploads/avatars/demo.jpg') }}" style="width: 276px; height: 149px;  margin-left: 12px; margin-bottom: 10px">
                                <input type="file" class="form-control dropify" name="document[]" id="document" multiple="multiple">
                                <br>
                                    {{-- <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>E.g. Birth Certificate or Academic Certificates</p> --}}
                                    <p class="text-muted" style="font-size: 12px"><span class="requiredStar" style="color: red"> * </span>ডকুমেন্ট ফরম্যাট অবশ্যই .jpeg .jpg অথবা .png এবং সাইজ 800kb এর মধ্যে হতে হবে |</p>  
                              </div>
                              @if(!empty($student->files))
                              আপনার আপলোডকৃত ফাইল<br>
                              <img id='img' src="{{ asset('/public/uploads/user_documents/') }}/{{ $student->files}}" style="width: 276px; height: 149px;  margin-left: 8px; margin-bottom: 10px;margin-top: 10px">
                              @else
                                <span></span>
                              @endif
                            </div>
                            {{-- <div class="col-md-1">
                                <div style="border-left:1px solid #b2beb5;height:500px;"></div>
                            </div>
                            <div class="col-md-5">
                                <div class="mt-4">
                                    <h4 class="text-center">Uploaded Attachments</h4>
                                    <br>
                                    @if (!empty($fileArray))
                                        <div>
                                            @for ($i=0;$i<count($fileArray); $i++)
                                                <p> {{$i+1}}. <a style="text-decoration: none;" download='file' href="{{ asset('/public/uploads/user_documents') }}/{{$fileArray[$i]}}" data-toggle="tooltip" title="" data-original-title="Download">{{ $fileArray[$i] }}</a></p>      
                                            @endfor    
                                        </div> 
                                    @endif
                                </div>
                            </div> --}}
                          </div>
                      {{-- </div></br> --}}
                      <div class="form-group">
                          {!! Form::submit($student!==null ? 'আপডেট করুন':'সেভ করুন',['class'=>'btn btn-primary mr-2']) !!}
                          <a class="btn btn-danger" href="{{ route('admin.students.index') }}">বাতিল করুন</a>
                      </div>

                {!! Form::close() !!}

            </div>

        </div>

    </div>

@endsection

@section('js-script')

<script type="text/javascript">
if($("#mail_type").val() != "smtp"){
    $(".smtp").prop("disabled",true);
}
$(document).on("change","#mail_type",function(){
    if( $(this).val() != "smtp" ){
        $(".smtp").prop("disabled",true);
    }else{
        $(".smtp").prop("disabled",false);
    }
});
</script>

@stop
@push('plugin-scripts')
    {!! Html::script('public/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('public/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('public/assets/js/img-preview.js') !!}
    {!! Html::script('public/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('public/assets/plugins/jquery-validation/additional-methods.js') !!}
    {!! Html::script('public/assets/plugins/select2/js/select2.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('public/assets/js/data-table.js') !!}
    {!! Html::script('public/assets/js/toastDemo.js') !!}
    {!! Html::script('public/assets/js/validation/studentForm-validation.js') !!}
    {!! Html::script('public/assets/js/select2.js') !!}

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
        $(document).ready(function() {
            $('#select1').select2();
        });
        $(document).ready(function() {
            $('#select2').select2();
        });
    </script>
@endpush
