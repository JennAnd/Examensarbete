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
    @include('mandala')
</div>

@endsection
