<p>Hello, {{ $user->firstname . " " . $user->lastname}}!</p>
<p>{{$user->email}}</p>
<p>Do you want to <a href="logout">logout?</a></p>

@foreach ($yogaclasses as $yogaclass)
<!-- @if (något med att useryogaclass inte får vara samma som yogaclass->id) -->

<div>
    <p>{{$yogaclass->class_name}}</p>
    <p>{{$yogaclass->length}} min</p>
    <p>{{$yogaclass->teacher}}</p>
    <p>{{$yogaclass->date}}</p>
    <p>{{$yogaclass->id}}</p>
    <p>{{ $cleantime = substr($yogaclass->time,0,-3)}}</p>
    <p> Available: {{$yogaclass->available}}</p>

    <form method="POST" action="book">
        @csrf
        <input type="hidden" value="<?= $yogaclass->id ?>" name="id">
        <button>Book</button>
    </form>
</div>

@endforeach
