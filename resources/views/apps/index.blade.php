@extends('layout')

@section('content')


<div class="row">
   
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>एप सूची </h2>
        </div>

        <div class="pull-right mb-2">
            <a class="btn btn-success" href="{{ route('apps.create') }}"> नयाँ प्रविष्टि </a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-dark">
    <tr>
        <th>नं.</th>
        <th>कोड </th>
        <th>अंग्रेजी नाम</th>
        <th>नेपाली नाम</th>
        <th>स्थिति</th>


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
                <a class="btn btn-primary" href="{{ route('apps.edit',$apps->id) }}">सच्याउने</a>
                @csrf
                @method('DELETE')



                <button type="submit" onclick="return myFunction();" class="btn btn-danger">मेटाउने</button>

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