@extends('admin.master')
@section('body')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Product</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
</div>  
<div class="row">
    <div class="col-sm-12 container">
       <div class="card card-body rounded-0">
       @if($message = Session::get('message'))
      <div class="alert alert-warning alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       {{ $message}}
      </div>
      @endif
           <div class="table-responsive ">
               <table  class="table table-bordered">
                   <tr>
                    <th>SL.NO</th>
                    <th>Product category</th>
                    <th>Product brand</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product image</th>
                    <th>Action</th>
                   </tr>
                    
                   @foreach($products as $key => $product)
                   <tr>
                       <td>{{ $loop->iteration}}</td>
                       <td>{{$product->category->name }}</td>
                       <td>{{ $product->brand->name}}</td>
                       <td>{{ $product->Product_name}}</td>
                       <td>{{ $product->Product_Price}}</td>
                     
                       <td><img class="center" src="{{ $product->image}}" width="50px" height="50px" alt=""></td> 

                       <td>
                           <a href="{{ route('view-product', [ 'id' => $product->id])}}"class="btn btn-warning btn-sm">View</a>
                           <a href="{{ route('edit-product', [ 'id' => $product->id])}}"class="btn btn-success btn-sm">Edite</a>
                           <a href="{{ route('delete-product', [ 'id' => $product->id])}}"class="btn btn-danger btn-sm">Delete</a>
                          
                       </td>
                   </tr>
                   @endforeach
               </table>
           </div>
       </div>
    </div>
</div> 


@endsection