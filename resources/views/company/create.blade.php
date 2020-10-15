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
        <form action="/company" method="post">
            @csrf
            <label for="name">Company Name</label>
            <input type="text" id="name" name="name" class="form-control">
            <label for="adress">Address</label>
            <input type="text" id="adress" name="address" class="form-control">
            <label for="phone_number">Phone Number</label>
            <input type="tel" id="phone_number" name='phone_number' class="form-control">
            <label for="website"> Website </label>
            <input type="url" name='website' id='website' class="form-control">

            <button type="submit">Create</button>
            <a href="/company/list">Return to Main list</a>
        </form>

    </body>

    </html>


</html>