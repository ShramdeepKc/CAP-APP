@extends('layout') 
@section('content')

<div class="myWholeForm">
<div class="formHead">
  <h4 >सच्याउने</h4>
  <a class="btnB backB" href="{{route('apps.index')}}">Back</a>
</div>
<form class="formP" action="{{ route('apps.update', $app->id ) }}" method="POST" >
  @csrf
  @method('PUT')
    <fieldset>
      <strong>कोड:</strong>
      <input type="text"  name="code" class="type_nep" value="{{ $app->code }}" placeholder="Code">
    </fieldset>
    
    <fieldset>
    <strong>एप नाम(अंग्रेजी)  :</strong>
                <input type="text" name="name_en" class="type_eng" value="{{ $app->name_en }}" placeholder="Name" required >
          
    </fieldset>
            
    <fieldset>   
                <strong>एप नाम(नेपाली)  :</strong>
                <input type="text" name="name_np" class="type_nep"  value="{{ $app->name_np }}" placeholder="नेपालीमा लेख्नुहोस्">
</fieldset>

<fieldset>
  <label for="status">स्थिति:</label>
  <div><input type="radio" id="true" name="status" value="true"{{ ($app->status=="true")? "checked" : "" }}>
  <label for="true">true</label></div>
  <div><input type="radio" id="false" name="status" value="false"{{ ($app->status=="false")? "checked" : "" }}>
  <label for="false">false</label></div>
  
</fieldset>

<fieldset>
                <button type="submit" class="btnB submitB">सुरक्षित गर्नुहोस </button>
</fieldset>
   
</form>
</div>





@endsection