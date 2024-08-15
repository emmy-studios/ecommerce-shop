<div 
    x-show="languageSwitch" 
    @click.outside="languageSwitch = false" 
    x-cloak 
    class="absolute right-0 mt-10 py-2 w-32 bg-white rounded-lg shadow-xl"
    >

    <div 
        class="grid grid-cols-2 items-center justify-center hover:bg-purple-500">
        <div>
            <a 
                class="block px-2 py-2 text-gray-500 hover:text-white" 
                href="{{ url('en/' . implode('/', array_slice(request()->segments(), 1))) }}"
                >
                en
            </a>
        </div>
        <div class="flex flex-row justify-center">
            <img
                class="w-8" 
                src="{{ asset('assets/images/flags/us-flag.png') }}" 
                alt="Unitated States Flag">
        </div>
    </div>

    <div 
        class="grid grid-cols-2 items-center justify-center hover:bg-purple-500">
        <div>
            <a 
                class="block px-2 py-2 text-gray-500 hover:text-white" 
                href="{{ url('es/' . implode('/', array_slice(request()->segments(), 1))) }}"
                >
                es
            </a>
        </div>
        <div class="flex flex-row justify-center">
            <img
                class="w-8" 
                src="{{ asset('assets/images/flags/spain-flag.png') }}" 
                alt="Spain Flag">
        </div>
    </div>

</div>

 