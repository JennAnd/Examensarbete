@extends('layout')
@section('content')

<img class="events-image" src="/assets/events.webp" />
<h1 class="events-heading"> Upcoming events</h1>
<div class="events-container">
    @include('mandala')

    <div class="event-boxes">
        @foreach ($events as $event)
        <div class="event-single-box">
            <div class="box-brightness">
                <h2 class="event-name"> {{$event->eventname}}</h2>
                <p class="event-info"> {{$event->eventinfo}}</p>
            </div>
        </div>
        @endforeach
    </div>
    <p class="events-end-section">For reservation and more information about our events, please contact us <a href="mailto:john@example.com">here. </a>
    </p>
    <form>

    </form>
    @include('mandala')
</div>

@endsection
