<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Fonts -->

    <!-- Styles -->

    <!-- Scripts -->
    @routes
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
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
            <form action="/company/{{$company}}/pois/" method="post">
                <div class="form-group">

                    @csrf
                    <label for="name">Create a new POI</label>
                    <input type="text" id="name" name="name" class="form-control">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" class="form-control">
                    <label for="description">Description</label>
                    <input type="text" id="description" name='description' class="form-control">
                    <label for="url"> Url </label>
                    <input type="url" name='url' id='url' class="form-control">
                    <br>
                    <select name="category" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <br>
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </form>

            <a href="/company/view?id={{$company}}" class="btn btn-primary">Return to lIst</a>

            <a href="{{route('company.index')}}" class="btn btn-info">Return to Main list</a>

        </div>
    </body>

    </html>


</html>