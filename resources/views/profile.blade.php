<link rel="stylesheet" href="../stylesheets/profile.css">
@include('profilenavbar')


<div class="profile-body">
    <div class="grid-container">
        <div class="item1">

        </div>
        <div class="item2">
            @include('sidenav')
        </div>
        <div class="filler-item"></div>
        <div class="item3">
            <h2 class="profile-heading">Your membership</h2>

            <div class="balance">
                <p class="contact-info"><b>Balance</b></p>
                <p>{{$total_classes}} classes</p>

            </div>
            <div class="profile-info">
                <div class="contact-info">
                    <p><b>Contact info</b></p>
                    <button class="button-edit-contact">Edit</button>
                </div>
                <p>{{$user->firstname}} {{$user->lastname}}</p>
                <p>{{$user->email}}</p>
                <p>{{$user->address}}</p>
                <p>{{$user->postal_code}}</p>
                <p>{{$user->city}}</p>
                <p>{{$user->country}}</p>
            </div>

        </div>

        <div class="item4">
            <h2 class="profile-heading">Buy classes</h2>
            @foreach ($memberships as $membership)
            <div class="created-membership">
                <div>
                    <p class="created-title">{{$membership->type}}</p>
                    <p class="created-price">{{$membership->price}} USD</p>
                </div>
                <form method="POST" action="buy-membership">
                    @csrf
                    <input type="hidden" value="<?= $membership->amount_classes ?>" name="amount_classes">
                    <input type="hidden" value="<?= $membership->id ?>" name="membership_id">
                    <button class="button-buy" type="submit" onclick="return confirm('Are you sure you want to buy this membership? You will be sent an invoice.')">Buy</button>
                </form>
            </div>
            @endforeach

        </div>
        <!-- <div class="item5"></div> -->
    </div>
    <img class="profile-image" src="assets/memberships.webp" alt="">
</div>
