@extends('layout')
@section('content')
@include('errors')

<h1>
    Admin login
</h1>
<form method="post" action="login-admin">
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
@endsection
