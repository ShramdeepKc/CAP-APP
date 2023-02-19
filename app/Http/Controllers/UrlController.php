<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //    $url = DB::table('public.app_client as t1')
    //    ->leftJoin('cap.urls as t2','t1.id','=','t2.client_id')
    //    ->leftJoin('cap.apps as t3','t2.app_id','=','t3.id')
    //    ->get();
       
    //    dd($url);
        
       


        // $url = Url::join('public.app_client','urls.client_id','=' ,'public.app_client.id')
        //             ->get();


        $url = Url::Join('public.app_client','urls.client_id','=','public.app_client.id')
                ->select('public.app_client.name_en','urls.id','urls.code','urls.client_id','urls.app_id','urls.app_url','urls.description','urls.image')
               
                ->get();
        // dd($url);


        // $url = Url::latest()->paginate(5);
       
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

        $app_client  = DB::table('public.app_client')
        ->select('id','name_en')
        ->where('status' ,'=','true')
        ->get(); 
        // dd($app_client);   
        $app = App::all();
        return view('urls.create',compact('app','app_client'));
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
