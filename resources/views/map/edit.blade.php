@extends('layout')
   
@section('content')
<h2>Client Url Assign</h2>
   <form action="{{ route('map.update',$map->id) }}" method="POST">
    @csrf
    @method('PUT')

<div class="card">
   <div class="card-body row">
       <div class="col">
           
           
           <div class="col-xs-5 col-sm-5 col-md-5">
               <div class="form-group">
                   <strong> ग्राहकहरु:</strong>
                   <select name="client_id" id="client_id" >
                 @foreach ($app_client as $clients)
              <option value="{{$clients->id}}"  {{$clients->id==$map->client_id ? 'selected':''}} >{{$clients->name_en}}</option>
              @endforeach
      </select> 
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
                 <div class="form-group">
                     <strong>कोड :</strong>
                     <input type="text" name="code" class="form-control" placeholder="App Url" value="{{$map->code}}" required >
                 </div>
             </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>एप URL(English)  :</strong>
                <input type="text" name="url" class="form-control" placeholder="App Url" value="{{$map->url}}" required >
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                <button type="submit" class="btn btn-primary">सिर्जना गर्नुहोस्</button>
        </div>
        </div>

        </div>

        </div>
        </div>
   </form>
            
       


@endsection