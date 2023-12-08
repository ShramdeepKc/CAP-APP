<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL as FacadesURL;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $url_segment = url('/');
        $ss = str_replace('http://','',$url_segment);
        $subdomain = explode('.',$ss);
        // $check_url = DB::table('maps')
        $check_url = DB::table('maps')
        ->where('c_url','=',$url_segment)
        ->Orwhere('url','=',$url_segment)
        ->first();
        // $title = ''; // Set a default value
        // dd($url_segment,$check_url);
        if(!empty($check_url)){

            $clientId = $check_url->client_id;
          
            $clientCode = DB::table('vw_app_clientwise_setting')->where(['setting_id'=>196,'client_id'=>$clientId])->first();
            $data['clientInfo'] = DB::table('vw_mst_federal_hierarchy as t1')
            ->leftjoin('vw_mst_federal_hierarchy as t2', 't2.id', '=', 't1.parent_id')
            ->leftjoin('vw_mst_federal_hierarchy as t3', 't3.id', '=', 't2.parent_id')
            ->select('t1.code','t1.id as mun_vdc_id', 't1.name_np as mun_vdc','t1.name_en as mun_vdc_en', 't2.name_np as district','t2.name_en as district_en', 't3.name_np as province','t3.name_en as province_en',DB::raw("(case when t1.federal_level_type_id >=5 then 'नगर कार्यपालिकाको कार्यालय' else 'गाउँ कार्यपालिकाको कार्यालय' end) as office_type") ,DB::raw("(case when t1.federal_level_type_id >=5 then 'Municipal Executive Office' else 'Village Executive Office' end ) as office_type_en"))
            ->where(['t1.code' => $clientCode->combo_value] )
            ->get();

            if($subdomain[0]=='core'){
                $data['url'] =DB::table('urls')
                ->leftJoin('apps as app','urls.app_id','=','app.id')
                ->select('urls.*','app.name_en as appName')
                ->where('urls.client_id',$clientId)                 
                ->get();

                $data['title'] = "स्थानीय तह कार्यसम्पादन पोर्टल";
            
            } else {
                $data['url'] =DB::table('urls')
                ->leftJoin('apps as app','urls.app_id','=','app.id')
                ->leftJoin('applications as ap','app.id','=','ap.app_id')
                ->select('urls.*','app.name_en as appName','ap.is_public')
                ->where('urls.client_id',$clientId)   
                ->where('ap.is_public',true)                 
                ->get();

               $data['title'] = "स्थानीय तह सेवाग्राही पोर्टल";
            }
            
        }  else {
            $data['url'] =DB::table('urls')
            ->leftJoin('apps as app','urls.app_id','=','app.id')
            ->select('urls.*','app.name_en as appName')     
            ->distinct('app_id')     
            ->get();
            $data['title'] = "स्थानीय तह सेवाग्राही पोर्टल";
        }
        return view('welcome',$data);
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
    public function show($url)
    {
        $urlDetails = Url::where('app_url', $url)->first();
        return redirect()->route('welcome', compact('urlDetails'));
        // dd($url);
        
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
