<nav>
    <!--logotype svg-->
    <a href="/">
        LOGO
    </a>
    <!-- Mobile nav -->
    <div class="nav-items">
        <li>
            <a href="{{route('aboutus')}}" class="{{ (request()->is('aboutus')) ? 'active' : '' }}">About us</a>
        </li>
        <li>
            <a href="{{route('ourclasses')}}" class="{{ (request()->is('ourclasses')) ? 'active' : '' }}">Our classes</a>
        </li>
        <li>
            <a href="{{route('memberships')}}" class="{{ (request()->is('memberships')) ? 'active' : '' }}">Memberships</a>
        </li>
        <li>
            <a href="{{route('events')}}" class="{{ (request()->is('events')) ? 'active' : '' }}">Events</a>
        </li>
        <li>
            <a href="{{route('ourproducts')}}" class="{{ (request()->is('ourproducts')) ? 'active' : '' }}">Our products</a>
        </li>
        <li>
            @if (Auth::user())
            <a href="{{route('dashboard')}}" class="{{ (request()->is('dashboard')) ? 'active' : '' }}">My pages</a>
            @else
            <a href="/login">Login</a>
            @endif
        </li>
    </div>

    <!--Hamburger icon-->
    <a class="hamburger" href="javascript:void(0);" onclick="myFunction()">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21 18H3V16H21V18ZM21 13H3V11H21V13ZM21 8H3V6H21V8Z" fill="white" />
        </svg>
    </a>
    <a class="go-back" href="javascript:void(0);" onclick="myFunction()">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21 21L3 3M21.0001 3L3 21.0001" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </a>

    <div class="nav-items-desktop">
        <li>
            <a href="{{route('aboutus')}}" class="{{ (request()->is('aboutus')) ? 'active' : '' }}">About us</a>
        </li>
        <li>
            <a href="{{route('ourclasses')}}" class="{{ (request()->is('ourclasses')) ? 'active' : '' }}">Our classes</a>
        </li>
        <li>
            <a href="{{route('memberships')}}" class="{{ (request()->is('memberships')) ? 'active' : '' }}">Memberships</a>
        </li>
        <li>
            <a href="{{route('events')}}" class="{{ (request()->is('events')) ? 'active' : '' }}">Events</a>
        </li>
        <li>
            <a href="{{route('ourproducts')}}" class="{{ (request()->is('ourproducts')) ? 'active' : '' }}">Our products</a>
        </li>
        <li>
            @if (Auth::user())
            <a href="{{route('dashboard')}}" class="{{ (request()->is('dashboard')) ? 'active' : '' }}">My pages</a>
            @else
            <a href="/login">Login</a>
            @endif
        </li>
    </div>
</nav>
