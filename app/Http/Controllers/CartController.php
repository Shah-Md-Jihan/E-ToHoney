<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Coupon;
use Carbon\Carbon;

class CartController extends Controller
{

    //Cart view
    function viewcart($coupon_name = ""){
        
        if($coupon_name){
            if(Coupon::where('coupon_title', $coupon_name)->exists()){
                if(Coupon::where('coupon_title', $coupon_name)->first()->expired_date >= Carbon::now()->format('Y-m-d')){
                    $discount_amount_from_db = Coupon::where('coupon_title', $coupon_name)->first()->discount_amount;
                    return view('cart',[
                        'carts'=>Cart::where('ip_address', request()->ip())->get(),
                        'discount_amount_from_db' => $discount_amount_from_db,
                        'coupon_name' => $coupon_name,
                    ]);
                }
                else{
                    return redirect('cart')->with('coupon_expired_alert', 'Coupon is expired');
                }
            }
            else{
                return redirect('cart')->with('coupon_invalid_error', 'Invalid Coupon');
            }
        }
        else{
            return view('cart',[
                'carts'=>Cart::where('ip_address', request()->ip())->get()
            ]);
        }
        
    }


    //Cart addition
    function addtocart(Request $request){
        if(Cart::where('product_id', $request->product_id)->where('ip_address', request()->ip())->exists()){
            Cart::where('product_id', $request->product_id)->where('ip_address', request()->ip())->increment('quantity', $request->quantity);
        }
        else{
            Cart::insert([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'ip_address' => request()->ip(),
                'created_at' => Carbon::now(),
            ]);
        }
       
        return back();
    }

    //Cart deletation
    function cartdelete($cart_id){
        Cart::find($cart_id)->delete();
        return back();
    }

    // Cart update
    function cartupdate(Request $request){
        foreach($request->quantity as $cart_id => $updated_quantity){
            Cart::find($cart_id)->update([
                'quantity' => $updated_quantity
            ]);
        }
        return back();
    }

}
