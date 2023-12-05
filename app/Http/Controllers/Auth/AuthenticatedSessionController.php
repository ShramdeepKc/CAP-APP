<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $url_segment = url('/');
        $data = [];
        // $check_url = DB::table('maps')
        $check_url = DB::table('maps')
        ->where('url','=',$url_segment)
        ->first();
        // dd($url_segment,$check_url);
        if(!empty($check_url)){

            $clientId = $check_url->client_id;
            // dd($clientId);
            $clientCode = DB::table('vw_app_clientwise_setting')->where(['setting_id'=>196,'client_id'=>$clientId])->first();
            // dd($clientCode);

            $data['clientInfo'] = DB::table('vw_mst_federal_hierarchy as t1')
            ->leftjoin('vw_mst_federal_hierarchy as t2', 't2.id', '=', 't1.parent_id')
            ->leftjoin('vw_mst_federal_hierarchy as t3', 't3.id', '=', 't2.parent_id')
            ->select('t1.code','t1.id as mun_vdc_id', 't1.name_np as mun_vdc','t1.name_en as mun_vdc_en', 't2.name_np as district','t2.name_en as district_en', 't3.name_np as province','t3.name_en as province_en',DB::raw("(case when t1.federal_level_type_id >=5 then 'नगर कार्यपालिकाको कार्यालय' else 'गाउँ कार्यपालिकाको कार्यालय' end) as office_type") ,DB::raw("(case when t1.federal_level_type_id >=5 then 'Municipal Executive Office' else 'Village Executive Office' end ) as office_type_en"))
            ->where(['t1.code' => $clientCode->combo_value])
            ->get();
        } 
        return view('auth.login',$data);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
