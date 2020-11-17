<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addcategory(){
        return view('admin.addcategory');
    }

    public function categories(Request $request){
        $categories = Category :: get();
        return view('admin.categories')->with('categories',$categories);
    }

    public function savecategory(Request $request){

        $this->validate($request, ['category_name' => 'required']);
        $checkcat = Category::where('category_name', $request -> input('category_name'))->first();

        $category = new Category();
        
        if(!$checkcat){
            $category->category_name = $request->input('category_name');
            $category->save();
            return redirect('/addcategory')->with('status','The'.$category->category_name.'
            La Categoria ha sido guardada exitosamente');
        }else {
            return redirect('/addcategory')->with('status1','The'.$request -> input('category_name').
            'La Categoria ya existe');
        }
    }


    public function index()
    {
        //
    }

    
    public function create()
    {
   
    }
    public function store(Request $request)
    {
         
    }

     
    public function show($id)
    {   
    }

    
    public function edit($id)
    {
        $category = Category ::find($id);
        return view('admin.editcategory')->with('category',$category);  
    }

    
    public function updatecategory(Request $request)
    {
       $category = Category::find($request->input('id'));

       $category->category_name = $request->input('category_name');

       $category->update();

       return redirect('/categories')->with('status',' '.$category->category_name.'
        Categoria ha sido actualizado exitossamente');
    }

   
    public function delete($id)
    {
       $category = Category::find($id);

       $category->delete();

       return redirect('/categories')->with('status',' '.$category->category_name.'
         Categoria ha sido eliminado exitosamente');
    }
}
