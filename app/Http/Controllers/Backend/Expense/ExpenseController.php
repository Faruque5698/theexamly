<?php

namespace App\Http\Controllers\Backend\Expense;

use App\Http\Controllers\Controller;
use App\Models\Backend\Expense;
use App\Models\Backend\ExpenseCategory;
use App\Models\Backend\GenaralSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ExpenseController extends Controller
{
    public function indexCategory()
    {
        $expenseCategories = ExpenseCategory::latest()->get();
        return view('backend.pages.expense.expenseCategory.index', compact('expenseCategories'));
    }

    public function createCategory()
    {
        $expenseCategory = null;
        return view('backend.pages.expense.expenseCategory.create',compact('expenseCategory'));
    }

    public function storeCategory(Request $request)
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

    public function index()
    {
        $expenses = Expense::latest()->get();
        $generalSettings = GenaralSettings::first();
        $totalExpense = Expense::all()->sum('amount');
        return view('backend.pages.expense.index', compact(['expenses','generalSettings','totalExpense']));
    }

    public function create()
    {   
        $expense = null;
        $expenseCategories = ExpenseCategory::pluck('expense_title','id');
        return view('backend.pages.expense.create', compact('expense','expenseCategories'));
    }

    public function store(Request $request)
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
            $expense = Expense::create([
                'expenseCategory_id' => $request->expenseCategory_id,
                'amount' => $request->amount,
                'created_by' => Auth::id()
            ]);

            $status = 'success';
            $message = 'Expense Added Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.expense.index')->with($status, $message);
        }
    }

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

    public function expenseReport(){

        $expenseCategory = ExpenseCategory::get()->pluck('expense_title','id');
        return view('backend.pages.payment.offline.expenseReport.findExpenseReport', compact('expenseCategory'));
    }

    public function expenseReportIndex(Request $request){
        // dd($request);
      $from=empty($request->start_date)? '' : (date(Carbon::parse($request->start_date)->format('d-m-Y')));
      $to=date(Carbon::parse($request->end_date)->format('d-m-Y'));


        \DB::statement("SET SQL_MODE=''");

        $expense_type = $request->expense_type;
        $expense_type=empty($expense_type)? '' : $request->expense_type;
        $expense_category_name = empty($expense_type)? 'All Expenses' : ExpenseCategory::find($expense_type)->expense_title;
        $paymnets= Expense::with('ExpenseCategory')
        ->when(!empty($request->expense_type) , function ($query) use($request){
        return $query->where('expenseCategory_id',$request->expense_type);
        })
        // ->whereBetween('created_at', [$from, $to])
        ->selectRaw('*, SUM(amount) as total_ammount')
        ->groupBy('expenseCategory_id')
        ->orderBy('expenseCategory_id', 'asc')
        ->get();

         \DB::statement("SET SQL_MODE=only_full_group_by");

         $generalSettings = GenaralSettings::first();

         if($expense_type == null){
            $totalAll = Expense::selectRaw('SUM(amount) as totalAll')->get()->first();
        }
        else{
        $totalAll = Expense::selectRaw('SUM(amount) as totalAll')->where('expenseCategory_id',$expense_type)->get()->first();
        }
        return view('backend.pages.payment.offline.expenseReport.expenseStatement',compact(['paymnets','generalSettings','totalAll','expense_category_name']));
    }
}
