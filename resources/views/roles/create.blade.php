@extends('layout')
@section('content')
<div class="myWholeForm">
  <div class="formHead">
    <h2>Roles Assign</h2>
    <a class="btnB backB" href="{{route('roles.index')}}">Back</a>
  </div>

  <form class="formP" action="{{ route('roles.store') }}" method="POST" >
    @csrf
    <fieldset>
      <strong>नाम:</strong>
      <input type="text"  name="name" class="form-control" placeholder="name">
    </fieldset>
    
    <fieldset>
      <button type="submit" class="btnB submitB">सिर्जना</button>
    </fieldset>
  </form>
</div>
@endsection