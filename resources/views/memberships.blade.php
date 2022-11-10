@extends('layout')
@section('content')

<body>
    <img class="memberships-image" src="/assets/memberships.webp" />
    <h1 class="member-heading"> Our memberships</h1>

    @foreach ($memberships as $membership)
    <div>
        <p>{{$membership->type}}</p>
        <p>{{$membership->price}}</p>
        <p>Valid thru:</p>
    </div>
    @endforeach
</body>

</html>
@endsection
