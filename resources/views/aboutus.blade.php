@extends('layout')
@section('content')

<img class="about-us-image" src="/assets/about-us.webp" />
<div class="about-us-heading-box">
    <h1 class="about-us-heading">About Yoga name</h1>
    <p class="about-us-heading-info">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit ame Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amett Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</p>
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
