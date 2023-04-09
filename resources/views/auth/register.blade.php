@extends('layout')

@section('content')


    
   <div class="card" style="padding:1rem;">
    <h2 class="register-head">
        REGISTER PAGE
    </h2>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf


            <div>
           <label for="clients"  >Clients:</label>
      <select name="client_id" id="clients">
      @foreach ($client as $clients)
              <option value="{{$clients->id}}">{{$clients->name_en}}</option>
              @endforeach
      </select>
            </div>


            <!-- Name -->
            <div class="col-xs-5 col-sm-5 col-md-5">
                <x-label for="name" :value="__('Name:')"  />

                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="col-xs-5 col-sm-5 col-md-5">
                <x-label for="email" :value="__('Email: ')" />

                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="col-xs-5 col-sm-5 col-md-5">
                <x-label for="password" :value="__('Password:')" />

                <x-input id="password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="col-xs-5 col-sm-5 col-md-5">
                <x-label for="password_confirmation" :value="__('Confirm Password:')" />

                <x-input id="password_confirmation" class="form-control"
                                type="password"
                                name="password_confirmation" required />
            </div><br>

            <button class="login-button  btn btn-success">
                {{ __('Register') }}
            </button>
            <div class="row">
              <div style="margin-left:1rem;" class="flex items-center justify-end mt-4"   >
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <div class="return-button btn btn-danger">
                    <a style="color:white" href="{{route('homes.index')}}">Back</a>
                </div>
              </div> 
          </div>
          </form>
        </div>
 

@endsection
