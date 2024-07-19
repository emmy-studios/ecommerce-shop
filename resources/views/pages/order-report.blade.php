@extends('layouts.app')

@section('title', config('app.name') . '| order report and status')

@section('content')

    <x-partials.navigation />

    <main>

        <div class="my-8">

            <div class="bg-white p-6  md:mx-auto">
                
                <div class="text-center">
                    <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Order Report</h3>

                    @if($order->status === 'processing')
                        <p class="text-gray-600 my-2">
                            You cancel the order and your request is beign evaluate it.
                            You will receive and email with the corresponding message.
                        </p>
                    @else
                        <p class="text-gray-600 my-2">
                            SomethinG got wrong with the order process!.
                            You can cancel it or continue the order process by email.
                        </p>
                    @endif
                    
                    <p> Have a great day! </p>
                    
                    <div class="py-10 text-center">
                        <a href="{{ route('dashboard') }}" class="px-12 bg-purple-600 hover:bg-purple-500 text-white font-semibold py-3">
                            GO BACK
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </main>

    <x-partials.footer />

@endsection