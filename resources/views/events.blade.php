@extends('layout')
@section('content')

<body>
    @include('navbar')
    <img class="events-image" src="/assets/events.webp" />
    <h1 class="events-heading"> Our products</h1>
    <div class="events-container">
        <div class="mandala-section">
            <img src="/assets/line.svg" />
            <img src="/assets/mandala.svg" />
            <img src="/assets/line.svg" />
        </div>

        <div class="event-boxes">
            <div class="event-single-box"></div>
            <div class="event-single-box"></div>
            <div class="event-single-box"></div>
        </div>
        <div class="mandala-section">
            <img src="/assets/line.svg" />
            <img src="/assets/mandala.svg" />
            <img src="/assets/line.svg" />
        </div>
    </div>




</body>

</html>
@endsection
