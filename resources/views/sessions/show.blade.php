@extends('layouts.app')

@section('title', $session->title . ' - Dhamma Sambhava')

@section('content')
<!-- Session Hero -->
<section class="bg-gradient-to-r from-amber-100 to-orange-100 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="mb-4">
                <span class="px-4 py-2 rounded-full text-sm font-semibold capitalize inline-block
                    {{ $session->type === 'dhamma' ? 'bg-blue-600 text-white' : ($session->type === 'yoga' ? 'bg-green-600 text-white' : 'bg-purple-600 text-white') }}">
                    {{ $session->type }}
                </span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-amber-900 mb-4">
                {{ $session->title }}
            </h1>
            <div class="flex flex-wrap gap-6 text-gray-700">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-semibold">{{ $session->duration }} minutes</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-semibold">{{ $session->location }}</span>
                </div>
                <div class="flex items-center">
                    @if($session->price == 0)
                    <span class="text-2xl font-bold text-green-600">Free</span>
                    @else
                    <span class="text-2xl font-bold text-amber-900">${{ number_format($session->price, 2) }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Session Details -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="md:col-span-2">
                    <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
                        <h2 class="text-2xl font-bold text-amber-900 mb-4">About This Session</h2>
                        <p class="text-gray-700 text-lg leading-relaxed whitespace-pre-line">{{ $session->description }}</p>
                    </div>

                    <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-lg p-8 border-l-4 border-amber-600">
                        <h3 class="text-xl font-bold text-amber-900 mb-4">What to Bring</h3>
                        <ul class="space-y-2 text-gray-700">
                            @if($session->type === 'yoga' || $session->type === 'both')
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 text-green-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Comfortable clothing suitable for movement
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 text-green-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Yoga mat (or we can provide one)
                            </li>
                            @endif
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 text-green-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Water bottle
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 text-green-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Open mind and peaceful heart
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Booking Sidebar -->
                <div>
                    <div class="bg-white rounded-lg shadow-xl p-6 sticky top-24">
                        <h3 class="text-xl font-bold text-amber-900 mb-4">Book This Session</h3>

                        @if($session->max_capacity)
                        <div class="mb-4 p-3 bg-blue-50 rounded border border-blue-200">
                            <p class="text-sm text-blue-800">
                                <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                </svg>
                                Limited to {{ $session->max_capacity }} participants
                            </p>
                        </div>
                        @endif

                        <div class="mb-6">
                            <div class="text-3xl font-bold text-center mb-2">
                                @if($session->price == 0)
                                <span class="text-green-600">Free</span>
                                @else
                                <span class="text-amber-900">${{ number_format($session->price, 2) }}</span>
                                @endif
                            </div>
                            <p class="text-center text-gray-600 text-sm">per session</p>
                        </div>

                        <a href="{{ route('bookings.create', $session) }}"
                           class="block w-full text-center px-6 py-4 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition font-bold text-lg shadow-lg">
                            Book Now
                        </a>

                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <p class="text-sm text-gray-600 mb-3">Need more information?</p>
                            <a href="https://wa.me/1234567890?text=I'm interested in {{ urlencode($session->title) }}"
                               target="_blank"
                               class="block w-full text-center px-4 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                Contact via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Sessions -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-amber-900 mb-8 text-center">You Might Also Like</h2>
        <div class="text-center">
            <a href="{{ route('sessions.index', ['type' => $session->type]) }}" class="inline-block px-8 py-3 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition">
                View All {{ ucfirst($session->type) }} Sessions
            </a>
        </div>
    </div>
</section>
@endsection
