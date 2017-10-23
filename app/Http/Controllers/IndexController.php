<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\Cart;
use Session;



class IndexController extends Controller
{
    public function getIndex() {
        $slide = Slide::all();
        $new_prod = Product::where('new','1')->paginate(8);
        $top_prod = Product::where('top_product','1')->paginate(8);
  
         return view('main.main',compact('slide','new_prod','top_prod'));
    }

    public function getAddtoCart(Request $rq,$id){
        $prod = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($prod,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getSearch(Request $req){
        $prod = Product::where('product_name','like','%'.$req->keyword.'%')->orWhere('promotion_price',$req->keyword)->get();
        return view('main.search',compact('prod'));
    }
    public function getCart (Request $rq,$id) {
    $product = Product::find($id);
    $oldCart = Session('cart')?Session::get('cart'):null;
    $cart = new Cart($oldCart);
    $cart->add($product,$id);
    $rq->session()->put('cart',$cart);
    return redirect()->back();
  }
  public function deleteCart($id){
      //check giỏ hàng 
      $oldCart= Session::has('cart')?Session::get('cart'):null;
      $cart = new Cart($oldCart);
      $cart->removeItem($id);

    //   if(count($cart->items) >0){
        
    //   }else{
    //       Session::forget('cart');
    //   }
      Session::put('cart',$cart);
      //Refesh giỏ hàng 
    
      return redirect()->back();
  }

  public function checkout(){
      return view('main.checkout');
  }

  public function postCheckout(Request $rq){
   
}
}
