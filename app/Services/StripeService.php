<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Traits\ConsumesExternalServices;
use App\Services\CurrencyConversionService;
use App\Cart;
use Stripe\Charge;
use Stripe\Stripe;
use Session;
use App\Order;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Mail; 
use App\MAil\sendMail;
use App\PaymentPlatform;


class StripeService
{
    use ConsumesExternalServices;

    public function __construct()
    {

    }

    public function handlePayment(Request $request)
    {   
        if(!Session::has('cart')){
            return redirect::to('/cart'); 
            // , ['Products' => null]           
        }
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
    
        Stripe::setApiKey('sk_test_51Ht2n6GgLxzK05OczziocR0NTBsPiQdob4UcE5nTCDXirJtxDq5rBpxNnZIe5zkIR3hyQRLPTF8kWqLsvVqyJNMn00u8On4aRo');
        try{
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "pen",
                "source" => $request->input('stripeToken'), // obtainded with Stripe.js 
                "description" => "Test Charge"
            ));
    
            $order = new Order();
    
            $order->name = $request->input('name');
            $order->address = $request->input('address');
            $order->cart = serialize($cart);
            $order->payment_id = $charge->id;
            $order->payment_gateway = "Stripe";
            
            $order->save();
            $orders = Order::where('payment_id', $charge->id)->get();
    
    
            $orders->transform(function($order, $key){
                $order->cart = unserialize($order->cart);
    
                return $order;
                });
    
                
            $email = Session::get('client')->email;
    
            Mail::to($email)->send(new SendMail($orders));
    
        } catch(\Exception $e){
            Session::put('error', $e->getMessage());
            return redirect('/checkout');
        }
        return redirect()->route('approval');
    }

    public function handleApproval()
    {
        Session::forget('cart');
        return redirect('/cart')->with('success', 'Purchase accomplished successfully !');
    }
    
}