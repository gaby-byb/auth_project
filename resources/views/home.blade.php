<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@auth
    <p>congrats you are logged in</p>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@else
    <div>
        <h2>Register</h2>
        <form action="/register" method="post">
            @csrf
            <input type="text" name="name" placeholder="name">
            <input type="text" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <button type="submit">Register</button>
        </form>  

    </div>
@endauth

</body>
</html>