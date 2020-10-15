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
    I am in here

    <p>Id: {{ $company->id }}</p>
    <p>This is: {{ $company->name }}</p>
    <p>Website: {{ $company->website }}</p>
    <form action="/company/delete" method="post">
        <button type="submit">
            Delete
        </button>
    </form>
    <a href="{{route('company.pois.index',$company->id)}}">Show Poi</a>
    <a href="/company/{{$company->id}}/pois/create">Create New Poi</a>
    <a href="{{route('company.index')}}">Return to Main list</a>

</html>