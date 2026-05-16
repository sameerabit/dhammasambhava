@extends('layouts.app')

@section('title', 'Book ' . $session->title . ' - Dhammasambhava')

@section('content')
<!-- Booking Header -->
<section class="bg-isha-cream py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <div class="mb-6">
                <a href="{{ route('sessions.show', $session) }}" class="text-isha-brown hover:text-isha-brown-dark flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Session Details
                </a>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-isha-brown-dark mb-3">
                Book Your Session
            </h1>
            <p class="text-lg text-isha-brown">{{ $session->title }}</p>
        </div>
    </div>
</section>

<!-- Booking Form -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-10">
                <!-- Session Summary -->
                <div class="bg-isha-cream rounded-lg p-8 mb-10">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-isha-brown-dark">Session Details</h2>
                        <span class="px-3 py-1 rounded-full text-sm font-semibold capitalize bg-isha-cream-dark text-isha-brown-dark">
                            {{ $session->type }}
                        </span>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4 text-isha-brown">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-isha-orange" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $session->duration_label }}</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-isha-orange" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $session->location }}</span>
                        </div>
                        <div class="flex items-center">
                            @if($session->price == 0)
                            <span class="text-xl font-bold text-green-600">Free</span>
                            @else
                            <span class="text-xl font-bold text-isha-brown-dark">Rs. {{ number_format($session->price, 2) }}</span>
                            @endif
                        </div>
                        @if($session->max_capacity)
                        <div class="flex items-center text-sm text-isha-brown-dark">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                            </svg>
                            <span>Max {{ $session->max_capacity }} participants</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Booking Form -->
                <form action="{{ route('bookings.store', $session) }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Personal Information -->
                    <div class="border-b border-isha-cream pb-8">
                        <h3 class="text-lg font-bold text-isha-brown-dark mb-6">Your Information</h3>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="visitor_name" class="block text-sm font-semibold text-isha-brown-dark mb-2">Full Name *</label>
                                <input type="text"
                                       id="visitor_name"
                                       name="visitor_name"
                                       value="{{ old('visitor_name') }}"
                                       required
                                       class="w-full px-4 py-3 border border-isha-cream-dark rounded-lg focus:ring-2 focus:ring-isha-orange focus:border-isha-orange @error('visitor_name') border-red-500 @enderror">
                                @error('visitor_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="visitor_email" class="block text-sm font-semibold text-isha-brown-dark mb-2">
                                    Email Address
                                    <span class="text-xs font-normal text-isha-brown">(optional)</span>
                                </label>
                                <input type="email"
                                       id="visitor_email"
                                       name="visitor_email"
                                       value="{{ old('visitor_email') }}"
                                       class="w-full px-4 py-3 border border-isha-cream-dark rounded-lg focus:ring-2 focus:ring-isha-orange focus:border-isha-orange @error('visitor_email') border-red-500 @enderror">
                                @error('visitor_email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="visitor_phone" class="block text-sm font-semibold text-isha-brown-dark mb-2">Phone Number *</label>
                                <input type="tel"
                                       id="visitor_phone"
                                       name="visitor_phone"
                                       value="{{ old('visitor_phone') }}"
                                       required
                                       placeholder="+1234567890"
                                       class="w-full px-4 py-3 border border-isha-cream-dark rounded-lg focus:ring-2 focus:ring-isha-orange focus:border-isha-orange @error('visitor_phone') border-red-500 @enderror">
                                @error('visitor_phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="whatsapp_number" class="block text-sm font-semibold text-isha-brown-dark mb-2">
                                    WhatsApp Number
                                    <span class="text-xs font-normal text-isha-brown">(optional)</span>
                                </label>
                                <input type="tel"
                                       id="whatsapp_number"
                                       name="whatsapp_number"
                                       value="{{ old('whatsapp_number') }}"
                                       placeholder="+1234567890"
                                       class="w-full px-4 py-3 border border-isha-cream-dark rounded-lg focus:ring-2 focus:ring-isha-orange focus:border-isha-orange @error('whatsapp_number') border-red-500 @enderror">
                                @error('whatsapp_number')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Special Requests -->
                    <div>
                        <label for="special_requests" class="block text-sm font-semibold text-isha-brown-dark mb-2">
                            Special Requests or Notes
                            <span class="text-xs font-normal text-isha-brown">(optional)</span>
                        </label>
                        <textarea id="special_requests"
                                  name="special_requests"
                                  rows="4"
                                  class="w-full px-4 py-3 border border-isha-cream-dark rounded-lg focus:ring-2 focus:ring-isha-orange focus:border-isha-orange"
                                  placeholder="Any dietary restrictions, accessibility needs, or questions...">{{ old('special_requests') }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex gap-4">
                        <button type="submit"
                                class="flex-1 px-8 py-4 bg-isha-orange text-white rounded-lg hover:bg-isha-navy transition font-bold text-lg shadow-sm">
                            Confirm Booking
                        </button>
                        <a href="{{ route('sessions.show', $session) }}"
                           class="px-8 py-4 bg-isha-cream text-isha-brown-dark rounded-lg hover:bg-isha-cream-dark transition font-semibold text-lg">
                            Cancel
                        </a>
                    </div>
                </form>

                <!-- Help Section -->
                <div class="mt-10 pt-8 border-t border-isha-cream">
                    <p class="text-sm text-isha-brown mb-3">Need assistance with your booking?</p>
                    <x-whatsapp-button :message="'I need help booking ' . $session->title" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
