@extends('layout')
@section('content')
<form action="{{ route('roles.update',$role->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-body row">
            <div class="col">
                <div class="col-xs-5 col-sm-5 col-md-5">
                    <div class="form-group">
                        <strong>Name:</strong>
                      
                        <input type="text" name="name" class="form-control" placeholder="name" value="{{$role->name}}">
                    </div>
                   


                    <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                        <button type="submit" class="btn btn-primary">EDIT</button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</form>

<div class="card">
                    <h2 class="card-body-row">Role Permissions</h2>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($role->permissions)
                            @foreach ($role->permissions as $role_permission)
                                <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST"
                                    action="{{ route('roles.permission.revoke', [$role->id, $role_permission->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">{{ $role_permission->name }}</button>
                                </form>
                            @endforeach
                        @endif
                       
                    </div>

</div>
<div class="max-w-xl mt-6">
                        <form method="POST" action="{{ route('roles.permission', $role->id) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="permission"
                                    class="block text-sm font-medium text-gray-700">Permission</label>
                                <select id="permission" name="permission" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <button type="submit"
                            class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign</button>
                    </div>
                    </form>
                </div>

@endsection