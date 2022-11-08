<head>
    <link rel="stylesheet" href="../stylesheets/dashboard.css">
</head>

<div class="side-nav">
    <ul>
        <li><a href="/dashboard">Översikt</a></li>
        <li><a href="/profile">My profile</a></li>
        <li><a href="/payments">Payments</a></li>
    </ul>
</div>

<p>Hello, {{ $user->firstname . " " . $user->lastname}}!</p>
<p>{{$user->email}}</p>
<p>Do you want to <a href="logout">logout?</a></p>

<div class="booked-yogaclasses">
    <h2>Your booked yogaclasses</h2>
    @foreach ($bookedYogaclasses as $bookedYogaclass)

    @foreach ($yogaclasses as $yogaclass)
    @if ($bookedYogaclass->yogaclass_id == $yogaclass->id)
    <div>
        <p>{{$yogaclass->class_name}}</p>
        <p>{{$yogaclass->length}} min</p>
        <p>{{$yogaclass->teacher}}</p>
        <p>{{$yogaclass->date}}</p>
        <p>yogaclass id: {{$yogaclass->id}}</p>
        <p>{{ $cleantime = substr($yogaclass->time,0,-3)}}</p>
        <p> Available: {{$yogaclass->available}}</p>
        <form method="POST" action="cancelbooked">
            @csrf
            <input type="hidden" value="<?= $yogaclass->id ?>" name="id" id="id">
            <button>Cancel</button>
        </form>
        @endif
        @endforeach

        <div> hej </div>
        <p> {{$bookedYogaclass->yogaclass_id}}</p>
        @endforeach
    </div>

    <div class="yogaclasses">
        <h2>Yogaclasses</h2>
        @foreach ($yogaclasses as $yogaclass)

        <div>
            <p>{{$yogaclass->class_name}}</p>
            <p>{{$yogaclass->length}} min</p>
            <p>{{$yogaclass->teacher}}</p>
            <p>{{$yogaclass->date}}</p>
            <p>yogaclass id: {{$yogaclass->id}}</p>
            <p>{{ $cleantime = substr($yogaclass->time,0,-3)}}</p>
            <p> Available: {{$yogaclass->available}}</p>

            <form method="POST" action="book">
                @csrf
                <input type="hidden" value="<?= $yogaclass->id ?>" name="id">
                @if ($user->total_classes > 0 && $yogaclass->available > 0)
                <button>Book</button>
                @else
                <button disabled>Book</button>
                @endif
            </form>
        </div>

        @endforeach
    </div>
