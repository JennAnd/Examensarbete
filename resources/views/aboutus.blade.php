@extends('layout')
@section('content')

<body>
    @include('navbar')
    <img class="about-us-image" src="/assets/about-us-pose.webp" />
    <div class="about-us-container">
        <div class="mandala-section">
            <img src="/assets/line.svg" />
            <img src="/assets/mandala.svg" />
            <img src="/assets/line.svg" />
        </div>

        <div class="about-us-boxes">
            <div class="about-us-single-box-round"></div>
            <div class="about-us-single-box"></div>
        </div>
        <div class="about-us-boxes">
            <div class="about-us-single-box-round"></div>
            <div class="about-us-single-box"></div>
        </div>


        <div class="mandala-section">
            <img src="/assets/line.svg" />
            <img src="/assets/mandala.svg" />
            <img src="/assets/line.svg" />
        </div>
    </div>


</body>

</html>
@endsection
