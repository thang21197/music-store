@extends('frontend.layout.master')
@section('content')
    <!-- / catg header banner section -->

    <!-- product category -->
    <section id="aa-product-category">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                    <h3>Search: "{{$key_word}}" - {{$total}} results found</h3>
                    <div class="aa-product-catg-content" style="padding: 0">
                        <div class="aa-product-catg-body">
                            <ul class="aa-product-catg">
                                @foreach($products as $product)
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="/product/{{$product->id}}"><img src="{{$product->image}}"
                                                                                    alt="{{$product->name}}"></a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="#">{{$product->name}}</a></h4>
                                                <span class="aa-product-price">${{$product->price}}</span>
                                                <p class="aa-product-descrip">Lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit. Numquam accusamus facere iusto, autem soluta amet
                                                    sapiente ratione inventore nesciunt a, maxime quasi consectetur,
                                                    rerum illum.</p>
                                            </figcaption>
                                        </figure>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @if(count($products) > 0)
                        <div class="aa-product-catg-pagination">{{ $products->links() }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                    <aside class="aa-sidebar">
                        <div class="aa-sidebar-widget">
                            <h3>Top Selling Products</h3>
                            <div class="aa-recently-views">
                                <ul>
                                    @foreach($top_selling_products as $product)
                                    <li>
                                        <a href="/product/{{$product->id}}" class="aa-cartbox-img"><img alt="{{$product->name}}"
                                                                                src="{{$product->image}}"></a>
                                        <div class="aa-cartbox-info">
                                            <h4 style="font-weight: bold"><a href="/product/{{$product->id}}">{{$product->name}}</a></h4>
                                            <p>${{$product->price}}</p>
                                        </div>
                                    </li>
                                        @endforeach
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>

            </div>
        </div>
    </section>
    <!-- / product category -->
@endsection
