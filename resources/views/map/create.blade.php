@extends('layout')
   
@section('content')
<h2>Client Url Assign</h2>
   <form action="{{ route('map.store') }}" method="POST">
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
                     <strong>Code :</strong>
                     <input type="text" name="code" class="form-control" placeholder="App Url" required >
                 </div>
             </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>App URL(English)  :</strong>
                <input type="text" name="url" class="form-control" placeholder="App Url" required >
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                <button type="submit" class="btn btn-primary">Create</button>
        </div>
        </div>

        </div>

        </div>
        </div>
   </form>
            
       


@endsection