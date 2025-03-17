<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <section class="overflow-hidden bg-white py-11 font-poppins dark:bg-gray-800">
    <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
      <div class="flex flex-wrap -mx-4">
        <div class="w-full mb-8 md:w-1/2 md:mb-0" x-data="{ mainImage: '{{ asset('storage/' . $product->image[0]) }}' }">
          <div class="sticky top-20 z-10 overflow-hidden">
            <div class="relative mb-6 lg:mb-10 w-full h-[500px] flex items-center justify-center bg-white shadow-lg rounded-lg">
              <img x-bind:src="mainImage" alt="Product Image" class="object-contain w-full h-full transition-transform duration-300 ease-in-out hover:scale-105">
            </div>
            <div class="flex flex-wrap -mx-2">
              @foreach ($product->image as $image)
                <div class="w-1/4 p-2">
                  <img src="{{ url('storage/', $image) }}" alt="" class="object-contain w-full h-20 cursor-pointer border border-gray-200 rounded-md hover:border-blue-500 transition-all duration-300 ease-in-out" x-on:click="mainImage='{{ url('storage/', $image) }}'">
                </div>
              @endforeach
            </div>
            <div class="px-6 pb-6 mt-6 border-t border-gray-300 dark:border-gray-400">
              <div class="flex flex-wrap items-center mt-6">
                <span class="mr-2">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 text-gray-700 dark:text-gray-400 bi bi-truck" viewBox="0 0 16 16">
                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7z"></path>
                  </svg>
                </span>
                <h2 class="text-lg font-bold text-gray-700 dark:text-gray-400">Free Shipping</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="w-full px-4 md:w-1/2">
          <div class="lg:pl-20">
            <div class="mb-8">
              <h2 class="max-w-xl mb-6 text-2xl font-bold dark:text-gray-400 md:text-4xl">
                {{$product->name}}
              </h2>
              <p class="inline-block mb-6 text-4xl font-bold text-gray-700 dark:text-gray-400">
                <span>{{Number::currency($product->price)}}</span>
              </p>
              <p class="max-w-md text-gray-700 dark:text-gray-400">
                {{$product->description}}
              </p>
            </div>
            <div class="w-32 mb-8">
              <label class="w-full pb-1 text-xl font-semibold text-gray-700 border-b border-blue-300 dark:border-gray-600 dark:text-gray-400">Quantity</label>
              <div class="relative flex flex-row w-full h-10 mt-6 bg-gray-200 rounded-lg overflow-hidden">
                <button wire:click='decreaseQty'  class="w-20 h-full text-gray-600 bg-gray-300 dark:bg-gray-900 hover:bg-gray-400 dark:hover:bg-gray-700 transition-all duration-300 ease-in-out">
                  -
                </button>
                <input wire:model='quantity' type="number" readonly class="w-full text-center text-gray-700 bg-gray-300 dark:bg-gray-900 font-semibold focus:outline-none" placeholder="1">
                <button  wire:click='increaseQty' class="w-20 h-full text-gray-600 bg-gray-300 dark:bg-gray-900 hover:bg-gray-400 dark:hover:bg-gray-700 transition-all duration-300 ease-in-out">
                  +
                </button>
              </div>
            </div>
            <div class="flex flex-wrap items-center gap-4">
              <button wire:click.prevent='addToCart({{$product->id}})' class="w-full p-4 bg-gradient-to-r from-blue-500 to-blue-600 rounded-md lg:w-2/5 text-white font-bold shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out">
                <span wire:loading.remove wire:target='addToCart({{$product->id}})'>Add to Cart</span><span wire:loading wire:target='addToCart({{$product->id}})'>Adding...</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
