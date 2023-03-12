<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
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
            ->distinct('app_id')
            ->get();
          
            
        }
        else{
            
            $url = DB::table('urls')
        ->leftJoin('public.app_client as ac','urls.client_id','=','ac.id')
        ->leftJoin('apps as app','urls.app_id','=','app.id')
        // ->leftJoin('applications','urls.app_id','=','applications.id')
        ->select('urls.*','ac.name_en as clientName','app.name_en as appName')
            ->where('urls.client_id', '=', $client_id)
            ->distinct('app_id')

            ->get();
             

        }
        return view('homes.index',compact('url'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
