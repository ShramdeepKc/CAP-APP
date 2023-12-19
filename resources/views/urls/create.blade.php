<?php
 use App\Helpers\AppHelpers;
?>
@extends('layout') 
@section('content')

 
<div class="myWholeForm">
  <div class="formHead">
    <h2>{{ __('public.Url') }}{{ __('public.List') }}</h2>
    <a class="btnB backB" href="{{ route('urls.index') }}">
      Back
    </a>
  </div>

<form class="formP" action="{{ route('urls.store') }}" class="nepali-font" method="POST" enctype="multipart/form-data" >
  @csrf
  <fieldset>
    <strong>{{ __('public.Code') }}:</strong>
    <input type="text" name="code" class="type_eng" placeholder="कोड" required>
  </fieldset>

  <fieldset>
    <strong> {{ __('public.Client') }}:</strong>
    @if(auth()->id() == 1) 
      <select name="client_id" id="client_id"  class="type_nep" required>
      @foreach ($app_client as $clients)
        <option value="{{$clients->id}}" >{{$clients->name_np}}</option>
      @endforeach
      </select>
    @else
      <input type="text"   name="client_id" value="{{$user = auth()->user()->client_id}}" hidden>
        {{$user = auth()->user()->name}}
      </input>
    @endif
  </fieldset>
  
  <fieldset>
    <strong> {{ __('public.App') }} {{ __('public.Name') }}:</strong>
    @if(auth()->id() == 1)
      <select name="app_id" id="app_id" required>
      @foreach ($app as $apps)
        <option value="{{$apps->id}}" class="form-control type_nep" >{{$apps->name_np}}</option>
      @endforeach
      </select>
      @else
      <select name="app_id" id="app_id" required>
      @foreach($appList as $apps)
        <option value="{{ $apps->id }}"> {{ $apps->name_np}}</option>
      @endforeach  
      </select>
    @endif
  </fieldset>    
  
  <fieldset>
    <strong>{{ __('public.App') }}{{ __('public.Url') }}  :</strong>
    <input type="text" name="app_url" placeholder="App Url" required >
  </fieldset>   
  
  <fieldset>
    <strong>{{ __('public.Description') }} : </strong>
    <textarea class="type_nep" id="description" name="description" rows="4" maxlength="15" required></textarea>
  </fieldset>
  
  <fieldset>
    <strong>{{ __('public.Logo') }}:</strong>
    <input type="file" name="image" class="type_nep" placeholder=" Upload image" required>
  </fieldset>    
  
  <fieldset>
    <button type="submit" class="btnB submitB">{{ __('public.Add') }}</button>
  </fieldset>
</form>
</div>
<script>
$(document).ready(function() {
    // Function to set the description based on the selected app name
    function setDescription() {
        var appName = $('#app_id').children("option:selected").text();
        $('#description').val('' + appName);
    }

    // Set description for initially selected app on page load
    setDescription();

    // Listen for changes in the app name select field
    $('#app_id').change(function() {
        // Update description when app selection changes
        setDescription();
    });
});
</script>

@endsection