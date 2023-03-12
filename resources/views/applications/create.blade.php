
@extends('layout')
   
   @section('content')
   <h2>App Assign</h2>
   <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
<div class="card">
   <div class="card-body row">
       <div class="col">
        
      
            <div class="col-xs-5 col-sm-5 col-md-5">
             <div class="form-group">
            <strong> Clients:</strong>
      <select name="client_id" id="client_id">
      @foreach ($app_client as $clients)
              <option value="{{$clients->id}}">{{$clients->name_en}}</option>
              @endforeach
      </select>
             </div>
            </div>
         
           
            <div class="col-xs-5 col-sm-5 col-md-5">
             <div class="form-group">
            <strong> App Name:</strong>
      <!-- <select name="app_id[]" id="app_id" multiple>
      @foreach ($app as $apps)
              <option value="{{$apps->id}}">{{$apps->name_en}}</option>
              @endforeach
      </select> -->
      <select class="js-example-basic-multiple"  id="app_id" name="app_id[]" multiple="multiple" >
      @foreach ($app as $apps)
        <option value="{{$apps->id}}">{{$apps->name_en}}</option>
        @endforeach
  </select>

             </div>
            </div>


        <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                <button type="submit" class="btn btn-primary">Create</button>
        </div>
       </div>
   </div>
</div>
</form>
<script>
        $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

   @endsection