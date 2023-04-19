@extends('layout')
@section('content')

<div class="myWholeForm">
  <div class="formHead">
    <h2>Permission Assign</h2>
    <a class="btnB backB" href="{{route('permission.index')}}">Back</a>
  </div>

  <form class="formP" action="{{ route('permission.store') }}" method="POST" >
    @csrf
    <fieldset>
      <strong>नाम:</strong>
      <input type="text"  name="name" class="form-control" placeholder="name">
    </fieldset>
    
    <fieldset>
      <button type="submit" class="btnB submitB">सिर्जना गर्नुहोस्</button>
    </fieldset>
  </form>
</div>

@endsection