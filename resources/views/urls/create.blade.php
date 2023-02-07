@extends('layout') 


@section('content')
<div class="p-5 text-center bg-light">
    
    <h4 class="mb-1">URL LIST</h4>
 
  </div>
<form action="{{ route('urls.store') }}" method="POST" enctype="multipart/form-data" >
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
            <strong> App Name:</strong>
      <select name="app_id" id="app_id">
      @foreach ($app as $apps)
              <option value="{{$apps->id}}">{{$apps->name_en}}</option>
              @endforeach
      </select>
             </div>
            </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>App URL(English)  :</strong>
                <input type="text" name="app_url" class="form-control" placeholder="App Url" required >
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder=" Upload image">
            </div>
        </div>   

        <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                <button type="submit" class="btn btn-primary">Create</button>
        </div>
       </div>
   </div>
</div>
</form>


@endsection