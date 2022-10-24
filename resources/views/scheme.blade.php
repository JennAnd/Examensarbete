<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../scheme.css">
</head>

<body>
    <nav>
        <ul>
            <li class="logo">LOGGA</li>
            <li class="menu">MENY</li>
        </ul>
    </nav>
    @foreach ($yogaclasses as $yogaclass)

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
