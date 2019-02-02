@extends('layouts.app')
@section('content')
    <div class="product_wrapper">
        <div class="product-img">
            <img src="/storage/{{$lipstick->image}}" height="420" width="327">
        </div>
        <div class="product-info">
            <div class="product-text">
                <h1>{{$lipstick->name}}</h1>
                <h2>By Lipstick.co</h2>
                <p>{{$lipstick->description}}</p>
            </div>
            <div class="product-price-btn">
                <p><span class="product_span">{{$lipstick->price}}</span>$</p>
            <form action="/cart" method="post">
                @csrf
                <input type="hidden" value="{{$lipstick->id}}" name="lipstick">
                <button type="submit" class="addTocart">Add to cart <i class="fa fa-cart-plus"></i></button>
            </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
    </script>
@endsection