<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use Illuminate\Database\Eloquent\Builder;
class CategoriesController extends Controller
{
    public function index(Request $request) {   
        if(request()->category) {
            $category = Category::all();
            // $bycat= Category::find(request()->category)->products()->paginate(9);
            $bycat = Product::with('category')->whereHas('category', function(Builder $query){
                $query->where('id','=',request()->category);
            })->paginate(9);
        }else{
            $category = Category::all();
            $bycat = Product::paginate(9);
        }

        if($request->get('value') == '2') {
            $bycat = $bycat->sortBy('product_price');
        }elseif($request->get('value') == '3') {
            $bycat = $bycat->sortByDesc('product_price');
        }
    return view('userview.products',compact(['category','bycat']));
    }
}
