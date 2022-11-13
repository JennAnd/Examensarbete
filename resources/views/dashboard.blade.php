<head>
    <link rel="stylesheet" href="../stylesheets/dashboard.css">
</head>
@include('profilenavbar')
<div class="dashboard-body">
    <div class="grid-container">
        <div class="item1">
            <p>Hello, {{ $user->firstname . " " . $user->lastname}}!</p>
            <p> @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            </p>
        </div>
        <div class="item2">
            @include('sidenav')
        </div>

        <div class="item3">
            <!-- Booked yoga classes -->
            <h2>Your booked yogaclasses</h2>
            @foreach ($bookedYogaclasses as $yogaclass)
            <div class="yogaclass">
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
                    <button class="button-booked" type="submit" onclick="return confirm('Do you want to cancel this yoga class?')">Cancel</button>
                </form>
            </div>
            @endforeach
        </div>


        <div class="item4">
            <!-- Not booked yoga classes -->
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
                    <input type="hidden" value="<?= $yogaclass->id ?>" name="id" id="id">
                    @if ($user->total_classes > 0 && $yogaclass->available > 0)
                    <button type="submit" onclick="return confirm('Do you want to book?')">Book</button>
                    @else
                    <button disabled>Book</button>
                    @endif
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
