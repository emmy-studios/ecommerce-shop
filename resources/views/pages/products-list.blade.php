@extends('layouts.app')

@section('title', 'Products Items')

@section('content')

    <x-partials.navigation />


    <main>

        <livewire:core.hero.product-hero />

        <section>

            <div class="flex flex-col mt-10 py-20 px-6 md:px-1 space-y-6">

                <h1 class="text-5xl text-center font-black">{{ __('Our Products') }}</h1>
                <p class="text-center">
                    {{ __('Discover timeless elegance and the latest trends with our exclusive collection') }}.
                </p>

                <livewire:products.categories-tab />

            </div>

            <livewire:products.product-list />

        </section>

    </main>

    <x-partials.footer />

@endsection

