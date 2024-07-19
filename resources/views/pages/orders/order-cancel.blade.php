@extends('layouts.app')

@section('title', config('app.name') . ' | cancel an order')

@section('content') 
    
    <x-partials.navigation />

    <main>

        <div class="bg-gray-100 px-4 py-6">

            <div class="flex items-center justify-center">
                
                <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
                    
                    <h1 class="text-xl font-semibold mb-4">Cancel an Order</h1>
                    <p class="text-gray-600 mb-6">
                        Enter the order code to cancel it 
                    </p>

                    <form action="{{ route('order.cancel.post') }}" method="POST">
                        
                        @csrf

                        <div class="mb-4">
                            <input 
                                type="text" 
                                name="order_code" 
                                class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:border-purple-500" />
                        
                        </div>
                        @error('order_code')
                            <p class="text-sm text-red-600">{{ $message }}</p>   
                        @enderror
    
                        <div class="mb-4">
                            <input 
                                type="email"
                                name="email" 
                                value="{{ $user_email }}" 
                                class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:border-purple-500" />
                        </div>
                        @error('email')
                            <p class="text-sm text-red-600">{{ $message }}</p>   
                        @enderror
    
                        <button 
                            type="submit"
                            class="w-full bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600 focus:outline-none">
                            Cancel Order
                        </button>

                    </form>
                
                </div>

            </div>

            <div class="flex justify-center py-4 flex-wrap">
                <p><span class="font-bold">Note.</span>You can only cancel order made by email, for paypal method go to 
                    the paypal website or send us a message in the contact us section.</p>
            </div>

        </div>

    </main>

    <x-partials.footer />

@endsection