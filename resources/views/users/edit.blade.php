@extends('layout')
   
@section('content')


@if ($errors->has('password_confirmation'))
    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
@endif


<form action="{{ route('users.update', $user->id ) }}" method="POST" >
    @csrf
   
<div class="card">
   <div class="card-body row">
       <div class="col">
         <div class="col-xs-5 col-sm-5 col-md-5">
             <div class="form-group">
                 <strong>User Name</strong>
                 <input type="text" id="password" name="name" class="form-control type_nep" value="{{ $user->name }}"  hidden>{{$user->name}}</input>
                 
             </div>
         </div>
         <div class="col-xs-5 col-sm-5 col-md-5">
         <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password"    minlength="8"  required>
</div>
         </div>
<div class="col-xs-5 col-sm-5 col-md-5">
<div class="form-group">
    <label for="password_confirmation">Confirm Password</label>
    <input type="password" id="password_confirmation"  class="form-control" name="password_confirmation" required>
</div>
</div>
         <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                <button type="submit" class="btn btn-primary">सुरक्षित गर्नुहोस </button>
        </div>
    </div>
  </div>
</div>
   
</form>




@endsection