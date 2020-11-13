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

            <form class='container' action="{{route('company.pois.store',['company'=>$company])}}" method="post" enctype="multipart/form-data">
                <div class="form-group">

                    @csrf
                    <label for="name">Create a new POI</label>
                    <input type="text" id="name" name="name" class="form-control">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" class="form-control">
                    <label for="description">Description</label>
                    <textarea id="description" name='description' class="form-control">

                    </textarea>
                    <br>
                    <label for="url"> Url </label>
                    <input type="url" name='url' id='url' class="form-control">

                    <label for="category"> Url </label>
                    <input type="text" id='category' name="category" class="form-control">

                    <label for="picture1"> Picture </label>
                    <input type="file" name='picture1' id='picture1' class="form-control">




                    <label for="picture2"> Picture </label>
                    <input type="file" name='picture2' id='picture2' class="form-control">

                    <label for="picture3"> Picture </label>
                    <input type="file" name='picture3' id='picture3' class="form-control">

                    <label for="picture1"> Picture</label>
                    <input type="file" name='picture4' id='picture4' class="form-control">



                    <label for="picture5"> Picture </label>
                    <input type="file" name='picture5' id='picture5' class="form-control">

                    <label for="picture6"> Picture </label>
                    <input type="file" name='picture6' id='picture6' class="form-control">
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