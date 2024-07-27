@extends('layouts.app')

@section('title', config('app.name') . ' | Contact Us')

@section('content')

    <x-partials.navigation />

    <main>

        <section class="py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 grid-cols-1">
                    <div class="lg:mb-0 mb-10">
                        <div class="group w-full h-full">
                            
                            <div class="relative h-full">
                                @if($websiteInfo && $websiteInfo->contact_image)
                                    <img 
                                        src="{{ asset('storage/' . $websiteInfo->contact_image) }}" 
                                        alt="Contact us image"
                                        class="w-full h-full lg:rounded-l-2xl rounded-2xl bg-blend-multiply bg-indigo-700" />
                                @else
                                    <img 
                                        src="https://pagedone.io/asset/uploads/1696488602.png" 
                                        alt="ContactUs tailwind section"
                                        class="w-full h-full lg:rounded-l-2xl rounded-2xl bg-blend-multiply bg-indigo-700" />
                                @endif
                                <h1 class="font-manrope text-white text-4xl font-bold leading-10 absolute top-11 left-11">
                                    Contact us</h1>
                                <div class="absolute bottom-0 w-full lg:p-11 p-5">
                                    <div class="bg-white rounded-lg p-6 block">
                                        <a href="javascript:;" class="flex items-center mb-6">
                                            <i class="fa-solid fa-phone"></i>
                                            @if($websiteInfo && $websiteInfo->phone_code && $websiteInfo->phone_number)
                                                <h5 class="text-black md:text-base text-[10px] font-normal leading-6 ml-5">
                                                    {{ $phone_code }} {{ $phone_number }}
                                                </h5>
                                            @else
                                                <h5 class="text-black md:text-base text-[10px] font-normal leading-6 ml-5">
                                                    (+506) 6041-1911
                                                </h5>
                                            @endif
                                        </a>
                                        <a href="javascript:;" class="flex items-center flex-wrap mb-6">
                                            <i class="fa-solid fa-envelope"></i>
                                            @if($websiteInfo && $websiteInfo->main_mail)
                                                <h5 class="text-black font-normal md:text-base text-[10px] leading-6 ml-5">
                                                    {{ $websiteInfo->main_mail }}
                                                </h5>
                                            @else
                                                <h5 class="text-black md:text-base text-[10px] font-normal leading-6 ml-5">
                                                    ecommerce@info.com
                                                </h5>
                                            @endif
                                        </a>
                                        <a href="javascript:;" class="flex items-center">
                                            <i class="fa-solid fa-location-dot"></i>
                                            @if($websiteInfo && $websiteInfo->contact_address)
                                                <h5 class="text-black md:text-base text-[10px] font-normal leading-6 ml-5">
                                                    {{ $websiteInfo->contact_address }}
                                                </h5>
                                            @else
                                                <h5 class="text-black md:text-base text-[10px] font-normal leading-6 ml-5">
                                                    654 Sycamore Avenue, Meadowville, WA 76543
                                                </h5>
                                            @endif
                                        </a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-5 lg:p-11 lg:rounded-r-2xl rounded-2xl">

                        <h2 class="text-purple-600 font-manrope text-4xl font-semibold leading-10 mb-11">
                            Send Us A Message
                        </h2>

                        @if(session()->has('successEmail'))
                            <p class="text-center my-4 text-red-500">
                                {{ session()->get('successEmail') }}
                            </p>
                        @endif

                        <form action="{{ route('contact.post') }}" method="post">
                            
                            @csrf

                            <input 
                                type="text"
                                class="w-full h-12 text-gray-600 placeholder-gray-400  shadow-sm bg-transparent text-lg font-normal leading-7 rounded-full border border-gray-200 focus:outline-none pl-4 mb-10"
                                name="name"
                                placeholder="Name">
                            @error('name')
                                <p class="text-sm text-red-600 pl-4 py-2">
                                    {{ $message }}
                                </p>
                            @enderror
                            <input 
                                type="email"
                                name="email"
                                class="w-full h-12 text-gray-600 placeholder-gray-400 shadow-sm bg-transparent text-lg font-normal leading-7 rounded-full border border-gray-200 focus:outline-none pl-4 mb-10"
                                placeholder="Email">
                            @error('email')
                                <p class="text-sm text-red-600 pl-4 py-2">
                                    {{ $message }}
                                </p>
                            @enderror
                            <input 
                                type="text"
                                name="message"
                                class="w-full h-12 text-gray-600 placeholder-gray-400 bg-transparent text-lg shadow-sm font-normal leading-7 rounded-full border border-gray-200 focus:outline-none pl-4 mb-10"
                                placeholder="Message">
                            @error('message')
                                <p class="text-sm text-red-600 pl-4 py-2">
                                    {{ $message }}
                                </p>
                            @enderror
                            <button
                                type="submit"
                                class="w-full h-12 text-white text-base font-semibold leading-6 rounded-full transition-all duration-700 hover:bg-purple-800 bg-purple-600 shadow-sm">
                                Send
                            </button>

                        </form>

                    </div>

                </div>
        </section>


    </main>

    <x-partials.footer />

@endsection