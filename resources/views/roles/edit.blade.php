@extends('layout')
@section('content')


<form class="formP" action="{{ route('roles.update',$role->id) }}" method="POST">
    @csrf
    @method('PUT')
   <strong>Name:</strong>
   <input type="text" name="name" placeholder="name" value="{{$role->name}}">
   <button type="submit" class="btnB submitB">EDIT</button>
</form>

<h4>भूमिका र अनुमति</h4>
  @if ($role->permissions)
  @foreach ($role->permissions as $role_permission)
  <form class="formP" method="POST" action="{{ route('roles.permission.revoke', [$role->id, $role_permission->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary">{{ $role_permission->name }}</button>
                                </form>
                            @endforeach
                        @endif
                       
                 
                        <form method="POST" action="{{ route('roles.permission', $role->id) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <strong>अनुमति: </strong>
                                <select id="permission" name="permission" autocomplete="permission-name">
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                    </div>
            
                        <button type="submit" class="btn btn-success">असाइन गर्नुहोस्</button>
             
                    </form>

                

@endsection