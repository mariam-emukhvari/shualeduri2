<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function singlePage(Product $product)
    {
        $comments = Comment::get();
        $products = Product::where('tag_id', '=', $product->tag_id)->where('id', '!=', $product->id)->get();
        return view('product.product', compact('product', 'comments', 'products'));
    }
}
