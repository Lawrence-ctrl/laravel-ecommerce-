<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
class ProductsController extends Controller
{
    public function show($id) {
        $product = Product::find($id);
        $category = Category::all();
        $pro = Product::find($id)->category->products()->where('id','!=',$id)->get();
        return view('userview.details',compact(['product','category','pro']));
    }

    public function like(Request $request,$id)
    {
        $product = Product::find($id);
        $product->likes = $request->likes;
        $product->save();
    }
}
