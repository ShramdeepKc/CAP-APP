@extends('layout') 


@section('content')
<div class="p-5 text-center bg-light">
    
    <h4 class="mb-1">Create</h4>
 
  </div>
<form action="{{ route('clients.store') }}" method="POST" >
    @csrf
<div class="card">
   <div class="card-body row">
       <div class="col">
         <div class="col-xs-5 col-sm-5 col-md-5">
             <div class="form-group">
                 <strong>Code:</strong>
                 <input type="text"  name="code" class="form-control" placeholder="Code">
                 
             </div>
         </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong> Name(English)  :</strong>
                <input type="text" name="name_en" class="form-control" placeholder=" In English" required >
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>App Name(Nepali)  :</strong>
                <input type="text" name="name_np" class="form-control" placeholder="नेपालीमा लेख्नुहोस्">
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Status  :</strong>
                <input type="text" name="status" class="form-control" placeholder="Status">
            </div>
        </div>
 
        <label for="app_id"> App used :</label>
  <select name="app_id" id="app_id">
  @foreach ($app as $apps)
          <option value="{{$apps->id}}">{{$apps->name_en}}</option>
          @endforeach
  </select>


         <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
  </div>
</div>
   
</form>





@endsection