@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Our Products</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <h3 class="mt-2">BRANDS</h3>
            @foreach($brands as $brand)
                <button class="btn btn-block btn-dark btn-sm">{{$brand->name}}</button>
            @endforeach
            <h3 class="mt-4">FINISHES</h3>
            @foreach($finishes as $finish)
                <button class="btn btn-block btn-dark btn-sm">{{$finish->name}}</button>
            @endforeach
        </div>
        <div class="col-md-10">
            <div class="row">
                @foreach($lipsticks as $lipstick)
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{$lipstick->name}}</h5>
                                <img class="card_product_image" src="/storage/{{$lipstick->image}}" alt="">
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">${{$lipstick->price}}</li>
                                <li class="list-group-item">
                                    <div class="card" style="background: {{$lipstick->color}};">
                                        <div class="card-header"></div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <a href="google.com" class="btn btn-block btn-dark">Details</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection