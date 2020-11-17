<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
    public function addproduct(){
        return view('admin.addproduct');
    }

    public function saveproduct(Request $request){
        $this->validate($request, ['product_name' => 'required',
                                   'product_price'=> 'required',
                                   'product_image'=> 'image|nullable|max:1999',
                                   'product_status'=> 'required']);

      /*       
        if($request->hash_file('product_image')){
            //1: get filename with ext
            $fileNameWithExt = $request->file('product_image')->getClienteOriginalName();

            //2: get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //3: get just extension
            $extension = $request->file('product_image')->getClienteOriginalExtension();

            //4: file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            //upload image
            $path = $request->file('product_image')->storeAs('public/product_images',
            $fileNameToStore);
        }   
        else{$fileNameToStore = 'noimage.jpg';

        }  
        
        $product = new Product();

        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_category = $request->input('product_category');
        $product->product_image = $request->input('product_image');
        if($request->input('product_status')){
           $product->status = 1;
        }else{
           $product->status = 0;
        }

        $product->save();

        return redirect('/addproduct')->with('status','The'.$product->product_name.'Product has been saved successfully');*/

    }

    public function products(){
        return view('admin.products');
    }


}
