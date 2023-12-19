<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Url;
use Illuminate\Http\Request;
use App\Rules\UniqueAppName;


class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $app = App::all();
        // dd($app);
     
        return view('apps.index',compact('app'))
        ->with('i');
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
        try {
            $request->validate([
                'code' => 'required',
                'name_en' => ['required', new UniqueAppName],
                'name_np' => ['required', new UniqueAppName],
                'status' => 'required',
                'is_public' => '',
            ]);
    
            App::create($request->all());
    
            return redirect()->route('apps.index')->with('success', 'App List created successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }
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
            'is_public'=>'',
            
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
