<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permission=Permission::all();
        return view('permission.index',compact('permission'))->with('i');
    }
    public function create(){

      
        return view('permission.create');
       }
       public function store(Request $request){
        $validated = $request->validate(['name'=>['required','min:3']]);
      Permission::create($validated);
        return redirect('permission');
  
     }
     public function edit(Permission $permission){
      return view('permission.edit',compact('permission'));
   }
   public function update(Request $request,Permission $permission){
      $validated = $request->validate(['name'=>'required']);
      $permission->update($validated);
      return redirect('permission');
   }
   public function destroy(Permission $permission){
      $permission->delete();
      return back();
   }

}
