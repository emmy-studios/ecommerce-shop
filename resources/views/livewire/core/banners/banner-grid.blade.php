<div class="mx-4">

    @if($bannerElements)

        <div class="grid grid-cols-1 md:grid-cols-2 md:space-x-2 space-y-2 md:space-y-0">

            @foreach($bannerElements as $banner)
                <div>
                    @if($banner->banner_image)
                        <img 
                            class="rounded-xl"
                            src="{{ asset('storage/' . $banner->banner_image) }}" 
                            alt=""
                            >
                    @endif
                </div>
            @endforeach 

        </div>

    @endif

</div>




{{--<div class="mx-4">

    @if($bannerElements)

        <div class="grid grid-cols-1 md:grid-cols-2 md:space-x-2 space-y-2 md:space-y-0">

            @foreach($bannerElements as $banner)
                <div class="relative">
                    @if($banner->banner_image)
                        <img 
                            class="rounded-xl opacity-80"
                            src="{{ asset('storage/' . $banner->banner_image) }}" 
                            alt=""
                        >
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-black text-3xl font-bold">{{ $banner->first_text }}</span>
                        </div>
                    @endif
                </div>
            @endforeach 

        </div>

    @endif

</div>--}}
