<link rel="stylesheet" href="../stylesheets/adminpanel.css">
<link rel="stylesheet" href="../stylesheets/popup.css">
@include('adminnavbar')

<div class="adminpanel-body">
    <div class="grid-container">
        <div class="item1">
            @if(session()->has('message'))
            <div class="session-message">
                {{ session()->get('message') }}
            </div>
            @endif
        </div>
        <div class="item2">
            @include('admin-sidenav')
        </div>
        <div class="filler-item"></div>
        <div class="item3">
            <div class="make-yogaclass">
                <h2 class="yogaclasses-heading">Create yogaclass</h2>
                <form method="post" action="make-yogaclass">
                    @csrf
                    <div class="input-column">
                        <label for="class_name">Class name</label>
                        <input name="class_name" id="class_name" type="text" required />
                    </div>
                    <div class="input-column">
                        <label for="teacher">Teacher</label>
                        <input name="teacher" id="teacher" type="text" required />
                    </div>

                    <div class="input-column">
                        <label for="date">Date</label>
                        <input name="datetime" id="datetime" type="datetime-local" required />
                    </div>

                    <div class="input-column">
                        <label for="class-length">Length</label>
                        <input name="class-length" id="class-length" type="number" required />
                    </div>
                    <div class="input-column">
                        <label for="available">Available spots</label>
                        <input name="available" id="available" type="number" required />
                    </div>
                    <button class="adminpanel-button" type="submit">Add class</button>
                </form>
            </div>
        </div>

        <div class="item4">
            <div class="show-yogaclasses">
                <h2 class="yogaclasses-heading">Yogaclasses</h2>
                @foreach ($yogaclasses as $yogaclass)
                <p class="yogaclass-date">{{date("D j/m", strtotime($yogaclass->datetime));}}</p>
                <div class="yogaclass">
                    <div class="yogaclass-details">
                        <p class="yogaclass-time">{{date("H:i", strtotime($yogaclass->datetime));}} </p>
                        <p class="yogaclass-title">{{$yogaclass->class_name}}, {{$yogaclass->length}} min</p>
                        <p>{{$yogaclass->teacher}}</p>
                    </div>
                    <div>
                        <p>reserved:{{$yogaclass->reserved}}</p>
                        <p>available:{{$yogaclass->available}} </p>
                    </div>
                    <form action="delete-yogaclass" method="POST">
                        @csrf
                        <input type="hidden" value="<?= $yogaclass->id ?>" name="yogaclass_id">
                        <button class="adminpanel-button" type="submit">Delete</button>
                    </form>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Pop up -->
<div class="popup-background"></div>
<div class="popup-box">
    <div class="popup-details">
        <p class="popup-heading">Yoga class details</p>
        <p class="popup-title">{{$chosen_yogaclass->class_name}}, {{$chosen_yogaclass->length}} min</p>
        <p class="popup-date">{{date("D j/m", strtotime($chosen_yogaclass->datetime));}}</p>
        <p class="popup-time">{{date("H:i", strtotime($chosen_yogaclass->datetime));}}</p>
        <p>{{$chosen_yogaclass->teacher}}</p>
    </div>
    <div>
        <p class="popup-confirm">
            Are you sure you want to delete?
        </p>
    </div>
    <div class="buttons">
        <form action="/adminpanel">
            <button class="cancel-button">Cancel</button>
        </form>
        <form action="/delete-yogaclass" method="POST">
            @csrf
            <input type="hidden" value="<?= $_GET['yogaclass_id'] ?>" name="yogaclass_id" id="yogaclass_id">
            <button class="book-button">Yes</button>
        </form>
    </div>
</div>
