<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        return view('review-page', [
            'orders' => Order::where('user_id', auth()->id())->get(),
            'reviews' => Review::with(['order', 'user'])->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'rating' => 'required|numeric|min:1|max:5',
            'review' => 'required|string|max:500',
        ]);

        // Pastikan hanya user terkait dengan order yang dapat memberikan review
        $order = Order::find($validated['order_id']);
        if ($order->user_id !== auth()->id()) {
            return back()->withErrors(['review' => 'You are not authorized to review this order.']);
        }

        Review::create([
            'order_id' => $validated['order_id'],
            'user_id' => auth()->id(),
            'rating' => $validated['rating'],
            'review' => $validated['review'],
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review submitted successfully.');
    }

}

