<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>
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

    <div class="container">
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
        <form action="/company" method="post" enctype="multipart/form-data">
            @csrf
            <label for="name">Company Name</label>
            <input type="text" id="name" name="name" class="form-control">
            <label for="phone_number">Phone Number</label>
            <input type="tel" id="phone_number" name='phone_number' class="form-control">
            <label for="website"> Website </label>
            <input type="url" name='website' id='website' class="form-control">

            <label for="city">City</label>
            <input type="text" id="city" name="city" class="form-control">

            <label for='province'>Province</label>
            <input type="text" id='province' name='province' class="form-control">

            <label for='neighbourhood'>Neighbourhood</label>
            <input type="text" id='neighbourhood' name='neighbourhood' class="form-control">

            <label for='address_line1'>Address Line 1</label>
            <input type="text" id='address_line1' name='address_line1' class="form-control">

            <label for='address_line2'>Address Line 2</label>
            <input type="text" id='address_line2' name='address_line2' class="form-control">

            <label for='postal_code'>Postal Code</label>
            <input type="text" id='postal_code' name='postal_code' class="form-control">

            <label for="logo"> Company Logo </label>
            <input type="file" name='logo' id='logo' class="form-control">

            <label for="longlatt"> Long Latt </label>
            <input type="text" name='longlatt' id='longlatt' class="form-control">

            <button type="submit" class="btn btn-primary">Create</button>
            <a href="/company/list" class="btn">Return to Main list</a>
        </form>
    </div>

</body>

</html>