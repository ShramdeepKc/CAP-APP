<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(){
        $users = User::all();
        return view('users.index',compact('users'))
        ->with('i');
    }
    public function show(User $user)
    {
        $roles = Role::all();
        $client =  DB::table('public.app_client')
                     ->where('status' ,'=','true')
                    ->get();
                    // dd($client);
        $permissions = Permission::all();

        return view('users.role', compact('user', 'roles', 'permissions','client'));
    }

    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('message', 'Role exists.');
        }

        $user->assignRole($request->role);
        return back()->with('message', 'Role assigned.');
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role removed.');
        }

        return back()->with('message', 'Role not exists.');
    }

    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('message', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('message', 'Permission added.');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked.');
        }
        return back()->with('message', 'Permission does not exists.');
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('admin')) {
            return back()->with('message', 'you are admin.');
        }
        $user->delete();

        return back()->with('message', 'User deleted.');
    }
    

    public function edit(User $user)
    {
        
        return view('users.edit',compact('user'));
    }
    public function update(Request $request , User $user)
    {
      $validatedData =  $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required|same:password',
        ]);
        
    // if($validatedData['password'] !== $validatedData['password_confirmation']) {
    //     return redirect()->back()->withErrors(['password_confirmation' => 'Passwords do not match'])->withInput();
    // }

        
    $user->update([
        'password' => Hash::make($validatedData['password']),
    ]);

  

    
        // $user->update($request->all());
    
        return redirect()->route('users.index')
                       
                        ->with('success','Password updated successfully');
        
        
    }

}
