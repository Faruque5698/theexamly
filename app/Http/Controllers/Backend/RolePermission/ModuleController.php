<?php

namespace App\Http\Controllers\Backend\RolePermission;

use App\Http\Controllers\Controller;
use App\Models\Backend\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::latest()->get();
        return view('backend.pages.settings.modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $module = null;

        return view('backend.pages.settings.modules.create', compact('module'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $module = Module::create([
                'name' => $request->name,
                'created_by' => Auth::id()
            ]);

            $message = 'Module Created Successfully';
            $status = 'success';
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $status = 'warning';
        }

        return redirect()->route('admin.modules.index')->with($status, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        return view('backend.pages.settings.modules.create', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        try {
            $module->update([
                'name' => $request->name,
                'updated_by' => Auth::id()
            ]);

            $message = 'Module Updated Successfully';
            $status = 'success';
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $status = 'warning';
        }

        return redirect()->route('admin.modules.index')->with($status, $message);
    }

    public function updateModule(Request $request)
    {
        $isUpdated = false;
        if ($request->ajax()) {

            try {
                $module = Module::where(['slug' => $request->slug])->firstOrFail();

                $isUpdated = $module->update([
                    $request->column_name => $request->column_value,
                    'updated_by' => Auth::id()
                ]);


                $message = 'Module Updated Successfully';
            } catch (\Exception $exception) {
                $message = $exception->getMessage();
            }

        }

        return response([
            'message' => $message,
            'status' => $isUpdated ? Response::HTTP_CREATED : Response::HTTP_INTERNAL_SERVER_ERROR
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        try {
            $module->delete();

            $message = 'Module Deleted Successfully';
            $status = 'success';

        } catch (\Exception $exception) {
            $message = $exception->getMessage();

            $status = 'warning';
        }

        return redirect()->back()->with($status, $message);
    }
}
