@extends('layout')
@section('content')
<div style="margin-bottom: 1rem;display:flex;">
  <a class="btn btn-danger pBtnMarginLeft" href="{{ route('roles.index') }}"> Back </a>
</div>
 

<form action="{{ route('roles.store') }}" method="POST" >
    @csrf
<div class="card">
   <div class="card-body row">
       <div class="col">
         <div class="col-xs-5 col-sm-5 col-md-5">
             <div class="form-group">
                 <strong>नाम:</strong>
                 <input type="text"  name="name" class="form-control" placeholder="name">
                 
             </div>
             <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                <button type="submit" class="btn btn-primary">सिर्जना</button>
              </div>
            </div>
        </div>
    </div>
    
</div>
</form>

@endsection