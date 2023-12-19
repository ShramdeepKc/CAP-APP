@extends('layout')
@section('content')

<div class="myWholeForm">
  <div class="formHead">
    <h2>{{ __('public.Permissions') }}</h2>
    <a class="btnB backB" href="{{route('permission.index')}}">{{ __('public.Back') }}</a>
  </div>

<form class="formP" action="{{ route('permission.update',$permission->id) }}" method="POST" >
    @csrf
    @method('PUT')

    <fieldset>
                 <strong>{{ __('public.Name') }}:</strong>
                 <input type="text"  name="name" class="form-control" placeholder="name" value="{{$permission->name}}">
</fieldset>   

<fieldset>
  <button type="submit" class="btnB submitB">{{ __('public.Add') }}</button>
</fieldset>

</form>
</div>
@endsection