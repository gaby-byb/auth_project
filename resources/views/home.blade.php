<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@auth
    <h1>yOU'RE IN</h1>
    <p>congrats you are logged in</p>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <div style="border: 3px solid">
        <h2>Create Post</h2>
        <form action="/create-post" method="post">
            @csrf
            <input type="text" name="title" placeholder="post title">
            <textarea name="body" placeholder="body content.."></textarea>
            <button>Save Post</button>
        </form>

    </div>
@else
    <div style="border: 3px solid">
        <h2>Login</h2>
        <form action="/login" method="post">
            @csrf
            <input type="text" name="loginname" placeholder="name">
            <input type="password" name="loginpassword" placeholder="password">
            <button type="submit">Login</button>
        </form>  

    </div>
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
