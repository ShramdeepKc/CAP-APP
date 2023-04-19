
@extends('layout')
@section('content')
<div class="myWholeForm">
  <div class="formHead">
    <h2>App Assign</h2>
    <a class="btnB backB" href="{{route('applications.index')}}">Back</a>
  </div>

  <form class="formP" action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    <fieldset>
      <strong> Clients:</strong>
      <select name="client_id" id="client_id" required>
      @foreach ($app_client as $clients)
        <option value="{{$clients->id}}">{{$clients->name_np}}</option>
      @endforeach
      </select>
    </fieldset>
    
    <fieldset>
      <strong> App Name:</strong>
      <!-- <select name="app_id[]" id="app_id" multiple>
      @foreach ($app as $apps)
              <option value="{{$apps->id}}">{{$apps->name_en}}</option>
              @endforeach
      </select> -->
      <select class="js-example-basic-multiple" id="app_id" name="app_id[]" multiple="multiple" required>
        @foreach ($app as $apps)
        <option value="{{$apps->id}}">{{$apps->name_en}}</option>
        @endforeach
      </select>
    </fieldset>
    
    <fieldset>
      <button type="submit" class="btnB submitB">सुरक्षित गर्नुहोस</button>
    </fieldset>
  </form>
</div>
<script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });
</script>
@endsection