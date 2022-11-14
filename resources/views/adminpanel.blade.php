<link rel="stylesheet" href="../stylesheets/adminpanel.css">
@include('profilenavbar')


<div class="adminpanel-body">
    <div class="grid-container">
        <div class="item1">
            <h1> Yoga classes </h1>
        </div>
        <div class="item2">
            @include('admin-sidenav')
        </div>
        <div class="item3">
            <div class="make-yogaclass">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                <form method="post" action="make-yogaclass">
                    @csrf
                    <div>
                        <label for="class_name">Class name</label>
                        <input name="class_name" id="class_name" type="text" required />
                    </div>
                    <div>
                        <label for="teacher">Teacher</label>
                        <input name="teacher" id="teacher" type="text" required />
                    </div>
                    <div>
                        <label for="date">Date</label>
                        <input name="date" id="date" type="date" required />
                    </div>
                    <div>
                        <label for="time">Time</label>
                        <input name="time" id="time" type="time" required />
                    </div>
                    <div>
                        <label for="class-length">Length</label>
                        <input name="class-length" id="class-length" type="number" required />
                    </div>
                    <div>
                        <label for="available">Available spots</label>
                        <input name="available" id="available" type="number" required />
                    </div>
                    <div>
                        <label for="reserved">Reserved</label>
                        <input name="reserved" id="reserved" type="number" required />
                    </div>
                    <button type="submit">Add class</button>
                </form>

            </div>

        </div>

        <div class="item4">
            <div class="show-yogaclasses">
                @foreach ($yogaclasses as $yogaclass)
                <div>
                    <p>{{$yogaclass->class_name}}</p>
                    <p>{{$yogaclass->length}} min</p>
                    <p>{{$yogaclass->teacher}}</p>
                    <p>{{$yogaclass->date}}</p>
                    <p>{{ $cleantime = substr($yogaclass->time,0,-3)}}</p>
                    <p> Available: {{$yogaclass->available}}</p>
                    <p>Reserved: {{$yogaclass->reserved}}</p>
                </div>
                <form action="delete-yogaclass" method="POST">
                    @csrf
                    <input type="hidden" value="<?= $yogaclass->id ?>" name="yogaclass_id">
                    <button>Delete yogaclass</button>
                </form>
                @endforeach
            </div>


        </div>
        <!-- <div class="item5"></div> -->
    </div>
</div>
