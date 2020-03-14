@extends('frontend.layout.master')
@section('content')
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <img src="{{$product->image}}">
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <form action="/cart/addtocart" method="GET">
                  <div class="aa-product-view-content">
                    <h3>{{$product->name}}</h3>
                     <div class="aa-info-block">
                      <span class="aa-product-view-price">Price: ${{$product->price}}</span>
                      <p class="aa-product-author">Artist: <span>{{$product->artist_name}}</span></p>
                      @if ($product->start_time || $product->end_time )
                        <p class="aa-product-company">Start date: <span>{{$product->start_time}}</span></p>
                        <p class="aa-product-company">End date: <span>{{$product->end_time}}</span></p>
                      @endif
                      <p class="aa-product-author"><span>{!!$product->short_description!!}</span></p>
                    </div>

                    <div class="aa-prod-quantity">              
                        <select id="" name="quantity">
                          <option selected="1" value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option> 
                        </select>
                      <p class="aa-prod-category">
                        Category: <a href="/category/{{$category->id}}">{{$category->name}}</a>
                      </p>

                    </div>
                    <div class="aa-prod-view-bottom">
                      <input type="hidden" name="id_product" value="{{$product->id}}">
                      <button class="aa-add-to-cart-btn" href="#" type="submit" >Add To Cart</button  >
                    </div>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>               
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <p>{!!$product->description!!}</p>
                </div>
              </div>
            </div>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
                @foreach ($rale_product as $object)
                  {{-- expr --}}
                  <li>
                  <figure>
                    <a class="aa-product-img" href="/product/{{$object->id}}"><img src="{{$object->image}}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="#">{{$object->name}}</a></h4>
                      <span class="aa-product-price">${{$object->price}}</span><span class="aa-product-price"></span>
                    </figcaption>
                  </figure>
                </li>

                @endforeach
                 <!-- start single product item -->
              </ul>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->

@endsection
