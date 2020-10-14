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
        <form action="/company/{{$company}}/pois/" method="post">
            @csrf
            <label for="name">Name of Attraction</label>
            <input type="text" id="name" name="name">
            <label for="location">Location</label>
            <input type="text" id="location" name="location">
            <label for="description">Description</label>
            <input type="text" id="description" name='description'>
            <label for="url"> Url </label>
            <input type="url" name='url' id='url'>
            <select name="category">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <button type="submit">Create</button>
        </form>

        <a href="/company/view?id={{$company}}">Return to lIst</a>

        <a href="/company/list">Return to Main list</a>

    </body>

    </html>


</html>