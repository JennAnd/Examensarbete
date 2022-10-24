<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Adminpanel</h1>
    <form method="post" action="make-yogaclass">
        @csrf
        <div>
            <label for="class-name">Class name</label>
            <input name="class-name" id="class-name" type="text" />
        </div>
        <div>
            <label for="teacher">Teacher</label>
            <input name="teacher" id="teacher" type="text" />
        </div>
        <div>
            <label for="date">Date</label>
            <input name="date" id="date" type="date" />
        </div>
        <div>
            <label for="time">Time</label>
            <input name="time" id="time" type="time" />
        </div>
        <div>
            <label for="class-length">Length</label>
            <input name="class-length" id="class-length" type="number" />
        </div>
        <div>
            <label for="available">Available spots</label>
            <input name="available" id="available" type="number" />
        </div>
        <div>
            <label for="reserved">Reserved</label>
            <input name="reserved" id="reserved" type="number" />
        </div>
        <button type="submit">Add class</button>
    </form>

</body>

</html>
