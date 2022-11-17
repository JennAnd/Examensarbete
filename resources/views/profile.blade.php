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
            <h2 class="profile-heading">Please confirm your password to purchase.</h2>
            <div>
                <form action="">
                    <input class="hidden-value" type="hidden" value="">
                    <div class="input-column">
                        <label for="">Password</label>
                        <div class="password-field">
                            <input type="password">
                            <button type="submit" class="button-edit-contact">Confirm</button>
                        </div>
                    </div>
                    <div class="input-column">
                        <label for="">Testd</label>
                        <div>
                            <input class="test-input" type="text" value="hej">
                            <button type="submit" class="button-edit-contact">Confirm</button>
                        </div>
                    </div>
                    @if (isset($_GET["hidden-input-amount"] ))
                    <div>
                        {{ $_GET['hidden-input-amount'] }}
                    </div>
                    @else
                    <div>hello</div>
                    @endif

                    @if (isset($_GET["hidden-input-id"] ))
                    <div>

                        {{ $_GET['hidden-input-id'] }}
                    </div>
                    @else
                    <div>hello</div>
                    @endif
                </form>
            </div>
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
            <div class="edit-form">
                <form class="edit-contact" method="POST" action="/edit-contact">
                    @csrf
                    <div class="edit-contact-heading">
                        <p class="edit-contact-title"><b>Edit contact info</b></p>
                        <button class="button-edit-contact" type="submit" class="button-save-contact">Save</button>
                    </div>
                    <div class="input-column">
                        <label for="">First name</label>
                        <input required type="text" name="firstname" id="firstname" value="<?= $user->firstname ?>">
                    </div>
                    <div class="input-column">
                        <label for="">Last name</label>
                        <input required type="text" name="lastname" id="lastname" value="<?= $user->lastname ?>">
                    </div>
                    <div class="input-column">
                        <label for="">Email</label>
                        <input required type="email" name="email" id="email" value="<?= $user->email ?>">
                    </div>
                    <div class="input-column">
                        <label for="">Address</label>
                        <input required type="text" name="address" id="address" value="<?= $user->address ?>">
                    </div>
                    <div class="input-column">
                        <label for="">Postal Code</label>
                        <input required type="number" name="postal_code" id="postal_code" value="<?= $user->postal_code ?>">
                    </div>
                    <div class="input-column">
                        <label for="">City</label>
                        <input required type="text" name="city" id="city" value="<?= $user->city ?>">
                    </div>
                    <div class="input-column">
                        <label for="">Country</label>
                        <input required type="text" name="country" id="country" value="<?= $user->country ?>">
                    </div>

                </form>
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
                <div class="hidden-membership-amount">{{$membership->amount_classes}}</div>
                <div class="hidden-membership-id">{{$membership->id}}</div>
                <form action="profile" method="get">
                    <input class="hidden-input-amount" name="hidden-input-amount" id="hidden-input-amount" type="hidden" value="<?= $membership->amount_classes ?>">
                    <input class="hidden-input-id" name="hidden-input-id" id="hidden-input-id" type="hidden" value="<?= $membership->id ?>">
                    <button type="submit" class="button-buy">Buy</button>
                </form>
            </div>
            @endforeach

        </div>
        <!-- <div class="item5"></div> -->
    </div>
    <img class="profile-image" src="assets/memberships.webp" alt="">

</div>

<script src="/scripts/profile.js"></script>
