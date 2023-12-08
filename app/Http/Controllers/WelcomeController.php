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
                $data['about']="स्थानीय तहको आन्तरिक कार्यसम्पादन तथा सेवाप्रवाह गर्ने प्रयोजनका लागि यो स्थानीय तह कार्यसम्पादन पोर्टल कार्यान्वयनमा ल्याएको छ । जसले सेवाग्रहीलाई स्थानीय तहको आन्तरिक कार्यसम्पादनका साथै प्रदान गर्नुपर्ने सेवाप्रवाहलाई सहज रूपमा प्रदान गर्नको निमित्त सहायता प्रदान गर्नेछ । यस पोर्टलको माध्यमबाट स्थानीय तह, मातहतका कार्यालयहरुले एकीकृत माध्यमबाट आन्तरिक कार्यसम्पादन तथा सेवाप्रवाहलाई छिटो, छरितो एवं प्रभावकारीरुपमा गर्न सक्नेछन् । ";
            
            } else {
                $data['url'] =DB::table('urls')
                ->leftJoin('apps as app','urls.app_id','=','app.id')
                ->leftJoin('applications as ap','app.id','=','ap.app_id')
                ->select('urls.*','app.name_en as appName','ap.is_public')
                ->where('urls.client_id',$clientId)   
                ->where('ap.is_public',true)                 
                ->get();

               $data['title'] = "स्थानीय तह सेवाग्राही पोर्टल";
               $data['about']="स्थानीय तहले सेवाग्राहीलाई सुनिश्चित, निर्भर, र अधिक पहुँचयोग्य सेवाहरू एकीकृत माध्यमबाट प्रदान गर्नका लागि सेवाग्राही पोर्टल कार्यान्वयनमा ल्याएको छ। यो पोर्टलमा नागरिक/सेवाग्राहीले विभिन्न सेवाहरूमा सहजरूपमा आफ्नो आवश्यकता अनुरुप प्राप्तिको पहुँच गराउँछ । सेवाग्राही पोर्टलहरूले सेवाग्राहीलाई स्थानीय तह तथा मातहतबाट सेवाहरू प्राप्तिमा टेवा पुर्‍याउँछ।";
            }
            
        }  else {
            $data['url'] =DB::table('urls')
            ->leftJoin('apps as app','urls.app_id','=','app.id')
            ->select('urls.*','app.name_en as appName')     
            ->distinct('app_id')     
            ->get();
            $data['title'] = "स्थानीय तह सेवाग्राही पोर्टल";
            $data['about']="स्थानीय तहले सेवाग्राहीलाई सुनिश्चित, निर्भर, र अधिक पहुँचयोग्य सेवाहरू एकीकृत माध्यमबाट प्रदान गर्नका लागि सेवाग्राही पोर्टल कार्यान्वयनमा ल्याएको छ। यो पोर्टलमा नागरिक/सेवाग्राहीले विभिन्न सेवाहरूमा सहजरूपमा आफ्नो आवश्यकता अनुरुप प्राप्तिको पहुँच गराउँछ । सेवाग्राही पोर्टलहरूले सेवाग्राहीलाई स्थानीय तह तथा मातहतबाट सेवाहरू प्राप्तिमा टेवा पुर्‍याउँछ।";
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
