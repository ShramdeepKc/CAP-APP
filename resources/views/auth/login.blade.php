<!-- puskar css pWelcome -->
<link rel="stylesheet" href="{{asset('css/puskar.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

<x-guest-layout>

    <div class="guestLoginPage">
      <div class="loginStuff">
        <div class="loginHeader">
          <img src="images/new-govt-logo.png" class="emblemLogin">
          <div class="munTitle">
            <h3>{{@$clientInfo[0]->mun_vdc}}</h3>
            <h4>{{@$clientInfo[0]->office_type}}</h4>
            <h5>{{@$clientInfo[0]->district}}ㅤ{{@$clientInfo[0]->province}}</h5>
            <h5></h5>
          </div>
        </div>

    <x-slot name="logo">
      <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
      </a>
    </x-slot>

    <!-- Session Status -->
      <x-auth-session-status class="mb-4" :status="session('status')" />
    <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST"  id="login-form" action="{{ route('login') }}" class="loginForm">
    @csrf
      <fieldset>
        <img class="login-icon" src="images/iconUser.png" alt="user name icon">
        <input type="email" name="email" placeholder="Email" id="email" value="{{ old('email') }}"  autofocus>
      </fieldset>

      <fieldset>
        <img class="login-icon" src="images/iconPassword.png" alt="user password icon">
        <input type="password" placeholder="Password" id="password" name="password" autocomplete="current-password" >
      </fieldset>

      <fieldset>
    @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
          {{ __('Forgot your password?') }}
        </a>
    @endif
      </fieldset>
      
      <fieldset>
      <button class="loginBtn">
        <i class="fa fa-sign-in" aria-hidden="true"></i>
        {{ __('Login') }}
      </button>
      <button class="backBtn">
        <i class="fas fa-arrow-circle-left"></i>
        <a href="/">Back</a>
      </button>
      </fieldset>
    </form>
  </div> <!-- .loginstuff -->
</div> <!-- .guestLoginPage -->
</x-guest-layout>  
 

