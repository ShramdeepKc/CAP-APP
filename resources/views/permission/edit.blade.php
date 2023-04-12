@extends('layout')
@section('content')

<div class="myWholeForm">
  <div class="formHead">
    <h2>Permission</h2>
  </div>

<form class="formP" action="{{ route('permission.update',$permission->id) }}" method="POST" >
    @csrf
    @method('PUT')

    <fieldset>
                 <strong>नाम:</strong>
                 <input type="text"  name="name" class="form-control" placeholder="name" value="{{$permission->name}}">
</fieldset>   

<fieldset>
  <button type="submit" class="btnB submitB">सिर्जना गर्नुहोस्</button>
</fieldset>

</form>
</div>
@endsection