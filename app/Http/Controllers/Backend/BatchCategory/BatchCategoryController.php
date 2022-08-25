<?php

namespace App\Http\Controllers\Backend\BatchCategory;

use App\Http\Controllers\Controller;
use App\Models\Backend\Module;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Backend\BatchCategory;


class BatchCategoryController extends Controller
{
    /**
     * Display a listing of Roles.
     *
     * @return All Latest Roles
     */
    public function index()
    {
        $batchCategory = BatchCategory::latest()->get();

        return view('backend.pages.batch.batchCategory.index', compact('batchCategory'));
    }

    public function create()
    {
        $batchCategory = null;

        return view('backend.pages.batch.batchCategory.create', compact('batchCategory'));
    }

    /**
     * Store role first
     * then assign the permissions to the role
     */
    public function store(Request $request)
    {
        $validatorData = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'description' => 'string|nullable'
        ]);

        if ($validatorData->fails()) {

            return redirect()
                ->route('admin.batchCategory.create')
                ->withErrors($validatorData)
                ->withInput();

        } else {
        try {
            $batchCategory = BatchCategory::create([
                'name' => $request->name,
                'description' => $request->description
            ]);

            $status = 'success';
            $message = 'Batch Category Created Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.batchCategory.index')->with($status, $message);
        }
    }

    /**
     * Show a single role with its permissions
     */
    public function show(BatchCategory $batchCategory)
    {
        //
    }

    /**
     * Take a single row for edit
     * Send corresponding role permissions and all permissions
     */
    public function edit(BatchCategory $batchCategory)
    {
       return view('backend.pages.batch.batchCategory.create', compact('batchCategory'));
    }

    /**
     * Update the role
     * and also update the role permissions
     */
    public function update(Request $request, BatchCategory $batchCategory)
    {
        try {
            $batchCategory->update([
                'name' => $request->name,
                'description' => $request->description,
                'updated_by' => Auth::id()
            ]);


            // $role->syncPermissions($request->permissions);

            $status = 'success';
            $message = 'Batch Category Updated Successfully';

        } catch (\Exception $exception) {
            $status = 'warning';
            $message = $exception->getMessage();
        }

        return redirect()->route('admin.batchCategory.index')->with($status, $message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $batches = BatchCategory::findOrFail($id);
        $batches->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);

    }
}
