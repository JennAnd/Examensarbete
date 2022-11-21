@extends('layout')
@section('content')

<img class="our-products-image" src="/assets/our-products.webp" />
<h1 class="our-products-heading"> Our products</h1>
<div class="our-products-container">

    @include('mandala')
    <div class="product-boxes">
        @foreach ($products as $product)

        <div class="product-single-box" style="background-image: url('{{$product->productImage->getFile()->getUrl()}}'); background-size: cover;">
            <div class="box-brightness-small">
                <h3 class="product-name"> {{$product->productType}}</h3>
                <p class="product-price"> {{$product->productPrice}}</p>
            </div>
        </div>
        @endforeach
    </div>
    <p class="our-products-end-section">If you are interested in buying any of our products, please visit our yoga studio.
    </p>
    @include('mandala')
</div>

@endsection
