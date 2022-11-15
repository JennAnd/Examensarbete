<head>
    <link rel="stylesheet" href="../stylesheets/dashboard.css">
</head>
@include('profilenavbar')
<div class="dashboard-body">
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
            <!-- Booked yoga classes -->
            <h2 class="yogaclasses-heading">Your booked yogaclasses</h2>
            @foreach ($bookedYogaclasses as $yogaclass)
            <p class="yogaclass-date">{{date("D j/m", strtotime($yogaclass->date));}}</p>
            <div class="yogaclass">
                <div class="yogaclass-details">
                    <p class="yogaclass-time">{{ $cleantime = substr($yogaclass->time,0,-3)}}</p>
                    <p class="yogaclass-title">{{$yogaclass->class_name}}, {{$yogaclass->length}} min</p>
                    <p>{{$yogaclass->teacher}}</p>
                </div>
                <div>
                    <p>{{$yogaclass->reserved}}</p>
                    <p>reserved</p>
                </div>
                <form method="POST" action="cancelbooked">
                    @csrf
                    <input type="hidden" value="<?= $yogaclass->id ?>" name="id" id="id">
                    <button class="button-booked" type="submit" onclick="return confirm('Do you want to cancel this yoga class?')">-</button>
                </form>
            </div>
            @endforeach
        </div>


        <div class="item4">
            <!-- Not booked yoga classes -->
            <h2 class="yogaclasses-heading">Yogaclasses</h2>
            @foreach ($notBookedYogaclasses as $yogaclass)
            <p class="yogaclass-date">{{date("D j/m", strtotime($yogaclass->date));}}</p>
            <div class="yogaclass">
                <div class="yogaclass-details">
                    <p class="yogaclass-time">{{ $cleantime = substr($yogaclass->time,0,-3)}}</p>
                    <p class="yogaclass-title">{{$yogaclass->class_name}}, {{$yogaclass->length}} min</p>
                    <p>{{$yogaclass->teacher}}</p>
                </div>
                <div>
                    <p>{{$yogaclass->available}}</p>
                    <p>available</p>
                </div>
                <form method="POST" action="book">
                    @csrf
                    <input type="hidden" value="<?= $yogaclass->id ?>" name="id" id="id">
                    @if ($user->total_classes > 0 && $yogaclass->available > 0)
                    <button class="button-booked" type="submit" onclick="return confirm('Do you want to book?')">+</button>
                    @else
                    <button disabled class="button-booked-disabled">+</button>
                    @endif
                </form>
            </div>
            @endforeach
        </div>
    </div>
    <img class="dashboard-image" src="assets/events.webp" alt="">
</div>
