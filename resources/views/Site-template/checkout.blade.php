@extends('Site-template.master')
@section('body')


    <style>
 		body{
			background:#f1f2f3;
			font-size:100%;
			padding:0;
			margin:0;
			font-family: 'Open Sans', sans-serif;
    }
		*{
			box-sizing:border-box;
			-webkit-box-sizing:border-box;
		}
  form > div {
  position: relative;
  overflow: hidden;
  width:100%;
  max-width:320px;
  padding: 7px;
  
}
form input {
  width: 100%;
  max-width:320px;
  border: 2px solid gray;
  background: none;
  position: relative;
  top: 0;
  left: 0;
  z-index: 1;
  padding: 8px 12px;
  outline: 0;
}
form input:valid{
  background: white;
}
form input:focus{
  border-color:#80c0ff;
}
form input:focus + label{
	background:#80c0ff;
  color: white;
  font-size: 1em;
  padding: 1px 6px;
  z-index: 2;
  text-transform: uppercase;
}
form label {
  transition: background 0.2s, color 0.2s, top 0.2s, bottom 0.2s, right 0.2s, left 0.2s;
  font-size:1em;
  position: absolute;
  color: #999;
  padding: 7px 6px;
}
form textarea {
  display: block;
  resize: vertical;
}

form.go-right label {
  top: 2px;
  
  margin-right: -100%;
  bottom: 2px;
  border-bottom-right-radius:3px;
  border-top-right-radius:3px;
}

		img{
			max-width: 100%;
		}
		#wrap{
			width:80%;
			margin:20px auto;
			background:#FFF;
		}
		.column{
		  width:30%;
			float:left;
			margin-right:2%;
			border-radius:10px;
			background:#fff;
		}
		.column3{
			margin-right:0;
			margin-left:0;
		}
		.number{
			width:50px;
			height:50px;
			background:#80c0ff;
			color:#FFF;
			font-size:36px;
			text-align: center;
			border-radius:50%;
			float:left;
			padding-top:5px;
			margin-left:10px;
		}
		.step {
			width: 100%;
			height: auto;
			color: #80c0ff;
			padding-left: 1%;
			padding-top: 20px;
			float: left;
			position: relative;
		}
		.step:after{
			content:'';
			width:80%;
			height:3px;
			background:#80c0ff;
			position:absolute;
			bottom:0;
			right:0;
			border-top-left-radius:10px;
			border-bottom-left-radius:10px;
		}
		.title{
			float:left;
			width:70%;
			margin-left:3%;
			font-size:1.2em;
			font-weight:300;
			margin-top:-5px;
		}
		.title h1{
			font-weight:300;
		}
		.content{
			padding:2em 2em;
			width:100%;
			margin:0 auto;
			height:auto;
			display:block;
			float:left;
		}
		.content label{
			font-size:1.5em;
		}
		.content input{
			width:100%;
			padding:5px 10px;
			border:1px solid #ccc;
			border-radius:3px;
			display:inline-block;
			font-size: 1em;
		}
		.content button{
			display:block;
			float:none;
			margin:5px auto;
			background:#80c0ff;
			width:200px;
			border:0;
			padding:5px 15px;
			font-size:1.3em;
			color:#FFF;
			border-bottom:3px solid #4da7ff;
			border-radius:2px;
			clear:both;
		}
		.content .continue{
			display:block;
			float:none;
			background:#80c0ff;
			width:200px;
			border:0;
			padding:5px 15px;
			font-size:1.6em;
			color:#FFF;
			border-bottom:3px solid #4da7ff;
			border-radius:2px;
			clear:both;
			text-align:center;
			text-decoration: none;
			margin:15px auto;
		}
		#shipping,
		#email{
			border-bottom:1px dotted #ccc;
			padding-bottom:1em;
    }
		.select{
  			width: 100%;
       max-width:320px;
  			height: 35px;
  			overflow: hidden;
  			border: 1px solid #ccc;
  			border-radius: 2px;
  			display: inline-block;
  			margin-top:5px; 
  		}
  	.state_options select,
		.country_options select{
  			background: transparent;
  			display:inline-block;
  			width:100%;
  			padding: 5px;
  			font-size: 1em;
  			line-height: 1;
  			border: 0;
  			border-radius:0;
  			height: 40px;
		}
   #address .state_options label,
	 #address .country_options label.country{
        right: 0;
        margin-right: 0;
        width: 40%;
        top: 11px;
        bottom: 6px;
        background: #80c0ff;
        color: white;
        font-size: 1em;
        padding: 7px 24px;
        z-index: 2;
        text-transform: uppercase;
    }
    #address input[type="checkbox"]{
			width:10%;
			float:left;
		}
		#address label.same,
    #address form input:focus + label.same{
			width:85%;
			float:left;
			margin-left:0;
			display:block;
			font-size:1em;
     padding:0;
			margin-bottom:15px;
     top:3px;
     right: 100%;
     margin-right:-100%;
     bottom: 0;
     background:transparent;
     color:initial;
     text-transform:uppercase;
     border-bottom-right-radius: 3px;
     border-top-right-radius: 3px;
		}
		#shipping input[type="radio"],
   #shipping input[type="radio"]:focus{
			width:30px;
		}
    #shipping label{
      padding:0;
      font-size:1.3em;
    }
		#shipping.price{
			display:inline-block;
		}
    #payment .expiry{
      margin-top:7px;
    }
		#payment label.exp_date{
            right: 0;
            margin-right: 0;
            width: 35%;
            top: 12px;
            bottom: 5px;
            background: #80c0ff;
            color: white;
            font-size: 0.6em;
            padding: 11px 1px;
            z-index: 2;
            text-transform: uppercase;
		}
		#payment .month_select,
		#payment .year_select{
  			width: 80%;
  			height: 40px;
    
  			overflow: hidden;
  			border: 1px solid #ccc;
  			border-radius: 2px;
  			display: inline-block;
		}
		.month_select select,
		.year_select select{
  			background: transparent;
  			display:inline-block;
  			width: 100%;
  			padding: 5px;
  			font-size: 1.5em;
  			line-height: 1;
  			border: 0;
  			border-radius:0;
  			height: 40px;
		}
		#payment .sec_num,
		#payment .expiry{
			display:block;
			float:left;
		}
		#payment .sec_num{
			width:100%;
			margin-top:5px;
     margin-bottom:15px;
		}
	.left{
			width:100%;
			float:left;
		}
		.accepted{
			width:100%;
			padding-right:1em;
			padding-left:1em;
			margin-top:30px;
		}
 		.accepted span{
			display: table-cell;
			padding:3px;
		}
		.secured {
			margin-top:5px;
			padding-left:1em;
			padding-right:1em;
		}
		.secured .lock{
			float:left;
			padding:3px;
			width:25%;
			margin-top:10px;
		}
 		.secured .security{
			float:left;
			margin-right:5px;
			font-style: italic;
			color:#aaa;
			width:70%;
			margin-bottom:20px;
		}
		.products{
			width:100%;
			float:left;
			padding-bottom:3px;
			border-bottom:1px solid #aaa;
		}
		.products .product_image{
			width:20%;
			float:left;
			margin-left: 10%;
		}
		.products .product_details{
			width:70%;
			display: table;
			vertical-align: middle;
		}
		.products .product_details span{
			display:table-cell;
			vertical-align: middle;
			
			font-size: 1em;
			color:#000;
		}
		.totals{
			width:100%;
			float:left;
			border-bottom:3px solid #aaa;
			padding-bottom:5px;
		}
		.totals .subtitle{
			font-size:1em;
			display:block;
			text-align: right;
			color:#000;
			width:95%;
			margin-right:5%;
		}
		.totals .subtitle .sub_price{
			font-style:italic;
			width:100px;
		}
		.final{
			width:100%;
			float:left;
			font-size:1.5em;
			text-align: right;
			color:#f00;
		}
		.final .title{
			width:95%;
			margin-right:5%;
			font-weight:bold;
			margin-top:5px;
		}
		#reviewed .title{
			width:49%;
			font-size:1.2em;
			float:left;
		}
		#reviewed .billing{
			width:100%;
			float:left;
			margin-bottom:5px;
			margin-top:20px;
		}
		#reviewed .billing .address_reviewed,
		#reviewed .shipping .address_reviewed,
		#reviewed .payment .payment_reviewed{
			color:#000;
			font-size:.8em;
			
			width:48%;
			float:left;
		}
		#reviewed .billing .address_reviewed span{
			display:block;
		}
		span.method{
			display:block;
		}
		#reviewed #complete{
			float:left;
			width:100%;
			padding-top:5px;
			border-top:1px dotted #aaa;
		}
		#reviewed .big_button{
			clear:both;
			display:block;
			width:70%;
			margin:0 auto;
			padding-top:15px;
			padding-bottom:10px;
			color:#fff;
			font-size:2em;
			text-decoration: none;
			background:#80c0ff;
			text-align:center;
			border-bottom: 3px solid #4da7ff;
			border-radius: 2px;
			margin-bottom:20px;
			margin-top:20px;
		}
		#reviewed #complete .sub{
			color:#aaa;
			display:block;
			text-align:center;
			margin-top:15px;
			width:80%;
			margin:5px auto;
		}
@media(max-width:768px){
  .column{
    width:49%;
  }
  .column2{
    margin-right:0;
  }
  .column3{
    width:100%;
    margin-top:30px;
}
}
@media(max-width:600px){
  .column{
    width:100%;
    margin:0;
    margin-top:30px;
}
}
  form > div {
  position: relative;
  overflow: hidden;
  width:100%;
  max-width:320px;
  
}
form input, form textarea {
  width: 100%;
  max-width:320px;
  border: 2px solid gray;
  background: none;
  position: relative;
  top: 0;
  left: 0;
  z-index: 1;
  padding: 8px 12px;
  outline: 0;
}
form input:valid, form textarea:valid {
  background: white;
}
form input:focus, form textarea:focus {
  border-color: #f06d06;
}
form input:focus + label, form textarea:focus + label {
	background:#80c0ff;
  color: white;
  font-size: 70%;
  padding: 1px 6px;
  z-index: 2;
  text-transform: uppercase;
}
form label {
  transition: background 0.2s, color 0.2s, top 0.2s, bottom 0.2s, right 0.2s, left 0.2s;
  position: absolute;
  color: #999;
  padding: 7px 6px;
}
form textarea {
  display: block;
  resize: vertical;
}

form.go-right label {
  top: 4px;
  right: 100%;
  width: 100%;
  margin-right: -100%;
  bottom: -2px;
  border-bottom-right-radius:3px;
  border-top-right-radius:3px;
}
form.go-right input:focus + label, form.go-right textarea:focus + label {
  right: 0;
  margin-right: 0;
  width: 40%;
  padding-top: 5px;
}

</style>

  <body>
      
  <!--********************************** Login ***************************************-->

        <div id="wrap">
            <div id="grid">
                <div class="column column1">
                <div class="step" id="step1">
                    <div class="number">
                        <span>1</span>
                    </div>
                    <div class="title">
                        <h1>Email Address</h1>
                    </div>
                    <div class="modify">
                        <i class="fa fa-plus-circle"></i>
                    </div>
                </div>
                <div class="content" id="email">
                @if($message = Session::get('message1'))
                    <div class="alert alert-warning alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ $message}}
                    </div>
                    @endif
                    @if($customar_id =  Session::get('customar_id'))
                    <form class="go-right">
                  
                    <h5 class="text-center text-green-700">Your Are Now Login </h5>

                        <div>
                            <input disabled  class="form-control"  type="email" name="email" value="" id="email-address" placeholder="Email Address" data-trigger="change" data-validation-minlength="1" data-type="email" data-required="true" data-error-message="Enter a valid email address."/><label for="email">Email Address</label>
                        </div>
                        <div>
                            <input disabled  class="form-control"  type="password" name="email" value="" id="email-address" placeholder="Enter your Password..." data-trigger="change" data-validation-minlength="1" data-type="email" data-required="true" data-error-message="Enter a valid email address."/><label for="email">Email Address</label>
                       </div>
                        <button disabled class="login">Login</button>
                      
                    </form>
                    @else
                    <h5 class="text-center text-green-700">Places Resistration Frist or Login</h5>
                    <form class="go-right" action="{{ route('customar-login')}}" method="POST" >
                        @csrf
                        <div>
                            <input type="email" name="email" value="" id="email-address" placeholder="Email Address" data-trigger="change" data-validation-minlength="1" data-type="email" data-required="true" data-error-message="Enter a valid email address."/><label for="email">Email Address</label>
                        </div>
                        <div>
                            <input type="password" name="Password" value="" id="email-address" placeholder="Enter your Password..." data-trigger="change" data-validation-minlength="1" data-type="email" data-required="true" data-error-message="Enter a valid email address."/><label for="email">Email Address</label>
                       </div>
                        <button type="submit" class="login">Login</button>
                      
                    </form>
                    @endif
                </div>

<!--********************************** resistration ***************************************-->

                <div class="step" id="step2">
                    <div class="number">
                        <span>2</span>
                    </div>
                    <div class="title">
                        <h1>Resistation</h1>
                    </div>
                </div>
                <div class="content" id="address">
                       @if($message = Session::get('message'))
                        <div class="alert alert-warning alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ $message}}
                        </div>
                        @endif
                        @if($customar_id =  Session::get('customar_id'))
                     
                        <h5 class="text-center text-green-700">Your Are Now Resister </h5>

				      <form class="go-right" action="{{route('customar-resistration')}}" method="POST">
                        @csrf
                         <div>
                            <input disabled  class="form-control" type="email" name="email" value=""    placeholder="Email Address" >
                        </div>
                        <div>
                            <input disabled  class="form-control" type="password" name="Password" value=""  placeholder="Enter your Password...">
                       </div>
                        <div>
                           <input disabled  class="form-control" type="name" name="first_name" value="" placeholder="First Name" >
                        </div>
                
                        <div>
                            <input disabled  class="form-control" type="name" name="last_name" value=""  placeholder="Last Name" >
                        </div>
                        <div>
                            <input disabled  class="form-control" type="phone" name="mobile" value="" placeholder="Phone(555)-555-5555">
                        </div>
                        
                        <div>
                            <input disabled  class="form-control" type="text" name="address" value=""  placeholder="Address" >
                        </div>
                       
                        <div>
                      

                        </div>
                        <button class="create">Create Account</button>
                    </form>  
                        @else
                        <h5 class="text-center text-green-700">Places Resistration Frist </h5>
                    <form class="go-right" action="{{route('customar-resistration')}}" method="POST">
                        @csrf
                         <div>
                            <input  type="email" name="email" value=""    placeholder="Email Address" >
                        </div>
                        <div>
                            <input  type="password" name="Password" value=""  placeholder="Enter your Password...">
                       </div>
                        <div>
                           <input  type="name" name="first_name" value="" placeholder="First Name" >
                        </div>
                
                        <div>
                            <input  type="name" name="last_name" value=""  placeholder="Last Name" >
                        </div>
                        <div>
                            <input  type="phone" name="mobile" value="" placeholder="Phone(555)-555-5555">
                        </div>
                        
                        <div>
                            <input  type="text" name="address" value=""  placeholder="Address" >
                        </div>
                       
                        <div>
                      

                        </div>
                        <button class="create">Create Account</button>
                    </form>  
                    @endif
                </div>
            </div>

<!--********************************** Shipping Information ***************************************-->

            <div class="column column2">
                <div class="step" id="step3">
                    <div class="number">
                        <span>3</span>
                    </div>
                    <div class="title">
                        <h1>Shipping Information</h1>
                    </div>
                    <div class="modify">
                        <i class="fa fa-plus-circle"></i>
                    </div>
                </div>
                <div class="content" id="shipping">
                @if($message = Session::get('message2'))
                        <div class="alert alert-warning alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ $message}}
                        </div>
                        @endif
                @if($customar_id =  Session::get('customar_id'))
                <h5 class="text-center text-green-700">Places  Provide Your Shiping Information or Default</h5>
                
                        <form class="go-right" action="{{ route('customar-shiping')}}" method="POST">
                            @csrf
                         <div>
                            <input type="email"  name="email" value="{{ $customar->email}}" id="email-address" placeholder="Email Address" data-trigger="change" data-validation-minlength="1" data-type="email" data-required="true" data-error-message="Enter a valid email address."/>
                        </div>
                        
                        <div>
                           <input type="name" name="first_name" value="{{ $customar->first_name}}" id="first_name" placeholder="First Name" data-trigger="change" data-validation-minlength="1" data-type="name" data-required="true" data-error-message="Enter Your First Name"/>
                        </div>
                
                        <div>
                            <input type="name" name="last_name" value="{{ $customar->last_name}}" id="last_name" placeholder="Last Name" data-trigger="change" data-validation-minlength="1" data-type="name" data-required="true" data-error-message="Enter Your Last Name"/>
                        </div>
                        <div>
                            <input type="phone" name="mobile" value="{{ $customar->mobile}}" id="mobile" placeholder="Phone(555)-555-5555" data-trigger="change" data-validation-minlength="1" data-type="number" data-required="true" data-error-message="Enter Your Telephone Number"/>
                        </div>
                        
                        <div>
                            <input type="text" name="address" value="{{ $customar->address}}" id="address" placeholder="Address" data-trigger="change" data-validation-minlength="1" data-type="text" data-required="true" data-error-message="Enter Your Billing Address"/>
                        </div>
                       
                        <div>
                      

                        </div>
                        <button type="submit" class="create">Submit Your info</button>
                    </form>   
                @else
                 <h5 class="text-center text-green-700">Places  Frist Resistration or Login</h5>

                <form class="go-right">
                         <div>
                            <input disabled  class="form-control" type="email" name="email" value="" id="email-address" placeholder="Email Address" data-trigger="change" data-validation-minlength="1" data-type="email" data-required="true" data-error-message="Enter a valid email address."/>
                        </div>
                        <div>
                            <input disabled  class="form-control" type="password" name="email" value="" id="email-address" placeholder="Enter your Password..." data-trigger="change" data-validation-minlength="1" data-type="email" data-required="true" data-error-message="Enter a valid email address."/>
                       </div>
                        <div>
                           <input disabled  class="form-control" type="name" name="first_name" value="" id="first_name" placeholder="First Name" data-trigger="change" data-validation-minlength="1" data-type="name" data-required="true" data-error-message="Enter Your First Name"/>
                        </div>
                
                        <div>
                            <input disabled  class="form-control" type="name" name="last_name" value="" id="last_name" placeholder="Last Name" data-trigger="change" data-validation-minlength="1" data-type="name" data-required="true" data-error-message="Enter Your Last Name"/>
                        </div>
                        <div>
                            <input disabled  class="form-control" type="phone" name="telephone" value="" id="telephone" placeholder="Phone(555)-555-5555" data-trigger="change" data-validation-minlength="1" data-type="number" data-required="true" data-error-message="Enter Your Telephone Number"/>
                        </div>
                        
                        <div>
                            <input disabled  class="form-control" type="text" name="address" value="" id="address" placeholder="Address" data-trigger="change" data-validation-minlength="1" data-type="text" data-required="true" data-error-message="Enter Your Billing Address"/>
                        </div>
                       
                        <div>
                      

                        </div>
                        <button class="create">Submit Your info</button>
                    </form>  
                @endif  
             </div>

<!--********************************** Payment Information ***************************************-->



                <div class="step" id="step4">
                    <div class="number">
                        <span>4</span>
                    </div>
                    <div class="title">
                        <h1>Payment Information</h1>
                    </div>
                </div>
                <div> @if($message = Session::get('message5'))
                        <div class="alert alert-warning alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ $message}}
                        </div>
                        @endif</div>
               
                 <form action="{{route('complete-order')}}" method="POST">

                     @csrf
                 <div class="form-check">
                  <h5 class="d-inline">Cash On Delabary <span><input type="radio" name="pay_type" value="cash"></span></h5>

                  <h5>online <span class=""style="" ><input type="radio" name="pay_type" value="online"></span></h5>

                  <h5>Bank Payment <span><input type="radio" name="pay_type" value="bank"></span></h5>
                 </div>
                 <div class="content">
                 <button class="create">Complete Order</button>
                 </div>
                 </form>
                    <div class="right">
                        <div class="accepted">
                            <span><img src="https://i.imgur.com/Z5HVIOt.png"></span>
                            <span><img src="https://i.imgur.com/Le0Vvgx.png"></span>
                            <span><img src="https://i.imgur.com/D2eQTim.png"></span>
                            <span><img src="https://i.imgur.com/Pu4e7AT.png"></span>
                            <span><img src="https://i.imgur.com/ewMjaHv.png"></span>
                            <span><img src="https://i.imgur.com/3LmmFFV.png"></span>
                        </div>
                        <span class="sub">By selecting this button you agree to the purchase and subsequent payment for this order.</span> 
                    </div>
                  
                </div>
            </div>
<!--********************************** Finalize Order ***************************************-->


            <div class="column column3">
                <div class="step" id="step5">
                    <div class="number">
                        <span>5</span>
                    </div>
                    <div class="title">
                        <h1>Finalize Order</h1>
                    </div>
                    <div class="modify">
                        <i class="fa fa-plus-circle"></i>
                    </div>
                </div>
                <div class="content" id="final_products">
                    <div class="left" id="ordered">
                    @foreach($cartproducts as $key => $cartproduct)
                        <div class="products">
                            <div class="product_image">
                                <img src="{{ asset($cartproduct->options->image)}}" height="50px" style="border-radius: 10px; margin-left:-5px;" >
                            </div>
                            <div class="product_details">
                            <span class="product_name ml-2"style="font-size:12px; margin-left:5px;" >{{$cartproduct->name}} X {{$cartproduct->qty}}</span>
                                <span class="price">{{$cartproduct->price}} /-</span>
                            </div>
                        </div>
                        @endforeach
                        <div class="totals">
                            <span class="subtitle">  Subtotal <span id="sub_price">
                            <?php 
                                use Illuminate\Support\Facades\Session;
                               $sum = Session::get('sub_total');
                                ?> 
                            $ {{number_format($sum)}} /-</span></span>
                            <span class="subtitle">Tax <span id="sub_tax">    <?php 
                             
                               $vat = Session::get('vat');
                                ?> 
                            ${{number_format($vat)}} /-</span></span>
                            <span class="subtitle">Shipping <span id="sub_ship">$ 0.00</span></span>
                        </div>
                        <div class="final">
                            <span class="title">Total <span id="calculated_total">
                                <?php 
                             
                            $total = Session::get('grand_total' );

                            ?>
                           ${{number_format($total)}} /-</span></span>
                        </div>
                    </div>	
                    <div class="right" id="reviewed">
                        <div class="billing">
                            <span class="title">Billing:</span>
                            <div class="address_reviewed">
                                <span class="name">John Smith</span>
                                <span class="address">123 Main Street</span>
                                <span class="location">Everytown, USA, 12345</span>
                                <span class="phone">(123)867-5309</span>
                            </div>
                        </div>
                        <div class="shipping">
                            <span class="title">Shipping:</span>
                            <div class="address_reviewed">
                                <span class="name">John Smith</span>
                                <span class="address">123 Main Street</span>
                                <span class="location">Everytown, USA, 12345</span>
                                <span class="phone">(123)867-5309</span>
                            </div>
                        </div>
                        <div class="payment">
                            <span class="title">Payment:</span>
                            <div class="payment_reviewed">
                                <span class="method">Visa</span>
                                <span class="number_hidden">xxxx-xxxx-xxxx-1111</span>
                            </div>
                        </div>
                      
                </div>
            </div>
        </div>
    </div>
</div>
        
 
@endsection