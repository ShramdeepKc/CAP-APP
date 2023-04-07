@extends('layout') 


@section('content')
<div class="p-5 text-center bg-light">
    
    <h4 class="mb-1">एप सूची</h4>
    <div class="pull-right mb-2">
            <a class="btn btn-success" href="{{ route('apps.index') }}"> नयाँ प्रविष्टि </a>
        </div>
 
  </div>
<form action="{{ route('apps.store') }}" method="POST" >
    @csrf
<div class="card">
   <div class="card-body row">
       <div class="col">
         <div class="col-xs-5 col-sm-5 col-md-5">
             <div class="form-group">
                 <strong>कोड :</strong>
                 <input type="text"  name="code" class="form-control type_nep" placeholder="Code" required>
                 
             </div>
         </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>एप नाम(अंग्रेजी)  :</strong>
                <input type="text" name="name_en" class="form-control type_nep" placeholder=" In English" required >
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
            <div class="form-group">
                <strong>एप नाम(नेपाली)  :</strong>
                <input type="text" name="name_np" class="form-control type_nep" placeholder="नेपालीमा लेख्नुहोस्" required>
            </div>
        </div>
        <div class="col-xs-5 col-sm-5 col-md-5">
        <div class="form-check">
        <label for="status">स्थिति:</label><br>
            <input type="radio" id="true" name="status" value="true">
            <label for="true">true</label><br>
            <input type="radio" id="false" name="status" value="false">
            <label for="false">false</label><br>
        </div>
        </div>

  
       

         <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                <button type="submit" class="btn btn-primary">सुरक्षित गर्नुहोस </button>
        </div>
    </div>
  </div>
</div>
   
</form>





@endsection