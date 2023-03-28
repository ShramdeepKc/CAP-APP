@extends('layout')
   
   @section('content')

   <div class="p-5 text-center bg-light">
    
    <h4 class="mb-1">APP LIST</h4>
 
  </div>
<form action="{{ route('applications.update', $application->id ) }}" method="POST" >
    @csrf
    @method('PUT')
<div class="card">
   <div class="card-body row">
       <div class="col">
         <div class="col-xs-5 col-sm-5 col-md-5">
             <div class="form-group">
                <strong>CLients:</strong>
                 <select name="client_id" id="client_id"  >
                         @foreach ($app_client as $clients)
                      <option value="{{$clients->id}}"  {{$clients->id==$application->client_id ? 'selected':''}} >{{$clients->name_np}}</option>
                      @endforeach
              </select> 
             </div>
             <div class="form-group">
                <strong>Apps:</strong>
                 <select name="app_id[]" id="app_id" multiple >
                         @foreach ($app as $apps)
                         <option value="{{ $apps->id }}" {{ in_array($apps->id, $selectedAppIds) ? 'selected' : '' }}>{{ $apps->name_en }}</option>
                      @endforeach
              </select> 
             </div>
         </div>
       

         <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
  </div>
</div>
   
</form>


   @endsection