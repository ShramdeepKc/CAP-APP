@extends('layout')
@section('content')

<div class="myWholeForm">
  <div class="formHead">
    <h2>{{ __('public.Client') }} {{ __('public.Url') }} {{ __('public.Assign') }} </h2>
    <a class="btnB backB" href="{{route('map.index')}}">{{ __('public.Back') }}</a>
  </div>
 
  <form class="formP" action="{{ route('map.store') }}" method="POST">
    @csrf
    <fieldset>
      <strong>{{ __('public.Client') }}  :</strong>
      <select name="client_id" id="client_id">
        @foreach ($app_client as $clients)
          <option value="{{$clients->id}}">{{$clients->name_en}}</option>
        @endforeach
      </select>
    </fieldset>
    
    <fieldset>
      <strong>{{ __('public.Code') }}  :</strong>
      <input type="text" name="code" class="form-control" placeholder="App Url" required >
    </fieldset>
    
    <fieldset>
      <strong>{{ __('public.Public') }} {{ __('public.Url') }}   :</strong>
      <input type="text" name="url" class="form-control" placeholder="App Public Url" required >
    </fieldset>
    <fieldset>
      <strong>{{ __('public.Core') }} {{ __('public.Url') }} :</strong>
      <input type="text" name="c_url" class="form-control" placeholder="App Core Url" required >
    </fieldset>
    
    <fieldset>
      <button type="submit" class="btnB submitB">{{ __('public.Add') }}</button>
    </fieldset>
  </form>
</div>
@endsection