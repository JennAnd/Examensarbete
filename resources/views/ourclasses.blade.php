@extends('layout')
@section('content')

<body>
    @include('navbar')
    <img class="our-classes-image" src="/assets/our-classes.webp" />
    <h1> Our classes </h1>
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
        <h1>{{ $entry->classtype }}</h1>
        <div>
            <div>
                <p>{{ $entry->classinfo }}</p>
                <p></p>
            </div>
            <div>
                <p></p>
            </div>
            <div>
                <p></p>
            </div>
            <div>
                <p></p>
            </div>
            <div>
                <p></p>
            </div>
            <div>
                <p></p>
            </div>
        </div>

</body>

</html>
@endsection
