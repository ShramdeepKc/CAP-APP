@extends('layout')
@section('content')

<div class="myWholeTable">
	<div class="formHead formHeadCr">
	  <h2>{{ __('public.Url') }} {{ __('public.Maps') }}</h2>
	  <a class="btnB createB" href="{{ route('map.create') }}">
    {{ __('public.Add') }}
	  </a>
	</div>
 
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif
  
  <table class="table">
    <thead>
    <tr>
      <th>{{ __('public.No') }}.</th>
      <th>{{ __('public.Client') }}</th>
      <th>{{ __('public.Code') }}</th>
      <th>{{ __('public.Public') }}{{ __('public.Url') }}</th>
      <th>{{ __('public.Core') }}{{ __('public.Url') }}</th>
      <th>{{ __('public.Action') }}</th>
    </tr>
</thead>
<tbody>
    @foreach ($map as $maps)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $maps->clientName }}</td>
      <td>{{ $maps->code }}</td>
      <td><a href="{{$maps->url}}">{{ $maps->url }}</td>
      <td><a href="{{$maps->c_url}}">{{ $maps->c_url }}</td>

      <td>
        <form action="{{ route('map.destroy',$maps->id) }}" method="POST">
          <a class="btnB submitB" href="{{ route('map.edit',$maps->id) }}">{{ __('public.Edit') }}</a>
            @csrf
            @method('DELETE')
          <button type="submit" onclick="return myFunction();" class="btnB backB">{{ __('public.Delete') }}</button>
        </form>
      </td>
    </tr>
    @endforeach
</tbody>
  </table>
</div>
    <script>
      function myFunction() {
        if(!confirm("Are You Sure to delete this"))
        event.preventDefault();
      }
	</script>


    


@endsection
