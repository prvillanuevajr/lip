@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 bg-light text-dark mb-4">
            <h1>Featured</h1>
            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @foreach($lipsticks as $key => $lipstick)
                        <div class="carousel-item @if($key == 0) active @endif text-center">
                            <img style="max-height: 350px" class="" src="/storage/{{$lipstick->image}}"
                                 alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Lorem ipsum.</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, modi.</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-12">
            <products-list></products-list>
        </div>
    </div>
@endsection