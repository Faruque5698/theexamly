@extends('backend.layout.master')

@push('plugin-styles')
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
                          @if(Auth::user()->user_type == "Teacher")
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-bars"></i>&nbsp;পরীক্ষা কেন্দ্র</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>প্রোফাইল</span></li>
                          @else  
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Teacher</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.teacher.index')}}">Teachers List</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Update Teacher</span></li>
                          @endif  
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row grid-margin">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div><br />
                    @endif
                    {{-- <h4 class="card-title">Teacher Information</h4> --}}
                    <form class="cmxform" id="teacherForm" method="post" action="{{ route('admin.teacher.update',$teacher->id) }}" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                      <!-- Form Group -->
                      <div class="form-group col-12">
                        <label
                          >নামের প্রথম অংশ (নামের শেষ অংশ বাদে সকল অংশ ) <span class="requiredStar" style="color: red"> * </span></label
                        >
                        
                        <input name="first_name" id="first_name" value="{{ $teacher->first_name }}"
                          class="form-control form_control"
                          type="text"
                          placeholder="e.g. Md. Abdullah"
                        />
                      </div>
                      <div class="form-group col-12">
                        <label>নামের শেষ অংশ <span class="requiredStar" style="color: red"> * </span></label>
                        
                        <input name="last_name" id="last_name" value="{{ $teacher->last_name }}" 
                          class="form-control form_control"
                          type="text"
                          placeholder="e.g. Mamun"
                        />
                      </div>

                      <!-- Form Group -->
                      <div class="form-group col-12">
                        <label>ইমেইল <span class="requiredStar" style="color: red"> * </span></label>
                        
                        <input name="email" id="email" value="{{ $teacher->user->email }}"
                          class="form-control form_control"
                          type="email"
                          placeholder="e.g. name@domain.com"
                        />
                      </div>

                      <!-- Form Group -->
                      <div class="form-group col-12">
                        <label>মোবাইল নাম্বার <span class="requiredStar" style="color: red"> * </span></label>
                        <input name="phone" id="phone" value="{{ $teacher->user->phone }}"
                          class="form-control form_control"
                          type="text"
                          name="phone"
                          placeholder="e.g. 01900011100"
                        />
                      </div>
                      <div class="form-group col-12">
                        <label>এন আই ডি নম্বর <span class="requiredStar" style="color: red"> * </span></label>
                        <input name="nid_no" id="nid_no" value="{{ $teacher->nid_no }}"
                          class="form-control form_control"
                          type="text"
                          name="phone"
                          placeholder="e.g. 00011100"
                        />
                      </div>
                      <div class="form-group col-12">
                        <label>শিক্ষাগত যোগ্যতা <span class="requiredStar" style="color: red"> * </span></label>
                     
                        <table class="table_of_grade">
                          <thead class="table_of_grade_thead">
                            <tr>
                              <th class="degree" style="width: 152px">পরীক্ষা</th>
                              <th class="passingYear" style="width: 152px">পাসের সন</th>
                              <th class="result" style="width: 152px">রেজাল্ট</th>
                              <th class="institution" style="width: 160px">শিক্ষা প্রতিষ্ঠানের নাম </th>
                            </tr>
                          </thead>
                          <tbody class="table_of_grade_tbody">
                            @foreach ($teacher->teacherEducation as $details)
                            <tr>
                              <td colspan="4">
                                <table class="inner_table_of_grade" style="width: 603px">
                                  <tbody>
                                    <tr>
                                      <td class="degree">
                                        <input
                                          type="text"
                                          class="form-control form_control"
                                          name="degree[]" value="{{ $details->degree }}"
                                          placeholder="e.g. SSC" disabled style="cursor: not-allowed;"
                                        />
                                      </td>
                                      <td class="passingYear">
                                        <input
                                          type="text"
                                          class="form-control form_control"
                                          name="passingYear[]" value="{{ $details->passingYear }}"
                                          placeholder="e.g. 2021" disabled style="cursor: not-allowed;"
                                        />
                                      </td>
                                      <td class="result">
                                        <input
                                          type="text"
                                          class="form-control form_control"
                                          name="result[]" value="{{ $details->result }}"
                                          placeholder="e.g. 5" disabled style="cursor: not-allowed;"
                                        />
                                      </td>
                                      <td class="institution">
                                        <input
                                          type="text"
                                          class="form-control form_control"
                                          name="institution[]" value="{{ $details->institution }}"
                                          placeholder="e.g. Rajshahi Collegiate School" disabled style="cursor: not-allowed;"
                                        />
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                        {{-- <div class="d-flex justify-content-end">
                          <button class="add_form_field btn_primary my-3">
                            <span> Add &nbsp;<i class="fas fa-plus"></i></span>
                          </button>
                        </div> --}}
                        <div id="table_of_grade_error"></div>
                      </div>
                      <div class="form-group col-12">
                        <label
                          >বর্তমানে চাকুরীরত প্রতিষ্ঠানের নাম (অবসর প্রাপ্তদের
                          ক্ষেত্রে শেষ প্রতিষ্ঠানের নাম ) <span class="requiredStar" style="color: red"> * </span>
                        </label>
                        <input
                          class="form-control form_control"
                          type="text"
                          name="job_institution_name" id="job_institution_name" value="{{ $teacher->job_institution_name }}"
                          placeholder="e.g. প্রতিষ্ঠানের নাম (পদবীসহ )"
                        />
                      </div>
                      <div class="form-group col-12">
                        <label>বর্তমান ঠিকানা <span class="requiredStar" style="color: red"> * </span></label>
                        <textarea name="address" id="address"
                          class="form-control form_control"
                          rows="3"
                        >{{ $teacher->address }}</textarea>
                      </div>
                      <!-- Form Group -->
                      <div class="form-group col-12">
                        <label>পাসওয়ার্ড <span class="requiredStar" style="color: red"> * </span></label>

                        <input name="password" id="password" value="{{ $teacher->user->raw_password }}" 
                          class="form-control form_control"
                          type="text"
                          placeholder="* * * * * * * *" disabled style="cursor: not-allowed;" 
                        />

                        <small class="form-text text_muted text-justify">
                          পাসওয়ার্ডটিতে অবশ্যই বড় হাতের অক্ষর, ছোট হাতের
                          অক্ষর, সংখ্যা এবং একটি স্পেশাল ক্যারেক্টার
                          (!,@,#,$,%,^,&,*) সহ কমপক্ষে ৮ টি অক্ষর থাকতে হবে।
                        </small>
                      </div>
                      <div class="form-group col-12">
                         {{-- <img src="{{ asset('/public/uploads/user_images/') }}/{{$teacher->user->user_image }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;margin-top:10px"> --}}
                         {!! Form::label('image',' ইমেজ') !!}
                         <br>
                         <br>
                         <img id='img' src="{{ asset('/public/uploads/user_images/teacher/') }}/{{$teacher->user->user_image }}" style="width:150px; height:150px; margin-bottom: 10px; border-radius:50%">
                             
                             <input id="image" class="form-control" type="file" name="image">
                         <input type="hidden" name="hidden_image" value="{{$teacher->user->user_image}}" />
                       </div>

                      <div class="form-group col-12">
                        <button type="submit" class="btn btn-primary" id="submit_button">
                          <span>আপডেট করুন </span>
                        </button>
                        <a class="btn btn-danger" href="{{ URL::previous() }}">বাতিল</a>
                      </div>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div> 
@endsection

@push('plugin-scripts')
    {!! Html::script('/assets/plugins/jquery-validation/jquery.validate.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-validation/additional-methods.js') !!}
    {!! Html::script('/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') !!}
    {!! Html::script('/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
    {!! Html::script('/assets/js/img-preview.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/validation/teacherForm-validation.js') !!}
    {!! Html::script('/assets/js/bt-maxlength.js') !!}
    {!! Html::script('/assets/js/file-upload.js') !!}
    {!! Html::script('/assets/js/toastDemo.js') !!}

    <script type="text/javascript">
        $(document).ready(function () {
            @if (session('success'))
            showSuccessToast('{{ session("success") }}');
            @elseif(session('warning'))
            showWarningToast('{{ session("warning") }}');
            @endif
        });
    </script>
@endpush
