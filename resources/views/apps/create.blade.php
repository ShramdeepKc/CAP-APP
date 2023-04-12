@extends('layout') 
@section('content')

<div class="myWholeForm">
  <div class="formHead">
    <h2>एप सूची</h2>
    <a class="btnB backB" href="{{route('apps.index')}}">Back</a>
  </div>

  <form class="formP" action="{{ route('apps.store') }}" method="POST" >
    @csrf
    <fieldset>
      <strong>कोड :</strong>
      <input type="text"  name="code" class="form-control type_nep" placeholder="Code" required>
    </fieldset>           
    
    <fieldset>
      <strong>एप नाम(अंग्रेजी)  :</strong>
      <input type="text" name="name_en" class="form-control type_nep" placeholder=" In English" required >
    </fieldset>
    
    <fieldset>
      <strong>एप नाम(नेपाली)  :</strong>
      <input type="text" name="name_np" class="form-control type_nep" placeholder="नेपालीमा लेख्नुहोस्" required>
    </fieldset>

    <fieldset>
      <label for="status">स्थिति:</label><br>
      <input type="radio" id="true" name="status" value="true">
      <label for="true">true</label><br>
      <input type="radio" id="false" name="status" value="false">
      <label for="false">false</label><br>
    </fieldset>
    
    <fieldset>
      <button type="submit" class="btnB submitB">सुरक्षित गर्नुहोस </button>
    </fieldset>   
  </form>
</div>
@endsection