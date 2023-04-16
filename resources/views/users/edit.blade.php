@extends('layout')
   
@section('content')


@if ($errors->has('password_confirmation'))
    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
@endif

<div class="myWholeForm">
  <div class="formHead">
    <h2>Change Password</h2>
  </div>
<form class="formP" action="{{ route('users.update', $user->id ) }}" method="POST" >
    @csrf
    <fieldset>
                 <strong>User Name :</strong>
                 <input type="text" id="password" name="name" class="form-control type_nep" value="{{ $user->name }}"  hidden>{{$user->name}}</input>
</fieldset>

<fieldset>
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password"    minlength="8"  required>
</fieldset>

<fieldset>
    <label for="password_confirmation">Confirm Password</label>
    <input type="password" id="password_confirmation"  class="form-control" name="password_confirmation" required>
</fieldset>

<fieldset>
  <button type="submit" class="btnB submitB">सुरक्षित गर्नुहोस </button>
</fieldset>
   
</form>
</div>


@endsection