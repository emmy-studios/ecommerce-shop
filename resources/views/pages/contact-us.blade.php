@extends('layouts.app')

@section('title', config('app.name') . ' | Contact Us')

@section('content')
    
    <x-partials.navigation />

    <main>
 
        <div class="m-10">
            <div
                class="grid sm:grid-cols-2 items-center gap-16 p-8 mx-auto max-w-4xl bg-white shadow-[0_10px_20px_rgba(240,_46,_170,_0.7)] rounded-md text-[#333] font-[sans-serif]">
                <div>
                    <h1 class="text-3xl font-extrabold">Let's Talk</h1>
                    <p class="text-sm text-gray-400 mt-3">
                        Have some big idea or brand to develop and need help? Then reach
                        out we'd love to hear about your project and provide help.
                    </p>

                    <div class="mt-12">
                        <h2 class="text-lg font-extrabold">Email</h2>
                        <ul class="mt-3">
                            <li class="flex items-center">
                                <div
                                    class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                    <i class="fa-regular fa-envelope text-purple-600"></i>
                                </div>
                                <a target="blank" class="text-purple-600 text-sm ml-3">
                                    <small class="block">Mail</small>
                                    @if($websiteInfo && $websiteInfo->main_mail)
                                        <strong class="md:text-sm text-[10px]">{{ $websiteInfo->main_mail }}</strong>
                                    @else
                                        <strong lass="md:text-sm text-[10px]">ecommerce@gmail.com</strong>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-12">
                        <h2 class="text-lg font-extrabold">Whatsapp</h2>
                        <ul class="mt-3">
                            <li class="flex items-center">
                                <div
                                    class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                    <i class="fa-regular fa-envelope text-purple-600"></i>
                                </div>
                                <a target="blank" class="text-purple-600 text-sm ml-3">
                                    <small class="block">Whatsapp</small>
                                    @if($websiteInfo && $websiteInfo->phone_code && $websiteInfo->phone_number)
                                        <strong class="md:text-sm text-[10px]">{{ $websiteInfo->phone_code }} {{ $websiteInfo->phone_number }}</strong>
                                    @else
                                        <strong class="md:text-sm text-[10px]">+506 1234 5678</strong>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="mt-12">
                        <h2 class="text-lg font-extrabold">Socials</h2>
                        <ul class="flex mt-3 space-x-4">
                            <li class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                <a href="javascript:void(0)">
                                    <i class="fa-brands fa-facebook-f text-purple-600"></i>
                                </a>
                            </li>
                            <li class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                <a href="javascript:void(0)">
                                    <i class="fa-brands fa-instagram text-purple-600"></i>
                                </a>
                            </li>
                            <li class="bg-[#e6e6e6cf] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                                <a href="javascript:void(0)">
                                    <i class="fa-brands fa-linkedin-in text-purple-600"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
    
                <form
                    action="{{ route('contact.post') }}"
                    method="POST"  
                    class="ml-auo space-y-4">
                    
                    @csrf
                    
                    @if (session('successEmail'))    
                        <p class="text-red-600 text-sm">{{ session('successEmail') }}</p>
                    @endif

                    <input 
                        name="name" 
                        type="text" 
                        id="name"
                        placeholder="Name"  
                        value="{{ old('name') }}"
                        class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#007bff]" />
                    @error('name')
                        <p class="ml-3 mt-1 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                    <input 
                        name="email" 
                        id="email" 
                        type="email"
                        value="{{ old('email') }}"
                        placeholder='Email'
                        class="w-full rounded-md py-2.5 px-4 border text-sm outline-[#007bff]" />
                    @error('email')
                        <p class="ml-3 mt-1 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                    <textarea 
                        placeholder='Message' 
                        rows="6"
                        name="message"
                        id="message"
                        class="w-full rounded-md px-4 border text-sm pt-2.5 outline-[#007bff]">
                    </textarea>
                    @error('message')
                        <p class="ml-3 mt-1 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                    
                    <button 
                        type="submit"
                        class="text-white bg-purple-500 hover:bg-purple-600 font-semibold rounded-md text-sm px-4 py-2.5 w-full">
                        Send
                    </button>
    
                </form>
    
            </div>
        </div>

    </main>

    <x-partials.footer /> 

@endsection