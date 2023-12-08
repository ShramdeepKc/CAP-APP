@extends('layout')
@section('content')

<div class="myWholeForm">
  <div class="formHead">
    <h4>सम्पादन गर्नुहोस्</h4>
    <a class="btnB backB" href="{{route('urls.index')}}">Back</a>
  </div>

  <form class="formP" action="{{ route('urls.update',$url->id ) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <fieldset>
      <strong>कोड:</strong>
      <input type="text" name="code" class="type_nep" value="{{ $url->code }}" placeholder="Code">
    </fieldset>

<fieldset>
  <strong>ग्राहक:</strong>
  @if(auth()->id() == 1)
  <select name="client_id" id="client_id">
    @foreach ($app_client as $clients)
    <option value="{{$clients->id}}" {{$clients->id==$url->client_id ? 'selected':''}}>
      {{$clients->name_np}}
    </option>
    @endforeach
  </select>
  @else
  <input type="text" name="client_id" value="{{$user = auth()->user()->client_id}}" hidden>{{$user = auth()->user()->name}}</input>
  @endif
</fieldset>
  
                <fieldset>
                    <strong> एप नाम:</strong>
                    @if(auth()->id() == 1)
                    <select id="app" name="app_id" value="apps">
                        @foreach ($app as $apps)
                        <option value="{{$apps->id}}" {{$apps->id==$url->app_id ? 'selected':''}}>{{$apps->name_np}}
                        </option>
                        @endforeach
                    </select>
</fieldset>

                @else
                
                <fieldset>
                <select id="app" name="app_id" value="apps">
                    @foreach ($appList as $apps)
                    <option value="{{$apps->id}}" {{$apps->id==$url->app_id ? 'selected':''}}>{{$apps->name_np}}
                    </option>
                    @endforeach
                </select>
</fieldset>
                @endif

                <fieldset>
                        <strong>एप URL :</strong>
                        <input type="text" name="app_url"  value="{{ $url->app_url }}"
                            placeholder="Code">
</fieldset>

<fieldset>
  <strong>विवरण :</strong>
                        <textarea type="description" name="description"
                        class="type_nep">{{$url->description }}</textarea>
</fieldset>
                          
                        <fieldset>
                        <strong>लोगो :</strong>
                        <input type="file" name="image" placeholder=" Upload image">
                        <img src="/image/{{ $url->image }}" width="50px">
</fieldset>

<fieldset>
  <button type="submit" class="btnB submitB">सुरक्षित गर्नुहोस </button>
</fieldset>
</form>
</div>

@endsection