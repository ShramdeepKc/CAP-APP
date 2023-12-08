@extends('layout')
@section('content')

<div class="myWholeForm">
  <div class="formHead">
    <h2>Client Url Assign</h2>
    <a class="btnB backB" href="{{route('map.index')}}">Back</a>
  </div>
  <form class="formP" action="{{ route('map.update',$map->id) }}" method="POST">
    @csrf
    @method('PUT')

    <fieldset>
    <strong> ग्राहकहरु:</strong>
      <select name="client_id" id="client_id" >
        @foreach ($app_client as $clients)
        <option value="{{$clients->id}}"  {{$clients->id==$map->client_id ? 'selected':''}} >{{$clients->name_en}}</option>
        @endforeach
      </select> 
    </fieldset>

    <fieldset>
    <strong>कोड :</strong>
    <input type="text" name="code" class="form-control" placeholder="App Url" value="{{$map->code}}" required >
    </fieldset>

    <fieldset>
    <strong>Public URL (English)  :</strong>
    <input type="text" name="url" class="form-control" placeholder="Public Url" value="{{$map->url}}" required >
    </fieldset>        
    <fieldset>
    <strong>Core URL (English)  :</strong>
    <input type="text" name="c_url" class="form-control" placeholder="Core Url" value="{{$map->c_url}}" required >
    </fieldset>        
    
    <fieldset>
      <button type="submit" class="btnB submitB">सिर्जना गर्नुहोस्</button>
    </fieldset>
  </form>
            
       


@endsection