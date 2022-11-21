@extends('layout')
@section('content')

<img class="events-image" src="/assets/events.webp" />
<h1 class="events-heading"> Upcoming events</h1>
<div class="events-container">
    @include('mandala')

    <div class="event-boxes">
        @foreach ($events as $event)
        <div class="event-single-box" style="background-image: url('{{$event->eventimage->getFile()->getUrl()}}'); background-size: cover;">
            <div class="box-brightness">
                <!-- Get image from contentful -->
                <h2 class="event-name"> {{$event->eventname}}</h2>
                <p class="event-info"> {{$event->eventinfo}}</p>
                <p class="event-date"> {{$event->eventDate}}</p>
            </div>
        </div>
        @endforeach
    </div>
    <p class="events-end-section">For reservation and more information about our events, please contact us <a href="mailto:info@anandayoga.com">here. </a>
    </p>
    @include('mandala')
</div>

@endsection
