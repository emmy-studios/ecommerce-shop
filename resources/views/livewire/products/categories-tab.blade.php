<div>
    
    <div class="flex flex-row justify-center space-x-3 flex-wrap my-2">

        @foreach($categories as $category)
            <p class="px-4 py-2 text-sm text-white font-bold bg-purple-600 rounded-xl">
                {{ $category->name }}
            </p>
        @endforeach
    
    </div>

</div>
