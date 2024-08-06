@extends('layouts.app')

@section('title', 'Welcome | ' . config('app.name'))
    
@section('content')
    
    <x-partials.navigation />

    <main>

        <livewire:core.hero.home-hero />

        <livewire:core.banners.banner />

        <div class="flex items-center my-8 mx-6">
            <div class="flex-grow border-t border-purple-300"></div>
            <div class="mx-4 h-8 w-8 flex items-center justify-center rounded-full border-2 border-purple-300">
                <span class="text-purple-500">•</span>
            </div>
            <div class="flex-grow border-t border-purple-300"></div>
        </div>

        <livewire:core.banners.image-tags />

        <section class="py-10 mx-4">

            <div class="flex flex-row justify-start">
                <h1 class="text-2xl font-bold text-black">New Collection</h1>
            </div>

            <div class="flex flex-row justify-end">
                <a 
                    class="text-purple-600"
                    href="{{ route('products') }}">
                    View More
                </a>
            </div>

            <livewire:products.new-products />

        </section>

        <livewire:discounts.discount />

        <section class="my-6">

            <livewire:discounts.discount-products />

        </section> 

        <section class="py-10 mt-8 mx-4"> 

            <div class="flex flex-row justify-start">
                <h1 class="text-2xl font-bold text-black">Our Products</h1>
            </div>

            <div class="flex flex-row justify-end">
                <a 
                    class="text-purple-600"
                    href="{{ route('products') }}">
                    View More
                </a>
            </div>

            <livewire:products.our-products />

        </section>

        <livewire:news.news-banner /> 

        <section class="pt-4">  

            <livewire:brands.brands-banner />

        </section>

        <x-partials.footer/>
        
    </main>

@endsection
