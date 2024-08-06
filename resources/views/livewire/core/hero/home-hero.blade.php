<div>

    @if($homeHeroInfo)

        <div 
            class="relative m-4 rounded-xl bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('storage/' . $homeHeroInfo->image_url) }}');">

            <div
                class="absolute inset-0 bg-white/75 sm:bg-transparent sm:from-white/95 sm:to-white/25 ltr:sm:bg-gradient-to-r rtl:sm:bg-gradient-to-l">
            </div>

            <div class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8">

                <div class="max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
                    
                    <h1 class="text-3xl font-extrabold sm:text-5xl">
                        {{ $homeHeroInfo->title }}

                        <strong class="block font-extrabold text-purple-700"> {{ $homeHeroInfo->subtitle }}. </strong>
                    </h1>

                    <p class="mt-4 max-w-lg sm:text-xl/relaxed">
                        {{ $homeHeroInfo->text }}
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4 text-center">

                        <a href="{{ route('products') }}"
                            class="block w-full rounded bg-purple-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-purple-700 focus:outline-none focus:ring active:bg-purple-500 sm:w-auto">
                            Our Products
                        </a>

                        <a href="{{ route('contact.us') }}"
                            class="block w-full rounded bg-white px-12 py-3 text-sm font-medium text-purple-600 shadow hover:text-purple-700 focus:outline-none focus:ring active:text-purple-500 sm:w-auto">
                            Contact Us
                        </a>

                    </div>

                </div>

            </div>

        </div>
    
    @else

        <div 
            class="relative m-4 rounded-xl bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('assets/images/core/hero08.jpg') }}');">

            <div
                class="absolute inset-0 bg-white/75 sm:bg-transparent sm:from-white/95 sm:to-white/25 ltr:sm:bg-gradient-to-r rtl:sm:bg-gradient-to-l">
            </div>

            <div class="relative mx-auto max-w-screen-xl px-4 py-32 sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8">

                <div class="max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
                    
                    <h1 class="text-3xl font-extrabold sm:text-5xl">
                        Let us find your

                        <strong class="block font-extrabold text-purple-700"> Forever Home. </strong>
                    </h1>

                    <p class="mt-4 max-w-lg sm:text-xl/relaxed">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt illo tenetur fuga ducimus
                        numquam ea!
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4 text-center">

                        <a href="{{ route('products') }}"
                            class="block w-full rounded bg-purple-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-purple-700 focus:outline-none focus:ring active:bg-purple-500 sm:w-auto">
                            Our Products
                        </a>

                        <a href="{{ route('contact.us') }}"
                            class="block w-full rounded bg-white px-12 py-3 text-sm font-medium text-purple-600 shadow hover:text-purple-700 focus:outline-none focus:ring active:text-purple-500 sm:w-auto">
                            Contact Us
                        </a>

                    </div>

                </div>

            </div>

        </div>

    @endif

</div>