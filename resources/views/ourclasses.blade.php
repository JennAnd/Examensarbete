@extends('layout')
@section('content')
<div class="ourclasses-top-section">
    <img class="our-classes-image" src="/assets/our-classes.webp" />
    <h1 class="our-classes-heading"> Our classes </h1>
</div>

@include('mandala')

@foreach ($classes as $class)
<div class="yogaclasses-container">
    <div class="yogaclasses-container-without-lotus">
        <h3 class="yogaclass-type">{{ $class->classtype }}</h3>
        <p class="yogaclass-info">{{$class->classinfo}}</p>
    </div>
    @include('lotus')
</div>
@endforeach
<p class="our-classes-end-section">If you want to try out our yoga classes, please <a href="/signup">sign up</a> or <a href="/login">log in. </a></p>

@include('mandala')
@endsection
