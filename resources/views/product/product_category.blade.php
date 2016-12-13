@extends('layout.master_layout')
@section('head')
@parent
@endsection
@section('content')
<!--breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="{{route('home')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">{{$category_title}}</li>
        </ol>
    </div>
</div>
<!--//breadcrumbs-->
    <!--products-->
    <div class="products">   
        <div class="container">
            <div class="col-md-9 product-model-sec">
            @if($products->count() > 0)
                @foreach($products as $product)
                <div class="product-grids simpleCart_shelfItem wow fadeInUp animated" data-wow-delay=".5s">
                    <div class="new-top">
                        <a href="/product/{{$product->id}}">
                            <img src="@if( strpos($product->image, 'http://') === false && strpos($product->image, 'https://') === false){{ Voyager::image( $product->image ) }}@else{{ $product->image }}@endif">
                        </a>
                        <div class="new-text">
                            <ul>
                                <li><a class="add_cart" href="#" data-product="{{$product->id}}"> Add to cart</a></li>
                                <li><a href="#">Quick View</a></li>
                                <li><a href="/product/{{$product->id}}">Show Details</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="new-bottom">
                        <h5><a class="name" href="#">{{$product->name}}</a></h5>
                        <div class="ofr">
                            <p class="pric1"><del>${{$product->price}}</del></p>
                            <p><span class="item_price">${{$product->price}}</span></p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <h3><b>No Products</b></h3>
            @endif
        </div>
    </div>
    <!--//products-->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection