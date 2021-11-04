@extends('admin.master')
@section('body')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Order</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Manage Order</a>
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
               <h3 class="text-center bg-warning text-white" >Customar information</h3>
               <table  class="table table-bordered">
                   <tr>
      
                    <th>Customar Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Payment Type</th>
                     <th>Address</th>
                     <th>Order Date</th>
                    
                   </tr>
                    
                   <tr>
                   
                       <td>{{$customar->first_name}} {{$customar->last_name}}</td>
                       <td>{{$customar->email}}</td>
                       <td>{{ $customar->mobile}}</td>
                       <td>{{$orderpyment->payment_method}}</td>
                       <td>{{ $customar->address}}</td>
                       <td>{{ $Orders->order_date}}</td>
                      
                   </tr>
               
               </table>
           </div>
       </div>
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
           <h3 class="text-center bg-warning text-white" >Shiping information</h3>
               <table  class="table table-bordered">
                   <tr>
                    <th>shiping_id</th>
              
                    <th>Recipient Name</th>
                    <th>Recipient Email</th>
                    <th>Recipien Mobile Number</th>
                     <th>Recipien Address</th>
                     <th>Order Date</th>
                    
                   </tr>
                    
                 
                   <tr>
                       <td>{{  Session::get('shiping_id', $shiping->id);}}</td>
                       <td>{{$shiping->first_name}} {{$shiping->last_name}}</td>
                       <td>{{  $shiping->email }}</td>
                       <td>{{ $shiping->mobile}}</td>
                       <td>{{ $shiping->address}}</td>
                       <td>{{ $Orders->order_date}}</td>
                   </tr>
                   
                
               </table>
           </div>
       </div>
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
           <h3 class="text-center bg-warning text-white" >Products information</h3>
               <table  class="table table-bordered">
                   <tr>
                    <th>SL.NO</th>
                    <th>Product_id</th>
                    <th>Product_Name</th>
                     <th>Product_Price</th>
                    <th>Product_Qty</th>
                    <th>Product_Image </th>
                    
                   
                   </tr>
                   @foreach($orderDetails as $key => $orderDetails)
                   <tr>
                       <td>{{ $loop->iteration}}</td>
                       <td>{{$orderDetails->Product_id }}</td>
                       <td>{{ $orderDetails->product_name}}</td>
                       <td>{{ $orderDetails->product_price}}</td>
                       <td>{{$orderDetails->product_qty  }}</td>
                       <td> <img src="{{ asset($orderDetails->product_image) }}" class="" width="80px" height="60px" alt=""></td>
                   </tr>
                   @endforeach
               </table>
           </div>
       </div>
    </div>
</div


@endsection