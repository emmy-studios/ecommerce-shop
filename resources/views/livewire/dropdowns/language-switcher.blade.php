<div 
    x-show="languageSwitch" 
    @click.outside="languageSwitch = false" 
    x-cloak 
    class="absolute right-0 mt-10 py-2 w-32 bg-white rounded-lg shadow-xl"
    >

    <a 
        class="block px-2 py-2 text-gray-500 hover:bg-purple-500 hover:text-white" 
        href="{{ url('es/' . implode('/', array_slice(request()->segments(), 1))) }}"
        >
        es
    </a>

    <a 
        class="block px-2 py-2 text-gray-500 hover:bg-purple-500 hover:text-white" 
        href="{{ url('en/' . implode('/', array_slice(request()->segments(), 1))) }}"
        >
        en
    </a>

</div>

 