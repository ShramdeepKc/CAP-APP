@extends('layout') 


@section('content')
<div class="p-5 text-center bg-light">
    
    <h4 class="mb-1">URL LIST</h4>
 
  </div>
<form action="{{ route('urls.update',$url->id ) }}" method="POST" >
    @csrf
    @method('PUT')
<div class="card">
   <div class="card-body row">
       <div class="col">
         <div class="col-xs-5 col-sm-5 col-md-5">
             <div class="form-group">
                 <strong>Code:</strong>
                 <input type="text"  name="code" class="form-control" value="{{ $url->code }}" placeholder="Code">
                 
             </div>
         </div>
         <div class="form-group">
          <label for="app">Apps:</label>
          <select id="app" class="form-control" name="app_id" value="apps">
          @foreach ($app as $apps)
          <option value="{{$apps->id}}" {{$apps->id==$url->app_id ? 'selected':''}}>{{$apps->name_en}}</option>
          @endforeach
      </select></div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>App URL(English)  :</strong>
                <input type="text"  name="app_url" class="form-control" value="{{ $url->app_url }}" placeholder="Code">
            </div>
        </div>

        <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                <button type="submit" class="btn btn-primary">Edit</button>
        </div>
       </div>
   </div>
</div>
</form>


@endsection