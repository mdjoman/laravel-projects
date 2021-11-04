<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     
	<title>E-Bajar|| Invoice</title>
	
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('/') }}style-file/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->

  <!-- font awesome style -->
  <link href="{{ asset('/') }}style-file/css/font-awesome.min.css" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('/') }}style-file/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('/') }}style-file/css/responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
	body{
    margin-top:20px;
    background:#eee;
    font: 16px Arial, Helvetica,"Lucida Grande", serif;
}
@media print {
body {-webkit-print-color-adjust: exact !important;}
}
@media print
 { body
     {margin:0; 
    padding:0;
     line-height: 1.4em;
      word-spacing:1px;
      letter-spacing:0.2px;
     font: 12px Arial, Helvetica,"Lucida Grande", serif;
      
    }
}
@media print
 {
     .invoice-price {
        background: #f0f3f4 !important;
        display: table !important;
        width: 100% !important;
    }
    .invoice-price .invoice-price-left,
.invoice-price .invoice-price-right {
    display: table-cell !important;
    padding: 20px !important;
    font-size: 20px !important;
    font-weight: 600 !important;
    width: 75% !important;
    position: relative !important;
    vertical-align: middle !important;
}
.invoice-price .invoice-price-right {
    width: 25% !important;
    background: #2d353c !important;
    color: #fff !important;
    font-size: 28px !important;
    text-align: right !important;
    vertical-align: bottom !important;
    font-weight: 300 !important;
}
}

.invoice {
    background: #fff;
    padding: 20px
}

.invoice-company {
    font-size: 20px
}

.invoice-header {
    margin: 0 -20px;
    background: #f0f3f4;
    padding: 20px
}

.invoice-date,
.invoice-from,
.invoice-to {
    display: table-cell;
    width: 1%
}

.invoice-from,
.invoice-to {
    padding-right: 20px
}

.invoice-date .date,
.invoice-from strong,
.invoice-to strong {
    font-size: 16px;
    font-weight: 600
}

.invoice-date {
    text-align: right;
    padding-left: 20px
}

.invoice-price {
    background: #f0f3f4;
    display: table;
    width: 100%
}

.invoice-price .invoice-price-left,
.invoice-price .invoice-price-right {
    display: table-cell;
    padding: 20px;
    font-size: 20px;
    font-weight: 600;
    width: 75%;
    position: relative;
    vertical-align: middle
}

.invoice-price .invoice-price-left .sub-price {
    display: table-cell;
    vertical-align: middle;
    padding: 0 20px
}

.invoice-price small {
    font-size: 12px;
    font-weight: 400;
    display: block
}

.invoice-price .invoice-price-row {
    display: table;
    float: left
}

.invoice-price .invoice-price-right {
    width: 25%;
    background: #2d353c;
    color: #fff;
    font-size: 28px;
    text-align: right;
    vertical-align: bottom;
    font-weight: 300
}

.invoice-price .invoice-price-right small {
    display: block;
    opacity: .6;
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 12px
}

.invoice-footer {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-size: 10px
}

.invoice-note {
    color: #999;
    margin-top: 80px;
    font-size: 85%
}

.invoice>div:not(.invoice-footer) {
    margin-bottom: 20px
}

.btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
    color: #2d353c;
    background: #fff;
    border-color: #d9dfe3;
}
</style>
</head>
<body>

<div class="container">
   <div class="col-md-12">
      <div class="invoice">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <span class="pull-right hidden-print">
            <a href="{{ route('dwonlod-invoice', [ 'id' => $Orders->id])}}" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
            </span>
            E-BAJAR
         </div>
         <!-- end invoice-company -->
         <!-- begin invoice-header -->
         <div class="invoice-header">
            <div class="invoice-from">
          
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">CUSTOMAR</strong><br>
                  {{$customar->first_name}} {{$customar->last_name}}<br>
                  {{$customar->email}}<br>
                  {{ $customar->mobile}}<br>
				  {{ $customar->address}}<br>
				  {{ $Orders->order_date}}
               </address>
            </div>
            <div class="invoice-to">
            
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">SHIPING INFO</strong><br>
                  <td>{{$shiping->first_name}} {{$shiping->last_name}}<br>
				  {{$shiping->email }}<br>
				  {{ $shiping->mobile}}<br>
				  {{ $shiping->address}}
               </address>
            </div>
            <div class="invoice-date">
               <small>Invoice</small>
               <div class="date text-inverse m-t-5">{{date('M-d-y')}}</div>
               <div class="invoice-detail">#
                  {{$Orders->id }}<br>
                  Services Product
               </div>
            </div>
         </div>
         <!-- end invoice-header -->
<div class="row">
<?php use Illuminate\Support\Facades\Session;?>


    <div class="col-sm-12 container">
       <div class="card card-body rounded-0">
    
	  <?php $sum = 0;  ?>
	  <div class="row">
    <div class="col-sm-12 container">
       <div class="card card-body rounded-0">
     
     
           <div class="table-responsive ">
           <h3 class="text-center  text-white bg-success p-2" >PRODUCTS INFOMATION</h3>
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
				   <tr> 
			       <?php $sum = $sum + ($orderDetails->product_qty * $orderDetails->product_price)?>
                   @endforeach
               </table>
           </div>
       </div>
    </div>
</div>


               <table class="table table-bordered ">
               <tr> 
			   <?php $sum = $sum + ($orderDetails->product_qty * $orderDetails->product_price)?>
                  <th>Sub Total</th>
                  <td class=" mr-2" style="text-align: right;">${{number_format($sum)}}
                 
                
                </td>
             </tr>
              <tr>
         
                   <th>Vat/ Taxs</th>
                   <td class=" mr-2" style="text-align: right;">$
                   <?php
                   $vat = ($sum * 15)/100;
                   echo number_format($vat);
               
                   ?></td>
               </tr>
            
              <tr>
                   <th>Shiping coust</th>  
                  <td class=" mr-2" style="text-align: right;">Free</td>
               </tr>
              <tr>
                   <th>Grand Price</th>
                   <td  class=" mr-2" style="text-align: right;">$
               
                   {{number_format( $grandtotal = $sum + $vat)}}

                   <?php
                  
                   ?>
              
                </td>
               </tr>
            
               </table>
           </div>
         
       </div>
    </div>
</div> 

<div class="invoice-price">
               <div class="invoice-price-left">
                  <div class="invoice-price-row">
                     <div class="sub-price">
                        <small>SUBTOTAL</small>
                        <span class="text-inverse">${{number_format($sum)}}</span>
                     </div>
                     <div class="sub-price">
                        <i class="fa fa-plus text-muted"></i>
                     </div>
                     <div class="sub-price">
                        <small>Vat/ Taxs</small>
                        <span class="text-inverse">${{number_format($vat)}} </span>
                     </div>
                  </div>
               </div>
               <div class="invoice-price-right">
			   <small>TOTAL</small> <span class="f-w-600">${{number_format( $grandtotal = $sum + $vat)}}</span>
               </div>
            </div>
            <!-- end invoice-price -->
         </div>
         <!-- end invoice-content -->
         <!-- begin invoice-note -->
         <div class="invoice-note">
            * Make all cheques payable to E- Bajar<br>
            * Payment is due within 30 days<br>
            * If you have any questions concerning this invoice, iitr670@gmail.com
         </div>
         <!-- end invoice-note -->
         <!-- begin invoice-footer -->
         <div class="invoice-footer">
            <p class="text-center m-b-5 f-w-600">
               THANK YOU FOR YOUR BUSINESS
            </p>
            <p class="text-center">
			<span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> myprotfolio24.unaux.com.com</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
               <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> iitr670@gmail.com</span>
            </p>
         </div>
         <!-- end invoice-footer -->
      </div>
   </div>
</div>

 
 

  <!-- jQery -->
  <script src="{{ asset('/') }}style-file/js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="{{ asset('/') }}style-file/js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="{{ asset('/') }}style-file/js/custom.js"></script>
</body>
</html>

