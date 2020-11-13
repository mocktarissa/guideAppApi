<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>

    <h1>Welcome to the Dashboard</h1>
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

        <form action="{{route('company.pois.update',['company'=>$company,'poi'=>$poi->id])}}" method="post">
            @csrf
            @method('PUT')
            <label for="name">Name of Attraction</label>
            <input type="text" id="name" name="name" class="form-control" value="{{$poi->name}}">
            <label for="location">Location</label>
            <input type="text" id="location" name="location" class="form-control" value="{{$poi->location}}">
            <label for="description">Description</label>
            <input type="text" id="description" name='description' class="form-control" value="{{$poi->description}}">
            <br>
            <label for="url"> Url </label>
            <input type="url" name='url' id='url' class="form-control" value="{{$poi->url}}">
            <label for="url"> Category </label>
            <input type="text" name="category" class="form-control" value="{{$poi->category->name}}">

            <label for="picture1"> Url </label>
            <input type="file" name='picture1' id='picture1' class="form-control" value="{{$poi->picture1}}">




            <label for="picture2"> Url </label>
            <input type="file" name='picture2' id='picture2' class="form-control" value="{{$poi->picture2}}">

            <label for="picture3"> Url </label>
            <input type="file" name='picture3' id='picture3' class="form-control" value="{{$poi->picture3}}">

            <label for="picture1"> Url </label>
            <input type="file" name='picture4' id='picture4' class="form-control" value="{{$poi->picture4}}">



            <label for="picture5"> Url </label>
            <input type="file" name='picture5' id='picture5' class="form-control" value="{{$poi->picture5}}">

            <label for="picture6"> Url </label>
            <input type="file" name='picture6' id='picture6' class="form-control" value="{{$poi->picture6}}">
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>



</body>

</html>