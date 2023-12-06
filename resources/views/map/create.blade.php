@extends('layout')
@section('content')

<div class="myWholeForm">
  <div class="formHead">
    <h2>Client Url Assign</h2>
    <a class="btnB backB" href="{{route('map.index')}}">Back</a>
  </div>
 
  <form class="formP" action="{{ route('map.store') }}" method="POST">
    @csrf
    <fieldset>
      <strong> ग्राहकहरु:</strong>
      <select name="client_id" id="client_id">
        @foreach ($app_client as $clients)
          <option value="{{$clients->id}}">{{$clients->name_en}}</option>
        @endforeach
      </select>
    </fieldset>
    
    <fieldset>
      <strong>कोड :</strong>
      <input type="text" name="code" class="form-control" placeholder="App Url" required >
    </fieldset>
    
    <fieldset>
      <strong>एप Public URL(English)  :</strong>
      <input type="text" name="url" class="form-control" placeholder="App Public Url" required >
    </fieldset>
    <fieldset>
      <strong>एप Core URL(English)  :</strong>
      <input type="text" name="c_url" class="form-control" placeholder="App Core Url" required >
    </fieldset>
    
    <fieldset>
      <button type="submit" class="btnB submitB">सिर्जना गर्नुहोस्</button>
    </fieldset>
  </form>
</div>
@endsection