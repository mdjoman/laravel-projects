<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subimage;
use Illuminate\Http\Request;

class ecommarcecontroller extends Controller
{
    public function index()
    {
        return view('Site-template.index',
        ['products' => Product::orderBy('id', 'desc')->get(),
        'categories' => Category::where('status','Published' )->get()
    
    ]);
    }

    public function about()
    {
        return view('Site-template.about');
    }

    public function product($id)
    {
        return view('Site-template.category',[
            'categories' => Category::where('status','Published' )->get(),
        'products' => Product::where('category_id', $id)->where('status','Published' )->orderBy('id','desc')->get()
        ]);
    }

    public function details($id)
    {
        $product = Product::find($id);
        return view('Site-template.product-details', [
            'categories' => Category::where('status','Published' )->get(),
            'product' =>$product,
            'related_products' => Product::where('category_id', $product->category_id)->where('status','Published' )->orderBy('id','desc')->get(), 
            'subimages'  => Subimage::where('product_id', $id)->get(),

        ]);
    }
    
    
}
