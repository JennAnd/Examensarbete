<link rel="stylesheet" href="../stylesheets/adminmemberships.css">
@include('profilenavbar')


<div class="adminmemberships-body">
    <div class="grid-container">
        <div class="item1">
            <h1> Make memberships</h1>
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
        </div>
        <div class="item2">
            @include('admin-sidenav')
        </div>
        <div class="item3">

            <div>
                <h1>Memberships</h1>
                <h2>Här visas alla memberships</h2>

                @foreach ($memberships as $membership)
                <div>
                    <p>{{$membership->type}}</p>
                    <p>{{$membership->price}} USD</p>
                </div>
                <form action="delete-membership" method="POST">
                    @csrf
                    <input type="hidden" value="<?= $membership->id ?>" name="membership_id">
                    <button>Delete membership</button>
                </form>
                @endforeach
            </div>
            <div>

            </div>
        </div>
        <div class="item4">

            <div>
                <h2>Här kan man skapa memberships</h2>
                <form action="make-membership" method="post">
                    @csrf
                    <div>
                        <label for="type">Membership type</label>
                        <input name="type" id="type" type="text" required />
                    </div>
                    <div>
                        <label for="price">Price</label>
                        <input name="price" id="price" type="text" required />
                        <p>USD</p>
                    </div>
                    <div>
                        <label for="amount_classes">Amount classes</label>
                        <input name="amount_classes" id="amount_classes" type="text" required />
                    </div>
                    <button type="submit">Add membership</button>
                </form>
            </div>

        </div>
        <!-- <div class="item5"></div> -->
    </div>
</div>
