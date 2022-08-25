<?php
    use App\Models\Backend\Student;
    use App\Models\Backend\Teacher;
 ?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        {{-- @permission('dashboard') --}}
            <li class="nav-item {{ active_class_active(['admin/home/*','admin/home']) }}">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="ti-home menu-icon"></i>
                    @if(Auth::user()->user_type=="Student" || Auth::user()->user_type=="Teacher")
                        <span class="menu-title">হোম</span>
                    @else
                        <span class="menu-title">Home</span>
                    @endif
                </a>
            </li>
        {{-- @endpermission --}}
        @permission('dashboard')
            <li class="nav-item {{ active_class_active(['admin/dashboard/*','admin/dashboard/buySubject']) }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-bars menu-icon"></i>
                    @if(Auth::user()->user_type=="Student" || Auth::user()->user_type=="Teacher")
                        <span class="menu-title">পরীক্ষা কেন্দ্র</span>
                    @else
                        <span class="menu-title">Dashboard</span>
                    @endif
                </a>
            </li>
        @endpermission

        {{-- Exam Category menu Start--}}
        {{-- @permission(['category']) --}}
  {{--           @php $course = array('admin/course','admin/course/*'); @endphp
            <li class="nav-item {{ active_class_active($course) }}">
                <a class="nav-link" data-toggle="collapse" href="#course_control"
                    aria-expanded="{{ is_active_route_active($course) }}" aria-controls="course_control">
                    <i class="fa fa-bookmark menu-icon" aria-hidden="true"></i></i>
                    <span class="menu-title">Courses</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ show_class_show($course) }}" id="course_control">
                    <ul class="nav flex-column sub-menu">
                        @permission('add_course')
                            <li class="nav-item {{ active_class_active(['admin/course/create','admin/course/create/*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/course/create','admin/course/create/*']) }}"
                                    aria-expanded="true" href="{{ url('admin/course/create') }}">Add Course</a>
                            </li>
                        @endpermission

                        @permission('course_list')
                            <li class="nav-item {{ active_class_active(['admin/course','admin/course/*/edit']) }}">
                                <a class="nav-link {{ active_class_active(['admin/course','admin/course/*/edit']) }}" aria-expanded="true"
                                    href="{{ url('admin/course/') }}">Course List</a>
                            </li>
                        @endpermission
                    </ul>
                </div>
            </li> --}}
        {{-- @endpermission --}}
        {{-- course menu End--}}

        {{-- Course menu Start--}}
        @permission(['course'])
            @php $course = array('admin/course','admin/course/*','admin/examCategory','admin/examCategory/*'); @endphp
            <li class="nav-item {{ active_class_active($course) }}">
                <a class="nav-link" data-toggle="collapse" href="#course_control"
                    aria-expanded="{{ is_active_route_active($course) }}" aria-controls="course_control">
                    <i class="fa fa-bookmark menu-icon" aria-hidden="true"></i></i>
                    <span class="menu-title">Exam</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ show_class_show($course) }}" id="course_control">
                    <ul class="nav flex-column sub-menu">
                        @permission('add_course')
                            <li class="nav-item {{ active_class_active(['admin/course/create','admin/course/create/*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/course/create','admin/course/create/*']) }}"
                                    aria-expanded="true" href="{{ url('admin/course/create') }}">Add Group</a>
                            </li>
                        @endpermission

                        @permission('course_list')
                            <li class="nav-item {{ active_class_active(['admin/course/index','admin/course/index/*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/course/index','admin/course/index/*']) }}" aria-expanded="true"
                                    href="{{ url('admin/course/') }}">Group List</a>
                            </li>
                        @endpermission
                        @permission('exam_category')
                        <li class="nav-item {{ active_class_active(['admin/examCategory/create','admin/examCategory/create/*']) }}">
                            <a class="nav-link {{ active_class_active(['admin/examCategory/create','admin/examCategory/create/*']) }}"
                                aria-expanded="true" href="{{ url('admin/examCategory/create') }}">Add Exam Category</a>
                        </li>
                        @endpermission
                        @permission('exam_category_list')
                        <li class="nav-item {{ active_class_active(['admin/examCategory','admin/course/examCategory/*']) }}">
                            <a class="nav-link {{ active_class_active(['admin/examCategory','admin/course/examCategory/*']) }}"
                                aria-expanded="true" href="{{ url('admin/examCategory/') }}">Exam Category List</a>
                        </li>
                        @endpermission
                    </ul>
                </div>
            </li>
        @endpermission
        {{-- course menu End--}}

        {{-- subject menu Start--}}
        @permission(['subject'])
            @php $subject = array('admin/subject','admin/subject/*'); @endphp
            <li class="nav-item {{ active_class_active($subject) }}">
                <a class="nav-link" data-toggle="collapse" href="#subject_control"
                    aria-expanded="{{ is_active_route_active($subject) }}" aria-controls="subject_control">
                    <i class="fa fa-book menu-icon" aria-hidden="true"></i>
                    <span class="menu-title">Subject</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ show_class_show($subject) }}" id="subject_control">
                    <ul class="nav flex-column sub-menu">
                        @permission('subject_list')
                            <li class="nav-item {{ active_class_active(['admin/subject','admin/subject/*/edit']) }}">
                                <a class="nav-link {{ active_class_active(['admin/subject','admin/subject/*/edit']) }}"
                                    aria-expanded="true" href="{{ url('admin/subject/') }}">Subject List</a>
                            </li>
                        @endpermission
                        @permission('add_subject')
                            <li class="nav-item {{ active_class_active(['admin/subject/create','admin/subject/create/*/edit']) }}">
                                <a class="nav-link {{ active_class_active(['admin/subject/create','admin/subject/create/*/edit']) }}" aria-expanded="true"
                                    href="{{ url('admin/subject/create') }}">Add Subject</a>
                            </li>
                        @endpermission
                    </ul>
                </div>
            </li>
        @endpermission
        {{-- subject menu End--}}

        {{-- Batch_Category menu Start--}}
        {{-- @permission(['batch_category'])
            @php $batchCategory = array('admin/batchCategory','admin/batchCategory/*'); @endphp
            <li class="nav-item {{ active_class_active(['admin/batchCategory','admin/batchCategory/*']) }}">
                <a class="nav-link" href="{{ url('admin/batchCategory') }}">
                    <i class="fa fa-cubes menu-icon" aria-hidden="true"></i>
                    <span class="menu-title">Batch Category</span>
                </a>
            </li>
        @endpermission --}}
        {{-- Batch_Category menu End--}}

        {{-- Batch menu Start--}}
        @permission(['batch'])
            @php $batch = array('admin/batch','admin/batch/*','admin/archive'); @endphp
            <li class="nav-item {{ active_class_active($batch) }}">
                <a class="nav-link" data-toggle="collapse" href="#batch_control"
                    aria-expanded="{{ is_active_route_active($batch) }}" aria-controls="batch_control">
                    <i class="fa fa-user-plus menu-icon" aria-hidden="true"></i></i>
                    <span class="menu-title">Batch</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ show_class_show($batch) }}" id="batch_control">
                    <ul class="nav flex-column sub-menu">
                        @permission('add_subject')
                            <li class="nav-item {{ active_class_active(['admin/batch/create','admin/batch/create/*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/batch/create','admin/batch/create/*']) }}"
                                    aria-expanded="true" href="{{ url('admin/batch/create') }}">Add Batch</a>
                            </li>
                        @endpermission

                        @permission('running_batch')
                            <li class="nav-item {{ active_class_active(['admin/batch','admin/batch/*/edit']) }}">
                                <a class="nav-link {{ active_class_active(['admin/batch','admin/batch/*/edit']) }}"
                                    aria-expanded="true" href="{{ url('admin/batch') }}">Running Batch</a>
                            </li>
                        @endpermission
                        @permission('archieve_batch')
                        <li class="nav-item {{ active_class_active(['admin/archive']) }}">
                            <a class="nav-link {{ active_class_active(['admin/archive']) }}" aria-expanded="true"
                                href="{{ url('admin/archive') }}">Archive Batch</a>
                        </li>
                        @endpermission
                    </ul>
                </div>
            </li>
        @endpermission
        {{-- Batch menu End--}}

        {{-- Batch_Schedule menu Start--}}
        @permission(['batchSchedule'])
            @php $batchSchedule = array('admin/batchSchedule','admin/batchSchedule/*'); @endphp
            <li class="nav-item {{ active_class_active($batchSchedule) }}">
                <a class="nav-link" data-toggle="collapse" href="#batchSchedule_control"
                    aria-expanded="{{ is_active_route_active($batchSchedule) }}" aria-controls="batchSchedule_control">
                    <i class="fa fa-calendar menu-icon" aria-hidden="true"></i>
                    <span class="menu-title">Class Routine</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ show_class_show($batchSchedule) }}" id="batchSchedule_control">
                    <ul class="nav flex-column sub-menu">
                        @permission('batchSchedule_list')
                            <li class="nav-item {{ active_class_active(['admin/batchSchedule','admin/batchSchedule/*/edit','admin/batchSchedule/showBatchRoutine','admin/batchSchedule/editClass/*','admin/batchSchedule/addClass/*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/batchSchedule','admin/batchSchedule/*/edit','admin/batchSchedule/editClass/*']) }}"
                                    aria-expanded="true" href="{{ url('admin/batchSchedule') }}">Class Routine List</a>
                            </li>
                        @endpermission

                        @permission('add_batchSchedule')
                            <li class="nav-item {{ active_class_active(['admin/batchSchedule/check','admin/batchSchedule/check/*','admin/batchSchedule/create']) }}">
                                <a class="nav-link {{ active_class_active(['admin/batchSchedule/check','admin/batchSchedule/check/*','admin/batchSchedule/create']) }}" aria-expanded="true"
                                    href="{{ url('admin/batchSchedule/create') }}">Add Class Routine</a>
                            </li>
                        @endpermission
                    </ul>
                </div>
            </li>
        @endpermission
        {{-- subject menu End--}}
        {{-- @endpermission --}}
        {{-- Batch_Schedule menu End--}}

        {{-- Student menu Start--}}

        @if( Auth::user()->user_type == 'Student')
            @permission(['students'])
                @php $student = array('admin/students','admin/students/admit','admin/students/admit/*','admin/students/create','admin/students/create/*/edit','admin/students','admin/students/*/edit','admin/students/batchWiseCheck','admin/students/batchWiseCheck/*','admin/students/batchTransfer','admin/students/batchTransfer/*','admin/students/reAdmission','admin/students/reAdmission/*','admin/students/studentSearch','admin/students/studentSearch/*','admin/students/studentSearchResult','admin/students/studentSearchResult/*','admin/notification/onlineApplicant','admin/notification/onlineApplicant/*'); @endphp
                <li class="nav-item {{ active_class_active($student) }}">
                    @php
                        $user_id = Auth::user()->id;
                        $student = Student::where('user_id',$user_id)->get()->pluck('id')->first();
                    @endphp
                    <a class="nav-link"  href="{{ route("admin.students.edit", $student )}}"
                        {{-- aria-expanded="{{ is_active_route_active($student) }}" aria-controls="student_control" data-toggle="collapse" --}}
                        >
                        <i class="mdi mdi-account-multiple menu-icon" style='font-size:21px'></i>
                        <span class="menu-title">প্রোফাইল</span>
                        {{-- <i class="menu-arrow"></i> --}}
                    </a>
                    <div class="collapse {{ show_class_show($student) }}" id="student_control">
                        <ul class="nav flex-column sub-menu">
                            @permission('add_student')
                                <li class="nav-item {{ active_class_active(['admin/students/admit','admin/students/admit/*','admin/students/create','admin/students/create/*/edit']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/students/admit','admin/students/admit/*','admin/students/create','admin/students/create/*/edit']) }}" aria-expanded="true"
                                        href="{{ url('admin/students/admit') }}">Add Student</a>
                                </li>
                            @endpermission

                            @permission('student_list')
                                {{-- <li class="nav-item {{ active_class_active(['admin/students','admin/students/*/edit']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/students','admin/students/*/edit']) }}"
                                        aria-expanded="true" href="{{ url('admin/students/') }}">View/Update Profile</a>
                                </li> --}}
                            @endpermission

                            @permission('online_applicant_list')
                                <li class="nav-item {{ active_class_active(['admin/notification/onlineApplicant','admin/notification/onlineApplicant/*']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/notification/onlineApplicant','admin/notification/onlineApplicant/*']) }}"
                                        aria-expanded="true" href="{{ url('admin/notification/onlineApplicant') }}">Online Applicant</a>
                                </li>
                            @endpermission

                            @permission('batch_student')
                                <li class="nav-item {{ active_class_active(['admin/students/batchWiseCheck','admin/students/batchWiseCheck/*']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/students/batchWiseCheck','admin/students/batchWiseCheck/*']) }}"
                                        aria-expanded="true" href="{{ url('admin/students/batchWiseCheck') }}">Batch Wise Student
                                    </a>
                                </li>
                            @endpermission

                            @permission('batch_transfer')
                                <li class="nav-item {{ active_class_active(['admin/students/batchTransfer','admin/students/batchTransfer/*']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/students/batchTransfer','admin/students/batchTransfer/*']) }}"
                                        aria-expanded="true" href="{{ url('admin/students/batchTransfer') }}">Batch Transfer</a>
                                </li>
                            @endpermission

                            @permission('re_admission')
                                <li class="nav-item {{ active_class_active(['admin/students/reAdmission','admin/students/reAdmission/*']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/students/reAdmission','admin/students/reAdmission/*']) }}"
                                        aria-expanded="true" href="{{ url('admin/students/reAdmission') }}" style="font-size: 13px">Multiple Course Admission
                                    </a>
                                </li>
                            @endpermission

                            @permission('studentSearch')
                                <li class="nav-item {{ active_class_active(['admin/students/studentSearch','admin/students/studentSearch/*','admin/students/studentSearchResult','admin/students/studentSearchResult/*']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/students/studentSearch','admin/students/studentSearch/*','admin/students/studentSearchResult','admin/students/studentSearchResult/*']) }}"
                                        aria-expanded="true" href="{{ url('admin/students/studentSearch') }}">Search</a>
                                </li>
                            @endpermission
                            {{-- @permission('student_list')
                                <li class="nav-item {{ active_class_active(['admin/notification/cashOnPaymentList2','admin/notification/cashOnPaymentList2/*']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/notification/cashOnPaymentList2','admin/notification/cashOnPaymentList2/*']) }}"
                                        aria-expanded="true" href="{{ url('admin/notification/cashOnPaymentList2') }}">All Applicant</a>
                                </li>
                            @endpermission --}}
                        </ul>
                    </div>
                </li>
            @endpermission
        @else
            @permission(['students'])
                @php $student = array('admin/students','admin/students/admit','admin/students/admit/*','admin/students/create','admin/students/create/*/edit','admin/students','admin/students/*/edit','admin/students/batchWiseCheck','admin/students/batchWiseCheck/*','admin/students/batchTransfer','admin/students/batchTransfer/*','admin/students/reAdmission','admin/students/reAdmission/*','admin/students/studentSearch','admin/students/studentSearch/*','admin/students/studentSearchResult','admin/students/studentSearchResult/*','admin/notification/onlineApplicant','admin/notification/onlineApplicant/*','admin/students/course-permission','admin/students/course-permission/*'); @endphp
                <li class="nav-item {{ active_class_active($student) }}">
                    <a class="nav-link" data-toggle="collapse" href="#student_control"
                        aria-expanded="{{ is_active_route_active($student) }}" aria-controls="student_control">
                        <i class="mdi mdi-account-multiple menu-icon" style='font-size:21px'></i>
                        <span class="menu-title">Students</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse {{ show_class_show($student) }}" id="student_control">
                        <ul class="nav flex-column sub-menu">
                            @permission('add_student')
                                <li class="nav-item {{ active_class_active(['admin/students/admit','admin/students/admit/*','admin/students/create','admin/students/create/*/edit']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/students/admit','admin/students/admit/*','admin/students/create','admin/students/create/*/edit']) }}" aria-expanded="true"
                                        href="{{ url('admin/students/admit') }}">Add Student</a>
                                </li>
                            @endpermission

                            @permission('student_list')
                                <li class="nav-item {{ active_class_active(['admin/students','admin/students/*/edit']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/students','admin/students/*/edit']) }}"
                                        aria-expanded="true" href="{{ url('admin/students/') }}">Student List</a>
                                </li>
                            @endpermission

                            @permission('online_applicant_list')
                                <li class="nav-item {{ active_class_active(['admin/notification/onlineApplicant','admin/notification/onlineApplicant/*']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/notification/onlineApplicant','admin/notification/onlineApplicant/*']) }}"
                                        aria-expanded="true" href="{{ url('admin/notification/onlineApplicant') }}">Online Applicant</a>
                                </li>
                            @endpermission

                            @permission('batch_student')
                                <li class="nav-item {{ active_class_active(['admin/students/batchWiseCheck','admin/students/batchWiseCheck/*']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/students/batchWiseCheck','admin/students/batchWiseCheck/*']) }}"
                                        aria-expanded="true" href="{{ url('admin/students/batchWiseCheck') }}">Batch Wise Student
                                    </a>
                                </li>
                            @endpermission

                            @permission('batch_transfer')
                                <li class="nav-item {{ active_class_active(['admin/students/batchTransfer','admin/students/batchTransfer/*']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/students/batchTransfer','admin/students/batchTransfer/*']) }}"
                                        aria-expanded="true" href="{{ url('admin/students/batchTransfer') }}">Batch Transfer</a>
                                </li>
                            @endpermission

                            @permission('re_admission')
                                <li class="nav-item {{ active_class_active(['admin/students/reAdmission','admin/students/reAdmission/*']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/students/reAdmission','admin/students/reAdmission/*']) }}"
                                        aria-expanded="true" href="{{ url('admin/students/reAdmission') }}" style="font-size: 13px">Multiple Course Admission
                                    </a>
                                </li>
                            @endpermission

                            @permission('course_unroll_setting')
                                <li class="nav-item {{ active_class_active(['admin/students/course-permission','admin/students/course-permission/*']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/students/course-permission','admin/students/course-permission/*']) }}"
                                        aria-expanded="true" href="{{ url('admin/students/course-permission') }}" style="font-size: 13px">Course Permission
                                    </a>
                                </li>
                            @endpermission

                            @permission('studentSearch')
                                <li class="nav-item {{ active_class_active(['admin/students/studentSearch','admin/students/studentSearch/*','admin/students/studentSearchResult','admin/students/studentSearchResult/*']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/students/studentSearch','admin/students/studentSearch/*','admin/students/studentSearchResult','admin/students/studentSearchResult/*']) }}"
                                        aria-expanded="true" href="{{ url('admin/students/studentSearch') }}">Search</a>
                                </li>
                            @endpermission

                            @permission('studentSearch')
                                <li class="nav-item {{ active_class_active(['admin/students/cashback-list','admin/students/cashback-list/*','admin/students/cashback-list','admin/students/cashback-list/*']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/students/cashback-list','admin/students/cashback-list/*','admin/students/cashback-list','admin/students/cashback-list/*']) }}"
                                        aria-expanded="true" href="{{ url('admin/students/cashback-list') }}">List of Refer Coder Owner</a>
                                </li>
                            @endpermission
                            {{-- @permission('student_list')
                                <li class="nav-item {{ active_class_active(['admin/notification/cashOnPaymentList2','admin/notification/cashOnPaymentList2/*']) }}">
                                    <a class="nav-link {{ active_class_active(['admin/notification/cashOnPaymentList2','admin/notification/cashOnPaymentList2/*']) }}"
                                        aria-expanded="true" href="{{ url('admin/notification/cashOnPaymentList2') }}">All Applicant</a>
                                </li>
                            @endpermission --}}
                        </ul>
                    </div>
                </li>
            @endpermission
        @endif
        {{-- Student menu End--}}

        {{-- Students subject archieve menu start--}}
        @permission('student_exam_archieve')
            <li class="nav-item {{ active_class_active(['admin/exam/archieve*','admin/exam/archieve']) }}">
                <a class="nav-link" href="{{ route('admin.exam.archieve') }}">
                    <i class="fa fa-archive menu-icon"></i>
                    @if(Auth::user()->user_type=="Student")
                        <span class="menu-title">আর্কাইভ</span>
                    @else
                        <span></span>
                    @endif
                </a>
            </li>
        @endpermission
        @permission('add_course')
        <li class="nav-item {{ active_class_active(['admin/dashboard/referral-settings*','admin/dashboard/referral-settings']) }}">
            <a class="nav-link" href="{{ url('admin/dashboard/referral-settings') }}">
                <i class="fa fa-gift menu-icon"></i>

                    <span class="menu-title">Referral Settings</span>

            </a>
        </li>
        @endpermission
        {{-- Students subject archieve menu end --}}

        {{-- teacher menu Start--}}
        @if( Auth::user()->user_type == 'Teacher')

            {{-- @permission(['teachers_profile']) --}}
            @php $teacher = array('admin/teacher','admin/teacher/*'); @endphp
            <li class="nav-item {{ active_class_active($teacher) }}">
                @php
                    $user_id = Auth::user()->id;
                    $teacher = Teacher::where('user_id',$user_id)->get()->pluck('id')->first();
                @endphp
                @if($teacher = 'null')
                    <a class="nav-link"  href="{{ url("admin/profile")}}">
                    <i class="mdi mdi-account-multiple menu-icon" style='font-size:21px'></i>
                    <span class="menu-title">প্রোফাইল</span>
                </a>
                @else
                <a class="nav-link"  href="{{ route("admin.teacher.edit", $teacher )}}">
                    <i class="mdi mdi-account-multiple menu-icon" style='font-size:21px'></i>
                    <span class="menu-title">প্রোফাইল</span>
                </a>
                @endif
            </li>
            {{-- @endpermission --}}

        @else
        @permission(['teachers'])
        @php $teacher = array('admin/teacher','admin/teacher/*'); @endphp
        <li class="nav-item {{ active_class_active($teacher) }}">
            <a class="nav-link" data-toggle="collapse" href="#teacher_control"
                aria-expanded="{{ is_active_route_active($teacher) }}" aria-controls="teacher_control">
                <i class="fa fa-user-circle-o menu-icon" style='font-size:18px'></i>
                <span class="menu-title">Teachers</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ show_class_show($teacher) }}" id="teacher_control">
                <ul class="nav flex-column sub-menu">
                    @permission('teachers_list')
                    <li class="nav-item {{ active_class_active(['admin/teacher/applied-teacher','admin/applied-teacher/*/edit']) }}">
                        <a class="nav-link {{ active_class_active(['admin/teacher/applied-teacher','admin/applied-teacher/*/edit']) }}"
                            aria-expanded="true" href="{{ url('admin/teacher/applied-teacher') }}">Applied Teacher</a>
                    </li>
                    @endpermission
                    @permission('teachers_list')
                    <li class="nav-item {{ active_class_active(['admin/teacher/training-teacher','admin/training-teacher/*/edit']) }}">
                        <a class="nav-link {{ active_class_active(['admin/teacher/training-teacher','admin/training-teacher/*/edit']) }}"
                            aria-expanded="true" href="{{ url('admin/teacher/training-teacher') }}">Training Teacher</a>
                    </li>
                    @endpermission
                    @permission('teachers_list')
                    {{-- <li class="nav-item {{ active_class_active(['admin/teacher','admin/teacher/*/edit','admin/teacher/edit','admin/teacher/edit/*']) }}">
                        <a class="nav-link {{ active_class_active(['admin/teacher','admin/teacher/*/edit','admin/teacher/edit','admin/teacher/edit/*']) }}"
                            aria-expanded="true" href="{{ url('admin/teacher/') }}">Teachers List</a>
                    </li> --}}
                    @endpermission
                    @permission('add_teacher')
                    {{-- <li class="nav-item {{ active_class_active(['admin/teacher/create','admin/teacher/create/*']) }}">
                        <a class="nav-link {{ active_class_active(['admin/teacher/create','admin/teacher/create/*']) }}" aria-expanded="true"
                            href="{{ url('admin/teacher/create') }}">Add Teachers</a>
                    </li> --}}
                    @endpermission
                    @permission('add_teacher')
                    {{-- <li class="nav-item {{ active_class_active(['admin/teacher/assignIndex','admin/teacher/assignIndex/*','admin/teacher/assign','admin/teacher/assign/*','admin/teacher/assignEdit','admin/teacher/assignEdit/*']) }}">
                        <a class="nav-link {{ active_class_active(['admin/teacher/assignIndex','admin/teacher/assignIndex/*','admin/teacher/assign','admin/teacher/assign/*','admin/teacher/assignEdit','admin/teacher/assignEdit/*']) }}" aria-expanded="true"
                            href="{{ url('admin/teacher/assignIndex') }}">Assign Teacher</a>
                    </li> --}}
                    @endpermission
                    @permission('teacher_responsibility')
                    <li class="nav-item {{ active_class_active(['admin/teacher/teacher_responsibility_index','admin/teacher/teacher_responsibility_index/*','admin/teacher/teacher_responsibility_create','admin/teacher/teacher_responsibility_create/*','admin/teacher/teacher_responsibility_edit','admin/teacher/teacher_responsibility_edit/*']) }}">
                        <a class="nav-link {{ active_class_active(['admin/teacher/teacher_responsibility_index','admin/teacher/teacher_responsibility_index/*','admin/teacher/teacher_responsibility_create','admin/teacher/teacher_responsibility_create/*','admin/teacher/teacher_responsibility_edit','admin/teacher/teacher_responsibility_edit/*']) }}" aria-expanded="true"
                            href="{{ url('admin/teacher/teacher_responsibility_index') }}">Teacher Responsibility</a>
                    </li>
                    @endpermission
                    @permission('paid_teacher')
                    <li class="nav-item {{ active_class_active(['admin/teacher/paid-teacher','admin/paid-teacher/*','admin/teacher/paid-teacher-index','admin/teacher/paid-teacher-index/*','admin/teacher/paid-teacher-add','admin/teacher/paid-teacher-add/*','admin/teacher/paid-teacher-edit','admin/teacher/paid-teacher-edit/*']) }}">
                        <a class="nav-link {{ active_class_active(['admin/teacher/paid-teacher','admin/paid-teacher/*','admin/teacher/paid-teacher-index','admin/teacher/paid-teacher-index/*','admin/teacher/paid-teacher-add','admin/teacher/paid-teacher-add/*','admin/teacher/paid-teacher-edit','admin/teacher/paid-teacher-edit/*']) }}"
                            aria-expanded="true" href="{{ url('admin/teacher/paid-teacher') }}">Paid Teacher</a>
                    </li>
                    @endpermission
                </ul>
            </div>
        </li>
        @endpermission
        @endif
        {{-- teacher menu End--}}

        {{-- staff menu Start--}}
        @permission('staff')
        @php $staff = array('admin/staff','admin/staff/*'); @endphp
        <li class="nav-item  {{ active_class_active($staff) }}">
            <a class="nav-link" data-toggle="collapse" href="#staff"
                aria-expanded="{{ is_active_route_active($staff) }}" aria-controls="staff">
                <i class="fa fa-users menu-icon"></i>
                <span class="menu-title">Staff</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ show_class_show($staff) }}" id="staff">
                <ul class="nav flex-column sub-menu">
                    @permission('staff_list')
                    <li class="nav-item {{ active_class_active(['admin/staff','admin/staff/*/edit','admin/staff/edit','admin/staff/edit/*']) }}">
                        <a class="nav-link {{ active_class_active(['admin/staff','admin/staff/*/edit','admin/staff/edit','admin/staff/edit/*']) }}"
                            aria-expanded="true" href="{{ url('/admin/staff/') }}">Staffs List</a>
                    </li>
                    @endpermission
                    @permission('add_staff')
                    <li class="nav-item {{ active_class_active(['admin/staff/create']) }}">
                        <a class="nav-link {{ active_class_active(['admin/staff/create']) }}" aria-expanded="true"
                            href="{{ url('/admin/staff/create') }}">Add Staff</a>
                    </li>
                    @endpermission
                </ul>
            </div>
        </li>
        @endpermission
        {{-- staff menu End--}}

        {{-- Attendance Menu Start --}}
        @permission(['attendance'])
            @php $attendance = array('admin/attendance/check','admin/attendance/create',
            'admin/attendance/attendancePreview','admin/attendance/previewCheck','admin/attendance/*'); @endphp
            <li class="nav-item {{ active_class_active($attendance) }}">
                <a class="nav-link" data-toggle="collapse" href="#attendance_control"
                    aria-expanded="{{ is_active_route_active($attendance) }}" aria-controls="attendance_control">
                    <i class="fa fa-hand-paper-o menu-icon" style='font-size:17px'></i>
                    <span class="menu-title">Attendance</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ show_class_show($attendance) }}" id="attendance_control">
                    <ul class="nav flex-column sub-menu">
                        @permission('daily_attendance')
                            <li class="nav-item {{ active_class_active(['admin/attendance/check','admin/attendance/create']) }}">
                                <a class="nav-link {{ active_class_active(['admin/attendance/check','admin/attendance/create']) }}"
                                    aria-expanded="true" href="{{ url('admin/attendance/check') }}">Daily Attendance</a>
                            </li>
                        @endpermission
                        @permission('view_attendance')
                            <li class="nav-item {{ active_class_active(['admin/attendance/previewCheck',
                            'admin/attendance/attendancePreview','admin/attendance/*/edit']) }}">
                                <a class="nav-link {{ active_class_active(['admin/attendance/previewCheck',
                                'admin/attendance/attendancePreview','admin/attendance/*/edit']) }}" aria-expanded="true"
                                    href="{{ url('admin/attendance/previewCheck') }}">View Attendance</a>
                            </li>
                        @endpermission
                    </ul>
                </div>
            </li>
        @endpermission
        {{-- Attendance Menu End --}}

        {{-- idCard menu start--}}
        @permission(['idCard'])
            @php $idCard = array('admin/students/selectBatch','admin/students/idcardGeneration'); @endphp
            <li class="nav-item {{ active_class_active(['admin/students/selectBatch','admin/students/idcardGeneration']) }}">
                <a class="nav-link" href="{{ url('admin/students/selectBatch') }}"><i class="ti-id-badge menu-icon"></i><span class="menu-title">ID Card</span>
                </a>
            </li>
        @endpermission
        {{-- idCard menu End--}}

        {{-- Examination menu Start--}}
        {{-- @permission(['examination'])
            @php $examination = array('admin/examination','admin/examination/*'); @endphp
            <li class="nav-item {{ active_class_active($examination) }}">
                <a class="nav-link" data-toggle="collapse" href="#examination_control"
                    aria-expanded="{{ is_active_route_active($examination) }}" aria-controls="examination_control">
                    <i class="fa fa-columns menu-icon" aria-hidden="true"></i>
                    <span class="menu-title">Examination</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ show_class_show($examination) }}" id="examination_control">
                    <ul class="nav flex-column sub-menu">
                        @permission('grade_info')
                            <li class="nav-item {{ active_class_active(['admin/examination/examGrade','admin/examination/examGrade/*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/examination/examGrade','admin/examination/examGrade/*']) }}"
                                    aria-expanded="true" href="{{ url('admin/examination/examGrade') }}">Grade Info</a>
                            </li>
                        @endpermission

                        @permission('create_exam_routine')
                            <li class="nav-item {{ active_class_active(['admin/examination/createRoutine','admin/examination/createRoutine/*/edit']) }}">
                                <a class="nav-link {{ active_class_active(['admin/examination/createRoutine','admin/examination/createRoutine/*/edit']) }}" aria-expanded="true"
                                    href="{{ url('admin/examination/createRoutine') }}">Create Exam & Routine</a>
                            </li>
                        @endpermission

                        @permission('all_exam_list')
                            <li class="nav-item {{ active_class_active(['admin/examination/examCreate','admin/examination/examCreate/*/edit']) }}">
                                <a class="nav-link {{ active_class_active(['admin/examination/examCreate','admin/examination/examCreate/*/edit']) }}" aria-expanded="true"
                                    href="{{ url('admin/examination/examCreate') }}">All Exam List</a>
                            </li>
                        @endpermission

                        @permission('input_marks')
                            <li class="nav-item {{ active_class_active(['admin/examination/markInput','admin/examination/markInput/*/edit']) }}">
                                <a class="nav-link {{ active_class_active(['admin/examination/markInput','admin/examination/markInput/*/edit']) }}" aria-expanded="true"
                                    href="{{ url('admin/examination/markInput') }}">Input Marks</a>
                            </li>
                        @endpermission --}}
                        {{-- @permission('add_tcourse') --}}
                        {{-- <li class="nav-item {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}">
                            <a class="nav-link {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}" aria-expanded="true"
                                href="#">Approve Marksheet</a>
                        </li> --}}
                        {{-- @endpermission --}}
                        {{-- @permission('add_tcourse') --}}
                        {{-- <li class="nav-item {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}">
                            <a class="nav-link {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}" aria-expanded="true"
                                href="#">View Marksheet</a>
                        </li> --}}
                        {{-- @endpermission --}}
                        {{-- @permission('add_tcourse') --}}
                        {{-- <li class="nav-item {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}">
                            <a class="nav-link {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}" aria-expanded="true"
                                href="#">Make Result</a>
                        </li> --}}
                        {{-- @endpermission --}}
                        {{-- @permission('add_tcourse') --}}
                        {{-- <li class="nav-item {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}">
                            <a class="nav-link {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}" aria-expanded="true"
                                href="#">Grade Final Result</a>
                        </li> --}}
                        {{-- @endpermission --}}
                        {{-- @permission('add_tcourse') --}}
                        {{-- <li class="nav-item {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}">
                            <a class="nav-link {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}" aria-expanded="true"
                                href="#">Tabulation Sheet</a>
                        </li> --}}
                        {{-- @endpermission --}}
                        {{-- @permission('add_tcourse') --}}
                        {{-- <li class="nav-item {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}">
                            <a class="nav-link {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}" aria-expanded="true"
                                href="#">Exam Result</a>
                        </li> --}}
                        {{-- @endpermission --}}
                        {{-- @permission('add_tcourse') --}}
                        {{-- <li class="nav-item {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}">
                            <a class="nav-link {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}" aria-expanded="true"
                                href="#">Student's Mark's Sheet</a>
                        </li> --}}
                        {{-- @endpermission --}}
                        {{-- @permission('add_tcourse') --}}
                        {{-- <li class="nav-item {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}">
                            <a class="nav-link {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}" aria-expanded="true"
                                href="#">Merit List By Batch</a>
                        </li> --}}
                        {{-- @endpermission --}}
                        {{-- @permission('add_tcourse') --}}
                        {{-- <li class="nav-item {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}">
                            <a class="nav-link {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}" aria-expanded="true"
                                href="#">Merit List By Class</a>
                        </li> --}}
                        {{-- @endpermission --}}
                        {{-- @permission('add_tcourse') --}}
                        {{-- <li class="nav-item {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}">
                            <a class="nav-link {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}" aria-expanded="true"
                                href="#">Merit List By Thana</a>
                        </li> --}}
                        {{-- @endpermission --}}
                        {{-- @permission('add_tcourse') --}}
                        {{-- <li class="nav-item {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}">
                            <a class="nav-link {{ active_class_active(['admin/examination/create','admin/examination/create/*/edit']) }}" aria-expanded="true"
                                href="#">Clear Result</a>
                        </li> --}}
                        {{-- @endpermission --}}
                    {{-- </ul>
                </div>
            </li>
        @endpermission --}}
        {{-- Examination menu End--}}

        {{-- Payment menu Start--}}
        @permission(['payment'])
            @php $payment = array('admin/payment','admin/payment/*'); @endphp
            <li class="nav-item {{ active_class_active($payment) }}">
                <a class="nav-link" data-toggle="collapse" href="#payment_control"
                    aria-expanded="{{ is_active_route_active($payment) }}" aria-controls="payment_control">
                    <i class="fa fa-calculator menu-icon" aria-hidden="true"></i>
                    <span class="menu-title">Payment</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ show_class_show($payment) }}" id="payment_control">
                    <ul class="nav flex-column sub-menu">
                        {{-- <li class="nav-item {{ active_class_active(['admin/account/expense','admin/account/expense/*/edit']) }}">
                            <a class="nav-link {{ active_class_active(['admin/account/expense','admin/account/expense/*/edit']) }}" aria-expanded="true" href="#">Invoice</a>
                        </li> --}}
                        {{-- @permission('collect_fees_batch')
                            <li class="nav-item {{ active_class_active(['admin/payment/batchWise','admin/payment/batchWise/*','admin/payment/collectFees/indexs','admin/payment/collectFees/indexIndividual/*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/payment/batchWise','admin/payment/batchWise/*','admin/payment/collectFees/indexs','admin/payment/collectFees/indexIndividual/*']) }}" aria-expanded="true" href="{{ url('admin/payment/batchWise/') }}">Collect Fees(Batch Wise)</a>
                            </li>
                        @endpermission --}}

                        @permission('collect_fees_individual')
                            <li class="nav-item {{ active_class_active(['admin/payment/Individual','admin/payment/Individual/*','admin/payment/Individual/indexIndividual2','admin/payment/collectFees/creates/*','admin/payment/collectFees/create2','admin/payment/collectFees/create2/*','admin/payment/edit','admin/payment/edit/*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/payment/Individual','admin/payment/Individual/*','admin/payment/Individual/indexIndividual2','admin/payment/collectFees/creates/*','admin/payment/collectFees/create2','admin/payment/collectFees/create2/*','admin/payment/edit','admin/payment/edit/*']) }}" aria-expanded="true" href="{{ url('admin/payment/Individual') }}">Collect Fees(Individual)</a>
                            </li>
                        @endpermission

                        @permission('due_payment')
                            <li class="nav-item {{ active_class_active(['admin/payment/duePayment','admin/payment/duePayment/*','admin/payment/collectFees/index']) }}">
                                <a class="nav-link {{ active_class_active(['admin/payment/duePayment','admin/payment/duePayment/*','admin/payment/collectFees/index']) }}" aria-expanded="true" href="{{ url('admin/payment/duePayment') }}">Due Payment</a>
                            </li>
                        @endpermission
                        {{-- <li class="nav-item {{ active_class_active(['admin/payment/paymentReport']) }}">
                            <a class="nav-link {{ active_class_active(['admin/payment/paymentReport']) }}" aria-expanded="true" href="{{ url('admin/payment/paymentReport') }}">Payment Report</a>
                        </li> --}}
                    </ul>
                </div>
            </li>
        @endpermission
        {{-- Payment menu End--}}

        {{-- Coupon menu Start--}}
        @permission(['coupon'])
            @php $coupon = array('admin/coupon','admin/coupon/*'); @endphp
            <li class="nav-item {{ active_class_active($coupon) }}">
                <a class="nav-link" data-toggle="collapse" href="#coupon_control"
                    aria-expanded="{{ is_active_route_active($coupon) }}" aria-controls="coupon_control">
                    <i class="ti-wallet menu-icon" aria-hidden="true"></i>
                    <span class="menu-title">Coupon</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ show_class_show($coupon) }}" id="coupon_control">
                    <ul class="nav flex-column sub-menu">
                        @permission('show_coupon')
                            <li class="nav-item {{ active_class_active(['admin/coupon']) }}">
                                <a class="nav-link {{ active_class_active(['admin/coupon']) }}" aria-expanded="true" href="{{ url('admin/coupon') }}">Coupon List</a>
                            </li>
                        @endpermission

                        @permission('create_coupon')
                            <li class="nav-item {{ active_class_active(['admin/coupon/create']) }}">
                                <a class="nav-link {{ active_class_active(['admin/coupon/create']) }}" aria-expanded="true" href="{{ url('admin/coupon/create') }}">
                                    Create Coupon
                                </a>
                            </li>
                        @endpermission

                        @permission('search_coupon')
                            <li class="nav-item {{ active_class_active(['admin/coupon/search', 'admin/coupon/searchResult*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/coupon/search','admin/coupon/searchResult*']) }}" aria-expanded="true" href="{{ url('admin/coupon/search') }}">
                                    Search Coupon</a>
                            </li>
                        @endpermission
                    </ul>
                </div>
            </li>
        @endpermission
        {{-- Coupon menu End--}}

         {{-- Account menu Start--}}
        @permission(['account'])
            @php $account = array('admin/account','admin/account/*','admin/expense','admin/expense/*'); @endphp
            <li class="nav-item {{ active_class_active($account) }}">
                <a class="nav-link" data-toggle="collapse" href="#account_control"
                aria-expanded="{{ is_active_route_active($account) }}" aria-controls="account_control">
                    <i class="fa fa-bar-chart menu-icon" aria-hidden="true"></i>
                    <span class="menu-title">Account</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ show_class_show($account) }}" id="account_control">
                    <ul class="nav flex-column sub-menu">
                        @permission('daily_incomeExpense')
                            <li class="nav-item {{ active_class_active(['admin/account/daily/show','admin/account/daily/show/*/edit']) }}">
                                <a class="nav-link {{ active_class_active(['admin/account/daily/show','admin/account/daily/show/*/edit']) }}" aria-expanded="true" href="{{ url('admin/account/daily/show') }}" style="font-size: 13px">Daily Income Expense List</a>
                            </li>
                        @endpermission
                        @permission('income')
                        <li class="nav-item {{ active_class_active(['admin/account/incomeView','admin/account/incomeView/*/edit','admin/account/incomeView/show']) }}">
                            <a class="nav-link {{ active_class_active(['admin/account/incomeView','admin/account/incomeView/*/edit','admin/account/incomeView/show']) }}" aria-expanded="true" href="{{ url('admin/account/incomeView') }}">Income</a>
                        </li>
                        @endpermission
                        @permission('income_list')
                            <li class="nav-item {{ active_class_active(['admin/account/income','admin/account/income/*/edit','admin/account/income/show']) }}">
                                <a class="nav-link {{ active_class_active(['admin/account/income','admin/account/income/*/edit','admin/account/income/show']) }}" aria-expanded="true" href="{{ url('admin/account/income') }}">Income List</a>
                            </li>
                        @endpermission

                        @permission('expense_category')
                            <li class="nav-item {{ active_class_active(['admin/expense/expenseCategory','admin/expense/expenseCategory/edit/*','admin/expense/expenseCategory/create']) }}">
                                <a class="nav-link {{ active_class_active(['admin/expense/expenseCategory','admin/expense/expenseCategory/edit/*', 'admin/expense/expenseCategory/create']) }}"aria-expanded="true"href="{{ url('admin/expense/expenseCategory') }}">Expense Category</a>
                            </li>
                        @endpermission

                        @permission('expense_list')
                            <li class="nav-item {{ active_class_active(['admin/expense','admin/expense/*/edit']) }}">
                                <a class="nav-link {{ active_class_active(['admin/expense','admin/expense/*/edit']) }}" aria-expanded="true" href="{{ url('admin/expense') }}">Expense List</a>
                            </li>
                        @endpermission

                        @permission('add_expense')
                            <li class="nav-item {{ active_class_active(['admin/expense/create']) }}">
                                <a class="nav-link {{ active_class_active(['admin/expense/create',]) }}"aria-expanded="true" href="{{ url('admin/expense/create') }}">Add Expense</a>
                            </li>
                        @endpermission
                        {{-- @permission('course_list') --}}

                        {{-- @php $income = array('admin/account/income','admin/account/income/*'); @endphp
                        <li class="nav-item {{ active_class_active(['admin/account/income','admin/account/income/*/edit']) }}">

                            <a class="nav-link" data-toggle="collapse" href="#income_control" aria-expanded="{{ is_active_route_active($income)}}" aria-controls="income_control"><span class="menu-title">Income</span><i class="menu-arrow"></i>
                            </a>

                            <div class="collapse {{ show_class_show($income) }}" id="income_control">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item {{ active_class_active(['admin/account/income','admin/account/income/*/edit']) }}">
                                        <a class="nav-link {{ active_class_active(['admin/account/income','admin/account/income/*/edit']) }}" aria-expanded="true" href="#">List</a>
                                    </li>
                                    <li class="nav-item {{ active_class_active(['admin/account/income/create','admin/account/income/create/*/edit']) }}">
                                        <a class="nav-link {{ active_class_active(['admin/account/income/create','admin/account/income/create/*/edit']) }}" aria-expanded="true" href="#">Add</a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                        {{-- @endpermission --}}

                    </ul>
                </div>
            </li>
        @endpermission
        {{-- Account menu End--}}

        {{-- sms menu Start--}}
        @permission(['sms'])
            @php $sms = array('admin/sms','admin/sms/*','admin/phoneBook','admin/phoneBook/*'); @endphp
            <li class="nav-item {{ active_class_active($sms) }}">
                <a class="nav-link" data-toggle="collapse" href="#sms_control"
                    aria-expanded="{{ is_active_route_active($sms) }}" aria-controls="sms_control">
                    <i class="fa fa-envelope menu-icon" aria-hidden="true"></i>
                    <span class="menu-title">sms</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ show_class_show($sms) }}" id="sms_control">
                    <ul class="nav flex-column sub-menu">
                        @permission('sms_list')
                            <li class="nav-item {{ active_class_active(['admin/sms/inbox','admin/sms/inbox/*/edit']) }}">
                                <a class="nav-link {{ active_class_active(['admin/sms/inbox','admin/sms/inbox/*/edit']) }}"
                                    aria-expanded="true" href="{{ url('/admin/sms/inbox') }}">SMS Log</a>
                            </li>
                        @endpermission
                        @permission('send_sms')
                            <li class="nav-item {{ active_class_active(['admin/sms','admin/sms/*/edit']) }}">
                                <a class="nav-link {{ active_class_active(['admin/sms','admin/sms/*/edit']) }}" aria-expanded="true"
                                    href="{{ url('admin/sms') }}">Send SMS</a>
                            </li>
                        @endpermission
                        @permission('send_sms')
                            <li class="nav-item {{ active_class_active(['admin/sms/phoneBook','admin/sms/phoneBook/*','admin/sms/phoneBook/phoneBookEdit','admin/sms/phoneBook/phoneBookEdit/*','admin/sms/phoneBookGroup/createGroup','admin/sms/phoneBookGroup/createGroup/*','admin/sms/phoneBookGroup/phoneBookGroupEdit','admin/sms/phoneBookGroup/phoneBookGroupEdit/*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/sms/phoneBook','admin/sms/phoneBook/*','admin/sms/phoneBook/phoneBookEdit','admin/sms/phoneBook/phoneBookEdit/*','admin/sms/phoneBookGroup/createGroup','admin/sms/phoneBookGroup/createGroup/*','admin/sms/phoneBookGroup/phoneBookGroupEdit','admin/sms/phoneBookGroup/phoneBookGroupEdit/*']) }}" aria-expanded="true"
                                    href="{{ url('/admin/sms/phoneBook') }}">Phone Book</a>
                            </li>
                        @endpermission
                    </ul>
                </div>
            </li>
        @endpermission
        {{-- sms menu End--}}
        {{-- communication menu Start--}}
        @permission(['zoom_communication'])
            @php $communication = array('admin/communication','admin/communication/*'); @endphp
            <li class="nav-item {{ active_class_active($communication) }}">
                <a class="nav-link" data-toggle="collapse" href="#communication_control"
                    aria-expanded="{{ is_active_route_active($communication) }}" aria-controls="communication_control">
                    <i class="fa fa-video-camera menu-icon" aria-hidden="true"></i>
                    <span class="menu-title">Communication</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ show_class_show($communication) }}" id="communication_control">
                    <ul class="nav flex-column sub-menu">
                        @permission('zoom_meeting_list')
                            <li class="nav-item {{ active_class_active(['admin/communication/meetingsIndex','admin/communication/meetingsIndex/*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/communication/meetingsIndex','admin/communication/meetingsIndex/*']) }}"
                                    aria-expanded="true" href="{{ url('admin/communication/meetingsIndex') }}">Zoom Meeting List</a>
                            </li>
                        @endpermission
                        @permission('zoom_meeting_create')
                            <li class="nav-item {{ active_class_active(['admin/communication/zoomMeetingCreate','admin/communication/zoomMeetingCreate/*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/communication/zoomMeetingCreate','admin/communication/zoomMeetingCreate/*']) }}"
                                    aria-expanded="true" href="{{ url('admin/communication/zoomMeetingCreate') }}">Zoom Meeting Create</a>
                            </li>
                        @endpermission
                        @permission('zoom_api_list')
                            <li class="nav-item {{ active_class_active(['admin/communication/zoomIndex','admin/communication/zoomIndex/*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/communication/zoomIndex','admin/communication/zoomIndex/*']) }}"
                                    aria-expanded="true" href="{{ url('admin/communication/zoomIndex') }}">Zoom API List</a>
                            </li>
                        @endpermission
                        @permission('zoom_api_create')
                            <li class="nav-item {{ active_class_active(['admin/communication/zoomCreate','admin/communication/zoomCreate/*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/communication/zoomCreate','admin/communication/zoomCreate/*']) }}"
                                    aria-expanded="true" href="{{ url('admin/communication/zoomCreate') }}">Zoom API Create</a>
                            </li>
                        @endpermission
                    </ul>
                </div>
            </li>
        @endpermission
        {{-- communication menu End--}}
        {{-- report menu Start--}}
        @permission(['report'])
            @php $report = array('admin/report','admin/report/*','admin/report/expense/expenseReport'); @endphp
            <li class="nav-item {{ active_class_active($report) }}">
                <a class="nav-link" data-toggle="collapse" href="#report_control"
                    aria-expanded="{{ is_active_route_active($report) }}" aria-controls="report_control">
                    <i class="fa fa-line-chart menu-icon" aria-hidden="true"></i>
                    <span class="menu-title">Report</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ show_class_show($report) }}" id="report_control">
                    <ul class="nav flex-column sub-menu">
                        {{-- @permission('course_list') --}}
                        {{-- <li class="nav-item {{ active_class_active(['admin/report','admin/report/*/edit']) }}">
                            <a class="nav-link {{ active_class_active(['admin/report','admin/report/*/edit']) }}"
                                aria-expanded="true" href="{{ url('admin/report/') }}">Student Report</a>
                        </li> --}}
                        {{-- @endpermission --}}
                        @permission('income_report')
                            <li class="nav-item {{ active_class_active(['admin/report/income','admin/report/income/*','admin/report/payment/paymentReport','admin/report/payment/paymentReport/*','admin/report/payment/paymentReport.index']) }}">
                                <a class="nav-link {{ active_class_active(['admin/report/income','admin/report/income/*','admin/report/payment/paymentReport','admin/report/payment/paymentReport/*','admin/report/payment/paymentReport.index']) }}"
                                    aria-expanded="true" href="{{ url('admin/report/payment/paymentReport') }}">Income Report</a>
                            </li>
                        @endpermission

                        @permission('expense_report')
                            <li class="nav-item {{ active_class_active(['admin/report/expense/expenseReport','admin/report/expense/expenseReport/*','admin/report/expense/expenseReportList']) }}">
                                <a class="nav-link {{ active_class_active(['admin/report/expense/expenseReport','admin/report/expense/expenseReport/*','admin/report/expense/expenseReportList']) }}" aria-expanded="true"
                                    href="{{ url('admin/report/expense/expenseReport') }}">Expense Report</a>
                            </li>
                        @endpermission
                    </ul>
                </div>
            </li>
        @endpermission
        {{-- report menu End--}}

        {{-- profile menu start--}}
        @permission(['profile'])
        @php $profile = array('admin/profile','admin/profile/*'); @endphp
        <li class="nav-item {{ active_class_active(['admin/profile','admin/profile/*','admin/profileImage','admin/profileImage/*']) }}">
            <a class="nav-link" href="{{ url('admin/profile') }}">
                <i class="ti-bookmark-alt menu-icon"></i>
                <span class="menu-title">Profile</span>
            </a>
        </li>
        @endpermission
        {{-- profile menu End--}}

        {{-- notice menu start--}}
        @permission(['notice'])
        @php $notice = array('admin/notice','admin/notice/*'); @endphp
        <li class="nav-item  {{ active_class_active($notice) }}">
            <a class="nav-link" data-toggle="collapse" href="#notice"
                aria-expanded="{{ is_active_route_active($notice) }}" aria-controls="notice">
                <i class="fa fa-bell menu-icon"></i>
                @if(Auth::user()->user_type=="Student" || Auth::user()->user_type=="Teacher")
                    <span class="menu-title">নোটিশ</span>
                @else
                    <span class="menu-title">Notice</span>
                @endif
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ show_class_show($notice) }}" id="notice">
                <ul class="nav flex-column sub-menu">
                    @permission('notice_list')
                    @if(Auth::user()->user_type=="Student" || Auth::user()->user_type=="Teacher")
                    <li class="nav-item {{ active_class_active(['admin/notice','admin/notice/*/edit','admin/notice/edit','admin/notice/edit/*']) }}">
                        <a class="nav-link {{ active_class_active(['admin/notice','admin/notice/*/edit','admin/notice/edit','admin/notice/edit/*']) }}"
                            aria-expanded="true" href="{{ url('/admin/notice/') }}">নোটিশ লিস্ট</a>
                    </li>
                    @else
                    <li class="nav-item {{ active_class_active(['admin/notice','admin/notice/*/edit','admin/notice/edit','admin/notice/edit/*']) }}">
                        <a class="nav-link {{ active_class_active(['admin/notice','admin/notice/*/edit','admin/notice/edit','admin/notice/edit/*']) }}"
                            aria-expanded="true" href="{{ url('/admin/notice/') }}">Notice List</a>
                    </li>
                    @endif
                    @endpermission
                    @permission('notice_add')
                    <li class="nav-item {{ active_class_active(['admin/notice/create']) }}">
                        <a class="nav-link {{ active_class_active(['admin/notice/create']) }}" aria-expanded="true"
                            href="{{ url('/admin/notice/create') }}"> Notice Add</a>
                    </li>
                    @endpermission
                </ul>
            </div>
        </li>
        @endpermission
        {{-- notice menu End--}}

        {{-- userComments menu start--}}
        @permission(['userComments'])
{{--         @php $userComments = array('admin/userComments','admin/userComments/*'); @endphp
        <li class="nav-item  {{ active_class_active($userComments) }}">
            <a class="nav-link" data-toggle="collapse" href="#userComments"
                aria-expanded="{{ is_active_route_active($userComments) }}" aria-controls="userComments">
                <i class="fa fa-comments menu-icon"></i>
                <span class="menu-title">Comments</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ show_class_show($userComments) }}" id="userComments">
                <ul class="nav flex-column sub-menu">
                    @permission('comments_list')
                    <li class="nav-item {{ active_class_active(['admin/userComments','admin/userComments/*/edit','admin/userComments/edit','admin/userComments/edit/*']) }}">
                        <a class="nav-link {{ active_class_active(['admin/userComments','admin/userComments/*/edit','admin/userComments/edit','admin/userComments/edit/*']) }}"
                            aria-expanded="true" href="{{ url('/admin/userComments/') }}">Comments List</a>
                    </li>
                    @endpermission
                    @permission('add_comments')
                    <li class="nav-item {{ active_class_active(['admin/userComments/create']) }}">
                        <a class="nav-link {{ active_class_active(['admin/userComments/create']) }}" aria-expanded="true"
                            href="{{ url('/admin/userComments/create') }}"> Comments Add</a>
                    </li>
                    @endpermission
                </ul>
            </div>
        </li> --}}
        @endpermission
        {{-- userComments menu End--}}

        {{-- csv upload menu start--}}
        {{-- @permission(['csvUpload']) --}}
{{--             @php $csvUpload = array('admin/resultSend','admin/resultSend/*'); @endphp
            <li class="nav-item {{ active_class_active($csvUpload) }}">
                <a class="nav-link" data-toggle="collapse" href="#csvUpload_control"
                    aria-expanded="{{ is_active_route_active($csvUpload) }}" aria-controls="csvUpload_control">
                    <i class=" menu-icon" aria-hidden="true"></i>
                    <span class="menu-title">Result Send</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ show_class_show($csvUpload) }}" id="csvUpload_control">
                    <ul class="nav flex-column sub-menu">
                        @permission('income_report')
                            <li class="nav-item {{ active_class_active(['admin/resultSend','admin/resultSend/edit/*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/resultSend','admin/resultSend/edit/*']) }}"
                                    aria-expanded="true" href="#">Send Result By SMS</a>
                            </li>
                        @endpermission
                        @permission('income_report')
                            <li class="nav-item {{ active_class_active(['admin/resultSend/create','admin/resultSend/create/*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/resultSend/create','admin/resultSend/create/*']) }}"
                                    aria-expanded="true" href="{{ url('admin/resultSend/create') }}">Upload CSV File</a>
                            </li>
                        @endpermission
                    </ul>
                </div>
            </li> --}}
        {{-- @endpermission --}}
        {{-- csv upload menu End--}}

        {{-- settings menu start --}}
        @permission(['settings'])
            @php $settings = array('admin/settings','admin/settings/*','admin/settings/modules/create','admin/settings/modules/dashboard/edit','admin/settings/permissions/create','admin/settings/permissions/*/edit','admin/settings/roles/create',
        'admin/settings/roles/*/edit','admin/settings/users/create','admin/settings/users/*/edit'); @endphp
            <li class="nav-item {{ active_class_active($settings) }}">
                <a class="nav-link" data-toggle="collapse" href="#access_control"
                    aria-expanded="{{ is_active_route_active($settings) }}" aria-controls="access_control">
                    <i class="ti-settings menu-icon"></i>
                    <span class="menu-title">Settings</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse {{ show_class_show($settings) }}" id="access_control">
                    <ul class="nav flex-column sub-menu">
                        @permission('system_settings')
                            <li class="nav-item {{ active_class_active(['admin/settings']) }}">
                                <a class="nav-link {{ active_class_active(['admin/settings']) }}"
                                    aria-expanded="true" href="{{ url('/admin/settings') }}">System
                                    Settings</a>
                            </li>
                        @endpermission
                        @permission('system_settings')
                            <li class="nav-item {{ active_class_active(['admin/settings/moodle','admin/settings/moodle/*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/settings/moodle','admin/settings/moodle/*']) }}"
                                    aria-expanded="true" href="{{ url('/admin/settings/moodle/create') }}">Moodle Settings</a>
                            </li>
                        @endpermission
                        @permission('day_settings')
                            <li class="nav-item {{ active_class_active(['admin/settings/weekDays','admin/settings/weekDays/*']) }}">
                                <a class="nav-link {{ active_class_active(['admin/settings/weekDays','admin/settings/weekDays/*']) }}"
                                    aria-expanded="true" href="{{ url('/admin/settings/weekDays') }}">Day
                                    Settings</a>
                            </li>
                        @endpermission
                        @permission('modules')
                            <li class="nav-item {{ active_class_active(['admin/settings/modules','admin/settings/modules/create',
                            'admin/settings/modules/dashboard/edit']) }}">
                                <a class="nav-link {{ active_class_active(['admin/settings/modules','admin/settings/modules/create','admin/settings/modules/dashboard/edit']) }}" aria-expanded="true"
                                    href="{{ url('/admin/settings/modules/') }}">Modules</a>
                            </li>
                        @endpermission
                        @permission('permissions')
                            <li class="nav-item {{ active_class_active(['admin/settings/permissions','admin/settings/permissions/create','admin/settings/permissions/*/edit']) }}">
                                <a class="nav-link {{ active_class_active(['admin/settings/permissions','admin/settings/permissions/create','admin/settings/permissions/*/edit']) }}"
                                    aria-expanded="true" href="{{ url('/admin/settings/permissions/') }}">Permissions</a>
                            </li>
                        @endpermission
                        @permission('roles')
                            <li class="nav-item {{ active_class_active(['admin/settings/roles','admin/settings/roles/create',
                            'admin/settings/roles/*/edit']) }}">
                                <a class="nav-link {{ active_class_active(['admin/settings/roles','admin/settings/roles/create',
                                'admin/settings/roles/*/edit']) }}" aria-expanded="true"
                                    href="{{ url('/admin/settings/roles/') }}">Roles</a>
                            </li>
                        @endpermission
                        @permission('users')
                            <li class="nav-item {{ active_class_active(['admin/settings/users','admin/settings/users/create','admin/settings/users/*/edit']) }}">
                                <a class="nav-link {{ active_class_active(['admin/settings/users','admin/settings/users/create','admin/settings/users/*/edit']) }}" aria-expanded="true"
                                    href="{{ url('/admin/settings/users/') }}">Users</a>
                            </li>
                        @endpermission
                    </ul>
                </div>
            </li>
        @endpermission
        {{-- settings menu End--}}

       {{-- CMS FrontEnd menu start --}}
        @permission('fronted_cms')
        @php $frontend = array('admin/frontendCMS/','admin/aboutUs','admin/aboutUs/*','admin/userManual','admin/userManual/*','admin/blogs','admin/blogs/*','admin/achievement','admin/achievement/*','admin/testimonials','admin/testimonials/*','admin/privacyPolicy','admin/privacyPolicy/*','admin/termsAndConditions','admin/termsAndConditions/*','admin/banner','admin/banner/*','admin/slider','admin/slider/*','admin/modal','admin/modal/*','admin/contactus','admin/feature','admin/feature/*','admin/frontendNotice','admin/frontendNotice/*','admin/advertisement-image','admin/advertisement-image/*','admin/news','admin/news/*'); @endphp
        <li class="nav-item {{ active_class_active($frontend) }}">
            <a class="nav-link" data-toggle="collapse" href="#frontend_control"
                aria-expanded="{{ is_active_route_active($frontend) }}" aria-controls="frontend_control">
                <i class="ti-brush-alt menu-icon"></i>
                <span class="menu-title">Frontend CMS</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ show_class_show($frontend) }}" id="frontend_control">
                <ul class="nav flex-column sub-menu">
                    @permission('about_us')
                        <li class="nav-item {{ active_class_active(['admin/aboutUs','admin/aboutUs/*']) }}">
                            <a class="nav-link {{ active_class_active(['admin/aboutUs','admin/aboutUs/*']) }}" aria-expanded="true" href="{{ url('admin/aboutUs') }}">About Us</a>
                        </li>
                    @endpermission
                    @permission('user_manual')
                        <li class="nav-item {{ active_class_active(['admin/userManual','admin/userManual/*']) }}">
                            <a class="nav-link {{ active_class_active(['admin/userManual','admin/userManual/*']) }}" aria-expanded="true" href="{{ url('admin/userManual') }}">User Manual</a>
                        </li>
                    @endpermission
                    @permission('achievement')
                        <li class="nav-item {{ active_class_active(['admin/achievement','admin/achievement/*']) }}">
                            <a class="nav-link {{ active_class_active(['admin/achievement','admin/achievement/*']) }}" aria-expanded="true" href="{{ url('admin/achievement') }}">Achievement</a>
                        </li>
                    @endpermission
                    @permission('achievement')
                        <li class="nav-item {{ active_class_active(['admin/feature','admin/feature/*']) }}">
                            <a class="nav-link {{ active_class_active(['admin/feature','admin/feature/*']) }}" aria-expanded="true" href="{{ url('admin/feature') }}">Feature</a>
                        </li>
                    @endpermission
                    @permission('achievement')
                        <li class="nav-item {{ active_class_active(['admin/frontendNotice','admin/frontendNotice/*']) }}">
                            <a class="nav-link {{ active_class_active(['admin/frontendNotice','admin/frontendNotice/*']) }}" aria-expanded="true" href="{{ url('admin/frontendNotice') }}">Fnotend Notice</a>
                        </li>
                    @endpermission
                    @permission('blog')
                        <li class="nav-item {{ active_class_active(['admin/blogs','admin/blogs/*']) }}">
                            <a class="nav-link {{ active_class_active(['admin/blogs','admin/blogs/*']) }}" aria-expanded="true" href="{{ url('admin/blogs') }}">Blogs</a>
                        </li>
                    @endpermission

                    @permission('slider_images')
                        <li class="nav-item {{ active_class_active(['admin/slider','admin/slider/*']) }}">
                            <a class="nav-link {{ active_class_active(['admin/slider','admin/slider/*']) }}" aria-expanded="true"
                                href="{{ url('admin/slider') }}">Slider</a>
                        </li>
                    @endpermission

                    @permission('promotional_modal')
                        <li class="nav-item {{ active_class_active(['admin/modal','admin/modal/*']) }}">
                            <a class="nav-link {{ active_class_active(['admin/modal','admin/modal/*']) }}" aria-expanded="true"
                                href="{{ url('admin/modal') }}">Promotional Modal</a>
                        </li>
                    @endpermission

                    @permission('privacy_policy')
                        <li class="nav-item {{ active_class_active(['admin/privacyPolicy','admin/privacyPolicy/*']) }}">
                            <a class="nav-link {{ active_class_active(['admin/privacyPolicy','admin/privacyPolicy/*']) }}" aria-expanded="true" href="{{ url('admin/privacyPolicy') }}">Privacy Policy</a>
                        </li>
                    @endpermission

                    @permission('terms_and_conditions')
                        <li class="nav-item {{ active_class_active(['admin/termsAndConditions','admin/termsAndConditions/*']) }}">
                            <a class="nav-link {{ active_class_active(['admin/termsAndConditions','admin/termsAndConditions/*']) }}" aria-expanded="true" href="{{ url('admin/termsAndConditions') }}">Terms And Conditions</a>
                        </li>
                    @endpermission

                    {{-- @permission('advertisement') --}}
                        <li class="nav-item {{ active_class_active(['admin/advertisement-image','admin/advertisement-image/*']) }}">
                            <a class="nav-link {{ active_class_active(['admin/advertisement-image','admin/advertisement-image/*']) }}" aria-expanded="true" href="{{ url('admin/advertisement-image') }}">Advertisement Image</a>
                        </li>
                    {{-- @endpermission --}}

                    {{-- @permission('news') --}}
                        <li class="nav-item {{ active_class_active(['admin/news','admin/news/*']) }}">
                            <a class="nav-link {{ active_class_active(['admin/advertisement-image','admin/news/*']) }}" aria-expanded="true" href="{{ url('admin/news') }}">News</a>
                        </li>
                    {{-- @endpermission --}}
                </ul>
            </div>
        </li>
        @endpermission

        {{-- CMS FrontEnd menu End--}}

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="ti-power-off menu-icon"></i>
                @if(Auth::user()->user_type=="Student" || Auth::user()->user_type=="Teacher")
                    <span class="menu-title"> লগ আউট</span>
                @else
                    <span class="menu-title">Log out</span>
                @endif
            </a>
        </li>
    </ul>
</nav>
@push('plugin-scripts')
{!! Html::style('public/assets/plugins/@mdi/font/css/materialdesignicons.min.css') !!}
{!! Html::style('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}
@endpush
