@extends('site.layouts.app')
@section('title','search')
@section('content')
<br><br>
<div class="container">
    <div class="pannel">
        <div class="row">
            @foreach ($books as $item)
            <div class="col-md-3 product-men">
                <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item">
                        <img width="100" height="180" src="{{asset("storage/$item->featured_image")}}" alt="" class="pro-image-front">
                        <img width="100" height="180" src="{{asset("storage/$item->featured_image")}}" alt="" class="pro-image-back">
                            <div class="men-cart-pro">
                                <div class="inner-men-cart-pro">
                                    <a href="{{ url("single_product/$item->id")}}" class="link-product-add-cart">Quick View</a>
                                </div>
                            </div>

                    </div>
                    <div class="item-info-product ">
                        <h4><a href="single.html">{{ $item->name }}</a></h4>
                        <div class="info-product-price">
                            <span class="item_price">{{ $item->price_discount }}</span>
                            @if($item->discount_amount > 0)
                            <del>{{ $item->price }}</del>
                             @endif
                        </div>
                        <a href="{{ url("cart_product/$item->id")}}" class="item_add single-item hvr-outline-out button2">Add to cart</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
