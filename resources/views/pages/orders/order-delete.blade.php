@extends('layouts.app')

@section('title', config('app.name') . '| delete the order')

@section('content')

    <x-partials.navigation />

    <main class="bg-slate-200 py-10">

        <div class="flex justify-center items-center px-8 py-10">

            <div class="bg-white px-16 py-14 rounded-md text-center">
                
                <h1 class="text-xl mb-4 font-bold text-slate-500">
                    Do you Want Delete the Order?
                </h1>

                <div class="flex flex-row justify-center space-x-2">

                    <a 
                        class="bg-red-500 px-4 py-2 rounded-md text-md text-white"
                        href="{{ route('dashboard') }}">
                        Cancel
                    </a>
                    <form action="{{ route('order.delete.post') }}" method="post">

                        @csrf
                        
                        <button
                            type="submit" 
                            class="bg-purple-600 hover:bg-purple-500 px-7 py-2 ml-2 rounded-md text-md text-white font-semibold">
                            Ok
                        </button>

                    </form>

                </div>
                
            
            </div>

        </div>

    </main>

    <x-partials.footer />

@endsection