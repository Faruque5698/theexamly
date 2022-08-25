<?php /** @noinspection ALL */

namespace App\Http\Controllers\Backend\RolePermission;

use App\Http\Controllers\Controller;
use App\Permission;
use Illuminate\Http\Request;
use App\Models\Backend\Module;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PermissionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $permissions = Permission::orderBy('module_id')->latest()->get();
        return view('backend.pages.settings.permissions.index', compact('permissions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $modules = Module::latest()->pluck('name', 'id')->toArray();
        return view('backend.pages.settings.permissions.create', compact('modules'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $validatorData = Validator::make($request->all(), [
            'name' => 'required|unique:permissions',
            'display_name' => 'string|max:199|nullable',
            'description' => 'string|max:199|nullable',
            'module_id' => 'required|integer',
            'created_by' => 'nullable'
        ]);

        if ($validatorData->fails()) {

            return redirect()
                ->route('admin.permissions.create')
                ->withErrors($validatorData)
                ->withInput();

        } else {

            try {

                $data = $validatorData->validated();
                $displayName = $request->display_name ?? $request->name;
                $displayName = Str::title($displayName);
                $data = Arr::add($data, 'created_by', Auth::id());
                $data = Arr::set($data, 'display_name', $displayName);

                Permission::create($data);
                $message = 'Permission Created Successfully';
                $status = 'success';

            } catch (\Exception $exception) {

                $message = $exception->getMessage();
                $status = 'warning';
            }

            return redirect()->route('admin.permissions.index')->with($status, $message);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Permission $permission)
    {

        $modules = Module::latest()->pluck('name', 'id')->toArray();
        return view('backend.pages.settings.permissions.edit', compact('modules', 'permission'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Permission $permission)
    {

        $validatorData = Validator::make($request->all(), [
            'name' => 'required',
            'display_name' => 'string|max:199|nullable',
            'description' => 'string|max:199|nullable',
            'module_id' => 'required|integer',
            'created_by' => 'nullable'
        ]);

        if ($validatorData->fails()) {

            return redirect()
                ->route('admin.permissions.edit', compact('permission'))
                ->withErrors($validatorData)
                ->withInput();

        } else {

            try {

                $data = $validatorData->validated();
                $displayName = $request->display_name ?? $request->name;
                $displayName = Str::title($displayName);
                $data = Arr::add($data, 'updated_by', Auth::id());
                $data = Arr::set($data, 'display_name', $displayName);

                $permission->update($data);
                $message = 'Permission Updated Successfully';
                $status = 'success';

            } catch (\Exception $exception) {

                $message = $exception->getMessage();
                $status = 'warning';

            }

            return redirect()->route('admin.permissions.index')->with($status, $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Permission $permission)
    {
        try {
            $permission->delete();
            $message = 'Permission Deleted Successfully';
            $status = 'success';

        } catch (\Exception $exception) {

            $message = $exception->getMessage();
            $status = 'warning';

        }

        return redirect()->back()->with($status, $message);
    }
}
