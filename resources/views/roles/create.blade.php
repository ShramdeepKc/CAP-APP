@extends('layout')
@section('content')
<div class="myWholeForm">
  <div class="formHead">
    <h2>{{ __('public.Roles') }}</h2>
    <a class="btnB backB" href="{{route('roles.index')}}">{{ __('public.Back') }}</a>
  </div>

  <form class="formP" action="{{ route('roles.store') }}" method="POST" >
    @csrf
    <fieldset>
      <strong>{{ __('public.Name') }}:</strong>
      <input type="text"  name="name" class="form-control" placeholder="name">
    </fieldset>
    
    <fieldset>
      <button type="submit" class="btnB submitB">{{ __('public.Add') }}</button>
    </fieldset>
  </form>
</div>
@endsection