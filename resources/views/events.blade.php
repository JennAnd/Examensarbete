@extends('layout')
@section('content')

<img class="events-image" src="/assets/events.webp" />
<h1 class="events-heading"> Our events</h1>
<div class="events-container">
    @include('mandala')

    <div class="event-boxes">
        @foreach ($events as $event)
        <div class="event-single-box">
            <p> {{$event->eventname}}</p>
            <p> {{$event->eventinfo}}</p>
        </div>
        @endforeach
    </div>
    <h3>For reservation and more information about our events, contact us <a href="mailto:john@example.com">John </a>
    </h3>
    <form>

    </form>
    @include('mandala')
</div>

@endsection
