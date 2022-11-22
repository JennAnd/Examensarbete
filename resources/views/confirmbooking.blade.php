<head>
    <link rel="stylesheet" href="../stylesheets/dashboard.css">
    <link rel="stylesheet" href="../stylesheets/popup.css">

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
            <h2 class="yogaclasses-heading">Your booked yoga classes</h2>
            @foreach ($bookedYogaclasses as $yogaclass)
            <p class="yogaclass-date">{{date("D j/m", strtotime($yogaclass->datetime));}}</p>
            <div class="yogaclass">
                <div class="yogaclass-details">
                    <p class="yogaclass-time">{{date("H:i", strtotime($yogaclass->datetime));}}</p>
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
                    <button class="button-booked-2" type="submit" onclick="return confirm('Do you want to cancel this yoga class?')">-</button>
                </form>
            </div>
            @endforeach
        </div>


        <div class="item4">
            <!-- Not booked yoga classes -->
            <h2 class="yogaclasses-heading">Yoga classes</h2>
            @foreach ($notBookedYogaclasses as $yogaclass)
            <p class="yogaclass-date">{{date("D j/m", strtotime($yogaclass->datetime));}}</p>
            <div class="yogaclass">
                <div class="yogaclass-details">
                    <p class="yogaclass-time">{{date("H:i", strtotime($yogaclass->datetime));}}</p>
                    <p class="yogaclass-title">{{$yogaclass->class_name}}, {{$yogaclass->length}} min</p>
                    <p>{{$yogaclass->teacher}}</p>
                </div>
                <div>
                    <p>{{$yogaclass->available}}</p>
                    <p>available</p>
                </div>
                <form method="GET" action="confirmbooking">
                    @csrf
                    <input type="hidden" value="<?= $yogaclass->id ?>" name="id" id="id">
                    @if ($user->total_classes > 0 && $yogaclass->available > 0)
                    <button class="button-booked" type="submit">+</button>
                    @else
                    <button disabled class="button-booked-disabled">+
                    </button>
                    @endif
                </form>
            </div>
            @endforeach

        </div>
    </div>
    <img class="dashboard-image" src="assets/events.webp" alt="">
</div>
<!-- Pop up -->
<div class="popup-background"></div>
<div class="popup-box">
    <div class="popup-details">
        <p class="popup-heading">Booking details</p>
        <p class="popup-title">{{$chosenYogaclass->class_name}}, {{$chosenYogaclass->length}} min</p>
        <p class="popup-date">{{date("D j/m", strtotime($chosenYogaclass->datetime));}}</p>
        <p class="popup-time">{{date("H:i", strtotime($chosenYogaclass->datetime));}}</p>
        <p>{{$chosenYogaclass->teacher}}</p>
    </div>
    <div>
        <p class="popup-confirm">
            Are you sure you want to book?
        </p>
    </div>
    <div class="buttons">
        <form action="/dashboard">
            <button class="cancel-button">Cancel</button>
        </form>
        <form action="/book" method="POST">
            @csrf
            <input type="hidden" value="<?= $chosenYogaclass->id ?>" name="id" id="id">
            <button class="book-button">Book</button>
        </form>
    </div>
</div>
