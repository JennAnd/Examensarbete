@extends('layout')
@section('content')

<img class="our-products-image" src="/assets/our-products.webp" />
<h1 class="our-products-heading"> Our products</h1>
<div class="our-products-container">

    @include('mandala')
    <div class="product-boxes">
        @foreach ($products as $product)
        <div class="product-single-box">
            <p> {{$product->productType}}</p>
            <p> {{$product->productPrice}}</p>
        </div>
        @endforeach
    </div>

    @include('mandala')
</div>

@endsection
