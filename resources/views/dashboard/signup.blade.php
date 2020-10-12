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
        <label for="name">Company Name</label>
        <input type="text" id="name">
        <label for="taxnumber">Tax Number</label>
        <input type="text" id="taxnumber">
        <label for="category">Category</label>
        <select name="category" id="category">
            <option value="amusementpark">Amusement Park</option>
            <option value="museum">Museum</option>
            <option value="Aquaticpark">Aquatic Parc</option>
            <option value="eventplace">Event Place</option>
        </select>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <button type="submit">Login</button>
    </form>
    <p>
        <em>Already have an account?</em> <a href="/">Log In</a>
    </p>
</body>

</html>