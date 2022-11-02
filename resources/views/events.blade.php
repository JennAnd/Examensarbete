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
        <div class="mandala-section">
            <img src="/assets/line.svg" />
            <img src="/assets/mandala.svg" />
            <img src="/assets/line.svg" />
        </div>
    </div>

    @foreach ($yogaclasses as $yogaclass)
    <h1> Upcoming events</h1>
    <div>
        <p>{{$yogaclass->class_name}}</p>
        <p>{{$yogaclass->length}} min</p>
        <p>{{$yogaclass->teacher}}</p>
        <p>{{$yogaclass->date}}</p>
        <p>{{ $cleantime = substr($yogaclass->time,0,-3)}}</p>
        <p> Available: {{$yogaclass->available}}</p>
    </div>
    <p>log in to book</p>
    @endforeach


</body>

</html>
@endsection
