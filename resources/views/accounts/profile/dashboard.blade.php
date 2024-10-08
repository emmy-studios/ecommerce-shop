@extends('layouts.app')

@section('title', config('app.name') . ' | User Dashboard')

@section('content')

    <x-partials.navigation />

    <main>

        <div class="bg-gray-100">
            <div class="container mx-auto py-8">
                <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                    
                    {{-- Personal Information --}}
                    <div class="col-span-4 sm:col-span-3">
    
                        <div class="bg-white shadow rounded-lg p-6">
                            <div class="flex flex-col items-center">
    
                                <img 
                                    src="{{ asset('assets/images/accounts/users/' . $user->profile_image) }}"
                                    class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0"
                                    >
    
                                </img>
                                <h1 class="text-xl font-bold">{{ $user->name }}</h1>
                                <p class="text-gray-700">{{ $user->first_name }} {{ $user->last_name }}</p>
                                
                                <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                    <a 
                                        href="{{ route('profile.edit') }}" 
                                        class="bg-purple-600 hover:bg-purple-500 text-white py-2 px-4 rounded"
                                        >
                                        {{ __('Edit Profile') }}
                                    </a>
                                    <a 
                                        href="{{ route('wishlist.show', ['id' => $wishlist->id]) }}" 
                                        class="bg-purple-600 hover:bg-purple-500 text-white py-2 px-4 rounded"
                                        >
                                        Wishlist
                                    </a>
                                </div>
     
                            </div>
                            <hr class="my-6 border-t border-gray-300">
    
                            <div class="flex flex-col">
                                <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">{{ __('Address') }}</span>
                                <p class="mb-2">
                                    {{ __('Country') }}: <span class="text-sm text-gray-500">{{ $address->country }}</span>
                                </p>
                                <p class="mb-2">
                                    {{ __('City') }}: <span class="text-sm text-gray-500">{{ $address->city }}</span>
                                </p>
                                <p class="mb-2">
                                    {{ __('State') }}: <span class="text-sm text-gray-500">{{ $address->state }}</span>
                                </p>
                                <p class="mb-2">
                                    {{ __('Phone Number') }}: <span class="text-sm text-gray-500">{{ $user->phone_code }} {{ $user->phone_number }}</span>
                                </p>
                                <p class="mb-2">
                                    {{ __('Personal Address') }}: <span class="text-sm text-gray-500">{{ $address->address_line_1 }}</span>
                                </p>
                                <p class="mb-2">
                                    {{ __('Shipping Address') }} <span class="text-sm text-gray-500">{{ $address->address_line_2 }}</span>
                                </p>
                            </div>
    
                        </div>
    
                    </div>
    
                    <div class="col-span-4 sm:col-span-9">
                        
                        <div class="bg-white shadow rounded-lg p-6">
                            <h2 class="text-xl font-bold mb-4">{{ __('About Me') }}</h2>
                            <p class="text-gray-700">
                                {{ $user->bio }}
                            </p>
    
                            <h3 class="font-semibold text-center mt-3 -mb-2">
                                {{ __('Find me on') }}
                            </h3>
    
                            <div class="flex justify-center items-center gap-6 my-6">

                                <a 
                                    class="text-gray-700 hover:text-purple-600" 
                                    aria-label="Visit my Tiktok" 
                                    href="{{ $user->socialmedialink->tiktok_url }}" 
                                    target="_blank">
                                    <i class="fa-brands fa-tiktok h-6"></i>
                                </a>
                                <a 
                                    class="text-gray-700 hover:text-purple-600" 
                                    aria-label="Visit TrendyMinds Facebook" 
                                    href="{{ $user->socialmedialink->facebook_url }}"
                                    target="_blank">
                                    <i class="fa-brands fa-facebook-f h-6"></i>
                                </a>
                                <a 
                                    class="text-gray-700 hover:text-purple-600" 
                                    aria-label="Visit TrendyMinds Instagram" 
                                    href="{{ $user->socialmedialink->instagram_url }}"
                                    target="_blank">
                                    <i class="fa-brands fa-instagram h-6"></i>
                                </a>
                                <a 
                                    class="text-gray-700 hover:text-purple-600" 
                                    aria-label="Visit TrendyMinds Twitter" 
                                    href="{{ $user->socialmedialink->twitter_url }}"
                                    target="_blank">
                                    <i class="fa-brands fa-twitter h-6"></i>
                                </a>
                            </div>

                        </div>

                        {{-- Orders --}}
                        <div class="my-8 bg-white shadow rounded-lg">

                            <h2 class="text-xl font-bold mt-6 mb-2 pt-8 px-8 pb-4">{{ __('Orders') }}</h2>

                            {{-- Flash Message --}}
                            @if (session()->has('success'))
                                <p class="text-red-600 px-8 py-4">
                                    {{ session('success') }}
                                </p>
                            @endif

                            @if($orders->isEmpty())

                                <p class="px-8 pb-2 text-red-700">
                                    {{ __('No order for user.') }}
                                </p>
                                

                            @else
                                
                                <div class="p-4 ml-2">
                                    <a 
                                        class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-500 rounded-sm cursor-pointer"
                                        href="{{ route('order.cancel') }}">
                                        {{ __('Cancel an Order') }}
                                    </a>
                                </div>

                                <div class="p-4">
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full bg-white border">
                                            <thead>
                                                <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                                    <th class="py-3 px-6 text-left">{{ __('Order Code') }}</th>
                                                    <th class="py-3 px-6 text-left">{{ __('Total') }}</th>
                                                    <th class="py-3 px-6 text-left">Date</th>
                                                    <th class="py-3 px-6 text-left">Time</th>
                                                    <th class="py-3 px-6 text-left">{{ __('Status') }}</th>
                                                    <th class="py-3 px-6 text-left">{{ __('Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-gray-600 text-sm font-light">
                                            
                                                @foreach ($orders as $order)
                                                    
                                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                        <td class="py-3 px-6 text-left">{{ $order->order_code }}</td>
                                                        <td class="py-3 px-6 text-left">${{ $order->total }}</td>
                                                        <td class="py-3 px-6 text-left">{{ $order->created_at->format('d-m-Y') }}</td>
                                                        <td class="py-3 px-6 text-left">{{ $order->created_at->format('h:i A') }}</td>
                                                        
                                                        {{-- Order Pending --}}
                                                        {{-- STATUS --}}
                                                        @if($order->status === 'completed')
                                                            <td class="py-3 px-6 text-left">
                                                                <a 
                                                                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
                                                                    {{ $order->status }}
                                                                </a>
                                                                
                                                            </td>
                                                        @elseif($order->status === 'canceled')
                                                        <td class="py-3 px-6 text-left">
                                                            <a 
                                                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50">
                                                                {{ $order->status }}
                                                            </a>
                                                        </td>
                                                        @elseif($order->status === 'processing')
                                                            <td class="py-3 px-6 text-left">
                                                                <a 
                                                                    class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-50">
                                                                    {{ $order->status }}
                                                                </a> 
                                                                
                                                            </td>
                                                        @elseif($order->status === 'delivered')
                                                            <td class="py-3 px-6 text-left">
                                                                <a 
                                                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                                                                    {{ $order->status }}
                                                                </a> 
                                                                
                                                            </td>
                                                        @elseif($order->status === 'pending')
                                                            <td class="py-3 px-6 text-left">
                                                                <a 
                                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50">
                                                                    {{ $order->status }}
                                                                </a> 
                                                                
                                                            </td>
                                                        @else
                                                            <td class="py-3 px-6 text-left">
                                                                <a 
                                                                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
                                                                    {{ $order->status }}
                                                                </a> 
                                                                
                                                            </td>
                                                        @endif
                                                    
                                                        
                                                        
                                                        {{-- ACTION --}}
                                                        @if($order->status === 'completed')
                                                            <td class="py-3 px-6 text-left">
                                                                <a 
                                                                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50" 
                                                                    href="{{ route('order.show', ['id' => $order->id]) }}">
                                                                    {{ __('INVOICE') }}
                                                                </a>
                                                            
                                                            </td>
                                                        @elseif($order->status === 'canceled')
                                                            <td class="py-3 px-6 text-left">
                                                                <a 
                                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50" 
                                                                    href="{{ route('order.report', ['id' => $order->id]) }}">
                                                                    {{ __('REPORT') }}
                                                                </a>
                                                            
                                                            </td>
                                                        @elseif($order->status === 'processing')
                                                            <td class="py-3 px-6 text-left">
                                                                <a 
                                                                    class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-50" 
                                                                    href="{{ route('order.report', ['id' => $order->id]) }}">
                                                                    {{ __('REPORT') }}
                                                                </a>
                                                            
                                                            </td>
                                                        @elseif($order->status === 'delivered')
                                                            <td class="py-3 px-6 text-left">
                                                                <a 
                                                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50" 
                                                                    href="{{ route('order.show', ['id' => $order->id]) }}">
                                                                    {{ __('INVOICE') }}
                                                                </a>
                                                            
                                                            </td>
                                                        @elseif($order->status === 'pending')
                                                            <td class="py-3 px-6 text-left">
                                                                <a 
                                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50" 
                                                                    href="{{ route('payment.method.edit', ['id' => $order->id]) }}">
                                                                    {{ __('EDIT') }}
                                                                </a>
                                                            
                                                            </td>
                                                        @else
                                                            <td class="py-3 px-6 text-left">
                                                                <a 
                                                                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50" 
                                                                    href="{{ route('payment.method.edit', ['id' => $order->id]) }}">
                                                                    {{ __('EDIT') }}
                                                                </a>
                                                            
                                                            </td>
                                                        @endif                                                        
                                                        
                                                        {{-- Order Canceled --}}


                                                    </tr>

                                                @endforeach
                                            </tbody>

                                        </table>
                                        <div class="pt-2">
                                            {{ $orders->links() }}
                                        </div>
                                        
                                    </div>
                                </div>

                            @endif

                        </div>

                        {{-- Stats --}}                        
                        <div class="my-8 bg-white shadow rounded-lg">

                            <div class="flex justify-center flex-wrap gap-x-4 gap-y-12 px-4 py-20 lg:px-10">

                                <div class="flex w-64">
                                    <div
                                        class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg">
                                        <div class="p-3">
                                            <div
                                                class="absolute -mt-10 h-16 w-16 rounded-xl bg-gradient-to-r from-green-700 to-lime-500 text-center text-white shadow-lg">
                                                <i class="fa-solid fa-bag-shopping mt-4 h-7 w-16"></i>
                                            </div>
                                            <div class="pt-1 text-right">
                                                <p class="text-sm font-light capitalize">{{ __('Orders') }}</p>
                                                <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">{{ $orders->count() }}</h4>
                                            </div>
                                        </div>
                                        <hr class="opacity-50" />
                                        <div class="p-4">
                                            <p class="font-light"><span class="text-sm font-bold text-green-600">{{ $orders->count() }} </span> {{ __('Total orders') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex w-64">
                                    <div
                                        class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg">
                                        <div class="p-3">
                                            <div
                                                class="absolute -mt-10 h-16 w-16 rounded-xl bg-gradient-to-r from-sky-800 to-purple-400 text-center text-white shadow-lg">
                                                <i class="fa-regular fa-heart mt-4 h-7 w-16"></i>
                                            </div>
                                            <div class="pt-1 text-right">
                                                <p class="text-sm font-light capitalize">Wishlist</p>
                                                <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">{{ $wishlist->products->count() }}</h4>
                                            </div>
                                        </div>
                                        <hr class="opacity-50" />
                                        <div class="p-4">
                                            <p class="font-light"><span class="text-sm font-bold text-green-600">{{ $wishlist->products->count() }} </span>{{ __('Wishlist products') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex w-64">
                                    <div
                                        class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg">
                                        <div class="p-3">
                                            <div
                                                class="absolute -mt-10 h-16 w-16 rounded-xl bg-gradient-to-r from-orange-600 to-amber-300 text-center text-white shadow-lg">
                                                
                                                <i class="fa-regular fa-comment mt-4 h-7 w-16"></i>
                                            </div>
                                            <div class="pt-1 text-right">
                                                <p class="text-sm font-light capitalize">
                                                    {{ __('Reviews') }}
                                                </p>
                                                <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">{{ $reviews->count() }}</h4>
                                            </div>
                                        </div>
                                        <hr class="opacity-50" />
                                        <div class="p-4">
                                            <p class="font-light"><span class="text-sm font-bold text-red-600">{{ $reviews->count() }} </span>{{ __('Total reviews') }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
    
                </div>
            </div>
        </div>

    </main>

    <x-partials.footer />

@endsection

