<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Interfaces\IProductRepository;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function store(Request $request){
        $review=new Review();
        $review->name=$request->name;
        $review->email=$request->email;
        // $review->rating=$request->rating;
        $review->message=$request->message;
        $review->save();
        return redirect()->back();
    }
}
