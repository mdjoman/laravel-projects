<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class Categoriescontoller extends Controller
{
   public function add()
   {
       return view('admin.add-categories');
   }
   public function manage()
   {
       return view('admin.manage-categories', ['categories' => Category::all()]);
   }
   public function create(Request $request)
   {
    $request->validate([
      'name' => 'required',
      'Description' => 'required',
      'status' => 'required',
      
    ]);
    $category = new Category();
    $category->name = $request->name;
    $category->Description = $request->Description;
    $category->status = $request->status;
    $category->save();

    return redirect()->back()->with('message', 'Category info create successfully');

   }
  public function edit($id)
  {
      $category = Category::find($id);

     return view('admin.edit', ['category' =>  $category ]);
  }

  public function update(Request $request)
  {
   
   $category =  Category::find( $request->id);
   $category->name = $request->name;
   $category->Description = $request->Description;
   $category->status = $request->status;
   $category->save();

   return redirect('/manage-categories')->with('message', 'Category info Update successfully');

  }
  public function delete($id)
  {
    $category =  Category::find($id); 
    $category->delete();

    return redirect('/manage-categories')->with('message', 'Category info Delete successfully');
  }

}
