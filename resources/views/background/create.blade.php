@extends('layout')
@section('content')

<div class="myWholeForm">
  <div class="formHead">
    <h2>{{ __('public.Background') }} </h2>
    <a class="btnB backB" href="{{route('homes.index')}}">{{ __('public.Back') }} </a>
  </div>
 
  <form class="formP" action="{{ route('background.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <fieldset>    
      <strong> ग्राहक:</strong>
      @if(auth()->id() == 1)
        <select name="client_id" id="client_id">
        @foreach ($app_client as $clients)
          <option value="{{$clients->id}}">{{$clients->name_np}}</option>
        @endforeach
        </select>
      @else
        <input type="text" name="client_id" value="{{$user = auth()->user()->client_id}}"
          hidden>{{$user = auth()->user()->name}}</input>
      @endif
    </fieldset>

    <fieldset>
      <strong>{{ __('public.Background') }} </strong>
      <input type="file" name="image">
    </fieldset>

    <fieldset>
      <button type="submit" class="btnB submitB">{{ __('public.Upload') }} </button>
    </fieldset>
  </form>
@endsection
</div>