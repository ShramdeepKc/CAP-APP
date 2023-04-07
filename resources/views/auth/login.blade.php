<!-- previous css
<link rel="stylesheet" href="{{asset('/css/style.css')}}" /> -->
<!-- puskar css pWelcome -->
<link rel="stylesheet" href="{{asset('css/puskar.css')}}" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <x-guest-layout>
    <div class="guestLoginPage">
    <div class="loginStuff">
    <div class="loginHeader">
        <img src="images/new-govt-logo.png" width="80" height="70" class="logo">
        <div class="mun-title">
          <h2 class="text-center">{{@$clientInfo[0]->mun_vdc}}</h2>
          <h4 class="text-center">{{@$clientInfo[0]->office_type}}</h4>
          <h5 class="text-center">{{@$clientInfo[0]->district}}</h5>
          <h5 class="text-center">{{@$clientInfo[0]->province}}</h5>
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

    <form method="POST" action="{{ route('login') }}" class="loginForm">
    @csrf
      <fieldset>
        <img class="login-icon" src="images/iconUser.png" alt="user name">
        <input type="email" name="email" placeholder="Email" id="email" autofocus>
      </fieldset>

      <fieldset>
        <img class="login-icon" src="images/iconPassword.png" alt="user name">
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
                          <!-- Email Address -->
                    <!-- <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <<div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div> -->

                    <!-- Remember Me -->
                    <!-- <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button> -->
                    <!-- </div> -->
                