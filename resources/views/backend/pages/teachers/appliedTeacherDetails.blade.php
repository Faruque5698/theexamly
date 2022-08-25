<?php 
  use App\Models\Backend\Subject;
  use App\Models\Backend\Course; 
?>
@extends('backend.layout.master')

@push('plugin-styles')
    {!! Html::style('/assets/plugins/icheck/skins/all.css') !!}
    {!! Html::style('/assets/plugins/select2/css/select2.min.css') !!}
@endpush

@section('content')  
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <div class="template-demo">
                    <nav aria-label="breadcrumb" class="nav-container">
                        <ol class="breadcrumb breadcrumb-custom ">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-bars"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a>Teachers</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Applied Teacher</span></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row grid-margin">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    {{-- <h4 class="card-title">Teachers Information</h4> --}}
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div><br />
                    @endif
                    <form class="cmxform" id="teacherForm" method="post" action="{{ route('admin.teacher.approval.update') }}" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    <div class="row">
                      <!-- Form Group -->
                      <input type="hidden" name="id" value="{{ request()->route('id') }}">
                      <div class="form-group col-12">
                        <label
                          >নামের প্রথম অংশ (নামের শেষ অংশ বাদে সকল অংশ ) <span class="requiredStar" style="color: red"> * </span></label
                        >
                        <input name="first_name" id="first_name" value="{{ $teacherDetails->first_name }}" 
                          class="form-control form_control"
                          type="text"
                          placeholder="e.g. Md. Abdullah" disabled style="cursor: not-allowed;" 
                        />
                      </div>
                      <div class="form-group col-12">
                        <label>নামের শেষ অংশ <span class="requiredStar" style="color: red"> * </span></label>
                        <input name="last_name" id="last_name" value="{{ $teacherDetails->last_name }}"
                          class="form-control form_control"
                          type="text"
                          placeholder="e.g. Mamun" disabled style="cursor: not-allowed;" 
                        />
                      </div>

                      <!-- Form Group -->
                      <div class="form-group col-12">
                        <label>ইমেইল <span class="requiredStar" style="color: red"> * </span></label>
                        <input name="email" id="email" value="{{ $teacherDetails->user->email }}"
                          class="form-control form_control"
                          type="email"
                          placeholder="e.g. name@domain.com" disabled style="cursor: not-allowed;" 
                        />
                      </div>

                      <!-- Form Group -->
                      <div class="form-group col-12">
                        <label>মোবাইল নাম্বার <span class="requiredStar" style="color: red"> * </span></label>
                        <input name="phone" id="phone" value="{{ $teacherDetails->user->phone }}"
                          class="form-control form_control"
                          type="text"
                          name="phone"
                          placeholder="e.g. 01900011100" disabled style="cursor: not-allowed;" 
                        />
                      </div>
                      <div class="form-group col-12">
                        <label>পাসওয়ার্ড <span class="requiredStar" style="color: red"> * </span></label>

                        <input name="password" id="password" value="{{ $teacherDetails->user->raw_password }}"
                          class="form-control form_control"
                          type="text"
                          placeholder="* * * * * * * *" disabled style="cursor: not-allowed;" 
                        />
                      </div>
                      <div class="form-group col-12">
                        <label>এন আই ডি নম্বর <span class="requiredStar" style="color: red"> * </span></label>
                        <input name="nid_no" id="nid_no" value="{{ $teacherDetails->nid_no }}"
                          class="form-control form_control"
                          type="text"
                          name="phone"
                          placeholder="e.g. 00011100" disabled style="cursor: not-allowed;" 
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
                            @foreach ($teacherDetails->teacherEducation as $details)
                            {{-- <?php var_dump($details->degree);exit(); ?> --}}
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
                          name="job_institution_name" id="job_institution_name" value="{{ $teacherDetails->job_institution_name }}"
                          placeholder="e.g. প্রতিষ্ঠানের নাম (পদবীসহ )" disabled style="cursor: not-allowed;" 
                        />
                      </div>

                      <div class="form-group col-12">
                        <label>বর্তমান ঠিকানা <span class="requiredStar" style="color: red"> * </span></label>
                        <textarea name="address" id="address" value="{{ $teacherDetails->address }}"
                          class="form-control form_control"
                          rows="5" disabled style="cursor: not-allowed;" 
                        >{{ $teacherDetails->address }}</textarea> 
                      </div>

                      <div class="form-group col-12">
                        <label>কোন বিষয় পড়াতে ইচ্ছুক  <span class="requiredStar" style="color: red"> * </span></label><br>
                        @foreach( $examCategory as $category )
                        
                          <input type="checkbox" name="exam_category[]" value="{{ $category->exam_category }}" checked> {{ $category->courseCategory->name }}

                        @endforeach
                      </div>
                      {{-- <div class="form-group col-12">
                        <label>পরীক্ষা <span class="requiredStar" style="color: red"> * </span></label><br>
                          @foreach( $groupName as $group )
                            
                            <input type="checkbox" name="group_name[]" value="{{ $group->group_name }}">&nbsp; {{ $group->course->full_name }}&nbsp;&nbsp;<br>

                            <?php 
                                $group_id = Course::where('full_name',$group->group_name)->get()->pluck('id');
                                $subject_id = DB::table('request_subjects')->join('subjects','request_subjects.subject_name','subjects.id')->where('request_subjects.user_id',$group->user_id)->get();
                              ?>
                            @endforeach
                      </div> --}}
                      <div class="form-group col-12">
                        <label>বিষয় <span class="requiredStar" style="color: red"> * </span></label><br>
                          @foreach( $subjectName as $subject )
                            <?php $group_id =Subject::where('id',$subject->subject_name)->get()->pluck('group_id'); 
                              $groupName = Course::where('id',$group_id)->get()->pluck('full_name')->first();
                            ?>
                            <input type="checkbox" name="subject_name[]" value="{{ $subject->subject_name }}" checked>&nbsp; {{ $subject->subject->name }} ({{ $groupName }})&nbsp;&nbsp;

                          @endforeach
                      </div>
                      <div class="form-group col-12">
                        <button type="submit" class="btn btn-primary" id="submit_button">
                          <span>অনুমোদন করুন </span>
                        </button>
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
    {!! Html::script('/assets/plugins/icheck/icheck.min.js') !!}
    {!! Html::script('/assets/plugins/select2/js/select2.min.js') !!}
    {!! Html::script('/assets/plugins/typeaheadjs/typeahead.bundle.min.js') !!}
@endpush

@push('custom-scripts')
    {!! Html::script('/assets/js/validation/teacherForm-validation.js') !!}
    {!! Html::script('/assets/js/bt-maxlength.js') !!}
    {!! Html::script('/assets/js/file-upload.js') !!}
    {!! Html::script('/assets/js/iCheck.js') !!}
    {!! Html::script('/assets/js/select2.js') !!}
    {!! Html::script('/assets/js/typeahead.js') !!}

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
