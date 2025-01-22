<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-4xl font-bold text-slate-500">Order Details</h1>
  
      <!-- Grid -->
      <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mt-5">
        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
          <div class="p-4 md:p-5 flex gap-x-4">
            <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
              <svg class="flex-shrink-0 size-5 text-gray-600 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                <circle cx="9" cy="7" r="4" />
                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
              </svg>
            </div>
    
            <div class="grow">
              <div class="flex items-center gap-x-2">
                <p class="text-xs uppercase tracking-wide text-gray-500">
                  Customer
                </p>
              </div>
              <div class="mt-1 flex items-center gap-x-2">
                <div>{{ $address->full_name }}</div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Card -->
    
        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
          <div class="p-4 md:p-5 flex gap-x-4">
            <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
              <svg class="flex-shrink-0 size-5 text-gray-600 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 22h14" />
                <path d="M5 2h14" />
                <path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22" />
                <path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2" />
              </svg>
            </div>
    
            <div class="grow">
              <div class="flex items-center gap-x-2">
                <p class="text-xs uppercase tracking-wide text-gray-500">
                  Order Date
                </p>
              </div>
              <div class="mt-1 flex items-center gap-x-2">
                <h3 class="text-xl font-medium text-gray-800 dark:text-gray-200">
                  {{ $order_items[0]->created_at->format('d-m-y') }}
                </h3>
              </div>
            </div>
          </div>
        </div>
        <!-- End Card -->
    
        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
          <div class="p-4 md:p-5 flex gap-x-4">
            <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
              <svg class="flex-shrink-0 size-5 text-gray-600 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6" />
                <path d="m12 12 4 10 1.7-4.3L22 16Z" />
              </svg>
            </div>
    
            <div class="grow">
              <div class="flex items-center gap-x-2">
                <p class="text-xs uppercase tracking-wide text-gray-500">
                  Order Status
                </p>
              </div>
              <div class="mt-1 flex items-center gap-x-2">
                @php
                  $status = '';
                  if($order->status == 'new') {
                      $status = '<span class="bg-blue-500 py-1 px-3 rounded text-white shadow">
                        New  
                      </span>';
                    }
                    if($order->status == 'processing') {
                      $status = '<span class="bg-yellow-500 py-1 px-3 rounded text-white shadow">
                        Processing 
                      </span>';
                    }
                    if($order->status == 'shipped') {
                      $status = '<span class="bg-green-500 py-1 px-3 rounded text-white shadow">
                        Shipped
                      </span>';
                    }
                    if($order->status == 'delivered') {
                      $status = '<span class="bg-green-700 py-1 px-3 rounded text-white shadow">
                        Delivered
                      </span>';
                    }
                    if($order->status == 'cancelled') {
                      $status = '<span class="bg-red-500 py-1 px-3 rounded text-white shadow">
                        Cancelled
                      </span>';
                    }
                @endphp
                  {!! $status !!}
              </div>
            </div>
          </div>
        </div>
        <!-- End Card -->
    
        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-800">
          <div class="p-4 md:p-5 flex gap-x-4">
            <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gray-100 rounded-lg dark:bg-gray-800">
              <svg class="flex-shrink-0 size-5 text-gray-600 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z" />
                <path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                <path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2" />
                <path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2" />
              </svg>
            </div>
    
            <div class="grow">
              <div class="flex items-center gap-x-2">
                <p class="text-xs uppercase tracking-wide text-gray-500">
                  Payment Status
                </p>
              </div>
              <div class="mt-1 flex items-center gap-x-2">
                @php
                $payment_status = '';
                  if($order->payment_status == 'pending') {
                      $payment_status = '<span class="bg-blue-500 py-1 px-3 rounded text-white shadow">
                        Pending  
                      </span>';
                    }
                    if($order->payment_status == 'paid') {
                      $payment_status = '<span class="bg-green-600 py-1 px-3 rounded text-white shadow">
                        Paid 
                      </span>';
                    }
                    if($order->payment_status == 'failed') {
                      $payment_status = '<span class="bg-red-600 py-1 px-3 rounded text-white shadow">
                        Failed 
                      </span>';
                    }
                @endphp
                {!! $payment_status !!}
              </div>
            </div>
          </div>
        </div>
        <!-- End Card -->
      </div>
      <!-- End Grid -->
    
      <div class="flex flex-col md:flex-row gap-4 mt-4">
        <div class="md:w-3/4 w-full px-4 sm:px-6 lg:px-8">
        <!-- Order Items -->
        <div class="bg-white rounded-lg shadow-md p-4 sm:p-6 mb-6">
          <!-- Desktop View -->
          <div class="overflow-x-auto hidden sm:block">
            <table class="w-full text-left border-collapse">
              <thead>
                <tr class="border-b">
                  <th class="py-2 text-sm font-semibold text-gray-600">Product</th>
                  <th class="py-2 text-sm font-semibold text-gray-600">Price</th>
                  <th class="py-2 text-sm font-semibold text-gray-600">Quantity</th>
                  <th class="py-2 text-sm font-semibold text-gray-600">Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($order_items as $item)
                <tr wire:key="{{ $item->id }}" class="border-b hover:bg-gray-50">
                  <td class="py-4 flex items-center">
                    <img class="h-12 w-12 sm:h-16 sm:w-16 rounded-md mr-4" 
                        src="{{ url('storage', $item->product->images) }}" 
                        alt="{{ $item->product->name }}">
                    <span class="text-sm font-medium text-gray-800">{{ $item->product->name }}</span>
                  </td>
                  <td class="py-4 text-sm text-gray-600">
                    {{ Number::currency($item->unit_amount, 'Rp.') }}
                  </td>
                  <td class="py-4 text-sm text-gray-600">
                    <span class="text-center w-8">
                      {{ $item->quantity }}
                    </span>
                  </td>
                  <td class="py-4 text-sm text-gray-600">
                    {{ Number::currency($item->total_amount, 'Rp.') }}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
    
    <!-- Mobile View -->
    <div class="block sm:hidden">
      @foreach ($order_items as $item)
      <div class="border rounded-lg p-4 mb-4 shadow-sm">
        <div class="flex items-center mb-2">
          <img class="h-12 w-12 rounded-md mr-4" 
              src="{{ url('storage', $item->product->images) }}" 
              alt="{{ $item->product->name }}">
          <div>
            <p class="text-sm font-medium text-gray-800">{{ $item->product->name }}</p>
          </div>
        </div>
        <div class="text-sm text-gray-600">
          <p><strong>Price:</strong> {{ Number::currency($item->unit_amount, 'Rp.') }}</p>
          <p><strong>Quantity:</strong> {{ $item->quantity }}</p>
          <p><strong>Total:</strong> {{ Number::currency($item->total_amount, 'Rp.') }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <!-- End Order Items -->

        
        <!-- Shipping Address -->
        <div class="bg-white overflow-hidden rounded-lg shadow-md p-4 sm:p-6">
          <h1 class="text-lg font-semibold text-gray-700 mb-4">Shipping Address</h1>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <p class="text-sm text-gray-600">
                {{ $address->street_adress }}, 
                {{ $address->kelurahan }}, 
                {{ $address->kecamatan }}, 
                {{ $address->kode_pos }}
              </p>
            </div>
            <div>
              <p class="text-sm font-semibold text-gray-600">Phone:</p>
              <p class="text-sm text-gray-800">{{ $address->phone }}</p>
            </div>
          </div>
        </div>
        <!-- End Shipping Address -->
      </div>
      
      <div class="md:w-1/4">
        <div class="bg-white rounded-lg shadow-md p-6">
          <h2 class="text-lg font-semibold mb-4">Summary</h2>
          <div class="flex justify-between mb-2">
            <span>Shipping</span>
            <span>{{ Number::currency(10000, 'Rp.') }} </span>
          </div>
          <hr class="my-2">
          <div class="flex justify-between mb-2">
            <span class="font-semibold">Grand Total</span>
            <span class="font-semibold">{{ Number::currency($item->order->total_price, 'Rp.') }} </span>
          </div>
        </div>
            <!-- Tombol Add Review -->
            @if ($order->status === 'delivered')
            <div class="mt-4 flex justify-end">
                <a href="/my-orders/{{ $order->id }}/review" 
                  class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-400 transition">
                    Add Review
                </a>
            </div>
            @endif
      </div>
    </div>
  </div>