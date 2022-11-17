@php use App\Models\User; @endphp
<link rel="stylesheet" href="../stylesheets/sidenav.css">
<div class="side-nav">
    <ul>
        @if (Auth::user()->is_admin)
        <li><a href="{{route('adminpanel')}}">Admin panel</a></li>
        @endif

        <li><a href="{{route('dashboard')}}" class="{{ (request()->is('dashboard')) ? 'active-profile' : '' }}">My yogaclasses</a></li>
        <li><a href="{{route('profile')}}" class="{{ (request()->is('profile')) ? 'active-profile' : '' }}">My profile</a></li>
        <li><a href="{{route('payments')}}" class="{{ (request()->is('payments')) ? 'active-profile' : '' }}">Payments</a></li>
        <li><a href="/logout">Logout</a></li>
    </ul>
</div>
