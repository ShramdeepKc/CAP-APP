@extends('layout')   
@section('content')
<div class="myWholeTable">
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif

  <div style="text-align:right;"><a href="{{ url('/register') }}" class="btn btn-primary" >{{ __('public.Add') }} {{ __('public.Users') }}</a></div>
  <table class="table">
    <thead>
    <tr>
      <th>{{ __('public.No') }}.</th>
      <th>{{ __('public.Users') }}</th>
      <th>{{ __('public.Client') }}</th>
      <th>{{ __('public.Action') }}</th>
      <th>{{ __('public.Password') }}{{ __('public.Reset') }}</th>
    </tr>
</thead>
<tbody>
    @foreach ($users as $user)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $user->name}}</td>
      <td>{{ $user->clientName }}</td>
      <td>
        <form method="POST" action="{{ route('users.destroy', $user->id) }}" onsubmit="return confirm('Are you sure?');">
          <a href="{{ route('users.show', $user->id) }}" class="btnB submitB">{{ __('public.Roles') }}</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger"> {{ __('public.Delete') }}</button>
        </form>
      </td>
      <td>
        <a href="{{ route('users.edit' , $user->id ) }}" class="btn btn-primary">{{ __('public.Password') }} {{ __('public.Reset') }}</a>
      </td>
    </tr>
    @endforeach
</tbody>
  </table>
</div>
@endsection
