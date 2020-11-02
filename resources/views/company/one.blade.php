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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>

<body>
    <div class="container" style="margin-top: 30vh; text-align:center;">

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <h4>

            <b> {{ $company->name }}</b>
        </h4>
        <img src="{{$company->logo}}" alt="" width="150px">
        <div class=" text-center">
            <p>Id: {{ $company->id }}</p>
            <p>This is: {{ $company->name }}</p>
            <p>Website: {{ $company->website }}</p>
            <form action="/company/delete" method="post">
                <button type="submit">
                    Delete
                </button>
            </form>
            <a href="{{route('company.pois.index',$company->id)}}" class="btn btn-primary">Show Poi</a>
            <a href="/company/{{$company->id}}/pois/create" class="btn btn-warning">Create New Poi</a>
            <a href="{{route('company.index')}}" class="btn btn-info">Return to Main list</a>
        </div>
    </div>

</body>

</html>