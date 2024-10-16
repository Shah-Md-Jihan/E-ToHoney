<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Carbon\Carbon;

class WishlistController extends Controller
{

    function viewwishlist(){
        return view('wishlist',[
            'wishlists' => Wishlist::where('ip_address', request()->ip())->get()
        ]);
    }

    function addtowishlist(Request $request){
        Wishlist::insert([
            'product_id' => $request->product_id,
            'ip_address' => request()->ip(),
            'quantity' => 1,
            'created_at' => Carbon::now()
        ]);
        return back();
    }

    // Remove from wishlist
    function removewishlist($wishlist_id){
        Wishlist::find($wishlist_id)->delete();
        return back();
    }
}
