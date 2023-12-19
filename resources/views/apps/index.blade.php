@extends('layout')
@section('content')

<div class="myWholeTable">
<div class="formHead formHeadCr">
  <h2>{{ __('public.App') }} {{ __('public.List') }}  </h2>
  <a class="btnB createB" href="{{ route('apps.create') }}">{{ __('public.Create') }}</a>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table id="" class="table">
  <thead>
  <tr>
    <th>{{ __('public.No') }}</th>
    <th>{{ __('public.Code') }} </th>
    <th>{{ __('public.English') }} {{ __('public.Name') }}</th>
    <th>{{ __('public.Nepali') }} {{ __('public.Name') }}</th>
    <th>{{ __('public.Status') }}</th>
    <th width="200px">{{ __('public.Action') }}</th>
  </tr>
</thead>
<tbody>
  @foreach ($app as $apps)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $apps->code }}</td>
    <td>{{ $apps->name_en }}</td>
    <td>{{ $apps->name_np }}</td>
    <td>{{ $apps->status }}</td>
    <td>
      @can('view')
      <form action="{{ route('apps.destroy',$apps->id) }}" method="POST">
        <a class="btn btn-primary" href="{{ route('apps.edit',$apps->id) }}">{{ __('public.Edit') }} </a>
          @csrf
          @method('DELETE')
        <button type="submit" onclick="return myFunction();" class="btnB backB">{{ __('public.Delete') }} </button>
      </form>
      @endcan
    </td>
  </tr>

  @endforeach
  </tbody>
</table>
</div>
  <script>
    function myFunction() {
      if (!confirm("Are You Sure to delete this"))
        event.preventDefault();
      }
  </script>
@endsection
