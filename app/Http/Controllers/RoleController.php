<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
   public function index(){
      // $permissions=Permission::all();
      // dd($permissions);
      $roles = Role::all(); 
    return view('roles.index', compact('roles'));
    //dd($roles);
    

   }



   public function create(){
      $permissions=Permission::all();
      // dd($permissions);
      $role=Role::all();
      // dd($role);
    return view('roles.create',compact('permissions','role'));
   
   }



   public function store(Request $request){
      // dd($request->all());
      $validated = $request->validate(['name'=>['required','min:3']]);
       Role::create($validated);
      return redirect('roles');
      // dd($request);

   }
   public function edit(Role $role){
      $permissions = Permission::all();
      // $role = Role::all();
      // dd($role);
      // dd($permissions);
      return view('roles.edit',compact('role','permissions'));
   }
   public function update(Request $request,Role $role){
      $validated = $request->validate(['name'=>'required']);
      $role->update($validated);
      return redirect('roles');
   }
   public function destroy(Role $role){
      $role->delete();
      return back();
   }
   public function givePermission(Request $request, Role $role){
      if($role->hasPermissionTo($request->permission)){
         return back()->with('message','permission exists');
      }
      $role->givePermissionTo($request->permission);
      {
         return back()->with('message','permission added');
      }

   }
   public function revokePermission(Role $role, Permission $permission)
   {
       if($role->hasPermissionTo($permission)){
           $role->revokePermissionTo($permission);
           return back()->with('message', 'Permission revoked.');
       }
       return back()->with('message', 'Permission not exists.');
   }

}
