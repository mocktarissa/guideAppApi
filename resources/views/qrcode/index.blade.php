@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div>
    @foreach ($qrcodes as $qrcode)
    <p>
        qrcode
    </p>
    @endforeach
    {{$qrcodes}}
</div>



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
            @foreach ($qrcodes as $p)
            <tr style="align-items: center;">

                <td style="vertical-align: middle;">{{$itter}}</td>
                @php($itter++)
                <td style="vertical-align: middle;">{{$p->poi_id}}</td>
                <td style="vertical-align: middle;">{{$p->value}}</td>


            </tr>
            @endforeach

        </tbody>
    </table>
    <br>
    <div class="container">

        <a href="{{route('company.pois.create',$company)}}" class="btn btn-warning">Create New Poi</a>
        <a href="{{route('company.index')}}" class="btn btn-info">Return to Main list</a>
        <a href="{{route('company.qrcode.create',$company)}}" class="btn btn-secondary">Create Qr code</a>
    </div>

</body>

</html>