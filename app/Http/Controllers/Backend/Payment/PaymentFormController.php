<?php

namespace App\Http\Controllers\Backend\Payment;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use App\Modules\Backend\Transaction;
use App\Modules\Backend\Student;
// use Modules\Admission\Entities\Paymentamount;
// use Modules\Admission\Entities\StudentDetails;
// use Modules\Admission\Entities\PaymentComplete;
// use Modules\Admission\Entities\TempStudent;

class PaymentFormController extends Controller
{
    public function index()
    {
        $students = Student::latest()->get();
        return view('backend.pages.payment.index', compact('students'));
    }

    public function create()
    {
        $student = null;
        return view('backend.pages.payment.create',compact('student'));
    }

    public function store(Request $request)
    {   
        $validatorData = Validator::make($request->all(), [
            'expense_title' => 'required|string|max:50',
            'expense_description' => 'string|nullable'
        ]);

        if ($validatorData->fails()) {

            return redirect()
                ->route('admin.expenseCategory.create')
                ->withErrors($validatorData)
                ->withInput();

        } else {
        try {
            $courseCategory = ExpenseCategory::create([
                'expense_title' => $request->expense_title,
                'expense_description' => $request->expense_description,
                'created_by' => Auth::id()
            ]);

            $status = 'success';
            $message = 'Expense Category Created Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.expenseCategory.index')->with($status, $message);
        }
    }

    public function editCategory(expenseCategory $expenseCategory)
    {
       return view('backend.pages.expense.expenseCategory.create', compact('expenseCategory'));
    }

    public function updateCategory(Request $request, expenseCategory $expenseCategory)
    {
        $validatorData = Validator::make($request->all(), [
            'expense_title' => 'required|string|max:50',
            'expense_description' => 'string|nullable'
        ]);
        if ($validatorData->fails()) {

            return redirect()
                ->route('admin.expenseCategory.create')
                ->withErrors($validatorData)
                ->withInput();

        } else {
            try {
                $expenseCategory->update([
                    'expense_title' => $request->expense_title,
                    'expense_description' => $request->expense_description,
                    'updated_by' => Auth::id()
                ]);
    
    
                // $role->syncPermissions($request->permissions);
    
                $status = 'success';
                $message = 'Expense Category Updated Successfully';
    
            } catch (\Exception $exception) {
                $status = 'warning';
                $message = $exception->getMessage();
            }
        }
        

        return redirect()->route('admin.expenseCategory.index')->with($status, $message);

    }

    public function destroyCategory($id)
    {
        $courses = ExpenseCategory::findOrFail($id);
        $courses->delete();

        return response()->json([
            'success' => 'Expense Category deleted successfully!'
        ]);
    }

    // public function index()
    // {
    //     $expenses = Expense::latest()->get();
    //     return view('backend.pages.expense.index', compact('expenses'));
    // }

    // public function create()
    // {   
    //     $expense = null;
    //     $expenseCategories = ExpenseCategory::pluck('expense_title','id');
    //     return view('backend.pages.expense.create', compact('expense','expenseCategories'));
    // }

    // public function store(Request $request)
    // {
    //     $validatorData = Validator::make($request->all(), [
    //         'expenseCategory_id' => 'required|exists:expense_categories,id',
    //         'amount' => 'required|integer'
    //     ]);

    //     if ($validatorData->fails()) {

    //         return redirect()
    //             ->route('admin.expense.create')
    //             ->withErrors($validatorData)
    //             ->withInput();

    //     } else {
    //     try {
    //         $expense = Expense::create([
    //             'expenseCategory_id' => $request->expenseCategory_id,
    //             'amount' => $request->amount,
    //             'created_by' => Auth::id()
    //         ]);

    //         $status = 'success';
    //         $message = 'Expense Added Successfully';

    //     } catch (\Exception $exception) {
    //         $status = 'warning';
    //         $message = $exception->getMessage();
    //     }

    //     return redirect()->route('admin.expense.index')->with($status, $message);
    //     }
    // }

    public function edit(Expense $expense)
    {
        $expenseCategories = ExpenseCategory::pluck('expense_title','id');
        return view('backend.pages.expense.create', compact('expense', 'expenseCategories'));
    }

    public function update(Request $request, expense $expense)
    {
        $validatorData = Validator::make($request->all(), [
            'expenseCategory_id' => 'required|exists:expense_categories,id',
            'amount' => 'required|integer'
        ]);
        if ($validatorData->fails()) {

            return redirect()
                ->route('admin.expense.create')
                ->withErrors($validatorData)
                ->withInput();

        } else {
            try {
                $expense->update([
                    'expenseCategory_id' => $request->expenseCategory_id,
                    'amount' => $request->amount,
                    'updated_by' => Auth::id()
                ]);
    
    
                // $role->syncPermissions($request->permissions);
    
                $status = 'success';
                $message = 'Expense Updated Successfully';
    
            } catch (\Exception $exception) {
                $status = 'warning';
                $message = $exception->getMessage();
            }
        }
        

        return redirect()->route('admin.expense.index')->with($status, $message);

    }

    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return response()->json([
            'success' => 'Expense deleted successfully!'
        ]);
    }
}
