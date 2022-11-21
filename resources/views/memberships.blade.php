@extends('layout')
@section('content')

<img class="memberships-image" src="/assets/memberships.webp" />
<h1 class="memberships-heading">Our memberships</h1>
@include('mandala')

<div class="memberships-body">
    @foreach ($memberships as $membership)
    <div class="memberships-container">
        <p class="membership-type">{{$membership->type}}</p>
        <p class="membership-price">{{$membership->price}} USD</p>
        <p class="membership-validation">Valid 6 months from date of purchase</p>
    </div>
    @endforeach
</div>
<p class="membership-end-section">Are you interrested in any of these memberships? <a href="/signup">Sign up</a> or <a href="/login">log in </a>to buy.</p>
@include('mandala')

@endsection
