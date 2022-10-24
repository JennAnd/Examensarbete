<p>Hello, {{ $user->firstname . " " . $user->lastname}}!</p>
<p>{{$user->email}}</p>
<p>Do you want to <a href="logout">logout?</a></p>

@foreach ($yogaclasses as $yogaclass)

<div>
    <p>{{$yogaclass->class_name}}</p>
    <p>{{$yogaclass->length}} min</p>
    <p>{{$yogaclass->teacher}}</p>
    <p>{{$yogaclass->date}}</p>
    <p>{{ $cleantime = substr($yogaclass->time,0,-3)}}</p>
    <p> Available: {{$yogaclass->available}}</p>
    <button>Book</button>
</div>

@endforeach
