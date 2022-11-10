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
{{date('Y-m-d')}}
{{date('h:i:s')}}
{{time()}}
{{strtotime('now')}}

@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<p>Hello, {{ $user->firstname . " " . $user->lastname}}!</p>
<p>Do you want to <a href="logout">logout?</a></p>

<div class="overview">
    <div class="booked-yogaclasses">
        <h2>Your booked yogaclasses</h2>
        @foreach ($bookedYogaclasses as $yogaclass)

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
                <button type="submit" onclick="return confirm('Do you want to cancel this yoga class?')">Cancel</button>
            </form>

            @endforeach
        </div>
    </div>
    <div>
        <div class="yogaclasses">
            <h2>Yogaclasses</h2>

            @foreach ($notBookedYogaclasses as $yogaclass)

            <div>
                <p>{{$yogaclass->class_name}}</p>
                <p>{{$yogaclass->length}} min</p>
                <p>{{$yogaclass->teacher}}</p>
                <p>{{$yogaclass->date}}</p>
                <p>yogaclass id: {{$yogaclass->id}}</p>
                <p>{{ $cleantime = substr($yogaclass->time,0,-3)}}</p>
                <p>{{strtotime($yogaclass->time)}}</p>
                <p>{{strtotime($yogaclass->date)}}</p>
                <p> Available: {{$yogaclass->available}}</p>

                <form method="POST" action="book">
                    @csrf
                    <input type="hidden" value="<?= $yogaclass->id ?>" name="id">
                    @if ($user->total_classes > 0 && $yogaclass->available > 0)
                    <button type="submit" onclick="return confirm('Do you want to book?')">Book</button>
                    @else
                    <button disabled>Book</button>
                    @endif
                </form>
            </div>

            @endforeach
        </div>
    </div>
</div>
