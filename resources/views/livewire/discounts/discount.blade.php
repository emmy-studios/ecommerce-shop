{{--<div>

    @if($lastDiscount)

        <div class="bg-gradient-to-r from-blue-700 to-[#B06AB3] font-sans px-6 py-12 m-4 rounded-xl">

            <div class="grid grid-cols-1 md:grid-cols-2 items-center">
                
                <div class="flex flex-col justify-center space-y-4">
                    <h1 class="text-5xl font-bold text-center text-white">Apply the discount and get </h1>
                    <p class="text-white text-center text-4xl">{{ floor($lastDiscount->discount_percentage) }}%</p>                    
                    <p class="text-3xl text-center font-bold text-white">In your next shop</p>
                </div>

                <div class="flex flex-col items-center space-y-2">

                    <div>
                        @if($lastDiscount->banner_image)
        
                            <img
                                class="h-28 rounded-sm md:pt-0 pt-8" 
                                src="{{ asset('storage/' . $lastDiscount->banner_image) }}" 
                                alt="Discount Image">
                    
                        @else
        
                            <img
                                class="h-28 rounded-sm md:pt-0 pt-8" 
                                src="{{ asset('assets/images/products/default_product_image01.jpg') }}" 
                                alt="Discount Image">
        
                        @endif
                    </div>

                    <p class="text-xl font-bold text-white">
                        <span class="text-2xl font-bold text-white">Code: </span>{{ $lastDiscount->discount_code }}
                    </p>
                </div>
            
            </div>

        </div>

    @endif

</div>--}}

<div>

    @if($discounts)

        @foreach($discounts as $discount)

            <div class="container mx-auto py-2 md:py-1 px-4 md:px-6">

                <div
                    class="flex items-strech justify-center flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6 lg:space-x-8">
                    
                    <div
                        class="flex flex-col md:flex-row items-strech justify-between bg-gray-50 py-6 px-6 md:py-12 lg:px-12 md:w-8/12 lg:w-7/12 xl:w-8/12 2xl:w-9/12">
                        <div class="flex flex-col justify-center md:w-1/2">
                            <h1 class="text-3xl lg:text-4xl font-semibold text-gray-800">Best Deal</h1>
                            <p class="text-base lg:text-xl text-gray-800 mt-2">Save upto <span
                                    class="font-bold">{{ floor($discount->discount_percentage) }}%</span></p>
                        </div>
                        <div class="md:w-1/2 mt-8 md:mt-0 flex justify-center md:justify-end">
                            <!--<img src="https://i.ibb.co/J2BtZdg/Rectangle-56-1.png" alt="" class="" />-->
                            <img src="{{ asset('storage/' . $discount->banner_image) }}" alt="" class="" />
                        </div>
                    </div>
                    
                    <div
                        class="md:w-4/12 lg:w-5/12 xl:w-4/12 2xl:w-3/12 bg-gray-50 py-6 px-6 md:py-0 md:px-4 lg:px-6 flex flex-col justify-center relative">
                        <div class="flex flex-col justify-center">
                            <h1 class="text-3xl lg:text-4xl font-semibold text-gray-800">Apply the discount</h1>
                            <p class="text-base lg:text-xl text-gray-800">code <span
                                    class="font-bold">{{ $discount->discount_code }}</span></p>
                        </div>
                        <div class="flex justify-end md:absolute md:bottom-4 md:right-4 lg:bottom-0 lg:right-0">
                            <!--<img src="https://i.ibb.co/rGfP7mp/Rectangle-59-1.png" alt=""
                                class="md:w-20 md:h-20 lg:w-full lg:h-full" />-->
                            <img 
                                src="{{ asset('assets/images/discounts/discount_default04.png') }}" 
                                alt=""
                                class="h-24 w-26 md:h-12 md:w-12 lg:h-20 lg:w-20">
                        </div>
                    </div>
            
                </div>
            
            </div>

        @endforeach

    @endif

</div>

