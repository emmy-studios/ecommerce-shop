@extends('layouts.app')

@section('title', config('app.name') . '| order by email')

@section('content')

    <x-partials.navigation />

    <main class="px-8 my-10">

        <div class="max-w-md mx-auto bg-gray-100 shadow-md rounded-md overflow-hidden mt-16">
            
            <div class="bg-purple-600 text-white p-4 flex justify-between">
                <div class="font-bold text-lg">{{ __('Order by Email') }}</div>
                <div class="text-lg"><i class="fa-solid fa-envelope"></i></div>
            </div>

            <div class="p-6">

                <form action="{{ route('payment.method.edit.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2" for="email">
                            {{ __('Email') }}:
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email"
                            value="{{ $user->email }}" 
                            type="text"
                            disabled>
                    </div>
                   
                    <div class="mb-4">
    
                        <label class="block text-gray-700 font-bold mb-2" for="total">
                            {{ __('Total') }}
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="total" 
                            type="text"
                            value="{{ $oldOrder->total }}"
                            disabled>
                    </div>

                    <div class="mb-4">
    
                        <label class="block text-gray-700 font-bold mb-2" for="currency">
                            {{ __('Currency') }}
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="currency" 
                            type="text"
                            value="{{ config('paypal.currency') }}"
                            disabled>
                    </div>

                    <input class="hidden" type="text" name="oldOrderId" value="{{ $oldOrder->id }}">
                    <button
                        type="submit"
                        class="bg-purple-600 text-white py-2 px-4 rounded font-bold hover:bg-purple-700 focus:outline-none focus:shadow-outline">
                        {{ ('Send Email') }}
                    </button>


                </form>

            </div>

        </div>

    </main>

    <x-partials.footer />

@endsection