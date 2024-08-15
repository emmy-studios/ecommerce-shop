<header x-data="{ responsiveNav: false, languageDropdown: false }">

    <nav class="border-b px-4 py-2 bg-white relative z-50">

        <div class="flex flex-wrap items-center justify-between md:justify-around">
            
            {{-- Logo --}}
            <livewire:core.navigation-logo />

            {{-- Navbar Items --}}
            <div 
                x-data="{ productsShow: false, blogShow: false, languageSwitch: false }" 
                class="relative hidden sm:block text-gray-500">
                
                <ul class="flex flex-row space-x-4">
                    <li><a wire:navigate href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li><a wire:navigate href="{{ route('products') }}">{{ __('Products') }}</a></li>
                    <li><a wire:navigate href="{{ route('contact.us') }}">{{ __('Contact Us') }}</a></li>
                    <li><a wire:navigate href="{{ route('news') }}">{{ __('News') }}</a></li>        
                    
                    {{-- brands --}}
                    {{--<button @click="blogShow = !blogShow">
                        <li><a href="#">{{ __('Brands') }}</a></li>
                    </button>
                    <livewire:dropdowns.brands-dropdowns />--}}
 
                    {{-- Language Switcher --}}
                    <button @click="languageSwitch = !languageSwitch">
                        <li><a href="#">{{ __('Language') }}</a></li>
                    </button>
                    <livewire:dropdowns.language-switcher />

                </ul>
            </div>

            <div class="space-x-3 flex">

                <livewire:dropdowns.profile-dropdown />

                {{-- shoppingcart --}}
                <livewire:shoppingcarts.shoppingcart-dropdown />
                
                {{-- wishlist --}}
                <livewire:wishlists.wishlist-dropdown />

                {{-- bar menu --}}
                <div class="relative sm:hidden">
                    <button @click="responsiveNav = !responsiveNav">
                        <i class="fa-solid fa-bars py-3 pl-2 mt-4"></i>
                    </button>
                </div>

            </div>

        </div>

    </nav>

    {{-- Responsive Menu --}}
    <div x-show="responsiveNav" @click.outside="responsiveNav = false" x-cloak>
    
        <div class="flex flex-row px-4 py-2 bg-purple-600 text-white hover:bg-purple-500 hover:text-white">
            <a wire:navigate href="{{ route('home') }}">{{ __('Home') }}</a>
        </div>
        
        <div class="flex flex-row px-4 py-2 bg-purple-600 text-white hover:bg-purple-500 hover:text-white">
            <a wire:navigate href="{{ route('products') }}">{{ __('Our Products') }}</a>
        </div>
        
        <div class="flex flex-row px-4 py-2 bg-purple-600 text-white hover:bg-purple-500 hover:text-white">
            <a wire:navigate href="{{ route('contact.us') }}">{{ __('Contact Us') }}</a>
        </div>
        
        <div class="flex flex-row px-4 py-2 bg-purple-600 text-white hover:bg-purple-500 hover:text-white">
            <a href="{{ route('news') }}">{{ __('News') }}</a>
        </div>

        <div class="flex flex-row px-4 py-2 bg-purple-600 text-white hover:bg-purple-500 hover:text-white">
            <a href="{{ route('brands') }}">{{ __('Brands') }}</a>
        </div>

        {{-- Language Dropdown --}}
        <div class="flex flex-col">
            <div class="flex flex-row px-4 py-2 bg-purple-600 text-white hover:bg-white hover:text-purple-500">
                <button @click="languageDropdown = !languageDropdown" class="flex items-center">
                    <a>{{ __('Language') }}</a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
            </div>
            
            {{-- Language Options --}}
            <div x-show="languageDropdown" x-cloak class="flex flex-col bg-purple-200 text-purple-600 pl-8">
                <a href="{{ route(Route::currentRouteName(), ['locale' => 'es']) }}" class="py-2 hover:bg-purple-500 hover:text-white">Español</a>
                <a href="{{ route(Route::currentRouteName(), ['locale' => 'en']) }}" class="py-2 hover:bg-purple-500 hover:text-white">English</a>
            </div>
        </div>

    </div>

</header>