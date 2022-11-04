@extends('layout')
@section('content')

<body>
    <img class="memberships-image" src="/assets/memberships.webp" />
    <h1 class="member-heading"> Our memberships</h1>

    @foreach ($memberships as $membership)
    <div>
        <p>{{$membership->membershipType}}</p>
        <p>{{$membership->membershipPrice}}</p>
        <p>{{$membership->membershipInfo}}</p>
    </div>
    @endforeach
</body>

</html>
@endsection
