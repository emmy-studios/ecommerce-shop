@extends('layouts.app')

@section('title', 'Welcome | ' . config('app.name'))
    
@section('content')
    
    <x-partials.navigation />

    <main>

        <x-sections.home.hero />

        <livewire:core.banners.banner />

        <livewire:core.banners.banner-grid />

        <section class="py-20 px-6">

            <div class="flex flex-row justify-start">
                <h1 class="text-3xl font-bold text-black">New Collection</h1>
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

        <section class="py-10 mt-8 px-6"> 

            <div class="flex flex-row justify-start">
                <h1 class="text-3xl font-bold text-black">Our Products</h1>
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
