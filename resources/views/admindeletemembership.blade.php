<link rel="stylesheet" href="../stylesheets/adminmemberships.css">
<link rel="stylesheet" href="../stylesheets/popup.css">
@include('adminnavbar')

<div class="adminmemberships-body">
    <div class="grid-container">
        <div class="item1">
            @if(session()->has('message'))
            <div class="session-message">
                {{ session()->get('message') }}
            </div>
            @endif
        </div>
        <div class="item2">
            @include('admin-sidenav')
        </div>
        <div class="item3">

            <div>
                <h2 class="yogaclasses-heading">Memberships</h2>

                @foreach ($memberships as $membership)
                <div class="membership-item">
                    <div>
                        <p>{{$membership->type}}</p>
                        <p>{{$membership->price}} USD</p>
                    </div>
                    <form action="delete-membership" method="POST">
                        @csrf
                        <input type="hidden" value="<?= $membership->id ?>" name="membership_id">
                        <button class="adminpanel-button" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                    </form>
                </div>
                @endforeach
            </div>
            <div>
            </div>
        </div>
        <div class="item4">

            <div>
                <h2 class="yogaclasses-heading">Create membership</h2>
                <form action="make-membership" method="post">
                    @csrf
                    <div class="input-column">
                        <label for="type">Membership type</label>
                        <input name="type" id="type" type="text" required />
                    </div>
                    <div class="input-column">
                        <label for="price">Price</label>
                        <input name="price" id="price" type="number" required placeholder="USD" />
                    </div>
                    <div class="input-column">
                        <label for="amount_classes">Amount classes</label>
                        <input name="amount_classes" id="amount_classes" type="number" required />
                    </div>
                    <button type="submit" class="adminpanel-button">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Pop up -->
<div class="popup-background"></div>
<div class="popup-box">
    <div class="popup-details">
        <p class="popup-heading">Membership details</p>
        <p>{{$chosen_membership->type}}</p>
        <p>{{$chosen_membership->price}} USD</p>


    </div>
    <div>
        <p class="popup-confirm">
            Are you sure you want to delete?
        </p>
    </div>
    <div class="buttons">
        <form action="/adminmemberships">
            <button class="cancel-button">Cancel</button>
        </form>
        <form action="/delete-membership" method="POST">
            @csrf
            <input type="hidden" value="<?= $_GET['membership_id'] ?>" name="membership_id" id="membership_id">
            <button class="book-button">Yes</button>
        </form>
    </div>
</div>
