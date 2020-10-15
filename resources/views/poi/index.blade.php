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
</head>

<body>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table>
        <thead>
            <th>No</th>
            <th>Name</th>
            <th>Location</th>
            <th>Description</th>
            <th>Url</th>
            <th>Category</th>
            <th>Action</th>
        </thead>
        @php($itter=1)
        <tbody>
            <tr>
                @foreach ($pois as $p)

                <td>{{$itter}}</td>
                @php($itter++)
                <td>{{$p->name}}</td>
                <td>{{$p->location}}</td>
                <td>{{$p->description}}</td>
                <td>{{$p->url}}</td>
                <td>{{$p->category->name}}</td>
                <td>
                    <a href="{{ route('company.pois.show', ['company'=>$company,'poi'=>$p->id]) }}" title="show">
                        <i class="fas fa-eye text-success  fa-lg"></i> Show
                    </a>
                    <form action="{{ route('company.pois.destroy', ['company'=>$company,'poi'=>$p->id]) }}" method="POST">
                        <a href="{{ route('company.pois.edit', ['company'=>$company,'poi'=>$p->id]) }}">
                            <i class="fas fa-edit  fa-lg"></i> Edit

                        </a>
                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                            Delete
                        </button>
                    </form>

                </td>
                @endforeach
            </tr>

        </tbody>
    </table>


    <a href="{{route('company.pois.create',$company)}}">Create New Poi</a>
    <a href="{{route('company.index')}}">Return to Main list</a>

</html>