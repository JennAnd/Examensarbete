<body>
    <h1>Adminpanel</h1>

    <div class="side-nav">
        <ul>
            <li><a href="/adminpanel">Översikt</a></li>
            <li><a href="/invoices">Invoices</a></li>
        </ul>
    </div>

    <p>Do you want to <a href="logout">logout?</a></p>

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    </nav>
    <form method="post" action="make-yogaclass">
        @csrf
        <div>
            <label for="class_name">Class name</label>
            <input name="class_name" id="class_name" type="text" required />
        </div>
        <div>
            <label for="teacher">Teacher</label>
            <input name="teacher" id="teacher" type="text" required />
        </div>
        <div>
            <label for="date">Date</label>
            <input name="date" id="date" type="date" required />
        </div>
        <div>
            <label for="time">Time</label>
            <input name="time" id="time" type="time" required />
        </div>
        <div>
            <label for="class-length">Length</label>
            <input name="class-length" id="class-length" type="number" required />
        </div>
        <div>
            <label for="available">Available spots</label>
            <input name="available" id="available" type="number" required />
        </div>
        <div>
            <label for="reserved">Reserved</label>
            <input name="reserved" id="reserved" type="number" required />
        </div>
        <button type="submit">Add class</button>
    </form>
    @foreach ($yogaclasses as $yogaclass)

    <div>
        <p>{{$yogaclass->class_name}}</p>
        <p>{{$yogaclass->length}} min</p>
        <p>{{$yogaclass->teacher}}</p>
        <p>{{$yogaclass->date}}</p>
        <p>{{ $cleantime = substr($yogaclass->time,0,-3)}}</p>
        <p> Available: {{$yogaclass->available}}</p>
        <p>Reserved: {{$yogaclass->reserved}}</p>
    </div>
    <form action="delete-yogaclass" method="POST">
        @csrf
        <input type="hidden" value="<?= $yogaclass->id ?>" name="yogaclass_id">
        <button>Delete yogaclass</button>
    </form>
    @endforeach

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
</body>

</html>
