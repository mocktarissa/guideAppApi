<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>
    <div class="container form-group">

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                {{ __('Logout') }}
            </x-jet-responsive-nav-link>
        </form>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <h1>Edit </h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('company.update', $company->id) }}" method="post">
            <div class="form-group">
                @csrf
                @method('PUT')
                <label for="name">Company Name</label>
                <input type="text" id="name" name="name" value="{{ $company->name }}" class="form-control">

                <label for=" phone_number">Phone Number</label>
                <input type="tel" id="phone_number" name='phone_number' value="{{ $company->phone_number }}" class="form-control">
                <label for=" website"> Website </label>
                <input type="url" name='website' id='website' value="{{ $company->website }}" class="form-control">


                <label for="city">City</label>
                <input type="text" id="city" name="city" class="form-control" value="{{$company->city}}">

                <label for='province'>Province</label>
                <input type="text" id='province' name='province' class="form-control" value="{{$company->province}}">

                <label for='neighbourhood'>Neighbourhood</label>
                <input type="text" id='neighbourhood' name='neighbourhood' class="form-control" value="{{$company->neighbourhood}}">

                <label for='address_line1'>Address Line 1</label>
                <input type="text" id='address_line1' name='address_line1' class="form-control" value="{{$company->address_line1}}">

                <label for='address_line2'>Address Line 2</label>
                <input type="text" id='address_line2' name='address_line2' class="form-control" value="{{$company->address_line2}}">

                <label for='postal_code'>Postal Code</label>
                <input type="text" id='postal_code' name='postal_code' class="form-control" value="{{$company->postal_code}}">



                <div>

                    <label for="logo"> Company Logo </label>
                    <br>
                    <img src="{{$company->logo}}" alt="logo" width="60">
                    <input type="file" name='logo' id='logo' class="form-control">
                    <br>

                </div>
                <button type="submit" class='btn btn-primary'>Save</button>
                <a href="{{route('company.index')}}" class="btn btn-info">Return to Main list</a>
            </div>
        </form>

    </div>
</body>

</html>