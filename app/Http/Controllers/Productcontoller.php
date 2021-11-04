<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subimage;
use BaconQrCode\Renderer\Path\Move;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class Productcontoller extends Controller
{
    public function add()
    {
        return view('admin.add-product', [
          'categorys'  => Category::all(),
          'brands'  => Brand::all(),
         
        ]);
    }
    public function manage()
    {

        return view('admin.manage-product', ['products' =>  Product::all()]);
    }
    public function view($id)
    {

        return view('admin.view-product', ['product' =>  Product::find($id)]);
    }


    public function create(Request $request)
    {
      $image = $request->file('Image');
      $imagename = $image->getClientOriginalName();
      $directory = 'Product-image/';
      $image->move($directory, $imagename);
      $imageurl = $directory.$imagename;


      $product = new Product();
      $product->category_id = $request->category_id;
      $product->brand_id = $request->brand_id;
      $product->Product_name = $request->Product_name;
      $product->Product_code = $request->Product_code;
      $product->Product_Price = $request->Product_Price;
      $product->Product_Amount = $request->Product_Amount;
      $product->sDescription = $request->sDescription;
      $product->lDescription = $request->lDescription;
      $product->image =$imageurl;
      $product->status = $request->status;
      $product->save();


      $images = $request->file('sImage');

     foreach($images as $image)
     {
      $imagename = $image->getClientOriginalName();
      $directory = 'Product-sub-image/';
      $image->move($directory, $imagename);
      $imageurl = $directory.$imagename;

       
        $subimage  = new Subimage();
        $subimage->Product_id =$product->id;  
        $subimage->subimage = $imageurl;
        $subimage->save();

     }
     return redirect()->back()->with('message', 'Product info create successfully');

    }
    public function edit($id)
  {

     return view('admin.product-edit', [
      'product' =>  Product::find($id),
      'categories'  => Category::all(),
      'brands'  => Brand::all(),
      
    ]);
  }
  public function update(Request $request)

  {
      $product = Product::find($request->id);

      if($image = $request->file('Image'))
      
      {
        if(file_Exists($product->image))

        {
          unlink(($product->image));
        }

      $imagename = $image->getClientOriginalName();
      $directory = 'Product-image/';
      $image->move($directory, $imagename);
      $imageurl = $directory.$imagename;

      }
      else
      {
        $imageurl  = $product->image;
      }

      $product->category_id = $request->category_id;
      $product->brand_id = $request->brand_id;
      $product->Product_name = $request->Product_name;
      $product->Product_code = $request->Product_code;
      $product->Product_Price = $request->Product_Price;
      $product->Product_Amount = $request->Product_Amount;
      $product->sDescription = $request->sDescription;
      $product->lDescription = $request->lDescription;
      $product->image =$imageurl;
      $product->status = $request->status;
      $product->save();


    if($images = $request->file('sImage'))
    {
      $subimages = Subimage::where('product_id', $product->id)->get();
      foreach($subimages as $subimage)
      {
            if(file_Exists($subimage->subimage))

            {
              unlink(($subimage->subimage));
            }
              $subimage->delete();
      }
    
        foreach($images as $image)
      {
        $imagename = $image->getClientOriginalName();
        $directory = 'Product-sub-image/';
        $image->move($directory, $imagename);
        $imageurl = $directory.$imagename;

        
          $subimage  = new Subimage();
          $subimage->Product_id =$product->id;  
          $subimage->subimage = $imageurl;
          $subimage->save();
      }    

    }
    return redirect('/manage-product')->with('message', 'product info Update successfully');
  }

public function delete($id)
{
  $product =  Product::find($id); 
  $product->delete();

  return redirect('/manage-product')->with('message', 'product info Delete successfully');
}
}
