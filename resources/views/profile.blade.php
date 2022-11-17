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

                <form action="profileconfirm" method="get">
                    <input class="hidden-input-amount" name="hidden-input-amount" id="hidden-input-amount" type="hidden" value="<?= $membership->amount_classes ?>">
                    <input class="hidden-input-id" name="hidden-input-id" id="hidden-input-id" type="hidden" value="<?= $membership->id ?>">
                    <button type="submit" class="button-buy" onclick="return confirm('Are you sure you want to buy?')">Buy</button>
                </form>
            </div>
            @endforeach

        </div>
        <!-- <div class="item5"></div> -->
    </div>
    <img class="profile-image" src="assets/memberships.webp" alt="">

</div>

<script src="/scripts/profile.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    function functionAlert(msg, myYes) {
        var confirmBox = $("#confirm");
        confirmBox.find(".message").text(msg);
        confirmBox.find(".yes").unbind().click(function() {
            confirmBox.hide();
        });
        confirmBox.find(".yes").click(myYes);
        confirmBox.show();
    }
</script>
<style>
    #confirm {
        display: none;
        background-color: #F3F5F6;
        color: #000000;
        border: 1px solid #aaa;
        position: fixed;
        width: 300px;
        height: 100px;
        left: 40%;
        top: 40%;
        box-sizing: border-box;
        text-align: center;
    }

    #confirm button {
        background-color: #FFFFFF;
        display: inline-block;
        border-radius: 12px;
        border: 4px solid #aaa;
        padding: 5px;
        text-align: center;
        width: 60px;
        cursor: pointer;
    }

    #confirm .message {
        text-align: left;
    }
</style>
</head>

<body>
    <div id="confirm">
        <div class="message">This is a warning message.</div><br>
        <button class="yes">OK</button>
    </div>
    <input type="button" value="Click Me" onclick="functionAlert();" />
</body>

</html> -->
