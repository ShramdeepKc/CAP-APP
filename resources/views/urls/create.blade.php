<?php
 use App\Helpers\AppHelpers;
?>
@extends('layout') 
@section('content')


<div class="p-5 text-center bg-light">
    
    <h4 class="mb-1">URL LIST</h4>

  </div>

<form action="{{ route('urls.store') }}" class="nepali-font"   method="POST" enctype="multipart/form-data" >
    @csrf
<div class="card">
   <div class="card-body row">
       <div class="col">
         <div class="col-xs-5 col-sm-5 col-md-5">
             <div class="form-group">
                 <strong>Code:</strong>
                 <input type="text"  name="code" class="form-control type_nep" placeholder="Code" required>
                 
             </div>
            </div>
      
            <div class="col-xs-5 col-sm-5 col-md-5">
             <div class="form-group">
            <strong> Clients:</strong>
            @if(auth()->id() == 1) 
      <select name="client_id" id="client_id"  class="form-control type_nep"  required>
      @foreach ($app_client as $clients)
              <option value="{{$clients->id}}" >{{$clients->name_np}}</option>
              @endforeach
      </select>

      @else
      <input type="text"   name="client_id" value="{{$user = auth()->user()->client_id}}" hidden>{{$user = auth()->user()->name}}</input>
  
        @endif

             </div>
            </div>
         
           
            <div class="col-xs-5 col-sm-5 col-md-5">
             <div class="form-group">
            <strong> App Name:</strong>
            @if(auth()->id() == 1)
      <select name="app_id" id="app_id" required>
      @foreach ($app as $apps)
              <option value="{{$apps->id}}" class="form-control type_nep" > {{$apps->name_en}}</option>
              @endforeach
        
      </select>
      @else
      <select name="app_id" id="app_id" required>
      @foreach($appList as $apps)
    <option value="{{ $apps->id }}">  {{ $apps->name_en}}
           </option>
@endforeach
        
      </select>
@endif
             </div>
            </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>App URL(English)  :</strong>
                <input type="text" name="app_url" placeholder="App Url" required >
            </div>
        </div>
        <div class="form-group">
    <strong>Description : </strong>
    <textarea class="form-control type_nep" id="description" style="font-family: preeti;" name="description" rows="2" required></textarea>
  </div>
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image"class="form-control type_nep" placeholder=" Upload image" required>
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