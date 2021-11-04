<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;

class Brandcontoller extends Controller
{
    public function add()
    {
        return view('admin.add-brand');
    }
   
    public function manage()
    {
        return view('admin.manage-brand', ['brands' => Brand::all()]);
    }
    public function brand(Request $request)
    {
     $brand = new Brand();
     $brand->name = $request->name;
     $brand->Description = $request->Description;
     $brand->status = $request->status;
     $brand->save();
 
     return redirect()->back()->with('message', 'Brand info create successfully');
 
    }
    public function edit($id)
    {
        $brand = Brand::find($id);
  
       return view('admin.edit-brand', ['brand' =>  $brand ]);
    }
  
    public function update(Request $request)
    {
     $brand =  brand::find( $request->id);
     $brand->name = $request->name;
     $brand->Description = $request->Description;
     $brand->status = $request->status;
     $brand->save();
  
     return redirect('/manage-brand')->with('message', 'brand info Update successfully');
  
    }
    public function delete($id)
    {
      $brand =  Brand::find($id); 
      $brand->delete();
  
      return redirect('/manage-brand')->with('message', 'brand info Delete successfully');
    }
  
  

}
