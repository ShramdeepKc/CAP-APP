@extends('layout') 
@section('content')

<div class="myWholeForm">
  <div class="formHead">
    <h2>{{ __('public.App') }} {{ __('public.List') }}  </h2>
    <a class="btnB backB" href="{{route('apps.index')}}">{{ __('public.Back') }} </a>
  </div>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form class="formP" action="{{ route('apps.store') }}" method="POST" >
    @csrf
    <fieldset>
      <strong>{{ __('public.Code') }} </strong>
      <input type="text"  name="code" class="form-control type_nep" placeholder="Code" required>
    </fieldset>           
    
    <fieldset>
      <strong>{{ __('public.English') }} {{ __('public.Name') }}   :</strong>
      <input type="text" name="name_en" class="form-control type_eng" placeholder=" In English" required >
    </fieldset>
    
    <fieldset>
      <strong>{{ __('public.Nepali') }} {{ __('public.Name') }}  :</strong>
      <input type="text" name="name_np" class="form-control type_nep" placeholder="नेपालीमा लेख्नुहोस्" required>
    </fieldset>

    <fieldset class="trueFalse">
      <label for="status"><strong>{{ __('public.Status') }} :</strong></label>
      <div>
      <input type="radio" id="true" name="status" value="true">
      <label for="true">true</label>
      </div>
      
      <div>
      <input type="radio" id="false" name="status" value="false">
      <label for="false">false</label>
      </div>
      
    </fieldset>
  
    <fieldset>
      <button type="submit" class="btnB submitB">{{ __('public.Add') }} </button>
    </fieldset>   
  </form>
</div>
@endsection
