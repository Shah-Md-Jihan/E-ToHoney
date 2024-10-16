<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function addcoupon(){
        return view('admin.coupon.addcoupon');
    }

    function addcouponpost(Request $request){
        
        $request->validate([
            'coupon_title' => 'required|unique:coupons,coupon_title',
            'discount_amount' => 'required|numeric|min:1|max:99',
            'expired_date' => 'required',
        ]);

        Coupon::insert([
            'coupon_title' => strtoupper($request->coupon_title),
            'discount_amount' => $request->discount_amount,
            'expired_date' => $request->expired_date,
            'created_at' => Carbon::now(),
        ]);

        return redirect('/coupons');

    }

    function coupons(){
        return view('admin.coupon.listcoupon', [
            'coupons' => Coupon::latest()->paginate(5)
        ]);
    }

}
