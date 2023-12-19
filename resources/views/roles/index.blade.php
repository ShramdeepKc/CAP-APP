@extends('layout')
@section('content')
<div class="myWholeTable">
<div class="formHead formHeadCr">
  <h2>{{ __('public.Roles') }}</h2>
  <a class="btnB createB" href="{{ route('roles.create') }}">{{ __('public.Add') }}</a>
</div>

<table class="table noBlc">
<thead>
  <tr>
    <th>{{ __('public.Roles') }}</th>
    <th width="200px">{{ __('public.Action') }}</th>
  </tr>
</thead>
<tbody>
  @foreach ($roles as $role)
  <tr>
    <td>{{ $role->name }}</td>
    <td style="display:flex;gap:0.5em;">
      <a class="btnB submitB"  href="{{ route('roles.edit',$role->id) }}">{{ __('public.Edit') }}</a>
      <form method="post" action="{{ route('roles.destroy',$role->id) }}" onsubmit="return confirm('sure?');">
        @csrf
        @method('delete')
        <button type="submit" class="btnB backB">{{ __('public.Delete') }}</button>
      </form>
    </td>
  </tr>
  @endforeach
</tbody>
</table>
</div>
@endsection
