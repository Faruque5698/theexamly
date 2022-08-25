{{-- @php
    dd(session('success'));die();
@endphp --}}
<!--@extends('backend.layout.master')-->
<?php
use App\Models\Backend\BatchStudent;
use App\Models\Backend\AssignTeacher;
use App\Models\Backend\PaymentHistory;
use App\Models\Backend\CourseCategory;
use App\Models\Frontend\TempStudent;
use Illuminate\Support\Facades\DB;
use App\Models\Backend\Subject;
use App\Models\Backend\Course;
use App\Models\Backend\RequestCategory;
use App\Models\Backend\RequestGroup;
use App\Models\Backend\RequestSubject;
use App\Models\Backend\Teacher;
use App\Models\Backend\Student;
use App\Models\Backend\TeacherPayment;
use App\Models\Backend\GenaralSettings;
use App\Models\Backend\Batch;
use App\User;
use Carbon\Carbon;
$refer_code = User::where('id',Auth::id())->get()->pluck('own_refer_code')->first();
$moodle_button = GenaralSettings::where('moodle_button','1')->get()->pluck('moodle_button')->first();

//moodle button show/hide base on batch
$subjectName = DB::table('temp_students')->select('student_batch_id')->distinct()->where('user_id',$id =
            Auth::id())->where('status','paid')->whereNotNull('student_batch_id')->get()->toArray();
            $data= json_decode( json_encode($subjectName), true);
            $string= implode(',', array_column($data, 'student_batch_id'));
            $arry= preg_split("/[,]/",$string);

            foreach ($arry as $key => $value) {
                $bb = Batch::where('id',$value)->get()->pluck('end_date')->first();
              $bb2[]=$bb;
            }

            $a=count(array_filter($bb2));
$cDate=date('Y-m-d');
            foreach ($arry as $key => $value) {
                $bb3 = Batch::where('id',$value)->where('end_date','>=',$cDate)->get()->pluck('end_date')->first();
              $bb4[]=$bb3;
            }
            $b=count(array_filter($bb4));

?>
@push('plugin-styles')
{!! Html::style('public/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') !!}
{!! Html::style('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.css') !!}
@endpush

<style type="text/css">
    .custom_shadow2 {
        height: 100px;
        width: 238px;
        /*text-align: center;*/
    }

    .custom_shadow2:hover {
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
    }

    .custom_shadow:hover {
        box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
    }

    .moodle_button button{
        background-color: #15AABF;
    }

    .moodle_button button:hover{
        background-color: #006897;
    }

    .moodle_button p{
        color: #15AABF;
    }

    .moodle_button p:hover{
        color: #006897;
    }
</style>


@section('content')

<section class="dashbord_header">
    <div class="container">
        <div class="row">
            {{-- @permission('student_information_update_notice')
            <div class="col-12">
                <div class="alert alert-danger text-center" role="alert">
                    Must be complete your own profile information
                </div>
            </div>
            @endpermission --}}
            <div class="col-12">
                <div class="moodle_button">
                    <!--{{route('admin.dashboard.cashback-way') }}-->

                    <h3 class="header">পরীক্ষা কেন্দ্রে স্বাগতম ! <p class="float-right"><strong><a href="{{url('admin/dashboard/refer')}}" type="button" class="btn btn-sm btn-info" style="color:white">My Refer Code:</a></strong> {{$refer_code}}</p></h3>

                    @if(Auth::user()->user_type!="Student" && Auth::user()->user_type!="Teacher")

                        <form class="loginform" name="login" method="post" action="https://oe.theexamly.com/login/index.php">

                            <input size="10" type="hidden" name="username" value="{{ Auth::user()->email }}" />
                            <input size="10" type="hidden" name="password" value="{{ Auth::user()->raw_password }}" />
                            <button type="submit" class="btn btn-primary exam_panel_btn btn-lg" href="#">অগ্রসর হন </button>
                        </form>
                    @else
                        <span></span>
                    @endif

                    @if(Auth::user()->user_type=="Student" && $moodle_button=='1' && $a==$b)
                        <form class="loginform" name="login" id="form" method="post" action="https://oe.theexamly.com/login/index.php">

                            <input size="10" type="hidden" name="username" value="{{ Auth::user()->email }}" />
                            <input size="10" type="hidden" name="password" value="{{ Auth::user()->raw_password }}" />
                            <button type="submit" class="btn btn-primary exam_panel_btn btn-lg" href="#">অগ্রসর হন </button>
                        </form>
                    @else
                        <span></span>
                    @endif

                    <?php $teacherTable = Teacher::where('user_id',Auth::user()->id)->get()->pluck('user_id')->first();?>
                    @if(Auth::user()->user_type=="Teacher" && $teacherTable==NULL)
                        <form class="loginform" name="login" id="form" method="post" action="https://oe.theexamly.com/login/index.php">

                            <input size="10" type="hidden" name="username" value="{{ Auth::user()->email }}" />
                            <input size="10" type="hidden" name="password" value="{{ Auth::user()->raw_password }}" />
                            <button type="submit" class="btn btn-primary exam_panel_btn btn-lg" href="#">অগ্রসর হন </button>
                        </form>
                    @else
                        <span></span>
                    @endif

                    <hr class="my-4">

                    <form class="loginform text-center" name="login" id="form" method="post"
                        action="https://oe.theexamly.com/login/index.php" style="display: none">

                        <input size="10" type="hidden" name="username" value="{{ Auth::user()->email }}" />
                        <input size="10" type="hidden" name="password" value="{{ Auth::user()->raw_password }}" />
                        <button type="submit" class="btn btn-primary exam_panel_btn btn-lg" href="#">অগ্রসর হন </button>
                    </form>
                    <?php $moodle = Teacher::where('user_id',Auth::user()->id)->get()->pluck('status')->first() ?>
                    @if($moodle=='0')
                        <form class="loginform text-center" name="login" id="teacher-form" method="post"
                        action="https://ditlms.rajbd.com" style="display: none">

                            <input size="10" type="hidden" name="username" value="{{ Auth::user()->email }}" />
                            <input size="10" type="hidden" name="password" value="{{ Auth::user()->raw_password }}" />
                            <button type="submit" class="btn btn-primary exam_panel_btn btn-lg" href="#">অগ্রসর হন </button>
                        </form>
                    @else
                       <form class="loginform text-center" name="login" id="teacher-form" method="post"
                           action="https://oe.theexamly.com/login/index.php" style="display: none">

                           <input size="10" type="hidden" name="username" value="{{ Auth::user()->email }}" />
                           <input size="10" type="hidden" name="password" value="{{ Auth::user()->raw_password }}" />
                           <button type="submit" class="btn btn-primary exam_panel_btn btn-lg" href="#">অগ্রসর হন </button>
                       </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@if(Auth::user()->user_type=="Student")
    <h4 class="header">পরীক্ষা শুরু করার পূর্বে <a href="{{ route('userManual.detail') }}">ব্যবহারবিধি</a>, <a href="{{ route('termsAndConditions') }}">ব্যবহারের শর্তাবলী</a>, <a href="{{ route('privacyPolicy') }}">গোপনীয়তার নীতিমালা</a> ভালো ভাবে পড়ে নিন।</h4>
@else
    <span></span>
@endif
@permission('student_course_name')
<section class="dashbord_item">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="heading text-center">
                    <!--<h2 class="header">আপনি কি আরও নতুন বিষয়ে পরীক্ষা দিতে চান ? </h2>-->
                </div>
            </div>

            @foreach($examCategory as $key=>$category)
            <div class="col-12 col-md-6 col-xl-3">
                @if($category->id=='5' || $category->id=='7')
                    <a href="{{ url('/admin/dashboard/buySubject/'.$category->id) }}" class="text-decoration-none">
                @endif
                    <div class="single_item">
                        <div class="row no-gutters">
                            <div class="col-4 d-flex align-items-center">
                                <div class="image ">
                                    <img src="{{ url('public/uploads/course/') }}/{{ $category->image }}"
                                        class="img-fluid  rounded shadow-sm"
                                        alt="dashbord">
                                </div>
                            </div>
                            <div class="col-8 d-flex align-items-center">
                                <div class="text ml-2">
                                    <h2 class="header">
                                        {{ $category->name  }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <?php

            $batchUser = BatchStudent::where('user_id',Auth::id())->get();
            if (!empty($batchUser)) {
                foreach ($batchUser as $key => $batchUsers) {

                    $batchExpired = Batch::where('id',$batchUsers->batch_id)->get()->pluck('end_date')->first();
                }
            }
        ?>
        <div class="row"><?php $serial=0;$serial++;?>
            @foreach($examCategory as $key=>$category)
                <div class="col-12 col-md-6 col-xl-3">
                    @foreach($batchUser as $key=>$batchUsers)
                        <?php $subject = Subject::where('group_id',$batchUsers->course_id)->get()->pluck('exam_category')->first();?>
                        @if($category->id==$subject)
                            {{-- <h5>{{ $serial++ }}</h5> --}}
                            <div class="single_item">
                                <div class="row no-gutters">
                                    <div class="col-12 d-flex align-items-center">
                                        <div class="image ">
                                            <p>Batch Name: {{$batchUsers->batch->name}}</p>
                                            <p>Purchase Date: {{$batchUsers->admission_date}}</p>
                                            <p>Expired Date: {{date("d-m-Y", strtotime($batchExpired))}}</p>
                                            <p>Price: {{$batchUsers->course_fee}} </p>
                                            <!--<p>Price: ৳ {{$batchUsers->course_fee}} </p>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <span></span>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>
@endpermission
@permission('student_course_name')

@endpermission
{{-- @permission('teacher_course_name') --}}
@if(Auth::user()->user_type == 'Teacher')
<section class="dashbord_item">
    <div class="container-fluid">
        <div class="row">
            @php
                $user_id = Auth::user()->id;
                $requestSubject = RequestSubject::where('user_id',$user_id)->where('status',1)->latest()->get()->pluck('subject_name');
                foreach ($requestSubject as $key => $value) {
                    $subjectName[] = Subject::where('id',$value)->get()->first();
                    // $studentCount[] = DB::table('subject_user')->where('subject_id',$value)->distinct()->get('user_id')->count();
                }

            @endphp
            @if(!empty($subjectName))
            <div class="col-12">
                <div class="heading text-center">
                    <h2 class="header">বিষয় সমূহ </h2>
                </div>
            </div>
            @else
                <span></span>
            @endif

            @if(!empty($subjectName))
            @foreach($subjectName as $key=>$value)
            <div class="col-12 col-md-6  col-xl-3">
                <a href="javascript:void(0)" onclick="document.getElementById('teacher-form').submit()" class="text-decoration-none">
                    <div class="single_item">
                        <div class="row no-gutters">
                            <div class="col-4 d-flex align-items-center">
                                <div class="image">
                                    <img src="{{ asset('public/uploads/subject/') }}/{{ $value->image ?? '' }}"
                                        class="img-fluid rounded shadow-sm"
                                        alt="dashbord">
                                </div>
                            </div>

                            <div class="col-8 d-flex align-items-center">
                                <div class="text ml-2">
                                    <h2 class="header">
                                        {{ $value->course->full_name ?? '' }}

                                    </h2>
                                    <p class="sub_header mt-2">
                                        {{ $value->name ?? '' }}
                                    </p>
                                </div>
                            </div>
                             <?php $studentCount = DB::table('subject_user')->where('subject_id',$value->id)->distinct()->get('user_id');?>

                            <div class="col-12 mt-1">
                                <div class="cource_remaining">
                                    <span>পরীক্ষার্থী {{ $studentCount->count() ?? '' }}  জন</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @else
            <div></div>
            @endif
        </div>
    </div>
</section>
{{-- Teacher's Income  section start --}}
<section class="dashbord_item" style="color: #15AABF">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="heading text-center">
                    <h2 class="header">পেমেন্ট সমূহ </h2>
                </div>
            </div>
            <div class="col-12 col-md-6  col-xl-3">
                <div class="single_item">
                    <div class="row no-gutters">
                        <div class="col-3 d-flex align-items-center"></div>
                        <div class="col-8 d-flex align-items-center">
                            <div class="text center mt-2">
                                <h2 class="header">
                                    সর্বমোট আয়

                                </h2>
                                @if(!empty($subjectName))
                                <p class="sub_header text-center mt-2">
                                    <?php
                                        $sum =0;
                                        foreach($subjectName as $name){

                                            $sum=$sum+$name->price;
                                        }
                                    ?>
                                    @if(!empty($sum))
                                        {{ ($sum/100*25) }} টাকা
                                    @else
                                        0 টাকা
                                    @endif
                                </p>
                                @else
                                    <p class="sub_header text-center mt-2"> 0 টাকা</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="single_item">
                    <div class="row no-gutters">
                        <div class="col-2 d-flex align-items-center"></div>
                        <div class="col-8 d-flex align-items-center">
                            <div class="text center mt-2">
                                <h2 class="header">
                                    পরিশোধিত টাকার পরিমান

                                </h2>
                                <p class="sub_header text-center mt-2">
                                    <?php

                                        $totalPaid = TeacherPayment::where('user_id',$user_id)->get()->sum('payment_amount');

                                    ?>
                                    @if($totalPaid!=0)
                                        {{ $totalPaid }} টাকা
                                    @else
                                        0 টাকা
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
{{-- Teacher's Income  section end --}}
{{-- @endpermission --}}
<div>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-5 mb-4 mb-xl-0">
                    {{-- @permission('admin_dashboard') --}}
                    {{-- <h4 class="font-weight-bold">Dashboard</h4> --}}
                    {{-- <h4 class="font-weight-normal mb-0"></h4> --}}
                    {{-- @endpermission --}}
                    {{-- @permission('student_course_name') --}}
                    {{-- @endpermission --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @permission('dashboard_courses')
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Number of Exam Category</p>
                    <div
                        class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$examCategories}}</h3>
                        <i class="ti-bookmark icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    {{-- <p class="mb-0 mt-2 text-warning">2.00% <span class="text-black ml-1"><small>(30 days)</small></span></p> --}}
                </div>
            </div>
        </div>
        @endpermission

        @permission('dashboard_batches')
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Number of Exam Group</p>
                    <div
                        class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$courses}}</h3>
                        <i class="ti-agenda icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                    {{-- <p class="mb-0 mt-2 text-warning">2.00% <span class="text-black ml-1"><small>(30 days)</small></span></p> --}}
                </div>
            </div>
        </div>
        @endpermission

        @permission('dashboard_students')
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Number of Students</p>
                    <div
                        class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$students}}</h3>
                        <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                    </div>
                </div>
            </div>
        </div>
        @endpermission

        @permission('dashboard_teachers')
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Number of Teachers</p>
                    <div
                        class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$teachers}}</h3>
                        <i class="fa fa-user-circle-o icon-md text-muted mb-0 mb-md-3 mb-xl-0"
                            style='font-size:28px'></i>
                    </div>
                </div>
            </div>
        </div>
        @endpermission

        @permission('dashboard_due')
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body custom_shadow">
                    <a class="text-decoration-none" href="{{ url('/admin/notification') }}">
                        <p class="card-title text-md-center text-xl-left ">Number of Dues</p>
                        <div
                            class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$counts}}</h3>
                            <i class="fa fa-bell icon-md text-muted mb-0 mb-md-3 mb-xl-0" style='font-size:25px'></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @endpermission

        {{-- @permission('dashboard_monthly_income')
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Todays Income</p>
                    <div
                        class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$income->totalIncome}}/-</h3>
                        <i class="fa fa-money icon-md text-muted mb-0 mb-md-3 mb-xl-0" style='font-size:35px'></i>
                    </div>
                </div>
            </div>
        </div>
        @endpermission --}}

        @permission('dashboard_monthly_expense')
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-md-center text-xl-left">Todays Expense</p>
                    <div
                        class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                        <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$expense->totalExpense}}/-</h3>
                        <i class="fa fa-minus icon-md text-muted mb-0 mb-md-3 mb-xl-0" style='font-size:23px'></i>
                    </div>
                </div>
            </div>
        </div>
        @endpermission
    </div>
    @permission('student_course_name')
    {{-- <h4>Course overview</h4> --}}
    <div class="row">
        <div class="col-md-3 grid-margin stretch-card">
            {{-- @php
                    $courseCategory = TempStudent::where('user_id',$id = Auth::id())->where('status','paid')->distinct()->get('courseCategory')->pluck('courseCategory');

                @endphp
                @foreach($courseCategory as $key => $value)
                <div class="card border-0">
                    <div class="card-body custom_shadow2">

                        <p class="card-title text-md-center text-xl-left">
                                {{ $name = CourseCategory::where('id',$value)->get()->pluck('name')->first()  }}</p>

            <div
                class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                @php
                $courseCategory2 = TempStudent::where('user_id',$id =
                Auth::id())->where('courseCategory',$value)->where('status','paid')->distinct()->get()->pluck('course_name','courseCategory');

                @endphp
                @foreach($courseCategory2 as $key => $value2)
                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="font-size: 20px">

                    {{ $course_name = Course::where('id',$value2)->get()->pluck('full_name')->first() }}
                </h3><i class="" style='font-size:23px'></i>
                @endforeach
            </div>
        </div>
    </div>&nbsp;&nbsp;
    @endforeach --}}
</div>
@endpermission
@permission('student_batch_name')
<div class="col-md-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Batch Name</p>
            <div
                class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                <h3 style="width: 200px;" class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                    @php
                    $batch_name = BatchStudent::where('user_id',$id = Auth::id())->get()->pluck('batch_id')->first();
                    @endphp
                    {{$name = Batch::where('id',$batch_name)->get()->pluck('name')->first()}}</h3><i class=""
                    style='font-size:23px'></i>
            </div>
        </div>
    </div>
</div>
@endpermission
@permission('student_payment_amount')
{{-- <div class="col-md-3 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body custom_shadow2">
                        <p class="card-title text-md-center text-xl-left">Paymented Amount</p>
                        <div
                            class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{$payment_amount = PaymentHistory::where('user_id',$id = Auth::id())->where('batch_id',$course_name)->get()->pluck('paymented_amount')->first()}}/-
</h3>
<i class="" style='font-size:23px'></i>
</div>
</div>
</div>
</div> --}}
@endpermission
@permission('student_due_amount')
<div class="col-md-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <p class="card-title text-md-center text-xl-left">Due Amount</p>
            <div
                class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
                    {{$due_amount = BatchStudent::where('user_id',$id = Auth::id())->get()->pluck('due_amount')->first()}}/-
                </h3>
                <i class="" style='font-size:23px'></i>
            </div>
        </div>
    </div>
</div>
@endpermission
</div>
{{-- @permission('student_course_name')
<h4>আমার পরীক্ষার বিষয়</h4>
<div class="row">
    @php
    $subjectName = DB::table('subject_user')->select('subject_id')->distinct()->where('user_id',$id =
    Auth::id())->where('status',1)->get()->toArray();
    $data= json_decode( json_encode($subjectName), true);
    $string= implode(',', array_column($data, 'subject_id'));
    $arry= preg_split("/[,]/",$string);

    @endphp
    @foreach($arry as $key=>$value)
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card" style="background: #006898">
            <div class="card-body custom_shadow">
                <p class="card-title text-md-center text-xl-left" style="color: white">
                    {{ $name = Subject::where('id',$value)->where('end_date','>',date('Y-m-d'))->get()->pluck('name')->first() }}
</p>
<div
    class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
    <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">
    </h3><i class="" style='font-size:23px'></i>
</div>
</div>
</div>
</div>
@endforeach
</div><br>
@endpermission --}}
{{-- @permission('student_course_name')

<h4> বাছাই করুন আপনার পছন্দের বিষয়টি </h4>
<div class="row">
    @foreach($examCategory as $key=>$category)
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card" style="background: #15AABF;border-radius: 30px;">
            <div class="card-body custom_shadow2 btn d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center"
                style="border-radius: 30px;">
                <a class="text-decoration-none" href="{{ url('/admin/dashboard/buySubject/'.$category->id) }}">
<p class="card-title text-md-center text-xl-left "></p>
<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0 text-white" style="margin-left: 12px">
    {{ $category->name  }}
</h3>
<i class="fa fa-bell icon-md text-muted mb-0 mb-md-3 mb-xl-0" style='font-size:25px'></i>

</a>
</div>
</div>
</div>
@endforeach
@endpermission
</div> --}}
</div>
</div>
</div>
@endsection

@push('plugin-scripts')
{!! Html::script('public/assets/plugins/chartjs/chart.min.js') !!}
{!! Html::script('public/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
{!! Html::script('public/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}
{!! Html::script('public/assets/plugins/jquery-toast-plugin/jquery.toast.min.js') !!}
@endpush

@push('custom-scripts')
{!! Html::script('public/assets/js/dashboard.js') !!}
{!! Html::script('public/assets/js/toastDemo.js') !!}
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
