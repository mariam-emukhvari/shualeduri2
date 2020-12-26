<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Product $product)
    {

        $this->validate($request, [
           'comment' => 'required',
        ]);

        Comment::create([
            'product_id' => $product->id,
            'user_id' => auth()->user()->id,
            'comment' => $request->comment,
        ]);

        return back();
    }
}
