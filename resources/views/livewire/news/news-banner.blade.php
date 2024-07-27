<div class="dark:bg-gray-900">

    <div class="w-full mx-auto py-4 px-4 md:px-8">
        
        <div class="max-w-2xl">
            <h2 class="text-5xl font-bold tracking-tight text-black sm:text-4xl dark:text-white">
                Read Our News
            </h2> 
        </div>

        <div class="flex flex-row-reverse px-4 pt-2">
            <a 
                class="text-purple-600"
                href="{{ route('news') }}">
                Read More
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
            
            {{--<article
                class="relative flex flex-col justify-end px-4 pt-40 pb-4 overflow-hidden bg-gray-900 md:pt-28 isolate rounded-xl dark:shadow dark:shadow-gray-400/50">
                <img src="https://images.unsplash.com/photo-1639322537228-f710d846310a?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw1fHxibG9jayUyMGNoYWlufGVufDB8MHx8fDE3MTI3NTMxNjd8MA&ixlib=rb-4.0.3&q=80&w=1080" alt="" class="absolute inset-0 object-cover w-full h-full -z-10">
                <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                <div class="absolute inset-0 -z-10 rounded-xl ring-1 ring-inset ring-gray-900/10"></div>

                <a class="text-lg font-semibold leading-6 text-white hover:text-teal-100" href="">
                    he Rise of Blockchain Technology:
                    A Comprehensive Guide
                </a>
            </article>

            <article
                class="relative flex flex-col justify-end px-4 pt-40 pb-4 overflow-hidden bg-gray-900 md:pt-28 isolate rounded-xl dark:shadow dark:shadow-gray-400/50">
                <img src="https://images.unsplash.com/photo-1666112835156-c65bb806ac73?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxNXx8cXVhbnR1bSUyMGNvbXB1dGluZ3xlbnwwfDB8fHwxNzEyNzUzMTk2fDA&ixlib=rb-4.0.3&q=80&w=1080" alt="" class="absolute inset-0 object-cover w-full h-full -z-10">
                <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                <div class="absolute inset-0 -z-10 rounded-xl ring-1 ring-inset ring-gray-900/10"></div>

                <a class="text-lg font-semibold leading-6 text-white hover:text-teal-100" href="">
                    How Quantum Computing Will
                    Revolutionize Data Security
                </a>
            </article>

            <article
                class="relative flex flex-col justify-end px-4 pt-40 pb-4 overflow-hidden bg-gray-900 md:pt-28 isolate rounded-xl dark:shadow dark:shadow-gray-400/50">
                <img src="https://images.unsplash.com/photo-1677442135703-1787eea5ce01?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw1fHxhaXxlbnwwfDB8fHwxNzEyNzUzMTQ4fDA&ixlib=rb-4.0.3&q=80&w=1080" alt="" class="absolute inset-0 object-cover w-full h-full -z-10">
                <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                <div class="absolute inset-0 -z-10 rounded-xl ring-1 ring-inset ring-gray-900/10"></div>

                <a class="text-lg font-semibold leading-6 text-white hover:text-teal-100" href="">
                    he Future of Artificial
                    Intelligence: Trends and Challenges
                </a>
            </article>

            <article
                class="relative flex flex-col justify-end px-4 pt-40 pb-4 overflow-hidden bg-gray-900 md:pt-28 isolate rounded-xl dark:shadow dark:shadow-gray-400/50">
                <img src="https://images.unsplash.com/photo-1639322537228-f710d846310a?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw1fHxibG9jayUyMGNoYWlufGVufDB8MHx8fDE3MTI3NTMxNjd8MA&ixlib=rb-4.0.3&q=80&w=1080" alt="" class="absolute inset-0 object-cover w-full h-full -z-10">
                <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                <div class="absolute inset-0 -z-10 rounded-xl ring-1 ring-inset ring-gray-900/10"></div>

                <a class="text-lg font-semibold leading-6 text-white hover:text-teal-100" href="">
                    he Rise of Blockchain Technology:
                    A Comprehensive Guide
                </a>
            </article>

            <article
                class="relative flex flex-col justify-end px-4 pt-40 pb-4 overflow-hidden bg-gray-900 md:pt-28 isolate rounded-xl dark:shadow dark:shadow-gray-400/50">
                <img src="https://images.unsplash.com/photo-1666112835156-c65bb806ac73?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxNXx8cXVhbnR1bSUyMGNvbXB1dGluZ3xlbnwwfDB8fHwxNzEyNzUzMTk2fDA&ixlib=rb-4.0.3&q=80&w=1080" alt="" class="absolute inset-0 object-cover w-full h-full -z-10">
                <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                <div class="absolute inset-0 -z-10 rounded-xl ring-1 ring-inset ring-gray-900/10"></div>

                <a class="text-lg font-semibold leading-6 text-white hover:text-teal-100" href="">
                    How Quantum Computing Will
                    Revolutionize Data Security
                </a>
            </article>--}}

        </div>

    </div>

</div>