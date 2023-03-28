<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = DB::table('applications')
        ->leftJoin('public.app_client as ac','applications.client_id','=','ac.id')
        // ->leftJoin('apps as app','applications.app_id','=','app.id')
        //  ->leftJoin('apps as app','applications.app_id','=', DB::raw('CAST(applications.app_id AS character varying)'))

        ->select('ac.name_np as clientName','applications.*')
        ->get();
      
    //    dd($applications);
    // $ids = [1, 2, 3];
    // $names = array_map(function ($id) {
    //     return DB::table('apps')->where('id', $id)->value('name_en');
    // }, $ids);
    
    // print_r($names);
    // dd($applications);
        
        return view('applications.index',compact('applications'))
        ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $app_client  = DB::table('public.app_client')
        ->select('id','name_en','name_np')
        ->where('status' ,'=','true')
        ->get(); 
        // dd($app_client);   
        $app = App::all();
        return view('applications.create',compact('app_client','app'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $app_id = $input['app_id'];
        $input['app_id'] = implode(",",$app_id); 
    
        Application::create($input);
        // dd($input);
    
        return redirect()->route('applications.index')
                        ->with('success','Applications assigned successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        $app=App::get();
        // $application = Application::all();
        // dd($application);
        $selectedAppIds = explode(',', $application->app_id);
        $app_client = DB::table('public.app_client')
        ->select('id','name_np')
        ->where('status' ,'=','true')
         ->get();   
        return view('applications.edit',compact('application','app_client','app','selectedAppIds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        $input = $request->all();

        $app_id = $input['app_id'];
        $input['app_id'] = implode(",",$app_id);
       $application->update($input);
        // dd($application);
    
        return redirect()->route('applications.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $application->delete();
    
        return redirect()->route('applications.index')
                        ->with('success','Product deleted successfully');
    }
}
