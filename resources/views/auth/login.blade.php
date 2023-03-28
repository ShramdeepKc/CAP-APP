<link rel="stylesheet" href="{{asset('/css/style.css')}}" />
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
<x-guest-layout>
    <div class="container1">
        <div class="cards">
            <div class="card-content1">
                <div class="loginCard-heading">
                    <!-- <h2 class="login-text">Kathmandu Metropolitan City</h2> -->
                    <div class="head-title">
                        <img src="images/new-govt-logo.png" width="80" height="70" class="logo">
                        <div class="mun-title text-black">
                            <h2 class="text-center"> {{@$clientInfo[0]->mun_vdc}}</h2>
                            <h4 class="text-center">{{@$clientInfo[0]->office_type}}</h4>
                            <h5 class="text-center">{{@$clientInfo[0]->province}}</h5>
                           
                        </div>
                    </div>
                </div>

                <!-- <h1 class="text-center">{{@$clientInfo[0]->mun_vdc}}</h1>
            <h2 class="text-center"> {{@$clientInfo[0]->office_type}}</h2>
            <h2 class="text-center">{{@$clientInfo[0]->province}}</h2> 
            <h1 class="text-center">{{@$clientInfo[0]->district}}</h1> -->
                <x-slot name="logo">
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                </x-slot>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('login') }}" class="clear-both">
                    @csrf
                    <div class="text-fields-btn">
                        <div class="textField">
                            <div class="Icon"><img class="login-icon" src="images/iconUser.png" alt="user name"></div>
                            <div class="usernameText"><input type="email" name="email" placeholder="Email" id="email"
                                    autofocus></div>
                        </div>
                        <div class="textField">
                            <div class="Icon"><img class="login-icon" src="images/iconPassword.png" alt="user name">
                            </div>
                            <div class="usernameText"><input type="password" placeholder="Password" id="password"
                                    name="password" autocomplete="current-password" ></div>
                        </div>
                        <div class="textField">
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                            @endif
                        </div>
                        
                        <button class="login-button"><i class="fa fa-sign-in" aria-hidden="true"></i>
                        {{ __('Login') }}</button>
                        <div class="back-button">
                            <a href="/">Back</a>
                        </div>
                    </div>

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
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>