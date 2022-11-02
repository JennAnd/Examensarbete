@extends('layout')
@section('content')

<body>
    @include('navbar')
    <img class="our-products-image" src="/assets/our-products.webp" />
    <h1 class="our-products-heading"> Our products</h1>
    <div class="our-products-container">
        <div class="mandala-section">
            <img src="/assets/line.svg" />
            <img src="/assets/mandala.svg" />
            <img src="/assets/line.svg" />
        </div>

        <div class="product-boxes">
            <div class="product-single-box"></div>
            <div class="product-single-box"></div>
            <div class="product-single-box"></div>
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
