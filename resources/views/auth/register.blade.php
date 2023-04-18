@extends('layout')
@section('content')

<div class="myWholeForm">
  <div class="formHead">
    <h2>Register page</h2>
    <a class="btnB backB" href="{{route('homes.index')}}">Back</a>
    <x-slot name="logo">
      <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
      </a>
    </x-slot>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
  </div>
  
  <form class="formP" method="POST" action="{{ route('register') }}">
    @csrf
    <fieldset>
      <label for="clients">Clients:</label>
      <select name="client_id" id="clients">
      @foreach ($client as $clients)
        <option value="{{$clients->id}}">{{$clients->name_en}}</option>
      @endforeach
      </select>
    </fieldset>
    
    <!-- Name -->
    <fieldset>
      <x-label for="name" :value="__('Name:')"/>
      <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
    </fieldset>
    
    <!-- Email Address -->
    <fieldset>
      <x-label for="email" :value="__('Email: ')" />
      <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
    </fieldset>

    <!-- Password -->
    <fieldset>
      <x-label for="password" :value="__('Password: ')" />      
      <x-input id="password" class="form-control"
                             type="password"
                             name="password"
                             required autocomplete="new-password" />
    </fieldset>
    
    <!-- Confirm Password -->
    <fieldset>
      <x-label for="password_confirmation" :value="__('Confirm Password:')" />
      <x-input id="password_confirmation" class="form-control"
                            type="password"
                                name="password_confirmation" required />
    </fieldset>

    <fieldset id="spfieldregister">
      <button class="btnB createB">{{ __('Register') }}</button>
      <a class="btnB submitB" href="{{ route('login') }}">{{ __('Already registered?') }}</a>
    </fieldset>
  </form>
</div>
@endsection
