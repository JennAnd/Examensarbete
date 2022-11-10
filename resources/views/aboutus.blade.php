@extends('layout')
@section('content')

<img class="about-us-image" src="/assets/about-us-pose.webp" />
<div class="about-us-container">
    @include('mandala')

    @foreach ($profiles as $profile)
    <div class="about-us-boxes">
        <div class="about-us-single-box-round">
        </div>
        <div class="about-us-single-box">
            <p>{{$profile->aboutUsInfo}}</p>
        </div>
    </div>
    @endforeach

    @include('mandala')
</div>


@endsection
