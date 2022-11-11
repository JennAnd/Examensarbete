<link rel="stylesheet" href="../stylesheets/profile.css">
@include('profilenavbar')
@include('sidenav')

<body>
    <div class="profile-body">
        <h1> Profile </h1>



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
    </div>
</body>

</html>
