<div>

    @if($banners) 

        @foreach($banners as $banner)

            <div 
                class="flex items-center justify-center bg-red-100 rounded-2xl overflow-hidden relative bg-gradient-to-r from-pink-600 to-purple-800 mx-4 my-2" 
                style="min-height: 450px">

                <!-- Background Image -->
                @if($banner && $banner->banner_image)
                    <div 
                        class="w-full h-full bg-center bg-cover absolute top-0 right-0 mix-blend-multiply" 
                        style="background-image: url('{{ asset('storage/' . $banner->banner_image) }}')">
                    </div>
                @endif

                <!-- Content -->
                <div class="flex flex-col items-center z-10">
                    <div class="text-white text-5xl font-bold satisfy md:px-0 px-4">
                        {{ $banner->first_text }}
                    </div>
                    <div class="text-white mt-4 opacity-80 text-lg">
                        {{ $banner->second_text }}
                    </div>
                </div>

            </div>

        @endforeach

    @endif

</div>
