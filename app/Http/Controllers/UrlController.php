<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Url;
use Illuminate\Http\Request;


class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = Url::latest()->paginate(5);
        // dd($app);
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
        $app = App::get();
        return view('urls.create',compact('app'));
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
            'code'=>'required',
            'app_id'=>'required',
            'app_url' => 'required',
           
        ]);
    
     URL::create($request->all());
     
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
        return view('urls.edit',compact('url','app'));
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
            'app_id'=>'required',
            'app_url' => 'required',
            
            
        ]);
    
        $url->update($request->all());
    
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
