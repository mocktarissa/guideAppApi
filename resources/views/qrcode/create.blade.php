<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>
    <div class="container" style="margin-top: 20vh;">

        <h1>Create a new POI</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="container">
            Map a new QR Code
            <form class='container' action="{{route('qrcode.store',['company'=>$company])}}" method="post" enctype="multipart/form-data">
                <div class="form-group">

                    @csrf
                    <label for="poi">Poi</label>
                    <input type="text" id="poi" name="poi_id" class="form-control">
                    <label for="location">Value</label>
                    <input type="text" id="location" name="value" class="form-control">
                    <br>
                    <label for="url"> Url </label>
                    <input type="url" name='url' id='url' class="form-control">
                    <!-- I can auto fill the category $category->name -->
                    <br>
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </form>
        </div>

        <a href="/company/view?id={{$company}}" class="btn btn-primary">Return to lIst</a>

        <a href="{{route('company.index')}}" class="btn btn-info">Return to Main list</a>

    </div>
</body>

</html>