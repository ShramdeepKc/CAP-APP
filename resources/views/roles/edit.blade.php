@extends('layout')
@section('content')

<div class="myWholeForm">
  <div class="formHead">
    <h2>भूमिका र अनुमति</h2>
    <a class="btnB backB" href="{{route('roles.index')}}">Back</a>
  </div>

<form class="formP" action="{{ route('roles.update',$role->id) }}" method="POST">
    @csrf
    @method('PUT')
  <fieldset>
   <strong>Name:</strong>
   <input type="text" name="name" placeholder="name" value="{{$role->name}}">
   <button type="submit" class="btnB submitB">EDIT</button>
  </fieldset>
</form>

      @if ($role->permissions)
      @foreach ($role->permissions as $role_permission)
    <form class="formP" style="flex-direction:column;" method="POST" action="{{ route('roles.permission.revoke', [$role->id, $role_permission->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-secondary">{{ $role_permission->name }}</button>
    </form>
      @endforeach
      @endif
                     
                 
    <form class="formP" method="POST" action="{{ route('roles.permission', $role->id) }}">
      @csrf
      <fieldset>
        <strong>अनुमति: </strong>
        <select id="permission" name="permission" autocomplete="permission-name">
          @foreach ($permissions as $permission)
          <option value="{{ $permission->name }}">{{ $permission->name }}</option>
          @endforeach
        </select>
        @error('name')
        <span>{{ $message }}</span>
        @enderror
        <button type="submit" class="btn btn-success">असाइन गर्नुहोस्</button>
      </fieldset>
      </form>
</div>
@endsection