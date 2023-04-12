<?php
 use App\Helpers\AppHelpers;
?>
@extends('layout') 
@section('content')

 
<div class="myWholeForm">
  <div class="formHead">
    <h2>Url सूची</h2>
    <a class="btnB backB" href="{{ route('urls.index') }}">
      Back
    </a>
  </div>

<form class="formP" action="{{ route('urls.store') }}" class="nepali-font" method="POST" enctype="multipart/form-data" >
  @csrf
  <fieldset>
    <strong>कोड:</strong>
    <input type="text" name="code" class="type_nep" placeholder="कोड" required>
  </fieldset>

  <fieldset>
    <strong> ग्राहक:</strong>
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
    <strong> एप नाम:</strong>
    @if(auth()->id() == 1)
      <select name="app_id" id="app_id" required>
      @foreach ($app as $apps)
        <option value="{{$apps->id}}" class="form-control type_nep" >{{$apps->name_en}}</option>
      @endforeach
      </select>
      @else
      <select name="app_id" id="app_id" required>
      @foreach($appList as $apps)
        <option value="{{ $apps->id }}"> {{ $apps->name_en}}</option>
      @endforeach  
      </select>
    @endif
  </fieldset>    
  
  <fieldset>
    <strong>एप URL  :</strong>
    <input type="text" name="app_url" placeholder="App Url" required >
  </fieldset>   
  
  <fieldset>
    <strong>विवरण : </strong>
    <textarea class="type_nep" id="description" name="description" rows="4" maxlength="15" required></textarea>
  </fieldset>
  
  <fieldset>
    <strong>लोगो:</strong>
    <input type="file" name="image" class="type_nep" placeholder=" Upload image" required>
  </fieldset>    
  
  <fieldset>
    <button type="submit" class="btnB submitB">सुरक्षित गर्नुहोस </button>
  </fieldset>
</form>
</div>
@endsection