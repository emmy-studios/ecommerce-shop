<div class="bg-slate-200 m-4 rounded-xl">

    @if($heroInfo)

        <div class="grid grid-cols-1 md:grid-cols-2 justify-items-center">

            <h1 class="self-center text-5xl font-bold px-6 md:px-6 py-8 md:py-2">
                {{ $heroInfo->title }}
            </h1>

            @if($heroInfo && $heroInfo->hero_image)
                <img 
                    class=""
                    src="{{ asset('storage/' . $heroInfo->hero_image) }}" 
                    alt="Product Hero Image"
                    >
            @else
                <img 
                    class=""
                    src="{{ asset('assets/images/core/products-hero04-removebg.png') }}" 
                    alt="Product Hero Image"
                    >
            @endif
        </div>

    @else

        <div class="grid grid-cols-1 md:grid-cols-2 justify-items-center">

            <h1 class="self-center text-5xl font-bold px-6 md:px-6 py-8 md:py-2">
                Discover the Latest Trends in Fashion. Shop Our Exclusive Collection Now!
            </h1>
            <img 
                class=""
                src="{{ asset('assets/images/core/products-hero04-removebg.png') }}" 
                alt="Product Hero Image"
                >

        </div>

    @endif

</div>
