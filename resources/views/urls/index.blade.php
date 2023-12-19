@extends('layout')
@section('content')

<div class="myWholeTable">
  <div class="formHead formHeadCr">
    <h2> {{ __('public.Url') }}{{ __('public.List') }} </h2>
    <a class="btnB createB" href="{{ route('urls.create') }}">{{ __('public.Add') }}</a>
  </div>
         
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif

  @if ($message = Session::get('error'))
    <div class="alert alert-danger">
      <p>{{ $message }}</p>
    </div>
  @endif
  @if ($message = Session::get('errors'))
    <div class="alert alert-danger">
      <p>{{ $message }}</p>
    </div>
  @endif
   
  <table id="myTable"   class="table  table-responsive">
  <thead>  
  <tr>
      <th>{{ __('public.No') }}.</th>
      <th>{{ __('public.Code') }} </th>
      <th>{{ __('public.Client') }} </th>
      <th>{{ __('public.App') }} {{ __('public.Name') }} </th>
      <th>{{ __('public.App') }}{{ __('public.Url') }}</th>
      <th>{{ __('public.Description') }}</th>
      <th>{{ __('public.App') }} {{ __('public.Logo') }}</th>
      <th width="200px">{{ __('public.Action') }}</th>
    </tr>
</thead>
    <tbody>
    @foreach ($url as $urls)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $urls->code }}</td>
      <td>{{ $urls->clientName}}</td>
      <td>{{$urls->appName}}</td>
      <td><a href="{{$urls->app_url}}" target="_blank">{{$urls->appName}}</a></td>
      <td>{{$urls -> description}}</td>
      <td><img src="{{asset('/image/'. $urls->image  )}}" width="70px"></td>
      <td>
        <form action="{{ route('urls.destroy',$urls->id) }}" method="POST">
          <a class="btnB submitB" href="{{ route('urls.edit',$urls->id) }}">{{ __('public.Edit') }} </a>
            @csrf
            @method('DELETE')
            @can('view')
          <button type="submit" onclick="return myFunction();" class="btnB backB">{{ __('public.Delete') }}</button>
            @endcan
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
