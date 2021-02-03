@extends('layout')

@section('content')
<div class="col-sm-9 padding-right">
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">Sản phẩm mới</h2>
        @foreach ($cate_by_id as $key => $pro)
        <a href="{{'/chi-tiet-sp/'.$pro->product_id }}">
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{'/public/upload/product/'.$pro->product_image }}" alt="" />
                            <h2>{{number_format($pro->product_price).' '.'VND'}}</h2>
                            <p>{{$pro->product_name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        {{-- <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{number_format($pro->product_price).' '.'VND'}}</h2>
                                <p>{{$pro->product_name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Them vao gio hang</a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Yeu thich</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>So sanh</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
        

    </div>
    @endsection