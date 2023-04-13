
@extends('layout')   
@section('content')

<div class="myWholeForm">
  <div class="formHead">
    <h2>भूमिका</h2>  
    <a href="{{ route('users.index') }}" class="btnB backB">Back</a>
  </div>
    
    <fieldset>
      <span>User Name: {{ $user->name }}</span><br>
      <span>User Email: {{ $user->email }}</span>
    </fieldset>

    
      
      @if ($user->roles)
      @foreach ($user->roles as $user_role)
      <form class="formP" method="POST"
            action="{{ route('users.roles.remove', [$user->id, $user_role->id]) }}"
            onsubmit="return confirm('Are you sure?');">
            @csrf
            @method('DELETE')
        <button type="submit" class="btn btn-secondary">{{ $user_role->name }}</button>
      </form>
      @endforeach
      @endif
    

     <form class="formP" method="POST" action="{{ route('users.roles', $user->id) }}">
        @csrf
        <label for="role">भूमिका</label>
        <select id="role" name="role" autocomplete="role-name">
          @foreach ($roles as $role)
          <option value="{{ $role->name }}">{{ $role->name }}</option>
          @endforeach
        </select>
        @error('role')
        <span>{{ $message }}</span>
        @enderror
        <button type="submit" class="btnB createB">Assign</button>
      </form>
    
      <fieldset>
        <h2>अनुमति</h2>
        @if ($user->permissions)
        @foreach ($user->permissions as $user_permission)
        <form class="formP" method="POST" action="{{ route('users.permissions.revoke', [$user->id, $user_permission->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
          <button type="submit">{{ $user_permission->name }}</button>
        </form>
        @endforeach
        @endif
      </fieldset>  

      <form class="form" method="POST" action="{{ route('users.permissions', $user->id) }}">
        @csrf
        <label for="permission">अनुमति</label>
        <select id="permission" name="permission" autocomplete="permission-name" >
          @foreach ($permissions as $permission)
            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
            @endforeach
          </select>
          @error('name')
          <span>{{ $message }}</span>
          @enderror  
      
        <fieldset>
          <button type="submit" class="btnB createB">तोक्नु</button>
        </fieldset>
      </form>
</div>
@endsection