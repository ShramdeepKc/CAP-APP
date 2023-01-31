<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Url;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $app = App::latest()->paginate(5);
        // dd($app);
     
        return view('apps.index',compact('app'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('apps.create');
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
            'name_en' => 'required',
            'name_np'=>'required',
            'status' => 'required',
        ]);
    
     App::create($request->all());
     
        return redirect()->route('apps.index')
                        ->with('success','App List created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\App  $app
     * @return \Illuminate\Http\Response
     */
    public function show(App $app)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\App  $app
     * @return \Illuminate\Http\Response
     */
    public function edit(App $app)
    {
        return view('apps.edit', compact('app'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\App  $app
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, App $app)
    {
        $request->validate([
            'code'=>'required',
            'name_en' => 'required',
            'name_np'=>'required',
            'status' => 'required',
            
        ]);
    
        $app->update($request->all());
    
        return redirect()->route('apps.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\App  $app
     * @return \Illuminate\Http\Response
     */
    public function destroy(App $app)
    {
        $app->delete();
    
        return redirect()->route('apps.index')
                        ->with('success','Product deleted successfully');
    }
}
