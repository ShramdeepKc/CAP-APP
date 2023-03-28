@extends('layout')

@section('content')
<h2 class="bg-light py-1 px-2">APP LIST</h2>

<div class="row">
    @can('view')
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create App</h2>
        </div>

        <div class="pull-right mb-2">
            <a class="btn btn-success" href="{{ route('apps.create') }}"> Create New App</a>
        </div>
    </div>
</div>
@endcan

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-dark">
    <tr>
        <th>No</th>
        <th>Code</th>
        <th>English Name</th>
        <th>Nepali Name</th>
        <th>Status</th>


        <th width="200px">Action</th>
    </tr>
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
                <a class="btn btn-primary" href="{{ route('apps.edit',$apps->id) }}">Edit</a>
                @csrf
                @method('DELETE')



                <button type="submit" onclick="return myFunction();" class="btn btn-danger">Delete</button>

            </form>
            @endcan
        </td>
    </tr>


    @endforeach
    <script>
    function myFunction() {
        if (!confirm("Are You Sure to delete this"))
            event.preventDefault();
    }
    </script>

</table>






@endsection