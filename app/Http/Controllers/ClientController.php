<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Product;
use App\Category;
use App\Cart;
use Stripe\Charge;
use Stripe\Stripe;
use Session;
use App\Order;
use App\Client;
use Illuminate\Support\Facades\Hash; 



class ClientController extends Controller
{
    //

    public function home(){
        $categories = Category::get();
        $products = Product::get();
        $sliders = Slider::get();
        return view('client.home')->with('sliders',$sliders)->with('products',$products)->with('categories',$categories);
    }

    public function shop(){
        $categories = Category::get();
        $products = Product::get();
        return view('client.shop')->with('products',$products)->with('categories',$categories);
    }

    public function cart(){
        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items]);
    }

    public function updateqty(Request $request){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQty($request->id, $request->quantity);
        Session::put('cart', $cart);

        return redirect('/cart');
    }

    public function removeitem($id){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }

        return redirect('/cart');
    }

    public function checkout(){

        if(!Session::has('client')){
            return redirect('/login');
        }

        if(!Session::has('cart')){
            return redirect('/cart');
        }
        return view('client.checkout');
    }

    public function postcheckout(Request $request){
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
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtainded with Stripe.js 
                "description" => "Test Charge"
            ));

            $order = new Order();

            $order->name = $request->input('name');
            $order->address = $request->input('address');
            $order->cart = serialize($cart);
            $order->payment_id = $charge->id;
            
            $order->save();


        } catch(\Exception $e){
            Session::put('error', $e->getMessage());
            return redirect('/checkout');
        }

        Session::forget('cart');
        return redirect('/cart')->with('success', 'Purchase accomplished successfully !');
    }

    public function login(){
        return view('client.login');
    }

    public function signup(){
        return view('client.signup');
    }

    public function createaccount(Request $request){
        $this->validate($request,['email' => 'email|required|unique:clients',
                                  'password' => 'required|min:4']);

        $client = new Client();
        $client->email = $request->input('email');
        $client->password = bcrypt($request->input('password'));

        $client->save();

        return back()->with('status','Tu cuenta ha sido creada exitosamente');
    }
    
    public function accessaccount(Request $request)
    {
        $this->validate($request,['email' => 'email|required',
        'password' => 'required']);

        $client = Client::where('email',$request->input('email'))->first();

        if($client) {
            if (Hash::check($request->input('password'),$client->password)) {
                Session::put('client',$client);

                return redirect('/shop');
                //return back()->with('status','Tu email es'.Session::get('client')->email);
            } else {
                return back()->with('error','Contraseña incorrecta o Email incorrecto');
            }
        } else {
            return back()->with('error','No tienes una cuenta');
        }
    }
    public function logout(){
        Session::forget('client');
        return back();
    }
}

