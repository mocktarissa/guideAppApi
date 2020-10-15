<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Dashboard</title>
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
    <form action="{{route('company.pois.update',['company'=>$company,'poi'=>$poi->id])}}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Name of Attraction</label>
        <input type="text" id="name" name="name" value="{{$poi->name}}">
        <label for="location">Location</label>
        <input type="text" id="location" name="location" value="{{$poi->location}}">
        <label for="description">Description</label>
        <input type="text" id="description" name='description' value="{{$poi->description}}">
        <label for="url"> Url </label>
        <input type="url" name='url' id='url' value="{{$poi->url}}">
        <select name="category">

            <option value="{{$poi->category->id}}">{{$poi->category->name}}</option>

        </select>
        <button type="submit">Save</button>
    </form>



</body>

</html>