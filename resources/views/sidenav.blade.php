<link rel="stylesheet" href="../stylesheets/sidenav.css">
<div class="side-nav">
    <ul>
        <li><a href="{{route('dashboard')}}" class="{{ (request()->is('dashboard')) ? 'active-profile' : '' }}">My yogaclasses</a></li>
        <li><a href="{{route('profile')}}" class="{{ (request()->is('profile')) ? 'active-profile' : '' }}">My profile</a></li>
        <li><a href="{{route('payments')}}" class="{{ (request()->is('payments')) ? 'active-profile' : '' }}">Payments</a></li>
        <li><a href="/logout">Logout</a></li>
    </ul>
</div>
