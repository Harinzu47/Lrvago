<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-semibold mb-6 text-center">Shopping Cart</h1>
        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-3/4">
                <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left font-semibold py-2">Product</th>
                                <th class="text-left font-semibold py-2">Price</th>
                                <th class="text-left font-semibold py-2">Quantity</th>
                                <th class="text-left font-semibold py-2">Total</th>
                                <th class="text-left font-semibold py-2">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cart_items as $item)
                                <tr wire:key='{{ $item['product_id'] }}' class="border-b">
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <img class="h-16 w-16 mr-4 rounded-md" src="{{ url('storage/' . $item['image']) }}" alt="{{ $item['name'] }}">
                                            <span class="font-semibold">{{ $item['name'] }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4">Rp.{{ number_format($item['unit_amount'], 2) }}</td>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <button wire:click='decreaseQty({{ $item['product_id'] }})' class="border rounded-md py-1 px-2 mr-2 hover:bg-gray-200">-</button>
                                            <span class="text-center w-8">{{ $item['quantity'] }}</span>
                                            <button wire:click='increaseQty({{ $item['product_id'] }})' class="border rounded-md py-1 px-2 ml-2 hover:bg-gray-200">+</button>
                                        </div>
                                    </td>
                                    <td class="py-4">Rp.{{ number_format($item['total_amount'], 2) }}</td>
                                    <td>
                                        <button wire:click='removeItem({{ $item['product_id'] }})' class="bg-red-500 
                                        text-white rounded-lg px-3 py-1 hover:bg-red-600">Remove</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-4 text-center">No items in cart.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="md:w-1/4">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-4">Summary</h2>
                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span>Rp. {{ number_format($total_price, 2, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Taxes</span>
                        <span>Rp. {{ number_format(0, 2, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Shipping</span>
                        <span>Rp. {{ number_format(0, 2, ',', '.') }}</span>
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between mb-2 font-semibold">
                        <span>Total</span>
                        <span>Rp. {{ number_format($total_price, 2, ',', '.') }}</span>
                    </div>
                    @if ($cart_items)
                        <a href="/checkout" class="bg-blue-500 block text-center text-white py-2 px-4 rounded-lg mt-4 w-full 
                        hover:bg-blue-600">Checkout</a>    
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>