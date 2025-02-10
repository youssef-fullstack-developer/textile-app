<?php

namespace App\Http\Controllers;

use App\Models\PermissionsFam;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $list = User::orderBy('id', 'desc')->get();
        return view('user.index', compact('list'));
    }

    public function create()
    {
        // Get all roles and permissions

        $permissionsArray = array();
        $roles = Role::all();
        $permissions = Permission::all();
        $families = PermissionsFam::all();
        return view('user.add', compact('roles', 'permissions', 'families', 'permissionsArray'));
    }

    /**
     * Store a newly created user with roles and permissions.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
//            'roles' => 'array', // Expect an array of roles
            'permissions' => 'array', // Permissions are optional
        ]);

        // Create the user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Assign roles to the user
//        $user->assignRole($validatedData['roles']);
        // Assign permissions if provided
        if (!empty($validatedData['permissions'])) {
            $user->givePermissionTo($validatedData['permissions']);
        }

        return redirect('user')->with('message', 'Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $id = $request->integer("id");
        $item = User::find($id);
        $status = true;
        if (!$item) {
            $status = false;
        }
        return response()->json(['status' => $status, 'item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);
        $permissionsArray = $item->getAllPermissions()->pluck('name')->toArray();
        $roles = Role::all();
        $permissions = Permission::all();
        $families = PermissionsFam::all();
        return view('user.add', compact('item', 'roles', 'permissions', 'families', 'permissionsArray'));
    }


    /**
     * Update the specified user with roles and permissions.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|string',
//            'roles' => 'sometimes|array', // Roles are optional
            'permissions' => 'sometimes|array', // Permissions are optional
        ]);

        // Find the user
        $user = User::findOrFail($id);

        // Update user details
        if (!empty($validatedData['name'])) {
            $user->name = $validatedData['name'];
        }
        if (!empty($validatedData['email'])) {
            $user->email = $validatedData['email'];
        }
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        // Sync roles if provided
//        if (!empty($validatedData['roles'])) {
//            $user->syncRoles($validatedData['roles']);
//        }

//        dd($user->getAllPermissions());
//        dd($validatedData['permissions']);
//        dd($user->getAllPermissions());
        // Sync permissions if provided
        if (!empty($validatedData['permissions'])) {
            $user->syncPermissions($validatedData['permissions']);
        }

//        return response()->json(['message' => 'User updated successfully', 'user' => $user], 200);
        return redirect('user')->with('message', 'Updated successfully');
    }

    /**
     * Remove the specified user.
     */
    public function destroy($id)
    {
        // Find the user
        $user = User::findOrFail($id);
        // Delete the user
        $user->delete();
        return redirect('user')->with('message', 'deleted successfully');
    }


//if ($user->can('publish articles')) {
//    // User can publish articles
//}
//@can('edit')
//    <a href="/articles/edit">Edit Articles</a>
//@endcan
}
