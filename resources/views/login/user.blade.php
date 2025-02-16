@extends('home')

@section('title', 'User')

@section('main')

    <section class="ftco-section">

        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    @if (session('success'))
                        <div id="successAlert" class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Featured Products</span>
                    <h2 class="mb-4">Our Products</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">

                @foreach ($allProducts as $product)
                    <div class="col-md-6 col-lg-3 ftco-animate mb-4">
                        <div class="product card h-100">
                            <a href="#" class="img-prod">
                                <img class="img-fluid card-img-top" src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}">
                                <div class="overlay"></div>
                            </a>
                            <div class="card-body text-center">
                                <h3 class="card-title"><a href="#">{{ $product->name }}</a></h3>
                                <div class="d-flex justify-content-center mb-3">
                                    <div class="pricing">
                                        <p class="price">
                                            @if ($product->discount_price)
                                                <span class="text-muted text-decoration-line-through">
                                                    {{ $product->price }} <i class="fas fa-euro-sign"></i>
                                                </span><br>
                                                <span class="price-sale">
                                                    {{ $product->discount_price }} <i class="fas fa-euro-sign"></i>
                                                </span>
                                            @else
                                                <span class="price">
                                                    {{ $product->price }} <i class="fas fa-euro-sign"></i>
                                                </span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex justify-content-center">
                                    <a href="#" class="btn btn-outline-secondary me-2"><i class="fas fa-bars"></i></a>
                                    <a href="#" class="btn btn-outline-success me-2"><i
                                            class="fas fa-shopping-cart"></i></a>
                                    <a href="#" class="btn btn-outline-danger"><i class="fas fa-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

    </section>

@endsection
