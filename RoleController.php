<?php

namespace App\Http\Controllers;

// use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $setPermissions = Permission::all();
        return view('roles.create',compact('setPermissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'name' => 'required',
            'guard_name' => 'required',
            'permissions.*' => 'required|exists:permissions,id'
       ]);

       $role = Role::create($validated);

       if(!empty($validated['permissions'])) {
            $role->permissions()->attach($validated['permissions']);
       }
     
       return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {   
      
       $permissions = Permission::all();
       $rolePermission = $role->permissions()->pluck('id')->toArray();
        return view('roles.edit', compact(['role', 'permissions', 'rolePermission']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required',
            'guard_name' => 'required',
            'permissions.*' => 'required|exists:permissions,id'
       ]);

    //    $role = Role::create($validated);
       $role->update($validated);

       if(!empty($validated['permissions'])) {
            $role->permissions()->sync($validated['permissions']);
       }
     
       return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index');
    }
}
