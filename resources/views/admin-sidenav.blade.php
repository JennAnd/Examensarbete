<link rel="stylesheet" href="../stylesheets/sidenav.css">
<div class="side-nav">
    <ul>
        <li><a href="{{route('adminpanel')}}" class="{{ (request()->is('adminpanel')) ? 'active' : '' }}">Yoga classes</a></li>
        <li><a href="{{route('adminmemberships')}}" class="{{ (request()->is('adminmemberships')) ? 'active' : '' }}">Memberships</a></li>
        <li><a href="{{route('invoices')}}" class="{{ (request()->is('invoices')) ? 'active' : '' }}">Invoices</a></li>
        <li><a href="/logout">Logout</a></li>
    </ul>
</div>
