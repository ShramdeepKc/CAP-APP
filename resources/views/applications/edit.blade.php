@extends('layout')
@section('content')
<div class="myWholeForm">
  <div class="formHead">
    <h2>App Assign</h2>
    <a class="btnB backB" href="{{ route('applications.index') }}">Back</a>
  </div>

  <form class="formP" action="{{ route('applications.update', $application->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <fieldset>
      <strong>Clients:</strong>
      <select name="client_id" id="client_id" required disabled>
        @foreach ($app_client as $clients)
        <option value="{{ $clients->id }}"  {{ $clients->id == $application->client_id ? 'selected' : '' }} >
          {{ $clients->name_np }}
        </option>
        @endforeach
      </select>
    </fieldset>

    <fieldset>
    <strong>App Name:</strong>
    <div>
        <input type="checkbox" id="app_{{ $application->id }}" name="app_id[]" value="{{ $app->id }}" checked>
        <label for="app_{{ $application->id }}">{{ $app->name_en }}</label>
        <input type="checkbox" id="public_{{ $application->id }}" name="is_public" value="public" {{ $application->is_public == 'public' ? 'checked' : '' }}>
        <label for="public_{{ $application->id }}">PublicApp</label>
    </div>
</fieldset>

    <fieldset>
      <button type="submit" class="btnB submitB">सुरक्षित गर्नुहोस</button>
    </fieldset>
  </form>
</div>
@endsection