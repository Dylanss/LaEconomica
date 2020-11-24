<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Product;
use App\Category;


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
        return view('client.cart');
    }

    public function checkout(){
        return view('client.checkout');
    }

    public function login(){
        return view('client.login');
    }

    public function signup(){
        return view('client.signup');
    }
}
