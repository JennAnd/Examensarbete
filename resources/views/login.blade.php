@extends('layout')
@section('content')

<body>
    <h1> Log in </h1>

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
</body>

</html>
@endsection
