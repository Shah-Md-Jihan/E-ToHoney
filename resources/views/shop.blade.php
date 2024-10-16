@extends('layouts.frontend_master')

@section('content')
 <!-- .breadcumb-area start -->
 <div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Shop Page</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><span>Shop</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- product-area start -->
<div class="product-area pt-100">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="product-menu">
                    <ul class="nav justify-content-center">
                        
                        <li>
                            <a class="active" data-toggle="tab" href="#all">All product</a>
                        </li>
                        @foreach ($allcategories as $category)
                        <li>
                            <a data-toggle="tab" href="#category_{{ $category->id }}">{{ $category->category_name }}</a>
                        </li>    
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="all">
                <ul class="row">
                    @foreach ($allproducts as $product)
                        <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                            <div class="product-wrap">
                                <div class="product-img">
                                    <span>Sale</span>
                                    <img src="{{ asset('uploads/products') }}/{{ $product->thumbnail_photo }}" alt="">
                                    <div class="product-icon flex-style">
                                        <ul>
                                            <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                            <li>
                                                <form action="{{ url('add/to/wishlist') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <button type="submit" class="@if(App\Models\Wishlist::where('product_id', $product->id)->where('ip_address', request()->ip())->exists()) d-none @endif">
                                                        <i class="fa fa-heart"></i>
                                                    </button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ url('add/to/cart') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" name="quantity" value="1" />
                                                    <button type="submit"><i class="fa fa-shopping-bag"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ url('product/details') }}/{{ $product->id }}">{{ Str::limit($product->title, 40) }}</a></h3>
                                    <p class="pull-left">৳ {{ $product->price }}

                                    </p>
                                    <ul class="pull-right d-flex">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            @foreach ($allcategories as $category)
                <div class="tab-pane" id="category_{{ $category->id }}">
                    <ul class="row">
                        @forelse (App\Models\Product::where('category_id', $category->id)->get() as $item)
                        <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                            <div class="product-wrap">
                                <div class="product-img">
                                    <span>Sale</span>
                                    <img src="{{ asset('uploads/products') }}/{{ $item->thumbnail_photo }}" alt="">
                                    <div class="product-icon flex-style">
                                        <ul>
                                            <li><a data-toggle="modal" data-target="#exampleModalCenter" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                            
                                            <li>
                                                <form action="{{ url('add/to/wishlist') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                    <button type="submit" class="@if(App\Models\Wishlist::where('product_id', $item->id)->where('ip_address', request()->ip())->exists()) d-none @endif">
                                                        <i class="fa fa-heart"></i>
                                                    </button>
                                                </form>
                                            </li>
                                            
                                            <li>
                                                <form action="{{ url('add/to/cart') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="quantity" value="1" />
                                                    <button type="submit"><i class="fa fa-shopping-bag"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="{{ url('product/details') }}/{{ $item->id }}">{{ Str::limit($item->title, 40) }}</a></h3>
                                    <p class="pull-left">৳ {{ $item->price }}

                                    </p>
                                    <ul class="pull-right d-flex">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        @empty
                            <li>No products to show</li>
                        @endforelse
                       
                    </ul>
                </div>
            @endforeach
            
        </div>
    </div>
</div>
<!-- product-area end -->
@endsection