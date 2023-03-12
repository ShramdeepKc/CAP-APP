<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Application;
use App\Models\Client;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Url;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use PhpParser\Node\Expr\Cast;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        
        $client_id = Auth::user()->client_id;

       
        if (auth()->id() == 1){
            $url = Url::join('public.app_client as ac','urls.client_id','=' ,'ac.id')
            ->leftJoin('apps as app','urls.app_id','=','app.id')
            ->select('ac.name_en as clientName','urls.id','urls.code','urls.client_id','urls.app_id','urls.app_url','urls.description','urls.image','app.name_en as appName')
            ->get();
          
            
        }
        else{
            
            $url = DB::table('urls')
        ->leftJoin('public.app_client as ac','urls.client_id','=','ac.id')
        ->leftJoin('apps as app','urls.app_id','=','app.id')
        // ->leftJoin('applications','urls.app_id','=','applications.id')
        ->select('urls.*','ac.name_en as clientName','app.name_en as appName')
            ->where('urls.client_id', '=', $client_id)
            ->get();
             

        }
    
        return view('urls.index',compact('url'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }
        
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        $client_id = Auth::user()->client_id;

        if (auth()->id() == 1){
        $app = App::all();
        $app_client  = DB::table('public.app_client')
        ->select('id','name_en')
          
        ->where('status' ,'=','true')
        ->get(); 
        return view('urls.create',compact('app','app_client'));
        
    
        }
        else{
            $app = App::all();
            $app_client  = DB::table('public.app_client')
            ->select('id','name_en')
            ->where('status' ,'=','true')
            ->get();

            // $selected_apps = DB::table('apps')
            // ->leftJoin('applications','apps.id','=','applications.app_id')
            // ->select('')



            // dd($app_client);
            // $selectedAppIds = explode(',', $application->app_id);
            $selected_apps = Application::where('client_id', $client_id)->first();
            $selApp = explode(',',$selected_apps->app_id);

            $appList = DB::table('apps')->whereIn('id',$selApp)->get();
            // dd($selected_apps);
            return view('urls.create',compact('app','app_client','selected_apps','appList'));
        }
      
  

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'code'=>'required',
            'client_id'=>'required',
            'app_id'=>'required',
            'app_url' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
        $input = $request->all();
       
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalName(); 
            //dd($image);
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Url::create($input);
     
        return redirect()->route('urls.index')
                        ->with('success','App List created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function show(Url $url)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function edit(Url $url)
    {
        $app=App::get();
        $app_client = DB::table('public.app_client')
        ->select('id','name_en')
        ->where('status' ,'=','true')
         ->get(); 
        return view('urls.edit',compact('url','app','app_client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Url $url)
    {
        $request->validate([
            'code'=>'required',
            
            'client_id'=>'required',
           
            'app_id'=>'required',
            'app_url' => 'required',
            'description' => 'required',
            
            
        ]);
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $url->update($input);
    
        
    
        return redirect()->route('urls.index')
                        ->with('success','URL updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy(Url $url)
    {
        $url->delete();
    
        return redirect()->route('urls.index')
                        ->with('success','URL deleted successfully');
    }
}
