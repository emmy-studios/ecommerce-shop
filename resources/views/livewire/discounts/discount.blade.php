<div>

    @if($discounts)

        @foreach($discounts as $discount)

            <div class="mx-auto container py-12 px-6 xl:px-0 flex justify-center items-center flex-col">

                <div class="flex justify-between bg-gray-50 dark:bg-gray-900 items-stretch flex-row">
                    
                    <div class="flex items-center bg-gray-800 dark:bg-white justify-center">
                        <p class="transform flex flex-shrink-0 -rotate-90 text-2xl font-semibold tracking-wide leading-normal text-white dark:text-gray-800">
                            {{ floor($discount->discount_percentage) }}% OFF
                        </p>
                    </div>
                    
                    <div class="flex justify-center items-start flex-col xl:w-2/5 md:w-5/12 xl:px-7 px-6 md:px-0 md:py-0 py-5 ">
                        <div>
                            <p class="text-3xl xl:text-4xl font-semibold leading-9 text-gray-800 dark:text-white">
                                Act before it’s too late!
                            </p>
                        </div>
                        <div class="xl:mt-4 mt-2">
                            <p class="text-base xl:text-xl leading-7 text-gray-600 dark:text-white pr-4">
                                Apply the discount in your order {{ $discount->discount_code }}.
                            </p>
                        </div>
                    </div>

                    <div class="hidden md:block h-44 md:h-60 xl:h-72">
                        @if($discount->banner_image)
                            <img 
                                class="hidden h-full xl:block" 
                                src="{{ asset('storage/' . $discount->banner_image) }}" 
                                alt="Disocunt banner image" />
                            <img 
                                class="xl:hidden h-full" 
                                src="{{ asset('storage/' . $discount->banner_image) }}"
                                alt="Discount banner image" />
                        @else
                            <img 
                                class="hidden h-full xl:block" 
                                src="{{ asset('assets/images/discounts/discount_default04.png') }}" 
                                alt="Disocunt banner image" />
                            <img 
                                class="xl:hidden h-full" 
                                src="{{ asset('assets/images/discounts/discount_default04.png') }}" 
                                alt="Discount banner image" />
                        @endif

                    </div>
                </div>

                <div class="md:hidden mt-6 w-full">
                    @if($discount->banner_image)
                        <img 
                            src="{{ asset('storage/' . $discount->banner_image) }}" 
                            alt="Discount banner image" 
                            class="w-full" />
                    @else
                        <img 
                            src="{{ asset('assets/images/discounts/discount_default04.png') }}" 
                            alt="Discount banner image" 
                            class="w-full" />
                    @endif
                </div>

            </div>

        @endforeach

    @endif

</div>
