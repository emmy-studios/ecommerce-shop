<div>

    @if($bannerElements)

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-8">
                
                @foreach($bannerElements as $item)
                    <a 
                        href="{{ route('products') }}"
                        class="relative bg-cover group rounded-3xl bg-center overflow-hidden mx-auto sm:mr-0 xl:mx-auto cursor-pointer">
                        <img 
                            class="rounded-2xl max-h-96" 
                            src="{{ asset('storage/' . $item->image_url) }}" 
                            alt="Banner Image">
                        <div
                            class="absolute z-10 bottom-3 left-0 mx-3 p-3 bg-white w-[calc(100%-24px)] rounded-xl shadow-sm shadow-transparent transition-all duration-500 group-hover:shadow-purple-200 group-hover:bg-purple-50">
                            <div class="flex items-center justify-between mb-2">
                                <h6 class="font-semibold text-base leading-7 text-black ">{{ $item->text }}</h6>
                            </div>
                        </div>
                    </a>
                @endforeach
        
            </div>
        
        </div>
    
    @endif

</div>
