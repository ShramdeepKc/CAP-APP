<?php

namespace App\Http\Controllers;

use App\Models\App;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::latest()->paginate(5);
        $app = App::all();
        // dd($client);
        return view('clients.index',compact('client','app'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $app = App::all();
        return view('clients.create',compact('app'));
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
            'name_en' => 'required',
            'name_np'=>'required',
            'status' => 'required',
            'app_id'=>'required',
        ]);
        
    
     Client::create($request->all());
     
        return redirect()->route('clients.index')
                        ->with('success','Client List created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $app = App::all();
        return view('clients.edit',compact('client','app'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'code'=>'required',
            'name_en' => 'required',
            'name_np'=>'required',
            'status' => 'required',
            'app_id'=>'required',
            
        ]);
    
        $client->update($request->all());
    
        return redirect()->route('clients.index')   
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')
        ->with('success','Client deleted successfully');    
    }
}
