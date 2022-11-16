@extends('layout')
@section('content')

<img class="about-us-image" src="/assets/about-us.webp" />
<div class="about-us-heading-box">
    <h1 class="about-us-heading">About Ananda Yoga</h1>
    <p class="about-us-heading-info">We are two friends who decided to fullfill our dream and opened a yoga studio in 2022 on the beautiful island, Bali, located in Indonesia. If you want to get to know us better, please scroll down the page or come visit us in Bali. </p>
</div>
<div class="about-us-container">
    @include('mandala')

    @foreach ($profiles as $profile)
    <!-- <div class="about-us-boxes"> -->
    <div class="about-us-boxes">
        <div class="about-us-single-box-round" style="background-image: url('{{$profile->aboutusimage->getFile()->getUrl()}}'); background-size: cover; filter: brightness(0.8);">
        </div>

        <div class="about-us-single-box">
            <h3 class="about-us-name">{{$profile->aboutUsName}}</h3>
            <p class="about-us-info">{{$profile->aboutUsInfo}}</p>
        </div>

    </div>

    @endforeach

    @include('mandala')
</div>


@endsection
