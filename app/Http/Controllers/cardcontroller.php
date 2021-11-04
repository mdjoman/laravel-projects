<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customar;
use App\Models\Product;
use App\Models\Shiping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class cardcontroller extends Controller
{
    public function cart(request $Request){
        $product = Product::find($Request->id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->Product_name,
            'qty'  =>  $Request->qnty,
            'price' => $product->Product_Price,
            'weight' => 0,
            'options' =>[
            'image'  =>$product->image
            ]

        ]);
       return redirect('show-cart')->with('message', 'Product info Add to cart successfully');


    }

    public function show(){
        $cartproducts = Cart::content();
        return view('Site-template.show-cart',  [
            'categories' => Category::where('status','Published' )->get(),
            'products' => Product::orderBy('id', 'desc')->get(),
            'cartproducts' =>   $cartproducts,
        

        ]);
    }
    public function remove($rowId){
        Cart::remove($rowId);

       return redirect('show-cart')->with('message', 'Product info Remove to cart successfully');

    }
    public function update(Request $Request){
        Cart::update($Request->rowId, $Request->qty);

        return redirect('show-cart')->with('message', 'Product info Update to cart successfully'); 
    }
    public function checkout(){
        $cartproducts = Cart::content();
        return view('Site-template.checkout',  [
            'categories' => Category::where('status','Published' )->get(),
            'products' => Product::orderBy('id', 'desc')->get(),
            'cartproducts' =>   $cartproducts,
            'customar'    =>   Customar::find( Session::get('customar_id')),

        ]);
    }

}
