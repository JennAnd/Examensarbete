@extends('layout')
@section('content')

<img class="our-classes-image" src="/assets/our-classes.webp" />
<h1> Our classes </h1>
<div class="events-container">
    <div class="mandala-section">
        <img src="/assets/line.svg" />
        <img src="/assets/mandala.svg" />
        <img src="/assets/line.svg" />
    </div>
    <div class="mandala-section">
        <img src="/assets/line.svg" />
        <img src="/assets/mandala.svg" />
        <img src="/assets/line.svg" />
    </div>
    <h1>Our classes</h1>
    <div>
        @foreach ($classes as $class)
        <div>
            <p>{{ $class->classtype }}</p>
            <p>{{$class->classinfo}}</p>
        </div>
        @endforeach
    </div>

    @endsection
