<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        
        $client = DB::table('public.app_client')
        ->select('id','name_en')
        ->where('status' ,'=','true')
        ->get(); 
        
      
        return view('auth.register',compact('client'));
       
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        
        $request->validate([
            'client_id'=>['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $clientInfo = DB::table('public.app_client')->where('id', $request->client_id)->first();


        $user = User::create([
            'client_id' => $request->client_id,
            'name' => $clientInfo->name_en,
            'name_np' => $clientInfo->name_np,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // dd($user);

        event(new Registered($user));

        // Auth::login($user);

        return redirect()->route('users.index');
    }
}
