<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\ReferralBonus;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use App\Models\Backend\Student;
use App\Models\Backend\Teacher;
use App\Models\Backend\Course;
use App\Models\Backend\Batch;
use App\Models\Backend\BatchStudent;
use App\Models\Backend\PaymentHistory;
use App\Models\Backend\CourseCategory;
use App\Models\Backend\Expense;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(Auth::check());
        $users = User::count();
        // $students = Student::where('student_id','!=','NULL')->count();
        $students = User::where('user_type','=','Student')->where('status',1)->count();
        $teachers = Teacher::where('status', 1)->count();
        $courses = Course::where('status', 1)->count();
        $examCategories = CourseCategory::count();
        $batches = Batch::where('status', 1)->whereYear('created_at', date('Y'))->count();
        //daily income and expense
        $date = date('d-m-Y');
        $date2 = Carbon::today();
        $income = PaymentHistory::selectRaw('SUM(paymented_amount) as totalIncome')->where('payment_date',$date)->get()->first();
        $expenseDate = Expense::get()->pluck('created_at')->first();
        //end
        //due alart notification
        $expense = Expense::selectRaw('SUM(amount) as totalExpense')->whereDate('created_at',$date2)->get()->first();
        $current = Carbon::today();
        $trialExpires = Carbon::today()->addDays(6);
        $dueAlart = BatchStudent::with(['User','batch'])->where('due_amount','>',0)->whereBetween('commitment_date', [$current, $trialExpires])->latest()->get();
        $counts = count($dueAlart);
        //end

        $examCategory = CourseCategory::where('status',1)->orderBy('serial', 'DESC')->get();

        return view('backend.dashboard', compact('users','students', 'teachers', 'courses','batches','income','expense','counts','examCategory','examCategories'));
    }

    public function cashback_way(){
        $cashback = null;
        return view('backend.pages.cashback.create',compact('cashback'));
    }

    public function cashback_wayStore(Request $request)
    {
        $this->validate(
            $request,
            [
                'cashback_way' => 'required|string',
            ],
        );

        //dd($request);

        $user = User::find($request->user_id);
        $user->cashback_way = $request->cashback_way;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', ('Cashbsack Way Details Successfully Added'));
    }

    public function referral(){
        return view('backend.pages.referral.referral');
    }

    public function referral_save(Request $request){
        $request->validate([
           'course_id'=>'required',
           'referral_bonus'=>'required',
        ]);

        $c = ReferralBonus::where('course_id','=',$request->course_id)->first();
        if ($c){
            $c->referral_bonus = $request->referral_bonus;
            $c->save();
            return back()->with('success',('Referral Bonus Added'));
        }


        $refer = new ReferralBonus();
        $refer->course_id = $request->course_id;
        $refer->referral_bonus = $request->referral_bonus;
        $refer->save();

        return back()->with('success',('Referral Bonus Added Successfully'));
    }

    public function referral_delete($id){
        $r = ReferralBonus::find($id);
        $r->delete();
        return back()->with('success',('Referral Bonus Remove Successful'));
    }
}
