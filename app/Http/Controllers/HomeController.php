<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Promise\Create;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::all();
        $featuredproducts = Product::where('stock',1)->get();
        $newProducts = Product::orderby('created_at','DESC')->take(8)->get();
        if($key = request()->key){
            $data = Product::orderby('create_at','DESC')->where('name','%'.$key.'%')->paginate(15);
        }   
        return view('fe.home',compact('products','categories','featuredproducts','newProducts'));
        }

    public function detail($slug){
        $categories = Category::all();
        $product = Product::where('slug',$slug)->first();
        $related = Product::where('category_id',$product->category_id)->where('id','!=',$product->id)->get();
        return view('fe.detail',compact('product','related','categories'));
    }

    public function category(Category $category){
        $categories = Category::all();
        $products = Product::where('category_id',$category->id)->get();

        return view('fe.category',compact('category','categories','products'));
    }

    // public function search(){

    // }
    
}
 
