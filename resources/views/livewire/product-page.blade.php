<div class="bg-orange">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-24">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Produk Kami</h2>

        <div class="flex flex-wrap items-center mt-6 mb-6">
            @foreach($products as $product)
                <div class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3" wire:key="{{ $product->id }}">
                    <div class="border border-gray-300 dark:border-gray-700">
                        <div class="relative bg-gray-200">
                            <a href="{{ route('products.show', $product->slug) }}" class="">
                                <img src="{{ url('storage', $product->images) }}" alt="{{ $product->name }}" class="object-cover w-full h-56 mx-auto">
                            </a>
                        </div>
                        <div class="p-3">
                            <div class="flex items-center justify-between gap-2 mb-2">
                                <h3 class="text-xl font-medium dark:text-gray-400">
                                    <a href="{{ route('products.show', $product->slug) }}">
                                        {{ $product->name }}
                                    </a>
                                </h3>
                            </div>
                            <p class="text-lg">
                                <span class="text-green-600 dark:text-green-600">Rp. {{ number_format($product->price, 2) }}</span>
                            </p>
                        </div>
                        <div class="flex justify-center p-4 border-t border-gray-300 dark:border-gray-700">
                            <a wire:click.prevent='addToCart({{ $product->id }})' href="#" class="text-gray-500 flex items-center space-x-2 dark:text-gray-400 hover:text-red-500 dark:hover:text-red-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 bi bi-cart3" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                                </svg>
                                <span wire:loading.remove wire:target='addToCart({{ $product->id }})'>Add to Cart</span>
                                <span wire:loading wire:target='addToCart({{ $product->id }})'>Adding....</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>