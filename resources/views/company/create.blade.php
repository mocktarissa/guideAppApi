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

        <h1>Welcome to the Dashboard</h1>
        longlatt
        <form action="/company/store/" method="post">
            @csrf
            <label for="name">Company Name</label>
            <input type="text" id="name" name="name">
            <label for="adress">Address</label>
            <input type="text" id="adress" name="address">
            <label for="phone_number">Phone Number</label>
            <input type="tel" id="phone_number" name='phone_number'>
            <label for="website"> Website </label>
            <input type="url" name='website' id='website'>

            <button type="submit">Create</button>
        </form>

    </body>

    </html>


</html>