<div class="dark:bg-gray-900">

    <div class="w-full py-4 px-4 md:mx-8 md:pr-10">
        
        <div class="max-w-2xl">
            <h2 class="text-5xl font-bold tracking-tight text-black sm:text-4xl dark:text-white">
                {{ __('Read Our News') }}
            </h2> 
        </div>

        <div class="flex flex-row-reverse px-4 pt-2">
            <a 
                class="text-purple-600"
                href="{{ route('news') }}">
                {{ __('Read More') }}
            </a>
        </div>
        
        <div class="grid max-w-2xl grid-cols-1 gap-8 mx-auto mt-8 auto-rows-fr lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach($latestNews as $news)
                <article
                    class="relative flex flex-col justify-end px-4 pt-40 pb-4 overflow-hidden bg-gray-900 md:pt-28 isolate rounded-xl dark:shadow dark:shadow-gray-400/50">
                    
                    <img 
                    src="{{ $news->header_image ? asset('storage/' . $news->header_image) : asset('assets/images/products/default_product_image01.jpg') }}" 
                        alt="News Image" 
                        class="absolute inset-0 object-cover w-full h-full -z-10">
                    
                    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                    <div class="absolute inset-0 -z-10 rounded-xl ring-1 ring-inset ring-gray-900/10"></div>

                    <a 
                        class="text-lg font-semibold leading-6 text-white hover:text-teal-100" 
                        href="{{ route('news.show', ['id' => $news->id]) }}"
                        >
                        {{ $news->getTitleLimitAttribute() }}
                    </a>
                </article>
            @endforeach

        </div>

    </div>

</div>