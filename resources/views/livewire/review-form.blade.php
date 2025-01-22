<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
    <h2 class="text-2xl font-bold mb-4 text-gray-800 text-center">Add Your Review</h2>
    <form wire:submit.prevent="submit">
        <div class="mb-4">
            <label for="rating" class="block text-gray-700 font-semibold mb-2">Rating (1-5)</label>
            <input type="number" id="rating" wire:model="rating" min="1" max="5" required class="w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent p-2 transition duration-200 ease-in-out">
            @error('rating') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="review" class="block text-gray-700 font-semibold mb-2">Review</label>
            <textarea id="review" wire:model="review" rows="4" required class="w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent p-2 transition duration-200 ease-in-out"></textarea>
            @error('review') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 rounded-md hover:bg-blue-600 transition duration-200">Submit Review</button>
    </form>

    @if (session()->has('message'))
        <div class="mt-4 text-green-500 font-semibold text-center">
            {{ session('message') }}
        </div>
    @endif
</div>