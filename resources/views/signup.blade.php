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
    <form method="post" action="signup">
        @csrf
        <div>
            <label for="firstname">First name</label>
            <input name="firstname" id="firstname" type="text" />
        </div>
        <div>
            <label for="lastname">Last name</label>
            <input name="lastname" id="lastname" type="text" />
        </div>
        <div>
            <label for="email">Email</label>
            <input name="email" id="email" type="email" />
        </div>
        <div>
            <label for="password">Password</label>
            <input name="password" id="password" type="password" />
        </div>
        <button type="submit">Sign up</button>
    </form>


</body>

</html>
