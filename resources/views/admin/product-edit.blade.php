@extends('admin.master')
@section('body')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit product</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Edit product</a>
    </div>
</div>   

 <div class="card card-body mb-5">
    <div class="container">
      @if($message = Session::get('message'))
      <div class="alert alert-warning alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       {{ $message}}
      </div>
      @endif
            
      <div class="container">
        <form class="" action="{{ route ('update-product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
             <label class="col-sm-2 col-form-label" for="Categories Name"> Category Name:</label>
              <div class="col-sm-10">
               <select class="form-control"  name="category_id" id="">
                   <option value="">{{$product->category->name }}</option>
                   @foreach($categories as $key => $category)
                   <option value="{{$category->id}}"{{ $product->category_id == $category->id ? 'selected' : '' }} >{{$category->name}}</option>

                   @endforeach
               </select>
           
              </div>
         </div>
         <div class="form-group row">
             <label class="col-sm-2 col-form-label" for="brand Name"> Brand Name:</label>
              <div class="col-sm-10">
               <select class="form-control"  name="brand_id" id="">
                  
                   @foreach($brands as $key => $brand)
                   <option value="{{$brand->id}}"{{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{$brand->name}}</option>

                   @endforeach
                   
               </select>
              </div>
         </div>
          <div class="form-group row">
             <label class="col-sm-2 col-form-label" for="Categories Name"> Product Name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="Categories Name"  name="Product_name" value="{{ $product->Product_name}}">
                <input type="hidden"value="{{ $product->id }}" name="id">
            
              </div>
         </div>
         <div class="form-group row">
             <label class="col-sm-2 col-form-label" for="Categories Name">Product Code:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="Categories Name"  name="Product_code" value="{{ $product->Product_code}}">
              
              </div>
         </div>
         <div class="form-group row">
             <label class="col-sm-2 col-form-label" for="Categories Name">Product Price:</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="Categories Name"  name="Product_Price" value="{{ $product->Product_Price}}">
            
              </div>
         </div>
         <div class="form-group row">
             <label class="col-sm-2 col-form-label" for="Categories Name">Stock Amount:</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="Categories Name"  name="Product_Amount" value="{{ $product->Product_Amount}}">
         
              </div>
         </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" for="Description">Shrot Description:</label>
            <div class="col-sm-10">          
              <textarea   id="Categories Description"class="form-control" rows="2" name="sDescription"> {{ $product->sDescription}}</textarea>
             
            </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" for="Description"> Long Description:</label>
            <div class="col-sm-10">          
              <textarea   id="Categories Description"class="form-control" rows="4" name="lDescription"> {{ $product->lDescription}}</textarea>
           
            </div>
        </div>
      
        <div class="form-group row">
          <label class="col-sm-2 col-form-label " for="Description"> Product Image:</label>
            <div class="col-sm-10">
              <div class="form-check-inline ">
                  <label class="form-check-label "><input type="file" name="Image"accept="image/*"></label>
                  <img src="{{asset( $product->image)}}"width="150px" height="100px" alt="">
               
              </div>
           </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label " for="Description">  Product Sub-Image:</label>
            <div class="col-sm-10">
              <div class="form-check-inline ">
                  <label class="form-check-label "><input type="file" name="sImage[]"multiple accept="image/*" ></label>
                  @foreach($product->subimages as $key => $subimage)
                  <img src="{{asset($subimage->subimage)}}"width="50px" height="50px" alt="">
                  @endforeach
              
              </div>
           </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label " for="Description"> Publication status:</label>
            <div class="col-sm-10">
              <div class="form-check-inline ">
              <label class="form-check-label "><input type="radio" name="status"{{ $product->status == 'Published' ? 'checked' : '' }} value=" Published"> Published</label>
              </div>
             <div class="form-check-inline ">
               <label class="form-check-label"> <input type="radio" name="status"{{ $product->status ==  'Unpublished' ? 'checked' : '' }}  value=" Unpublished" >  Unpublished</label>
           
             </div>
           </div>
        </div>
       
        <div class="form-group row ">        
          <div class=" col-sm-10">
            <button type="submit" class="btn btn-success">Update Product</button>
         </div>
        </div>
    </form>
    </div>
 </div> 
@endsection