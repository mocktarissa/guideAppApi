<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @livewireStyles
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    @routes
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

</head>

<body>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table container">
        <thead>
            <th> <b>#</b></th>
            <th>Name</th>
            <th>Location</th>
            <th>Description</th>
            <th>Url</th>
            <th>Category</th>
            <th colspan="4">Action</th>
        </thead>
        @php($itter=1)
        <tbody>
            @foreach ($pois as $p)
            <tr style="align-items: center;">

                <td style="vertical-align: middle;">{{$itter}}</td>
                @php($itter++)
                <td style="vertical-align: middle;">{{$p->name}}</td>
                <td style="vertical-align: middle;">{{$p->location}}</td>
                <td style="vertical-align: middle;">{{$p->description}}</td>
                <td style="vertical-align: middle;">{{$p->url}}</td>
                <td style="vertical-align: middle;">{{$p->category->name}}</td>
                <td colspan="5">
                    <form action="{{ route('company.pois.destroy', ['company'=>$company,'poi'=>$p->id]) }}" method="POST">
                        <a style=" margin-top:2px" href="{{ route('company.pois.show', ['company'=>$company,'poi'=>$p->id]) }}" title="show" class="btn btn-primary">
                            <i class="fas fa-eye text-success  fa-lg"></i> Show
                        </a>
                        <a style=" margin-top:2px" href="{{ route('company.pois.edit', ['company'=>$company,'poi'=>$p->id]) }}" class="btn btn-warning">
                            <i class="fas fa-edit  fa-lg"></i> Edit

                        </a>
                        @csrf
                        @method('DELETE')

                        <button style=" margin-top:2px" type="submit" title="delete" class="btn btn-danger">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <br>
    <div class="container">

        <a href="{{route('company.pois.create',$company)}}" class="btn btn-warning">Create New Poi</a>
        <a href="{{route('company.index')}}" class="btn btn-info">Return to Main list</a>
    </div>

</body>

</html>