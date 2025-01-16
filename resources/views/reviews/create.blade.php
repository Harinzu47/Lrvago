@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Add Review for Order #{{ $order->id }}</h1>
    <form action="{{ route('review.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="rating" class="block text-gray-700">Rating (1-5)</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required 
                   class="w-full border-gray-300 rounded-md shadow-sm">
            @error('rating') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="review" class="block text-gray-700">Review</label>
            <textarea id="review" name="review" rows="4" required 
                      class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
            @error('review') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-400">
            Submit Review
        </button>
    </form>
</div>
@endsection
