@extends('layout')
@section('content')

<div class="myWholeForm">
  <div class="formHead">
    <h2>पृष्ठभूमि</h2>
    <a class="backB" href="{{route('homes.index')}}">
      Back
    </a>
  </div>

  <form class="formP" action="{{ route('background.store') }}" method="POST" enctype="multipart/form-data">
    @csrf      
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

    <fieldset>
      <strong>Background Image:</strong>
      <input type="file" name="image">
    </fieldset>

    <fieldset>
      <button type="submit" class="btn btn-primary">अपलोड गर्नुहोस्</button>
    </fieldset>
  </form>
@endsection
</div>