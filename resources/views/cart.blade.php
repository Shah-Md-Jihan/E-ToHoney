@extends('layouts.frontend_master')

@section('content')
<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Shopping Cart</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Shopping Cart</span></li>
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
                <form action="{{ url('cart/update') }}" method="POST">
                    @csrf
                    <table class="table-responsive cart-wrap">
                        <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="quantity">Quantity</th>
                                <th class="total">Total</th>
                                <th class="remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $cart_subtotal = 0;
                            @endphp
                            @forelse ( $carts as $cart )
                            <tr>
                                <td class="images"><img src="{{ asset('uploads/products') }}/{{ $cart->relationwithproducttable->thumbnail_photo }}" alt=""></td>
                                <td class="product"><a href="{{ url('product/details') }}/{{ $cart->relationwithproducttable->id }}">{{ $cart->relationwithproducttable->title }}</a></td>
                                <td class="ptice">৳{{ $cart->relationwithproducttable->price }}</td>
                                <td class="quantity cart-plus-minus">
                                    <input type="text" name="quantity[{{ $cart->id }}]" value="{{ $cart->quantity }}" />
                                </td>
                                <td class="total">
                                    ৳{{ $cart->relationwithproducttable->price * $cart->quantity }}
                                    @php
                                        $cart_subtotal = $cart_subtotal + ($cart->relationwithproducttable->price * $cart->quantity);
                                    @endphp
                                </td>
                                <td class="remove">
                                    <a href="{{ url('cart/delete') }}/{{ $cart->id }}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                                
                            @empty
                            <tr>
                                <td colspan="6">
                                    <img height="100px" width="100px" src="{{ asset('uploads/cart/empty-cart.png') }}" alt="">
                                    <h6 class="text-danger">No products on the cart</h6>
                                </td>
                            </tr>
                            @endforelse
                            
                            
                        </tbody>
                    </table>
                    <div class="row mt-60">
                        <div class="col-xl-4 col-lg-5 col-md-6 ">
                            <div class="cartcupon-wrap">
                                <ul class="d-flex">
                                    <li>
                                        <button type="submit">Update Cart</button>
                                    </li>
                                </form>
                                    <li><a href="{{ url('/shop') }}">Continue Shopping</a></li>
                                </ul>
                                <h3>Cupon</h3>
                                <p>Enter Your Cupon Code if You Have One</p>
                                <div class="cupon-wrap">
                                    <input type="text" placeholder="Cupon Code">
                                    <button>Apply Cupon</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                            <div class="cart-total text-right">
                                <h3>Cart Totals</h3>
                                <ul>
                                    <li><span class="pull-left">Subtotal </span>৳{{ $cart_subtotal }}</li>
                                    <li><span class="pull-left"> Total </span> $380.00</li>
                                </ul>
                                <a href="checkout.html">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>
<!-- cart-area end -->
@endsection