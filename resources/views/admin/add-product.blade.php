@extends('admin.master')
@section('body')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Categories</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
        <form class="" action="{{ route ('create-product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
             <label class="col-sm-2 col-form-label" for="Categories Name"> Category Name:</label>
              <div class="col-sm-10">
               <select class="form-control"  name="category_id" id="">
                   <option value="">----- Select Category Name-----</option>
                   @foreach($categorys as $key => $category)
                   <option value="{{$category->id}}">{{$category->name}}</option>

                   @endforeach
               </select>
              <span>{{ $errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
              </div>
         </div>
         <div class="form-group row">
             <label class="col-sm-2 col-form-label" for="brand Name"> Brand Name:</label>
              <div class="col-sm-10">
               <select class="form-control"  name="brand_id" id="">
                   <option value="-">---- Select Brand Name-----</option>
                   @foreach($brands as $key => $brand)
                   <option value="{{$brand->id}}">{{$brand->name}}</option>

                   @endforeach
                   
               </select>
              <span>{{ $errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
              </div>
         </div>
          <div class="form-group row">
             <label class="col-sm-2 col-form-label" for="Categories Name"> Product Name:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="Categories Name" placeholder="Categories Name...." name="Product_name">
              <span>{{ $errors->has('Product_name') ? $errors->first('Product_name') : ''}}</span>
              </div>
         </div>
         <div class="form-group row">
             <label class="col-sm-2 col-form-label" for="Categories Name">Product Code:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="Categories Name" placeholder="'5620'" name="Product_code">
              <span>{{ $errors->has('Product_code') ? $errors->first('Product_code') : ''}}</span>
              </div>
         </div>
         <div class="form-group row">
             <label class="col-sm-2 col-form-label" for="Categories Name">Product Price:</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="Categories Name" placeholder="100" name="Product_Price">
              <span>{{ $errors->has('Product_Price') ? $errors->first('Product_Price') : ''}}</span>
              </div>
         </div>
         <div class="form-group row">
             <label class="col-sm-2 col-form-label" for="Categories Name">Stock Amount:</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="Categories Name" placeholder="3" name="Product_Amount">
              <span>{{ $errors->has('Product_Amount') ? $errors->first('Product_Amount') : ''}}</span>
              </div>
         </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" for="Description">Shrot Description:</label>
            <div class="col-sm-10">          
              <textarea   id="Categories Description"class="form-control" rows="2" name="sDescription"> Description</textarea>
              <span>{{ $errors->has('sDescription') ? $errors->first('sDescription') : ''}}</span>
            </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" for="Description"> Long Description:</label>
            <div class="col-sm-10">          
              <textarea   id="Categories Description"class="form-control" rows="4" name="lDescription"> Description</textarea>
              <span>{{ $errors->has('lDescription') ? $errors->first('lDescription') : ''}}</span>
            </div>
        </div>
      
        <div class="form-group row">
          <label class="col-sm-2 col-form-label " for="Description"> Product Image:</label>
            <div class="col-sm-10">
              <div class="form-check-inline ">
                  <label class="form-check-label "><input type="file" name="Image" accept="image/*" value=" "></label>
                  <span>{{ $errors->has('Image') ? $errors->first('Image') : ''}}</span>
              </div>
           </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label " for="Description">  Product Sub-Image:</label>
            <div class="col-sm-10">
              <div class="form-check-inline ">
                  <label class="form-check-label "><input type="file" multiple accept="image/*" name="sImage[]" value=" "></label>
                  <span>{{ $errors->has('sImage') ? $errors->first('sImage') : ''}}</span>
              </div>
           </div>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 col-form-label " for="Description"> Publication status:</label>
            <div class="col-sm-10">
              <div class="form-check-inline ">
                  <label class="form-check-label "><input type="radio" name="status" value=" Published"> Published</label>
                  <span>{{ $errors->has('status') ? $errors->first('status') : ''}}</span>
              </div>
             <div class="form-check-inline ">
               <label class="form-check-label"> <input type="radio" name="status"value=" Unpublished" >  Unpublished</label>
               <span>{{ $errors->has('status') ? $errors->first('status') : ''}}</span>
             </div>
           </div>
        </div>
       
        <div class="form-group row ">        
          <div class=" col-sm-10">
            <button type="submit" class="btn btn-success">Creat New Product</button>
         </div>
        </div>
    </form>
    </div>
 </div> 
@endsection