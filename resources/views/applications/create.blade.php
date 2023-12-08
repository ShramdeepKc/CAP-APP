@extends('layout')
@section('content')
<div class="myWholeForm">
  <div class="formHead">
    <h2>App Assign</h2>
    <a class="btnB backB" href="{{ route('applications.index') }}">Back</a>
  </div>

  <form class="formP" action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <fieldset>
      <strong>Clients:</strong>
      <select name="client_id" id="client_id" required>
        @foreach ($app_client as $clients)
        <option value="{{ $clients->id }}">{{ $clients->name_np }}</option>
        @endforeach
      </select>
    </fieldset>

    <fieldset>
      <strong>App Name:</strong>
      @foreach ($app as $apps)
      <div>
        <input type="checkbox" id="app_{{ $apps->id }}" name="app_id[]" value="{{ $apps->id }}">
        <label for="app_{{ $apps->id }}">{{ $apps->name_np }}</label>
        <input type="checkbox" id="public_{{ $apps->id }}" name="is_public[{{ $apps->id }}][]" value="public">
        <label for="public_{{ $apps->id }}">PublicApp </label>
      </div>
      @endforeach
    </fieldset>

    <fieldset>
      <button type="submit" class="btnB submitB">सुरक्षित गर्नुहोस</button>
    </fieldset>
  </form>
</div>
@endsection
