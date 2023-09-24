<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Traits\PermissionsTrait;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::all();
        return view('admin.users.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = PermissionsTrait::allPermissionList();

        return view('admin.users.create')->with(compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => ['required', 'string', 'max:40'],
            'permissions' => ['required', 'array', 'min:1'],
            'permissions.*' => ['string']
        ], [
            'permissions' => 'At least one permission is required'
        ]);

        try {

            $role = Role::create([
                'name' => $request->input('role'),
                'guard_name' => config('auth.defaults.guard')
            ]);
    
            $role->syncPermissions($request->input('permissions'));

            $status = 'success';
            $message = 'Role created successfully';

        } catch (\Throwable $th) {

            $status = 'error';
            $message = 'Something went wrong';
        }

        return redirect()->route('role.index')->with($status, $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
