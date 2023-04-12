@extends('layout')
   
   @section('content')


   <div class="myWholeForm">
  <div class="formHead">
    <h4 class="mb-1">APP LIST</h4>
</div>
 
 
<form class="formP" action="{{ route('applications.update', $application->id ) }}" method="POST" >
    @csrf
    @method('PUT')

    <fieldset>
                <strong>CLients:</strong>
                 <select name="client_id" id="client_id"  >
                         @foreach ($app_client as $clients)
                      <option value="{{$clients->id}}"  {{$clients->id==$application->client_id ? 'selected':''}} >{{$clients->name_np}}</option>
                      @endforeach
              </select> 
</fieldset>

<fieldset>
                <strong>Apps:</strong>
                 <select name="app_id[]" id="app_id" multiple >
                         @foreach ($app as $apps)
                         <option value="{{ $apps->id }}" {{ in_array($apps->id, $selectedAppIds) ? 'selected' : '' }}>{{ $apps->name_en }}</option>
                      @endforeach
              </select> 
</fieldset>

<fieldset>
  <button type="submit" class="btnB submitB">सुरक्षित गर्नुहोस </button>
</fieldset>
</form>
</div>

   @endsection