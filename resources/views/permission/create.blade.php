@extends('layout')
@section('content')

<form action="{{ route('permission.store') }}" method="POST" >
    @csrf
<div class="card">
   <div class="card-body row">
       <div class="col">
         <div class="col-xs-5 col-sm-5 col-md-5">
             <div class="form-group">
                 <strong>Name:</strong>
                 <input type="text"  name="name" class="form-control" placeholder="name">
                 
             </div>
             <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                <button type="submit" class="btn btn-primary">Create</button>
        </div>
         </div>
       </div>
</div>


@endsection