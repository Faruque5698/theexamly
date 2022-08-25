@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') !!}
    {!! Html::style('/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
    {!! Html::style('/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('/assets/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') !!}
    {!! Html::script('/jquery-2.2.4.js') !!}
    {!! Html::script('/assets/bootstrap/bootstrap.min.js') !!}

@endpush

@section('content')

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            @if(Auth::user()->user_type=="Student")
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i
                                            class="ti-home"></i>&nbsp;হোম</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                            class="fa fa-bar"></i>&nbsp;পরীক্ষা কেন্দ্র</a></li>           
                                <li class="breadcrumb-item"><span>প্রোফাইল</span></li>
                            @else
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i
                                            class="ti-home"></i>&nbsp;Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-bar"></i>&nbsp;Dashboard</a></li>
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
                    <nav>
                      <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                        <a style="font-size: 90%" class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">General Information</a>
                        <a style="font-size: 90%" class="nav-item nav-link" id="nav-settings-tab" data-toggle="tab" href="#nav-settings" role="tab" aria-controls="nav-settings" aria-selected="false">Academic Information</a>
                        <a style="font-size: 90%"class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Parent's Information</a>
                        <a style="font-size: 90%" class="nav-item nav-link" id="nav-messages-tab" data-toggle="tab" href="#nav-messages" role="tab" aria-controls="nav-messages" aria-selected="false">Local Guardian's Information</a>
                        <a style="font-size: 90%" class="nav-item nav-link" id="nav-medical-tab" data-toggle="tab" href="#nav-medical" role="tab" aria-controls="nav-medical" aria-selected="false">Medical Information</a>
                        <a style="font-size: 90%" class="nav-item nav-link" id="nav-logo-tab" data-toggle="tab" href="#nav-logo" role="tab" aria-controls="nav-logo" aria-selected="false">Student Image and Documents</a>
                      </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name','Full Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                    @if($student == null)
                                        <input type="text" name="name" class="form-control">
                                    @else
                                        <input type="text" name="name" value="{{ $student->user->name }}" id="name" class="form-control">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">

                                    {!! Form::label('name','Nick Name') !!}
                                    {!!  Form::text('short_name',old('short_name'),['class'=>'form-control']) !!}

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name','Student\'s Phone No') !!} <span class="requiredStar" style="color: red"> * </span>
                                    @if($student == null)
                                        <input type="text" name="phone" class="form-control" maxlength="11">
                                    @else
                                        <input type="text" name="phone" value="{{ $student->user->phone }}" id="phone" class="form-control" maxlength="11">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">

                                    {!! Form::label('name','Student\'s Email Address') !!}<span class="requiredStar" style="color: red"> * </span>
                                    @if($student == null)
                                        <input type="email" name="email" class="form-control">
                                    @else
                                        <input type="email" name="email" value="{{ $student->user->email }}" id="email" class="form-control">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">

                                    {!! Form::label('name','Primary Contact No') !!} 
                                    {!!  Form::text('primary_contact_no',old('primary_contact_no'),['class'=>'form-control','maxlength'=>'11']) !!}

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">

                                    {!! Form::label('name','Present Address') !!} 
                                    {!!  Form::text('present_address',old('present_address'),['class'=>'form-control']) !!}

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">

                                    {!! Form::label('name','Permanent Address') !!} 
                                    {!!  Form::text('permanent_address',old('permanent_address'),['class'=>'form-control']) !!}

                                </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                {!! Form::label('name','Date of Birth') !!}
                                @if($student == null)
                                    <input class="form-control" type="date" name="birth_date" id="birth_date">
                                @else
                                    <input class="form-control" type="date" name="birth_date" value="{{ $student->birth_date }}"
                                    id="birth_date">
                                @endif
                              </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name','Birth ID Number') !!}
                                    {!!  Form::number('birth_id',old('birth_id'),['class'=>'form-control']) !!}
                                </div>   
                            </div>

                            <div class="col-md-12">
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
                            </div>

                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                <label>
                                    {!! Form::checkbox('status', '1', old('status'), ['id' => 'status']) !!}
                                    Enable this Student <i class="fa fa-question-circle" data-toggle="tooltip" title="" data-original-title="you can enable or disable this student"></i>
                                </label>
                            </div>
                            </div> --}}

                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name','Batch Name') !!} <span class="requiredStar" style="color: red"> * </span>
                                    @if($student == null)
                                    {!!  Form::select('batch_id',$batch,$student,['class'=>'form-control','placeholder'=>'Select a Batch']) !!}
                                    @else
                                    {!!  Form::select('batch_id',$batch,$student->batch_id,['class'=>'form-control','placeholder'=>'Select a Batch', 'disabled' => true,'style'=>'cursor:not-allowed']) !!}
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name','Roll No') !!}  <span class="requiredStar" style="color: red"> * </span>
                                    <input type="text" name="roll_no" value="{{ ($student) ? $student->roll_no : $roll_no }}" class="form-control" readonly style="cursor:not-allowed">
                                </div>
                            </div> --}}

                            <div class="col-md-12" style="display: none">
                                <div class="form-group">
                                    {!! Form::label('name','Student Id') !!}
                                    {!!  Form::text('student_id',old('student_id'),['class'=>'form-control']) !!}
                                    {{-- {!! Form::label('name','Student Roll No') !!}
                                    {!!  Form::text('roll_no',old('roll_no'),['class'=>'form-control']) !!} --}}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">Login Password</label> <span class="requiredStar" style="color: red"> * </span>
                                    @if($student == null)
                                        <input id="password" class="form-control" type="password" minlength="8" name="password">
                                    @else
                                        <input id="password" class="form-control" type="text" minlength="8" name="password" value="{{ $student->user->raw_password }}" readonly style="cursor:not-allowed">
                                    @endif
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="tab-pane fade" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        {!! Form::label('name','Student\'s Current School Name') !!}
                                        {!!  Form::text('school_name',old('school_name'),['class'=>'form-control']) !!}

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('name','Student\'s Current Class') !!}
                                        {!!  Form::text('class',old('class'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('name','Student\'s Current School Roll No') !!}
                                        {!!  Form::text('school_roll_no',old('school_roll_no'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('name','District Name of School') !!}<br>
                                        @if($student == null)
                                        {!!  Form::select('school_district',$district,$student,['class'=>'form-control','placeholder'=>'Select district...','id'=>'select1']) !!}
                                        @else
                                        {!!  Form::select('school_district',$district,$student->school_district,['class'=>'form-control','placeholder'=>'Select district...','id'=>'select1']) !!}
                                        @endif
                                    </div>                              
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('name','Thana Name of School') !!}<br>
                                        @if($student == null)
                                        {!!  Form::select('school_thana',$thana,$student,['class'=>'form-control','placeholder'=>'Select thana...','id'=>'select2']) !!}
                                        @else
                                        {!!  Form::select('school_thana',$thana,$student->school_thana,['class'=>'form-control','placeholder'=>'Select thana...','id'=>'select2']) !!}
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <H5 class="text-center">Degree/Diploma</H5>

                                            
                                            
                                                <input type="hidden" name="result_id_0" 
                                                value="{{ !empty($result[0]) ? $result[0]->id : '' }}">
                                                
                                            
                                                <input type="hidden" name="result_id_1" 
                                                value="{{ !empty($result[1]) ? $result[1]->id : '' }}">
                                        
                                                <input type="hidden" name="result_id_2" 
                                                value="{{ !empty($result[2]) ? $result[2]->id : '' }}">  

                                                <input type="hidden" name="result_id_3" 
                                                value="{{ !empty($result[3]) ? $result[3]->id : '' }}">      
                                            
                                            
                                            <select class="form-control mb-2" name="degree[]" id="degree" type="text">
                                                <option value="">Select one..</option>
                                                <option value="H.S.C"
                                                {{!empty($result[0]) && ($result[0]->degree) == "H.S.C"  ? 'selected' : ''}}
                                                >H.S.C</option>
                                                <option value="S.S.C"
                                                {{!empty($result[0]) && ($result[0]->degree) == "S.S.C"  ? 'selected' : ''}}>S.S.C</option>
                                                <option value="J.S.C"
                                                {{!empty($result[0]) && ($result[0]->degree) == "J.S.C"  ? 'selected' : ''}}>J.S.C</option>
                                                <option value="P.S.C"
                                                {{!empty($result[0]) && ($result[0]->degree) == "P.S.C"  ? 'selected' : ''}}>P.S.C</option>
                                            </select>
                                            <select class="form-control mb-2" name="degree[]" id="degree" type="text">
                                                <option value="">Select one..</option>
                                                <option value="H.S.C"
                                                {{!empty($result[1]) && $result[1]->degree == "H.S.C"  ? 'selected' : ''}}>H.S.C</option>
                                                <option value="S.S.C"
                                                {{!empty($result[1]) && $result[1]->degree == "S.S.C"  ? 'selected' : ''}}>S.S.C</option>
                                                <option value="J.S.C"
                                                {{!empty($result[1]) && $result[1]->degree == "J.S.C"  ? 'selected' : ''}}>J.S.C</option>
                                                <option value="P.S.C"
                                                {{!empty($result[1]) && $result[1]->degree == "P.S.C"  ? 'selected' : ''}}>P.S.C</option>
                                            </select>
                                            <select class="form-control mb-2" name="degree[]" type="text">
                                                <option value="">Select one..</option>
                                                <option value="H.S.C"
                                                {{!empty($result[2]) && $result[2]->degree == "H.S.C"  ? 'selected' : ''}}>H.S.C</option>
                                                <option value="S.S.C"
                                                {{!empty($result[2]) && $result[2]->degree == "S.S.C"  ? 'selected' : ''}}>S.S.C</option>
                                                <option value="J.S.C"
                                                {{!empty($result[2]) && $result[2]->degree == "J.S.C"  ? 'selected' : ''}}>J.S.C</option>
                                                <option value="P.S.C"
                                                {{!empty($result[2]) && $result[2]->degree == "P.S.C"  ? 'selected' : ''}}>P.S.C</option>
                                            </select>
                                            <select class="form-control mb-2" name="degree[]" type="text">
                                                <option value="">Select one..</option>
                                                <option value="H.S.C"
                                                {{!empty($result[3]) && $result[3]->degree == "H.S.C"  ? 'selected' : ''}}>H.S.C</option>
                                                <option value="S.S.C"
                                                {{!empty($result[3]) && $result[3]->degree == "S.S.C"  ? 'selected' : ''}}>S.S.C</option>
                                                <option value="J.S.C"
                                                {{!empty($result[3]) && $result[3]->degree == "J.S.C"  ? 'selected' : ''}}>J.S.C</option>
                                                <option value="P.S.C"
                                                {{!empty($result[3]) && $result[3]->degree == "P.S.C"  ? 'selected' : ''}}>P.S.C</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-3">
                                            <H5 class="text-center">School/College/University</H5>
                                            <input class="form-control mb-2" name="institution[]" type="text"
                                            value="{{!empty($result[0]) ? $result[0]->institution : ''}}">
                                            <input class="form-control mb-2" name="institution[]" type="text"
                                            value="{{!empty($result[1]) ? $result[1]->institution : ''}}">
                                            <input class="form-control mb-2" name="institution[]" type="text"
                                            value="{{!empty($result[2]) ? $result[2]->institution : ''}}">
                                            <input class="form-control" name="institution[]" type="text"
                                            value="{{!empty($result[3]) ? $result[3]->institution : ''}}">
                                        </div>

                                        <div class="col-sm-2">
                                            <H5 class="text-center">Group/Subject</H5>
                                            <input class="form-control mb-2" name="group[]" type="text" placeholder="" value="{{!empty($result[0]) ? $result[0]->group : ''}}">
                                            <input class="form-control mb-2" name="group[]" type="text" placeholder="" value="{{!empty($result[1]) ? $result[1]->group : ''}}">
                                            <input class="form-control mb-2" name="group[]" type="text" placeholder="" value="{{!empty($result[2]) ? $result[2]->group : ''}}">
                                            <input class="form-control" name="group[]" type="text" placeholder=""
                                            value="{{!empty($result[3]) ? $result[3]->group : ''}}">
                                        </div>


                                        <div class="col-sm-1">
                                            <H5 class="text-center">Result</H5>
                                            <input class="form-control mb-2" name="result[]" type="text"
                                            value="{{!empty($result[0]) ? $result[0]->result : ''}}">
                                            <input class="form-control mb-2" name="result[]" type="text"
                                            value="{{!empty($result[1]) ? $result[1]->result : ''}}">
                                            <input class="form-control mb-2" name="result[]" type="text"
                                            value="{{!empty($result[2]) ? $result[2]->result : ''}}">
                                            <input class="form-control" name="result[]" type="text"
                                            value="{{!empty($result[3]) ? $result[3]->result : ''}}">

                                        </div>

                                         <div class="col-sm-2">
                                            <H5 class="text-center">Total Marks</H5>
                                            <input class="form-control mb-2" name="total_mark[]" type="text"
                                            value="{{!empty($result[0]) ? $result[0]->total_mark : ''}}">
                                            <input class="form-control mb-2" name="total_mark[]" type="text"
                                            value="{{!empty($result[1]) ? $result[1]->total_mark : ''}}">
                                            <input class="form-control mb-2" name="total_mark[]" type="text"
                                            value="{{!empty($result[2]) ? $result[2]->total_mark : ''}}">
                                            <input class="form-control" name="total_mark[]" type="text"
                                            value="{{!empty($result[3]) ? $result[3]->total_mark : ''}}">

                                        </div>

                                        <div class="col-sm-2">
                                            <H5 class="text-center">Passing Year</H5>
                                            <input class="form-control mb-2" name="passingYear[]" type="text"
                                            value="{{!empty($result[0]) ? $result[0]->passingYear : ''}}">
                                            <input class="form-control mb-2" name="passingYear[]" type="text"
                                            value="{{!empty($result[1]) ? $result[1]->passingYear : ''}}">
                                            <input class="form-control mb-2" name="passingYear[]" type="text"
                                            value="{{!empty($result[2]) ? $result[2]->passingYear : ''}}">
                                            <input class="form-control" name="passingYear[]" type="text"
                                            value="{{!empty($result[3]) ? $result[3]->passingYear : ''}}">

                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>

                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name',"Father's Name") !!} 
                                    {!!  Form::text('father_name',old('father_name'),['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name',"Mother's Name") !!} 
                                    {!!  Form::text('mother_name',old('mother_name'),['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name',"Father's Occupation") !!}
                                    {!!  Form::text('fa_occupation',old('fa_occupation'),['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name',"Mothers's Occupation") !!}
                                    {!!  Form::text('ma_occupation',old('ma_occupation'),['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name',"Father's Phone No") !!}
                                    {!!  Form::text('fa_phone',old('fa_phone'),['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name',"Mother's Phone No") !!}
                                    {!!  Form::text('ma_phone',old('ma_phone'),['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name',"Father's Email") !!}
                                    {!!  Form::text('fa_email',old('fa_email'),['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name',"Mother's Email") !!}
                                    {!!  Form::text('ma_email',old('ma_phone'),['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name',"Father's NID") !!}
                                    {!!  Form::text('fa_nid',old('fa_nid'),['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('name',"Mother's NID") !!}
                                    {!!  Form::text('ma_nid',old('ma_nid'),['class'=>'form-control']) !!}
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="tab-pane fade" id="nav-messages" role="tabpanel" aria-labelledby="nav-messages-tab">
                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name','Local Guardian\'s Name') !!}
                                    {!!  Form::text('local_guardian',old('local_guardian'),['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name','Relation With Student') !!}
                                    {!!  Form::text('relation',old('relation'),['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name','Phone') !!}
                                    {!!  Form::text('local_phone',old('local_phone'),['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name','Email') !!}
                                    {!!  Form::text('local_email',old('local_email'),['class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('name','Address') !!}
                                    {!!  Form::text('local_address',old('local_address'),['class'=>'form-control']) !!}
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="tab-pane fade" id="nav-medical" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('name','Height(Feet)') !!}
                                        {!!  Form::text('height',old('height'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('name','Weight(Kilogram)') !!}
                                        {!!  Form::text('weight',old('weight'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('name','Blood Group') !!}
                                        <select class="form-control" id="relation" name="blood_group">
                                            <option value="">Select Blood Group</option>
                                            <option value="a_positive" {{($student->blood_group == 'a_positive') ? 'selected' : '' }}>A+</option>
                                            <option value="a_negative" {{($student->blood_group == 'a_negative') ? 'selected' : '' }}>A-</option>
                                            <option value="b_positive" {{($student->blood_group == 'b_positive') ? 'selected' : '' }}>B+</option>
                                            <option value="b_negative" {{($student->blood_group == 'b_negative') ? 'selected' : '' }}>B-</option>
                                            <option value="ab_positive" {{($student->blood_group == 'ab_positive') ? 'selected' : '' }}>AB+</option>
                                            <option value="ab_negative" {{($student->blood_group == 'ab_negative') ? 'selected' : '' }}>AB-</option>
                                            <option value="o_positive" {{($student->blood_group == 'o_positive') ? 'selected' : '' }}>O+</option>
                                            <option value="o_negative" {{($student->blood_group == 'o_negative') ? 'selected' : '' }}>O-</option>
                                            <option value="unknown" {{($student->blood_group == 'unknown') ? 'selected' : '' }}>Unknown</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('name','Allergies') !!}
                                        {!!  Form::text('allergies',old('allergies'),['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        {!! Form::label('name','Medical Condition(s)') !!}
                                        {!!  Form::textarea('conditions',old('conditions'),['class'=>'form-control','rows' => 4]) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="nav-logo" role="tabpanel" aria-labelledby="nav-logo-tab">
                          <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                                @if($student!=null)
                                    <img id='img' src="{{ asset('/public/uploads/user_images') }}/{{$student->user->user_image }}" style="width:100px; height:100px; margin-left:25px; margin-bottom: 10px">
                                @else
                                    <img id='img' src="{{ asset('/public/uploads/avatars/default.jpg') }}" style="width:100px; height:100px;  margin-left:25px; margin-bottom: 10px">
                                @endif
                                <br>
                                <label class="control-label ml-4">Upload Image</label>
                                <input type="file" class="form-control dropify" name="image" id="image" data-max-file-size="2M" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" data-default-file="">
                                <span class="validation-msg" id="type-error">
                                    @error('image')<p class="text-danger">{{ $message }}</p>@enderror
                                </span>
                                <br>
                                    <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>Image Dimension must be 250x250 and size has to be less than 2 MB</p>
                                    <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>Image format has to be either .jpeg .jpg or .png</p>
                              </div>

                              <div class="form-group">
                                <label class="control-label ml-4">Upload Document(s)</label>
                                <input type="file" class="form-control dropify" name="document[]" id="document" multiple="multiple">
                                <br>
                                    <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>E.g. Birth Certificate or Academic Certificates</p>
                                    <p class="text-muted" style="font-size: 13px"><span class="requiredStar" style="color: red"> * </span>Document format has to be either .jpeg .jpg .png .pdf .doc or .docx</p>  
                              </div>
                            </div>
                            <div class="col-md-1">
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
                            </div>
                          </div>
                        </div>
                      </div></br>
                      <div class="form-group text-right">
                          {!! Form::submit($student!==null ? 'Update':'Save',['class'=>'btn btn-primary mr-2']) !!}
                          <a class="btn btn-danger" href="{{ route('admin.students.index') }}">Back</a>
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
    {!! Html::script('/assets/plugins/datatables.net/jquery.dataTables.min.js') !!}
    {!! Html::script('/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('/assets/js/img-preview.js') !!}
    {!! Html::script('/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-validation/additional-methods.js') !!}
    {!! Html::script('/assets/plugins/select2/js/select2.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/data-table.js') !!}
    {!! Html::script('/assets/js/toastDemo.js') !!}
    {!! Html::script('/assets/js/validation/studentForm-validation.js') !!}
    {!! Html::script('/assets/js/select2.js') !!}

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
