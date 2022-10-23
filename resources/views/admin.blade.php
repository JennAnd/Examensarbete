<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    @include('errors')
    <form method="post" action="login">
        @csrf
        <div>
            <label for="email">Email</label>
            <input name="email" id="email" type="email" />
        </div>
        <div>
            <label for="password">Password</label>
            <input name="password" id="password" type="password" />
        </div>
        <button type="submit">Login</button>
    </form>

    <h1>HELLO Spain! San fulgencio 300</h1>
    <p>hej jag låtsasatt koda för en video som hanna tar hehhe, ovanför vattnet så det är lite farligt</p>
</body>

</html>
