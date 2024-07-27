@extends('layouts.app')

@section('title', 'Welcome | ' . config('app.name'))
    
@section('content')
    
    <x-partials.navigation />

    <main>

        <livewire:core.hero.home-hero /> 

        <livewire:core.banners.banner />

        <livewire:core.banners.banner-grid />

        <section class="py-20 mx-4">

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

        <section class="my-10">

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
