@extends('layout')
@section('content')
<form action="{{ route('background.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card text-center">
        <div class="card-header">
                <h2>App Assign</h2></div>
        <div class="card-body row">
            <div class="col">
                <div class>
                    <div class="form-group">
                        <strong> Clients:</strong>

                        @if(auth()->id() == 1)
                        <select name="client_id" id="client_id">
                            @foreach ($app_client as $clients)
                            <option value="{{$clients->id}}">{{$clients->name_np}}</option>
                            @endforeach
                        </select>
                        @else
                        <input type="text" name="client_id" value="{{$user = auth()->user()->client_id}}"
                            hidden>{{$user = auth()->user()->name}}</input>

                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <strong>Background Image:</strong>
                    <input type="file" name="image">
                </div>
                <div class=" text-center">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection