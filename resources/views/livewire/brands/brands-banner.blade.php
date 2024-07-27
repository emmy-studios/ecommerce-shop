<div class="bg-white px-4 pt-8 pb-8 mx-4">

    <div class="flex flex-row justify-start">
        <h2 class="text-3xl font-bold text-start">Our Brands</h2>
    </div>

    <div class="flex flex-row justify-end mx-4">
        <a 
            class="text-purple-600"
            href="{{ route('brands') }}">
            View More
        </a>
    </div>

    <div
        class="mx-auto w-full max-w-4xl bg-white justify-center items-center grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
        
        @foreach ($brands as $brand)
            
            @if ($brand->logo_url)
                
                <a href="{{ route('brands') }}">
                    <img 
                        alt="{{ $brand->name }} logo image" 
                        class="h-20  mx-auto" 
                        src="{{ asset('storage/' . $brand->logo_url) }}"
                        >
                </a>

            @else
                
                <a href="{{ route('brands') }}">
                    <img 
                        alt="{{ $brand->name }} logo image" 
                        class="h-20  mx-auto" 
                        src="{{ asset('assets/images/brands/generic_brand.png') }}"
                        >
                </a>

            @endif

        @endforeach
    
    </div>

</div>