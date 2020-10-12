<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>

    <h1>Welcome to the Dashboard</h1>

    <form action="/login" method="post">
        <label for="name">Name</label>
        <input type="text" id="name">
        <input type="email" name="email" id="email">
        <input type="password" name="password" id="passowrd">
        <button type="submit">Login</button>
    </form>
    <p>

        <em>New here ?</em> <a href="/signup">Sign up</a>
    </p>
</body>

</html>