<?php

namespace App\Http\Controllers;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {
        $reviews = Review::with('user')->get();

        return view('reviews.index', compact('reviews'));
    }

        public function store(Request $request)
    {
        $validatedData = $request->validate([
            'review_text' => 'required|string|max:500', // Example rules
            'rating' => 'required|integer|min:1|max:5', // Example rules
            // Add more rules for other fields
        ]);
        // Get the logged-in user's ID
        $userId = auth()->user()->id;

        // Save the review to the database
        Review::create([
            'user_id' => $userId,
            'review_text' => $request->input('review_text'),
            'rating' => $request->input('rating'),
            // ...
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }

    


}
