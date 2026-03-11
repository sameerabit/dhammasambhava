@extends('layouts.app')

@section('title', $session->title . ' - Dhammasambhava')

@section('content')
<!-- Session Hero -->
<section class="bg-isha-cream py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="mb-6">
                <span class="px-4 py-2 rounded-full text-sm font-semibold capitalize inline-block bg-isha-cream-dark text-isha-brown-dark">
                    {{ $session->type }}
                </span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-isha-brown-dark mb-6">
                {{ $session->title }}
            </h1>
            <div class="flex flex-wrap gap-8 text-isha-brown">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-isha-orange" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-semibold">{{ $session->duration }} minutes</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 text-isha-orange" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-semibold">{{ $session->location }}</span>
                </div>
                <div class="flex items-center">
                    @if($session->price == 0)
                    <span class="text-2xl font-bold text-green-600">Free</span>
                    @else
                    <span class="text-2xl font-bold text-isha-brown-dark">${{ number_format($session->price, 2) }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Session Details -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="md:col-span-2">
                    <div class="bg-white rounded-lg shadow-sm p-10 mb-8">
                        <h2 class="text-2xl font-bold text-isha-brown-dark mb-6">About This Session</h2>
                        <p class="text-isha-brown text-lg leading-relaxed whitespace-pre-line">{{ $session->description }}</p>
                    </div>

                    <div class="bg-isha-cream rounded-lg p-8">
                        <h3 class="text-xl font-bold text-isha-brown-dark mb-6">What to Bring</h3>
                        <ul class="space-y-3 text-isha-brown">
                            @if($session->type === 'yoga' || $session->type === 'both')
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-3 text-green-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Comfortable clothing suitable for movement
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-3 text-green-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Yoga mat (or we can provide one)
                            </li>
                            @endif
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-3 text-green-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Water bottle
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-3 text-green-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Open mind and peaceful heart
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Booking Sidebar -->
                <div>
                    <div class="bg-white rounded-lg shadow-sm p-8 sticky top-24">
                        <h3 class="text-xl font-bold text-isha-brown-dark mb-6">Book This Session</h3>

                        @if($session->max_capacity)
                        <div class="mb-6 p-4 bg-isha-cream rounded">
                            <p class="text-sm text-isha-brown-dark">
                                <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                </svg>
                                Limited to {{ $session->max_capacity }} participants
                            </p>
                        </div>
                        @endif

                        <div class="mb-8">
                            <div class="text-3xl font-bold text-center mb-2">
                                @if($session->price == 0)
                                <span class="text-green-600">Free</span>
                                @else
                                <span class="text-isha-brown-dark">${{ number_format($session->price, 2) }}</span>
                                @endif
                            </div>
                            <p class="text-center text-isha-brown text-sm">per session</p>
                        </div>

                        <a href="{{ route('bookings.create', $session) }}"
                           class="block w-full text-center px-6 py-4 bg-isha-orange text-white rounded-lg hover:bg-isha-navy transition font-bold text-lg shadow-sm mb-6">
                            Book Now
                        </a>

                        <div class="pt-6 border-t border-isha-cream">
                            <p class="text-sm text-isha-brown mb-3">Need more information?</p>
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
<section class="py-16 bg-isha-cream">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-isha-brown-dark mb-8 text-center">You Might Also Like</h2>
        <div class="text-center">
            <a href="{{ route('sessions.index', ['type' => $session->type]) }}" class="inline-block px-8 py-4 bg-isha-orange text-white rounded-lg hover:bg-isha-navy transition">
                View All {{ ucfirst($session->type) }} Sessions
            </a>
        </div>
    </div>
</section>
@endsection
