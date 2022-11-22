<link rel="stylesheet" href="../stylesheets/profile.css">
@include('profilenavbar')

<div class="profile-body">
    <div class="grid-container">
        <div class="item1">
            @if(session()->has('message'))
            <div class="session-message">
                {{ session()->get('message') }}
            </div>
            @endif
        </div>
        <div class="item2">
            @include('sidenav')
        </div>
        <div class="filler-item"></div>
        <div class="item3">
            <h2 class="profile-heading">Please confirm your info to purchase</h2>
            <div class="profile-info">
                <div class="contact-info">
                    <p><b>Contact info</b></p>
                </div>
                <p>{{$user->firstname}} {{$user->lastname}}</p>
                <p>{{$user->email}}</p>
                <p>{{$user->address}}</p>
                <p>{{$user->postal_code}}</p>
                <p>{{$user->city}}</p>
                <p>{{$user->country}}</p>
            </div>
            <div class="buy-membership-form">
                <div class="shopping-cart">
                    <p>You have chosen:</p>
                    <p>Membership type: {{$membership->type}}</p>
                    <p>Membership price: ${{$membership->price}}.00</p>
                    <p>VAT: ${{$VAT = $membership->price * 0.2}}.00</p>
                    <p class="shopping-cart-total">Total price: ${{$membership->price + $VAT}}.00</p>
                    <p>Please type in your password below to confirm your purchase</p>
                </div>
                <form class="form-membership" action="buy-membership" method="post">
                    @csrf
                    <input class="hidden-value" type="hidden" value="">
                    <div class="input-column">
                        <label for="">Password</label>
                        <div class="password-field">
                            <input type="password" name="password" id="password">
                            <button type="submit" class="button-confirm">Confirm & buy</button>
                        </div>
                    </div>
                    @if (isset($_GET["hidden-input-amount"] ))
                    <input type="hidden" name="amount_classes" id="amount_classes" value="<?= $_GET['hidden-input-amount'] ?>">
                    @endif
                    @if (isset($_GET["hidden-input-id"] ))
                    <input type="hidden" name="membership_id" id="membership_id" value="<?= $_GET['hidden-input-id'] ?>">
                    @endif
                </form>
                <form action="/profile">
                    <button class="button-buy">Cancel</button>
                </form>
            </div>
        </div>
        <img class="profile-image" src="assets/memberships.webp" alt="">
    </div>

    <script src="/scripts/profile.js"></script>
