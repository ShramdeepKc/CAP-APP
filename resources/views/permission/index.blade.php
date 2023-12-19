@extends('layout')
@section('content')

<div class="myWholeTable">
	<div class="formHead formHeadCr">
  	<h2>{{ __('public.Permissions') }}</h2>
  	<a class="btnB createB" href="{{ route('permission.create') }}">{{ __('public.Add') }}</a>
	</div>

<table class="table noBlc">
  <thead>
  <tr>
    <th>{{ __('public.No') }}.</th>
    <th>{{ __('public.Permissions') }}</th>
    <th width="100px">{{ __('public.Action') }}</th>
  </tr>
</thead>
<tbody>
  @foreach ($permission as $perm)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $perm->name }}</td>
    <td>
      <form method="post" action="{{ route('permission.destroy',$perm->id) }}" onsubmit="return confirm('sure?');">
        <a class="btn btn-primary" href="{{ route('permission.edit',$perm->id) }}">{{ __('public.Edit') }}</a>  
        @csrf
        @method('delete')
        <button type="submit" class="btnB backB">{{ __('public.Delete') }}</button>
      </form>
    </td>
  @endforeach
</tbody>
</table>
</div>
@endsection
