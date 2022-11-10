@extends('layout')
@section('content')

<body>

    <h1> Profile </h1>

    <div class="side-nav">
        <ul>
            <li><a href="/dashboard">Översikt</a></li>
            <li><a href="/profile">My profile</a></li>
            <li><a href="/payments">Payments</a></li>
        </ul>
    </div>


    <h2>Your membership</h2>
    <div>
        <p>Saldo: {{$total_classes}}</p>
    </div>

    <h2>Buy a membership</h2>
    @foreach ($memberships as $membership)

    <div>
        <p>{{$membership->type}}</p>
        <p>{{$membership->price}}</p>
        <form method="POST" action="buy-membership">
            @csrf
            <input type="hidden" value="<?= $membership->amount_classes ?>" name="amount_classes">
            <input type="hidden" value="<?= $membership->id ?>" name="membership_id">
            <button type="submit" onclick="return confirm('Are you sure you want to buy this membership? You will be sent an invoice.')">Buy</button>
        </form>
    </div>

    @endforeach
    </div>
</body>

</html>
@endsection
