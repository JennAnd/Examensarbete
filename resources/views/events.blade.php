@extends('layout')
@section('content')

<body>

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
