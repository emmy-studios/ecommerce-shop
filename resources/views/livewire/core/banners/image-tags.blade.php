<div class="m-4">

    @if($bannerElements)

        <div class="grid grid-cols-1 md:grid-cols-3 md:space-x-2 space-y-2 md:space-y-0">

            @foreach($bannerElements as $banner)
                <div class="relative">
                    @if($banner->image_url)
                        <img 
                            class="rounded-xl opacity-50"
                            src="{{ asset('storage/' . $banner->image_url) }}" 
                            alt=""
                        >
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-purple-900 text-3xl font-bold">{{ $banner->text }}</span>
                        </div>
                    @endif
                </div>
            @endforeach 

        </div>

    @endif

</div>
