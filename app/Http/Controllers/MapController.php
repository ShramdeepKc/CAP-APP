<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $map = DB::table('maps as map')
        ->leftJoin('public.app_client as acc','map.client_id','=','acc.id')
        ->select('map.*','acc.name_en as clientName')
        ->get();
        // dd($map);

        return view('map.index',compact('map'))
        ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $app_client = DB::table('public.app_client')
        ->select('id','name_en')
        ->where('status' ,'=','true')
         ->get();
        return view('map.create',compact('app_client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id'=>'required',
            'code'=>'required',
            'url' => 'required',  
            'c_url'=>'required', 
            
        ]);
   
     Map::create($request->all());
     
        return redirect()->route('map.index')
                        ->with('success','url mapped successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function show(Map $map)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function edit(Map $map)
    {
        $app_client = DB::table('public.app_client')
        ->select('id','name_en')
        ->where('status' ,'=','true')
         ->get();
        return view('map.edit',compact('map','app_client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Map $map)
    {
        $request->validate([
            'client_id' => 'required',
            'code'=>'required',
            'url'=>'required',
            'c_url'=>'required',
            
            
        ]);
    
        $map->update($request->all());
    
        return redirect()->route('map.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function destroy(Map $map)
    {
        $map->delete();
    
        return redirect()->route('map.index')
                        ->with('success','Product deleted successfully');
    }
}
