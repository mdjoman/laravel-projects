<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customar;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderPayment;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Shiping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;

class customercontroller extends Controller
{
    public function resistration(Request $request){
        $customar = new Customar();
        $customar->email = $request->email;
        $customar->Password = bcrypt( $request->Password);
        $customar->first_name = $request->first_name;
        $customar->last_name = $request->last_name;
        $customar->mobile = $request->mobile;
        $customar->address = $request->address;
        $customar->save();

        Session::put('customar_id', $customar->id);
        Session::put('customar_name', $customar->name);


        return redirect()->back()->with('message', ' You are Resister successfully');
        
    }
    public function shiping(Request $request){
     
        $shiping = new Shiping();
        $shiping->email = $request->email;  
        $shiping->first_name = $request->first_name;
        $shiping->last_name = $request->last_name;
        $shiping->mobile = $request->mobile;
        $shiping->address = $request->address;
        $shiping->save();

        Session::put('shiping_id', $shiping->id);
        Session::forget('shiping_name', $shiping->name);
     
       
        return redirect()->back()->with('message2', ' You are Shiping information get successfully');
    }
    public function neworder(Request $request){
     
        $payment = new Payment();
        $payment->payment = $request->payment;  
        $payment->save();

        
     
       
        return redirect()->back()->with('message3', ' You are Shiping information get successfully');
    }

public function logout(Request $request){
    Session::forget('customar_id');
    Session::forget('customar_name');

    return redirect('/')->with('message', 'Product info Add to cart successfully');
}
public function login(Request $request){
  
    $customar = Customar::where('email', $request->email)->first();

    if($customar){
        
        if (password_verify( $request->Password, $customar->Password )) {
            Session::put('customar_id', $customar->id);
            return redirect()->back()->with('message1', ' You are Login successfully');
            
        } else {
            return redirect()->back()->with('message1', ' You are worng password');
        }
    }
    else
    {
        return redirect()->back()->with('message', ' You are email is worng');
    }
    Session::put('customar_id', $customar->id);
}
public function completeOrder(Request $request){
    $paymentmethod = $request->pay_type;
    
    if($paymentmethod == 'cash')
    {
     $order = new Order();
     $order->customar_id = Session::get('customar_id');
     $order->shiping_id = Session::get('shiping_id');
     $order->order_total = Session::get('grand_total');
     $order->order_date = date('Y-m-d');
     $order->payment_method = $paymentmethod;
     $order->save();


     $cartproducts = Cart::content();
     foreach($cartproducts as $cartproduct ){

        $orderDetails = new OrderDetails();

        $orderDetails->order_id      = $order->id;
        $orderDetails->Product_id    = $cartproduct->id;
        $orderDetails->product_name  = $cartproduct->name;
        $orderDetails->product_image = $cartproduct->options->image;
        $orderDetails->product_price = $cartproduct->price;
        $orderDetails->product_qty   = $cartproduct->qty;
        $orderDetails->save();

        Cart::remove($cartproduct->rowId);
        $product = Product::find($cartproduct->id);
        $product->Product_Amount = ( $product->Product_Amount - $cartproduct->qty);
        $product->save();

    
     }

       $orderpyment = new OrderPayment();

       $orderpyment->order_id  = $order->id;
       $orderpyment->payment_method = $paymentmethod;
       $orderpyment->payment_amount = 0;
       $orderpyment->payment_date   = date('Y-m-d');
       $orderpyment->save();
       Session::put('grand_total', 0);

       return redirect('/checkout')->with('message5', 'Product Order  successfully');
 

    }
    elseif($paymentmethod == 'online')
    {

    }

 elseif($paymentmethod == 'bank')
 {

 }

}
public function manageorder(){
    return view('admin.manage-order', [
        
        'Orders'        =>  Order::orderBY('id', 'desc')->get()
    
    ]);
}

public function vieworder($id){
    $order = Order::find($id);
    return view('admin.view-order', [
        
        'Orders'        =>  $order,
        'customar'     => Customar::find( $order->customar_id ),
        'shiping'      => Shiping::find($order->shiping_id ),
        'orderpyment'      =>OrderPayment::where('order_id', $order->id )->first(),
        "orderDetails"     => OrderDetails::where('order_id', $order->id )->get(),
    
    ]);
}
public function invoice($id){
    $order = Order::find($id);
    $cartproducts = Cart::content();
    return view('admin.invoice', [
        
        'Orders'        =>  $order,
        'customar'     => Customar::find( $order->customar_id ),
        'shiping'      => Shiping::find($order->shiping_id ),
        'orderpyment'      =>OrderPayment::where('order_id', $order->id )->first(),
        "orderDetails"     => OrderDetails::where('order_id', $order->id )->get(),

      
        
            'categories' => Category::where('status','Published' )->get(),
            'products' => Product::orderBy('id', 'desc')->get(),
            'cartproducts' =>   $cartproducts,
        
    ]);
}
public function dwonlodinvoice($id){
    $order = Order::find($id);
    $cartproducts = Cart::content();
    $pdf =PDF::loadView('admin.invoice', [
        
        'Orders'        =>  $order,
        'customar'     => Customar::find( $order->customar_id ),
        'shiping'      => Shiping::find($order->shiping_id ),
        'orderpyment'      =>OrderPayment::where('order_id', $order->id )->first(),
        "orderDetails"     => OrderDetails::where('order_id', $order->id )->get(),

      
        
            'categories' => Category::where('status','Published' )->get(),
            'products' => Product::orderBy('id', 'desc')->get(),
            'cartproducts' =>   $cartproducts,
        
    ]);
    return $pdf->download('Invoice.pdf');
}

public function printinvoice($id){
    $order = Order::find($id);
    $cartproducts = Cart::content();
    $pdf =PDF::loadView('admin.invoice', [
        
        'Orders'        =>  $order,
        'customar'     => Customar::find( $order->customar_id ),
        'shiping'      => Shiping::find($order->shiping_id ),
        'orderpyment'      =>OrderPayment::where('order_id', $order->id )->first(),
        "orderDetails"     => OrderDetails::where('order_id', $order->id )->get(),

      
        
            'categories' => Category::where('status','Published' )->get(),
            'products' => Product::orderBy('id', 'desc')->get(),
            'cartproducts' =>   $cartproducts,
        
    ]);
    return $pdf->stream('Invoice.pdf');
}
public function deleteorder($id)
{
    $order = Order::find($id);
    $order->delete();

  return redirect('/manage-order')->with('message', 'Order info Delete successfully');
}

}