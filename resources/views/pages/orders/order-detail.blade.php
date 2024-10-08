@extends('layouts.app') 

@section('title', 'Welcome ecommerce | Your Order')

@section('content')

    <x-partials.navigation />

    <section>
        <div class="flex w-full items-center justify-center mt-6">
            <div class="w-80 rounded bg-gray-50 px-6 pt-4 shadow-lg">
            
                <div class="flex flex-col justify-center items-center gap-2">

                    @if($websiteInfo && $websiteInfo->website_name)
                        <h4 class="font-semibold">{{ $websiteInfo->website_name }}</h4>
                    @else
                        <h4 class="font-semibold">ecommerce</h4>
                    @endif

                    <p class="text-xs">{{ $createdAt }}</p>
                </div>
                <div class="flex flex-col gap-3 border-b py-6 text-xs">
                    <p class="flex justify-between">
                        <span class="text-gray-400">{{ __('Order Code') }}:</span>
                        <span>{{ $order->order_code }}</span>
                    </p>
                    <p class="flex justify-between">
                        <span class="text-gray-400">{{ __('Customer') }}:</span>
                        <span>{{ $user->first_name }} {{ $user->last_name }}</span>
                    </p>
                    <p class="flex justify-between">
                        <span class="text-gray-400">{{ __('Email') }}:</span>
                        <span>{{ $user->email }}</span>
                    </p>
                    <p class="flex justify-between">
                        <span class="text-gray-400">{{ __('Phone Number') }}:</span>
                        <span>{{ $user->phone_code }} {{ $user->phone_number }}</span>
                    </p>
                    <p class="flex justify-between">
                        <span class="text-gray-400">{{ __('Subtotal') }}:</span>
                        @if($websiteInfo && $websiteInfo->currency_symbol)
                            <span>{{ $websiteInfo->currency_symbol }}{{ $order->subtotal }}</span>
                        @else
                            <span>${{ $order->subtotal }}</span>
                        @endif
                    </p>
                    <p class="flex justify-between">
                        <span class="text-gray-400">{{ __('Total') }}:</span>
                        @if($websiteInfo && $websiteInfo->currency_symbol)
                            <span>{{ $websiteInfo->currency_symbol }}{{ $order->total }}</span>
                        @else
                            <span>${{ $order->total }}</span>
                        @endif
                    </p>
                </div>
                {{-- Products Tables --}}
                <div class="flex flex-col gap-3 pb-6 pt-2 text-xs">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="flex">
                                <th class="w-full py-2">{{ __('Product') }}</th>
                                <th class="min-w-[44px] py-2">#</th>
                                <th class="min-w-[44px] py-2">{{ __('Price') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($orderItems as $item)

                                <tr class="flex">
                                    <td class="flex-1 py-1">{{ $item->product->name }}</td>
                                    <td class="min-w-[44px]">{{ $item->quantity }}</td>
                                    @if($websiteInfo && $websiteInfo->currency_symbol)
                                        <td class="min-w-[44px]">{{ $websiteInfo->currency_symbol }}{{ $item->product->unit_price }}</td>
                                    @else
                                        <td class="min-w-[44px]">${{ $item->product->unit_price }}</td>
                                    @endif
                                </tr>

                            @endforeach

                        </tbody>
                    </table>

                    <div class="border-b border border-dashed"></div>
                    <div class="py-4 justify-center items-center flex flex-col gap-2">

                        @if($websiteInfo && $websiteInfo->main_mail)
                            <p class="flex gap-2">
                                <i class="fa-solid fa-envelope"></i>
                                {{ $websiteInfo->main_mail }}
                            </p>
                        @else
                            <p class="flex gap-2">
                                <i class="fa-solid fa-envelope"></i>
                                ecommerce.info@gmail.com
                            </p>
                        @endif

                        @if($websiteInfo && $websiteInfo->phone_code && $websiteInfo->phone_number )
                            <p class="flex gap-2">
                                <i class="fa-solid fa-mobile-retro"></i>
                                {{ $websiteInfo->phone_code }} {{ $websiteInfo->phone_number }}
                            </p>
                        @else
                            <p class="flex gap-2">
                                <i class="fa-solid fa-mobile-retro"></i>
                                (+506) 1234 5678
                            </p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

    <aside class="flex justify-center my-6">
        <a 
            class="px-4 py-2 text-white bg-purple-600 hover:bg-purple-500 cursor-pointer rounded-lg" 
            href="{{ route('invoice.generate', ['id' => $order->id]) }}"
            target="_blank"
            >
            {{ __('Print') }} 
        </a>
    </aside>

    <x-partials.footer />

@endsection