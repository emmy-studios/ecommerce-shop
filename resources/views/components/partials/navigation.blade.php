<header x-data="{ responsiveNav: false }">

    <nav class="border-b px-4 py-2 bg-white relative z-50">

        <div class="flex flex-wrap items-center justify-between md:justify-around">
            
            {{-- Logo --}}
            <livewire:core.navigation-logo />

            {{-- Navbar Items --}}
            <div 
                x-data="{ productsShow: false, blogShow: false }" 
                class="relative hidden sm:block text-gray-500">
                
                <ul class="flex flex-row space-x-4">
                    <li><a wire:navigate href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li><a wire:navigate href="{{ route('products') }}">{{ __('Products') }}</a></li>
                    <li><a wire:navigate href="{{ route('contact.us') }}">{{ __('Contact Us') }}</a></li>
                    <li><a wire:navigate href="{{ route('news') }}">{{ __('News') }}</a></li>        

                    <button @click="blogShow = !blogShow">
                        <li><a href="#">{{ __('Brands') }}</a></li>
                    </button>
                    {{-- brands --}}
                    <livewire:dropdowns.brands-dropdowns />

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

    </div>

</header>