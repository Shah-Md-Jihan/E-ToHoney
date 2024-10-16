@extends('layouts.frontend_master')

@section('content')
<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Wishlist</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Wishlist</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- cart-area start -->
<div class="cart-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="http://themepresss.com/tf/html/tohoney/cart">
                    <table class="table-responsive cart-wrap">
                        <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="stock">Stock Stutus </th>
                                <th class="addcart">Details</th>
                                <th class="remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($wishlists as $wishlist)
                            <tr>
                                <td class="images"><img src="{{ asset('uploads/products') }}/{{ $wishlist->connectionwithproduct->thumbnail_photo }}" alt=""></td>
                                <td class="product"><a href="{{ url('/product/details') }}/{{ $wishlist->connectionwithproduct->id }}">{{ $wishlist->connectionwithproduct->title }}</a></td>
                                <td class="ptice">৳{{ $wishlist->connectionwithproduct->price }}</td>
                                <td class="stock">
                                    @if ($wishlist->connectionwithproduct->quantity > 0)
                                    In Stock
                                    @else
                                    Out Of Stock
                                    @endif
                                </td>

                                <td class="addcart"><a href="{{ url('/product/details') }}/{{ $wishlist->connectionwithproduct->id }}">View Details</a></td>
                                <td class="remove">
                                    <a href="{{ url('remove/wishlist') }}/{{ $wishlist->id }}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            @empty
                                <tr class="text-danger text-center">
                                    <td colspan="50">
                                        <img height="100px" width="100px" src="{{ asset('uploads/cart/empty-cart.png') }}" alt="">
                                        <h6>No products on the Wishlist</h6>
                                    </td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection