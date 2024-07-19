@extends('layouts.app')

@section('title', config('app.name') . '| choose the payment method')

@section('content')

    <x-partials.navigation />

    <main class="bg-gray-300">

        <div class="py-4 mx-6 flex flex-col justify-center sm:py-12">
            <div class="py-3 sm:max-w-xl sm:mx-auto">
                <div class="bg-white min-w-1xl flex flex-col rounded-xl shadow-lg">
                    <div class="px-12 py-5">
                        <h2 class="text-gray-800 text-3xl font-semibold">Continue the payment process!</h2>
                    </div>
                    <div class="bg-gray-200 w-full flex flex-col items-center py-4">
                    
                        <div class="w-3/4 flex flex-col space-y-4">
                            <a 
                                class="py-3 my-2 text-lg text-center bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl text-white"
                                href="{{ route('payment.email.edit') }}">
                                Continue by Email
                            </a>
                            <a 
                                class="py-3 my-2 text-lg text-center bg-gradient-to-r from-purple-500 to-indigo-600 rounded-xl text-white"
                                href="{{ route('order.delete') }}">
                                Delete Order
                            </a>
                        
                        </div>
                    </div>
                    <div class="h-20 flex items-center justify-center">
                        <p class="text-purple-500">2024 {{ config('app.name') }}</p>
                    </div>
                </div>

            </div>
        </div> 

    </main>

    <x-partials.footer />

@endsection