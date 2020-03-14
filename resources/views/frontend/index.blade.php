@extends('frontend.layout.master')
@section('content')
    <section>
        <div class="large-banner">
            <img src="img/banners/banner-1920x700.jpg" alt="img"/>
        </div>
    </section>
    <!-- Products section -->
    <section id="aa-product" style="margin-top: 20px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-product-area">
                            <div class="aa-product-inner">
                                <!-- start prduct navigation -->
                                <ul class="nav nav-tabs aa-products-tab">
                                    <li class="active"><a href="#cd" data-toggle="tab">CD</a></li>
                                    <li><a href="#dvd" data-toggle="tab">DVD</a></li>
                                    <li><a href="#tape" data-toggle="tab">Tape</a></li>
                                    <li><a href="#music-instruments" data-toggle="tab">Music Instruments</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="cd">
                                        <ul class="aa-product-catg">
                                            @foreach($cds as $cd)
                                                <li>
                                                    <figure>
                                                        <a class="aa-product-img" href="/product/{{$cd->id}}"><img
                                                                src="{{$cd->image}}" alt="{{$cd->name}}"></a>
                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a href="/product/{{$cd->id}}">{{$cd->name}}</a>
                                                            </h4>
                                                            <span class="aa-product-price">${{$cd->price}}</span>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="browse-button">
                                            <a class="aa-browse-btn" href="{{route('category', ['id' => 1])}}">Browse all CD <span
                                                    class="fa fa-long-arrow-right"></span></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="dvd">
                                        <ul class="aa-product-catg">
                                            @foreach($dvds as $dvd)
                                                <li>
                                                    <figure>
                                                        <a class="aa-product-img" href="/product/{{$dvd->id}}"><img
                                                                src="{{$dvd->image}}" alt="{{$dvd->name}}"></a>
                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a href="/product/{{$dvd->id}}">{{$dvd->name}}</a>
                                                            </h4>
                                                            <span class="aa-product-price">${{$dvd->price}}</span>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="browse-button">
                                            <a class="aa-browse-btn" href="{{route('category', ['id' => 2])}}">Browse all DVD <span
                                                    class="fa fa-long-arrow-right"></span></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tape">
                                        <ul class="aa-product-catg">
                                            @foreach($tapes as $tape)
                                                <li>
                                                    <figure>
                                                        <a class="aa-product-img" href="#"><img
                                                                src="{{$tape->image}}" alt="{{$tape->name}}"></a>
                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a href="/product/{{$tape->id}}">{{$tape->name}}</a>
                                                            </h4>
                                                            <span class="aa-product-price">${{$tape->price}}</span>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="browse-button">
                                            <a class="aa-browse-btn" href="{{route('category', ['id' => 3])}}">Browse all Tape <span
                                                    class="fa fa-long-arrow-right"></span></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="music-instruments">
                                        <ul class="aa-product-catg">
                                            @foreach($music_instruments as $music_instrument)
                                                <li>
                                                    <figure>
                                                        <a class="aa-product-img" href="/product/{{$music_instrument->id}}"><img
                                                                src="{{$music_instrument->image}}" alt="{{$music_instrument->name}}"></a>
                                                        <figcaption>
                                                            <h4 class="aa-product-title"><a href="/product/{{$music_instrument->id}}">{{$music_instrument->name}}</a>
                                                            </h4>
                                                            <span class="aa-product-price">${{$music_instrument->price}}</span>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="browse-button">
                                            <a class="aa-browse-btn" href="{{route('category', ['id' => 4])}}">Browse all Music Instruments<span
                                                    class="fa fa-long-arrow-right"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Products section -->
    <!-- banner section -->
    <section id="aa-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-banner-area">
                            <a href="#"><img src="img/banners/banner-center.jpg" alt="fashion banner img"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- popular section -->
    <section id="aa-popular-category">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-popular-category-area">
                            <!-- start prduct navigation -->
                            <ul class="nav nav-tabs aa-products-tab">
                                <li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>
                                <li><a href="#latest" data-toggle="tab">Latest</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- Start men popular category -->
                                <div class="tab-pane fade in active" id="popular">
                                    <ul class="aa-product-catg aa-popular-slider">
                                        @foreach($most_popular_products as $most_popular_product)
                                        <li>
                                            <figure>
                                                <a class="aa-product-img" href="/product/{{$most_popular_product->id}}"><img src="{{$most_popular_product->image}}"
                                                                                        alt="{{$most_popular_product->name}}"></a>
                                                <figcaption>
                                                    <h4 class="aa-product-title"><a href="/product/{{$most_popular_product->id}}">{{$most_popular_product->name}}</a></h4>
                                                    <span class="aa-product-price">${{$most_popular_product->price}}</span>
                                                </figcaption>
                                            </figure>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="latest">
                                    <ul class="aa-product-catg aa-latest-slider">
                                        @foreach($latest_products as $latest_product)
                                        <li>
                                            <figure>
                                                <a class="aa-product-img" href="/product/{{$latest_product->id}}"><img src="{{$latest_product->image}}"
                                                                                        alt="{{$latest_product->name}}"></a>
                                                <figcaption>
                                                    <h4 class="aa-product-title"><a href="/product/{{$latest_product->id}}">{{$latest_product->name}}</a></h4>
                                                    <span class="aa-product-price">${{$latest_product->price}}</span>
                                                </figcaption>
                                            </figure>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- / latest product category -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / popular section -->
    <!-- Support section -->
    <section id="aa-support">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-support-area">
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-truck"></span>
                                <h4>FREE SHIPPING</h4>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-clock-o"></span>
                                <h4>30 DAYS MONEY BACK</h4>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-phone"></span>
                                <h4>SUPPORT 24/7</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Support section -->
    <!-- Latest Blog -->
    <section id="aa-latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-latest-blog-area">
                        <h2>UPCOMING LIVE SHOWS</h2>
                        <div class="row">
                            <ul class="aa-product-catg">
                                @foreach($liveshows as $liveshow)
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="/product/{{$liveshow->id}}"><img src="{{$liveshow->image}}"
                                                                                                                         alt="{{$liveshow->name}}"></a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="/product/{{$liveshow->id}}">{{$liveshow->name}}</a></h4>
                                                <span class="aa-product-price">${{$liveshow->price}}</span>
                                            </figcaption>
                                        </figure>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Latest Blog -->

@endsection
