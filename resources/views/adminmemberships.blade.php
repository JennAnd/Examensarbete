<body>
    @include('profilenavbar')

    <div class="adminpanel-body">

        <div class="side-nav">
            <ul>
                <li><a href="/adminpanel">Översikt</a></li>
                <li><a href="/adminmemberships">Memberships</a></li>
                <li><a href="/invoices">Invoices</a></li>
                <li><a href="logout">Logout</a></li>
            </ul>
        </div>

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
</body>
