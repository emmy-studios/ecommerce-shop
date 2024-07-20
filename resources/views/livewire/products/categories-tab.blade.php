{{--<div>
    
    <div class="flex flex-row justify-center space-x-3 flex-wrap my-2">

        @foreach($categories as $category)
            <p class="px-4 py-2 text-sm text-white font-bold bg-purple-600 rounded-xl">
                {{ $category->name }}
            </p>
        @endforeach
    
    </div>

</div>--}}

<div>
    <h2 class="flex flex-row flex-nowrap items-center mt-24">
        <span class="flex-grow block border-t border-black"></span>
        <span class="flex-none block mx-4 px-4 py-2.5 text-md rounded leading-none font-medium bg-black text-white">
        Popular Categories
    </span>
        <span class="flex-grow block border-t border-black"></span>
    </h2>

    <div class="flex justify-center flex-wrap gap-2 p-4 max-w-sm mx-auto my-4 text-sm">

        @foreach($categories as $category)

            <button class="px-2 py-1 rounded bg-gray-200/50 text-gray-700 hover:bg-gray-300">
                {{ $category->name }}
            </button>

        @endforeach

    </div>
</div>
