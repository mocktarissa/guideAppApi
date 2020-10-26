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

        <form action="{{route('company.pois.update',['company'=>$company,'poi'=>$poi->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="name">Name of Attraction</label>
            <input type="text" id="name" name="name" value="{{$poi->name}}" class='form-control'>
            <label for="location">Location</label>
            <input type="text" id="location" name="location" value="{{$poi->location}}" class='form-control'>
            <label for="description">Description</label>
            <input type="text" id="description" name='description' value="{{$poi->description}}" class='form-control'>
            <label for="url"> Url </label>
            <input type="url" name='url' id='url' value="{{$poi->url}}" class='form-control'>
            <label for="category"></label>
            <select name="category" class='form-control' id="category">
                <label for="picture1"> Url </label>
                <input type="file" name='picture1' id='picture1' class="form-control">




                <label for="picture2"> Url </label>
                <input type="file" name='picture2' id='picture2' class="form-control">

                <label for="picture3"> Url </label>
                <input type="file" name='picture3' id='picture3' class="form-control">

                <label for="picture1"> Url </label>
                <input type="file" name='picture4' id='picture4' class="form-control">

                <label for="picture5"> Url </label>
                <input type="file" name='picture5' id='picture5' class="form-control">

                <label for="picture6"> Url </label>
                <input type="file" name='picture6' <option value="{{$poi->category->id}}">{{$poi->category->name}}</option>

            </select>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>



</body>

</html>