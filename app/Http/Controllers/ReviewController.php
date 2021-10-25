<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    //
    public function store(Request $request, $courseId)
    {
        $newReview = new Review();
        $newReview = $newReview->createReviewCourse($request, $courseId);

        return back()->with('post_review', 'check');
    }
}
