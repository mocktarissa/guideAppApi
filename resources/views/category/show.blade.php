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
    <!-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> -->

    <!-- Scripts -->
    @routes
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div>
            Point of interest <p>{{$poi->name}}</p>
        </div>
        <br>
        <div>

            <p>{{$poi->location}}</p>
            <p>{{$poi->description}}</p>
        </div>
        <div>

            </a>
            <form action="{{ route('company.pois.destroy', ['company'=>$company,'poi'=>$poi->id]) }}" method="POST">
                <a href="{{ route('company.pois.edit', ['company'=>$company,'poi'=>$poi->id]) }}" class="form-control" style='display:inline'>
                    <i class="fa fa-edit  fa-lg"></i> Edit

                </a>
                <!-- // sends token -->
                @csrf
                @method('DELETE')

                <a type="submit" title="delete" style="border: none; background-color:transparent;" class="form-control" style='display:inline'>
                    <i class="fa fa-trash fa-lg text-danger"></i>
                    Delete
                </a>
            </form>
        </div>
    </div>

</html>