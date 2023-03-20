@extends('layout') 


@section('content')
<div class="p-5 text-center bg-light">
    
    <h4 class="mb-1">APP LIST</h4>
 
  </div>
<form action="{{ route('apps.update', $app->id ) }}" method="POST" >
    @csrf
    @method('PUT')
<div class="card">
   <div class="card-body row">
       <div class="col">
         <div class="col-xs-5 col-sm-5 col-md-5">
             <div class="form-group">
                 <strong>Code:</strong>
                 <input type="text"  name="code" class="form-control" value="{{ $app->code }}" placeholder="Code">
                 
             </div>
         </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>App Name(English)  :</strong>
                <input type="text" name="name_en" class="form-control" value="{{ $app->name_en }}" placeholder="Name" required >
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>App Name(Nepali)  :</strong>
                <input type="text" name="name_np" class="form-control"  value="{{ $app->name_np }}" placeholder="नेपालीमा लेख्नुहोस्">
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>Status  :</strong>
                <input type="text" name="status" class="form-control"  value="{{ $app->status }}" placeholder="Status">
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