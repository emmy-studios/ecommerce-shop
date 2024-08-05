<div class="mt-8">
    
    <link rel="stylesheet" href="{{ asset('css/core/home-slider.css') }}">

    <div class="slider">

        <div class="list"> 

            @forelse($homeSliderItems as $item)
                <div class="item">

                    <img 
                        src="{{ asset('storage/' . $item->image_url) }}" 
                        alt="">

                    <div class="content">
                        <div class="title">{{ $item->title }}</div>
                        <div class="type">{{ $item->subtitle }}</div>
                        {{--<div class="description">
                            {{ $item->description }}
                        </div>--}}
                        <div class="button">
                            <button>SEE MORE</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="item">

                    <img 
                        src="https://images.pexels.com/photos/1536619/pexels-photo-1536619.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" 
                        alt="">

                    <div class="content">
                        <div class="title">MAGIC SLIDER</div>
                        <div class="type">FLOWER</div>
                        <div class="description">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti temporibus quis eum
                            consequuntur voluptate quae doloribus distinctio. Possimus, sed recusandae. Lorem ipsum dolor
                            sit amet consectetur adipisicing elit. Sequi, aut.
                        </div>
                        {{--<div class="button">
                            <button>SEE MORE</button>
                        </div>--}}
                    </div>
                </div>
            @endforelse
        </div>


        <div class="thumbnail">

            @forelse($homeSliderItems as $item)
                <div class="item">
                    <img 
                        src="{{ asset('storage/' . $item->image_url) }}"
                        alt="">
                </div>
            @empty
                <div class="item">
                    <img 
                        src="https://images.pexels.com/photos/1536619/pexels-photo-1536619.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        alt="">
                </div>
            @endforelse

        </div>


        <div class="nextPrevArrows">
            <button class="prev">
                < 
            </button>
            <button class="next"> > </button>
        </div>

    </div>

    <script src="{{ asset('js/core/home-slider.js') }}"></script>
    

</div>

