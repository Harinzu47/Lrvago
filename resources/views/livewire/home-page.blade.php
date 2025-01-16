<div>
    <section class="relative bg-cover bg-center h-screen" style="background-image: url('{{ asset('images/hero.png') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="container mx-auto flex flex-col justify-center items-center h-full text-center relative z-10">
            <h1 class="text-4xl md:text-6xl font-bold mb-4 text-white shadow-orange-500 shadow-lg">Solusi Lingkungan dengan Maggot BSF</h1>
                <p class="text-lg md:text-2xl mb-8 text-white shadow-orange-500 shadow-lg">Ubah limbah organik menjadi sumber daya bernilai tinggi bersama kami.</p>
            <a wire:navigate href="/products" class="bg-white text-orange-600 px-6 py-3 rounded-full text-lg font-semibold hover:bg-gray-200">Lihat Produk</a>
        </div>
    </section>
      <!-- Brand Section Start -->
      <section id="edukasi" class="py-12 bg-gray-200">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6 text-gray-800">Mengapa Memilih Maggot BSF?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex flex-col justify-center items-center md:items-start">
                    <p class="mb-4 text-gray-600 text-justify">
                        Maggot Black Soldier Fly (BSF) adalah solusi revolusioner dalam pengelolaan limbah organik 
                        dan peningkatan produktivitas di sektor pertanian dan peternakan. Edukasi ini akan membantu Anda 
                        memahami manfaat lingkungan, ekonomi, dan sosial dari penggunaan maggot BSF. 
                    </p>
                    <ul class="list-disc text-left ml-6 text-gray-600">
                        <li>
                            <strong>Efisiensi Pengelolaan Sampah:</strong> Maggot BSF dapat mengurai sampah organik 
                            dengan cepat, mengurangi emisi karbon, dan menghasilkan pupuk alami.
                        </li>
                        <li>
                            <strong>Manfaat Ekonomi:</strong> Produk seperti maggot segar dan kering memberikan peluang bisnis 
                            dengan nilai jual tinggi untuk peternakan dan budidaya ikan.
                        </li>
                        <li>
                            <strong>Pemberdayaan Komunitas:</strong> Edukasi ini dapat diterapkan untuk memberdayakan komunitas 
                            lokal dalam pengelolaan sampah secara mandiri.
                        </li>
                    </ul>
                    <a wire:navigate href="#" class="mt-6 bg-orange-500 text-white px-6 py-3 rounded-full text-lg font-semibold hover:bg-orange-600">Pelajari Lebih Lanjut</a>
                </div>
                <div class="flex flex-col justify-center items-center md:items-start">
                    <img src="{{ asset('images/edukasi-maggot.webp') }}" alt="Ilustrasi edukasi tentang Maggot Black Soldier
                    Fly" class="rounded-lg shadow-lg mb-4 w-full max-w-xs mx-auto md:max-w-md">
                </div>
            </div>
        </div>
    </section>
    
    <section id="manfaat" class="py-12 bg-orange-500">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6 text-white">Manfaat Luar Biasa Maggot BSF</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex flex-col justify-center items-center md:items-start">
                    <img src="{{ asset('images/manfaat-maggot.webp') }}" alt="Manfaat Maggot BSF dalam Pengelolaan Sampah" class="rounded-lg shadow-lg mb-4 w-full max-w-xs mx-auto md:max-w-md">
                </div>
                <div class="flex flex-col justify-center items-center md:items-start">
                    <p class="mb-8 text-left text-white">
                        Temukan bagaimana Maggot Black Soldier Fly (BSF) dapat menjadi solusi efektif dalam pengelolaan limbah organik, 
                        menghasilkan pupuk organik berkualitas tinggi, dan menyediakan alternatif protein berkelanjutan untuk pakan ternak.
                    </p>
                    <ul class="list-disc text-left ml-6 text-white">
                        <li class="mb-3">
                            <strong>Mengurai Sampah Organik:</strong> Maggot BSF mampu mengurai sampah organik hingga 3 kali lipat dari berat tubuhnya, 
                            membantu mengurangi limbah dan mendukung pengelolaan lingkungan yang lebih bersih.
                        </li>
                        <li class="mb-3">
                            <strong>Pupuk Berkualitas Tinggi:</strong> Limbah yang dihasilkan oleh Maggot BSF dapat diolah menjadi pupuk organik 
                            yang kaya nutrisi untuk meningkatkan kesuburan tanah.
                        </li>
                        <li>
                            <strong>Protein Tinggi untuk Pakan:</strong> Maggot BSF merupakan sumber protein alternatif yang efisien untuk pakan 
                            ternak dan budidaya ikan, mendukung solusi ekonomi yang berkelanjutan.
                        </li>
                    </ul>
                    <a wire:navigate href="#" class="mt-6 bg-white text-orange-500 px-6 py-3 rounded-full text-lg font-semibold hover:bg-gray-100">Pelajari Manfaat Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>
    
      <!-- Brand Section End -->
      <section class="py-20">
        <div class="max-w-xl mx-auto">
            <div class="text-center ">
                <div class="relative flex flex-col items-center">
                    <h1 class="text-5xl font-bold dark:text-gray-200"> Discover Our <span class="text-orange-500"> Premium Maggot Products</span></h1>
                    <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                        <div class="flex-1 h-2 bg-orange-200"></div>
                        <div class="flex-1 h-2 bg-orange-400"></div>
                        <div class="flex-1 h-2 bg-orange-600"></div>
                    </div>
                </div>
                <p class="mb-12 text-base text-center text-gray-500">
                    Nikmati manfaat dari <strong>maggot segar</strong> kami yang kaya akan protein dan nutrisi. 
                    Cocok untuk pakan ikan, burung, dan hewan peliharaan lainnya. 
                    Dapatkan produk berkualitas tinggi yang terjamin kesegarannya dan 
                    tingkatkan kesehatan hewan peliharaan Anda dengan pilihan terbaik dari kami!
                </p>
            </div>
        </div>
        <div class="justify-center max-w-6xl px-4 py-4 mx-auto lg:py-0">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 justify-items-center">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow-lg transition-transform transform hover:scale-105 dark:bg-gray-800" wire:key="{{ $product->id }}">
                        <a href="{{ route('products.show', $product->slug) }}" class="block">
                            <img src="{{ url('storage', $product->images) }}" alt="{{ $product->name }}" class="object-cover w-64 h-64 rounded-t-lg transition-opacity duration-300 hover:opacity-80">
                        </a>
                        <div class="p-5 text-center">
                            <a href="{{ route('products.show', $product->slug) }}" class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300 hover:text-orange-500 transition-colors duration-300">
                                {{ $product->name }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
      <!-- Category Section Start -->
      <section id="faq" class="py-12 bg-orange-500">
        <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-white mb-8">Frequently Asked Questions</h2>
            <div class="space-y-4">
                <!-- Pertanyaan 1 -->
                <div x-data="{ open: false }" class="border-b border-white py-4">
                    <button @click="open = !open" class="flex justify-between items-center w-full text-left">
                        <h3 class="text-lg font-medium text-white">Apa saja jenis produk maggot yang tersedia?</h3>
                        <span :class="{ 'rotate-180': open }" class="transform transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div x-show="open" class="mt-2 text-white">
                        <p>Kami menyediakan berbagai jenis produk maggot, yaitu Maggot Fresh, Maggot Kering, dan Kasgot (kotoran maggot). Masing-masing produk dirancang untuk memenuhi kebutuhan pakan ternak dan pengelolaan lingkungan.</p>
                    </div>
                </div>
                <!-- Pertanyaan 2 -->
                <div x-data="{ open: false }" class="border-b border-white py-4">
                    <button @click="open = !open" class="flex justify-between items-center w-full text-left">
                        <h3 class="text-lg font-medium text-white">Bagaimana cara memesan produk maggot?</h3>
                        <span :class="{ 'rotate-180': open }" class="transform transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div x-show="open" class="mt-2 text-white">
                        <p>Anda dapat memesan produk maggot melalui website kami dengan membuat akun, memilih produk yang diinginkan, dan melengkapi proses checkout. Kami juga menyediakan fitur pengecekan ongkos kirim menggunakan API RajaOngkir.</p>
                    </div>
                </div>
                <!-- Pertanyaan 3 -->
                <div x-data="{ open: false }" class="border-b border-white py-4">
                    <button @click="open = !open" class="flex justify-between items-center w-full text-left">
                        <h3 class="text-lg font-medium text-white">Apa manfaat maggot dalam pengelolaan sampah organik?</h3>
                        <span :class="{ 'rotate-180': open }" class="transform transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div x-show="open" class="mt-2 text-white">
                        <p>Maggot, terutama Maggot Fresh, mampu mengurai sampah organik hingga 3 kali berat tubuhnya. Proses ini membantu mengurangi limbah organik secara signifikan dan menghasilkan pupuk organik berkualitas tinggi.</p>
                    </div>
                </div>
                <!-- Pertanyaan 4 -->
                <div x-data="{ open: false }" class="border-b border-white py-4">
                    <button @click="open = !open" class="flex justify-between items-center w-full text-left">
                        <h3 class="text-lg font-medium text-white">Bagaimana cara pembayaran di website ini?</h3>
                        <span :class="{ 'rotate-180': open }" class="transform transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </button>
                    <div x-show="open" class="mt-2 text-white">
                        <p>Website kami terintegrasi dengan Midtrans sebagai payment gateway. Anda dapat melakukan pembayaran dengan berbagai metode, termasuk transfer bank, e-wallet, dan kartu kredit.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>    
      <!-- Category Section End -->
      <!-- Customer Section Start -->
      <section class="py-14 font-poppins dark:bg-gray-800">
        <div class="max-w-6xl px-4 py-6 mx-auto lg:py-4 md:px-6">
          <div class="max-w-xl mx-auto">
            <div class="text-center ">
              <div class="relative flex flex-col items-center">
                <h1 class="text-5xl font-bold dark:text-gray-200"> Customer <span class="text-orange-500"> Reviews
                  </span> </h1>
                <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                  <div class="flex-1 h-2 bg-orange-200">
                  </div>
                  <div class="flex-1 h-2 bg-orange-400">
                  </div>
                  <div class="flex-1 h-2 bg-orange-600">
                  </div>
                </div>
              </div>
              <p class="mb-12 text-base text-center text-gray-500">
                Temukan pengalaman pelanggan kami yang telah menggunakan layanan <strong>penjualan maggot</strong> 
                melalui aplikasi ini. Kami menyediakan solusi efektif dan ramah lingkungan untuk pengelolaan limbah 
                organik, sekaligus membantu peternak mendapatkan sumber pakan berkualitas. Yuk, baca ulasan mereka dan 
                rasakan manfaatnya bersama kami!
              </p>
            </div>
          </div>
      
          <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 ">
            @foreach($reviews as $review)
              <div class="py-6 bg-white rounded-md shadow dark:bg-gray-900">
                  <div class="flex flex-wrap items-center justify-between pb-4 mb-6 space-x-2 border-b dark:border-gray-700">
                      <div class="flex items-center px-6 mb-2 md:mb-0">
                          <div>
                              <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-300">
                                  {{ $review->user->name }}
                              </h2>
                              <p class="text-xs text-gray-500 dark:text-gray-400">{{ $review->user->role ?? 'Customer' }}</p>
                          </div>
                      </div>
                      <p class="px-6 text-base font-medium text-gray-600 dark:text-gray-400">
                          {{ $review->created_at->format('d-M-Y') }}
                      </p>
                  </div>
                  <p class="px-6 mb-6 text-base text-gray-500 dark:text-gray-400">
                      {{ $review->review }}
                  </p>
                  <div class="flex flex-wrap justify-between pt-4 border-t dark:border-gray-700">
                      <div class="flex px-6 mb-2 md:mb-0">
                          <ul class="flex items-center justify-start mr-4">
                              @for ($i = 0; $i < 5; $i++)
                              <li>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" 
                                      fill="{{ $i < $review->rating ? 'currentColor' : 'none' }}" 
                                      class="w-4 mr-1 {{ $i < $review->rating ? 'text-blue-500 dark:text-blue-400' : 'text-gray-300 dark:text-gray-500' }} bi bi-star-fill" 
                                      viewBox="0 0 16 16">
                                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                      </path>
                                  </svg>
                              </li>
                              @endfor
                          </ul>
                          <h2 class="text-sm text-gray-500 dark:text-gray-400">Rating:<span class="font-semibold text-gray-600 dark:text-gray-300">
                                  {{ $review->rating }}</span>
                          </h2>
                      </div>
                  </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>
      <!-- Customer Section End -->

</div>
