@extends('layout')
@section('content')

<body>
    <img class="our-classes-image" src="/assets/our-classes.webp" />
    <h1> Our classes </h1>
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
