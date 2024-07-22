@extends('layouts.app')

@section('title', config('app.name') . '| update profile information')

@section('content')
    
    <main>

        <div class="bg-white border-4 border-purple-500 rounded-lg shadow relative m-10">

            <div class="flex items-start justify-between p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold">
                    Edit profile
                </h3>
                <a href="{{ route('dashboard') }}" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="product-modal">
                   <i class="fa-solid fa-arrow-left w-5 h-5 text-black"></i>
                </a>
            </div>
        
            <div class="p-6 space-y-6">

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    
                    @csrf

                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-3">
                            <label for="username" class="text-sm font-medium text-gray-900 block mb-2">Username</label>
                            <input 
                                type="text" 
                                name="name" 
                                id="username" 
                                value="{{ $user->name }}"
                                class="shadow-sm bg-gray-50 border border-purple-300 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                            @error('name')
                                <p class="pl-6 pt-2 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="col-span-6 sm:col-span-3">
                            <label for="first_name" class="text-sm font-medium text-gray-900 block mb-2">First Name</label>
                            <input 
                                type="text" 
                                name="first_name" 
                                id="first_name"
                                value="{{ $user->first_name }}"  
                                class="shadow-sm bg-gray-50 border border-purple-300 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                            @error('first_name')
                                <p class="pl-6 pt-2 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="col-span-6 sm:col-span-3">
                            <label for="last_name" class="text-sm font-medium text-gray-900 block mb-2">Last Name</label>
                            <input type="text" 
                                name="last_name" 
                                id="last_name" 
                                value="{{ $user->last_name }}"
                                class="shadow-sm bg-gray-50 border border-purple-300 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                            @error('last_name')
                                <p class="pl-6 pt-2 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="col-span-6 sm:col-span-3">
                            <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Email</label>
                            <input 
                                type="email" 
                                name="email" 
                                id="email"
                                value="{{ $user->email }}" 
                                class="shadow-sm bg-gray-50 border border-purple-300 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                            @error('email')
                                <p class="pl-6 pt-2 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="col-span-full">
                            <label for="bio" class="text-sm font-medium text-gray-900 block mb-2">Bio</label>
                            <textarea 
                                id="bio" 
                                rows="6" 
                                class="bg-gray-50 border border-purple-300 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-4">
                                {{ $user->bio }}
                            </textarea>
                            @error('bio')
                                <p class="pl-6 pt-2 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <div class="flex items-center space-x-6">
                                <div class="shrink-0">
                                    <img 
                                        id='prrofile_image' 
                                        class="h-16 w-16 object-cover rounded-full" 
                                        src="{{ asset('assets/images/accounts/users/' . $user->profile_image) }}"
                                        alt="Current profile photo" />
                                </div>

                                <label class="block">
                                    <span class="sr-only">Choose profile photo</span>
                                    <input 
                                        type="file" 
                                        name="profile_image" 
                                        onchange="loadFile(event)" 
                                        class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                    "/>
                                </label>
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="phone_code" class="text-sm font-medium text-gray-900 block mb-2">Phone Code:</label>
                            <input 
                                type="text" 
                                name="phone_code" 
                                id="phone_code"
                                value="{{ $user->phone_code }}" 
                                class="shadow-sm bg-gray-50 border border-purple-300 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                            @error('phone_code')
                                <p class="pl-6 pt-2 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="phone_code" class="text-sm font-medium text-gray-900 block mb-2">Phone Number:</label>
                            <input 
                                type="text" 
                                name="phone_number" 
                                id="phone_number" 
                                value="{{ $user->phone_number }}"
                                class="shadow-sm bg-gray-50 border border-purple-300 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                            @error('phone_number')
                                <p class="pl-6 pt-2 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="birth" class="text-sm font-medium text-gray-900 block mb-2">Birth:</label>
                            <input 
                                type="date" 
                                name="birth" 
                                id="birth"
                                value="{{ $user->birth }}" 
                                class="shadow-sm bg-gray-50 border border-purple-300 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                            @error('birth')
                                <p class="pl-6 pt-2 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="flex items-start pt-8 pb-4 rounded-t">
                        <h3 class="text-xl font-semibold">
                            Address Information
                        </h3>
                    </div>

                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-3">
                            <label for="country" class="text-sm font-medium text-gray-900 block mb-2">Country:</label>
                            <input 
                                type="text" 
                                name="country" 
                                id="country"
                                value="{{ $addressInfo->country }}" 
                                class="shadow-sm bg-gray-50 border border-purple-300 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                            @error('country')
                                <p class="pl-6 pt-2 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="state" class="text-sm font-medium text-gray-900 block mb-2">State:</label>
                            <input 
                                type="text" 
                                name="state" 
                                id="state"
                                value="{{ $addressInfo->state }}" 
                                class="shadow-sm bg-gray-50 border border-purple-300 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                            @error('state')
                                <p class="pl-6 pt-2 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="city" class="text-sm font-medium text-gray-900 block mb-2">City:</label>
                            <input 
                                type="text" 
                                name="city" 
                                id="city" 
                                value="{{ $addressInfo->city }}"
                                class="shadow-sm bg-gray-50 border border-purple-300 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                            @error('city')
                                <p class="pl-6 pt-2 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="address_line_1" class="text-sm font-medium text-gray-900 block mb-2">Personal Address:</label>
                            <input 
                                type="text" 
                                name="address_line_1" 
                                id="address_line_1"
                                value="{{ $addressInfo->address_line_1 }}" 
                                class="shadow-sm bg-gray-50 border border-purple-300 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                            @error('address_line_1')
                                <p class="pl-6 pt-2 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3 pb-4">
                            <label for="address_line_2" class="text-sm font-medium text-gray-900 block mb-2">Shipping Address:</label>
                            <input 
                                type="text" 
                                name="address_line_2" 
                                id="address_line_2" 
                                value="{{ $addressInfo->address_line_2 }}"
                                class="shadow-sm bg-gray-50 border border-purple-300 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                            @error('address_line_2')
                                <p class="pl-6 pt-2 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="flex items-start pt-8 pb-4 border-t rounded-t">
                        <h3 class="text-xl font-semibold">
                            Social Media
                        </h3>
                    </div>

                    <div class="grid grid-cols-6 gap-6 pb-4">

                        <div class="col-span-6 sm:col-span-3">
                            <label for="city" class="text-sm font-medium text-gray-900 block mb-2">Instagram URL:</label>
                            <input 
                                type="text" 
                                name="instagram_url" 
                                id="instagram_url"
                                value="{{ $socialmedialinks->instagram_url }}" 
                                class="shadow-sm bg-gray-50 border border-purple-300 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                            @error('instagram_url')
                                <p class="pl-6 pt-2 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="city" class="text-sm font-medium text-gray-900 block mb-2">Facebook Url:</label>
                            <input 
                                type="text" 
                                name="facebook_url" 
                                id="facebook_url"
                                value="{{ $socialmedialinks->facebook_url }}"
                                class="shadow-sm bg-gray-50 border border-purple-300 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                            @error('facebook_url')
                                <p class="pl-6 pt-2 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="city" class="text-sm font-medium text-gray-900 block mb-2">Twitter Url:</label>
                            <input 
                                type="text" 
                                name="twitter_url" 
                                id="twitter_url"
                                value="{{ $socialmedialinks->twitter_url }}" 
                                class="shadow-sm bg-gray-50 border border-purple-300 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                            @error('twitter_url')
                                <p class="pl-6 pt-2 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="city" class="text-sm font-medium text-gray-900 block mb-2">Tik Tok Url:</label>
                            <input 
                                type="text" 
                                name="tiktok_url" 
                                id="tiktok_url"
                                value="{{ $socialmedialinks->tiktok_url }}" 
                                class="shadow-sm bg-gray-50 border border-purple-300 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5">
                            @error('tiktok_url')
                                <p class="pl-6 pt-2 text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>


                    </div>


                    <div class="pt-4 border-t border-gray-200 rounded-b">
                        <button class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save all</button>
                    </div>

                </form>
            
            </div>
        
        </div>

    </main>

@endsection